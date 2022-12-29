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


.carousel-inner>.item>img, .carousel-inner>.item>a>img {
        display: block;
        height: auto;
        max-width: 100%;
        line-height: 1;
        margin:auto;
        width: 100%; // Add this
        }

</style>
<div class="row justify-content-center py-4">


  <div class="col-md-4">

    <div class="card" id="front-image">
      <div class="card-header" style="height:20%;width:100%">
        <p style="text-align: center;color:#66B2FF"><strong>Name:&nbsp;{{ $projectall->name }}</strong></p>

      </div>
      <img class="zoom" src = "{{ URL :: to($projectall -> image) }}" style="width:100%; height:245px;">



    </div>





  </div>

  <div class="col-md-6 ">
     <div class="row justify-content-end">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <p class="text-center" style="color: #66B2FF;"> <strong>Company Details</strong></p>

          </div>
        {{-- <p class="text-center"> --}}
           @php
              $company=App\Models\Compane::where('employe_id',$projectall->employeeid)->first();
           @endphp

            @php
            $contact=App\Models\Employee::where('id',$company->employe_id)->first();
            @endphp


                <p class="text-center">
                    <img class="p-2" src = "{{ URL :: to($company -> logo) }}" id="logo" alt="Avatar">

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


{{--
                  <div class="row justify-content-center header">
                     <img class="p-2" src = "{{ URL :: to($company -> logo) }}" id="logo">
                      <h5 style="text-align: center;color:#1dbf73;"><strong>{{ $company->name }}</strong></h5>

                      <p class="py-4" style="text-align: center;">
                        <strong style="color:darkgray;">{{ $projectall->description }}

                        </strong>

                      </p>
                  </div> --}}
        {{-- </p> --}}

        </div>

      </div>


     </div>


  </div>


  <div class="col-md-4 py-5">



      <div class="card">
         <div class="card-header" style="height:width:20%">
            <p style="text-align: center;color:#66B2FF;"><strong> Apt Details</strong></p>
         </div>

         <p>



           <table class="table">
               <tbody>

                <tr>
                  <th>Layout Plane</th>
                  <td><img class="zoom2" src = "{{ URL :: to($projectall -> image2) }}" style="width:100px;height:100px;display:inline-block;" ></td>
                  <th></th>
                  <td></td>
                </tr>

                <tr>
                  <th>Flat&nbsp;Size:</th>
                  <td>{{ $projectall->size }}</td>

                  <th>Building:</th>
                    <td>{{ $projectall->numbuilding }}</td>


                </tr>



                  <tr>
                    <th>Height:</th>
                    <td>{{ $projectall->height }}</td>

                    <th>Flat:</th>
                    <td>{{ $projectall->numberflat }}</td>

                  </tr>



                  <tr>
                    <th>Car Park:</th>
                    <td>{{ $projectall->numparking }}</td>

                    <th>Lift:</th>
                    <td>{{ $projectall->lift }}</td>


                  </tr>



                  <tr>
                    <th>SubStation:</th>
                    <td>{{ $projectall->substation }}</td>

                    <th>Generator:</th>
                    <td>{{ $projectall->generator }}</td>

                  </tr>



                  <tr>
                    <th>F.Escap:</th>
                    <td>{{ $projectall->fEscape }}</td>

                    <th>STAIR:</th>
                    <td>{{ $projectall->stair }}</td>


                  </tr>



                  <tr>
                    <th>Community Hall:</th>
                    <td>{{ $projectall->communityhall }}</td>

                    <th>Prayer Hall:</th>
                    <td>{{ $projectall->prayerhall }}</td>
                  </tr>

                  <tr>

                    <th>Gym:</th>
                    <td>{{ $projectall->gym }}</td>
                    <th></th>
                    <td></td>

                  </tr>





               </tbody>

           </table>

         </p>

      </div>



  </div>




  <div class="col-md-6 py-5">
    <div class="row justify-content-end">
     <div class="col-md-9">
       <div class="card">
         <div class="card-header">
           <p class="text-center" style="color: #66B2FF;"><strong>Location Map</strong></p>

         </div>
         <p class="text-center">
             @php
               Mapper::map($projectall->lat, $projectall->lng);
             @endphp

             <div style="width:100%; height:300px;" class="zoom">
	                {!! Mapper::render() !!}
             </div>

         </p>

       </div>

     </div>


    </div>


 </div>



  <div class="col-md-4">



     <div class="card">
      <div class="card-header">

        <p style="font-size: 17px;color: #66B2FF;;text-align:center;">
          <strong>Contact Us</strong>

          <hr>


        </p>

        @php

                $employeeimage=App\Models\Employee::where('id',$projectall->employeeid)->first();


        @endphp
        <p style="font-size: 17px;color:lightseagreen;text-align:center;">
          <strong >Property Owner Details</strong>




        </p>

        <p class="text-center">
            <img src="{{ URL :: to($employeeimage -> employee_photo) }}" alt="" width="15%" height="50%">

        </p>

        <p>

            <h5 class="text-center">{{$employeeimage->name}}</h5>
        </p>

      </div>


      <p style="font-size: 17px;color:black;text-align:center; width:bold;">
        <b>{{ $projectall->size }}&nbsp;sqft&nbspIn {{ $projectall->locationName }}</b>



      </p>
      <p style="font-size: 17px;color:black;text-align:center; width:bold;">
        @php
          $email=App\Models\User::where('id',$projectall->employeeid)->first();

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
              <input type="hidden" name="size" value="{{ $projectall->size }}">
              <input type="hidden" name="id" value="{{ $projectall->id }}">

            </div>

            <div class="button-wrapper py-3" style="text-align: center;">
              <button class="btn btn-primary" name="enquire_form" ><span style="color: #00FFFF;text-align: center;">Contact Save</span></button>

            </div>

          </form>
          </p>

        </div>



      </div>





  </div>



  <div class="col-md-6 py-2">
    <div class="row justify-content-end">
     <div class="col-md-9">
       {{-- <div class="card">
         <div class="card-header">
           <p class="text-center" style="color: #66B2FF;"><strong> Other Project</strong></p>

         </div>

          @php
              $allproperty=App\Models\Project::get();
          @endphp

          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($allproperty as $propertyall)
              <div class="carousel-item active">
                <a href="{{ url('propertySearch',$propertyall->id) }}">
                    <img src = "{{ URL :: to($propertyall -> image) }}" style="width:100%; height:245px;">
                </a>
              </div>
              @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>




       </div> --}}

     </div>


    </div>


 </div>




