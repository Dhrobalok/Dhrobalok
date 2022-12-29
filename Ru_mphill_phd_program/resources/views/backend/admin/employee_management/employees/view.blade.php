@extends('backend.admin.index')
@section('content')
<div class="container px-0 pb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="f-roboto">Employee Information</div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.employee-management.employees.index') }}"
                                    class="f-100 btn btn-info btn-sm"><i class="fa fa-arrow-left mr-2"></i>Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-4 text-right">
                            <img src="{{ URL :: to($employee -> employee_photo) }}" height="200" width="200">
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <div class="f-roboto">Basic Information</div>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Name : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> name }}</p>
                        </div>

                        <div class="col-md-2 text-right">
                            <p class="f-100">Roll : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> roll }}</p>
                        </div>

                        <div class="col-md-2 text-right">
                            <p class="f-100">Email: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> email }}</p>
                        </div>
                    </div>

                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Mobile : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> mobile_no }}</p>
                        </div>

                        <div class="col-md-2 text-right">
                            <p class="f-100">Course : </p>
                        </div>

                        

                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> course }}</p>
                        </div>

                    </div>
                    {{-- <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Gender : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ Str :: title($employee -> gender) }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Date Of Bitrh: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> date_of_birth }}</p>
                        </div>
                    </div> --}}
                 {{--  
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Division : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">
                                {{ $employee -> getDivisionName ? $employee -> getDivisionName -> name : '-' }}</p>
                        </div>


                    </div>
                --}}
                    {{-- <div class="row text-black">

                        <div class="col-md-2 text-right">
                            <p class="f-100">Designation: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> designation ? $employee -> designation -> name : '-' }}</p>
                        </div>


                    </div>


                    <div class="row text-black">

                        <div class="col-md-2 text-right">
                            <p class="f-100">Department: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> department ? $employee -> department -> name : '-' }}</p>
                        </div>


                    </div>

                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Joining Date : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> joining_date  }}</p>
                        </div>


                    </div> --}}

                    {{--  
                    <div class="row text-black">


                    </div>
                    <hr>
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <div class="f-roboto">Payroll Information</div>
                        </div>
                    </div>
                    @php $employee_payscale = $employee -> payScale; @endphp
                    @if(isset($employee_payscale))
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Grade : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee_payscale ? $employee_payscale -> grade -> name : '-' }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Payscale : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee_payscale ? $employee_payscale -> payScale -> name : '-'  }}</p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Basic : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee_payscale -> payscale_detail ? $employee_payscale -> payscale_detail ->  salary_amount : '-' }} BDT</p>
                        </div>

                    </div>
                    @endif
                    <hr>
                    @php
                    $addresses = $employee -> getAddress;
                    $emergency_contact = $employee -> getEmergencyContact;
                    $academic_details = $employee -> getAcademicRecords;
                    $previous_experiences = $employee -> getPreviousWorkingExperiences;
                    @endphp
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="f-roboto">Addresses</div>
                        </div>
                    </div>
                    <div class="row text-black text-center form-group">
                        <div class="col-md-12">
                            <div class="f-100 font-weight-bold" style="font-size:20px;">Present Address</div>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Street Add. : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[0] -> street_address1 }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Street Add. : (Line 2) </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[0] -> street_address2  }}</p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">City: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[0] -> city }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">ZIP Code : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[0] -> zip_code  }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-black text-center form-group">
                        <div class="col-md-12">
                            <div class="f-100 font-weight-bold" style="font-size:20px;">Permanent Address</div>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Street Add. : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[1] -> street_address1 }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Street Add. : (Line 2) </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[1] -> street_address2  }}</p>
                        </div>
                    </div>
                    <div class="row text-black form-group">
                        <div class="col-md-2 text-right">
                            <p class="f-100">City: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[1] -> city }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">ZIP Code : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[1] -> zip_code  }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-black text-center form-group">
                        <div class="col-md-12">
                            <div class="f-100 font-weight-bold" style="font-size:20px;">Emergency Address</div>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Contact Name : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $emergency_contact -> contact_name }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Relationship </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $emergency_contact -> relation }}</p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Mobile No : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $emergency_contact -> mobile_number }}</p>
                        </div>

                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Street Add. : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[2] -> street_address1 }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Street Add. : (Line 2) </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[2] -> street_address2  }}</p>
                        </div>
                    </div>
                    <div class="row text-black form-group">
                        <div class="col-md-2 text-right">
                            <p class="f-100">City: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[2] -> city }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">ZIP Code : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $addresses[2] -> zip_code  }}</p>
                        </div>
                    </div>
                    @if(count($academic_details) > 0)
                    <hr>
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <div class="f-roboto">Academic Information</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr class="text-center text-black">
                                        <th>Certification Name</th>
                                        <th>Group / Major</th>
                                        <th>Board</th>
                                        <th>Passing Year</th>
                                        <th>Institute Name / University</th>
                                        <th>GPA / CGPA</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($academic_details as $academic_detail)
                                    <tr class="text-center text-black">
                                        <td>{{ $academic_detail -> certificate_title }}</td>
                                        <td>{{ $academic_detail -> group }}</td>
                                        <td>{{ $academic_detail -> board }}</td>
                                        <td>{{ $academic_detail -> passing_year }}</td>
                                        <td>{{ $academic_detail -> institute_name }}</td>
                                        <td>{{ $academic_detail -> gpa }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                    @if(count($previous_experiences) > 0)
                    <hr>
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <div class="f-roboto">Previous Wroking Experiences</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr class="text-center text-black">
                                        <th>Name of the Organization</th>
                                        <th>Position</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Major Job Responsibility</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($previous_experiences as $previous_experience)
                                    <tr class="text-center text-black">
                                        <td>{{ $previous_experience -> organization_name }}</td>
                                        <td>{{ $previous_experience -> position }}</td>
                                        <td>{{ $previous_experience -> duration }}</td>
                                        <td>{{ $previous_experience -> job_responsibilities }}</td>
                                    </tr>
                                    @endforeach
                                --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
