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
				<h4 class="page-title">Customer Management</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
				</ul>
			</div>

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Customer List</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="multi-filter-select" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Contact</th>
										<th>Address</th>
										<th>Username</th>
										<th>status</th>
										<th>Action</th>
									</tr> 
								</thead>

								<tbody>
									<?php
									foreach($customers as $customer){
									?>
										<tr role="row" class="odd">
											<td><?= $customer->first_name ?></td>
											<td><?= $customer->email ?></td>
											<td><?= $customer->contact ?></td>
											<td><?= $customer->address ?></td>
											<td><?= $customer->username ?></td>
											<td>
                      
                      <?php
                      if($customer->status == 1){
                        echo 'Inactive';
                      }else{
                        echo 'Active';
                      }
                      ?>
                  
											<td>
												<div class="btn-group">
													<a class="btn btn-link btn-danger btn-lg iconBan" 
                          data-id="<?= $customer->id_user?>"
                          data-status="<?php echo $customer->status; ?>"
                          title="Ban Customer">

                          <?php
                          if($customer->status == 1){
                            echo '<i class="fa fa-check text text-success" aria-hidden="true"></i>';
                          }else{
                            echo '<i class="fa fa-ban"></i>';
                          }
                          ?>
													

													<a class="btn btn-link btn-warning btn-lg" data-id="<?= $customer->id_user?>" title="View Transaction">
													<i class="fa fa-eye"></i>
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

    <!-- Modal -->
<form action="<?= base_url()?>back/admin/customerMngmnt/save_customer" id="form" method="POST" enctype="multipart/form-data">
	<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden=" ">
		<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
						Add </span> 
						<span class="fw-mediumbold">
						Customer    
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row ">
					<div class="col-md-6">
						<div class="form-group form-group-default"> 
						<label>first name*</label>
						<input type="text" id="first_name" name="first_name" class="form-control" placeholder="Input First name" required>
						<input type="hidden" id="id_user" name="id_user" class="form-control" placeholder="Input First name" required>
						</div>
					</div>
					<div class="col-md-6 pr-3">
						<div class="form-group form-group-default">
						<label>Middle Name*</label>
						<input type="text" id="middle_name" name="middle_name" class="form-control" placeholder="Input Middle Name" required>
						</div>
					</div>
					<div class="col-md-6 ml-auto mr-auto">
						<div class="form-group form-group-default">
						<label>Last Name*</label>
						<input type="text" id="last_name" name="last_name" class="form-control" placeholder="Input Last Name" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group form-group-default">
						<label>Contact</label>
						<input type="number" id="contact" name="contact" class="form-control" placeholder="Input Contact" required>
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-12">
						<div class="form-group form-group-default">
						<label>Address</label>
						<input type="text" id="address" name="address" class="form-control" placeholder="Input Address" required>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group form-group-default">
						<label>Email</label>
						<input type="email" id="email" name="email" class="form-control" placeholder="Input Email" required>
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-6">
						<div class="form-group form-group-default">
						<label>Username</label>
						<input type="username" id="username" name="username" class="form-control" placeholder="Input Username" required>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group form-group-default">
						<label>Password</label>
						<input type="password"  id="password" name="password" class="form-control" placeholder="Input Password" required>
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-6">
						<div class="form-group form-group-default">
						<label>Picture</label>
						<input type="file" id="picture" name="picture" class="form-control" placeholder="Input Picture" required>
						</div>
					</div>  
					</div>
				</div>
				<div class="modal-footer no-bd">
				<!-- <button type="button" id="addRowButton" class="btn btn-primary">Add</button> -->
				<button type="button"  class="btn btn-primary" id="formBtn" data-operation="save">save</button>
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
        var title = 'Do you want to save this account?';
    }else{
        var title = 'Do you want to edit this account?';
    }

    // Get value from textbox
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var address = $("#address").val();
    var contact = $("#contact").val();  
    var username = $("#username").val();
    var password = $("#password").val();

    // Validation of Required fields
    if(first_name == '' || middle_name == '' || email == '' || contact == '' || address == '' || username == '' || password == ''){
        swal('Please input all the required(*) field','','error'); // success   // error    // info
        return false;
    }

    e.preventDefault(); // PREVENT FORM SUBMISSION

    //SWAL = CONFIRM MESSAGE
    swal({
        title: title,
        text:   '',
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
            $('#form').submit();
        } else {

        }
  })
    //SWAL = CONFIRM MESSAGE

  })

    $("#btnAdd").click(function(){
      $('.modal-title').text('Add new account'); // Change modal title
      $('#formBtn').text('Save'); // Change buttton text
      $('#addRowModal').modal('show'); // Show modal
      $("#formBtn").attr('data-operation','save'); // Change operation into Edit
      $('#form').attr('action', '<?= base_url()?>back/admin/customerMngmnt/save_customer'); // Set form action
		
      $("#first_name").val('');
      $("#middle_name").val('');
      $("#last_name").val('');
      $("#email").val('');
      $("#contact").val('');
      $("#address").val('');
      $("#username").val('');
      $("#password").val('');
    })
    

    // SET THE FORM FOR EDIT
    $(".btnEdit") .click(function(){
      var id_user = $(this).attr("data-id");
      $('.modal-title').text('Edit Account'); // Change modal title
      $('#formBtn').text('Update'); // Change buttton text
      $('#addRowModal').modal('show'); // Show modal
      $("#formBtn").attr('data-operation','edit'); // Change operation into Edit
      $('#form').attr('action', '<?= base_url()?>back/admin/customerMngmnt/update_customer/'); // Set form action
      // $("#addRowModal").modal('show');
      // $("#form").attr('action','<?= base_url()?>back/admin/customerMngmnt/update_customer');

      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?= base_url()?>back/admin/customerMngmnt/getcustomerById',
        data: {
          id_user : id_user
        },
        datatype: 'text',
        success: function(response){ 
          var data = JSON.parse(response);
          $("#first_name").val(data[0].first_name);
          $("#id_user").val(data[0].id_user);
          $("#middle_name").val(data[0].middle_name);
          $("#last_name").val(data[0].last_name);
          $("#email").val(data[0].email);
          $("#contact").val(data[0].contact);
          $("#address").val(data[0].address);
          $("#username").val(data[0].username);
          $("#password").val(data[0].password);
          $("#picture").val(data[0].picture);
          console.log(response);
        },
        error: function(){
          swal('could not edit data');
        }
      })
 })


 $(".btnDelete").click(function(){
        var id_user = $(this).attr("data-id");

        swal({
          title: "do you want to delete this record ?",
          text: "",
          icon: "error",
          buttons: [
            'Cancel',
            'Yes, uncancelled it'
            ],
          successMode: true,
          }).then(function(isConfirm){
          if (isConfirm) {
          
            $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?= base_url()?>back/admin/CustomerMngmnt/delete_customer',
              data: {
                id_user : id_user
              },
              datatype: 'text',
              success: function(response){
                location.reload();
              },
              error: function(){
                swal('could not delete data');
              }
              })

          }
          })
          

	 })
	 
