


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- @include('backend.header-footer-files.css_files')
    @include('backend.header-footer-files.js_files') --}}

     {{-- @import url('https://fonts.googleapis.com/css?family=Raleway'); --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

  <!--  HISTOGRAM SCRIPT  -->
  {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.0/Chart.bundle.min.js" integrity="sha512-pO5Lu8ovo73/Q3ZncYULnRIbpj2cow0Eb0uIAql3ZiblVBBouznLafSPHtNRUUFdwKm8RUycWg/UcOtz6RgCOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">




<style>

    body
    {
        overflow-x: hidden;
        /* overflow: hidden; */
    }

    #head2
    {
        /* background-color: rgb(161, 98, 212); */
        background-color:#0066b3;

    }

    #nvabr
    {
        width: 100%;
    }

    #nvabr2
    {
        width: 10%;


    }
    #head1
    {
        background-color: rgb(251, 250, 250);
        width:100%;
        height: 120px;
    }

    .logo-navbar
    {
        border-radius: 50%;
    }


    .navbar-nav {
    --bs-nav-link-padding-x: 1rem;
    --bs-nav-link-padding-y:0.2rem !important;
    }

span
{
  color: white;
}

#virus
{
   width: 101%;
    height: 240px;


}

#survey
{
    background-image:url('images/DNA-AdobeStock_banner.webp');
    opacity: 1.2;
    height: 50%;
     width: 100%;
}

#card1
{
    background-color:rgba(255,255,255, 0.7);




}

#card2
{
    background-color:rgba(255,255,255, 0.2);




}



.table>:not(caption)>*>* {
    padding: 1.5rem 0.5rem !important;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);

}

#myChart
{
    background-color:rgba(146, 122, 122);

}

/* tr
{
    padding: 15px;
} */


#state
{

    background-image:url('images/Grants.webp');
    opacity: 1.5;
    height: 50%;


}

.fa-facebook {
  background-color: #5282e1;
  color: white;

}

.fa
         {
          padding: 10px;
          font-size: 15px;
          width: 50px;
          text-align: center;
          text-decoration: none;
           margin: 5px 2px;
           border-radius: 100%;
          }

         .fa:hover
            {
             opacity: 0.7;
            }

            .fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}
</style>





</head>
<body>

       <header id="head1">

            <div class="row justify-content-start">

                <div class="col-md-1">
                    <img src="{{ asset('images/download.png') }}" class="logo-navbar" alt="Responsive image" >


                </div>
                <div class="col-md-5 mt-4">
                    <h3  style="color:cornflowerblue;font-size:2vw;">&nbsp;&nbsp;&nbsp;&nbsp;Institute of Biological Sciences, &nbsp;&nbsp;&nbsp;&nbsp;Rajshahi&nbsp;University</h3>

                </div>

            </div>



            <div class="row" id="head2">

                <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light" >
                    <div class="container">


                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                          <div class="collapse navbar-collapse" id="navbarCollapse">

                               <div class="navbar-nav gap-5" id="nvabr">

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('ibsc')}}">
                                        <span>Home</span>
                                        </a>
                                  </li>


                                  <li class="nav-item ">
                                    <a class="nav-link" href="{{route('activities')}}" ><span>About</span></a>
                                  </li>




                               </div>

                               <div class="navbar-nav" id="nvabr2">

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('user.login')}}">
                                        <span>Login</span>
                                        </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('registration')}}">
                                        <span>Registration</span>
                                        </a>
                                </li>



                               </div>
                          </div>

                    </div>
                </nav>

            </div>



            <div  id="head3">

                <img src="{{ asset('images/Covid-Homepage-background-scaled.webp') }}" id="virus"  alt="Responsive image" >

            </div>

                <hr>

            <div class="row justify-content-start">

                <div class="col-md-12" id="survey">

                    <div class="row">

                        <div class="col-md-3 mt-4 ">

                            <h4 style="margin-left:40px; color:aliceblue;">Science:</h4>
                            <h4 style="margin-left:40px;color:aliceblue;">Our Research</h4>


                          </div>

                          <div class="col-md-9">
                             <div class="card p-2 m-2" id="card1">
                                  <div class="card-body">

                                    @php
                                        $surveyid=App\Models\Survetotal::select('item_id')->distinct()->get();
                                    @endphp




                                         <table class="table table-borderless">
                                            <tr>
                                                <td>

                                                    <img src="{{ asset('images/virus-4937553_1280.jpg') }}" style="border-radius: 50%;height:50px;width:50px; " alt="Responsive image" >
                                                </td>
                                                <td></td>

                                                <td  style="font-size: 18px;font-weight:bold;color:rgb(100, 100, 88);text-align:left;">Infectious Diseases</td>
                                            </tr>

                                            <tr class="mt-4">
                                                <td>

                                                    <img src="{{ asset('images/biofuelicons.jpg') }}" style="border-radius: 50%;height:50px;width:50px; " alt="Responsive image" >
                                                </td>
                                                <td></td>

                                                <td  style="font-size: 18px;font-weight:bold;color:rgb(100, 100, 88);text-align:left;">Industrial Biotechnology</td>
                                            </tr>

                                            <tr>
                                                <td>

                                                    <img src="{{ asset('images/cardiovascularicons.jpg') }}" style="border-radius: 50%;height:50px;width:50px; " alt="Responsive image" >
                                                </td>
                                                <td></td>

                                                <td  style="font-size: 18px;font-weight:bold;color:rgb(100, 100, 88);text-align:left;">
                                                    Non-Communicable Diseases</td>
                                            </tr>

                                         </table>





                                  </div>

                             </div>

                          </div>

                    </div>





                </div>






            </div>



            <div class="row justify-content-start mt-4">

                  <div class="col-md-5">
                      <div>
                          <div class="p-2">
                            <h4 style="color:blueviolet;font-weight:bold;">Latest Work</h4>


                            @php
                                $SurveyInform=App\Models\Survetotal::select('item_id')->distinct()->orderBy('item_id')->limit(3)->get();
                            @endphp




                            <table class="table table-borderless">
                               @foreach ( $SurveyInform as $survey)

                                  @php
                                      $surveyName=App\Models\Item::where('id',$survey->item_id)->first();
                                  @endphp


                              @if ($surveyName)

                              <tr>
                                <td style="font-size: 12px;font-weight:bold;color:rgb(100, 100, 88);text-align:left;">{{$surveyName->name}}</td>
                                <td></td>
                                <td style="font-size: 12px;font-weight:bold;color:rgb(100, 100, 88);text-align:left;">{{$surveyName->created_at->format('D M Y')}}</td>
                               </tr>

                              @endif


                               @endforeach


                            </table>

                          </div>

                      </div>

                  </div>



                  <div class="col-md-7" id="state">


                       <div class="card shadow" id="card2">

                        <div class="card-body">
                            <canvas id="myChart" style="background-color: rgb(237, 252, 252,0.7);">


                            </canvas>

                           </div>



                       </div>



                  </div>

            </div>





            <div class=" border shadow row justify-content-center mt-4 py-4" style="background-color: rgb(243, 222, 222)">


                <div class=" p-0 m-0 p-2 col-md-7">
                    <span style="font-weight: bold;color:#007bb5;">Get connected with us on social networks:</span>
                  </div>


                        <div class="col-md-1"><a href="https://www.facebook.com/IBScRU/" class="fa fa-facebook"></a></div>

                        <div class="col-md-1">  <a href="#" class="fa fa-linkedin"></a></div>
                        <div class="col-md-1"><a href="#" class="fa fa-google"></a></div>
                        <div class="col-md-1"> <a href="#" class="fa fa-twitter"></a></div>







            </div>


       </header>







          <!--  Activities Models  -->





           <!--  Activities Models  -->








