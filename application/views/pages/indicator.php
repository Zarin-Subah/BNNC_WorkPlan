<?php if (!empty($indicator_list)) { ?>
    <option value="">Select Indicator</option>
    <?php foreach ($indicator_list as $indicator) { ?>
        <option value="<?php echo $indicator['id']; ?>"><?php echo $indicator['indicator_name']; ?></option>
    <?php
    }
} else {
    echo "<option value=''>Not Found</option>";
}
?>