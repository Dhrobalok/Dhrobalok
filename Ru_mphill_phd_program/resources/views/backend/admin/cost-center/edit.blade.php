@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="f-roboto">Cost Center Update</div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('cost-center-index') }}" class='btn btn-sm btn-info f-100'><i
                                    class="fa fa-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.cost-center.update',['id' => $cost_center -> id]) }}" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label>Type </label>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control" name="type_id">

                                    @foreach($types as $type)
                                    @if($type -> id == $cost_center -> type_id)
                                    <option value="{{ $type -> id }}" selected hidden>{{ $type -> name }}</option>
                                    @else
                                    <option value="{{ $type -> id }}">{{ $type -> name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label>Name </label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="name" class="form-control" placeholder="Center Name"
                                    value="{{ old('name',$cost_center -> name) }}">
                                <small class="text-danger f-100 text-left font-weight-bold">
                                    @if($errors -> any('name'))
                                    {{ $errors -> first('name')}}
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label>Code</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="code" class="form-control" placeholder="Code"
                                    value="{{ old('code',$cost_center -> code) }}">
                                <small class="text-danger f-100 text-left font-weight-bold">
                                    @if($errors -> any('code'))
                                    {{ $errors -> first('code') }}
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label>Description</label>
                            </div>
                            <div class="col-md-5">
                                <textarea name="description" class="form-control"
                                    placeholder="Short Description">{{ old('description',$cost_center -> description) }}</textarea>
                                <small class="text-danger f-100 text-left font-weight-bold">
                                    @if($errors -> any('description'))
                                    {{ $errors -> first('description') }}
                                    @endif
                                </small>
                            </div>
                        </div>
                        <hr>
                        <div class="row form-group">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-5">
                                <select class="form-control" id="cost_account_id">
                                    <option value="0">Search Account</option>
                                </select>
                            </div>
                            <div class="col-md-3 text-right">
                                <a href="#" class="font-weight-bold f-100" style="color:blue;"
                                    onclick="add_new_line(event)">Add New Account</a>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <table class="table table-sm table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <td>Code</td>
                                            <td>Name</td>
                                            <td>Description</td>
                                            <td>Options</td>
                                        </tr>
                                    </thead>
                                    <tbody id="cost_accounts">
                                        @foreach($cost_center -> getCostAccounts as $cost_account)
                                        <tr class="text-center">
                                            <input type="hidden" name="cost_account_ids[]" value="{{ $cost_account -> id }}">
                                            <td>{{ $cost_account -> general_code }}</td>
                                            <td>{{ $cost_account -> name }}</td>
                                            <td>{{ $cost_account -> description }}</td>
                                            <td>
                                                <a href="#" onclick="remove(this)" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row text-center form-group">
                            <div class="col-md-12">
                                <button class="btn btn-info pl-4 pr-4 pt-2 pb-2 f-100"><i
                                        class="fa fa-save mr-2"></i>Save Record</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
function add_new_line(event) {

    event.preventDefault();
    const cost_account_id = $('#cost_account_id').val();

    if (cost_account_id != 0) {

        $.ajax({
            url: "{{ route('admin.cost-center.add-new-cost-account') }}",
            type: "get",
            data: {
                account_id: $('#cost_account_id').val()
            },
            success: function(res) {
                $('#cost_accounts').append(res);
            }
        });
    }
}

function remove(ref) {
    $(ref).closest('tr').remove();
}

$(document).ready(function() {

    $("#cost_account_id").select2({

        ajax: {
            url: "{{ route('ajax.search-term-matched-accounts') }}",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term,
                    '_token': "{{  csrf_token() }}"
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
});
</script>
@endpush