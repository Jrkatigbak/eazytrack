	<!--   Core JS Files   -->
	<script src="<?= base_url(); ?>public/back/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url(); ?>public/back/js/core/popper.min.js"></script>
	<script src="<?= base_url(); ?>public/back/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?= base_url(); ?>public/back/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url(); ?>public/back/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?= base_url(); ?>public/back/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?= base_url(); ?>public/back/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= base_url(); ?>public/back/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?= base_url(); ?>public/back/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?= base_url(); ?>public/back/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?= base_url(); ?>public/back/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= base_url(); ?>public/back/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url(); ?>public/back/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?= base_url(); ?>public/back/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?= base_url(); ?>public/back/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?= base_url(); ?>public/back/js/setting-demo.js"></script>
	<script src="<?= base_url(); ?>public/back/js/demo.js"></script>

	<script> let base_url = '<?= base_url()?>'; </script>

	<script>
	    $(document).ready(function() {
			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});
		});
	</script>
	
	<?php
	if($this->session->flashdata('HEADER_SEARCH_TRACKING')){
		?>
		<script>
			var form = document.createElement("div");
				form.innerHTML = "<div class='jumbotron'>"+
					"<h1 class='text-primary'><b><i class='fas fa-exclamation-circle' style='font-size:100px';></i></h1>"+
					"<h1><b>Tracking number found!</b></h1>"+
					"<br>"+
					"<ul class='list-group list-group-bordered'>"+
						"<li class='list-group-item'><b>Invoice #: </b><span class='pull-right text-warning'> <?= $this->session->flashdata('invoice_nos'); ?></span></li>"+
						"<li class='list-group-item'><b>Reference Number: </b><span class='push-right text-warning'> <?= $this->session->flashdata('reference_nos'); ?></span></li>"+
						"<li class='list-group-item'><b>Tracking Number: </b><span class='float-right text-warning' align='right'> <?= $this->session->flashdata('tracking_number'); ?></span></li>"+
					"</ul>"+
					"<br>"+
					"<div class='btn-group'>"+
						"<button type='button' class='btn btn-warning cancelbtn'>Okay</button>"+
						"<button type='button' class='btn btn-hotpink updatebtn'>View Tracking Updates</button>"+
					"</div>"+
				"</div>";
                    
			swal({
			title: '',
			text: '',
			content: form,
			buttons: false,
			})
		</script>
		<?php
	}
	?>

<?php
	if($this->session->flashdata('HEADER_ERRORSEARCH_TRACKING')){
		?>
		<script>
			var form = document.createElement("div");
				form.innerHTML = "<div class='jumbotron'>"+
					"<h1 class='text-primary'><b><i class='fas fa-exclamation-circle' style='font-size:100px';></i></h1>"+
					"<h1><b><?= $this->session->flashdata('HEADER_ERRORSEARCH_TRACKING'); ?></b></h1>"+
					"<br>"+
					"<div class='btn-group'>"+
						"<button type='button' class='btn btn-warning cancelbtn'>Okay</button>"+
						"<button type='button' class='btn btn-hotpink updatebtn'>View Tracking Updates</button>"+
					"</div>"+
				"</div>";
                    
			swal({
			title: '',
			text: '',
			content: form,
			buttons: false,
			})
		</script>
		<?php
	}
	?>

	<script>
		$(document).on('click', ".cancelbtn", function () {
			swal.close();
		})
	</script>

</body>
</html>