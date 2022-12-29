@extends('backend.admin.index')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<div class="container-fluid mb-4">
    <div class="block-content block-content-full">
        <div class="card mb-2">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <a class="mr-4" href="{{ route('gtc.index') }}"
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
                        <strong>GTC Agreement</strong>
                    </div>


    <form action="{{ route('gtc.store') }}" method="post">
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
                <th>Title</th>
                <th>Contract Amount</th>
                <th>Currency</th>

            </tr>
            <tr>



            <td><input type="text" class="form-control" name="title[]" class="js-flatpickr form-control bg-white" placeholder="Contract Ttitle" required></td>
            <td><input type="number" class="form-control" name="amount[]" class="js-flatpickr form-control bg-white" placeholder="Contract Amount" required></td>
            <td>
                 <select class="form-control" id="level_id" name="currency[]" required>
                <option value=0>Please Select Label</option>

                <option value="1">USD</option>
                <option value="2">BDT</option>

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

        $("#dynamicTable").append('<tr><td><input type="text" class="form-control" name="title[]" class="js-flatpickr form-control bg-white" placeholder="Contract Title" required></td><td><input type="number" class="form-control" name="amount[] class="js-flatpickr form-control bg-white" placeholder="Contract Amount" required"</td><td><select class="form-control" id="level_id" name="currency[]" required><option value=0>Please Select Label</option><option value="1">USD</option><option value="2">BDT</option></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

    });
    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

   </script>


    </div>
</div>





@endsection

