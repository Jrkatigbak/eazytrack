<?php $this->load->view('front/template/header');?>
<?php $this->load->view('front/template/navigation');?>
    <main role="main">

        <!-- BANNER -->
        <section id="banner-subpage" style="background: linear-gradient(#1b1b1b96, #1b1b1b96), url(<?= base_url() ?>public/front/dist/img/banner.jpg);">
            <div class="container banner-content">
                <h1>Claims</h1>
                <hr class="hr-divider">
                <p>Provides Quality Service and Professional Care You deserve</p>

            </div>
        </section>
        <!-- BANNER -->



        <!-- WHAT WE DO -->
        <section id="claims-order" class="">
           <div class="container">
                <div class="jumbotron">
                    <div class="container claimDetails">
                        <div class="alert alert-warning">
                            <label for="">Please tell us about your Claim.</label>
                        </div>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>Name <span class="required">*</span></b></label>
                                        <input type="text" name="name" id="name" class="form-control-default"  placeholder="Enter your name" value="Rey, John, ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>Address <span class="required">*</span></b></label>
                                        <input type="text" name="address" id="address" class="form-control-default"  placeholder="Enter your address" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>Email <span class="required">*</span></b></label>
                                        <input type="text" name="email" id="email" class="form-control-default"  placeholder="Enter your email" value="john@gmail.com">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>Subject <span class="required">*</span></b></label>
                                        <input type="text" name="subject" id="subject" class="form-control-default"  placeholder="Enter subject">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>Type of Claim <span class="required">*</span></b></label>
                                        <select name="id_claim_type" id="id_claim_type" class="form-control-default">
                                            <option value="">Select</option>
                                            <option value="1">Lost</option>
                                            <option value="2">Damaged</option>
                                            <option value="3">Delayed</option>
                                            <option value="4">Wrong item delivered</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>Parcel reference number <span class="required">*</span></b></label>
                                        <input type="text" name="parcel_reference_number" id="parcel_reference_number" class="form-control-default"  placeholder="Parcel reference number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>Company Name</b></label>
                                        <input type="text" name="company_name" id="company_name" class="form-control-default"  placeholder="Enter your company name">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>When did this happen?</b></label>
                                        <input type="date" name="when_happen" id="when_happen" class="form-control-default"  style="width:100%" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted"> <b>Attach any evidence</b></label>
                                        <input class="form-control-default" type="file" name="evidence" id="evidence" size="20" required="">
                                        <input type="hidden" name="evidence1" id="evidence1">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>What happened?</b></label>
                                        <textarea name="what_happened" id="what_happened" rows="3" 
                                        class="form-control-default" style="height:100px" placeholder="Write text here..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>How were you affected?</b></label>
                                        <textarea name="affected" id="affected" cols="30" rows="3" 
                                        class="form-control-default" style="height:100px" placeholder="Write text here..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-muted"><b>How would you like your issue to be resolved?</b></label>
                                        <textarea name="resolved" id="resolved" cols="30" rows="3" 
                                        class="form-control-default" style="height:100px" placeholder="Write text here..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right proceedPayment" data-amount=""><button type="button" class="btn btn-danger btn-lg bg-hotpink proceed"><i class="fa fa-share"></i> Proceed </button></div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="container confirmAndPay" style="display:none">
                        <div class="row jumbotron">
                            <div class="col-md-8 xxs_fullwidth xs_fullwidth col-xs-8">
                                <h3>Payment</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <hr>
                                        <p><b>Name:</b> <span class="name">-</span></p>
                                        <p><b>Address:</b> <span class="address">-</span></p>
                                        <p><b>Email:</b> <span class="email">-</span></p>
                                        <p><b>Subject:</b> <span class="subject"></span>-</p>
                                        <p><b>Claim Type:</b> <span class="id_claim_type">-</span></p>
                                        <p><b>Parcel Reference #:</b> <span class="parcel_reference_number">-</span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <hr>
                                        <p><b>Company Name:</b> <span class="company_name">-</span></p>
                                        <p><b>When did this happen:</b> <span class="when_happen">-</span></p>
                                        <p><b>Evidence:</b> <span class="email">-</span></p>
                                    </div>
                                </div>
                                <hr>
                                <p><b>What happened?</b></p>
                                <p><span class="answer what_happened">-</span></p>

                                <p><b>How were you affected?</b></p>
                                <p><span class="answer affected">-</span></p>

                                <p><b>How would you like your issue to be resolved?</b></p>
                                <p><span class="answer resolved">-</span></p>
                            </div>

                            <div class="col-md-4 xxs_fullwidth xs_fullwidth col-xs-4">
                                <aside class="sidebar">
                                    <div class="search_category">
                                    <h3>Order Summary</h3>
                                    <hr>
                                    <p>Sub-total <span class="pull-right" id="subtotal">1.00</span></p>
                                    <p>Discount <span class="pull-right"> 0.00</span></p>
                                    <h3>Total 
                                        <span class="pull-right">£ 
                                            <span id="total">1.00</span>
                                        </span>
                                    </h3>
                                    <hr>
                                    <!-- <a href="#" class="btn btn-warning pull-right checkout btn-lg">Checkout with Payal</a> -->
                                    <div class="pull-right paypalButton" data-amount="1.00" id="paypal-button" ></div>
                                    <br>
                                    </div>
                                </aside>
                            </div>
                        </div><!-- /.row end -->
                    </div>
                </div>
           </div>
            
        </section>
        <!-- WHAT WE DO -->



    </main>


<!-- Footer -->
<?php $this->load->view('front/template/pre-footer');?>
<?php $this->load->view('front/template/footer');?>

<!-- Custom Script -->
<script src="<?= base_url() ?>public/custom/front/claims.js"></script>

<!--PAYPAL SCRIPTS-->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<!--PAYPAL SCRIPTS-->

<script src="<?= base_url() ?>public/custom/front/claim-paypal.js"></script>
