<?php

class Mod_dashboard extends CI_Model {

    public function national_activity_summary($selected_fiscal_year) {
        $extra_condition = "";
        if (!empty($_POST)) {
            if (!empty($_POST['finance_year'])) {
                $extra_condition.=" and finance_year='$_POST[finance_year]'";
            }
            if (!empty($_POST['ministry'])) {
                $extra_condition.=" and (ministry_id='$_POST[ministry]' or parent_id='$_POST[ministry]')";
            }
        } else {
            $extra_condition.=" and finance_year='$selected_fiscal_year'";
        }
        $query = $this->db->query("SELECT IFNULL(SUM(number_of_activity),0) AS total_activity,IFNULL(SUM(completed_activity),0) AS completed_activity,IFNULL(SUM(ongoing_activity),0) AS ongoing_activity,IFNULL(SUM(no_progress_activity),0) AS no_progress_activity FROM `view_wp_details_summary` WHERE progress_value_en is not null $extra_condition");
        return $query->result_array();
    }

    public function summary_table_of_activity_by_sector($selected_fiscal_year) {
        $condition_finance_year = "";
        $condition_ministry="";
        if (!empty($_POST)) {
            if (!empty($_POST['finance_year'])) {
                $condition_finance_year.=" and finance_year='$_POST[finance_year]'";
            }
            if (!empty($_POST['ministry'])) {
                $condition_ministry.=" and id='$_POST[ministry]'";
            }
        } else {
            $condition_finance_year.=" and finance_year='$selected_fiscal_year'";
        }
        $sql = "SELECT *,(SELECT COUNT(1) FROM `view_wp_master` WHERE parent_id=a.id AND finance_year=a.finance_year) AS child FROM (
SELECT id,`name`,name_short,finance_year,(SELECT
     (CASE WHEN (COUNT(`view_wp_master`.`id`) > 0) THEN 'Yes' ELSE 'No' END)
   FROM `view_wp_master`
   WHERE (((`view_wp_master`.`ministry_id` = `m`.`id`)
            OR (`view_wp_master`.`parent_id` = `m`.`id`))
          AND (`view_wp_master`.`finance_year` = `d`.`finance_year`))) AS `is_workplan_submitted`,
  (SELECT
     (CASE WHEN (COUNT(`view_wpro_master`.`id`) > 0) THEN 'Yes' ELSE 'No' END)
   FROM `view_wpro_master`
   WHERE (((`view_wpro_master`.`ministry_id` = `m`.`id`)
            OR (`view_wpro_master`.`parent_id` = `m`.`id`))
          AND (`view_wpro_master`.`finance_year` = `d`.`finance_year`))) AS `is_progress_submitted`,SUM(number_of_activity) AS number_of_activity,SUM(completed_activity) AS completed_activity,SUM(ongoing_activity) AS ongoing_activity,SUM(no_progress_activity) AS no_progress_activity,IFNULL(SUM(allocation_en),0) AS allocation,IFNULL(SUM(expenditure_en),0) AS expenditure FROM `ministry` AS m LEFT JOIN `view_wp_details_summary` AS d ON ( m.id=d.`ministry_id` OR m.id=d.`parent_id`) WHERE m.is_ministry=1 AND d.progress_value_en IS NOT NULL $condition_finance_year GROUP BY m.id
UNION ALL
SELECT id,`name`,name_short,finance_year,is_workplan_submitted,is_progress_submitted,0,0,0,0,0,0 FROM `view_ministry_status` WHERE 1=1 $condition_finance_year AND is_progress_submitted='No'
) AS a where 1=1 $condition_ministry";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function progress_according_to_thematic_areas($selected_fiscal_year) {
        $extra_condition = "";
        if (!empty($_POST)) {
            if (!empty($_POST['finance_year'])) {
                $extra_condition.=" and finance_year='$_POST[finance_year]'";
            }
            if (!empty($_POST['ministry'])) {
                $extra_condition.=" and (ministry_id='$_POST[ministry]' or parent_id='$_POST[ministry]')";
            }
        } else {
            $extra_condition.=" and finance_year='$selected_fiscal_year'";
        }
        $query = $this->db->query("SELECT thematic_area,SUM(number_of_activity) AS number_of_activity,SUM(completed_activity) AS completed_activity,SUM(ongoing_activity) AS ongoing_activity,SUM(no_progress_activity) AS no_progress_activity FROM `view_wp_details_summary` where progress_value_en is not null $extra_condition GROUP BY thematic_area_id");
        return $query->result_array();
    }

    public function trend_of_fund_allocation_by_period() {
        $extra_condition = " and 1=1";
        if (!empty($_POST)) {
            if (!empty($_POST['ministry'])) {
                $extra_condition.=" and id='$_POST[ministry]'";
            }
        }
        $query = $this->db->query("SELECT id,name,name_short,(SELECT IFNULL(SUM(allocation_en),0) FROM `view_wp_details` WHERE ministry_id=ministry.id OR ministry_id IN (SELECT id FROM `ministry` WHERE parent_id=ministry.id)) AS allocation,0 AS expenditure FROM `ministry` WHERE ministry.`is_ministry`=1 $extra_condition ");
        return $query->result_array();
    }

}
