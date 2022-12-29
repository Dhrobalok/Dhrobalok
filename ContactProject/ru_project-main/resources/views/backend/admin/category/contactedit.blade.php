@extends('backend.admin.index')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="text-center p-0 m-0" style="color: blueviolet;">Update Information</h4>

    </div>
  {{-- <form action="{{ url('update.contactprofile',$information->salaryID) }}" method="POST">
    @csrf --}}
    <div class="row form-group justify-content-center py-2">
        <div class="col-md-3">
            <label>Designation<span class = "text-danger">*</span></label>
        </div>
        <div class="col-md-8">
             <input type="hidden" name="salaryid" value="{{ $information->salaryID }}">
            <input type = "text" class="form-control"  name="Designation" value = "{{ $information->Designation }}" >
            {{-- @if($errors -> any('name') && !old('name'))
              <strong class = "text-danger f-100">Account name required</strong>
            @endif --}}
        </div>
    </div>

    <div class="row form-group justify-content-center  py-2">
        <div class="col-md-3">
            <label>Senirty Index<span class = "text-danger">*</span></label>
        </div>
        <div class="col-md-8">
             
            <input type = "text" class="form-control"  name="SRINDEX" value = "{{ $information->SRINDEX }}" >
           
        </div>
    </div>



    <div class="row form-group justify-content-center  py-2">
        <div class="col-md-3">
            <label>Contact<span class = "text-danger">*</span></label>
        </div>
        <div class="col-md-8">
             
            <input type = "text" class="form-control"  name="office_address" value = "{{ $information->office_address }}" >
           
        </div>
    </div>


    <div class="row justify-content-center p-4">
        <button class="btn btn-primary">Submit</button>

    </div>
{{-- </form> --}}
</div>
@endsection


<script type="text/javascript">
    $(document).ready(function(){
       
      $.ajaxSetup({
        headers:{
          'X-CSRF-Token' : $("input[name=_token]").val()
        }
      });
    
      $('#editable').Tabledit({
        url:'{{ route("update.contactprofile") }}',
        dataType:"json",
        columns:{
          identifier:[0, 'id'],
          editable:[[1, 'first_name'], [2, 'last_name'], [3, 'gender', '{"1":"Male", "2":"Female"}']]
        },
        restoreButton:false,
        onSuccess:function(data, textStatus, jqXHR)
        {
          if(data.action == 'delete')
          {
            $('#'+data.id).remove();
          }
        }
      });
    
    });  
    </script>
    