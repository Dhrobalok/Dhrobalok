@extends('backend.admin.index')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<div class="container-fluid mb-4">
    <div class="block-content block-content-full">
        <div class="card mb-2">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <a class="mr-4" href="{{ route('bulk.index') }}"
                            style="color:blue;font-weight:500;font-size:22px"><i
                                class="fa fa-arrow-circle-left mr-2"></i>Back</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header f-roboto">
                <div class="row">
                    <div class="col-md-12">
                        <strong>Create Agreement</strong>
                    </div>







    <form action="{{ route('bulk.store') }}" method="post">
        @csrf

        @if(Session :: get('message') != NULL)
        <div class="alert alert-success">
            {{ Session :: get('message') }}
            @php
            Session :: put('message',NULL);
            @endphp
        </div>
        @endif
     <div class="table-responsive">
        <table class="table table-bordered" id="dynamicTable">
            <tr>
                <th>Coustomer Name</th>
                <th>Vender Name</th>
                <th>Agreement Name</th>
                <th>Quantity</th>
                <th>Stone Size</th>
                <th>Each Ton</th>
                <th>Quantity_Sign</th>
                <th>Action</th>



            </tr>
            <tr>

             <td>
                <select class="form-control" id="level_id" name="customer_id[]" required>
                    <option value=0>Please Select Label</option>
                    @foreach($customers as $customer)
                    <option value={{ $customer -> id}}>{{$customer -> name }}</option>
                    @endforeach
                </select>
            </td>

            <td>

                <select class="form-control" id="level_id" name="vender_id[]" required>
                    <option value=0>Please Select Label</option>
                    @foreach($vendors as $vendor)
                    <option value={{ $vendor -> id}}>{{$vendor -> name }}</option>
                    @endforeach
                </select>
            </td>

                <td><input type="text" class="form-control" name="agreement_name[]" class="js-flatpickr form-control bg-white" placeholder="Name" required></td>
                <td><input type="number" class="form-control" name="quantity[]" class="js-flatpickr form-control bg-white" placeholder="quantity" required></td>
                <td><input type="text" class="form-control" name="quantity_size[]" class="js-flatpickr form-control bg-white"  required></td>
                <td style="width: 350px;"><input type="number" class="form-control"  name="each_ton[]" class="js-flatpickr form-control bg-white" placeholder="BDT" required></td>
                <td>
                    <select class="form-control" id = "id" name="quantity_sign[]" required>
                        <option value=0>Please Sign</option>
                      
                        <option value="2">ton</option>

                    </select>
                </td>

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

        $("#dynamicTable").append('<tr><td><select class="form-control" id="level_id" name="customer_id[]" required><option value=0>Please Select Label</option>@foreach($customers as $customer)<option value={{ $customer -> id}}>{{$customer -> name }}</option>@endforeach</select></td><td><select class="form-control" id="level_id" name="vender_id[]" required><option value=0>Please Select Label</option>@foreach($vendors as $vendor)<option value={{ $vendor -> id}}>{{$vendor -> name }}</option>@endforeach</select></td><td><input type="text" class="form-control" name="agreement_name[]" class="js-flatpickr form-control bg-white" placeholder="Agreement Name" required></td><td><input type="number" class="form-control" name="quantity[]" class="js-flatpickr form-control bg-white" placeholder="quantity" required></td><td><select class="form-control" id = "id" name="quantity_sign[]" required><option value=0>Please Sign</option><option value="2">ton</option></select></td>  <td><input type="text" class="form-control" name="quantity_size[]" class="js-flatpickr form-control bg-white" placeholder="Name" required></td> <td><input type="number" class="form-control" name="each_ton[]" class="js-flatpickr form-control bg-white" placeholder="BDT" required></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

    });
    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

   </script>


    </div>
</div>





@endsection

