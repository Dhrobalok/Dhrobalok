@extends('frontend.layout')
@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row justify-content-center" style = "padding-top:10px;">
            <div class="col-lg-11">
                
                @if(Session :: get('message'))
                <div class="alert alert-success row">
                      <div class="text-left col-md-6">
                        {{ Session :: get('message') }}
                      </div>
                    
                      <div class="text-right col-md-6">
                          <a class = "btn btn-primary" href = "{{ route('login') }}">Proceed with login</a>
                      </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Online User Bill Registration</h4>
                    </div>
                    <div class="card-body shadow-lg">
                        <form action="{{ route('bill-user.save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row  justify-content-start">

                                <div class="col-md-6">
                                    <label>Organization/Individual Name<span class="text-danger">*</span></label>
                                </div>
                                
                            </div>
                            <div class="row form-group justify-content-center">

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name') }}">
                                    @if($errors -> has('name'))
                                    <small>{{ $errors -> first('name') }}</small>
                                    @endif
                                </div>
                               
                            </div>
                            <div class="row  justify-content-center">

                                <div class="col-md-6">
                                    <label>Email Address<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row form-group justify-content-center">

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    @if($errors -> has('email'))
                                    <small>{{ $errors -> first('email') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mobile_no"
                                        value="{{ old('mobile_no') }}">
                                    @if($errors -> has('mobile_no'))
                                    <small>{{ $errors -> first('mobile_no') }}</small>
                                    @endif
                                </div>
                            </div>
                            
                             <div class="row">
                               <div class="col-lg-6">
                                 <label>Address</label>
                               </div>
                             </div>
                            <div class="row form-group justify-content-center">
                             <div class="col-lg-12">
                               <textarea class = "form-control" cols="3" name = "address">
                                 {{ old('address') }}
                               </textarea>
                               @if($errors -> has('address'))
                                    <small>{{ $errors -> first('address') }}</small>
                                    @endif
                             </div>
                            </div>
                            <div class="row">
                               <div class="col-lg-6">
                                  <label>Password<span class = "text-danger">*</span></label>
                               </div>
                               <div class="col-lg-6">
                                  <label>Confirm Password<span class = "text-danger">*</span></label>
                               </div>
                            </div>
                            <div class="row form-group justify-content-center">

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                    @if($errors -> has('password'))
                                    <small>{{ $errors -> first('password') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="confirm_password"
                                        value="{{ old('confirm_password') }}">
                                    @if($errors -> has('confirm_password'))
                                    <small>{{ $errors -> first('confirm_password') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group justify-content-center">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
