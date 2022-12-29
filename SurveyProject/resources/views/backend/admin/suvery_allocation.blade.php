@extends('backend.Dashboard.Master')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-7">
    <div class="card mt-5">
       <div class="card-header">
          <p class="text-center p-0 m-0" style="color: blueviolet;">Survey Allocation</p>

       </div>

       @php
           $item=App\Models\Item::get();
       @endphp

       <div class="card-body">
          <form action="{{ url('Allocate.Survey') }}" method="post" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
                <label for="file">Survey Item</label>
                 <input type="hidden" name="id" value="{{$id}}">


                 <select name="itemid" id="" class="form-control">

                    <option value="">Choose Item</option>
                    @foreach ($item as $items)
                    <option value="{{$items->id}}">{{$items->name}}</option>

                    @endforeach
                 </select>
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


