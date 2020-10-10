<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <?php
                    if($_SESSION['picture'] == ''){
                        ?>
                            <img src="<?= base_url(); ?>public/uploads/dp/default_pic.png" alt="..." class="avatar-img rounded-circle">
                        <?php
                    }else{
                        ?>
                         <img src="<?= base_url(); ?>public/uploads/dp/<?= $_SESSION['picture']?>" alt="..." class="avatar-img rounded-circle">
                        <?php
                    }
                    ?>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= $_SESSION['first_name']?>
                            <span class="user-level"><?= $_SESSION['type']?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                            <a href="<?= base_url()?>profile/">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <?php
                if($_SESSION['id_user_type'] == 3){
                    ?>
                    <li class="nav-item active">
                        <a href="<?= base_url()?>back/admin/dashboard/index">
                            <i class="fas fa-desktop"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>transactions/index/1">
                            <i class="	fa fa-crosshairs"></i>
                            <p>Parcel Tracking</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>transactions/index/2">
                            <i class="fa fa-desktop"></i>
                            <p>Parcel Monitoring</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>claims/dashboard/">
                            <i class="fas fa-users"></i>
                            <p>Claims</p>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if($_SESSION['id_user_type'] == 1){
                    ?>
                    <li class="nav-item active">
                        <a href="<?= base_url()?>back/admin/dashboard/index">
                            <i class="fas fa-desktop"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#sidebar_system_reports">
                            <i class="fa fa-edit"></i>
                            <p>Transactions</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="sidebar_system_reports">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?= base_url() ?>/transactions/index/1">
                                        <span class="sub-item">Parcel Tracking</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>/transactions/index/2">
                                        <span class="sub-item">Parcel Monitoring</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>/claims/dashboard/">
                                        <span class="sub-item">Claims</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> 
                    <li class="nav-item">
                        <a href="<?= base_url()?>back/admin/staffMngmnt/index">
                            <i class="fas fa-user"></i>
                            <p>Staff Management</p>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href="<?= base_url() ?>back/admin/customerMngmnt/index">
                            <i class="fas fa-users"></i>
                            <p>Customer Management</p>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href="<?= base_url()?>plans/index">
                            <i class="fas fa-clone"></i>
                            <p>Plans & Pricing</p>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="<?= base_url() ?>back/admin/user_management/index">
                            <i class="fa fa-edit"></i>
                            <p>Notification Center</p>
                        </a>
                    </li>  -->
                   <!-- <li class="nav-item">
                        <a href="<?= base_url() ?>back/admin/user_management/index">
                            <i class="fas fa-credit-card"></i>
                            <p>Payments Center</p>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a data-toggle="collapse" href="<?= base_url() ?>back/admin/user_management/index">
                            <i class="fa fa-edit"></i>
                            <p>System Settings</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="sidebar_system_settings">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="#charts/charts.html">
                                        <span class="sub-item">Email Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#charts/sparkline.html">
                                        <span class="sub-item">Currency Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#charts/sparkline.html">
                                        <span class="sub-item">Payment Gateway Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a data-toggle="collapse" href="<?= base_url() ?>back/admin/user_management/index">
                            <i class="fa fa-edit"></i>
                            <p>System Reports</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="sidebar_system_reports">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="#charts/charts.html">
                                        <span class="sub-item">Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#charts/sparkline.html">
                                        <span class="sub-item">Income</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#charts/sparkline.html">
                                        <span class="sub-item">Couriers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <?php
                }
                ?>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>invoice/">
                            <i class="fa fa-credit-card"></i>
                            <p>Invoice</p>
                        </a>
                    </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->