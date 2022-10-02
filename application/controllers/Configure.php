<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Configure extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_configure');
        $this->load->model('mod_admin_area');
        if ((!$this->session->userdata('user_id')) || ($this->session->userdata('is_logged_id') != 'TRUE')) {
            redirect('login');
        }
    }
    //Code for Output
    public function major_activity_list()
    {
        $data['rows'] = $this->mod_configure->major_activity_list();
        $data['last_query'] = urlencode(base64_encode($this->db->last_query()));
        $data['excel_page_name'] = urlencode(base64_encode("Major Activity List"));
        $data['dir'] = 'configure';
        $data['page'] = 'major_activity_list';
        $this->load->view('main', $data);
    }

    public function major_activity_add()
    {
        if (isset($_POST['save'])) {
            $data['activity_name'] = $this->input->post('activity_name');
            $data['thematic_area'] = $this->input->post('thematic_area');
            $data['is_active'] = 1;
            $data['created_by'] = $this->session->userdata('user_id');
            $data['created_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_configure->major_activity_add($data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('configure/major_activity_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['thematic_area_list'] = $this->mod_admin_area->thematic_area_list();
        $data['dir'] = 'configure';
        $data['page'] = 'major_activity_entry';
        $this->load->view('main', $data);
    }

    public function major_activity_edit($id)
    {
        if (isset($_POST['save'])) {
            $data['activity_name'] = $this->input->post('activity_name');
            $data['thematic_area'] = $this->input->post('thematic_area');
            $data['updated_by'] = $this->session->userdata('user_id');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_configure->major_activity_update($id, $data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('configure/major_activity_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['major_activity_edit'] = $this->mod_configure->major_activity_edit($id);
        $data['thematic_area_list'] = $this->mod_admin_area->thematic_area_list();
        $data['dir'] = 'configure';
        $data['page'] = 'major_activity_edit';
        $this->load->view('main', $data);
    }

    public function major_activity_active_or_inactive($id, $flag)
    {
        if ($flag == 1) {
            $reset_flag = 0;
        } else {
            $reset_flag = 1;
        }
        $data['is_active'] = $reset_flag;
        $data['updated_by'] = $this->session->userdata('user_id');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $success = $this->mod_configure->major_activity_update($id, $data);
        if ($success) {
            $this->session->set_flashdata('success', 'Data has been updated.');
            redirect('configure/major_activity_list');
        } else {
            $this->session->set_flashdata('error', 'Data has not updated successfully.');
        }
    }
    //Code for Activity
    public function sub_activity_list()
    {
        $data['rows'] = $this->mod_configure->sub_activity_list();
        $data['last_query'] = urlencode(base64_encode($this->db->last_query()));
        $data['excel_page_name'] = urlencode(base64_encode("Sub Activity List"));
        $data['dir'] = 'configure';
        $data['page'] = 'sub_activity_list';
        $this->load->view('main', $data);
    }

    public function sub_activity_add()
    {
        if (isset($_POST['save'])) {
            $data['sub_activity'] = $this->input->post('sub_activity');
            $data['activity_id'] = $this->input->post('activity');
            $data['is_active'] = 1;
            $data['created_by'] = $this->session->userdata('user_id');
            $data['created_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_configure->sub_activity_add($data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('configure/sub_activity_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['major_activity_list'] = $this->mod_configure->major_activity_list();
        $data['dir'] = 'configure';
        $data['page'] = 'sub_activity_entry';
        $this->load->view('main', $data);
    }

    public function sub_activity_edit($id)
    {
        if (isset($_POST['save'])) {
            $data['sub_activity'] = $this->input->post('sub_activity');
            $data['activity_id'] = $this->input->post('activity');
            $data['updated_by'] = $this->session->userdata('user_id');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_configure->sub_activity_update($id, $data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been updated successfully.');
                redirect('configure/sub_activity_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not updated successfully.');
            }
        }
        $data['sub_activity_edit'] = $this->mod_configure->sub_activity_edit($id);
        $data['major_activity_list'] = $this->mod_configure->major_activity_list();
        $data['dir'] = 'configure';
        $data['page'] = 'sub_activity_edit';
        $this->load->view('main', $data);
    }

    public function sub_activity_active_or_inactive($id, $flag)
    {
        if ($flag == 1) {
            $reset_flag = 0;
        } else {
            $reset_flag = 1;
        }
        $data['is_active'] = $reset_flag;
        $data['updated_by'] = $this->session->userdata('user_id');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $success = $this->mod_configure->sub_activity_update($id, $data);
        if ($success) {
            $this->session->set_flashdata('success', 'Data has been updated.');
            redirect('configure/sub_activity_list');
        } else {
            $this->session->set_flashdata('error', 'Data has not updated successfully.');
        }
    }
    //Code for Deliverables
    public function performance_indicator_list()
    {
        $data['rows'] = $this->mod_configure->performance_indicator_list();
        $data['last_query'] = urlencode(base64_encode($this->db->last_query()));
        $data['excel_page_name'] = urlencode(base64_encode("Performance Indicator List"));
        $data['dir'] = 'configure';
        $data['page'] = 'performance_indicator_list';
        $this->load->view('main', $data);
    }

    public function performance_indicator_add()
    {
        if (isset($_POST['save'])) {
            $data['indicator_name'] = $this->input->post('indicator');
            $data['sub_activity_id'] = $this->input->post('sub_activity');
            $data['unit_of_indicator'] = $this->input->post('unit_of_indicator');
            $data['unit_of_measure'] = $this->input->post('unit_of_measure');
            $data['is_active'] = 1;
            $data['created_by'] = $this->session->userdata('user_id');
            $data['created_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_configure->performance_indicator_add($data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('configure/performance_indicator_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['sub_activity_list'] = $this->mod_configure->sub_activity_list();
        $data['dir'] = 'configure';
        $data['page'] = 'performance_indicator_entry';
        $this->load->view('main', $data);
    }

    public function performance_indicator_edit($id)
    {
        if (isset($_POST['save'])) {
            $data['indicator_name'] = $this->input->post('indicator');
            $data['sub_activity_id'] = $this->input->post('sub_activity');
            $data['unit_of_indicator'] = $this->input->post('unit_of_indicator');
            $data['unit_of_measure'] = $this->input->post('unit_of_measure');
            $data['updated_by'] = $this->session->userdata('user_id');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_configure->performance_indicator_update($id, $data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been updated successfully.');
                redirect('configure/performance_indicator_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not updated successfully.');
            }
        }
        $data['performance_indicator_edit'] = $this->mod_configure->performance_indicator_edit($id);
        $data['major_activity_list'] = $this->mod_configure->major_activity_list();
        $data['sub_activity_list'] = $this->mod_configure->sub_activity_list();
        $data['unit_of_indicator_list'] = $this->mod_configure->unit_of_indicator_list();
        $data['dir'] = 'configure';
        $data['page'] = 'performance_indicator_edit';
        $this->load->view('main', $data);
    }

    public function performance_indicator_active_or_inactive($id, $flag)
    {
        if ($flag == 1) {
            $reset_flag = 0;
        } else {
            $reset_flag = 1;
        }
        $data['is_active'] = $reset_flag;
        $data['updated_by'] = $this->session->userdata('user_id');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $success = $this->mod_configure->performance_indicator_update($id, $data);
        if ($success) {
            $this->session->set_flashdata('success', 'Data has been updated.');
            redirect('configure/performance_indicator_list');
        } else {
            $this->session->set_flashdata('error', 'Data has not updated successfully.');
        }
    }
}
