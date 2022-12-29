<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Document</title>

   <style>
        .container
        {
          max-width: inherit;
          min-height: inherit;
          margin: 0!important;
          padding: 0!important;
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

.fa-facebook {
  background-color: #5282e1;
  color: white;

}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-instagram {
  background: #467291;
  color: white;
}

.industry
{
    padding: 10px !important;
    font-size: 15px !important;
    width: 50px !important;
    text-align: center !important;
    text-decoration: none;
    margin: -4px 2px !important;
    border-radius: 100%;

}

   </style>
</head>
<body>

  <div class="container my-2">

    <!-- Footer -->
  <footer class="text-center text-lg-start text-white" style="background-color: #2d7cc5;">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-between p-4"
               style="background-color: #0e5295"
               >
        <!-- Left -->
        <div class="p-0 m-0 p-2">
          <span style="font-weight: bold;">Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="row justify-center">
          <a href="#" class="fa fa-facebook"></a>&nbsp;
          <a href="#" class="fa fa-twitter"></a>&nbsp;
          <a href="#" class="fa fa-google"></a>&nbsp;
          <a href="#" class="fa fa-linkedin"></a>&nbsp;
          <a href="#" class="fa fa-instagram"></a>


        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="p-4 mt-4"  style="background-color: #2d7cc5;">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold" ><span style="color: paleturquoise;">COMPANY&nbsp;NAME</span></h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #7c4dff; height: 2px"
                  />

                  @php
                      $companyName=App\Models\Footer::select('name')->get();
                  @endphp

                  @foreach ($companyName as $name)

                  <p>
                    {{$name->name}}
                  </p>

                  @endforeach



            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold"><span style="color: paleturquoise;">SERVICE</span></h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #7c4dff; height: 2px"
                  />

                  @php
                  $ServicName=App\Models\Footer::select('service')->get();
                 @endphp

                  @foreach ($ServicName as $Servic)

                  <p>
                    {{$Servic->service}}
                  </p>

                  @endforeach





            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold"><span style="color: paleturquoise;">Useful links</span></h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #7c4dff; height: 2px"
                  />

                  @php
                  $Link=App\Models\Footer::select('linkname','link')->get();
                 @endphp

                 @foreach ($Link as $linkname)
                 <p>
                    <a href="{{$linkname->link}}
                    " class="text-white">{{$linkname->linkname}}</a>
                  </p>

                 @endforeach



            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold"><span style="color: paleturquoise;">Contact</span></h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #6c48e3; height: 2px"
                  />
              <p style="color: rgb(252, 250, 241);">122, Ganak Para (2nd floor south), North Side Road of Hotel Nice, P. O.:
                Ghoramara - 6100, P. S.: Boalia, Rajshahi, Bangladesh.</p>

              <p class="mt-4"> +88 01782 250730, 01798 156848</p>

            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div
           class="text-center p-3"
           style="background-color: rgba(103, 74, 233, 0.2)"
           >
        © 2022 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">REDA CONSTRUCTION</a
          >
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

  </div>
  <!-- End of .container -->

</body>
</html>
