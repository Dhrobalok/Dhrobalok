<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="htmlcss bootstrap menu, fixed, after scrolling page, navbar, menu CSS examples" />
<meta name="description" content="Bootstrap 5 fixed navbar on scroll page examples, Bootstrap 5" />

<title>CONSTRUCTION SITE</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts,_icomoon,_style.css+css,_owl.carousel.min.css+css,_bootstrap.min.css+css,_style.css.pagespeed.cc.BVwOJsCDCo.css" />


<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzone/dist/min/dropzone.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
{{-- @include('backend.header-footer-files.js_files')
@include('backend.header-footer-files.css_files') --}}

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
			margin-left: 110px;

		}

		/* #company
		{
			float:right;

		} */

		#head2
		{
			background-image: url('images/01.jpg');
			background-repeat: no-repeat;

            background-position: center;
			background-size: cover;
			height: 100%;




		}
		body
		{
			width: 100%;
		}

.navbar-nav .nav-link {
	padding-left: .1rem;
}
.navbar-nav a {
	color: #393636;
	transition: all ease 0.5s;
}
.navbar-nav a:hover,
.navbar-nav a:focus,
.navbar-nav a:active,
.navbar-nav a.hilite {
	color: #BFBFBF;
	background: #e57373;
	border-bottom: 1px #7F7F7F solid;
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
	color: #E5E5E5;
	transition: all ease 0.5s;

}

#hardware :hover,
#hardware :focus,
#hardware :active,
#hardware .hilite {
	color: #BFBFBF;
	background: #e57373;
	border-bottom: 1px #7F7F7F solid;
}

#card1
{
	background-color:rgba(255,255,255, 0.8);
}
#card2
{
	background-color:rgba(255,255,255, 0.8);

}

#card3
{
	background-color:rgba(255,255,255, 0.9);

}

.logo
{
	width: 60%;
	height:60%;
	text-align:center;
}

.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background:black;
}
/* hr
 {

  border-radius: 5px;

  height:213px;
  background-color:rgba(255, 255, 255, 0.068);
} */



.content {display:none;}
.preload {
    width:100px;
    height: 100px;
    position: fixed;
    top: 50%;
    left: 50%;
}

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

        #product-item
        {

            border:none;

        }

        @media all and (min-width: 992px) {
	.navbar .nav-item .dropdown-menu{ display: none; }
	.navbar .nav-item:hover .nav-link{   }
	.navbar .nav-item:hover .dropdown-menu{ display: block; }
	.navbar .nav-item .dropdown-menu{ margin-top:0; }
}

#my-video
{
    width: 100% !important;
    height: 100px !important;
}

.scrollit
         {
           overflow: scroll !important;
           overflow-x: auto !important;
           overflow-y: scroll !important;
           height: 500px !important;
           width: 140px  !important;
           background-color: #125d9b !important;


        }

/* #wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    right: 250px;
    width: 0;
    height: 100%;
    margin-right: -250px;
    overflow-y: auto;
    background: #222;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
} */

#sidebar
{
   width: 100%;
   float: right;

}

body
{
    overflow-x: hidden;
}

#logo
{
    border-radius: 100%;
}
/* .scrollit {
    overflow:scroll;
    height:500px;

    width: 140px;
} */

video
{
	width: 100% !important;
	object-fit: cover !important;
}

#image
{
  position: relative;

  display: block;

  clear: both;

  margin: 0px 0px 0px 0px;

  padding: 0px;

}



</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>



</head>

