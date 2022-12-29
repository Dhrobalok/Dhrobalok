@extends('backend.admin.index')
@section('content')
<style>
    * {
  box-sizing: border-box;
}

.zoom {
  padding: 50px;
  /* background-color: green; */
  transition: transform .2s;
  width: 150px;
  height: 150px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(4.5); /* IE 9 */
  -webkit-transform: scale(4.5); /* Safari 3-8 */
  transform: scale(4.5);
}
</style>

<div class="row justify-content-center">

       <div class="col-md-8">

        <div class="card shadow">

            <div class="card-header text-right">

                 <a href="{{url('Advertise')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;Back</a>

            </div>


            <div class="card-body">
                  <form action="{{url('UploadVedio')}}" method="POST" enctype="multipart/form-data">
                       @csrf


                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <label for="">Company&nbsp;Name</label>


                            </div>




                        </div>



                        <div class="row justify-content-center form-group ">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Company Name">

                            </div>



                        </div>


                     <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">Video&nbsp;File</label>


                        </div>


                    </div>

                    <div class="row justify-content-center form-group">



                        <div class="col-md-6">
                            <input type="file" name="vedio" class="form-control">

                            @if ($errors->has('vedio'))
                            <span class="text-danger mt-2">{{ $errors->first('vedio') }}</span>
                           @endif

                        </div>

                    </div>


                    <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">Or

                            </label>


                        </div>


                    </div>



                    <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">Video&nbsp;Link</label>


                        </div>


                    </div>

                    <div class="row justify-content-center form-group">



                        <div class="col-md-6">
                            <input type="text" name="link" class="form-control" placeholder="Enter video Link">

                        </div>

                    </div>


                    <div class="row justify-content-center">

                        <div class="col-md-6">
                            <label for="">Video&nbsp;Duration</label>


                        </div>




                    </div>



                    <div class="row justify-content-center form-group ">

                        <div class="col-md-6">
                            <input type="text" name="duration" class="form-control" placeholder="Vedio Duration">

                        </div>



                    </div>


                    <div class="row justify-content-center">

                        <div class="col-md-6">
                            <label for="">Duration&nbsp;Unit</label>


                        </div>




                    </div>



                    <div class="row justify-content-center form-group ">

                        <div class="col-md-6">


                           <Select name="unit" class="form-control" >
                              <option value="">Choose Unit</option>


                              <option value="2">Second</option>

                           </Select>

                        </div>



                    </div>

                    <div class="row justify-content-center p-4">


                            <button class="btn btn-success">Submit</button>



                    </div>


                  </form>



            </div>
            </div>

       </div>

</div>

@endsection
