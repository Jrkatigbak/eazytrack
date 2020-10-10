<!-- Modal -->
<div id="trackingModal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="jumbotron bg-primary">
                    <div class="title">
                        <img src="<?= base_url() ?>public/front/dist/img/logo/logo.png" class="footer-logo mb-2" alt="footer_logo">
                        <button type="button" class="close text-white modalClose d-none" id="free-tracking-modal-close" data-dismiss="modal">&times;</button>
                        <h3>You are using Eazytrack free tracking!</h3>
                        <hr class="hr-divider">
                       
                    </div>
                    <div class="row" id="freeTrackonProcess">
                        <div class="col-md-12" align="center">
                            <br>
                            <div class="loading-time" >
                                <h3>Hold on! while we are pulling up some updates based on your tracking number.</h3><br>
                            </div>
                            <img src="<?= base_url()?>public/front/dist/img/logo/loading.gif" style="width:20%" alt="">
                            <br>
                        </div>
                    </div>
                    <div id="FreeTracked" style="display:none">
                        <div align="center"><h3 class="latest_update"></h3></div>
                        <div class="parcelUpdates">
                        </div>
                    </div>
                    <div class="title">
                        <hr class="hr-divider">
                        <p class="text-white">Need more clear translations & regular updates on your parcel tracking?</p>
                        <p class="text-white">We can Help You!</p>
                        <a href="<?= base_url() ?>#plans" class="btn btn-warning goToPlans">Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->