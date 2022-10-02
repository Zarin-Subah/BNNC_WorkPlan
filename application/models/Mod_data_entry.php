<?php

class Mod_data_entry extends CI_Model
{

    protected $CI;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->CI = &get_instance();
    }

    public function work_plan_master_add()
    {
        $data['thematic_area_id'] = $_POST['thematic_area'];
        $data['finance_year'] = $_POST['finance_year'];
        $data['created_by'] = $this->session->userdata('user_id');
        $data['created_at'] = date('Y-m-d H:i:s');
        $success = $this->db->insert('wp_master', $data);
        if ($success) {
            $insert_id = $this->db->insert_id();
            $this->work_plan_details_add($insert_id);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function work_plan_details_add($master_id)
    {
        $count = count($_POST['indicator']);
        for ($i = 0; $i < $count; $i++) {
            if (!empty($_POST['indicator'][$i])) {
                $entries[] = array(
                    'wp_master_id' => $master_id,
                    'activity_id' => $_POST['activity'][$i],
                    'sub_activity_id' => $_POST['sub_activity'][$i],
                    'indicator_id' => $_POST['indicator'][$i],
                    'baseline' => $_POST['baseline'][$i],
                    'target_value' => $_POST['target_value'][$i],
                    'quarter1' => $_POST['quarter1'][$i],
                    'quarter1_value' => $_POST['quarter1_value'][$i],
                    'quarter2' => $_POST['quarter2'][$i],
                    'quarter2_value' => $_POST['quarter2_value'][$i],
                    'quarter3' => $_POST['quarter3'][$i],
                    'quarter3_value' => $_POST['quarter3_value'][$i],
                    'quarter4' => $_POST['quarter4'][$i],
                    'quarter4_value' => $_POST['quarter4_value'][$i],
                    'budget' => $_POST['budget'][$i],
                    'responsibilities' => $_POST['responsibilities'][$i],
                    'partners' => $_POST['partners'][$i],
                    'remarks' => $_POST['remarks'][$i],
                    'created_by' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d H:i:s'),
                );
            }
        }
        $this->db->insert_batch('wp_details', $entries);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function work_plan_master_update($wp_id)
    {
        $data['thematic_area_id'] = $_POST['thematic_area'];
        $data['finance_year'] = $_POST['finance_year'];
        $data['updated_by'] = $this->session->userdata('user_id');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $wp_id);
        $update = $this->db->update('wp_master', $data);
        if ($update) {
            $this->work_plan_details_update($wp_id);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function work_plan_details_update($master_id)
    {
        $entries_update = "";
        $entries_insert = "";
        $count = count($_POST['indicator']);
        for ($i = 0; $i < $count; $i++) {
            if (!empty($_POST['indicator'][$i])) {
                if ($_POST['id'][$i] != '') {
                    $entries_update[] = array(
                        'id' => $_POST['id'][$i],
                        'activity_id' => $_POST['activity'][$i],
                        'sub_activity_id' => $_POST['sub_activity'][$i],
                        'indicator_id' => $_POST['indicator'][$i],
                        'baseline' => $_POST['baseline'][$i],
                        'target_value' => $_POST['target_value'][$i],
                        'quarter1' => $_POST['quarter1'][$i],
                        'quarter1_value' => $_POST['quarter1_value'][$i],
                        'quarter2' => $_POST['quarter2'][$i],
                        'quarter2_value' => $_POST['quarter2_value'][$i],
                        'quarter3' => $_POST['quarter3'][$i],
                        'quarter3_value' => $_POST['quarter3_value'][$i],
                        'quarter4' => $_POST['quarter4'][$i],
                        'quarter4_value' => $_POST['quarter4_value'][$i],
                        'budget' => $_POST['budget'][$i],
                        'responsibilities' => $_POST['responsibilities'][$i],
                        'partners' => $_POST['partners'][$i],
                        'remarks' => $_POST['remarks'][$i],
                        'updated_by' => $this->session->userdata('user_id'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                } else {
                    $entries_insert[] = array(
                        'wp_master_id' => $master_id,
                        'activity_id' => $_POST['activity'][$i],
                        'sub_activity_id' => $_POST['sub_activity'][$i],
                        'indicator_id' => $_POST['indicator'][$i],
                        'baseline' => $_POST['baseline'][$i],
                        'target_value' => $_POST['target_value'][$i],
                        'quarter1' => $_POST['quarter1'][$i],
                        'quarter1_value' => $_POST['quarter1_value'][$i],
                        'quarter2' => $_POST['quarter2'][$i],
                        'quarter2_value' => $_POST['quarter2_value'][$i],
                        'quarter3' => $_POST['quarter3'][$i],
                        'quarter3_value' => $_POST['quarter3_value'][$i],
                        'quarter4' => $_POST['quarter4'][$i],
                        'quarter4_value' => $_POST['quarter4_value'][$i],
                        'budget' => $_POST['budget'][$i],
                        'responsibilities' => $_POST['responsibilities'][$i],
                        'partners' => $_POST['partners'][$i],
                        'remarks' => $_POST['remarks'][$i],
                        'created_by' => $this->session->userdata('user_id'),
                        'created_at' => date('Y-m-d H:i:s'),
                    );
                }
            }
        }
        $this->db->update_batch('wp_details', $entries_update, 'id');
        if ($entries_insert != "") {
            $this->db->insert_batch('wp_details', $entries_insert);
        }
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

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

    public function work_plan_update($id, $data)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('wp_master', $data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function work_plan_master_edit($master_id)
    {
        $query = $this->db->query("SELECT * FROM view_wp_master WHERE id='$master_id'");
        return $query->result_array();
    }

    public function work_plan_details_edit($master_id)
    {
        $query = $this->db->query("SELECT * FROM view_wp_details WHERE wp_master_id='$master_id' order by id asc");
        return $query->result_array();
    }

    public function work_progress_master_edit($master_id)
    {
        $query = $this->db->query("SELECT * FROM view_wpro_master WHERE id='$master_id'");
        return $query->result_array();
    }

    public function work_progress_details_edit($master_id)
    {
        $query = $this->db->query("SELECT * FROM view_wpro_details WHERE wpro_master_id='$master_id' order by id asc");
        return $query->result_array();
    }

    public function work_plan_signed_copy_add($id, $file_name)
    {
        $success = $this->db->query("update wp_master set signed_copy='$file_name' WHERE id='$id'");
        if ($success) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function work_progress_master_add($work_plan_master_id)
    {
        $data['wp_master_id'] = $work_plan_master_id;
        $data['thematic_area_id'] = $_POST['thematic_area'];
        $data['finance_year'] = $_POST['finance_year'];
        $data['period'] = $_POST['period'];
        $data['created_by'] = $this->session->userdata('user_id');
        $data['created_at'] = date('Y-m-d H:i:s');
        $success = $this->db->insert('wpro_master', $data);
        if ($success) {
            $work_progress_master_id = $this->db->insert_id();
            $this->work_progress_details_add($work_progress_master_id, $work_plan_master_id);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function work_progress_details_add($work_progress_master_id, $work_plan_master_id)
    {
        $count = count($_POST['progress_value']);
        echo "<br/>";
        echo "<pre>";
        print_r($_POST);
        for ($i = 0; $i < $count; $i++) {
            if (!empty($_POST['wp_details_id'][$i])) {
                $entries[] = array(
                    'wp_master_id' => $work_plan_master_id,
                    'wp_details_id' => $_POST['wp_details_id'][$i],
                    'wpro_master_id' => $work_progress_master_id,
                    'progress_status' => $_POST['progress_status'][$i],
                    'progress_value' => $_POST['progress_value'][$i],
                    'progress_comment' => $_POST['progress_comment'][$i],
                    'expenditure' => $_POST['expenditure'][$i],
                    'created_by' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d H:i:s'),
                );
            }
        }
        $this->db->insert_batch('wpro_details', $entries);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function work_progress_master_update($work_progress_master_id)
    {
        $data['thematic_area_id'] = $_POST['thematic_area'];
        $data['finance_year'] = $_POST['finance_year'];
        $data['period'] = $_POST['period'];
        $data['updated_by'] = $this->session->userdata('user_id');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $work_progress_master_id);
        $success = $this->db->update('wpro_master', $data);
        if ($success) {
            $this->work_progress_details_update($work_progress_master_id);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function work_progress_details_update($work_progress_master_id)
    {
        $count = count($_POST['progress_value']);
        for ($i = 0; $i < $count; $i++) {
            if (!empty($_POST['progress_value'][$i])) {
                $entries[] = array(
                    'id' => $_POST['id'][$i],
                    'progress_status' => $_POST['progress_status'][$i],
                    'progress_value' => $_POST['progress_value'][$i],
                    'progress_comment' => $_POST['progress_comment'][$i],
                    'expenditure' => $_POST['expenditure'][$i],
                    'updated_by' => $this->session->userdata('user_id'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
            }
        }
        $this->db->update_batch('wpro_details', $entries, 'id');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function work_progress_list()
    {
        $extra_condition = "";
        if (!empty($_POST)) {
            if (!empty($_POST['finance_year'])) {
                $extra_condition .= " and finance_year='$_POST[finance_year]'";
            }
            if (!empty($_POST['period'])) {
                $extra_condition .= " and period='$_POST[period]'";
            }
            if (!empty($_POST['ministry'])) {
                $extra_condition .= " and (thematic_area_id='$_POST[thematic_area]')";
            }
        }
        $query = $this->db->query("select * from view_wpro_master $extra_condition");
        return $query->result_array();
    }
}
