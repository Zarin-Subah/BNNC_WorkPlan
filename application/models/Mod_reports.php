<?php

class Mod_reports extends CI_Model
{

    public function work_plan_list()
    {
        $extra_condition = "";
        if (!empty($_POST)) {
            if (!empty($_POST['finance_year'])) {
                $extra_condition .= " and finance_year='$_POST[finance_year]'";
            }
            if (!empty($_POST['thematic_area'])) {
                $extra_condition .= " and thematic_area_id='$_POST[thematic_area]'";
            }
        }
        $query = $this->db->query("select * from view_wp_master where 1=1 $extra_condition order by finance_year desc");
        return $query->result_array();
    }

    public function work_plan_view_master($master_id)
    {
        $query = $this->db->query("SELECT * FROM view_wp_master WHERE id='$master_id'");
        return $query->result_array();
    }

    public function work_plan_view_details($master_id)
    {
        $query = $this->db->query("SELECT * FROM view_wp_details WHERE wp_master_id='$master_id' order by id asc");
        return $query->result_array();
    }

    public function work_progress_list()
    {
        $extra_condition = "";
        if (!empty($_POST)) {
            if (!empty($_POST['finance_year'])) {
                $extra_condition .= " and finance_year='$_POST[finance_year]'";
            }
            if (!empty($_POST['ministry'])) {
                $extra_condition .= " and ministry_id='$_POST[ministry]'";
            }
        }
        $query = $this->db->query("SELECT * from view_wpro_master");
        return $query->result_array();
    }

    public function ten_years_work_plan_list()
    {
        $query = $this->db->query("select * from view_ten_years_wp where 1=1");
        return $query->result_array();
    }

    public function work_progress_view_master($master_id)
    {
        $query = $this->db->query("SELECT * FROM view_wpro_master WHERE id='$master_id'");
        return $query->result_array();
    }

    public function work_progress_view_details($master_id)
    {
        $query = $this->db->query("SELECT * FROM view_wpro_details WHERE wpro_master_id='$master_id' order by id asc");
        return $query->result_array();
    }
}