<body id="head2">

  <div id="head">



	   <div class="row justify-content-start" id="banar">

         <div class="col-md-5" id="image">

            <img src="{{asset('images/Bannar.png')}}" width="100%" height="169" >


         </div>

           <div class="col-md-2 py-4">
                 {{--
                    <hr style="width:3px;height:77px;color:white;"/>
                --}}
          </div>


          @php

          $allvedio=App\Models\Vedio::select('vedio')->pluck('vedio');
          $allDuration=App\Models\Vedio::select('duration')->pluck('duration');

      @endphp
      <div class="col-md-5">

          <video id="myVideo" muted="muted"  width="100%" height="169"  autoplay loop muted></video>

              <script type="text/javascript">

                      const video=@json($allvedio);
                      const videoDuration=@json($allDuration);

                      var vedioId=document.getElementById("myVideo");
                      var i=0;
                      var total=video.length;
                      var v='{{asset('/')}}';

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

                          if(i<=total)
                          {
                              console.log(show(i))
                              i++;

                          }

                    







                      }





                      console.log(loop())



              </script>


      </div>

       </div>
	 </div>
  </div>





<!-- ============= COMPONENT ============== -->
<div>

	<nav id="navbar_top" class="navbar navbar-expand-lg navbar-light" >
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
							  <a href="#" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Apt</span></button></a>

						 </div>

					  </div>

					  <div class="column">
						<div class="row mx-auto">
							<a href="#" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Land</span></button></a>

						</div>

						<div class="row  mx-auto">
							<a href="#" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Plot</span></button></a>

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
                                        <a class="dropdown-item" href="{{url('see.electric',$productall->iteam)}}" style="color: #125d9b;">

                                            {{$productall->iteam}}
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




					{{-- <nav  class="navbar navbar-expand-lg navbar-dark " style="margin-bottom: -50px;"> --}}
						<div class="row mx-auto">

                            <ul  class="navbar-nav">

                                <li class="nav-item dropdown">

						   <a href="#" class="navbar-nav nav-item nav-link" data-bs-toggle="dropdown" id="hardware"> <button class="btn btn-alt-primary"><span style="color: white;">Hardware</span></button> </a>
                               @php
								   $productitem=App\Models\Hardwar::select('productitem')->distinct()->get();
							   @endphp


						   <ul class="dropdown-menu">

                            <table class="table">

                                <tbody>
                                    @foreach ($productitem as $productall)

                                    <tr>
                                        <td>



                                                <li style="font-size:14px;"><a class="dropdown-item" href="{{url('about.hardware',$productall->productitem)}}" style="color: #125d9b;">  {{$productall->productitem}}</a></li>






                                        </td>

                                    </tr>

                                    @endforeach




                                </tbody>

                            </table>


							 {{-- <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
							 <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li> --}}
						   </ul>
                        </li>

                    </ul>

						</div>
						<div class="row mx-auto">
                            <ul  class="navbar-nav">

                                <li class="nav-item dropdown">

						   <a href="#" class="nav-item nav-link"> <button class="btn btn-alt primary"><span style="color: white;margin-top:80px;">Company</span></button> </a>



						</div>

					   {{-- </nav> --}}

				   </div>



				</div>











		</div>






	</nav>





    </div>





</nav>
</div>




{{-- ride sidebar --}}



    {{-- ride sidebar --}}

