@extends('frontend.layout')
@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                @if(Session :: get('success_message'))
                <div class="alert alert-success">
                      {{ Session :: get('success_message') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Employee Record Update</h4>
                    </div>
                    <div class="card-body shadow-lg">
                        <form action="{{ route('employee.update',['employee_id' => $employee -> id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row  justify-content-center">

                                <div class="col-md-6">
                                    <label>First Name<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row form-group justify-content-center">

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name',$employee -> name) }}">
                                    @if($errors -> has('name'))
                                    <small>{{ $errors -> first('name') }}</small>
                                    @endif
                                </div>

                            </div>
                            <div class="row  justify-content-center">

                                <div class="col-md-6">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row form-group justify-content-center">

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email',$employee -> user_info -> email) }}">
                                    @if($errors -> has('email'))
                                    <small>{{ $errors -> first('email') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mobile_no"
                                        value="{{ old('mobile_no',$employee -> mobile_no) }}">
                                    @if($errors -> has('mobile_no'))
                                    <small>{{ $errors -> first('mobile_no') }}</small>
                                    @endif
                                </div>
                            </div>


                            <div class="row  justify-content-center">

                                <div class="col-md-6">
                                    <label>Department<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <label>Designation<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row form-group justify-content-center">

                                <div class="col-md-6">
                                    <select class="form-control" name="department">
                                    <option value = "{{ $employee -> type_id }}" selected hidden>{{ $employee -> department -> name }}</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department -> id }}">{{ $department -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="designation">
                                    <option value = "{{ $employee -> type_id }}" selected hidden>{{ $employee -> designation -> name }}</option>
                                        @foreach($designations as $designation)
                                        <option value="{{ $designation -> id }}">{{ $designation -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row  justify-content-center">

                                <div class="col-md-6">
                                    <label>Joining Date<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <label>Retired Date<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row form-group justify-content-center">

                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="join_date" value = "{{ old('join_date',$employee -> joining_date) }}">
                                    @if($errors -> has('join_date'))
                                    <small>{{ $errors -> first('join_date') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="retired_date" value = "{{ old('join_date',$employee -> retired_date) }}">
                                    @if($errors -> has('retired_date'))
                                    <small>{{ $errors -> first('retired_date') }}</small>
                                    @endif
                                </div>
                            </div>



                            <div class="row form-group justify-content-end">
                                <div class="col-md-4">
                                    <img class="card-img  mx-auto" src="{{ URL :: to($employee -> employee_photo) }}" alt=""
                                        style="height: 250px; width: 250px; border: 2px #ccc solid" id="user_photo">
                                </div>
                                <div class="col-md-2">

                                    <input type="file" id="file_upload_photo" hidden name="file_upload_photo">
                                    @if($errors -> has('user_photo'))
                                    <small>{{ $errors -> first('file_upload_photo') }}</small>
                                    @endif
                                    <a href="#" class="btn btn-primary" id="file_upload_button">
                                        Photo</a>
                                </div>

                            </div>

                            <div class="row form-group justify-content-center">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Save Record</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
$(document).ready(function() {
    $('#file_upload_button').on('click', function(e) {
        e.preventDefault();
        $('#file_upload_photo').trigger('click');
    });
    $(document).on("change", "#file_upload_photo", function() {

        var profile_image = $('#file_upload_photo').prop('files')[0];
        var reader = new FileReader();
        reader.onload = function() {
            $("#user_photo").attr("src", reader.result);
        }
        reader.readAsDataURL(profile_image);
    });
})
</script>
@endpush
