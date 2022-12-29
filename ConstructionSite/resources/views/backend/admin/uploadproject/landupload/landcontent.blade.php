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
 transition: transform .1s;
 width: 320px;
 height: 90px;
 margin: 0 auto;
}

.zoom2:hover {
 -ms-transform: scale(1.5); /* IE 9 */
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
            <p class="p-0 m-0 p-2 " style="text-align: center;font-size:15px;color:darkmagenta;"><strong  style="display: inline-block;">Land Details</strong> </p>

         </div>

         <div class=" card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Land&nbsp;Image:</th>
                        <td><img class="zoom2" src = "{{ URL :: to($landall -> landpic) }}" style="width: 100%;"></td>
                         <th></th>
                         <td></td>
                         <th></th>
                         <td></td>
                         <th></th>


                    </tr>

                    <tr>
                        <th>Land&nbsp;Area</th>
                        <td>{{ $landall->area }}</td>
                        <th>Land&nbsp;Size:</th>
                        <td>{{ $landall->size }}</td>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                    <tr>
                        <th>Land&nbsp;Price:</th>
                        <td>{{ $landall->price }}</td>

                        <th><img src="{{ asset('images/5784811.png') }}" alt="" width="20px;" height="80%" style="display:inline-block;"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
                $company=App\Models\Compane::where('employe_id',$landall->employeeid)->first();
               @endphp

                <div class="row justify-content-center">

                    <img class="p-2" src = "{{ URL :: to($company -> logo) }}" id="logo" alt="Avatar">
                      <h5 style="text-align: center;color:#1dbf73;"><strong>{{ $company->name }}</strong></h5>

                    <p class="py-2" style="text-align: center;">
                        <strong style="color:darkgray;">{{ $landall->description }}

                        </strong>

                    </p>
               </div>

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
                Mapper::map($landall->lat, $landall->lng);
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

                      $employeeimage=App\Models\Employee::where('id',$landall->employeeid)->first();


                     @endphp


                      <p class="text-center">
                        <img src="{{ URL :: to($employeeimage -> employee_photo) }}" alt="" width="15%" height="50%">

                      </p>

                    <p>

                        <h5 class="text-center">{{$employeeimage->name}}</h5>
                    </p>



                    </div>


                    <p style="font-size: 17px;color:black;text-align:center; width:bold;">
                      <b>{{ $landall->size }}&nbsp;sq.km&nbsp;In {{ $landall->address }}</b>



                    </p>
                    <p style="font-size: 17px;color:black;text-align:center; width:bold;">
                      @php
                        $email=App\Models\User::where('id',$landall->employeeid)->first();

                      @endphp
                      @if ($email)
                          @php
                             $mobile=App\Models\Employee::where('email',$email->email)->first();
                          @endphp
                        <i class="fa fa-phone" style="font-size:20px;color:#CCCCFF;"><strong style="color: black;font">&nbsp;{{ $mobile->mobile_no }}</strong></i>
                      @endif




                    </p>


                      <div class="card-header" style="height:width:25%">
                        <p style="font-size: 20px;color:lightseagreen;text-align:center;">
                          <strong> Enquire Now</strong>

                        </p>


                        <form action="{{ url('savecontact') }}" method="POST">
                          @csrf
                          <div class="form-group py-2">
                            <input type="text" class="form-control" name="name" placeholder="Name" >

                          </div>

                          <div class="form-group py-2">
                            <input type="email" class="form-control" name="email" placeholder="Email" >

                          </div>

                          <div class="form-group py-3">
                            <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                            <input type="hidden" name="size" value="{{ $landall->size }}">
                            <input type="hidden" name="id" value="{{ $landall->id }}">

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



  @php

  $allland=App\Models\Land::get();
 @endphp


 <h5 class="text-center text-secondary">SIMILAR LAND</h5>

  <div class="card">





      <div class="card-body shadow p-8">
         <div class="owl-carousel owl-theme">



             @foreach ($allland as $landall)
             <div class="item">

                     <a href="{{URL('land/view',$landall->id)}}">
                         <img src="{{ URL :: to($landall->landpic) }}" alt="">
                      </a>



                      <div class="row">
                         <div class="col-md-5 py-2">
                             <h5 class="text-secondary ">{{$landall->size}} sq.km Land</h5>

                             <table class="table">

                                 <tbody>

                                     <tr>
                                         <p>{{$landall->description}}</p>
                                     </tr>
                                     <tr>
                                         <th>Price</th>
                                         <td>:</td>

                                         <td>
                                             {{$landall->price}}&nbsp;<span style="font-family: fantasy;">&#2547;</span>
                                         </td>


                                     </tr>


                                     <tr>
                                         <th>Land&nbsp;Size</th>
                                         <td>:</td>
                                         <td>{{$landall->size}}</td>
                                     </tr>
                                 </tbody>

                             </table>


                         </div>

                      </div>





             </div>





             @endforeach

         </div>


      </div>






  </div>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script>
     $('.owl-carousel').owlCarousel({
     center: true,
     items:2,
     loop:true,
     margin:10,
     nav:true,
     responsive:{
         0:{
             items:1
         },
         600:{
             items:3
         },
         1000:{
             items:3
         }
     }
 });

 $('.nonloop').owlCarousel({
     center: true,
     items:2,
     loop:false,
     margin:10,
     responsive:{
         600:{
             items:4
         }
     }
 });
 </script>






@include('backend.admin.userdashboard.footer')

@endsection
