

@extends('backend.admin.index')
@section('content')
<div class="content">


    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default mb-4">
            <h3 class="block-title" style="text-align: center;">Upadte Information</h3>
        </div>
        @if ($profiledesignation)

         <form  action="{{ url('update.profile',$profiledesignation->id) }}" method="post">
            @csrf
            <div class="row form-group justify-content-center">
                <input type="hidden" name="id" value="{{ $profiledesignation->id}}">

                <div class="col-md-3">
                    <label>Name<span class = "text-danger"></span></label>
                </div>



                <div class="col-md-8">
                    <input type = "text" name="fullNameNew" class="form-control"  value = "{{ $profiledesignation->fullNameNew }}">

                </div>








                <div class="col-md-3 py-2">
                    <label>Designation<span class = "text-danger"></span></label>
                </div>


                <div class="col-md-8 py-2">
                     @php
                          $office=DB::table('designations')->select('name')->distinct()->orderBy('name')->get();
                    @endphp
                   <select name="officename" class="form-control select2">
                        <option value="{{ $profiledesignation->Designation }}">{{$profiledesignation->Designation}}</option>
                        @foreach ($office as $designation)

                        <option value="{{ $designation->name }}">{{$designation->name}}</option>

                        @endforeach


                    </select>


                </div>


                <div class="col-md-3 py-1">
                    <label>Serial&nbsp;Index<span class = "text-danger"></span></label>
                </div>



                <div class="col-md-8 py-1">
                    <input type = "text" name="officeSRINDEX" class="form-control"  value = "{{ $profiledesignation->officeSRINDEX }}">

                </div>

                <div class="col-md-3 py-2">
                    <label>Office&nbsp;Address<span class = "text-danger">*</span></label>
                </div>



                <div class="col-md-8 py-2">
                    <input type = "text" name="office_address" class="form-control"  value = "{{ $profiledesignation->office_address }}" required>

                </div>

                <div class="col-md-3 py-2">
                    <label>Email<span class = "text-danger">*</span></label>
                </div>



                <div class="col-md-8 py-2">
                    <input type = "text" name="emaill" class="form-control"  value = "{{ $profiledesignation->emaill }}" required>

                </div>

                <div class="col-md-3 py-2">
                    <label>Mobile<span class = "text-danger">*</span></label>
                </div>



                <div class="col-md-8 py-2">
                    <input type = "text" name="mobile_no" class="form-control"  value = "{{ $profiledesignation->mobile_no }}" required>

                </div>


                <div class="col-md-3">
                    <label>Status<span class = "text-danger">*</span></label>
                </div>



                <div class="col-md-8">
                    <input type = "text" name="job_status" class="form-control"  value = "{{ $profiledesignation->job_status }}" required>

                </div>

            </div>








                <div class="row form-group justify-content-center">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <button type="submit" class="form-control btn btn-primary">Save</button>
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>
            @endif
        </form>
    </div>
    <!-- END Dynamic Table Full -->

</div>

@endsection

@push('js')

<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endpush
