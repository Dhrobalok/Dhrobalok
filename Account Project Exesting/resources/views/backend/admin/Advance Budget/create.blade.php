@extends('backend.admin.index')

@section('content')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<div class="container">
    <div class="block-header block-header-default">
        <h3 align="center">Create New Budget</h3>

    </div>



    <form action="{{ route('advancebudget.store') }}" method="post">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <div class="table-responsive">
    
        <table class="table table-bordered" id="dynamicTable">
            <tr>
                <th>Account_Name</th>
                <th>Under Alocation</th>
                <th>Strat Day</th>
                <th>End Day</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <tr>

                <td> <select class="form-control" id="level_id" name="name[]" required>
                    <option value=0>Please Select Label</option>
                    @foreach($occasion as $occasion)
                    <option value={{ $occasion->id}}>{{$occasion->name }}</option>
                    @endforeach
                </select></td>


                <td> <select class="form-control" id="level_id" name="level_id[]" required>
                    <option value=0>Please Select Label</option>
                    @foreach($employe as $employ)
                    <option value={{ $employ -> id}}>{{$employ -> name }}</option>
                    @endforeach
                </select></td>
                <td><input type="datetime-local" id="start_date" name="start_date[]" class="js-flatpickr form-control bg-white" placeholder="Select Date" required></td>
                <td> <input type="datetime-local" class="js-flatpickr form-control bg-white" placeholder="Select Date" id="end_date" name="end_date[]" required></td>
                <td> <input type="text" class="form-control" id="cost" name="cost[]" required></td>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add&nbspMore</button></td>
            </tr>
        </table>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><select class="form-control" id="level_id" name="name[]" required><option value=0>Please Select Label</option>@foreach($occasion as $employ)<option value={{ $occasion -> id}}>{{$occasion -> name }}</option>@endforeach</select></td><td><select class="form-control" id="level_id" name="level_id[]" required><option value=0>Please Select Label</option> @foreach($employe as $employ)<option value={{ $employ -> id}}>{{$employ -> name }}</option>@endforeach</select></td><td><input type="datetime-local" id="start_date" name="start_date[]" class="js-flatpickr form-control bg-white" placeholder="Select Date" required></td><td><input type="datetime-local" class="js-flatpickr form-control bg-white" placeholder="Select Date" id="end_date" name="end_date[]" required></td><td><input type="text" class="form-control" id="cost" name="cost[]" required></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script>

@endsection
