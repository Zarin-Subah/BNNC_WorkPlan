<?php

class Mod_profile extends CI_Model {

    public function user_profile() {
       
        $ministry_id = $this->session->userdata('ministry_id');
        $condition = "where ministry_id='$ministry_id'";
        $query = $this->db->query("SELECT * FROM `users` LEFT JOIN `ministry` ON users.ministry_id=ministry.id $condition ORDER BY `users`.`id`");
        return $query->result_array();
    }

    
    public function  p_ministry_update($id, $data) {
        $this->db->where('id', $id);
        $update = $this->db->update('ministry', $data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
