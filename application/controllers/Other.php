<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Other extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mod_other');
    }

    public function district_list() {
        $division_id = $this->input->post('division_id');
        $data['district_list'] = $this->mod_other->district_list($division_id);
        $this->load->view('pages/district', $data);
    }

    public function upazila_list() {
        $district_id = $this->input->post('district_id');
        $data['upazlia_list'] = $this->mod_other->upazila_list($district_id);
        $this->load->view('pages/upazila', $data);
    }

    public function sub_strategy_list() {
        $strategy_code = $this->input->post('strategy_code');
        $data['sub_strategry_list'] = $this->mod_other->sub_strategy_list($strategy_code);
        $data['activity_list'] = $this->mod_other->activity_list($strategy_code, 1);
        echo json_encode($data);
    }

    public function activity_list() {
        $thematic_area_id = $this->input->post('thematic_area_id');
        $data['activity_list'] = $this->mod_other->activity_list($thematic_area_id);
        echo json_encode($data);
    }

    public function sub_activity_list() {
        $activity_id = $this->input->post('activity_id');
        $data['sub_activity_list'] = $this->mod_other->sub_activity_list($activity_id);
        $this->load->view('pages/sub_activity', $data);
    }

    public function indicator_list() {
        $sub_activity_id = $this->input->post('sub_activity_id');
        $data['indicator_list'] = $this->mod_other->indicator_list($sub_activity_id);
        $this->load->view('pages/indicator', $data);
    }

}
