@extends('backend.admin.index')
@section('content')
<div class="row justify-content-center">
   <div class="col-md-7">
   <div class="card">
      <div class="card-header">
         <p class="text-center p-0 m-0" style="color: blueviolet;">CSV UPLOAD</p>

      </div>

      <div class="card-body">
         <form action="{{ url('csv.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <label for="file">Choose CSV</label>
               <input type="file" class="form-control" name="csv">
            </div>
                
            <button type="submit"  class="btn btn-primary">Submit</button>     
 
            
            
        </form>
      </div>
      </div>
       
      </div>
</div>
@endsection
