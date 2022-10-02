<?php if (!empty($upazlia_list)) { ?>
<option value="">Select Upazila</option>
    <?php foreach ($upazlia_list as $upazlia_list) { ?>
        <option value="<?php echo $upazlia_list['upazila_id']; ?>"><?php echo $upazlia_list['upazila_name']; ?></option>
    <?php }
}
?>