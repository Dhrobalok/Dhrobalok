@extends('backend.admin.index')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
    img
    {
        width: 90px;
        height: 70px;
       
        background: #fff;
        border-radius: 40px;
        position: relative;
    }
</style>
<div class="card">
   
  <div class="row">
    <div class="col-md-12">
        <h5 style="font-size:16px; font-weight:bold;text-align: center;">Institute&nbspof&nbspBiological&nbspSciences</h5>
        <p style="font-size:16px; font-weight:bold;text-align:center;">University of Rajshahi</p>


    </div>

        <div class="col-md-12">
            <p style="text-align: center; ">
                <img src="{{ asset('company_pic/ru-logo.png') }}" alt="">
            </p>
       </div>

       <div class="col-md-12">
           <p style="text-align:center;font-weight:bold;font-size:16px;">New Category</p>

       </div>

       <div class="col-md-12">
        {{-- <p style="float:left;font-weight:bold;font-size:16px;"><a href="{{ route('category.add') }}">Back</a></p> --}}

      </div>
    </div>
</div>

<div class="block-content block-content-full">
    <form action="{{ route('category.store') }}" method="post">
        @csrf
    <div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full" id="dynamicTable">
        {{-- <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Sl.no</th>
                <th class="d-none d-sm-table-cell text-center">Category Name</th>
                <th class="d-none d-sm-table-cell text-center">Action</th>
                 <th class="d-none d-sm-table-cell text-center">FellowShip Report</th>
                <th class="d-none d-sm-table-cell text-center">Supervisor Report</th> 
                
            </tr>
        </thead> --}}
        <tbody>
            <tr>
                <td><input type="text" class="form-control" name="name[]" class="js-flatpickr form-control bg-white" placeholder="Category Ttitle" required></td>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add&nbspMore</button></td>
            </tr>
        </tbody>
    </table>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>

<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><input type="text" class="form-control" name="name[]" class="js-flatpickr form-control bg-white" placeholder="Category title" required></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

    });
    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

   </script>

</div>


@endsection
