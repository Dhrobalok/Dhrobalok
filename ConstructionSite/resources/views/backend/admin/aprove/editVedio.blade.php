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


            <div class="card-body">
                  <form action="{{url('UpdateVedio',$vedio->id)}}" method="POST" enctype="multipart/form-data">
                       @csrf


                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <label for="">Company&nbsp;Name</label>


                            </div>




                        </div>



                        <div class="row justify-content-center form-group ">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="{{$vedio->name}}">

                            </div>



                        </div>


                     <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">Vedio&nbsp;File</label>


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

                    <div class="row justify-content-center p-4">


                            <button class="btn btn-success">Submit</button>



                    </div>


                  </form>



            </div>
            </div>

       </div>

</div>

@endsection
