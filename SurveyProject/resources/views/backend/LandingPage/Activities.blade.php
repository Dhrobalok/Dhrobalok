


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IBSC SURVEY</title>

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

    #head2
    {

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

body
{
    overflow-x: hidden;
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



    <div class="row justify-content-center">

         <div class="col-md-8">
            <p class="lh-6 border shadow p-5"   style="font-family: inherit;font-size:18px;">
                The Institute of Biological Sciences(IBSc), University of Rajshahi was founded in 1989 with a vision of uplifting higher education leading to MPhil and Ph.D. degrees in the study of life and living organisms, their life cycles, adaptations and environment. Since its establishment, IBSc has always been interested in research efforts related to current world trends as well as domestic demands.IBSc experts are currently spearheading studies into diseases like as cancer, diabetes, stress, and micro-developmental abnormalities, with the goal of discovering the causes and preventions along with the evaluation of safe and effective drugs. Currently, the researchers of the institute are also working to learn more about the contagious COVID-19 virus. Here, the investigations are not only related to epidemiological studies but also plant biotechnologists are searching to germinate water and soil tolerable crops in the institutional research field.IBSc laboratories have been well equipped with sophisticated instruments and have collaborations with laboratories of several other faculties. The institute is also offering Masters of Public Health (MPH). Thereby, IBSc welcomes all the researchers of students of life sciences and medical professionals from home and abroad with a suitable atmosphere to establish their ideas through research activities.
            </p>

         </div>

    </div>









       </header>







          <!--  Activities Models  -->





           <!--  Activities Models  -->








</body>



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






</html>