</body>

<script>


    var data = @json($data);
    var datanumber = @json($itemnumber);



 const ctx = document.getElementById('myChart').getContext('2d');
 const myChart = new Chart(ctx, {
     type: 'bar',
     data: {
         labels: data,

         datasets: [{
             label: 'Survey yjyy',
             barThickness: 60,
             maxBarThickness: 100,

             data:datanumber,
             backgroundColor: [
                 'rgb(168, 120, 231)',
              'rgba(144,238,144)',
              'rgba(70,130,180)',
              'rgba(128,0,0)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
             ],
             borderColor: [
                 'rgba(255, 99, 132, 1)',
                 'rgba(54, 162, 235, 1)',
                 'rgba(255, 206, 86, 1)',
                 'rgba(75, 192, 192, 1)',
                 'rgba(153, 102, 255, 1)',
                 'rgba(255, 159, 64, 1)'
             ],
             borderWidth:0
         }]
     },
     options: {
         scales: {
             y: {
                 beginAtZero: true
             }
         }
     }
 });
 </script>


<script>
    jQuery(document).ready(function() {
        jQuery('#loading').fadeOut(3000);
    });
 </script>

 <script>

const hamburger = document.querySelector(".humberger-menu");
const menu = document.querySelector(".main-menu");
const rightMenu = document.querySelector(".right-menu");
const header = document.querySelector("header");

hamburger.addEventListener("click", () => {
	menu.classList.toggle("active");
	menu.style.height = "100%";
	rightMenu.classList.toggle("active");
	rightMenu.style.height = "50%";
	header.classList.toggle("full-screen-menu");
	hamburger.classList.toggle("humberger-menu-open");
});



 </script>

<script>
    $('.count').each(function() {

$(this).prop('counter', 0).animate({

  counter: $(this).text()

}, {

  duration: 4000,

  easing: 'swing',

  step: function(now) {

    $(this).text(Math.ceil(now));
  }
});
});
</script>



<script>

    $(document).ready(function() {



        $(document).on('click','#ProfileEdit',function(){

            event.preventDefault();
              jQuery.noConflict();

            $.ajax({

                  url: "{{ route('Profile.update') }}",

                  type: 'get',
                success: function(result)
                     {


                       $("#exampleModal6").modal('show');

                    }
            });

      });
    });



    </script>


</html>







