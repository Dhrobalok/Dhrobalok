@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto">Employee Update</div>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('admin.employee-management.employees.index') }}"
                                class="btn btn-info f-100 text-white"><i class="fa fa-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <form action="{{ route('admin.employees.update',['employee_id' => $employee -> id])}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 text-right">
                                <img src="{{ URL :: to($employee -> employee_photo) }}" height="200px" width="200px"
                                    id="employee_photo" onclick="upload_photo()" style="border:2px solid blue">
                                <input type="file" name="employee_photo" id="file_upload_photo" class="pb-4" hidden>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 text-center">
                                <div class="f-roboto">Basic Information</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Full Name<span class="text-danger">*</span></label>
                            </div>

                        </div>

                        {{ $employee -> name }}
                       
                        <div class="row form-group">

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name',$employee -> name) }}">
                                @if($errors -> has('first_name'))
                                <small>{{ $errors -> first('name') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <label>Gender<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Email Address<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Mobile No<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-md-4">
                                <select class="form-control" name="gender">
                                    <option value="{{ $employee -> gender }}" selected hidden>
                                        {{ Str :: title($employee -> gender) }}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                         
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="email" readonly
                                    value="{{ old('email',$employee  -> email) }}">

                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="mobile_no"
                                    value="{{ old('mobile_no',$employee -> mobile_no) }}">
                                @if($errors -> has('mobile_no'))
                                <small>{{ $errors -> first('mobile_no') }}</small>
                                @endif
                            </div>
                        </div>

                        
                        <div class="row">

                            <div class="col-md-4">
                                <label>Date Of Birth<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Joining Date<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Designation<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="date_of_birth"
                                    value="{{ old('date_of_birth',$employee -> date_of_birth) }}">
                                @if($errors -> has('date_of_birth'))
                                <small>{{ $errors -> first('date_of_birth') }}</small>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="joining_date"
                                    value="{{ old('joining_date',$employee -> joining_date) }}">
                                @if($errors -> has('joining_date'))
                                <small>{{ $errors -> first('joining_date') }}</small>
                                @endif
                            </div>
                            
                            <div class="col-md-4">
                                <select class="form-control" name="designation_id">
                                    @foreach($designations as $designation)
                                    @if($employee -> designation_id == $designation -> id)
                                    <option value="{{ $designation -> id }}" selected>{{ $designation -> name }}
                                    </option>
                                    @else
                                    <option value="{{ $designation -> id }}">{{ $designation -> name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-4">
                                <label>Employee N<sup>0</sup><span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-4">
                                <label>Department<span class="text-danger">*</span></label>
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="employee_number"
                                    value="{{ old('employee_number',$employee -> user_id) }}">
                                @if($errors -> has('employee_number'))
                                <small>{{ $errors -> first('employee_number') }}</small>
                                @endif
                            </div>


                            <div class="col-md-4">
                                <select class="form-control" name="department_id">
                                    @foreach($departments as $department)
                                    @if($employee -> department_id == $department -> id)
                                    <option value="{{ $department -> id }}" selected>{{ $department -> name }}</option>
                                    @else
                                    <option value="{{ $department -> id }}">{{ $department -> name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        {{--  

                        <div class="row">

                            <div class="col-md-4">
                                <label>Division<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Department<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Section<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-md-4">
                                <select class="form-control" name="division_id">
                                    @foreach($divisions as $division)
                                    @if($employee -> division_id == $division -> id)
                                    <option value="{{ $division -> id }}" selected>{{ $division -> name }}</option>
                                    @else
                                    <option value="{{ $division -> id }}">{{ $division -> name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="department_id">
                                    @foreach($departments as $department)
                                    @if($employee -> department_id == $department -> id)
                                    <option value="{{ $department -> id }}" selected>{{ $department -> name }}</option>
                                    @else
                                    <option value="{{ $department -> id }}">{{ $department -> name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="section_id">
                                    @foreach($sections as $section)
                                    @if($employee -> section_id == $section -> id)
                                    <option value="{{ $section -> id }}" selected>{{ $section -> name }}</option>
                                    @else
                                    <option value="{{ $section -> id }}">{{ $section -> name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <label>Bank Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Account N<sup>0</sup><span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control" name="bank_id">
                                    @foreach($banks as $bank)
                                    @if($employee -> bank_id == $bank -> id)
                                    <option value="{{ $bank -> id }}" selected>{{ $bank -> bank_name }}</option>
                                    @endif
                                    <option value="{{ $bank -> id }}">{{ $bank -> bank_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="account_no"
                                    value="{{ old('account_no',$employee -> account_no) }}">
                            </div>
                        </div>
                        <div class="row pt-4 pb-4">
                            <div class="col-md-12">
                                <div style="background:#e5e5e5;height:2px;width:100%"></div>
                            </div>
                        </div>
                        @php
                        $addresses = $employee -> getAddress;
                        $emergency_contact = $employee -> getEmergencyContact;
                        $academic_details = $employee -> getAcademicRecords;
                        $previous_experiences = $employee -> getPreviousWorkingExperiences;
                        @endphp
                        <div class="row pb-4">
                            <div class="col-md-12">
                                <div class="text-center f-roboto">Addresses</div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <h5>Present Address</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Street Address<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <label>Street Address Line 2</label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="present_street_address1"
                                    value="{{ old('present_street_address1',$addresses[0] -> street_address1) }}">
                                @if($errors -> has('present_street_address1'))
                                <small>{{ $errors -> first('present_street_address1') }}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="present_street_address2"
                                    value="{{ old('present_street_address2',$addresses[0] -> street_address2) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>City<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <label>Postal Code / ZIP<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="present_city"
                                    value="{{ old('present_city',$addresses[0] -> city) }}">
                                @if($errors -> has('present_city'))
                                <small>{{ $errors -> first('present_city') }}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="present_zip_code"
                                    value="{{ old('present_zip_code',$addresses[0] -> zip_code) }}">
                                @if($errors -> has('present_zip_code'))
                                <small>{{ $errors -> first('present_zip_code') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="row pt-4 pb-4">
                            <div class="col-md-12">
                                <div style="background:#e5e5e5;height:2px;width:100%"></div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <h5>Permanent Address</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Street Address<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <label>Street Address Line 2</label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="permanent_street_address1"
                                    value="{{ old('permanent_street_address1',$addresses[1] -> street_address1) }}">
                                @if($errors -> has('permanent_street_address1'))
                                <small>{{ $errors -> first('permanent_street_address1') }}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="permanent_street_address2"
                                    value="{{ old('permanent_street_address2',$addresses[1] -> street_address2) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>City<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <label>Postal Code / ZIP<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="permanent_city"
                                    value="{{ old('permanent_city',$addresses[1] -> city) }}">
                                @if($errors -> has('permanent_city'))
                                <small>{{ $errors -> first('permanent_city') }}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="permanent_zip_code"
                                    value="{{ old('permanent_zip_code',$addresses[1] -> zip_code) }}">
                                @if($errors -> has('permanent_zip_code'))
                                <small>{{ $errors -> first('permanent_zip_code') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="row pt-4 pb-4">
                            <div class="col-md-12">
                                <div style="background:#e5e5e5;height:2px;width:100%"></div>
                            </div>
                        </div>
                        <div class="row text-center pb-4">
                            <div class="col-md-12">
                                <h5>Emergency Contact Address</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Mobile<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Relationship<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="emergency_contact_name"
                                    value="{{ old('emergency_contact_name',$emergency_contact -> contact_name) }}">
                                @if($errors -> has('emergency_contact_name'))
                                <small>{{ $errors -> first('emergency_contact_name') }}</small>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="emergency_mobile_number"
                                    value="{{ old('emergency_mobile_number',$emergency_contact -> mobile_number) }}">
                                @if($errors -> has('emergency_mobile_number'))
                                <small>{{ $errors -> first('emergency_mobile_number') }}</small>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="relationship"
                                    value="{{ old('relationship',$emergency_contact -> relation) }}">
                                @if($errors -> has('relationship'))
                                <small>{{ $errors -> first('relationship') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Street Address<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <label>Street Address Line 2</label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="emergency_street_address1"
                                    value="{{ old('emergency_street_address1',$addresses[2] -> street_address1) }}">
                                @if($errors -> has('emergency_street_address1'))
                                <small>{{ $errors -> first('emergency_street_address1') }}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="emergency_street_address2"
                                    value="{{ old('emergency_street_address2',$addresses[2] -> street_address2) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>City<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <label>Postal Code / ZIP<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="emergency_city"
                                    value="{{ old('emergency_city',$addresses[2] -> city) }}">
                                @if($errors -> has('emergency_city'))
                                <small>{{ $errors -> first('emergency_city') }}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="emergency_zip_code"
                                    value="{{ old('emergency_zip_code',$addresses[2] -> zip_code) }}">
                                @if($errors -> has('emergency_zip_code'))
                                <small>{{ $errors -> first('emergency_zip_code') }}</small>
                                @endif
                            </div>
                        </div>
                     --}}
                        <div class="row form-group justify-content-center">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-block f-100"
                                    style="background:#1dbf73;color:white;font-size:18px;">Save</button>
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

    $(document).on("change", "#file_upload_photo", function() {

        var profile_image = $('#file_upload_photo').prop('files')[0];
        var reader = new FileReader();
        reader.onload = function() {
            $("#employee_photo").attr("src", reader.result);
        }
        reader.readAsDataURL(profile_image);
    });
});

function upload_photo() {
    $('#file_upload_photo').trigger('click');
}

$('#new_certification').click(function(e) {

    e.preventDefault();
    $.ajax({
        url: "{{ route('ajax.add-more-certificate') }}",
        type: "get",
        data: {},
        success: function(res) {
            $('#educational_records').append(res);
        }
    })
});
$('#new_experience').click(function(e) {

    e.preventDefault();
    $.ajax({
        url: "{{ route('ajax.add-more-experience') }}",
        type: "get",
        data: {},
        success: function(res) {
            $('#previous_experience_records').append(res);
        }
    })
});

function remove(ref) {
    $(ref).closest('tr').remove();
}
</script>
@endpush
