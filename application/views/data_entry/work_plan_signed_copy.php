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
                    <li class="breadcrumb-item active" aria-current="page">Add Signed Copy</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Signed Copy
                </div> 
                <?php
                foreach ($workplan_information as $info)
                    
                    ?>
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <tr>
                                <td width="25%">মন্ত্রণালয়/ ডিপার্টমেন্টের নাম</td>
                                <td width="55%"><?php echo $info['ministry_name_bangla']; ?></td>
                                <td width="7%">অর্থ বছর</td>
                                <td width="13%"><?php echo $info['finance_year_bn']; ?></td>
                            </tr>
                        </table>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="userfile" class="col-form-label">Signed Copy of work plan (pdf)-4MB(max)</label>
                                <input type='file' class="form-control" id="userfile" name="userfile" required>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>