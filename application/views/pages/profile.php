<style>
    .select_members,
    .upload_resolution,
    .select_changed_members,
    .budget_section {
        display: none;
    }
</style>
<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Profile
                </div>
                <?php
                foreach ($row as $profile)

                ?>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_name" class="col-form-label">User Name</label>
                                <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $profile['user_name'] ?>" readonly>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="login_id" class="col-form-label">User ID</label>
                                <input type="email" class="form-control" id="login_id" name="login_id" value="<?php echo $profile['login_id'] ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="user_name" class="col-form-label">User Type</label>
                                <input type="text" class="form-control" id="user_name" name="user_type" value="<?php echo $profile['user_type'] ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="user_name" class="col-form-label">Is Active</label>
                                <?php if ($profile['is_active'] == 1) {
                                        $is_active='Yes';
                                    }
                                    ?> 
                                    <?php
                                    if ($profile['is_active'] == 0) {
                                        $is_active='No';
                                    }
                                    ?>

                                <input type="text" class="form-control" id="is_active" name="is_active" value="<?php echo $is_active ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label">Ministry/ Department Name</label>

                                <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo $profile['name']; ?>" required>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="name_bangla" class="col-form-label">Ministry/ Department Name Bangla</label>
                                <input type="text" class="form-control" id="name_bangla" name="name_bangla" placeholder="" value="<?php echo $profile['name_bangla']; ?>" required>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="name_short" class="col-form-label">Ministry/ Department Short Name</label>
                        
                                <input type="text" class="form-control" id="name_short" name="name_short" placeholder="" value="<?php echo $profile
                                
                                ['name_short']; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="f_name" class="col-form-label">Focal Person Name</label>
                                <input type="text" class="form-control" id="f_name" name="f_name" placeholder="" value="<?php echo $profile['f_name']; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="f_designation" class="col-form-label">Designation</label>
                                <input type="text" class="form-control" id="f_designation" name="f_designation" placeholder="" value="<?php echo $profile['f_designation']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="f_name" class="col-form-label">Mobile</label>
                                <input type="text" class="form-control" id="f_mobile" name="f_mobile" placeholder="" value="<?php echo $profile['f_mobile']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="f_phone" class="col-form-label">Phone</label>
                                <input type="number" class="form-control" id="f_phone" name="f_phone" placeholder="" value="<?php echo $profile['f_phone']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="f_email" class="col-form-label">Email</label>
                                <input type="text" class="form-control" id="f_email" name="f_email" placeholder="" value="<?php echo $profile['f_email']; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="af_name" class="col-form-label">Additional Focal Person Name</label>
                                <input type="text" class="form-control" id="af_name" name="af_name" placeholder="" value="<?php echo $profile['af_name']; ?>">

                            </div>
                            <div class="form-group col-md-6">
                                <label for="af_designation" class="col-form-label">Designation</label>
                                <input type="text" class="form-control" id="af_designation" name="af_designation" placeholder="" value="<?php echo $profile['af_designation']; ?>">

                            </div>
                            <div class="form-group col-md-6">
                                <label for="af_mobile" class="col-form-label">Mobile</label>
                                <input type="number" class="form-control" id="af_mobile" name="af_mobile" placeholder="" value="<?php echo $profile['af_mobile']; ?>">

                            </div>
                            <div class="form-group col-md-6">
                                <label for="af_phone" class="col-form-label">Phone</label>
                                <input type="number" class="form-control" id="af_phone" name="af_phone" placeholder="" value="<?php echo $profile['af_phone']; ?>">

                            </div>
                            <div class="form-group col-md-6">
                                <label for="af_email" class="col-form-label">Email</label>
                                <input type="text" class="form-control" id="af_email" name="af_email" placeholder="" value="<?php echo $profile['af_email']; ?>">

                            </div>
                        </div>
                
                        <button type="submit" class="btn btn-primary" name="save">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>