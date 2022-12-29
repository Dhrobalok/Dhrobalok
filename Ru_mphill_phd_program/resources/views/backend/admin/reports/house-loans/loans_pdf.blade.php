<!DOCTYPE html>
<html>

<head>
    <title>House Building Loans</title>
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
        font-size: 10pt;
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
    </style>
</head>

<body>
    <div class="container">

        <div class="heading">
            <p><b>House Building Loans</b></p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>SL. No</th>
                    <th>Employee Name</th>
                    <th>Loan Ref. No</th>
                    <th>Base Amount</th>
                    <th>Total Amount</th>
                    <th>EMI Amount</th>
                    <th>Tenure Year</th>
                    <th>Interest Rate</th>
                    <th>Status</th>
                </tr>

            </thead>
            <tbody>
                @php
                $sl = 0;
                @endphp
                @foreach($loans as $loan)
                @php
                $sl++;
                @endphp
                <tr>
                    <td>{{ $sl }}</td>
                    <td>{{ $loan -> employee_info -> name }}</td>
                    <td>{{ $loan -> loan_ref_no }}</td>
                    <td>{{ $loan -> base_amount.' Tk.' }}</td>
                    <td>{{ $loan -> total_amount.' Tk.' }}</td>
                    <td>{{ $loan -> emi_amount.' Tk.' }}</td>
                    <td>{{ $loan -> tenure_year.' Yr.' }}</td>
                    <td>{{ $loan -> interest_rate.' %' }}</td>
                    @if($loan -> status == 0)
                    <td class="text-center"><span class="badge badge-danger">Not Approved</span></td>
                    @elseif($loan -> status == 1)
                    <td class="text-center"><span class="badge badge-info">Pending</span></td>
                    @elseif($loan -> status == 3)
                    <td class="text-center"><span class="badge badge-primary">Pending Approval</span></td>
                    @elseif($loan -> status == 2)
                    <td class="text-center"><span class="badge badge-success">Approved</span></td>
                    @endif

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>