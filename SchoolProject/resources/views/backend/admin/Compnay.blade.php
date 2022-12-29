@extends('backend.Dashboard.AdminDashUser')

@section('css')
<style>
    #myTable th
    {
        color:rgb(250, 235, 235);
    font-size:15px;
    line-height: 10px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;
    background-color: rgb(129, 152, 212)
    }

/* .table-responsive
{
    overflow-x: hidden !important;
} */

#myTable_filter
{
    float: right !important;
}

#list
{
    width: 340px !important;
}
</style>
@endsection

 @section('content')

   <div class="col-md-11">

    <form action="{{route('company.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mt-4 p-4" style="background-color: rgb(255, 255, 255);">

            <div class="card-header">
                <h4>Company Setting</h4>


                <a href="{{route('Company.setting')}}" class="btn btn-sm btn-primary" style="float: right;">
                   <i class="fas fa-arrow-alt-circle-left"></i>
                    Back
                </a>




            </div>

            <div class="card-body">

                <div class="row justify-content-start">

                    <div class="col-md-6">
                        <label for="">Company Name</label>

                    </div>



                </div>


                <div class="row form-group justify-content-start">

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" placeholder="Company Name">

                    </div>



                </div>


                <div class="row justify-content-start">

                    <div class="col-md-6">
                        <label for="">Company Logo</label>

                    </div>

                </div>


                <div class="row form-group justify-content-start">

                    <div class="col-md-12">
                        <input type="file" class="form-control" name="image" placeholder="Company Logo">

                    </div>

                </div>


                <div class="row justify-content-start">

                    <div class="col-md-6">
                        <label for="">Company Email</label>

                    </div>

                </div>


                <div class="row form-group justify-content-start">

                    <div class="col-md-12">
                        <input type="email" class="form-control" name="email" placeholder="Company Email">

                    </div>

                </div>


                <div class="row justify-content-start">

                    <div class="col-md-6">
                        <label for="">Company Mobile</label>

                    </div>

                </div>


                <div class="row form-group justify-content-start">

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="mobile" placeholder="Company Mobile">

                    </div>

                </div>





                <div class="row justify-content-start">

                    <div class="col-md-6">
                        <label for="">Company Address</label>

                    </div>



                </div>


                <div class="row form-group justify-content-start">

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="address" placeholder="Company Address">

                    </div>



                </div>



                <div class="row justify-content-start">

                    <div class="col-md-6">
                        <label for="">Company Location</label>

                    </div>



                </div>


                <div class="row form-group justify-content-start">

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="location" placeholder="Location Link">

                    </div>



                </div>












            </div>


            <div class="row justify-content-center">

                <button class="btn btn-primary">Submit</button>

            </div>


        </div>

      </form>
   </div>
 @endsection
