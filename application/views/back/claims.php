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
						<h4 class="page-title">Claims</h4>
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
									<div class="card-title">Transactions Lists
									<a href="<?= base_url() ?>claims" class="btn btn-hotpink ml-auto pull-right" style="color:#fff">
									<i class="fa fa-plus"></i>  Add New Claims</a>
									</div>
									
								</div>
								<div class="card-body">
                                    <div class="table-responsive">
                                        <table id="multi-filter-select" class="display table table-striped table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Transaction #</th>
													<th>Invoice</th>
                                                    <th>Parcel Reference #</th>
                                                    <th>Name</th>
                                                    <th>Subject</th>
                                                    <th>Claim Type</th>
                                                    <th>Status</th>
                                                    <th>Transaction Date</th>
                                                    <th>Action</th>
                                                </tr> 
                                            </thead>
                                            <tbody>
												<?php foreach($claim_order as $transaction): ?>
													<?php
													$badge = 'warning';
													?>
                                                    <tr>
														<td><a href="#" class="btnUpdate text-primary"
															data-id="<?= $transaction->id?>"
															data-reference_nos="<?= $transaction->reference_nos?>"
															data-email="<?= $transaction->email?>"
															><?= $transaction->reference_nos?></a></td>
															<td><button  class="btn btn-link text-hotpink btn-lg showInvoice"
														data-created_at="<?= $transaction->created_at?>"
														data-reference_nos="<?= $transaction->reference_nos?>"
														data-invoice_nos="<?= $transaction->invoice_nos?>"><i class="fa fa-eye"></i> <?= $transaction->invoice_nos?></button></td>
                                                        <td><?= $transaction->parcel_reference_number?></td>
                                                        <td><?= $transaction->name?></td>
                                                        <td><?= $transaction->subject?></td>
                                                        <td><?= $transaction->type?></td>
                                                        <td><span class="badge badge-<?= $badge?>"><?= $transaction->status?></span></td>
														<td><?= $transaction->created_at?></td>
                                                        <td>
															<div class="btn-group">
																<button class="btn btn-link btn-primary btn-lg btnUpdate"
																data-id="<?= $transaction->id?>"
																data-reference_nos="<?= $transaction->reference_nos?>"
																data-email="<?= $transaction->email?>"
																data-toggle="tooltip"  data-original-title="View Update"
																><i class="icon-location-pin"></i></button>

																<button class="btn btn-link btn-danger viewFUll"
																data-toggle="tooltip"  data-original-title="See full details"
																data-reference_nos="<?= $transaction->reference_nos?>"><i class="icon-paper-clip"></i></button>
															</div>
														</td>
                                                    </td>
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

     <?php $this->load->view('back/components/claims-modal-update'); ?>                                               
     <?php $this->load->view('back/components/view-claims-modal'); ?>                                               
     <?php $this->load->view('back/customer/components/claims-invoice-modal'); ?>                                               

    <?php $this->load->view('back/template/footer');?>
	<script src="<?= base_url() ?>public/custom/claims.js"></script>
	<!-- PRINT JS -->
	<script src="<?= base_url()?>public/custom/back/js/print-wth-bootstrap.js"></script>
	
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
	</script>