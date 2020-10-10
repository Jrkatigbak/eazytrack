<?php $this->load->view('back/template/header');?>
<style>
.pm-active{
    border: 4px solid #fff;
}
</style>
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
						<h4 class="page-title">
							<?php
							$table_name = 'Parcel Tracking';
							if($this->uri->segment(3) == 2){
								$table_name = 'Parcel Monitoring';
							}
							echo $table_name;
							?>
						</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Multiple Shipments</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="alert alert-warning">
                                            Download a <a href="<?php echo site_url('transactions/exportformat')?>">CSV template here</a> to see the example format required. Duplicate shipments will not be imported or overwritten.
                                            </div>
                                        </div>
                                        <div class="col-md-8">

                                            <form action="<?= base_url() ?>transactions/addMultipleShipments/<?= $this->uri->segment('3')?>" id="formCsv" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="email2">Import shipments by CSV</label>
                                                    
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" id="file" name="file">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-hotpink  uploadCsv" type="button"> Upload</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                            
                                            <div class="table-responsive mt-3">
                                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                                    <thead>
                                                        <tr>
                                                            <th>Tracking Number</th>
                                                            <th>Courier</th>
                                                        </tr> 
                                                    </thead>
                                                    <tbody>
                                                        <?php if(isset($shipments)){?>
                                                            <?php foreach($shipments as $shipment): ?>
                                                                <tr>
                                                                    <td><?= $shipment['tracking_number'] ?></td>
                                                                    <td>         
                                                                        <div class="form-group">
                                                                            <select class="form-control form-control-sm" id="courier_slug" name="courier_slug">
                                                                                <?php foreach($couriers as $courier): ?>
                                                                                    <?php
                                                                                    $selected = '';
                                                                                    if($shipment['courier_slug'] == $courier->slug){
                                                                                        $selected = 'selected';
                                                                                    }    
                                                                                    ?>
                                                                                    <option <?= $selected ?> value="<?= $courier->slug?>"><?= $courier->name?></option>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                            <small id="emailHelp2" class="form-text text-muted">You may also select and confirm the right courier here.</small>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <!-- Order Summary -->
                                            <div class="jumbotron jmb-bg-secondary jumbotron-less-p">
                                                <h3>Order Summary</h3>
                                                <hr>
                                                <p>Sub-total <span class="pull-right" id="subtotal"> <?= number_format($total ?? 0,2)?></span></p>
                                                <p>Discount <span class="pull-right"> 0.00</span></p>
                                                <h3>Total 
                                                    <span class="pull-right">£ 
                                                        <span id="total"> <?= number_format($total ?? 0,2)?></span>
                                                    </span>
                                                </h3>
                                                <hr>

                                                <div class="mb-3 payment-method-container">
                                                    <label><b>Select your payment method:</b></label>                    
                                                    <div class="d-flex">
                                                        <img class="img-responsive pm pm-paypal"  style="width:30%;"
                                                            src="<?= base_url()?>/public/front/dist/img/paypal.jpg" alt=""
                                                            onmouseover="paypal_hover(this);" onmouseout="paypal_unhover(this);">       
                                                        <img class="img-responsive pm pm-stripe"  style="width:30%;"
                                                            src="<?= base_url()?>/public/front/dist/img/stripe.jpg" alt=""
                                                            onmouseover="stripe_hover(this);" onmouseout="stripe_unhover(this);">       
                                                    </div>   
                                                </div>

                                                <!-- <a href="#" class="btn btn-warning pull-right checkout btn-lg">Checkout with Payal</a> -->
                                                <div class="proceedPayment" data-amount=""><button class="btn btn-warning btn-block btn-md proceed"><i class="fa fa-share"></i> Confirm & Payment</button></div>
                                                
                                                <button class="btn btn-stripe btn-block stripeButton" id="checkout-button" style="display:none">Stripe Checkout</button>
                                                <div class="paypalButton" data-amount="<?= number_format($total ?? 0,2)?>" id="paypal-button" style="display:none"></div>
                                            


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
			</div>
			<?php $this->load->view('back/template/pre-footer');?>
		</div>
    </div>

    <!-- Modal -->
    <div id="loadingTimeModal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-body">
                <div class="jumbotron bg-hotpink" align="center">
                    <div class="title">
                        <img src="<?= base_url() ?>public/front/dist/img/logo/logo.png" class="footer-logo mb-2" alt="footer_logo">
                        <hr class="hr-divider">
                    </div>
                    <div class="row loadingTime">
                        <div class="col-md-12">
                                <br>
                            <div class="loading-time" >
                                <h2>Hold on! while we are pulling up some updates based on your shipment/s.</h2><br>
                            </div>
                                <img src="<?= base_url() ?>public/front/dist/img/logo/loading.gif" style="width:20%" alt="">
                                <br>
                                <br>
                                <br>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <?php $this->load->view('back/template/preloading.php')?>
	<?php $this->load->view('back/customer/components/updates-timeline-modal'); ?>                                               
	<?php $this->load->view('back/customer/components/invoice-modal'); ?>    

    <!--PAYPAL SCRIPTS-->
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>


    <script>
        //PAYPAL SCRIPTS
	paypal.Button.render({
    
            
    env: 'production', // sandbox | production



    // PayPal Client IDs - replace with your own
    // Create a PayPal app: https://developer.paypal.com/developer/applications/create
    client: {
        sandbox:    'AVDIK7vJx9I9_K-NOMFbjUtwnCqH-kTVNnRIwfFfutprUnp0jSVYvtpFA0-qeyqYuonvJwswnhq2aa2s',
        production: 'ASF3tWZKhsTvSjjt_Ip6dW6ctP-ZUSOlkgCm1ORkXtaHyi_m4G20XsboZsI4h9GGgc6lZ0qXM8UUbVdb'
    },

    // Show the buyer a 'Pay Now' button in the checkout flow
    commit: true,

    // payment() is called when the button is clicked
    payment: function(data, actions) {
        let amount = $(".paypalButton").attr('data-amount');
        // Make a call to the REST api to create the payment
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                        amount: { total: amount, currency: 'GBP' }
                    }
                ]
            }
        });
    },

    // onAuthorize() is called when the buyer approves the payment
    onAuthorize: function(data, actions) {

        // Make a call to the REST api to execute the payment
        return actions.payment.execute().then(function() {
            paypal_checkout();
        });
    }


    }, '#paypal-button');



    function paypal_checkout(){
        let id_plans = '<?= $this->uri->segment('3');?>';

        // Script to update permissions
        var table_data = [];
        $('#multi-filter-select tr').each(function(row,tr){
            if($(tr).find('td:eq(0)').text() == ''){
            }else{
                var sub = {
                'tracking_number' : $(tr).find('td:eq(0)').text(),
                'courier_slug' : $(tr).find('td:eq(1) #courier_slug').val(),
                };
            } 
            table_data.push(sub);
        });
        table_data = table_data.filter(function(e){return e}); 
        var data = {'data_shipments' : table_data}

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: base_url + 'transactions/saveBulkShipments/' + id_plans,
            data: {
                "data": data
            },
            dataType: 'text',
            beforeSend: function() {
                $("#loadingTimeModal").modal('show');
            },
            success: function(response){ 
                window.location.replace( base_url + 'transactions/index/' + id_plans);
            },
            error: function(){
                window.location.replace( base_url + 'transactions/index/' + id_plans);
            }
        });
        // CALL TRANSACTION CONTROLLER TO EXECUTE THE REMAINING PROCESS (2-5)
    }
    //PAYPAL SCRIPTS
    </script>

    <!--PAYPAL SCRIPTS-->     



    <?php $this->load->view('back/template/footer');?>
	<script src="<?= base_url() ?>public/custom/back/customer/transaction.js"></script>
    <script>
    $(".uploadCsv").click(function(e){
        e.preventDefault();

        //SWAL = CONFIRM MESSAGE
        swal({
            title: "Do you want to proceed with this tracking number/s?",
            text:   '',
            icon: "warning",
            content: '',
            buttons:{
            cancel: {
            visible: true,
            text : 'No',
            className: 'btn btn-danger'
            },        			
            confirm: {
            text : 'Yes',
            className : 'btn btn-success'
            }
            },
            successMode: true,
            }).then(function(isConfirm) {
            if (isConfirm) {
                $('#formCsv').submit();
            } else {

            }
        })
        //SWAL = CONFIRM MESSAGE

    })

    function paypal_hover(element) {
        element.setAttribute('src', base_url + 'public/front/dist/img/paypal-hover.jpg');
    }

    function paypal_unhover(element) {
        element.setAttribute('src', base_url + 'public/front/dist/img/paypal.jpg');
    }

    function stripe_hover(element) {
        element.setAttribute('src', base_url + 'public/front/dist/img/stripe-hover.jpg');
    }

    function stripe_unhover(element) {
        element.setAttribute('src', base_url + 'public/front/dist/img/stripe.jpg');
    }

    $(".pm-paypal").click(function(){
        $(".pm-stripe").removeClass('pm-active');
        $(".proceed").val('Paypal');
        $(this).addClass('pm-active');
    })

    $(".pm-stripe").click(function(){
        $(".pm-paypal").removeClass('pm-active');
        $(".proceed").val('Stripe');
        $(this).addClass('pm-active');
    })
    
    $(document).on('click', ".proceed", function () {

        let payment_method = $(this).val();

        if(payment_method == ''){
            swal('Choose your preferred payment method','','info'); return;
        }
        
        var tran_status = 0;

        swal({
            title: "Do you want to proceed to proceed with this shipments details?",
            text: "",
            icon: "warning",
            buttons: [
                'No, Not yet!',
                'Yes, I am sure!'
            ],
            successMode: true,
            }).then(function(isConfirm) {
            if (isConfirm) {
                
                $(".proceed").attr('disabled','true');
                $(".proceed").text('Loading...');

                if(payment_method == 'Paypal'){
                    $(".paypalButton").css('display','block');
                }else{
                    $(".stripeButton").css('display','block');
                }
                $(".proceed").css('display','none');
                $(".payment-method-container").css('display','none');

                
            } else {

            }
        })
    })

    </script>

<script>
    //PRELOADING
    $(document).ready(function(){
        $('body').addClass('loaded');
        $('h1').css('color','#222222');	
    });
    </script>

    