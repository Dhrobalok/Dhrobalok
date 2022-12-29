@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
           <div class="text-center">
               <img src="{{ asset('public/company_pic/ru-logo.png') }}" alt="">
              <div class="text-center">
                 <p style="font-size:16px; display: flex;flex-direction:column; justify-content:center">Mphill,Phd Programe, IBSC, RU</p>
                 <h1 style="font-size:16px; font-weight:bold" class="">IBSC Accounting Management System</h1>
              </div>
                 
           </div>
            <div class="card">
                
                 <div class="card-header text-center">User Registration</div> 
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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="employee_photo"class="form-control @error('name') is-invalid @enderror"  value="{{ old('employee_photo') }}" required autocomplete="email" autofocus>
                                {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus> --}}

                                
                            </div>
                        </div>

                        


                      

                        <div class="form-group row">
                            <label for="roll" class="col-md-4 col-form-label text-md-right">{{ __('Roll') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="roll" required>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>

                            <div class="col-md-6">
                                <select  id="" class="form-control" name="course"  required>
                                    <option value="Mphill">Mphill</option>
                                    <option value="Phd">Phd</option>
                                </select>
                                
                                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                               
                            </div>
                        </div>

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

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hall Name') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="hallname" required>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control " name="mobile_no" required ">

                                
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

