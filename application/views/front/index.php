<?php $this->load->view('front/template/header');?>
<?php $this->load->view('front/template/navigation');?>
    <main role="main">

        <!-- BANNER -->
        <section id="banner" style="background: linear-gradient(#1b1b1b96, #1b1b1b96), url(<?= base_url() ?>public/front/dist/img/banner.jpg);">
            <div class="container banner-content">
                <h1>eazytrack</h1>
                <p class="free-track-caption">Track Your Parcel Online For FREE ! Just Simply Enter One Or More Parcel Numbers.</p>
                <div class="container">
                    <div class="input-group mb-3">
                        <input type="text" id="trackingcode" class="form-control" placeholder="Enter your tracking number (UPS, DHL, GLS, DPD, Parcelforce and more)" >
                        <div class="input-group-append">
                            <button class="btn btn-primary trackbutton" type="button" id="button-addon2"><i class="fa fa-location-arrow"></i> Search</button>
                        </div>
                    </div>
                </div>

                <div class="free-track-caption mt-5">

                    <?php
                    $class = "subscribe";
                    $href = '';

        
                    if(empty($_SESSION['id_user'])){
                        $class = "cannotsubscribe";
                        $href = '';
                    }
                    ?>

                    <!-- Looking for regular track event updates?  -->
                    Have your consignment continously tracked!
                    <a class="<?= $class?> btn btn-primary btn-md" name="subscribe" data-id="2">Buy Now</a>     

                    <br>
                    Provides Quality Service and Professional Care You deserve   


                </div>
            </div>
        </section>
        <!-- BANNER -->


        <!-- INFO BOX -->
        <section id="info-box">
            <div class="container">
                <div class="row ">

                    <div class="col-md-4">
                        <div class="box">
                            <div class="service_img">
                                <i class="fa fa-flag-o header-icons"></i>
                            </div>
                            <div class="service_content_wrapper">
                                <div class="service_title">
                                    <h4>Branded Tracking Experience</h4>
                                </div>
                                <p>Fully-branded tracking experience on different carriers around the globe.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box bg-white">
                            <div class="service_img">
                                <i class="fa fa-users header-icons text-primary"></i>
                            </div>
                            <div class="service_content_wrapper">
                                <div class="service_title">
                                    <h4 class="text-primary">Customer Service Assistance</h4>
                                </div>
                                <p>Provides  the best recommendation and support if necessary to help you get the answers you 're looking for.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box">
                            <div class="service_img">
                                <i class="fa fa-bell header-icons"></i>
                            </div>
                            <div class="service_content_wrapper">
                                <div class="service_title">
                                    <h4>Delivery Notifications</h4>
                                </div>
                                <p>Receive relevant tracking updates automatically</p>
                                <br>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- INFO BOX -->

        <!-- WHAT WE DO -->
        <section id="wedo">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span>Do You Know ?</span>
                        <h3>WHAT WE DO</h3>
                        <hr class="hr-divider hr-left">
                        <p>Our team is focused on providing the best products and services to our customers at a competitive price. We will always provide as much information about your parcel’s tracking and your claims, through thorough review and assessment. We will make sure you know your rights and get better results.</p>
                        <p>No need for follow-ups, get notified, and receive daily updates from us - once again ensuring peace of mind!</p>
                    </div>
                    <div class="col-md-6">
                        <img src="<?= base_url() ?>public/front/dist/img/feature_img_1.jpg" style="width:100%" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- WHAT WE DO -->

        <!-- HOW DO WE HELP -->
        <section id="help">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="background: url(<?= base_url() ?>public/front/dist/img/feature_img_1.jpg);">
                    </div>
                    <div class="col-md-6 p-5 text-white">
                        <h3>HOW DO WE HELP</h3>
                        <hr class="hr-divider hr-left">
                        <div class="single_feature d-flex">
                            <div class="feature_icon">
                                <span class="fa fa-clock-o"></span>
                            </div>
                            <div class="feature_content">
                                <p class="muted-white">We make sure you can track  all of your  deliveries without a sweat. By just providing your tracking ID, Eazytrack will do  the rest to locate your parcel. </p>
                            </div>
                        </div>
                        <div class="single_feature d-flex">
                            <div class="feature_icon">
                                <span class="fa fa-plane"></span>
                            </div>
                            <div class="feature_content">
                                <p class="muted-white">We help you keep track of all your shipments in one rundown and have regular automatic updates and email alerts from all couriers around the world.</p>
                            </div>
                        </div>
                        <div class="single_feature d-flex">
                            <div class="feature_icon">
                                <span class="fa fa-support"></span>
                            </div>
                            <div class="feature_content">
                                <p class="muted-white">We provide full support to better explain whether the tracking is right or wrong. We inform and report all changes about monitoring.</p>
                            </div>
                        </div>
                        <div class="single_feature d-flex">
                            <div class="feature_icon">
                                <span class="fa fa-users"></span>
                            </div>
                            <div class="feature_content">
                                <p class="muted-white">We make sure you know your rights. We'll tell you what you need to know about your particular case. And if necessary we are on hand with support and advice to help you find the answers that you're looking for.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- HOW DO WE HELP -->

        <!-- OUR SERVICES -->
        <section id="services">
            <div class="container">
                <div class="title">
                    <span>Service We Provide</span>
                    <h3>OUR SERVICE</h3>
                    <hr class="hr-divider">
                </div>
                <div class="row">
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <img class="card-img-bottom" src="<?= base_url() ?>public/front/dist/img/service1_1.webp" alt="Card image" style="width:100%">
                            <div class="card-body">
                              <h4 class="card-title">Parcel Tracking</h4>
                              <p class="card-text">Provide a clear translation and understanding of your parcel's tracking for all carriers around the world.  </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <img class="card-img-bottom" src="<?= base_url() ?>public/front/dist/img/service2_2.webp" alt="Card image" style="width:100%">
                            <div class="card-body">
                              <h4 class="card-title">Parcel Monitoring</h4>
                              <p class="card-text">Committed on continuous monitoring and providing regular updates on your parcel tracking .  </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <img class="card-img-bottom" src="<?= base_url() ?>public/front/dist/img/service3_3.webp" alt="Card image" style="width:100%">
                            <div class="card-body">
                              <h4 class="card-title">Claims</h4>
                              <p class="card-text">We don't act or follow up claims on your behalf.  Rather, we help you analyze your case and make it as quick as ...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- OUR SERVICES -->

        <!-- PLANS -->
        <section id="plans">
            <div class="container">
                <div class="title">
                    <h3 class="text-white">Choose your pricing plan</h3>
                    <hr class="hr-divider">
                </div>
                <div class="card-deck mb-3 text-center">

                    <?php
                    if(isset($plans)){
                    ?>   
                    <?php foreach($plans as $plan): ?>
                    <?php
                        $active = '';
                        if($plan->best_seller == 1){
                            $active = 'active';
                        };
                    ?>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header extra-padding">
                            <h4 class="my-0 font-weight-normal"><?= $plan->name?></h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">£ <?= number_format($plan->actual_price)?> <hr></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <?php $parsed_json = json_decode($plan->description, true); ?>
                                <?php foreach($parsed_json as $desc => $value): ?>
                                    <li> <?= $value['description']?></li><hr>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <?php
                            $class = "subscribe";
                            $href = '#';

                            if($plan->id == 3){
                                $class = ""; 
                                $href = 'href="'.base_url(). 'claims"';
                            }
                            if(empty($_SESSION['id_user'])){
                                $class = "cannotsubscribe";
                                $href = '#';
                            }
                            ?>
                            <a <?= $href?> class="btn btn-lg btn-block btn-outline-primary <?= $class?>"
                            name="subscribe" data-id="<?= $plan->id?>">Buy Now</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php
                    }else{
                        ?>
                        <div class="price-heading text-white">
                            <h1>No plans found.</h1>
                        </div>
                        <?php
                    }
                    ?>  

                </div>
            </div>
        </section>
        <!-- PLANS -->

        <!-- CONTACT US -->
        <section id="contact">
            <div class="container" align="center">
                <div class="title">
                    <span>Service We Provide</span>
                    <h3>SEND US MESSAGE</h3>
                    <hr class="hr-divider">
                </div>
                <div class="col-md-8 col-offset-md-2">
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
                        <form action="<?php echo base_url('EmailNotif/receive_email') ?>" method="post" >
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" id="full_name" name="full_name" type="text" placeholder="Full name" value="<?php echo isset($full_name)? $full_name : '' ?>">
                                    <label for="email" class="text-danger erroremail"><?php echo form_error('full_name'); ?></label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="Contact number" name="contact" value="<?php echo isset($contact)? $contact : '' ?>">
                                    <label for="contact" class="text-danger errorcpassword"><?php echo form_error('contact'); ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" type="email"  id="email" name="email" placeholder="Valid email" value="<?php echo isset($email)? $email : '' ?>">
                                    <label for="email" class="text-danger erroremail"><?php echo form_error('email'); ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" id="message" placeholder="What's on your mind..." id="message" cols="30" rows="5"><?php echo isset($message)? $message : '' ?></textarea>
                                    <label for="message" class="text-danger erroremail"><?php echo form_error('message'); ?></label>
                                </div>
                            </div>
                            <div class="submit_btn">
                                <button class="btn btn-outline-primary btn-lg btn-block" type="submit" name="button"><i class="fa fa-send"></i> Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- CONTACT US -->

    </main>

