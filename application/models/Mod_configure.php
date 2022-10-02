<?php

class Mod_configure extends CI_Model
{

    public function major_activity_list($thematic_area_id = "")
    {
        $condition = "";
        if ($thematic_area_id > 0) {
            $condition .= " and a.thematic_area='$thematic_area_id'";
        }
        $query = $this->db->query("select a.*,t.name as thematic_area_name from activities as a left join thematic_area as t on a.thematic_area=t.id where 1=1 $condition order by a.activity_name asc");
        return $query->result_array();
    }

    public function major_activity_add($data)
    {
        $success = $this->db->insert('activities', $data);
        if ($success) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function major_activity_edit($id)
    {
        $query = $this->db->query("SELECT * FROM activities WHERE id='$id'");
        return $query->result_array();
    }

    public function major_activity_update($id, $data)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('activities', $data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function sub_activity_list()
    {
        $query = $this->db->query("SELECT `sub_activities`.*,activities.`activity_name`,thematic_area.`name` FROM `sub_activities` LEFT JOIN `activities` ON sub_activities.`activity_id`=activities.id LEFT JOIN `thematic_area` ON activities.`thematic_area`=thematic_area.`id` where 1=1 order by sub_activities.sub_activity asc");
        return $query->result_array();
    }

    public function sub_activity_add($data)
    {
        $success = $this->db->insert('sub_activities', $data);
        if ($success) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function sub_activity_edit($id)
    {
        $query = $this->db->query("SELECT * FROM view_sub_activities WHERE id='$id'");
        return $query->result_array();
    }

    public function sub_activity_update($id, $data)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('sub_activities', $data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function performance_indicator_list()
    {
        $query = $this->db->query("SELECT * FROM `indicators` JOIN `view_indicator_list` ON indicators.id=view_indicator_list.`indicator_id` ORDER BY `indicators`.`indicator_name` asc");
        return $query->result_array();
    }

    public function performance_indicator_add($data)
    {
        $success = $this->db->insert('indicators', $data);
        if ($success) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function performance_indicator_edit($id)
    {
        $query = $this->db->query("SELECT * FROM view_indicator_list WHERE indicator_id='$id'");
        return $query->result_array();
    }

    public function performance_indicator_update($id, $data)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('indicators', $data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function unit_of_indicator_list()
    {
        $query = $this->db->query("SELECT distinct(unit_of_indicator) from indicators");
        return $query->result_array();
    }
}
