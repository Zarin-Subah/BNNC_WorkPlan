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
                    <li class="breadcrumb-item active" aria-current="page">Add Fiscal Year</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Add Fiscal Year
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="fiscal_year" class="col-form-label">Fiscal Year</label>
                                <input type="text" class="form-control" id="fiscal_year" name="fiscal_year" placeholder="Format: 2020-2021" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="row_color" class="col-form-label">Row Color</label>
                                <input type="text" class="form-control" id="row_color" name="row_color" placeholder="Format: #abc123 (Hex Code)" required>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>