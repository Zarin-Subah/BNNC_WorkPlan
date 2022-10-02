<?php

class Mod_other extends CI_Model
{

    public function thematic_area_list()
    {
        $query = $this->db->query("select * from thematic_area where 1=1 order by id desc");
        return $query->result_array();
    }

    public function division_list()
    {
        $query = $this->db->query("SELECT * FROM divisions ORDER BY division_name ASC");
        return $query->result_array();
    }

    public function district_list($division_id = '')
    {
        $condition = " 1=1";
        if ($division_id != '') {
            $condition .= " and division_id='$division_id'";
        }
        $query = $this->db->query("SELECT * FROM districts where $condition ORDER BY district_name ASC");
        return $query->result_array();
    }

    public function upazila_list($district_id = '')
    {
        $condition = " 1=1";
        if ($district_id != '') {
            $condition .= " and district_id='$district_id'";
        }
        $query = $this->db->query("SELECT * FROM upazilas where $condition ORDER BY upazila_name ASC");
        return $query->result_array();
    }

    public function sub_strategy_list($strategy_code)
    {
        $condition = " 1=1";
        if ($strategy_code != '') {
            $condition .= " and strategy_code='$strategy_code'";
        }
        $query = $this->db->query("SELECT sub_strategy_code FROM activities where length(sub_strategy_code)>0 and $condition group by sub_strategy_code ORDER BY id ASC");
        return $query->result_array();
    }

    public function activity_list($thematic_area_id)
    {
        $query = $this->db->query("SELECT id,activity_name FROM activities where thematic_area='$thematic_area_id' ORDER BY id ASC");
        return $query->result_array();
    }

    public function sub_activity_list($activity_id = '')
    {
        $condition = " 1=1";
        if ($activity_id != '') {
            $condition .= " and activity_id='$activity_id'";
        }
        $query = $this->db->query("SELECT * FROM sub_activities where $condition ORDER BY id ASC");
        return $query->result_array();
    }

    public function indicator_list($sub_activity_id = '')
    {
        $condition = " 1=1";
        if ($sub_activity_id != '') {
            $condition .= " and sub_activity_id='$sub_activity_id'";
        }
        $query = $this->db->query("SELECT * FROM indicators where $condition ORDER BY id ASC");
        return $query->result_array();
    }

    public function period()
    {
        $period_list = array(
            array('period_en' => 'July-June')
        );
        return $period_list;
    }

    public function years()
    {
        $start_year = date('Y') - 2;
        $end_year = date('Y') + 6;
        $years = range($start_year, $end_year);
        return $years;
    }

    public function ten_years()
    {
        $years = array('2015-2024', '2016-2025', '2017-2026', '2018-2027', '2019-2028', '2020-2029', '2021-2030', '2022-2031', '2023-2032', '2024-2033', '2025-2034', '2026-2035', '2027-2036', '2028-2037', '2029-2038', '2030-3039');
        return $years;
    }

    public function fiscal_year()
    {
        $query = $this->db->query("SELECT * FROM fiscal_year where is_active=1 ORDER BY id desc");
        return $query->result_array();
    }

    public function selected_fiscal_year()
    {
        $query = $this->db->query("SELECT * FROM fiscal_year where is_active=1 ORDER BY id desc limit 1,1");
        foreach ($query->result() as $row) {
            $fiscal_year = $row->fiscal_year;
        }
        return $fiscal_year;
    }
}
