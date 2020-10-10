<!-- Modal -->
<div id="updateTimelineModal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Claims Update</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">


            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                        <ul class="timeline parcelUpdates">
                            
                        </ul>
                    </div>
                </div>
                <?php
                if($_SESSION['id_user_type'] == 1){
                    ?>
                    <div class="col-md-6">
                        <div class="jumbotron">
                            <div class="form-group">
                                <label for="successInput">Date</label>
                                <input type="date" id="update_date" name="update_date" class="form-control">
                                <input type="hidden" id="id_claim" name="id_claim"  class="form-control">
                                <input type="hidden" id="email" name="email"  class="form-control">
                                <input type="hidden" id="reference_nos" name="reference_nos"  class="form-control">
                            </div>
                            <div class="form-group">
                            <label> Attach file</label>
                                <input class="form-control form-white-bg" type='file' name='file' id="file" size='20' required/>
                                <input type="hidden" name='file1' id="file1">
                            </div>
                            <div class="form-group">
                                <label for="successInput">Update Message</label>
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btnAdd"><i class="fa fa-plus"></i> Add Update</button>
                            </div>
                        </div>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="col-md-6">
                        <div class="jumbotron">
                            <h3>Want more help?</h3>
                            <p>Send us a message now. Just type and send your message on the bottom right of your screen.</p>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!-- Modal -->