@extends('backend.Dashboard.Master')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-7">
    <div class="card mt-5">
       <div class="card-header">
          <p class="text-center p-0 m-0" style="color: blueviolet;">Edit Survey </p>

       </div>

       @if(session()->has('msg'))
       <div class="alert alert-success">
          {{ session()->get('msg') }}
      </div>
  @endif

       @php
           $item=App\Models\Item::get();
       @endphp

       <div class="card-body">
          <form action="{{ url('Update.Survey') }}" method="post">
             @csrf
             <div class="form-group">
                <label for="file">From Student</label>
                 <input type="hidden" name="id" value="{{$id}}">
                 @php
                     $name=App\Models\User::where('studentId',$id)->first();
                 @endphp
                 <input type="text" class="form-control" value="{{$name->firstname}} {{$name->lastname}}" readonly>

             </div>

             <div class="form-group">
                <label for="file">To Student</label>

                 @php
                     $Allname=App\Models\User::where('status',1)
                     ->get();
                 @endphp

                 <select name="tostdent"  class="form-control">
                    <option value="">Choose Student</option>
                    @foreach ($Allname as $nameall)
                     <option value="{{$nameall->studentId}}">{{$nameall->firstname}} {{$nameall->lastname}}</option>

                    @endforeach



                 </select>

             </div>


             <div class="form-group">
                <label for="file">Select Item</label>

                 @php
                     $allitem=App\Models\Item::get();
                 @endphp

                 <select name="item" id="" class="form-control">
                     <option value="">Choose Item</option>
                      @foreach ($allitem as $itemall)
                        <option value="{{$itemall->id}}">{{$itemall->name}}</option>
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


