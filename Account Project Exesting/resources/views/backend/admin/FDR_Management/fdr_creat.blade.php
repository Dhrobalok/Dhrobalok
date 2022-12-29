@extends('backend.admin.index')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">


            <form action="{{ url('fdrcreate') }}" method="POST">
             @csrf



                         <div class="row form-group">
                            <div class="col-md-12 text-center">
                                <div class="f-roboto">FDR INFORMATION</div>
                                <br>
                                <div>
                                    @if($errors->any())
                                    <h4>{{$errors->first()}}</h4>
                                    @endif

                                </div>


                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <label>YEAR<span class="text-danger">*</span></label>
                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="year" required >

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <label>fdr amount<span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-4">
                                <label>interest rate<span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-4">
                                <label>fdr number<span class="text-danger">*</span></label>
                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-md-4">
                                <input type="text" class="form-control" name="fdr_amount" value="{{ old('email') }}" required>

                            </div>

                            <div class="col-md-4">
                                <input type="text" class="form-control" name="interest_rate" value="{{ old('email') }}" required>

                            </div>

                            <div class="col-md-4">
                                <input type="text" class="form-control" name="fdr_number" value="{{ old('email') }}" required>

                            </div>

                        </div>




                        <div class="row">

                            <div class="col-md-4">
                                <label>creating date<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Bank name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label>Expire_date<span class="text-danger">*</span></label>
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-4">
                                <input type="date" class="form-control" name="creat_date" required >

                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="bank_name" value="{{ old('email') }}" required>

                            </div>
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="expire_date" value="{{ old('mobile_no') }}">

                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-4">
                                <label>last expire_date<span class="text-danger">*</span></label>
                            </div>




                            <div class="col-md-4">
                                <label>Breaking date <span class="text-danger">*</span></label>
                            </div>


                        </div>

                        <div class="row form-group">

                            <div class="col-md-4">
                                <input type="date" class="form-control" name="last_expire" value="{{ old('email') }}" required>

                            </div>



                            <div class="col-md-4">
                                <input type="date" class="form-control" name="breaking_date" value="{{ old('email') }}" required>

                            </div>



                        </div>




                        <div class="row justify-content-center">
                            <div class="col-md-3 btn-group">

                                <button class="btn" type="submit"
                                    style="font-family:'Gentium Basic';color:white;border-color:#1dbf73;background-color:#1dbf73;">Save Information</a>
                            </div>
                        </div>



















                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
