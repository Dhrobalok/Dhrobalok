
@extends('backend.Dashboard.Master')
@section('content')

<style>
    .btn-success
    {
        width: 200px !important;
        text-align: center !important;
    }
</style>

    <section>

            <div class="row justify-content-center">
                <div class="row justify-content-center p-2">
                    <img src="{{ asset('images/download.png') }}" alt="" style="border-radius:40px;width:100px;height:80px;">

                 </div>
                <div class="col-md-7 p-4 mt-0">

                 <div class="card">

                    <div class="card-body shadow">


                            <h4 class="text-center" style="color:rgb(56, 142, 142);">Create an account</h4>


                            @if( Session::has("msg") )
                             <script>
                                Swal.fire({
                                  icon: 'success',
                                  title: '{{ Session::get("msg") }}',

                                  })

                             </script>

                              {{-- <div class="alert alert-success alert-block" role="alert">
                                 <button class="close" data-dismiss="alert"></button>
                                 {{ Session::get("msg") }}
                              </div> --}}
                            @endif
                     <form action="{{route('user.Save')}}" method="post" enctype="multipart/form-data">
                         @csrf
                           <div class="row justify-content-start">

                            <div class="col-md-6">
                                <label>First Name</label><span class="text-danger"></span></label>
                            </div>



                           </div>

                         <div class="row form-group justify-content-start">

                            <div class="col-md-12">

                                <input type="text" class="form-control"  name="firstname" placeholder="Full Name" required>



                           </div>


                         </div>


                         <div class="row justify-content-start">

                            <div class="col-md-6">
                                <label>Last Name</label><span class="text-danger"></span></label>
                            </div>



                           </div>

                         <div class="row form-group justify-content-start">

                            <div class="col-md-12">

                                <input type="text" class="form-control"  name="lastname" placeholder="Full Name" required>



                           </div>


                         </div>


                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Email address</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="email" class="form-control"  name="email" placeholder="Email" required>

                                       @error('email')
                                           <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror

                               </div>


                            </div>


                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Password</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="password" class="form-control"  name="password" placeholder="Password" required>



                               </div>


                            </div>


                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>User&nbsp;Image</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="file" class="form-control"  name="image" placeholder="Email" required>



                               </div>


                            </div>


                            <div class="row  justify-content-center mt-4">


                                    <button class="btn btn-success">Register</button>

                                
                            </div>


                     </form>




                        </div>

                    </div>

                </div>

            </div>


    </section>


    @endsection

