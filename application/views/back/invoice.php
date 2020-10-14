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
						<h4 class="page-title">Invoice</h4>
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
                            <?php  
							if($this->session->userdata('sys_msg')){
							?>
								<div class="alert alert-<?= $this->session->userdata('sys_msg_type')?>">
									<?= $this->session->userdata('sys_msg')?>
								</div>
							<?php
							}
							?>
							<div class="card">
								<div class="card-header">
									<div class="card-title">Invoice Lists

									</div>
									
								</div>
								<div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table" class="display table table-striped table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Subscription</th>
                                                    <th>Invoice</th>
                                                </tr> 
                                            </thead>
                                            <tbody>
												<?php foreach($invoices as $invoice): ?>
													<?php
													$badge = 'warning';
													?>
                                                    <tr>
                                                    <td><?= $invoice->name?></td>
                                                    <td><button  class="btn btn-link text-hotpink btn-lg showInvoice"
														data-invoice_nos="<?= $invoice->invoice_nos?>"
														data-id_plan="<?= $invoice->id_plan?>"
														data-id="<?= $invoice->id?>">
                                                        <i class="fa fa-eye"></i>
                                                        <?= $invoice->invoice_nos?></button></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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
                                            
     <?php $this->load->view('back/customer/components/invoice-modal2'); ?>                                              

    <?php $this->load->view('back/template/footer');?>
	<!-- PRINT JS -->
	<script src="<?= base_url()?>public/custom/back/js/print-wth-bootstrap.js"></script>
	<script src="<?= base_url()?>public/custom/money_format.js"></script>
	
	<script>
	function printDiv() 
	{
		printJS({
			printable: 'print-invoice',
			type: 'html',
			style: '@page { size: Letter landscape; }',
			targetStyles: ['*']
		})

    }
    
    $(document).on('click', ".showInvoice", function () {
        let invoice_nos = $(this).attr('data-invoice_nos');
        let id_plan = $(this).attr('data-id_plan');
        $('#invoiceModal').modal('show');
        let controller = '';
        if(id_plan == 3){ //CLAIMS
            controller = 'getClaimsInvoiceContent';
        }else{
            controller = 'getInvoiceContent';
        }


        $.ajax({//AJAX TO GET REPLACEMENT ACCOUNT DETAILS
            type: 'ajax',
            method: 'post',
            url: base_url + 'invoice/'+ controller +'/' + invoice_nos,
            data:{},
            // async: false,
            dataType: 'json',
            success: function(response){
                console.log(response);

                let total = 0;
                $("#invTable").html('');
                for(var i = 0; i < response.length; i++){
                    $("#invTable").append(
                    '<tr>'+
                        '<td>'+ response[i].plan_name +'</td>'+
                        '<td>'+ response[i].reference_nos +'</td>'+
                        '<td>'+ formatCurrency(response[i].plan_price) +'</td>'+
                    '<tr>'
                    );
                    $(".invdate").text(response[i].created_at);
                    total = parseFloat(response[i].total) - parseFloat(response[i].discount);
                    $(".invsubtotal").text('£' + formatCurrency(response[i].total));
                    $(".invdiscount").text('£' + formatCurrency(response[i].discount));
                    $(".invtotal").text('£' + formatCurrency(total));
                }
                
                $(".invoice_nos").text(invoice_nos);

              
            },
            error: function(){
                $(".tracking-loading-div").css('display','none');
                $(".tracking-parce-updates").css('display','block');
                swal('Something went wrong');
            }
        });//AJAX TO GET SPONSOR ACCOUNT DETAILS

    });

	</script>