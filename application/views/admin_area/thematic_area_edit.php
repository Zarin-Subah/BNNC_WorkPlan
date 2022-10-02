<style>
    .select_members,.upload_resolution,.select_changed_members,.budget_section{
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
                    <li class="breadcrumb-item"><a href="<?php echo site_url('data_entry_UNCC_DNCC'); ?>">Admin Area</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Thematic Area</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                Edit Thematic Area
                </div>
                <?php
                foreach ($ministry_edit as $ministry) 
                ?>
                
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="name" class="col-form-label">Thematic Area Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo $ministry['name']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="f_name" class="col-form-label">Focal Person Name</label>
                                <input type="text" class="form-control" id="f_name" name="f_name" placeholder="" value="<?php echo $ministry['f_name']; ?>">
                        
                            </div>
                            <div class="form-group col-md-3">
                                <label for="f_designation" class="col-form-label">Designation</label>
                                <input type="text" class="form-control" id="f_designation" name="f_designation" placeholder="" value="<?php echo $ministry['f_designation']; ?>">
                                
                            </div>
                            <div class="form-group col-md-3">
                                <label for="f_mobile" class="col-form-label">Mobile</label>
                                
                                <input type="number" class="form-control" id="f_mobile" name="f_mobile" placeholder="" value="<?php echo $ministry['f_mobile']; ?>">
                                
                            </div>
                            <div class="form-group col-md-3">
                                <label for="f_phone" class="col-form-label">Phone</label>
                                <input type="number" class="form-control" id="f_phone" name="f_phone" placeholder="" value="<?php echo $ministry['f_phone']; ?>">
  
                            </div>
                            <div class="form-group col-md-3">
                                <label for="f_email" class="col-form-label">Email</label>
                                <input type="text" class="form-control" id="f_email" name="f_email" placeholder="" value="<?php echo $ministry['f_email']; ?>">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>