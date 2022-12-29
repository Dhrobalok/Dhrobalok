@extends('backend.admin.index')
@section('content')
<div class="content">


    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default mb-4">
            <h3 class="block-title" style="text-align: center;">Upadte Additional Information</h3>
            {{-- <a class="btn btn-primary f-100"><i class ="fa fa-angle-left mr-2"></i>Back</a> --}}
        </div>
        @if ($allinformation)

         <form  action="{{ url('update.addtioan',$allinformation->id) }}" method="post"> 
            @csrf
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Present Designation<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    {{-- <input type="hidden" name="category_id" value="{{ $allinformation->officename }}"> --}}
                    <input type = "text" class="form-control"  value = "{{ $allinformation->designat }}" readonly>
                    {{-- @if($errors -> any('name') && !old('name'))
                      <strong class = "text-danger f-100">Account name required</strong>
                    @endif --}}
                </div>

                <div class="col-md-3 py-4">
                    <label>Update Designation<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8 py-4">
                     @php
                          $office=DB::table('designations')->select('name')->distinct()->orderBy('name')->get();
                    @endphp
                   <select name="officename" class="form-control select2">
                        <option value="{{ $allinformation->designat }}">Please Choose</option>
                        @foreach ($office as $designation)
                       
                        <option value="{{ $designation->name }}">{{$designation->name}}</option>
                            
                        @endforeach
                        

                    </select>
                </div>
                
                
                 <div class="col-md-3 py-1">
                    <label>SRINDEX<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8 py-1">
                    {{-- <input type="hidden" name="category_id" value="{{ $allinformation->officename }}"> --}}
                    <input type = "text" class="form-control" name="SRINDEX" value = "{{ $allinformation->SRINDEX }}" >
                    {{-- @if($errors -> any('name') && !old('name'))
                      <strong class = "text-danger f-100">Account name required</strong>
                    @endif --}}
                </div>


                <div class="col-md-3 py-4">
                    <label>Email<span class = "text-danger">*</span></label>
                </div>

                <div class="col-md-8 py-4">
                    {{-- <input type="hidden" name="category_id" value="{{ $allinformation->officename }}"> --}}
                    <input type = "text" class="form-control" name="email" value = "{{ $allinformation->email }}" >
                    {{-- @if($errors -> any('name') && !old('name'))
                      <strong class = "text-danger f-100">Account name required</strong>
                    @endif --}}
                </div>



                <div class="col-md-3">
                    <label>Mobile<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    {{-- <input type="hidden" name="category_id" value="{{ $allinformation->officename }}"> --}}
                    <input type = "text" class="form-control" name="mobile" value = "{{ $allinformation->mobile }}" >
                    {{-- @if($errors -> any('name') && !old('name'))
                      <strong class = "text-danger f-100">Account name required</strong>
                    @endif --}}
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
           
        </form>
        @endif
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
