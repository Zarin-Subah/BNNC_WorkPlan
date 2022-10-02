<?php if (!empty($sub_activity_list)) { ?>
<option value="">Select Sub Activity</option>
    <?php foreach ($sub_activity_list as $sub_activity) { ?>
        <option value="<?php echo $sub_activity['id']; ?>"><?php echo $sub_activity['sub_activity']; ?></option>
    <?php }
}else{
    echo "<option value=''>Not Found.</option>";
}
?>