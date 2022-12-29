@extends('backend.admin.index')
@section('content')
<div class="container mb-4">
    <form id="budget_allocation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="f-roboto">Define Budget</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if(count($entries) == 0)
                                <button type="button" class="f-100 btn btn-info" id="generate_table_btn"><i
                                        class="fa fa-plus mr-2"></i>Generate Table To Entry</button>
                                @endif
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="f-100 btn btn-primary" id="save_changes"><i
                                        class="fa fa-check mr-2" id="save_changes_btn"></i>Save Changes</button>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12" style="max-height:500px;overflow-y:scroll">
                                <table class="table table-bordered table-sm table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <td>Account Name</td>
                                            <td>Account Type</td>
                                            <td>Usable Amount(Max)</td>
                                            <td>Budget Type</td>
                                        </tr>
                                    </thead>

                                    <tbody id="entries">
                                        @foreach($entries as $entry)
                                        <tr class = "text-center">
                                        <td>{{ $entry -> account -> name }}</td>
                                        <input type="hidden" name="coa_ids[]" value="{{ $entry -> coa_id }}">
                                        <input type="hidden" name = "entry_ids[]" value = "{{ $entry -> id }}">
                                        <td>
                                            {{ $entry -> account -> account_category -> category_name }}
                                        </td>
                                        <td>
                                            <input type="text" class="form-control text-center" name = "max_usable_amount[]"
                                                value="{{ $entry -> max_usable_amount }}">
                                        </td>
                                        <td>
                                            <select class="form-control" name="budget_type[]">
                                                <option value = "{{ $entry -> allocation_type }}" selected hidden>{{ $entry -> allocation_type }}</option>
                                                <option value="Fixed">Fixed</option>
                                                <option value="Variable">Variable</option>
                                            </select>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('js')
<script>
$("#generate_table_btn").click(function() {

    $.ajax({
        url: "{{ route('ajax.budget.generate-table') }}",
        type: "get",
        data: {},
        success: function(content) {
            $("#entries").html(content);
        }
    })
});

$("#budget_allocation").on('submit',function(e){
    
    e.preventDefault();
    const Data = new FormData($(this)[0]);

    $.ajaxSetup({
        headers:
        {
            'X-CSRF-Token' : "{{ csrf_token() }}"
        }
    });

    $.ajax({
        url : "{{ route('admin.budget.allocation.update') }}",
        type : "post",
        data : Data,
        processData:false,
        contentType:false,
        success:function(res)
        {
            $.notify(res,'success');
        }
    });
});
</script>
@endpush