<!-- ============= COMPONENT END// ============== -->



        <div class="container">



			<div class="row justify-content-start">
				<div class="col-md-5" style="padding: 80px;">

					<div class="card" id="card1">

						<div class="card-header">
							<h5 style="text-align: center;">Apartment</h5>
						  <form action="{{ url('location2') }}" method="POST" id="form-submit">
								@csrf

								<div class="py-2">
									<select name="city" id="adress" class="form-control" >
										<option value="">Select City</option>
										<option value="Rajshahi">Rajshahi</option>
										<option value="Dhaka">Dhaka</option>
										<option value="Sylhet">Sylhet</option>
										<option value="Chittagong">Chittagong</option>
										<option value="Khulna">Khulna</option>
										<option value="Barisal">Barisal</option>
										<option value="Rangpur">Rangpur</option>
										<option value="Mymensingh">Mymensingh</option>
									 </select>
									{{-- <input type="text" name="location" class="form-control" placeholder="location"> --}}
								</div>


								<div class="py-2">
									<select name="location" id="adress_details" class="form-control" >
										<option value="">Please Select Location</option>
										<option value=""></option>
									</select>
								</div>


                                <div class="input-group mb-3">
                                    <input type="text" name="minsize" class="form-control" placeholder="MinSize" aria-label="Min" list="exampleList">

                                    <datalist id="exampleList">
                                        <option value="50">
                                        <option value="100">
                                        <option value="1000">
                                        <option value="10000">
                                        <option value="25000">
                                        <option value="40000">
                                        <option value="55000">
                                    </datalist>

                                    <input type="text" name="maxsize" class="form-control" placeholder="MaxSize" aria-label="Max" list="exampleList2">

                                    <datalist id="exampleList2">
                                           <option value="100">
                                            <option value="1000">
                                            <option value="10000">
                                            <option value="25000">
                                            <option value="40000">
                                            <option value="55000">
                                            <option value="75000">
                                    </datalist>
                                  </div>




                                  <div class="input-group mb-3">
                                    <input type="text" name="minprice" class="form-control" placeholder="MinPrice" aria-label="Min" list="exampleList3">

                                    <datalist id="exampleList3">
                                             <option value="100">
                                             <option value="1000">
                                             <option value="10000">
                                             <option value="25000">
                                             <option value="40000">
                                             <option value="55000">
                                             <option value="85000">
                                             <option value="100000">
                                             <option value="150000">
                                             <option value="130000">
                                             <option value="145000">
                                             <option value="160000">
                                             <option value="175000">
                                             <option value="190000">
                                             <option value="205000">
                                             <option value="220000">
                                             <option value="235000">
                                    </datalist>

                                    <input type="text" name="maxprice" class="form-control" placeholder="MaxPrice" aria-label="Max" list="exampleList4">

                                    <datalist id="exampleList4">
                                            <option value="1000">
                                            <option value="10000">
                                            <option value="25000">
                                            <option value="40000">
                                            <option value="55000">
                                            <option value="85000">
                                            <option value="100000">
                                            <option value="150000">
                                            <option value="130000">
                                            <option value="145000">
                                            <option value="160000">
                                            <option value="175000">
                                            <option value="190000">
                                            <option value="205000">
                                            <option value="220000">
                                            <option value="235000">
                                    </datalist>
                                  </div>




							{{-- <div class="py-2">
								<input type="text" name="size" id="size2" class="form-control" placeholder="size" >
								<span class="text-danger" id="size-error"></span>
							</div>
							<div class="py-2">
								<input type="text" name="price" id="price2" class="form-control" placeholder="price" >
								<span class="text-danger" id="size-error"></span>
							</div> --}}

							<div class="text-center">
								<button class="btn btn-primary" id="btnFetch" >Search</button>
							</div>

						 </form>

						</div>


					</div>


				</div>

				{{-- <div class="col-md-1" style="padding: 90px;">

				</div> --}}

				<div class="col-md-5" style="padding: 80px;">


					<div class="card" id="card2">
						<div class="card-header">
						 <form action="{{ route('Land.found') }}" method="POST" id="form-submit2" validate>
							@csrf
							<h5 style="text-align: center;">Ploat/Land</h5>
							<div class="py-2">
								<select name="city" id="ploat" class="form-control">
									<option value="">Select City</option>
									<option value="Rajshahi">Rajshahi</option>
									<option value="Dhaka">Dhaka</option>
									<option value="Sylhet">Sylhet</option>
									<option value="Chittagong">Chittagong</option>
									<option value="Khulna">Khulna</option>
									<option value="Barisal">Barisal</option>
									<option value="Rangpur">Rangpur</option>
									<option value="Mymensingh">Mymensingh</option>

								</select>
							</div>
							<div class="py-2">
								<select name="location" id="ploat_details" class="form-control" >
									<option value="">Please Select Location</option>
									<option value=""></option>
								</select>
							</div>


                            <div class="input-group mb-3">
                                <input type="text" name="minsize" class="form-control" placeholder="MinSize" aria-label="Min" list="exampleList">

                                <datalist id="exampleList">
                                    <option value="50">
                                    <option value="100">
                                    <option value="1000">
                                    <option value="10000">
                                    <option value="25000">
                                    <option value="40000">
                                    <option value="55000">
                                </datalist>

                                <input type="text" name="maxsize" class="form-control" placeholder="MaxSize" aria-label="Max" list="exampleList2">

                                <datalist id="exampleList2">
                                       <option value="100">
                                        <option value="1000">
                                        <option value="10000">
                                        <option value="25000">
                                        <option value="40000">
                                        <option value="55000">
                                        <option value="75000">
                                </datalist>
                              </div>


                              <div class="input-group mb-3">
                                <input type="text" name="minprice" class="form-control" placeholder="MinPrice" aria-label="Min" list="exampleList3">

                                <datalist id="exampleList3">
                                         <option value="100">
                                         <option value="1000">
                                         <option value="10000">
                                         <option value="25000">
                                         <option value="40000">
                                         <option value="55000">
                                         <option value="85000">
                                         <option value="100000">
                                         <option value="150000">
                                         <option value="130000">
                                         <option value="145000">
                                         <option value="160000">
                                         <option value="175000">
                                         <option value="190000">
                                         <option value="205000">
                                         <option value="220000">
                                         <option value="235000">
                                </datalist>

                                <input type="text" name="maxprice" class="form-control" placeholder="MaxPrice" aria-label="Max" list="exampleList4">

                                <datalist id="exampleList4">
                                        <option value="1000">
                                        <option value="10000">
                                        <option value="25000">
                                        <option value="40000">
                                        <option value="55000">
                                        <option value="85000">
                                        <option value="100000">
                                        <option value="150000">
                                        <option value="130000">
                                        <option value="145000">
                                        <option value="160000">
                                        <option value="175000">
                                        <option value="190000">
                                        <option value="205000">
                                        <option value="220000">
                                        <option value="235000">
                                </datalist>
                              </div>



							{{-- <div class="py-2">
								<input type="text" name="size"  class="form-control" placeholder="size" >
								<span class="text-danger" id="size-error"></span>
							</div>
							<div class="py-2">
								<input type="text" name="price"  class="form-control" placeholder="price">
								<span class="text-danger" id="price-error"></span>
							</div> --}}

							<div class="text-center">
								<button class="btn btn-primary" id="btnFetch2" >Search</button>
							</div>

						</div>
					</form>

					</div>


				</div>



                @php
                $allLogo=App\Models\Logo::get();
               @endphp



                        <div class="col-md-1 offset-md-1">



                              <div class="scrollit">

                                <table class="table table-borderless" style="background-color: #125d9b;">
                                    <tbody style="overflow:scroll;">

                                     @foreach ($allLogo as $logo)

                                     @if ($logo->company_id==null)
                                     <tr>

                                       <td class="text-center">
                                           <a href="{{$logo->link}}">

                                               <img src="{{URL :: to($logo -> logo)}}" width="50" height="50" id="logo">
                                           </a>
                                       </td>


                                    </tr>

                                    @endif

                                      @php
                                          $companyLogo=App\Models\Compane::where('id',$logo->company_id)->first();
                                      @endphp

                                      @if ($companyLogo)
                                      <tr>

                                        <td class="text-center">
                                            <a href="{{route('about.company',$companyLogo->id)}}">

                                                <img src="{{URL :: to($companyLogo -> logo)}}" width="50" height="50" id="logo">
                                            </a>
                                        </td>


                                     </tr>

                                      @endif







                                   @endforeach

                                    </tbody>



                                 </table>

                              </div>





                        </div>









			</div>






               <div class="row justify-content-center">

                    <div class=" text-center p-3">
                        <p style="color: #fef6f6;font-size:14px;">Powerd By</p>

                        <a href="https://rajit.net/">
                            <img src="https://rajit.net/wp-content/themes/websdevrajit/images/logo.png" alt="" class="img-responsive" style="width: 120px;;background-color:rgb(107, 88, 75);">
                        </a>

                    </div>


               </div>



        </div><!-- container //  -->