<!-- Modal -->
<?php $this->load->view('front/components/tracking-modal');?>
<?php $this->load->view('front/components/plan-pricing-modal');?>
<?php $this->load->view('front/components/login-first-modal');?>

<!-- Footer -->
<?php $this->load->view('front/template/pre-footer');?>
<?php $this->load->view('front/template/footer');?>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

<!-- Custom Script -->
<script src="<?= base_url() ?>public/custom/front/index.js"></script>
<script src="<?= base_url() ?>public/custom/front/registration.js"></script>
<script src="<?= base_url() ?>public/custom/front/forgot-password.js"></script>
<script src="<?= base_url() ?>public/custom/front/login.js"></script>

<!--PAYPAL SCRIPTS-->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="<?= base_url() ?>public/custom/front/paypal.js"></script>
<!--PAYPAL SCRIPTS-->

<?php if(!empty($this->session->flashdata('SUCCESS'))){
    ?>
        <script>
            swal({
                title: "Successful!",
                text: "<?= $this->session->flashdata('SUCCESS'); ?>",
                icon: "success",
                buttons: {
                    confirm: {
                        text: "Ok",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: true
                    }
                }
            });
        </script>
    <?php
}
?>

<!-- Stripe -->
<script type="text/javascript">
    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe("pk_live_51HPhT7GSoZFG75Kw0b6Cx3Mvggw2QtQUvTIxTl0jmwqScCGtJdg2nMXaRl5CsJD9o5lg0uAXd0kk7dz8Abl0vRpQ00PDE3AtVo");
    // var stripe = Stripe("pk_test_51HPhT7GSoZFG75KwqZEb0NDkNr9Q2JXwG55jNjV0iFqV60J0qMbvHKpLrEl7hsTeY6S4xCyP13Jn9eUHO4WM1Tc100DJH7JunO");

    var checkoutButton = document.getElementById("checkout-button");
    checkoutButton.addEventListener("click", function () {

        let tracking_number = $("#tracking_number").val();
        let id_plans = $("#id_plans").val();
        let courier_code = $("#couriername").val();

        fetch("<?= base_url()?>/stripeController2/stripePost/" + tracking_number + "/" + id_plans + "/" + courier_code, {
            method: "POST",
        })
            .then(function (response) {
            return response.json();
            })
            .then(function (session) {
            return stripe.redirectToCheckout({ sessionId: session.id });
            })
            .then(function (result) {
            // If redirectToCheckout fails due to a browser or network
            // error, you should display the localized error message to your
            // customer using error.message.
            if (result.error) {
                alert(result.error.message);
            }
            })
            .catch(function (error) {
            console.error("Error:", error);
            });
    });
  </script>