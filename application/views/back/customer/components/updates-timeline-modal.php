<!-- Modal -->
<div id="updateTimelineModal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Shipment progress (in courier's local time)</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <?php $this->load->view('components/tracking-loading-div') ?>
                    <div class="container tracking-parce-updates" style="display:none">
                        <h1> Tracking Number: <b><span class="tracking_number text-danger"></span></b></h1>
                        <h3> Courier Name: <b><span class="text-muted courier_name text-warning"></span></b></h3>
                        <h3> Latest Update: <b><span class="text-muted latest_update text-warning"></span></b></h3>
                        <hr>
                        <ul class="timeline parcelUpdates">
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!-- Modal -->