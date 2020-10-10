<!-- Modal -->
<div id="successModal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header plansConfirmforPayment">
            <button type="button" class="close text-white modalClose" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Order Details</h4>
        </div>
        <div class="modal-body">
            <div class="col-md-12" align="center">
                <br>
                <div class="loading-time" >
                <h3>Hold on! while we are pulling up some updates based on your tracking number.</h3><br>
                </div>
                <img src="<?= base_url() ?>public/front/dist/img/logo/loading.gif" style="width:20%" alt="">
                <br>
                <br>
                <br>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default modalClose" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!-- Modal -->