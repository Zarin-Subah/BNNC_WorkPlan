<script>
    function PasswordMatch(form) {
        var login_password_val = form.login_password.value;
        var login_password_confirm_val = form.login_password_confirm.value;
        if (login_password_val == login_password_confirm_val) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Password mach';
            return true;
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Password do not match';
            return false;
        }
    }
</script>
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
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin_area'); ?>">Admin Area</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add User</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Add User
                </div>
                <div class="card-body">
                    <form method="POST" action="" onSubmit="return PasswordMatch(this)">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="user_name" class="col-form-label">User Name</label>
                                <input type="text" class="form-control" id="user_name" name="user_name" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="login_id" class="col-form-label">User ID</label>
                                <input type="text" class="form-control" id="login_id" name="login_id" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="thematic_area_id" class="col-form-label">Thematic Area</label>
                                <select class="form-control" id="thematic_area_id" name="thematic_area_id" required>
                                    <option value="">Select</option>
                                    <?php
                                    foreach ($thematic_area_list as $thematic_area) {
                                        ?>
                                        <option value="<?php echo $thematic_area['id']; ?>"><?php echo $thematic_area['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="login_password" class="col-form-label">Password</label>
                                <input type="password"  class="form-control" id="login_password" name="login_password"  onkeyup='check();' required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="login_password_confirm" class="col-form-label">Confirm Password</label>

                                <input type="password"  class="form-control" id="login_password_confirm" name="login_password_confirm" onkeyup='check();' required>
                                <span id='message'></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="user_type" class="col-form-label">User Type</label>
                                <select class="form-control" id="user_type" name="user_type">
                                    <option value="">Select Type</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Thematic Area">Thematic Area</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="user_type" class="col-form-label">Is Active</label>
                                <select class="form-control" id="is_active" name="is_active">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>