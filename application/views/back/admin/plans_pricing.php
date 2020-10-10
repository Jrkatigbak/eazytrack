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
						<h4 class="page-title">Plans & Pricing</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
                            <a href="<?= base_url()?>back/admin/dashboard/index">
									<i class="flaticon-home"></i>
								</a>
							</li>
						</ul>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Plans & Pricing List</h4>
										<!-- <button class="btn btn-primary btn-round ml-auto" id="btnAdd" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add
										</button> -->
									</div>
								</div>
								<div class="card-body">
                                    <div class="table-responsive">
                                        <table id="multi-filter-select" class="display table table-striped table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Plans</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr> 
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($plans_pricing as $plan){
                                            ?>
                                                <tr>
                                                    <td><?= $plan->name?></td>
                                                    <td><?= $plan->actual_price?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-link btn-primary btn-lg btnEdit" data-id="<?= $plan->id  ?>"  title="Edit">
                                                            <i class="fa fa-edit"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Modal -->
    <form action="<?= base_url()?>Plans/save_plan" id="form" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                            New</span> 
                            <span class="fw-light">
                            Row
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <div class="modal-body">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>First name*</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="fill First name" required>
                            <input type="hidden" id="id" name="id" class="form-control" placeholder="fill First name" required>
                            </div>
                        </div>
                        <div class="col-md-12 pr-3">
                            <div class="form-group">
                            <label>Actual price*</label>
                            <input type="number" id="actual_price" name="actual_price" class="form-control" placeholder="fill Actual price" required>
                            </div>
                        </div>
                        </div>
                    </div>  
                    <div class="modal-footer no-bd">
                        <!-- <button type="button" id="addRowButton" class="btn btn-primary">Add</button> -->
                        <button type="button"  class="btn btn-primary" id="formBtn" data-operation="save">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



	<?php $this->load->view('back/template/footer');?>

<script>

    // ADD AND UPDATE
    $("#formBtn").click(function(e){

    var operation = $("#formBtn").attr('data-operation'); // GET OPERATION (save | edit)

    // Operation Checker
    if(operation == 'save'){
        var title = 'Do you want to save this record?';
    }else{
        var title = 'Do you want to edit this record?';
    }

    // Get valu from textbox
    var name = $("#name").val();
    var actual_price = $("#actual_price").val();
    var price_per_day    = $("#price_per_day").val();
    var description = $("#description").val(); 
    var status = $("#status").val();
    var best_seller = $("#best_seller").val();

    // Validation of Required fields
    if(name == '' || actual_price == '' || price_per_day == '' || description == '' || status == ''){
        swal('Please input all the required(*) field','','error'); // success   // error    // info
        return false;
    }

    e.preventDefault(); // PREVENT FORM SUBMISSION

    //SWAL = CONFIRM MESSAGE
    swal({
            title: title,
            text:   '',
            content: '',
            icon: "warning",
            buttons:{
                cancel: {
                    visible: true,
                    text : 'No',
                    className: 'btn btn-danger'
                },        			
                confirm: {
                    text : 'Yes',
                    className : 'btn btn-primary'
                }
            },
            successMode: true,
            }).then(function(isConfirm) {
            if (isConfirm) {
                $('#form').submit();
            } else {

            }
        })
    //SWAL = CONFIRM MESSAGE

    })

    $("#btnAdd").click(function(){
        $('.modal-title').text('Add new plan'); // Change modal title           
        $('#formBtn').text('Save'); // Change buttton text
        $('#addRowModal').modal('show'); // Show modal
        $("#formBtn").attr('data-operation','save'); // Change operation into Edit
        $('#form').attr('action', '<?= base_url()?>plans/save_plan/'); // Set form action

        $("#name").val('');
        $("#actual_price").val('');
        $("#price_per_day").val('');
        $("#description").val('');
        $("#status").val('');
        $("#best_seller").val('');
    })

    // SET THE FORM FOR EDIT
    $(".btnEdit").click(function(){
            var id = $(this).attr("data-id");
            $('.modal-title').text('Edit Plan'); // Change modal titlea
            $('#formBtn').text('Update'); // Change buttton text
            $('#addRowModal').modal('show'); // Show modal
            $("#formBtn").attr('data-operation','edit'); // Change operation into Edit
            $('#form').attr('action', '<?= base_url()?>plans/update_plans/'); // Set form action

            $.ajax({
                type: 'ajax',
                method: 'post',
                url:'<?= base_url()?>plans/getPlans/' + id,
                data: {},
                dataType: 'text',
                success: function(response){ 
                    var data = JSON.parse(response);
                    $("#id").val(data[0].id);
                    $("#name").val(data[0].name);
                    $("#actual_price").val(data[0].actual_price);
                    $("#price_per_day").val(data[0].price_per_day);
                    $("#description").val(data[0].description);
                    $("#status").val(data[0].status);
                    $("#best_seller").val(data[0].best_seller);
                    console.log(response);
                },
                error: function(){
                    swal('Could not edit data');
                }
            });

        })
    
    $(".btnDelete").click(function(){
        var id = $(this).attr("data-id");

        swal({
            title: "Do you want to delete this record?",
            text: "",
            icon: "error",
            buttons: [
                'Cancel',
                'Yes, Uncancelled it'
            ],
            successMode: true,                            
            }).then(function(isConfirm){
            if (isConfirm){

                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?= base_url()?>plans/delete_plan',
                    data: {
                        id: id
                    },
                    datatype: 'text',
                    success: function(response){
                        location.reload();
                    },
                    error: function(){
                        swal ('Could not delete data')
                }
                })
            }
            })

    })

</script>

<?php 
if ($this->session->flashdata('DLT_RECORD')) {
?>
        <script>
            swal({
                title: "Deleted",
                text: "",
                icon: "success",
                buttons: {
                confirm: {
                text: "Ok",
                value: true,
                visible: true,
                className: "btn btn-success",
                closeModal: true,
                }
                }
                
            })
        </script>
<?php
}
?>


<?php
if( $this->session->flashdata('SUCCESS')){
?>

    <script>
        swal({
            title: "Successful!",
            text: "<?= $this->session->flashdata('SUCCESS') ?>",
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

<?php 
if($this->session->flashdata('UPDATED')){
?>

    <script>
        swal({
            title: "Updated",
            text: "<?= $this->session->flashdata('UPDATED') ?> ",
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