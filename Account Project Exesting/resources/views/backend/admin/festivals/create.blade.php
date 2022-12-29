@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
          <div class = "f-roboto">New Festival Bonus</div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.festival.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Festival Name</label>
                    </div>
                    <div class="col-md-6">
                        <label>Month</label>
                    </div>

                </div>
                <div class="row form-group justify-content-center">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="festival_name" required>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" name="month">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <label>Segment</label>
                    </div>
                    <div class="col-md-4">
                        <label>Percentage(% Of Basic)</label>
                    </div>
                    <div class="col-md-4">
                        <label>Festival Date</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <select class="form-control" name="segment_id">
                            @foreach($segments as $segment)
                            <option value={{ $segment -> id}}>{{ $segment -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type = "number" step = "any" class = "form-control" name = "bonus_percentage" placeholder = "Percentage" required>
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="festival_date" required>
                    </div>

                </div>


                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-block btn-success  f-100 pt-2 pb-2"
                            style="background-color:#1dbf73;font-size:18px;">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection