<?php

class Mod_login extends CI_Model {

    public function user_check($data) {
        $login_id = $data['login_id'];
        $login_password = md5($data['login_password']);
        $query = $this->db->query("SELECT u.* from users as u left join thematic_area as t on u.thematic_area_id=t.id WHERE login_id='$login_id' and login_password='$login_password' and u.is_active=1");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function add_login_history($log_data) {
        $success = $this->db->insert('login_history', $log_data);
        if ($success) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function view_login_history() {
        $query = $this->db->query("SELECT *,SUBSTR(date_time,1,10) AS date,SUBSTR(date_time,11,10) AS time FROM (SELECT m.id AS member_id,m.`first_name`,m.`last_name`,log.id,log.mode,MAX(log.`date_time`)  AS date_time FROM `member` AS m LEFT JOIN `login_history` AS LOG ON m.id = log.`user_id` WHERE m.id != '999' GROUP BY log.`user_id` ORDER BY member_id ASC) AS a ");
        return $query->result_array();
    }

    function change_pass($session_id, $new_pass) {
        $a = md5($new_pass);
        $update_pass = $this->db->query("UPDATE users set login_password='$a'  where id='$session_id'");
        if ($update_pass) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
