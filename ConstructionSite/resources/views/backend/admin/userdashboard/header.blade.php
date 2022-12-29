<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="htmlcss bootstrap menu, fixed, after scrolling page, navbar, menu CSS examples" />
<meta name="description" content="Bootstrap 5 fixed navbar on scroll page examples, Bootstrap 5" />

<title>CONSTRUCTION SITE</title>
<link rel="stylesheet" href="fonts.googleapis.com/css?family=Montserrat:400,700">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">



<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts,_icomoon,_style.css+css,_owl.carousel.min.css+css,_bootstrap.min.css+css,_style.css.pagespeed.cc.BVwOJsCDCo.css" />
<script src='https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.8.2/countUp.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>



<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzone/dist/min/dropzone.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">



<!-- owl crual slider -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- owl slider  -->




<style>
          .vertical {
            border-left: 6px;
            color: cornsilk;
            height: 120px;
            position:absolute;
            left: 50%;
        }
		#navbar_top
		{
			background-color: #365A7D;


		}
		#head
		{
			background-color: #125d9b;

		}
		#nvabr
		{
			margin-left: 120px;

		}




		body
		{
			width: 100%;
		}

.navbar-nav .nav-link {
	padding-left: .1rem;
}
.navbar-nav a {
	color: #3b3636 !important;
	transition: all ease 0.5s;
}
.navbar-nav a:hover,
.navbar-nav a:focus,
.navbar-nav a:active,
.navbar-nav a.hilite {
	color: #BFBFBF !important;
	background: #e57373 !important;
	border-bottom: 1px #7F7F7F solid !important;
}
/* ===== == = === 48em (768px) === = == ===== */
@media only screen and (min-width : 48em) {
	.navbar-nav a:hover,
	.navbar-nav a:focus,
	.navbar-nav a:active,
	.navbar-nav a.hilite {
		transform: translateY(0.5rem) scaleY(1.2);
	}
	.navbar-nav .nav-link {
		padding-left: 0;
	}
}

@media only screen and (min-width : 48em) {
	#hardware:hover,
	#hardware:focus,
	#hardware:active,
	#hardware.hilite {
		transform: translateY(0.5rem) scaleY(1.2);
	}
	#hardware {
		padding-left: 0;
	}
}

#hardware
{
	color: #E5E5E5 !important;
	transition: all ease 0.5s;

}

#hardware :hover,
#hardware :focus,
#hardware :active,
#hardware .hilite {
	color: #BFBFBF !important;
	background: #e57373 !important;
	border-bottom: 1px #7F7F7F solid !important;
}

#card1
{
	background-color:rgba(255,255,255, 0.8);
}
#card2
{
	background-color:rgba(255,255,255, 0.8);

}

.logo
{
	width: 60%;
	height:60%;
	text-align:center;
}
/* hr
 {

  border-radius: 5px;

  height:213px;
  background-color:rgba(255, 255, 255, 0.068);
} */


.customScrollBar
        {
            position: absolute;
            top: 0px;
            left: 0px;
            bottom: 0px;
            right: 0px;
            padding: 0px;
            overflow-y: scroll;
            overflow-x: hidden;
			width: 50%;
			height:400px;
        }

        a
{
    text-decoration: none !important;
}

body
{
    overflow-x: hidden;
}

video
{
	width: 100% !important;
	object-fit: cover !important;
}

</style>


</head>
<body>
  <div id="head">
  <div class="container">
	{{-- <div class="row justify-content-start">
       <a class="navbar-brand" href="#">Brand</a>
	</div> --}}

	  <div class="row justify-content-start" id="banar">

      <div class="col-md-5">
        <img src="{{asset('images/Bannar.png')}}" width="100%" height="160">

      </div>

      <div class="col-md-2 py-4">

        {{-- <hr style="width:3px;height:77px;color:white;"/> --}}
      </div>

      @php

         $allvedio=App\Models\Vedio::select('vedio')->pluck('vedio');
         $allDuration=App\Models\Vedio::select('duration')->pluck('duration');
      @endphp

      <div class="col-md-5">
        {{-- <video controls autoplay src="{{asset('/')}}" id="myVideo" class="example" muted="muted"  width="100%" height="160"></video> --}}
       <video autoplay  id="myVideo" class="example" muted="muted"  width="100%" height="160"></video>

      </div>

    </div>
	</div>
</div>



<!-- ============= COMPONENT ============== -->

