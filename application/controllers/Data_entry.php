<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_entry extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_configure');
        $this->load->model('mod_data_entry');
        $this->load->model('mod_admin_area');
        $this->load->model('mod_other');
        if ((!$this->session->userdata('user_id')) || ($this->session->userdata('is_logged_id') != 'TRUE')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['dir'] = 'data_entry';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }

    public function work_plan_list()
    {
        $selected_fiscal_year = $this->mod_other->selected_fiscal_year();
        if (!empty($_POST)) {
            $s_f_y = $_POST['finance_year'];
        } else {
            $s_f_y = $selected_fiscal_year;
        }
        $data['selected_fiscal_year'] = $s_f_y;
        $data['fiscal_years'] = $this->mod_other->fiscal_year();
        $data['thematic_area_list'] = $this->mod_admin_area->thematic_area_list();
        $data['rows'] = $this->mod_data_entry->work_plan_list();
        $data['dir'] = 'data_entry';
        $data['page'] = 'work_plan_list';
        $this->load->view('main', $data);
    }

    public function work_plan_delete($id, $flag)
    {
        if ($flag == 0) {
            $reset_flag = 1;
        } else {
            $reset_flag = 1;
        }
        $data['is_active'] = $reset_flag;
        $data['deleted_by'] = $this->session->userdata('user_id');
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $success = $this->mod_data_entry->work_plan_update($id, $data);
        if ($success) {
            $this->session->set_flashdata('success', 'Data has been updated.');
            redirect('data_entry/work_plan_list');
        } else {
            $this->session->set_flashdata('error', 'Data has not updated successfully.');
        }
    }

    public function work_plan_list_with_progress()
    {
        $selected_fiscal_year = $this->mod_other->selected_fiscal_year();
        if (!empty($_POST)) {
            $s_f_y = $_POST['finance_year'];
        } else {
            $s_f_y = $selected_fiscal_year;
        }
        $data['selected_fiscal_year'] = $s_f_y;
        $data['fiscal_years'] = $this->mod_other->fiscal_year();
        $data['thematic_area_list'] = $this->mod_admin_area->thematic_area_list();
        $data['rows'] = $this->mod_data_entry->work_plan_list();
        $data['dir'] = 'data_entry';
        $data['page'] = 'work_plan_list_with_progress';
        $this->load->view('main', $data);
    }

    public function work_plan_add($thematic_area_id = "")
    {
        if (isset($_POST['save'])) {
            $success = $this->mod_data_entry->work_plan_master_add();
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('data_entry/work_plan_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['fiscal_years'] = $this->mod_other->fiscal_year();
        $data['period'] = $this->mod_other->period();
        $data['thematic_area_list'] = $this->mod_admin_area->thematic_area_list();
        $data['responsibility_list'] = $data['responsibility_list2'] = $this->mod_admin_area->responsibility_list();
        $data['partner_list'] = $data['partner_list2'] = $this->mod_admin_area->partner_list();
        $data['major_activities'] = $data['major_activities2'] = $this->mod_configure->major_activity_list($thematic_area_id);
        $data['thematic_area_id'] = $thematic_area_id;
        $data['dir'] = 'data_entry';
        $data['page'] = 'work_plan_entry';
        $this->load->view('main', $data);
    }

    public function work_plan_edit($wp_id)
    {
        if (isset($_POST['save'])) {
            $success = $this->mod_data_entry->work_plan_master_update($wp_id);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('data_entry/work_plan_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $master = $data['work_plan_master_edit'] = $this->mod_data_entry->work_plan_master_edit($wp_id);
        foreach ($master as $ms)
            $data['work_plan_details_edit'] = $this->mod_data_entry->work_plan_details_edit($wp_id);
        $data['fiscal_years'] = $this->mod_other->fiscal_year();
        $data['period'] = $this->mod_other->period();
        $data['thematic_area_list'] = $this->mod_admin_area->thematic_area_list();
        $data['responsibility_list'] = $data['responsibility_list2'] = $this->mod_admin_area->responsibility_list();
        $data['partner_list'] = $data['partner_list2'] = $this->mod_admin_area->partner_list();
        $data['major_activities'] = $data['major_activities2'] = $this->mod_configure->major_activity_list($ms['thematic_area_id']);
        $data['thematic_area_id'] = $ms['thematic_area_id'];
        $data['fn_year'] = $ms['finance_year'];
        $data['dir'] = 'data_entry';
        $data['page'] = 'work_plan_edit';
        $this->load->view('main', $data);
    }

    public function work_plan_signed_copy_add($id)
    {
        if (isset($_POST['save'])) {
            $config['upload_path'] = '././_^_imgUpload/signed_workplan/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '4100';
            $config['file_name'] = date('Y_m_d') . "_" . strtotime(date('Y-m-d H:i:s'));
            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('userfile');
            if ($upload) {
                $img = $this->upload->data();
                $file_name = $img['file_name'];
                $success = $this->mod_data_entry->work_plan_signed_copy_add($id, $file_name);
                if ($success) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully.');
                    redirect('data_entry/work_plan_list');
                }
            } else {
                $this->session->set_flashdata('error', 'Data has not updated successfully.');
            }
        }
        $data['workplan_information'] = $this->mod_data_entry->work_plan_master_edit($id);
        $data['dir'] = 'data_entry';
        $data['page'] = 'work_plan_signed_copy';
        $this->load->view('main', $data);
    }

    public function work_progress_list()
    {
        $selected_fiscal_year = $this->mod_other->selected_fiscal_year();
        if (!empty($_POST)) {
            $s_f_y = $_POST['finance_year'];
        } else {
            $s_f_y = $selected_fiscal_year;
        }
        $data['selected_fiscal_year'] = $s_f_y;
        $data['periods'] = $this->mod_other->period();
        $data['fiscal_years'] = $this->mod_other->fiscal_year();
        $data['thematic_area_list'] = $this->mod_admin_area->thematic_area_list();
        $data['rows'] = $this->mod_data_entry->work_progress_list();
        $data['dir'] = 'data_entry';
        $data['page'] = 'work_progress_list';
        $this->load->view('main', $data);
    }

    public function work_progress_add($work_plan_master_id)
    {
        if (isset($_POST['save'])) {
            $success = $this->mod_data_entry->work_progress_master_add($work_plan_master_id);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('data_entry/work_progress_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['master_row'] = $this->mod_data_entry->work_plan_master_edit($work_plan_master_id);
        $data['rows'] = $this->mod_data_entry->work_plan_details_edit($work_plan_master_id);
        $data['periods'] = $this->mod_other->period();
        $data['dir'] = 'data_entry';
        $data['page'] = 'work_progress_entry';
        $this->load->view('main', $data);
    }

    public function work_progress_edit($work_progress_master_id)
    {
        if (isset($_POST['save'])) {
            $success = $this->mod_data_entry->work_progress_master_update($work_progress_master_id);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('data_entry/work_progress_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['master_row'] = $this->mod_data_entry->work_progress_master_edit($work_progress_master_id);
        $data['rows'] = $this->mod_data_entry->work_progress_details_edit($work_progress_master_id);
        $data['periods'] = $this->mod_other->period();
        $data['dir'] = 'data_entry';
        $data['page'] = 'work_progress_edit';
        $this->load->view('main', $data);
    }
}
