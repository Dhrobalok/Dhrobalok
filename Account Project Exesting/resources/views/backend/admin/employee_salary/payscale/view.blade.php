@extends('backend.admin.index')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <div class="f-roboto">Pay Scale Information</div>
            </div>
            <div class="col-md-6 text-right">
                <div class="btn-group">
                    <a href="{{ route('admin.salary-management.payscale.index') }}"
                        class="btn btn-primary text-white btn-sm f-100 mr-2"><i class="fa fa-arrow-left mr-2"></i>Back</a>
                        <a href="{{ route('admin.salary-management.payscale.edit',['pay_scale_id' => $payScale -> id]) }}"
                        class="btn btn-success text-white btn-sm f-100"><i class="fa fa-pencil-alt mr-2"></i>Edit</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row text-black">
            <div class="col-md-6 text-right">
                <p class="f-100">Pay Scale Name : </p>
            </div>
            <div class="col-md-6">
                <p class="f-100">{{ $payScale -> name }}</p>
            </div>
        </div>
        <div class="row text-black">
            <div class="col-md-6 text-right">
                <p class="f-100">Grade : </p>
            </div>
            <div class="col-md-6">
                <p class="f-100">{{ $payScale -> grade -> name }}</p>
            </div>
        </div>
        <div class="row text-black">
            <div class="col-md-6 text-right">
                <p class="f-100">Salary Start From : </p>
            </div>
            <div class="col-md-6">
                <p class="f-100">{{ number_format($payScale -> start_salary,2) }} BDT</p>
            </div>
        </div>
        <div class="row text-black">
            <div class="col-md-6 text-right">
                <p class="f-100">Salary End To : </p>
            </div>
            <div class="col-md-6">
                <p class="f-100">{{ number_format($payScale -> end_salary,2) }} BDT</p>
            </div>
        </div>
        <div class="row text-black">
            <div class="col-md-6 text-right">
                <p class="f-100">Total Number Of Increments : </p>
            </div>
            <div class="col-md-6">
                <p class="f-100">{{ $payScale -> number_of_increments }}</p>
            </div>
        </div>
        <div class="row text-black">
            <div class="col-md-6 text-right">
                <p class="f-100">Increment Rate : </p>
            </div>
            <div class="col-md-6">
                <p class="f-100">{{ number_format($payScale -> increment_percentage,2) }} %</p>
            </div>
        </div>
        <div class="row text-center pb-2">
            <div class="col-md-12">
                <div class="f-roboto">Salary Chart After Each Increment</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-sm table-striped">
                    <thead>
                        <tr class="text-center text-black">
                            <th>Serial No.</th>
                            <th>Salary Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($payScale -> details as $detail)
                        <tr class="text-center text-black">
                            <td>{{ $i }}</td>
                            <td>
                                 {{ number_format($detail -> salary_amount,2)}} BDT
                            </td>
                        </tr>
                        @php $i = $i + 1; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection