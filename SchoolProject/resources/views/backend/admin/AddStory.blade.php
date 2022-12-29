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

 <div class="col-md-6 pt-4">

    <div class="card shadow p-4">


            <div align="right" >

                <a class="btn btn-primary btn-sm" id = "decline_btn"
                href="{{route('SuccessStory')}}"><i class="fas fa-arrow-circle-left"></i>
                Back</a>

            </div>


            <form action="{{route('story.save')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <label for="">Name*</label>

                    </div>

                </div>

                <div class="row form-group justify-content-center">

                      <div class="col-md-6">
                           <input type="text" class="form-control" name="name" placeholder="Enter Name">

                      </div>

                </div>


                <div class="row justify-content-center">
                  <div class="col-md-6">
                      <label for="">Image*</label>

                  </div>

              </div>

              <div class="row form-group justify-content-center">

                    <div class="col-md-6">
                         <input type="file" class="form-control" name="image">

                    </div>

              </div>


              <div class="row justify-content-center">
                  <div class="col-md-6">
                      <label for="">Description*</label>

                  </div>

              </div>

              <div class="row form-group justify-content-center">

                    <div class="col-md-6">
                         <textarea name="description" cols="28" rows="3" class="form-control" placeholder="please enter description">

                             {{-- Please&nbsp;Enter&nbsp;Success&nbsp;Story --}}
                         </textarea>

                    </div>

              </div>








        <div class="row justify-content-center">
            <button class="btn btn-primary">Submit</button>

        </div>

    </form>
    </div>
</div>

 @endsection
