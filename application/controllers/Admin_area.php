<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_area extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mod_admin_area');
        if ((!$this->session->userdata('user_id')) || ($this->session->userdata('user_type') != 'Super Admin')) {
            redirect('login');
        }
    }

    public function index() {
        $data['dir'] = 'admin_area';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }

    public function fiscal_year_list() {
        $data['rows'] = $this->mod_admin_area->fiscal_year_list();
        $data['last_query'] = urlencode(base64_encode($this->db->last_query()));
        $data['excel_page_name'] = urlencode(base64_encode("Fiscal Year List"));
        $data['dir'] = 'admin_area';
        $data['page'] = 'fiscal_year_list';
        $this->load->view('main', $data);
    }

    public function fiscal_year_add() {
        if (isset($_POST['save'])) {
            $data['fiscal_year'] = $this->input->post('fiscal_year');
            $data['row_color'] = $this->input->post('row_color');
            $data['is_active'] = 1;
            $data['created_by'] = $this->session->userdata('user_id');
            $data['created_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_admin_area->fiscal_year_add($data);
            if ($success) {
                $this->session->set_flashdata('success', 'Fiscal year has been submitted successfully.');
                redirect('admin_area/fiscal_year_list');
            } else {
                $this->session->set_flashdata('error', 'Fiscal year has not submitted successfully.');
            }
        }
        $data['dir'] = 'admin_area';
        $data['page'] = 'fiscal_year_entry';
        $this->load->view('main', $data);
    }

    public function fiscal_year_edit($id) {
        if (isset($_POST['save'])) {
            $data['fiscal_year'] = $this->input->post('fiscal_year');
            $data['row_color'] = $this->input->post('row_color');
            $data['is_active'] = $this->input->post('is_active');
            $data['updated_by'] = $this->session->userdata('user_id');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_admin_area->fiscal_year_update($id, $data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('admin_area/fiscal_year_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['fiscal_year_edit'] = $this->mod_admin_area->fiscal_year_edit($id);
        $data['dir'] = 'admin_area';
        $data['page'] = 'fiscal_year_edit';
        $this->load->view('main', $data);
    }

    public function fiscal_year_inactive($id) {
        $data = array(
            'is_active' => 0,
            'updated_by' => $this->session->userdata('user_id'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $del = $this->db->update('fiscal_year', $data);
        if ($del) {
            $this->session->set_flashdata('success', 'Fiscal year inactivated successfully');
        }
        redirect('admin_area/fiscal_year_list');
    }

    public function thematic_area_list() {
        $data['rows'] = $this->mod_admin_area->thematic_area_list();
        $data['last_query'] = urlencode(base64_encode($this->db->last_query()));
        $data['excel_page_name'] = urlencode(base64_encode("Committee List"));
        $data['dir'] = 'admin_area';
        $data['page'] = 'thematic_area_list';
        $this->load->view('main', $data);
    }

    public function thematic_area_add() {
        if (isset($_POST['save'])) {
            $data['name'] = $this->input->post('name');
            $data['f_name'] = $this->input->post('f_name');
            $data['f_designation'] = $this->input->post('f_designation');
            $data['f_mobile'] = $this->input->post('f_mobile');
            $data['f_phone'] = $this->input->post('f_phone');
            $data['f_email'] = $this->input->post('f_email');
            $data['is_active'] = 1;
            $data['created_by'] = $this->session->userdata('user_id');
            $data['created_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_admin_area->thematic_area_add($data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('admin_area/thematic_area_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['ministry_list'] = $this->mod_admin_area->thematic_area_list();
        $data['dir'] = 'admin_area';
        $data['page'] = 'thematic_area_entry';
        $this->load->view('main', $data);
    }

    public function thematic_area_edit($id) {
        if (isset($_POST['save'])) {
            $data['name'] = $this->input->post('name');
            $data['f_name'] = $this->input->post('f_name');
            $data['f_designation'] = $this->input->post('f_designation');
            $data['f_mobile'] = $this->input->post('f_mobile');
            $data['f_phone'] = $this->input->post('f_phone');
            $data['f_email'] = $this->input->post('f_email');
            $data['updated_by'] = $this->session->userdata('user_id');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_admin_area->thematic_area_update($id, $data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('admin_area/thematic_area_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['ministry_edit'] = $this->mod_admin_area->thematic_area_edit($id);
        $data['dir'] = 'admin_area';
        $data['page'] = 'thematic_area_edit';
        $this->load->view('main', $data);
    }

    public function thematic_area_active_or_inactive($id, $flag) {
        if ($flag == 1) {
            $reset_flag = 0;
        } else {
            $reset_flag = 1;
        }
        $data['is_active'] = $reset_flag;
        $data['updated_by'] = $this->session->userdata('user_id');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $success = $this->mod_admin_area->thematic_area_update($id, $data);
        if ($success) {
            $this->session->set_flashdata('success', 'Data has been updated.');
            redirect('admin_area/thematic_area_list');
        } else {
            $this->session->set_flashdata('error', 'Data has not updated successfully.');
        }
    }

    public function user_list() {
        $data['rows'] = $this->mod_admin_area->user_list();
        $data['last_query'] = urlencode(base64_encode($this->db->last_query()));
        $data['excel_page_name'] = urlencode(base64_encode("Committee List"));
        $data['dir'] = 'admin_area';
        $data['page'] = 'user_list';
        $this->load->view('main', $data);
    }

    public function user_add() {
        if (isset($_POST['save'])) {
            $data['user_name'] = $this->input->post('user_name');
            $data['login_id'] = $this->input->post('login_id');
            $data['login_password'] = md5($this->input->post('login_password'));
            $data['user_type'] = $this->input->post('user_type');
            $data['thematic_area_id'] = $this->input->post('thematic_area_id');
            $data['is_active'] = $this->input->post('is_active');
            $data['created_by'] = $this->session->userdata('user_id');
            $data['created_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_admin_area->add_user($data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('admin_area/user_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['thematic_area_list'] = $this->mod_admin_area->thematic_area_list();
        $data['dir'] = 'admin_area';
        $data['page'] = 'user_entry';
        $this->load->view('main', $data);
    }

    public function user_edit($id) {
        if (isset($_POST['save'])) {
            $data['user_name'] = $this->input->post('user_name');
            $data['login_id'] = $this->input->post('login_id');
            if (!empty($this->input->post('login_password'))) {
                $data['login_password'] = md5($this->input->post('login_password'));
            }
            $data['user_type'] = $this->input->post('user_type');
            $data['thematic_area_id'] = $this->input->post('thematic_area_id');
            $data['is_active'] = $this->input->post('is_active');
            $data['updated_by'] = $this->session->userdata('user_id');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $success = $this->mod_admin_area->user_update($id, $data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('admin_area/user_list');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['thematic_area_list'] = $this->mod_admin_area->thematic_area_list();
        $data['user_edit'] = $this->mod_admin_area->user_edit($id);
        $data['dir'] = 'admin_area';
        $data['page'] = 'user_edit';
        $this->load->view('main', $data);
    }

    public function user_delete($id) {
        $del = $this->db->delete('users', array('id' => $id));
        if ($del) {
            $this->session->set_flashdata('success', 'User Deleted Successfully');
        }
        redirect('admin_area/user_list');
    }

}
