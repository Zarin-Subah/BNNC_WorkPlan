<?php

class Mod_admin_area extends CI_Model
{

    public function fiscal_year_list()
    {
        $query = $this->db->query("select * from fiscal_year order by id desc");
        return $query->result_array();
    }

    public function fiscal_year_add($data)
    {
        $success = $this->db->insert('fiscal_year', $data);
        if ($success) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function fiscal_year_edit($id)
    {
        $query = $this->db->query("SELECT * FROM fiscal_year WHERE id='$id'");
        return $query->result_array();
    }

    public function fiscal_year_update($id, $data)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('fiscal_year', $data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function thematic_area_list()
    {
        $query = $this->db->query("select * from thematic_area where 1=1 order by name asc");
        return $query->result_array();
    }

    public function thematic_area_add($data)
    {
        $success = $this->db->insert('thematic_area', $data);
        if ($success) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function thematic_area_edit($id)
    {
        $query = $this->db->query("SELECT * FROM thematic_area WHERE id='$id'");
        return $query->result_array();
    }

    public function thematic_area_update($id, $data)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('thematic_area', $data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function responsibility_list()
    {
        $query = $this->db->query("SELECT * FROM responsibilities order by responsibility asc");
        return $query->result_array();
    }
    public function partner_list()
    {
        $query = $this->db->query("SELECT * FROM partners order by partner asc");
        return $query->result_array();
    }

    public function user_list()
    {
        $query = $this->db->query("SELECT *,(SELECT `name` FROM `thematic_area` WHERE id=users.thematic_area_id) AS thematic_area FROM `users` ORDER BY id ASC");
        return $query->result_array();
    }

    public function add_user($data)
    {
        $success = $this->db->insert('users', $data);
        if ($success) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function user_edit($id)
    {
        $query = $this->db->query("SELECT * FROM users WHERE id='$id'");
        return $query->result_array();
    }

    public function user_update($id, $data)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('users', $data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
