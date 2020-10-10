<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= base_url() ?>public/front/dist/img/logo/logo.png" class="navbar-logo" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>#plans">Plans & Pricing</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>#services">Services</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?= base_url() ?>#contact">Contact</a>
                    <a class="dropdown-item" href="<?= base_url() ?>public/docs/Eazytrack Terms and Condition.pdf">Term of Use</a>
                    <a class="dropdown-item" href="<?= base_url() ?>public/docs/Eazytrack PRIVACY NOTICE.pdf">Privacy Policy</a>
                    </div>
                </li>

                <?php
                if(isset($_SESSION['id_user'])){
                    if($_SESSION['id_user_type'] == 1){
                        $nav_url = base_url().'back/admin/dashboard';
                    }else if($_SESSION['id_user_type'] == 3){
                        $nav_url = base_url().'back/customer/dashboard';
                    }
                    ?>
                    <li class="nav-item navbar-p-l">
                        <div class="btn-group ">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> <?= $_SESSION['username']?>
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= $nav_url?>">My Profile</a>
                            <a class="dropdown-item" href="<?= base_url()?>login/logout">Logout</a>
                            </div>
                        </div>

                    </li>
                    <?php
                }else{
                    ?>
                    <li class="nav-item navbar-p-l">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#myModalLogin"><b>Sign In</b></a>
                    </li>
                    <li class="nav-item seperator">
                        <a class="nav-link" href="#"><b>|</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#myModalRegistration"><b>Sign Up</b></a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>

</nav>

<!-- Login Form -->
<div id="myModalLogin" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="jumbotron bg-primary">
                    <div class="title">
                        <img src="<?= base_url() ?>public/front/dist/img/logo/logo.png" class="footer-logo mb-2" alt="footer_logo">
                        <button type="button" class="close text-white" data-dismiss="modal">×</button>
                        <hr class="hr-divider">
                        <h3 class="modal-title">Login Your Account</h3>
                        <br>
                    </div>
                        <div class="form-group">
                          <label for="email">Email or Username:</label>
                          <input type="text" class="form-control-default" placeholder="Enter email or username" name="email" id="email">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control-default" placeholder="Enter password" name="password" id="password">
                        </div>
                        <div class="d-flex">
                            <div class="form-group form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox"> Remember me
                                </label>
                              </div>
                              <div class="span ml-auto"><a href="#" data-toggle="modal" data-target="#myModalForgot"  data-dismiss="modal">Forgot Password</a></div>
                        </div>
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary" onclick="login()">Sign In</button>
                    
                </div>
                Don't have an account? <a href="#" data-toggle="modal" data-target="#myModalRegistration"  data-dismiss="modal">Register here</a>
            </div>
            
            
        </div>
    </div>
</div>
<!-- Login Form -->

<!-- Registration -->
<div id="myModalRegistration" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <!-- <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> -->
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="jumbotron bg-primary">
                    <div class="title">
                        <img src="<?= base_url() ?>public/front/dist/img/logo/logo.png" class="footer-logo mb-2" alt="footer_logo">
                        <button type="button" class="close text-white" data-dismiss="modal">×</button>
                        <hr class="hr-divider">
                        <h3 class="modal-title">Create Your Account</h3>
                        <br>
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control-default" name="first_name" id="regfirst_name" placeholder="First Name">
                        <label for="cpassword" class="text-danger errorregfirst_name" style="display:none"></label>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control-default" name="regusername" id="regusername"  placeholder="Username">
                        <label for="cpassword" class="text-danger errorregusername"  style="display:none"></label>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control-default" name="regemail" id="regemail" placeholder="Email">
                        <label for="cpassword" class="text-danger errorregemail"  style="display:none"></label>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Password:</label>
                        <input type="password" class="form-control-default" name="regpassword" id="regpassword" placeholder="Password">
                        <label for="cpassword" class="text-danger errorregpassword"  style="display:none"></label>
                        </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" class="form-control-default" name="cpassword" id="regcpassword" placeholder="Confirm Password">
                        <label for="cpassword" class="text-danger errorregcpassword"  style="display:none"></label>
                    </div>
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary regi_btn">Sign Up</button>
                
                </div>
                Already have an account? <a href="#" data-toggle="modal" data-target="#myModalLogin"  data-dismiss="modal">Login here</a>
            </div>
            
            
        </div>
    </div>
</div>
<!-- Registration -->

<!-- Forgot -->
<div id="myModalForgot" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <!-- <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> -->
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="jumbotron bg-primary">
                    <div class="title">
                        <img src="<?= base_url() ?>public/front/dist/img/logo/logo.png" class="footer-logo mb-2" alt="footer_logo">
                        <button type="button" class="close text-white" data-dismiss="modal">×</button>
                        <hr class="hr-divider">
                        <h3 class="modal-title">Forgot Password</h3>
                        <br>
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="first_name">Enter your email</label>
                        <input type="text" class="form-control-default" name="forgot_email" id="forgot_email" placeholder="Enter Email...">
                        <label for="cpassword" class="text-danger errorregfirst_name" style="display:none"></label>
                    </div>
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary retriveButton">Retrive my account</button>
                
                </div>
                Already have an account? <a href="#" data-toggle="modal" data-target="#myModalLogin"  data-dismiss="modal">Login here</a>
            </div>
            
            
        </div>
    </div>
</div>
<!-- Forgot -->