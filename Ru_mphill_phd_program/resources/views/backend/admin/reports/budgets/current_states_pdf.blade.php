<!DOCTYPE html>
<html>

<head>
    <title>Current Snapshoot Of Budget</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
    }

    .body {
        font-family: "verdana", Arial, Georgia;
    }

    .container {
        width: 100%;
        padding-top: 5px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead tr th,
    .table tbody tr td {
        padding: 2px;
        text-align: center;
        font-size: 10pt;
        padding-top: 10px;
        border: 1px solid black;
    }

    .footer {
        padding-top: 70px;
        width: 100%;
    }

    .footer tr td {
        text-align: right;
        width: 25%;
        font-size: 10pt;
        font-weight: normal;
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
    @php
    $date = date('Y-m-d');
    @endphp
    <div class="container">
        <h3 style="text-align:center">{{ $company -> company_name  }}</h3>
        <h4 style="text-align:center;line-height:5px;text-transform:uppercase">Current snapshoot of budget</h4>

        <table class="table">
            <thead>
                <tr>
                    <th>Account Name</th>
                    <th>Account Type </th>
                    <th>Allocated Amount</th>
                    <th>Remaining Amount</th>
                    <th>Budget Type</th>
                    <th>Status</th>
                </tr>

            </thead>
            <tbody>

                @foreach($entries as $entry)
                <tr style = "text-align:center">
                    <td>{{ $entry -> account -> name }}</td>
                    <td>
                        {{ $entry -> account -> account_category -> category_name }}
                    </td>
                    <td style = "text-align:right">
                        {{ number_format($entry -> max_usable_amount) }} /=
                    </td>
                    <td style = "text-align:right">{{ number_format($entry -> remaining_amount) }} /=</td>
                    <td>
                        {{ $entry -> allocation_type }}
                    </td>
                    <td>
                        {{ $entry -> status == 0 ? 'Normal' : 'Limit Exceeded'}}
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
</body>

</html>