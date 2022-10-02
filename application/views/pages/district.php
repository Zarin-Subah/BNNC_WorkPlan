<?php if (!empty($district_list)) { ?>
<option value="">Select District</option>
    <?php foreach ($district_list as $district_list) { ?>
        <option value="<?php echo $district_list['district_id']; ?>"><?php echo $district_list['district_name']; ?></option>
    <?php }
}
?>