</body>
</html>

{{-- <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
		<script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
<script> --}}



<script>
	$(document).ready(function (){

		$(document).on('change', '#adress', function(){

			const addreess = $(this).val();
		$.ajax({
			url : "{{ route('Aptlocation.find') }}",
			type : "get",
			data : { addreess : addreess },
			dataType:'json',
			success:function(res)
			{




			   var htmloption="<option value=''>Please select Location</option>";
			   $.each(res.adress,function(){
					$.each(this,function(k,v){

						htmloption+="<option value='"+v+"'>"+v+"</option>";
					})
			   })



			   $('#adress_details').html(htmloption);



			}
		});

	   });

	});

	</script>


<script>
	$(document).ready(function (){

		$(document).on('change', '#ploat', function(){


			const addreess = $(this).val();
		$.ajax({
			url : "{{ route('Ploatlocation.find') }}",
			type : "get",
			data : { addreess : addreess },
			dataType:'json',
			success:function(res)
			{




			   var htmloption="<option value=''>Please select Location</option>";
			   $.each(res.adress,function(){
					$.each(this,function(k,v){

						htmloption+="<option value='"+v+"'>"+v+"</option>";
					})
			   })



			   $('#ploat_details').html(htmloption);



			}
		});

	   });

	});

	</script>


