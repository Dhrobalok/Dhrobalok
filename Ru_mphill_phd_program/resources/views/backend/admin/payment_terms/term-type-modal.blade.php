<div class="modal fade" id="term-type-modal" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="f-100" style="font-size:20px;color:#1dbf73">Create Terms</div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col-md-2">
                        <label>Term Type</label>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" id = "due_type">
                            <option value="Percentage">Percentage</option>
                            <option value="Fixed">Fixed</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Percentage/Amount</label>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" id = "amount" step = "any" value = "0">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label class="font-weight-bold">Due the</label>
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" value = "0" step = "1" id = "days">
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id = "option">
                            <option value="days_after_the_invoice_date">days after the invoice date</option>
                            <option value="after_invoice_month">days after the end of the invoice month</option>
                        </select>
                    </div>
                </div>
                <div class="row text-center mb-4">
                    <div class="col-md-12">
                        <button class="btn" onclick = "saveNewRule()"
                            style="font-family:Roboto;background:#f0f3f8;color:black;padding:10px 30px;font-weight:100"
                            type="button" data-dismiss="modal">Save & Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>