<nav id="navbar_top" class="navbar navbar-expand-lg navbar-light" style="width: 100%;" >
    <div class="container-fluid">
		<a href="#" class="navbar-brand">
            <img src="{{ asset('images/bdproperty.png') }}" height="40" style="border-radius: 11px;" alt="CoolBrand"><sub style="font-size:22px;color:blanchedalmond;font-weight:bold;"></sub>

        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse p-3" id="navbarCollapse">

            <div class="navbar-nav" id="nvabr">

				<div class="column">
					<div class="row  mx-auto">
					   <a href="{{ url('/') }}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Home</span></button></a>

					</div>

					<div class="row  mx-auto">
						 <a href="{{ url('/') }}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Apt</span></button></a>

					</div>

				 </div>

				 <div class="column">
				   <div class="row mx-auto">
					   <a href="{{ url('/') }}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Land</span></button></a>

				   </div>

				   <div class="row  mx-auto">
					   <a href="{{ url('/') }}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Plot</span></button></a>

				   </div>

				</div>

				<div class="column">
				   <div class="row mx-auto">
					   <a href="{{ url('brickDashboard') }}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Brick</span></button></a>

				   </div>

				   <div class="row mx-auto">
					   <a href="{{ route('cementDashboard') }}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Cement</span></button></a>

				   </div>

				</div>

				<div class="column">
				   <div class="row mx-auto">
					   <a href="{{ url('steel.search') }}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Steel</span></button></a>

				   </div>

				   <div class="row mx-auto">
					   <a href="{{ url('Tiles.search') }}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Tiles</span></button></a>

				   </div>

				</div>

				<div class="column">
				   <div class="row mx-auto">
					   <a href="{{ route('Door.search') }}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Door</span></button></a>

				   </div>

				   <div class="row mx-auto">
					<a href="{{ route('Sanetary.search') }}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Sanitary</span></button></a>

				   </div>

				</div>


				<div class="column">
				   <div class="row mx-auto">
					   <a href="{{route('Feeting.search')}}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Feetings</span></button></a>


				   </div>

				   <div class="row mx-auto">
					   <a href="{{route('sand.search')}}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Sand</span></button></a>

				   </div>

				</div>


			   <div class="column">
				   <div class="row mx-auto">
                    <a href="{{url('architect.create')}}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Architect</span></button></a>


				   </div>

				   <div class="row">
                    <a href="{{url('interior.search')}}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Interior</span></button></a>

				   </div>



				</div>

				<div class="column">
				   <div class="row mx-auto">
					   <a href="{{url('paint.search')}}" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Paint</span></button></a>


				   </div>

				   <div class="row">


                    @php
                           $productitem=App\Models\Electric::select('iteam')->distinct()->get();
                    @endphp

                   <ul  class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link text-center p-2" href="#" data-bs-toggle="dropdown"><button class="btn btn-alt primary"><span style="color: white">Electric</span></button></a>
                         <ul class="dropdown-menu">

                            @foreach ($productitem as $productall)
                            <li>
                                <a class="dropdown-item" href="{{url('see.electric',$productall->iteam)}}" style="color: #1a1d1f;">

                                    <span  style="color: #1a1d1f;">{{$productall->iteam}}</span>
                                </a>

                            </li>

                            @endforeach


                         </ul>
                     </li>

                   </ul>

                </div>



				</div>









		   </div>

			<div class="column">




				{{-- <nav  class="navbar navbar-expand-lg navbar-dark" style="margin-bottom: -50px;"> --}}
					<div class="row mx-auto">


                        <ul  class="navbar-nav">

                            <li class="nav-item dropdown">
					   <a href="#" class="nav-item nav-link text-center bg-blue-dark" data-bs-toggle="dropdown" id="hardware"> <button class="btn btn-alt-primary"><span style="color: white;">Hardware</span></button> </a>

                       @php
                       $productitem=App\Models\Hardwar::select('productitem')->distinct()->get();
                      @endphp

					   <ul class="dropdown-menu">
                        <table class="table">

                            <tbody>
                                @foreach ($productitem as $productall)

                                <tr>
                                    <td>



                                        <li style="font-size:14px;color:#125d9b;">
                                            <a class="dropdown-item" href="{{url('about.hardware',$productall->productitem)}}">  {{$productall->productitem}}</a>
                                        </li>






                                    </td>

                                </tr>

                                @endforeach




                            </tbody>

                        </table>
					   </ul>
                    </li>
                 </ul>

			        </div>
					<div class="row ">

                        <ul  class="navbar-nav">

                            <li class="nav-item dropdown">
					   <a href="#" class="nav-item nav-link text-center" data-bs-toggle="dropdown" id="hardware"> <button class="btn btn-alt primary"><span style="color: white;margin-top:80px;">Company</span></button> </a>
					   {{-- <ul class="dropdown-menu customScrollBar" style="width: 50%;">
						   @php
							   $company=App\Models\Compane::orderBy('id','desc')->get();
						   @endphp
						    <p style="text-align: center;"> Company Logo</p>

						   <table class="table">
							  <thead>
								 <th>Company Logo</th>
							  </thead>
							   <tbody>
								   @foreach ($company as $companys )
								   <tr>
									<td>



                                        <li class="text-center"><a class="dropdown-item" href="{{route('about.company',$companys->id)}}"><img class="logo"  src = "{{ URL :: to($companys -> logo) }}" ></a></li>




								   </td>





								   </tr>
								   @endforeach

							   </tbody>


						   </table>

					  </ul> --}}
                    </li>
                 </ul>

					</div>

				   {{-- </nav> --}}

			   </div>



			</div>







    </div>


</nav>



<!--  Nav bar component  -->

<div class="container">

        @yield('content')


</div>




@stack('js')
{{-- <script src="{{asset('/js/increament.js')}}"></script> --}}

<script>

  $( document ).ready(function()
      {

        var video=@json($allvedio);
        const videoDuration=@json($allDuration);


        var vedioId=document.getElementById("myVideo");
        var v='{{asset('/')}}';


        var i=0;
        var total=video.length;



            function show(name)
            {

                 var source=v+''+video[name];
                 vedioId.src=source;
                //document.getElementById("myVideo").setAttribute("src", source);
                setInterval(loop, videoDuration[name]*1000);

                        // document.getElementById("myVideo").setAttribute("src", video[i]);
                        // document.getElementById("myVideo").load();
                        // document.getElementById("myVideo").play();
                        // setTimeout(10000);


            }


            function loop()
            {

                if(i!=total)
                {
                  console.log(show(i))
                  i++;

                }





            }





            console.log(loop())




     });






    </script>
</body>
</html>



