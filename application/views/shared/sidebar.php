<aside class="app-side <?php
if ($this->uri->segment(1) == 'data_entry') {
    echo "is-mini";
}
?>" id="app-side">
    <!-- BEGIN .side-content -->
    <div class="side-content ">
        <!-- BEGIN .user-profile -->
        <!-- END .user-profile -->
        <!-- BEGIN .side-nav -->
        <nav class="side-nav">
            <!-- BEGIN: side-nav-content -->
            <ul class="unifyMenu" id="unifyMenu">
                <li <?php
                if ($this->uri->segment(1) == 'home') {
                    echo "class='active selected''";
                }
                ?>>
                    <a href="<?php echo site_url('home'); ?>">
                        <span class="has-icon">
                            <i class="icon-home"></i>
                        </span>
                        <span class="nav-title">Home</span>
                    </a>
                </li>
                <li <?php
                if ($this->uri->segment(1) == 'dashboard') {
                    echo "class='active selected''";
                }
                ?>>
                    <a href="<?php echo site_url('dashboard'); ?>">
                        <span class="has-icon">
                            <i class="icon-laptop_windows"></i>
                        </span>
                        <span class="nav-title">Dashboard</span>
                    </a>
                </li>
                <li <?php
                if ($this->uri->segment(1) == 'reports') {
                    echo "class='active selected''";
                }
                ?>>
                    <a href="<?php echo site_url('reports'); ?>">
                        <span class="has-icon">
                            <i class="icon-chart-area-outline"></i>
                        </span>
                        <span class="nav-title">Report</span>
                    </a>
                </li>
                <?php
                if ($this->session->userdata('user_type') == 'Super Admin') {
                    ?>
                    <li <?php
                    if ($this->uri->segment(1) == 'admin_area') {
                        echo "class='active selected''";
                    }
                    ?>>
                        <a href="<?php echo site_url('admin_area'); ?>">
                            <span class="has-icon">
                                <i class="icon-border_all"></i>
                            </span>
                            <span class="nav-title">Admin Area</span>
                        </a>
                    </li>
                <?php
                }
                if ($this->session->userdata('is_logged_id') == TRUE) {
                    ?>
                    <li <?php
                    if (($this->uri->segment(1) == 'configure')&&($this->uri->segment(2) == 'sub_activity_list')) {
                        echo "class='active selected''";
                    }
                    ?>>
                        <a href="<?php echo site_url('configure/sub_activity_list'); ?>">
                            <span class="has-icon">
                                <i class="icon-tabs-outline"></i>
                            </span>
                            <span class="nav-title">Activities</span>
                        </a>
                    </li>
                    <li <?php
                    if (($this->uri->segment(1) == 'configure')&&($this->uri->segment(2) == 'performance_indicator_list')) {
                        echo "class='active selected''";
                    }
                    ?>>
                        <a href="<?php echo site_url('configure/performance_indicator_list'); ?>">
                            <span class="has-icon">
                                <i class="icon-tabs-outline"></i>
                            </span>
                            <span class="nav-title">Deliverables</span>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <li  <?php
                if ($this->uri->segment(1) == 'data_entry') {
                    echo "class='active selected''";
                }
                ?>>
                    <a href="<?php echo site_url('data_entry'); ?>">
                        <span class="has-icon">
                            <i class="icon-border_outer"></i>
                        </span>
                        <span class="nav-title">Data Entry</span>
                    </a>
                </li>
            </ul>
            <!-- END: side-nav-content -->
        </nav>
        <!-- END: .side-nav -->
    </div>
    <!-- END: .side-content -->
</aside>