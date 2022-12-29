@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                      
                         @if(Session::has("danger"))

                         <div class="alert alert-success">
                             <b>This Email or Roll Already taken try different one</b>

                         </div>

                        @endif


                  @if(Session::has("success"))

                         <div class="alert alert-success">
                             <b>Registration Apply Successfully</b>

                         </div>

                        @endif
                                       
                                 
                    <form method="POST" action="{{url('/reg')}}" enctype="multipart/form-data" >
                     @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                
                            </div>
                             
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                                 <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Blood_Group') }}</label>

                            <div class="col-md-6">
                               <select id="password"  name="blood" class="form-control @error('password') is-invalid @enderror"  required autocomplete="new-password">
                                   
                               <option>A+</option>
                               <option>A-</option>
                               <option>O+</option>
                               <option>O-</option>
                               <option>B+</option>
                               <option>B-</option>
                                <option>AB+</option>
                               <option>AB-</option>

                               </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="mobile" required autocomplete="new-password">

                                
                            </div>
                        </div>
                        

                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Session') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="session" required autocomplete="new-password">

                               
                            </div>
                        </div>



                          <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="file" class="form-control @error('password') is-invalid @enderror" name="image" required autocomplete="Student id">

                               
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Roll') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="roll" required autocomplete="Student id">

                               
                            </div>
                        </div>






                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
