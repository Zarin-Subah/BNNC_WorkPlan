<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mod_other');
        $this->load->model('mod_profile');
    }

    public function user_profile() {
        if (isset($_POST['save'])) {
            $data['name'] = $this->input->post('name');
            $data['name_bangla'] = $this->input->post('name_bangla');
            $data['name_short'] = $this->input->post('name_short');
            $data['f_name'] = $this->input->post('f_name');
            $data['f_designation'] = $this->input->post('f_designation');
            $data['f_mobile'] = $this->input->post('f_mobile');
            $data['f_phone'] = $this->input->post('f_phone');
            $data['f_email'] = $this->input->post('f_email');
            $data['af_name'] = $this->input->post('af_name');
            $data['af_designation'] = $this->input->post('af_designation');
            $data['af_mobile'] = $this->input->post('af_mobile');
            $data['af_phone'] = $this->input->post('af_phone');
            $data['af_email'] = $this->input->post('af_email');
            $id=$this->session->userdata('ministry_id');
            $success = $this->mod_profile->p_ministry_update($id,$data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data has been submitted successfully.');
                redirect('profile/user_profile');
            } else {
                $this->session->set_flashdata('error', 'Data has not submitted successfully.');
            }
        }
        $data['row'] = $this->mod_profile->user_profile();
        $data['dir'] = 'pages';
        $data['page'] = 'profile';
        $this->load->view('main', $data);
    }

}
