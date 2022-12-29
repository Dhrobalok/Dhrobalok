<div class="row">
    <div class="col-md-6">
        <select class="form-control" name="bank_ids[]">
            @foreach($banks as $bank)
            <option value="{{ $bank -> id }}">{{ $bank -> bank_name }}</option>
            @endforeach
        </select>

    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" name="account_number[]" required>
    </div>
    <div class="col-md-1">
        <button type="button" class="btn btn-danger" onclick="remove(this)"><i class="fa fa-trash-alt"></i></button>
    </div>
</div>