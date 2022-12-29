@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           <div class=" card-header text-center pt-3" style="background:#a2b9bc;">
            <img src="{{ asset('images/excavator-construction-logo-with-buildings_23-2148657768.webp') }}" alt="">


           </div>
            <div class="card"  style="background-color:#E5EFF9">

                 <div class="text-center p-4"><span style="font-weight: bold;color:cadetblue;">User Registration</span></div>
                @if (Session::has('success-message'))
                <div class="alert alert-info">
                    <p style="text-align: center;">
                        {{ Session::get('success-message') }}
                    </p>

                </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.store') }}"   enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">User Photo</label>

                            <div class="col-md-6">
                                <input type="file" name="employee_photo"class="form-control @error('name') is-invalid @enderror"  value="{{ old('employee_photo') }}" required autocomplete="email" autofocus>
                                {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus> --}}


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Company Name</label>

                            <div class="col-md-6">
                                <input type="text" name="company_name"class="form-control @error('name') is-invalid @enderror"  value="{{ old('employee_photo') }}" required autocomplete="email" autofocus>
                                {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus> --}}


                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Company Photo</label>

                            <div class="col-md-6">
                                <input type="file" name="logo"class="form-control @error('name') is-invalid @enderror"  value="{{ old('employee_photo') }}" required autocomplete="email" autofocus>
                                {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus> --}}


                            </div>
                        </div>






                        {{-- <div class="form-group row">
                            <label for="roll" class="col-md-4 col-form-label text-md-right">{{ __('Roll') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="roll" required>

                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>

                            <div class="col-md-6">
                                <select  id="" class="form-control" name="course"  required>
                                    <option value="Mphill">Mphill</option>
                                    <option value="Phd">Phd</option>
                                </select>

                                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">

                             <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hall Name') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="hallname" required>


                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control " name="mobile_no" required ">


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Company_Type') }}</label>

                            <div class="col-md-6">
                                <select name="company_type" id="" class="form-control">
                                    <option value="">Select Option</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Land">Land</option>
                                    <option value="Ploat">Ploat</option>
                                    <option value="Brick">Brick</option>
                                    <option value="Cement">Cement</option>
                                    <option value="Steel">Steel</option>
                                    <option value="Tiles">Tiles</option>
                                    <option value="Door">Door</option>
                                    <option value="Sanitary">Sanitary</option>
                                    <option value="Feetings">Feetings</option>
                                    <option value="Sand">Sand</option>
                                    <option value="Hardware">Hardware</option>
                                    <option value="Architect">Architect</option>
                                    <option value="Interior">Interior</option>
                                    <option value="Electric">Electric</option>
                                    <option value="Plot">Plot</option>
                                    <option value="Paint">Paint</option>
                                </select>


                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Office Address') }}</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control " name="officeaddress" required ">


                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Payslip') }}</label>

                            <div class="col-md-6">
                                <input id="" type="file" class="form-control " name="payslip" required ">


                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> About&nbsp;your&nbsp;company</label>

                            <div class="col-md-6">
                                <textarea name="description" id="" cols="20" rows="4" class="form-control">



                                </textarea>


                            </div>
                        </div>





                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registration') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

