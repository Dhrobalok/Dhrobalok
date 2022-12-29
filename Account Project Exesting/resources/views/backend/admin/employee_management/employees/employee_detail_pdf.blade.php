<!DOCTYPE html>
<html>

<head>
    <title>Employee Details</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;

    }

    .body {
        font-family: "verdana", Arial, Georgia;
    }


    .container {
        width: 100%;
    }


    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead tr th,
    .table tbody tr td {
        padding: 6px;
        text-align: center;
        font-size: 11pt;
        padding-top: 2px;
        font-weight: normal;
        border: 1px solid black;
        color: black;
    }

    .footer {
        padding-top: 70px;
        width: 100%;
    }

    .footer tr td {
        text-align: right;
        width: 25%;
        font-size: 10pt;
        font-weight: bold;
    }

    .heading h3 {
        text-align: center;
        text-decoration: none;
        margin-bottom: 5px;

    }

    .heading p {
        text-align: center;
        margin-top: 0;
        padding-top: 0;
    }

    p {
        font-size: 10pt;
    }

    .content-center {
        margin-left: 10%;
        margin-right: 10%;
        width: 80%;
    }

    .content-right {
        float: right;
        width: 50%;
    }
    </style>
</head>

<body>
    <htmlpagefooter name="reportFooter" style="display:none;">
        <div>
            @php
            date_default_timezone_set('Asia/Dhaka');
            @endphp
            <p style="text-align:center;font-weight:normal">Printed On : {{ date('d-m-y H:i:s') }}</p>
        </div>
    </htmlpagefooter>
    <div class="container">
        <h3 style="text-align:center"><img src="{{ URL :: to($company -> company_logo) }}" height="50px"
                width="50px">{{ $company -> company_name  }}</h3>
        <h4 style="text-align:center;line-height:5px;">{{ $company -> company_address }}</h4>
        <!-- <h4 style="text-align:center;line-height:5px;padding-bottom:20px">Employee Information</h4> -->
        <div style="padding-top:2px;border-bottom:1px solid black"></div>
        <h4 style="text-align:left">
            <img style="border:1px solid blue" src="{{ URL :: to($employee -> employee_photo) }}" height="100px"
                width="100px">
        </h4>
        <table class="table">
            <thead>

                <tr style="border:none;">
                    <th colspan="2"
                        style="border:none;text-align:left;padding-top:7px;padding-bottom:7px;padding-left:5px;background:#f1f1f1">
                        <b>Basic Information</b>
                    </th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>Name : </b> {{ $employee -> name }} </th>
                    <th style="border:none;text-align:left;"><b>Gender : </b>{{ Str :: title($employee -> gender) }}
                    </th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>Email Address : </b>
                        {{ $employee -> user_info -> email }} </th>
                    <th style="border:none;text-align:left;"><b>Mobile No : </b>{{ $employee -> mobile_no }}</th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>Date Of Birth : </b> {{ $employee -> date_of_birth }}
                    </th>
                    <th style="border:none;text-align:left;"><b>Employee ID :
                        </b>{{ $employee -> employee_reg_id ? $employee -> employee_reg_id : "-" }}
                    </th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>NID No : </b> {{ $employee -> nid_number }}
                    </th>
                    <th style="border:none;text-align:left;"><b>TIN No : </b>{{ $employee -> tin_number }}
                    </th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>Division : </b>
                        {{ $employee -> getDivisionName ? $employee -> getDivisionName -> name : '-'}}
                    </th>
                    <th style="border:none;text-align:left;"><b>Department :
                        </b>{{ $employee -> department ? $employee -> department -> name : '-' }}
                    </th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>Section : </b>
                        {{ $employee -> getSectionName ? $employee -> getSectionName -> name : '-'}}
                    </th>
                    <th style="border:none;text-align:left;"><b>Designation :
                        </b>{{ $employee -> designation ? $employee -> designation -> name : '-' }}
                    </th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>Joining Date : </b>
                        {{ $employee -> joining_date }}
                    </th>
                    <th style="border:none;text-align:left;"><b>Retired Date :
                        </b>{{ $employee -> retired_date  }}
                    </th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>Bank Name : </b>
                        {{ $employee -> getBankName ? $employee -> getBankName -> bank_name : '-'}}
                    </th>
                    <th style="border:none;text-align:left;"><b>Account No. :
                        </b>{{ $employee -> account_no  }}
                    </th>
                </tr>
                <tr style="border:none;">
                    <th colspan="2"
                        style="border:none;text-align:left;padding-top:7px;padding-bottom:7px;padding-left:5px;background:#f1f1f1">
                        <b>Payroll Information</b>
                    </th>
                </tr>
                <tr style="border:none;">

                    @php $payscale = $employee -> payscale; @endphp
                    <th style="border:none;text-align:left;"><b>Grade : </b>
                        {{ $payscale ? $payscale -> grade -> name : '-'}}
                    </th>
                    <th style="border:none;text-align:left;"><b>PayScale :
                        </b>{{ $payscale ?  $payscale -> payscale -> name  : '-' }}
                    </th>
                </tr>
                <tr style="border:none;">
                    <th style="border:none;text-align:left;"><b>Basic :
                        </b>{{ $payscale ?  $payscale -> payscale_detail -> salary_amount." BDT" : '-' }}
                    </th>
                     <th style="border:none;">
                       
                    </th>
                </tr>
                <tr style="border:none;">
                    <th colspan="2"
                        style="border:none;text-align:left;padding-top:7px;padding-bottom:7px;padding-left:5px;background:#f1f1f1">
                        <b>Present Address</b>
                    </th>

                </tr>
                @php
                $addresses = $employee -> getAddress;
                $contact = $employee -> getEmergencyContact;
                @endphp
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>Street Address : </b>
                        {{ $addresses[0] -> street_address1 }} </th>
                    <th style="border:none;text-align:left;"><b>Street Address Line 2 :
                        </b>{{ $addresses[0] -> street_address2 }}
                    </th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>City : </b>
                        {{ $addresses[0] -> city }} </th>
                    <th style="border:none;text-align:left;"><b>Postal Code / ZIP : </b>{{ $addresses[0] -> zip_code }}
                    </th>
                </tr>

                <tr style="border:none;">

                    <th colspan="2"
                        style="border:none;text-align:left;padding-top:7px;padding-bottom:7px;padding-left:5px;background:#f1f1f1">
                        <b>Permanent Address</b>
                    </th>

                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>Street Address : </b>
                        {{ $addresses[1] -> street_address1 }} </th>
                    <th style="border:none;text-align:left;"><b>Street Address Line 2 :
                        </b>{{ $addresses[1] -> street_address2 }}
                    </th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>City : </b>
                        {{ $addresses[1] -> city }} </th>
                    <th style="border:none;text-align:left;"><b>Postal Code / ZIP : </b>{{ $addresses[1] -> zip_code }}
                    </th>
                </tr>


                <tr style="border:none;">

                    <th colspan="2"
                        style="border:none;text-align:left;padding-top:7px;padding-bottom:7px;padding-left:5px;background:#f1f1f1">
                        <b>Emergeny Contact & Address</b>
                    </th>

                </tr>
                <tr>
                    <th style="border:none;text-align:left;"><b>Contact Name : </b>{{ $contact -> contact_name }}</th>
                    <th style="border:none;text-align:left;"><b>Mobile No : </b>{{ $contact -> mobile_number }}</th>
                </tr>
                <tr>
                    <th style="border:none;text-align:left;"><b>Relation : </b>{{ $contact -> relation }}</th>
                    <th style="border:none;text-align:left;"></th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>Street Address : </b>
                        {{ $addresses[2] -> street_address1 }} </th>
                    <th style="border:none;text-align:left;"><b>Street Address Line 2 :
                        </b>{{ $addresses[2] -> street_address2 }}
                    </th>
                </tr>
                <tr style="border:none;">

                    <th style="border:none;text-align:left;"><b>City : </b>
                        {{ $addresses[2] -> city }} </th>
                    <th style="border:none;text-align:left;"><b>Postal Code / ZIP : </b>{{ $addresses[2] -> zip_code }}
                    </th>
                </tr>
            </thead>
        </table>

        <table class="table">
            <thead>
                <tr style="border:none;">
                    <th colspan="2"
                        style="border:none;text-align:left;padding-top:7px;padding-bottom:7px;padding-left:5px;background:#f1f1f1">
                        <b>Academic Details</b>
                    </th>
                </tr>
            </thead>
        </table>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center;font-weight:bold">Certification Name</th>
                    <th style="text-align:center;font-weight:bold">Group/Major</th>
                    <th style="text-align:center;font-weight:bold">Board</th>
                    <th style="text-align:center;font-weight:bold">Passing Year</th>
                    <th style="text-align:center;font-weight:bold">Institute Name</th>
                    <th style="text-align:center;font-weight:bold">GPA</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee -> getAcademicRecords as $academic_record)
                <tr>
                    <td style="text-align:center">{{ $academic_record -> certificate_title }}</td>
                    <td style="text-align:center">{{ $academic_record -> group }}</td>
                    <td style="text-align:center">{{ $academic_record -> board }}</td>
                    <td style="text-align:center">{{ $academic_record -> passing_year }}</td>
                    <td style="text-align:center">{{ $academic_record -> institute_name }}</td>
                    <td style="text-align:center">{{ $academic_record -> gpa }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <table class="table">
            <thead>
                <tr style="border:none;">
                    <th colspan="4"
                        style="border:none;text-align:left;padding-top:7px;padding-bottom:7px;padding-left:5px;background:#f1f1f1">
                        <b>Previous Working Experience</b>
                    </th>
                </tr>

            </thead>
        </table>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center;font-weight:bold">Organization Name</th>
                    <th style="text-align:center;font-weight:bold">Position</th>
                    <th style="text-align:center;font-weight:bold">Duration</th>
                    <th style="text-align:center;font-weight:bold">Job Responsibilities</th>

                </tr>
            </thead>
            <tbody>
                @foreach($employee -> getPreviousWorkingExperiences as $experience_record)
                <tr>
                    <td style="text-align:center">{{ $experience_record -> organization_name }}</td>
                    <td style="text-align:center">{{ $experience_record -> position }}</td>
                    <td style="text-align:center">{{ $experience_record -> duration }}</td>
                    <td style="text-align:center">{{ $experience_record -> job_responsibilities }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>