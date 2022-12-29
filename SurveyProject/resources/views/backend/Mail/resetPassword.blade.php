<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('backend.header-footer-files.css_files')
    @include('backend.header-footer-files.js_files')
</head>
<body>


    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 p-4 mt-2">
                    <div class="row justify-content-center p-2">
                        <img src="{{ asset('images/download.png') }}" alt="" style="border-radius: 70%;">

                     </div>
                    <div class="card">

                        <div class="card-body shadow">


                           <h4 class="text-center" style="color:rgb(56, 142, 142);">Reset Password</h4>


                           @if( Session::has("msg") )
                           <script>
                              Swal.fire({
                                icon: 'success',
                                title: '{{ Session::get("msg") }}',

                                })

                           </script>


                          @endif


                         <form action="{{route('password.save')}}" method="post">
                           @csrf
                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label style="color:rgb(56, 142, 142);">Email address</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start ">

                                <div class="col-md-12">

                                    <input type="email" class="form-control"  name="email" placeholder="Enter Email Address" required>



                               </div>


                            </div>


                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label style="color:rgb(56, 142, 142);">Password</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="password" class="form-control"  name="password" placeholder="Password" required>



                               </div>


                            </div>

                            <div class="row justify-content-start ">
                                <div class="col-md-6">

                                    <a href="{{route('user.login')}}"><span style="color: rgb(25, 84, 84);">Login</span></a>

                                </div>


                            </div>




                            <div class="row form-group justify-content-center ">
                                <div class="col-md-3">

                                    <button  class=" btn btn-success">Submit</button>

                                </div>
                            </div>

                        </form>







                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

</body>
</html>
