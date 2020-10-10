<!-- Modal -->
<div id="availplansModal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-body">
            <div class="jumbotron bg-primary">
                <div class="title">
                    <img src="<?= base_url() ?>public/front/dist/img/logo/logo.png" class="footer-logo mb-2" alt="footer_logo">
                    <button type="button" class="close text-white" data-dismiss="modal">×</button>
                    <hr class="hr-divider">
                    <h3 class="modal-title">Order Details</h3>
                    <br>
                </div>
                <div class="row loadingTime">
                    <div class="col-md-6">
                        <!-- Parcel Details -->
                        <div class="jumbotron jmb-bg-secondary jumbotron-less-p">
                            <form action="#" method="post">
                                <div class="col-md-12 tracking-details-container"><h3 class="plans-pricing-title">Tracking Details</h3>
                                <hr class="hr-divider hr-left"></div>
                                
                                <div class="col-md-12">
                                    <label for="" class="p-more-white"><b>Enter Tracking Number</b></label>
                                    <input  type="text" name="tracking_number" id="tracking_number"
                                    class="form-control-default" placeholder="Enter your tracking number">
                                   
                                    <br>
                                    <div class="courierinfo" style="display:none;">
                                        <label for="" class="p-more-white"><b>Courier Details</b></label>
                                        <select class="js-example-basic-single form-control" id="couriername" name="couriername">
                                            <option value="AL">Select Courier</option>
                                            <?php foreach($couriers as $courier): ?>
                                                <option value="<?= $courier->slug?>"><?= $courier->name?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <label for="">Note! We detect the couriers base on the tracking number format matching. </label>
                                        <label for="">You may also select and confirm the right courier here.</label>
                                    </div>

                                    <input type="hidden" id="id_plans">


                                    <label for="tracking_number" class="text-danger errortracking_number d-none"></label>
                                </div>
                                <div class="col-md-12 courier_details_holder d-none">
                                    <h4 for="" class="p-more-white mt-3"><b>Courier\s Details</b></h4>
                                    <hr>
                                    <div class="courier_details"></div>
                                </div>

                            </form>
                        </div>
                        <!-- Parcel Details -->
                    </div>

                    <div class="col-md-6">
                        <!-- Order Summary -->
                        <div class="jumbotron jmb-bg-secondary jumbotron-less-p">
                            <h3>Order Summary</h3>
                            <hr>
                            <p>Sub-total <span class="pull-right" id="subtotal"> 1</span></p>
                            <p>Discount <span class="pull-right"> 0.00</span></p>
                            <h3>Total 
                                <span class="pull-right">£ 
                                    <span id="total">0.00</span>
                                </span>
                            </h3>
                            <hr>

                            <div class="mb-3 payment-method-container">
                                <label><b>Select your payment method:</b></label>                    
                                <div class="d-flex">
                                    <img class="img-responsive pm pm-paypal" 
                                        src="<?= base_url()?>/public/front/dist/img/paypal.jpg" alt=""
                                        onmouseover="paypal_hover(this);" onmouseout="paypal_unhover(this);">       
                                    <img class="img-responsive pm pm-stripe" 
                                        src="<?= base_url()?>/public/front/dist/img/stripe.jpg" alt=""
                                        onmouseover="stripe_hover(this);" onmouseout="stripe_unhover(this);">       
                                </div>   
                            </div>

                            <!-- <a href="#" class="btn btn-warning pull-right checkout btn-lg">Checkout with Payal</a> -->
                            <div class="proceedPayment" data-amount=""><button class="btn btn-warning btn-block btn-md proceed"><i class="fa fa-share"></i> Confirm & Payment</button></div>
                            <button class="btn btn-stripe btn-block stripeButton" id="checkout-button" style="display:none">Stripe Checkout</button>
                            <div class="paypalButton" data-amount="" id="paypal-button" style="display:none"></div>

                        </div>
                        <!-- Order Summary -->
                        <div class="jumbotron jmb-bg-secondary jumbotron-less-p planDetails-container d-none">
                            <div class="planDetails"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Modal -->