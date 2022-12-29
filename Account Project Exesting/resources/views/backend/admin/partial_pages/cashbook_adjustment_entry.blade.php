@if($isBank  == 1)
@if($type == 1)
<div class="row mt-1">
    <div class="col-md-5 font-weight-normal">
        <input type="text" class="form-control" name="additions_bank[]">
    </div>
    <div class="col-md-3">
        <input type="number" step="any" class="form-control" name="addition_amounts_bank[]" onchange = "changeAmount('{{ $isBank }}')">
        
    </div>
    <div class="col-md-1">
      <button type = "button" class = "btn btn-danger text-white btn-sm" onclick = "remove_entry(this)"><i class = "fa fa-trash-alt"></i></button>
    </div>
</div>
@else
<div class="row mt-1">
    <div class="col-md-5 font-weight-normal">
        <input type="text" class="form-control" name="deductions_bank[]">
    </div>
    <div class="col-md-3">
        <input type="number" step="any" class="form-control" name="deduction_amounts_bank[]" onchange = "changeAmount('{{ $isBank }}')">
        
    </div>
    <div class="col-md-1">
      <button type = "button" class = "btn btn-danger text-white btn-sm" onclick = "remove_entry(this)"><i class = "fa fa-trash-alt"></i></button>
    </div>
</div>
@endif
@else
@if($type == 1)
<div class="row mt-1">
    <div class="col-md-5 font-weight-normal">
        <input type="text" class="form-control" name="additions_cashbook[]">
    </div>
    <div class="col-md-3">
        <input type="number" step="any" class="form-control" name="addition_amounts_cashbook[]" onchange = "changeAmount('{{ $isBank }}')">
        
    </div>
    <div class="col-md-1">
      <button type = "button" class = "btn btn-danger text-white btn-sm" onclick = "remove_entry(this)"><i class = "fa fa-trash-alt"></i></button>
    </div>
</div>
@else
<div class="row mt-1">
    <div class="col-md-5 font-weight-normal">
        <input type="text" class="form-control" name="deductions_cashbook[]">
    </div>
    <div class="col-md-3">
        <input type="number" step="any" class="form-control" name="deduction_amounts_cashbook[]" onchange = "changeAmount('{{ $isBank }}')">
        
    </div>
    <div class="col-md-1">
      <button type = "button" class = "btn btn-danger text-white btn-sm" onclick = "remove_entry(this)"><i class = "fa fa-trash-alt"></i></button>
    </div>
</div>
@endif
@endif