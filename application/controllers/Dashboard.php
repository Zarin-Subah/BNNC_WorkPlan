<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_other');
        $this->load->model('mod_dashboard');
        $this->load->model('mod_admin_area');
    }

    public function index()
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
        $data['national_activity_summary'] = $this->mod_dashboard->national_activity_summary($selected_fiscal_year);
        $data['summary_table_of_activity_by_sector_rows'] = $this->mod_dashboard->summary_table_of_activity_by_sector($selected_fiscal_year);
        $data['progress_according_to_thematic_areas_rows'] = $this->mod_dashboard->progress_according_to_thematic_areas($selected_fiscal_year);
        //$data['trend_of_fund_allocation_by_period_rows'] = $this->mod_dashboard->trend_of_fund_allocation_by_period();
        $data['dir'] = 'dashboard';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }

    public function error_404()
    {
        $data['dir'] = "pages";
        $data['page'] = "custom_404";
        $this->load->view('main', $data);
    }
}
