@extends('backend.Dashboard.Master')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-7">
    <div class="card">
       <div class="card-header">
          <p class="text-center p-0 m-0" style="color: blueviolet;">STUDENT UPLOAD</p>

       </div>

       <div class="card-body">
          <form action="{{ url('Student.upload') }}" method="post" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
                <label for="file">Upload Student</label>
                <input type="file" class="form-control" name="student" required>
             </div>

             <div class="row justify-content-center mt-4">
                <button class="btn btn-primary" style="width: 25%;"> Submit</button>

            </div>




         </form>
       </div>
       </div>

       </div>



{{-- <form action="{{url('Student.upload')}}" method="post" enctype="multipart/form-data">
    @csrf


    <div class="card  p-6">


            <div class="card-body">

                <div class="row justify-content-center p-2">

                    <div class="col-md-12">
                        <label style="color:rgb(56, 142, 142);">Upload Student</label><span class="text-danger"></span></label>
                    </div>



                </div>

                <div class="row form-group justify-content-center ">

                    <div class="col-md-6">

                        <input type="file" class="form-control" name="student" placeholder="Enter Teacher Name">



                   </div>


                </div>



            <div class="row justify-content-center mt-4">
                <button class="btn btn-primary" style="width: 25%;"> Submit</button>

            </div>



            </div>




    </div>



</form> --}}




@endsection