<script>
		$(document).ready(function (){
	$(".preload").fadeOut(2000, function() {
        $(".content").fadeIn(1000);
    });
});
</script>


<script type="text/javascript">
    $(document).ready(function() {

     $("#btnFetch").click(function() {
       // disable button
       $(this).prop("disabled", true);

       $(this).html(
         '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>'

       );
	   var size=$('#size2').val();
	   var price=$('#price2').val();
	   if(size=='')
	   {
        //  $('size-error').text('Please Fill Up');
		 $(this).prop("disabled", false);
		 $(this).text('Search');
		 $("input[name=size]").focus();
	   }
	   else if(price=='')
	   {
		// $('size-error').text('Please Fill Up');
		 $(this).prop("disabled", false);
		 $(this).text('Search');
		 $("input[name=price]").focus();
	   }
	   else
	   {
		$("#form-submit").submit();

	   }
    //    $("#form-submit").submit();
     });
 });

 </script>

<script type="text/javascript">
    $(document).ready(function() {

     $("#btnFetch2").click(function() {
       // disable button

       $(this).prop("disabled", true);

       $(this).html(
         '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>'

       );
        var size=$('#size').val();
		var price=$('#price').val();

	   if(size=='')
	   {
		// $('#size-error').text('Please Fill Up ');
		$(this).prop("disabled", false);
		$(this).text('Search');
		$("input[name=size]").focus();


		// size.focus();

		return false;

	   }
	   else if(price=='')
	   {
		// $('#price-error').text('Please Fill Up');
		$(this).prop("disabled", false);
		$(this).text('Search');
		$("input[name=price]").focus();
	   }
	   else
	   {
		$("#form-submit2").submit();

	   }




  });




 });

 </script>


{{-- <script type = "text/javascript">

	   // Form validation code will come here.
	   function validate() {

		  if( document.landform.size.value == "" ) {
			 alert( "Please provide your name!" );
			 document.myForm.size.focus() ;
			 return false;
		  }
		  if( document.landform.price.value == "" ) {
			 alert( "Please provide your Email!" );
			 document.myForm.price.focus() ;
			 return false;
		  }

		  return( true );
	   }
	//-->
 </script> --}}
