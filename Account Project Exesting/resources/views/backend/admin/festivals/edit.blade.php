@extends('backend.admin.index')
@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <div class="f-roboto">Festival Info Update</div>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('admin.festival.update',['festival_id' => $festival -> id]) }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label>Name</label>
                    </div>
                    <div class="col-md-4">
                        <label>Month</label>
                    </div>
                    <div class="col-md-4">
                        <label>Bonus Percentange</label>
                    </div>

                </div>
                <div class="row form-group text-center">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="festival_name" value="{{ $festival -> name }}"
                            required>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="month" value="{{ $festival -> month }}">
                            <option value="{{ $festival -> month }}" selected hidden>{{ $festival -> month }}</option>
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
                    <div class="col-md-4">
                        <input type = "number" step = "any" class = "form-control" required value = "{{ $festival -> percentage }}" name = "percentage">

                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <label>Segment</label>
                    </div>
                    <div class="col-md-4">
                        <label>Festival Date</label>
                    </div>
                    <div class="col-md-4">
                        <label>Status</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <select class="form-control" name="segment_id" value="{{ $festival -> segment_id }}">
                            <option selected hidden value="{{ $festival -> segment_id }}">
                                {{ $festival -> segment -> name }}</option>
                            @foreach($segments as $segment)
                            <option value={{ $segment -> id}}>{{ $segment -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="festival_date"
                            value="{{ $festival -> festival_date }}" required>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="status">
                            <option value="{{ $festival -> status }}" selected hidden>
                                {{ $festival -> status ? "Active" : "Inactive" }}</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>


                </div>


                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success btn-block f-100"
                            style="background-color:#1dbf73;font-size:18px;">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection