<!DOCTYPE html>
<html>

<head>
    <title>Employee List</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
    }

    .body {
        font-family: "verdana", Arial, Georgia;
    }

    .container {
        width: 100%;
        padding-top: 35px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead tr th,
    .table tbody tr td {
        border: 1px solid #000;
        padding: 2px;
        text-align: center;
        font-size: 13pt;
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

    img {
        height: 80px;
        width: 80px;
        border-radius: 50%;
    }
    .logo
    {
        margin-left:44%;
        margin-bottom:1rem;
    }

    .heading p {
        text-align: center;
        margin-top: 0;
        padding-top: 0;
    }

    p {
        font-size: 10pt;
    }
    </style>
</head>

<body>
    <div class="container">
         <div class="heading">
         <img class = "logo" src="{{ URL :: to($company -> company_logo) }}">
         </div>
        <div class="heading">
            <p><b>{{ $company -> company_name }}</b></p>

        </div>

        <div class="heading">
            <p><b>Employee List</b></p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Registration ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Joining Date</th>

                </tr>

            </thead>
            <tbody>
                @php
                $sl = 0;
                @endphp
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee -> employee_reg_id }}</td>
                    <td>{{ $employee -> name }}</td>
                    <td>{{ $employee -> email}}</td>
                    <td>{{ $employee -> mobile_no }}</td>
                    <td>{{ $employee -> name }}</td>

                    <td>{{ $employee -> designation -> name }}</td>

                    <td>{{ $employee -> joining_date }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
