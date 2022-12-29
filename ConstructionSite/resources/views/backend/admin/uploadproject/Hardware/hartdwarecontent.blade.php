@extends('backend.admin.userdashboard.header')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
      * {
  box-sizing: border-box;
}

.zoom {

  /* background-color: green; */
  transition: transform .2s;
  width: 320px;
  height: 190px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5);

}

.header img {
  /* float: left; */
  text-align: center;
  width: 100px;
  height: 100px;
  /* background: #555; */
  border-radius: 15px;
}


.header h5 {
  position: relative;
  top: 18px;
  left: 10px;
}




.zoom2 {

 /* background-color: green; */
 transition: transform .2s;
 width: 320px;
 height: 250px;
 margin: 0 auto;
}

.zoom2:hover {
 -ms-transform: scale(4.5); /* IE 9 */
 -webkit-transform: scale(4.5); /* Safari 3-8 */
 transform: scale(4.5);

}

#front-image
{
  height: 100%;
}

#logo
{
  width: 150px;
  height: 120px;
  border-radius: 50%;


}

</style>





  <div class="row justify-content-center py-5">
    <div class="col-md-4">


      <div class="card">
         <div class="card-header shadow-sm" style="width: 100%;">
            <p class="p-0 m-0 p-2 " style="text-align: center;font-size:15px;color:darkmagenta;"><strong  style="display: inline-block;">{{ $contentHard->category }}&nbsp;Details</strong> </p>

         </div>

         <div class=" card-body">
            <table class="table">
                <tbody >

                    <tr>
                        <td>{{ $contentHard->category }}&nbsp;View</td>
                        <td>:</td>
                        <td> <img class="p-2 zoom" src = "{{ URL :: to($contentHard -> image) }}" id="logo" alt="Avatar" ></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>:</td>
                        <td>{{ $contentHard->category }}</td>


                    </tr>

                    <tr>
                        <td>ProductItem</td>
                        <td>:</td>
                        <td>{{ $contentHard->productitem }}</td>

                    </tr>

                    <tr>

                        <td>Price</td>
                        <td>:</td>
                        <td>{{ $contentHard->price }}&nbsp;<span style="font-family: fantasy;">&#2547;</span></td>


                    </tr>
                </tbody>

            </table>

         </div>


      </div>
    </div>


      <div class="col-md-6">
         <div class="row justify-content-end">
            <div class="col-md-9">


         <div class="card">
            <div class="card-header shadow-sm" style="width:100%;">
                <p class="p-0 m-0 p-2" style="text-align: center;font-size:15px; color:darkmagenta;"><strong style="display: inline-block;">Company Details</strong> </p>

            </div>

            <div class="card-body">
                @php
                $company=App\Models\Compane::where('employe_id',$contentHard->employee_id)->first();
               @endphp
                @php
                $contact=App\Models\Employee::where('id',$company->employe_id)->first();
              @endphp

              <p class="text-center">
                <img class="p-1" src = "{{ URL :: to($company -> logo) }}" id="logo" alt="Avatar">
              </p>

                 <table class="table table-borderless w-100">

                     <tbody >


                         <tr>

                              <td style="font-family: Franklin Gothic Medium">Address</td>
                              <td>:</td>
                             <td></td>
                              <td>{{$company->address}}</td>

                        </tr>


                        <tr>
                            <td style="font-family:Franklin Gothic Medium;">Mobile</td>
                              <td>:</td>
                             <td></td>
                              <td><span style="font-family: fantasy;font-size:20px;">&#9990;</span> &nbsp;{{ $contact->mobile_no}}</td>

                        </tr>

                        <tr>

                            <td style="font-family: Franklin Gothic Medium;">Email</td>
                              <td>:</td>
                              <td></td>
                              <td><span style="color:rgb(46, 32, 32);">&#9993;</span>&nbsp;{{ $contact->email}}</td>



                        </tr>


                     </tbody>

                 </table>

                {{-- <div class="row justify-content-center">

                    <img class="p-2" src = "{{ URL :: to($company -> logo) }}" id="logo" alt="Avatar">
                      <h5 style="text-align: center;color:#1dbf73;"><strong>{{ $company->name }}</strong></h5>

                    <p class="py-2" style="text-align: center;">
                        <strong style="color:darkgray;">{{ $company->description }}

                        </strong>

                    </p>
               </div> --}}

            </div>

         </div>
        </div>

    </div>
   </div>




  <div class="col-md-4 py-4">

    <div class="card">
      <div class="card-header shadow-sm"  style="width: 100%;">

         <p class="p-0 m-0 p-2" style="text-align: center;font-size:15px; color:darkmagenta;"><strong style="display: inline-block;">Location Map</strong> </p>
      </div>

      <div class="card-body">
          <p class="text-center">
             @php
                Mapper::map($contentHard->lat, $contentHard->lng);
             @endphp

              <div style="width:100%; height:300px;" class="zoom">
                    {!! Mapper::render() !!}
              </div>

           </p>

      </div>
     </div>
   </div>




      <div class="col-md-6 py-4">
         <div class="row justify-content-end">
               <div class="col-md-9">
                <div class="card">
                    <div class="card-header">

                      <p style="font-size: 17px;color: #66B2FF;;text-align:center;">
                        <strong>Contact Us</strong>

                        <hr>


                      </p>
                      <p style="font-size: 17px;color:lightseagreen;text-align:center;">
                        <strong >Property Owner Details</strong>




                      </p>

                      @php

                      $employeeimage=App\Models\Employee::where('id',$contentHard->employee_id)->first();


                     @endphp


                      <p class="text-center">
                        <img src="{{ URL :: to($employeeimage -> employee_photo) }}" alt="" width="15%" height="50%">

                      </p>

                    <p>

                        <h5 class="text-center">{{$employeeimage->name}}</h5>
                    </p>

                    <p class="text-center">
                        <i class="fa fa-phone" style="font-size:24px"></i>{{$employeeimage->mobile_no}}

                    </p>


                    </div>


                    <p style="font-size: 17px;color:black;text-align:center; width:bold;">
                      <b>Iteam&nbsp;{{ $contentHard->productitem }}&nbsp;In {{ $contentHard->address }}</b>



                    </p>
                    <p style="font-size: 17px;color:black;text-align:center; width:bold;">
                      @php
                        $email=App\Models\User::where('id',$contentHard->employee_id)->first();

                      @endphp
                      @if ($email)
                          @php
                             $mobile=App\Models\Employee::where('email',$email->email)->first();
                          @endphp
                        <i class="fa fa-phone" style="font-size:20px;color:#CCCCFF;"><strong style="color: black;font">{{ $mobile->mobile_no }}</strong></i>
                      @endif




                    </p>


                      <div class="card-header" style="height:width:25%">
                        <p style="font-size: 20px;color:lightseagreen;text-align:center;">
                          <strong> Enquire Now</strong>

                        </p>


                        <form action="{{ url('savecontact') }}" method="POST">
                          @csrf
                          <div class="form-group py-2">
                            <input type="text" class="form-control" name="name" placeholder="Name" required >

                          </div>

                          <div class="form-group py-2">
                            <input type="email" class="form-control" name="email" placeholder="Email" required >

                          </div>

                          <div class="form-group py-3">
                            <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
                            <input type="hidden" name="size" value="{{ $contentHard->productitem }}">
                            <input type="hidden" name="id" value="{{ $contentHard->employee_id }}">

                          </div>

                          <div class="button-wrapper py-3" style="text-align: center;">
                            <button class="btn btn-primary" name="enquire_form" ><span style="color: #00FFFF;text-align: center;">Contact Save</span></button>

                          </div>

                        </form>
                        </p>

                      </div>



                    </div>


               </div>

         </div>

      </div>

  </div>











@include('backend.admin.userdashboard.footer')

@endsection
