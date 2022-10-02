<?php

class Mod_export extends CI_Model {

    public function data_query($query) {
        $query = $this->db->query($query);
        return $query->result_array();
    }

}
