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
						<h4 class="page-title">Profile</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="<?= base_url()?>profile/">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						</ul>
					</div>
					<div class="row">

                        <div class="col-md-12">
						<?php 
						if($this->session->userdata('acctg_msg')){
						?>
							<div class="alert alert-<?php echo $_SESSION['acctg_msg_type'] ?>" role="alert">
								<?php echo $_SESSION['acctg_msg'] ?>
							</div>
						<?php
						unset($_SESSION['acctg_msg']);	
						unset($_SESSION['acctg_msg_type']);	
						}
						?>
						</div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                <form action="<?= base_url() ?>profile/update_display_profile/" method="POST" id="myForm" enctype="multipart/form-data">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Change Display Picture</h4>
                                        
                                        <button class="btn btn-hotpink btn-round ml-auto">
                                            <i class="fa fa-plus"></i>
                                            Save Changes
                                        </button>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">              
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Account DP</label>
                                                    <input value="<?= $_SESSION['id_user']?>" type="hidden" name="id_user" id="id_user" class="form-control" placeholder="Code" required="">
                                                    <input type="file" name="userfile" id="userfile" class="form-control" placeholder="Code" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                      

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <form action="<?php echo base_url() ?>profile/update_user_account/" method="POST" id="myForm">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title">Personal Details</h4>
                                            <button class="btn btn-hotpink btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                <i class="fa fa-plus"></i>
                                                Save Changes
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12" id="error_msg">
                                                </div>                       
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <label>First Name</label>
                                                        <input type="hidden" name="id_user" id="id_user" class="form-control" placeholder="Code" value="<?= $_SESSION['id_user']?>" required>
                                                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value="<?= $_SESSION['first_name']?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Middle Name</label>
                                                        <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle name" value="<?= $_SESSION['middle_name']?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" value="<?= $_SESSION['last_name']?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Eubject" value="<?= $_SESSION['email']?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Mobile Number</label>
                                                        <input type="text" name="contact" maxlength="11" id="contact" class="form-control" placeholder="Contact" onkeyup="this.value=this.value.replace(/[^\d]/,'')" value="<?= $_SESSION['contact']?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Username</label>
                                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= $_SESSION['username']?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
							    </div>
							</div>
						</div>

                        <div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <form action="<?php echo base_url() ?>profile/update_account_password/" method="POST" id="myForm" enctype="multipart/form-data">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title">Change Password</h4>
                                            <button class="btn btn-hotpink btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                <i class="fa fa-plus"></i>
                                                Save Changes
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12" id="error_msg">
                                                </div>                       
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Current Password</label>
                                                        <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <label>New Password</label>
                                                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New password" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Confirm Password</label>
                                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
							    </div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>



        
    </div>

     <?php $this->load->view('back/components/claims-modal-update'); ?>                                               
     <?php $this->load->view('back/components/view-claims-modal'); ?>                                               
     <?php $this->load->view('back/customer/components/claims-invoice-modal'); ?>                                               

    <?php $this->load->view('back/template/footer');?>
	<script src="<?= base_url() ?>public/custom/claims.js"></script>
