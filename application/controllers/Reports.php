<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_reports');
        $this->load->model('mod_other');
        if ((!$this->session->userdata('user_id')) || ($this->session->userdata('is_logged_id') != 'TRUE')) {
            redirect('login');
        }
    }

    //UNCC and DNCC Reports Start
    public function index()
    {
        $data['dir'] = 'reports';
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
        $data['thematic_area_list'] = $this->mod_other->thematic_area_list();
        $data['rows'] = $this->mod_reports->work_plan_list();
        $data['dir'] = 'reports';
        $data['page'] = 'work_plan_list';
        $this->load->view('main', $data);
    }

    public function work_plan_view($master_id)
    {
        $data['master_row'] = $this->mod_reports->work_plan_view_master($master_id);
        $data['rows'] = $this->mod_reports->work_plan_view_details($master_id);
        $this->load->view('reports/work_plan_view', $data);
    }

    public function ten_years_work_plan_list()
    {
        $data['rows'] = $this->mod_reports->ten_years_work_plan_list();
        $data['dir'] = 'reports';
        $data['page'] = 'ten_years_work_plan_list';
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
        $data['thematic_area_list'] = $this->mod_other->thematic_area_list();
        $data['rows'] = $this->mod_reports->work_progress_list();
        $data['dir'] = 'reports';
        $data['page'] = 'work_progress_list';
        $this->load->view('main', $data);
    }

    public function work_progress_view($master_id)
    {
        $data['master_row'] = $this->mod_reports->work_progress_view_master($master_id);
        $data['rows'] = $this->mod_reports->work_progress_view_details($master_id);
        $this->load->view('reports/work_progress_view', $data);
    }
}