$(".iconBan").click(function(){
    var id_user = $(this).attr("data-id");
    var current_status = $(this).attr("data-status");

    swal({
      title: "Do you want to block this user?",
      text: "",
      icon: "error",
      buttons: [
        'Cancel',
        'Yes'
      ],
      successMode: true,
      }).then(function(isConfirm){
          if (isConfirm) {
          
            $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?= base_url()?>back/admin/customerMngmnt/update_status',
              data: {
                id_user : id_user,
                current_status : current_status 
              },
              datatype: 'text',
              success: function(response){
                location.reload();
              },
              error: function(){
                swal('could not delete data');
              }
              })

          }
          })
})


</script>

<?php
  if( $this->session->flashdata('SUCCESS') ){
    ?>

    <script>
      swal({
          title: "Successful!",
          text: "<?= $this->session->userdata('SUCCESS') ?>",
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
  if( $this->session->flashdata('ERASE') ){
    ?>

    <script>
    swal({
      title: "Deleted!",
      text: "<?= $this->session->flashdata('ERASE') ?>",
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
            text: "<?= $this->session->flashdata('UPDATED') ?>",
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
  if( $this->session->flashdata('user_blocked') ){
    ?>

    <script>
    swal({
      title: "Deleted!",
      text: "<?= $this->session->flashdata('user_blocked') ?>",
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
