<?php $this->load->view('back/template/header');?>
<body>
<div class="wrapper">
    <div class="main-header">
        <?php $this->load->view('back/template/navigation');?>
    </div>

    <?php $this->load->view('back/template/sidebar');?>

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">My Profile</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="<?= base_url()?>back/admin/Dashboard">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="container">
                    <div class="card1"  style="max-width: 12 0rem;">
                        <div class="card-header" >Profile</div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="card text-muted bg-light mb-1" style="max-width:  90rem;">
                                        <div class="card-header">Change Display Picture 
                                                <button class="btn btn-primary btn-sm btn-round ml-auto pull-right">
                                                <i class="fa fa-plus"></i>
                                                    save changes
                                                </button>
                                        </div>
                                        <div class="card-body bg-light">
                                            <div class=".row">
                                                <div class="col">
                                                    <div class="form-group form-group-default">
                                                        <label>ACCOUNT DP</label>
                                                        <input type="file" id="picture" name="picture" class="form-control" placeholder="Input Picture" required>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="card text-muted bg-light mb-1" style="max-width:  90rem;">
                                        <div class="card-header">Personal Details
                                            <button class="btn btn-primary btn-sm btn-round ml-auto pull-right">
                                            <i class="fa fa-plus"></i>
                                                save changes
                                            </button>
                                        </div>
                                        <div class="card-body bg-light">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group form-group-default">
                                                    <label>first name</label>
                                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Input First name" required>
                                                    <input type="hidden" id="id_user" name="id_user" class="form-control" placeholder="Input First name" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group form-group-default">
                                                    <label>Middle Name</label>
                                                    <input type="text" id="middle_name" name="middle_name" class="form-control" placeholder="Input Middle Name" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group form-group-default">
                                                    <label>Last Name</label>
                                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Input Last Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="card text-muted bg-light mb-1" style="max-width: 90rem;">
                                        <div class="card-header">Header
                                            <button class="btn btn-primary btn-sm btn-round ml-auto pull-right">
                                            <i class="fa fa-plus"></i>
                                                save changes
                                            </button>
                                        </div>
                                        <div class="card-body bg-light">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group form-group-default">
                                                    <label>Contact</label>
                                                    <input type="number" id="contact" name="contact" class="form-control" placeholder="Input Contact" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group form-group-default"> 
                                                    <label>Address</label>
                                                    <input type="text" id="address" name="address" class="form-control" placeholder="Input Address" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               </div>

                                <div class="container">
                                    <div class="card text-muted bg-light mb-3" style="max-width: 90rem;">
                                        <div class="card-header">Header
                                            <button class="btn btn-primary btn-sm btn-round ml-auto pull-right">
                                            <i class="fa fa-plus"></i>
                                                save changes
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group form-group-default">
                                                    <label>Email</label>
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Input Email" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group form-group-default">
                                                    <label>Username</label>
                                                    <input type="username" id="username" name="username" class="form-control" placeholder="Input Username" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group form-group-default">
                                                    <label>Password</label>
                                                    <input type="password"  id="password" name="password" class="form-control" placeholder="Input Password" required>
                                                    </div>
                                                </div><div class="col-6">
                                                    <div class="form-group form-group-default">
                                                    <label>Confirm Password</label>
                                                    <input type="password"  id="password" name="password" class="form-control" placeholder="Input Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('back/template/footer');?>
