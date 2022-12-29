@extends('backend.admin.index')
@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card p-4">

                <div>

                    <a href="{{ URL::to('/fdrprint') }}" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini" style = "color:blue;font-weight:500;font-size:22px;float: right;"><i class="fa fa-download" aria-hidden="true"></i>Print</a>
                 </div>

            <div class="row form-group">
               <div class="col-md-12 text-center">
                  <div class="f-roboto">TOTAL FDR</div>






            </div>
        </div>

<table class="table table-striped" id="member_list" >


    <thead id="myUL">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Bank Name</th>
        <th scope="col">FDR Number</th>
        <th scope="col">FDR Amount </th>
        <th scope="col">Create Date</th>
        <th scope="col">Interest </th>

        <th scope="col">FDR Break</th>
      </tr>
    </thead>



  </table>
   {{-- Pagination




    {{  $fdr->links('pagination::bootstrap-4') }} --}}


</div>
</div>



</div>
</div>

{{--

        <script type="text/javascript">

    function myFunction() {

       // document.getElementById("myInput").submit();
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];



        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1)
          {
            tr[i].style.display = "";
          }
          else
          {
            tr[i].style.display = "none";
          }
        }
      }
    }


    </script>



    @php
  $table_columns = ['bank_name','fdr_number', 'creat_date','fdr_amount',];

	$setData = array();
	if(isset($table_columns))
	{
		foreach($table_columns as $col) {
			$temp['data'] = $col;
			$temp['name'] = $col;
			array_push($setData, $temp);
		}
		$setData = json_encode($setData);
	}
@endphp
  --}}


@endsection


@push('js')

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">


</script>
<script>

    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });


        load_data();

        function load_data()
        {
         var dataTable = $('#member_list').DataTable({
          "processing":true,
          "serverSide":true,
          "ajax":{
           url:"{{ route('fdr.datasource') }}",
           type:"POST",
           cache: true,
           data:{
               "_token": "{{ csrf_token() }}"
           }
          },

          "columns": [
            { "data": "id"},
            { "data": "bank_name"},
            { "data": "fdr_number"},
            { "data": "fdr_amount"},
            { "data": "creat_date"},
            { "data": "interest_rate"},
            { "data": "fdr_braeak"}

            ],
          "columnDefs":[
            {"targets"  : 'no-sort',"orderable": false},
            {"targets": [0,3],"className": 'text-center'}
          ],
         });
        }
       });


</script>

@endpush

