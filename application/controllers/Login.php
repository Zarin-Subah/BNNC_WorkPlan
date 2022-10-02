<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mod_login');
    }

    public function index() {
        if (!empty($_POST)) {
            $data['login_id'] = htmlspecialchars($this->input->post('login_id'));
            $data['login_password'] = htmlspecialchars($this->input->post('login_password'));
            $valid = $this->mod_login->user_check($data);
            if ($valid) {
                foreach ($valid as $valid) {
                    $this->session->set_userdata('user_id', $valid['id']);
                    $this->session->set_userdata('user_name', $valid['user_name']);
                    $this->session->set_userdata('user_type', $valid['user_type']);
                    $this->session->set_userdata('ministry_id', $valid['ministry_id']);
                    $this->session->set_userdata('is_logged_id', TRUE);
                }
                $log_data['user_id'] = $this->session->userdata('user_id');
                $log_data['mode'] = 'Login';
                $log_data['date_time'] = date('Y-m-d H:i:s');
                $this->mod_login->add_login_history($log_data);
                $this->session->set_flashdata('success', 'Logged in successfully.');
                if ($valid['user_type'] == 'Super Admin') {
                    redirect('admin_area');
                } elseif ($valid['user_type'] == 'Ministry') {
                    redirect('data_entry');
                }
            } else {
                $this->session->set_flashdata('error', 'Worng Username or Password');
            }
        }
        $this->load->view('pages/login');
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('organization_id');
        $this->session->unset_userdata('organization_group');
        $this->session->unset_userdata('organization_type');
        $this->session->unset_userdata('is_logged_id');
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Logged Out.');
        redirect('dashboard');
    }

    public function changePass() {


        if ($this->input->post('change_pass')) {

            $new_pass = $this->input->post('new_pass');
            $confirm_pass = $this->input->post('confirm_pass');
            $session_id = $this->session->userdata('user_id');
            if (($new_pass != "" && $confirm_pass != "") & ($new_pass == $confirm_pass)) {
                $this->mod_login->change_pass($session_id, $new_pass);
                $this->session->set_flashdata('success', 'Password changed successfully!');
                redirect('data_entry');
            } else {
                $this->session->set_flashdata('error', 'Password Not Match');
            }
        }
        $data['dir'] = 'pages';
        $data['page'] = 'change_password';
        $this->load->view('main', $data);
    }

}
