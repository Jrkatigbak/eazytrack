<!-- Modal -->
<div id="invoiceModal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Invoice</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="container" id="print-invoice">
                        <h1 class="pull-right"> <b>INVOICE</b></h1>
                        <br>
                        <br>
                        <h3> <b>EAZYTRACK</b></h3>
                        <label for="">Trading as:</label><br>
                        <label for="">VIRTUAL CALL SOLUTIONS LIMITED</label><br>
                        <label for="">238a Kingston Road, New Malden, England, KT3 3RN</label><br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label><b>CUSTOMER NAME:</b> <?= $_SESSION['name']?></label><br>
                                <label><b>ADDRESS: </b> <?= $_SESSION['address']?></label>
                            </div>
                            <div class="col-md-6">
                                <label><b>INVOICE #: </b> <span class="invoice_nos"></span></label><br>
                                <label><b>DATE: </b> <span class="invdate"></span></label>
                            </div>

                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table  class="table table-hover" class="table ">
                                    <thead >
                                        <tr>
                                            <th scope="col">Subscription</th>
                                            <th scope="col">Reference #</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody id="invTable">
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h3 for="" class="pull-right">Total <span class="invtotal"></span></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="printDiv()" class="btn btn-hotpink"><i class="fa fa-print"></i> Print</button>
        </div>
        </div>
    </div>
</div>
<!-- Modal -->