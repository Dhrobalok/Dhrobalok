@extends('frontend.layout')
@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-3 form-group">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <img src="{{ $employee -> employee_photo }}" height="200" width="220">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-5">
                <div class="card shadow-lg">
                <div class="card-header text-center">
                   Quick Links
                </div>
                    <div class="card-body text-center">
                        <a class="btn btn-primary" href = "{{ route('myaccount-edit',['employee_id' => $employee -> id]) }}">Edit</a>
                        <a class="btn btn-success">Loan</a>
                        <a class="btn btn-success">Salary</a>
                        <a class="btn btn-primary">Download</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row form-group bg-white">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <label>Name  : </label>
                            </div>
                            <div class="col-md-4">
                                <label>{{ $employee ->name }}</label>
                            </div>
                            <div class="col-md-2">
                                <label>Email Address : </label>
                            </div>
                            <div class="col-md-3">
                                <label>{{ $employee ->  email }}</label>
                            </div>
                        </div>
                        <div class="row  justify-content-center">
                            <div class="col-md-2">
                                <label>Mobile No : </label>
                            </div>
                            <div class="col-md-4">
                                <label>{{ $employee -> mobile_no }}</label>
                            </div>

                        </div>
                        <div class="row  justify-content-center">


                            <div class="col-md-2">
                                <label>Designation : </label>
                            </div>
                            <div class="col-md-3">
                                <label>{{ $employee -> designation -> name }}</label>
                            </div>
                        </div>

                        <div class="row  justify-content-center">
                           <!--
                            <div class="col-md-2">
                                <label>Current Status : </label>
                            </div>
                            @if($employee -> status == 0)
                            <div class="col-md-3">
                                <label>Inactive</label>
                            </div>
                            @elseif($employee ->status == 1)
                            <div class="col-md-3">
                                <label>Active</label>
                            </div>
                            @else
                            <div class="col-md-3">
                                <label>Retired</label>
                            </div>
                            @endif
                        -->
                        </div>

                        <div class="row  justify-content-center">
                            <div class="col-md-2">
                                <label>Joining Date : </label>
                            </div>
                            <div class="col-md-4">
                                <label>{{ $employee -> joining_date }}</label>
                            </div>
                         <!--
                            <div class="col-md-2">
                                <label>Retired Date : </label>
                            </div>
                            <div class="col-md-3">
                                <label>{{ $employee -> retired_date  }}</label>
                            </div>

                        -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection
