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
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Dashboard</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Transactions</a>
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
									<div class="card-title">
									Transaction Lists

									<div class="btn-group dropdown pull-right">
										<button class="btn btn-hotpink dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
											<i class="fa fa-plus"></i> Add Shipments
										</button>
										<ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;">
											<li>
												<a class="dropdown-item" href="<?= base_url() ?>#plans">Single Shipments</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="<?= base_url() ?>transactions/createMultipleShipments/<?= $this->uri->segment('3')?>">Multiple Shipments</a>
											</li>
										</ul>
									</div>

									</div>
								</div>
								<div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table" class="display table table-striped table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Transaction #</th>
                                                    <th>Plans</th>
                                                    <th>Tracking Number</th>
                                                    <th>Courier</th>
                                                    <th>Status</th>
                                                    <th>Latest Update</th>
                                                </tr> 
                                            </thead>
                                            <tbody>
												<?php foreach($transactions as $transaction): ?>
													<?php
													$badge = 'danger';
													if($transaction->status == 2){
														$badge = 'success';
													}	
													?>
                                                    <tr>
                                                        <td><?= $transaction->reference_nos?></td>
                                                        <td><?= $transaction->name?></td>
                                                        <td><?= $transaction->tracking_number?></td>
                                                        <td><?= $transaction->courier_name?></td>
														<td><span class="badge badge-<?= $badge?>"><?= $this->customlib->getStatus($transaction->status) ?></span></td>

													</td>
													<td>
															<?php

															// $parcelUpdates = $this->customlib->getLatestShipmentUpdate($transaction->id);
															
															?>
															<!-- <b>Status:</b> <?= $parcelUpdates->message ?> <br>
															<b>Time and Date:</b> <?= $parcelUpdates->checkpoint_time ?> <br>
															<b>Location: </b><?= $parcelUpdates->location ?> <br> -->

														<buttton class="btn btn-hotpink btn-sm trackbutton my-3"
                                                        data-id="<?= $transaction->id?>" 
                                                        data-plan="<?= $transaction->name?>" 
                                                        data-tracking_number="<?= $transaction->tracking_number?>" 
                                                        data-courier_name="<?= $transaction->courier_name?>" 
                                                        data-courier_code="<?= $transaction->courier_code?>" 
                                                        ><i class="fa fa-eye"></i> View Updates</buttton><br></td>
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

	<?php $this->load->view('back/customer/components/updates-timeline-modal'); ?>                                         

    <?php $this->load->view('back/template/footer');?>
	<script src="<?= base_url() ?>public/custom/back/customer/transaction.js"></script>