</div>







          </div>
      </div>
  </div>
</div>




@php

$allapt=App\Models\Project::get();
@endphp


<h5 class="text-center text-secondary">SIMILAR APARTMENT</h5>

<div class="card">





    <div class="card-body shadow p-8">
       <div class="owl-carousel owl-theme">



           @foreach ($allapt as $aptall)
           <div class="item">

                   <a href="{{URL('propertySearch',$aptall->id)}}">
                       <img src="{{ URL :: to($aptall -> image) }}" alt="">
                    </a>



                    <div class="row">
                       <div class="col-md-5 py-2">
                           <h5 class="text-secondary ">{{$aptall->size}} spft Apartment</h5>

                           <table class="table">

                               <tbody>

                                   <tr>
                                       <p>{{$aptall->description}}</p>
                                   </tr>
                                   <tr>
                                       <th>Price</th>
                                       <td>:</td>

                                       <td>
                                           {{$aptall->price}} &nbsp;<span style="font-family: fantasy;">&#2547;</span>
                                       </td>

                                   </tr>


                                   <tr>
                                       <th>Apartment&nbsp;Size</th>
                                       <td>:</td>
                                       <td>{{$aptall->size}}</td>
                                   </tr>

                                   <tr>
                                    <th>Type:</th>
                                    <td>:</td>
                                    <td>{{ucwords($aptall->type)}}</td>
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
