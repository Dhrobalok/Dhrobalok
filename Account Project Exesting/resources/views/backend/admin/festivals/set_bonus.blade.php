@extends('backend.admin.index')
@section('content')

<div class="container">
    @if(Session :: get('message'))
    <div class="alert alert-success f-100">
        {{ Session :: get('message') }}
    </div>
    @endif
    <div class="row form-group">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header text-center f-100 blue-color font-bold">
                    Employee Information
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <label>Name : </label>
                        </div>
                        <div class="col-md-4">
                            <label>{{ $employee -> name }}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Email Address : </label>
                        </div>
                        <div class="col-md-3">
                            <label>{{ $employee -> user_info -> email }}</label>
                        </div>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col-md-2">
                            <label>Mobile No : </label>
                        </div>
                        <div class="col-md-4">
                            <label>{{ $employee -> mobile_no }}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Reg. No : </label>
                        </div>
                        <div class="col-md-3">
                            <label>{{ $employee -> employee_reg_id }}</label>
                        </div>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col-md-2">
                            <label>Type : </label>
                        </div>
                        <div class="col-md-4">
                            <label>{{ $employee -> type -> name }}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Designation : </label>
                        </div>
                        <div class="col-md-3">
                            <label>{{ $employee -> designation -> name }}</label>
                        </div>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col-md-2">
                            <label>Department : </label>
                        </div>
                        <div class="col-md-4">
                            <label>{{ $employee -> department -> name }}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Status : </label>
                        </div>
                        @if($employee -> status == 0)
                        <div class="col-md-3">
                            <label>Inactive</label>
                        </div>
                        @elseif($employee ->status == 1)
                        <div class="col-md-3">
                            <label>Active</label>
                        </div>
                        @else
                        <div class="col-md-3">
                            <label>Retired</label>
                        </div>
                        @endif
                    </div>
                    <div class="row  justify-content-center form-group">
                        <div class="col-md-2">
                            <label>Joining Date : </label>
                        </div>
                        <div class="col-md-4">
                            <label>{{ $employee -> joining_date }}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Retired Date : </label>
                        </div>
                        <div class="col-md-3">
                            <label>{{ $employee -> retired_date  }}</label>
                        </div>
                    </div>
                    @if($employee -> status != 1)
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <a class="btn" style="background-color:#1dbf73;font-family:'Gentium Basic'"
                                href="{{ route('admin.employee-management.employees.approve',['employee_id' => $employee -> id])}}">Approve</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header f-100 blue-color font-bold">
                    <div class="row">
                        <div class="col-md-6">
                            Bonus Info
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary text-right f-100" style = "display:none" id = "copy_bonus">Copy Bonus</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="bonus_form">

                        <div class="row text-black justify-content-center">
                            <div class="col-md-5">
                                <label>Festival</label>
                            </div>
                            <div class="col-md-5">
                                <label>Bonus(% on Basic Salary)</label>
                            </div>
                        </div>
                        <div class="row text-black form-group justify-content-center">
                            <div class="col-md-5">
                                <select class="form-control" name="festival_id" id="festival_id">
                                    @foreach($festivals as $festival)
                                    <option value="{{ $festival -> id }}">{{ $festival -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <input type="float" class="form-control" name="bonus_per" id="bonus_per" required>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary text-right f-100" id = "save">Save</button>
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
$(document).ready(function() {
    $('#bonus_form').submit(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        })

        $.ajax({
            url: "{{ route('admin.festival.save-bonus') }}",
            type: "post",
            data: {
                festival_id: $('#festival_id').val(),
                bonus_per: $('#bonus_per').val(),
                employee_id: "{{ $employee -> id }}"
            },
            success: function(response) {
                $.notify('Bonus set successfully!!', 'success');
                $('#save').prop('disabled',true);
                $('#copy_bonus').css({
                    'display' : ''
                });
                console.log(response);
            }
        });
    })

   $('#copy_bonus').click(function(){
       
    $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        })

        $.ajax({
            url: "{{ route('admin.festival.copy-bonus') }}",
            type: "post",
            data: {
                festival_id: $('#festival_id').val(),
                bonus_per: $('#bonus_per').val(),
                employee_id: "{{ $employee -> id }}"
            },
            success: function(response) {
                $.notify('Bonus copied successfully!!');
                console.log(response)
            }
        });
   })
})
</script>
@endpush