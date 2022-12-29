@extends('backend.admin.index')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">


            <form action="{{ route('bulk.invoice') }}" method="POST">
             @csrf


                        

                        

                        <div class="row justify-content-center">

                            <div class="col-md-4">
                                <label>From Year<span class="text-danger">*</span></label>
                            </div>

                          

                        </div>


                        <div class="row justify-content-center">

                            <div class="col-md-4">
                                <input type="date" class="form-control" name="from_year" value="{{ old('email') }}" required>

                            </div>

                            

                        </div>

                        <div class="row justify-content-center">

                            <div class="col-md-4">
                                <label> To Year<span class="text-danger">*</span></label>
                            </div>

                          

                        </div>

                        <div class="row justify-content-center">

                            <div class="col-md-4">
                                <input type="date" class="form-control" name="to_year" value="{{ old('email') }}" required>

                            </div>

                            

                        </div>


                        <br>







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
