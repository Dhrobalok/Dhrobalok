<!DOCTYPE html>
<html>

<head>
    <title>Provident Fund</title>
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
        text-align: left;
        margin-top: 10px;
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
        <p><b>Employee Details</b></p>
        </div>
        <table class="table" style ="background-color:#e5e5e5">
			<thead>
               
				<tr style = "border:none;">
					<th style = "border:none;padding-bottom:12px;padding-top:10px;"><b>Employee Reg No# </b></th>
					<th style = "border:none;padding-bottom:12px;padding-top:10px;">{{ $employee_info -> employee_reg_id }}</th>
					<th style = "border:none;padding-bottom:12px;padding-top:10px;"><b>Name# </b></th>
					<th style = "border:none;padding-bottom:12px;padding-top:10px;">{{ $employee_info -> name }}</th>
				</tr>
				<tr style = "border:none">
					<th style = "border:none;padding-bottom:12px;padding-top:10px;"><b>Department# </b></th>
					<th style = "border:none;padding-bottom:12px;padding-top:10px;">{{ $employee_info -> department -> name }}</th>
					<th style = "border:none;padding-bottom:12px;padding-top:10px;"><b>Designation# </b></th>
					<th style = "border:none;padding-bottom:12px;padding-top:10px;">{{ $employee_info -> designation -> name }}</th>
				</tr>
				<tr style = "border:none">
					
					
					<th style = "border:none;padding-bottom:12px;padding-top:10px;"><b>Date of Joining#</b> </th>
					<th style = "border:none;padding-bottom:12px;padding-top:10px;">{{ $employee_info -> joining_date }}</th>
                    <th style = "border:none;padding-bottom:12px;padding-top:10px;"><b>Account Number# </b></th>
					<th style = "border:none;padding-bottom:12px;padding-top:10px;">{{ $employee_info -> account_no }}</th>
				</tr>
                <tr>
                <th style = "border:none;padding-bottom:12px;padding-top:10px;"><b>Provident Fund Account# </b></th>
					<th style = "border:none;padding-bottom:12px;padding-top:10px;">{{ $employee_info -> payscale -> provident_fund_no }}</th>
                </tr>
				
			</thead>
		</table>

        <div class="heading">
            <p><b>Provident Fund Details</b></p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>SL No.</th>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Basic Pay</th>
                    <th>Provident Contribution</th>
                    <th>Loan Amount</th>
                    <th>Interest Rate</th>
                    <th>Opening Balance</th>
                    <th>Closing Balance</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @php $sl = 0; @endphp
                @foreach($records as $record)
               
                <tr>
                    @php $sl = $sl + 1 @endphp;
                    <td>{{ $sl }}</td>
                    <td>{{ $record -> year }}</td>
                    <td>{{ $record -> month }}</td>
                    <td>{{ $record -> basic_pay }}</td>
                    <td>{{ $record -> pf_amount }}</td>
                    <td>{{ $record -> loan_amount }}</td>
                    <td>{{ $record -> interest_amount.'%' }}</td>
                    <td>{{ $record -> opening_balance }}</td>
                    <td>{{ $record -> closing_balance }}</td>
                    <td>{{ $record -> pf_date }}</td>
                </tr>
                @endforeach
                
            </tbody>

        </table>


        <table class="footer">

        </table>
    </div>
</body>

</html>