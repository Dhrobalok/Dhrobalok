@extends('backend.Dashboard.servey')
@section('content')


<style>
    .card
    {
        width: 100%;
    }

    .form-control-sm {
    min-height: calc(1.5em + 0.7rem + 2px);
    padding: 0.2rem 0.9rem !important;
    font-size: 1.0rem !important;
    border-radius: 0.35rem !important;
}

.editable-click, a.editable-click, a.editable-click:hover {
    text-decoration: none !important;
    border-bottom: none !important;
}

/*   model   */

#myTable th
{
    color:rgb(250, 235, 235);
font-size:14px;
line-height: 14px;
text-transform:capitalize;
font-weight: 400px !important;
width: 20px !important;
background-color: rgb(98, 104, 98)
}

.zoom:hover {
  -ms-transform: scale(3.5); /* IE 9 */
  -webkit-transform: scale(3.5); /* Safari 3-8 */
  transform: scale(3.5);

}

</style>

     <div class="card shadow" style="background-color: aliceblue;">

          <div class="card-body">
            @if ($name)
            <div class="border text-center" style="width: 100%; height:auto; background-color:rgb(220, 238, 254);">
                <p class="mt-3" style="color: #33444a;font-size:17px;">{{ucwords($name->name)}} <span>Information</span></p>
               </div>

            @endif


            @if( Session::has("Update") )
            <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Update Successfully',

                  })

             </script>



           @endif


            @if( Session::has("delete") )
            <script>
               Swal.fire({
                 icon: 'success',
                 title: 'Survey Delete Successfully',

                 })

            </script>



           @endif




              <div class="table-responsive mt-4 p-3">
                <table class="table table-hover"  id="myTable">

                    <thead style="background-color:#6b787f;">
                        <tr>
                            <th style="color: rgb(253, 243, 228);">Survey&nbsp;Id</th>
                            @foreach ($questionName as $name)

                            <th style="color: rgb(253, 243, 228);">{{ucwords($name->name)}}</th>

                            @endforeach


                             <th>Location</th>

                             <th style="color: rgb(253, 243, 228);">
                                Action
                             </th>


                        </tr>

                    </thead>



                    <tbody>

                        @foreach ($surveid as $allsurve)
                        <tr>

                            <td>
                                {{$allsurve->surve_id}}

                            </td>


                             @foreach ($questionName as $question)

                             @php
                             $surveInform=App\Models\Surve::where('surve_id',$allsurve->surve_id)
                             ->where('q_id',$question->id)
                             ->first();



                            @endphp









                          {{-- @foreach ($surveInform as $inform) --}}

                             @if( $surveInform)

                             @php
                             $Qtype=App\Models\question::where('id',$surveInform->q_id)->first();

                             @endphp


                                   @if ($Qtype)


                                        @if ($Qtype->type==2)


                                            <td>

                                                <a href="{{route('file.download',$surveInform->id)}}"><i class="fas fa-download">&nbsp;Download</i></a>


                                            </td>


                                         @else



                                         <td style="color: rgb(81, 78, 73); font-family:Arial, Helvetica, sans-serif;font-size:13px;">

                                            {{$surveInform->value}}




                                         </td>


                                        @endif



                                   @endif

                             @else


                             <td style="color: rgb(81, 78, 73); font-family:Arial, Helvetica, sans-serif;font-size:13px;">

                                N/A
                            </td>



                             @endif










                              @endforeach

                            @php

                              $map=App\Models\Location::where('survey_no',$allsurve->surve_id)
                              ->first();

                             @endphp






                            @if ($map)
                             <td>

                                  {{-- <a id="ProfileEdit" data-id="{{$allsurve->surve_id}}" class="btn btn-sm btn-info">
                                    <span style="color:aliceblue;">Show</span>
                                  </a> --}}

                                  <a href="{{route('location.view',$allsurve->surve_id)}}"  class="btn btn-sm btn-info" >show</a>

                                   {{-- <a href="{{route('location.view',$allsurve->surve_id)}}">show</a> --}}


                                {{-- Mapper --}}


                                      {{-- <p class="text-center">
                                          @php
                                             Mapper::map($map->lat, $map->lng);
                                          @endphp

                                           <div style="width:100%; height:40px;" class="zoom">
                                                 {!! Mapper::render() !!}
                                           </div>

                                        </p> --}}


                             </td>

                             @else

                               <td>N/A</td>

                            @endif



                        <td>
                          <div class="d-flex gap-1" style="width:100% !important">
                            <a href="{{route('survey.edit',$allsurve->surve_id)}}"  class="btn btn-sm btn-primary edit" ><i class="fas fa-edit">&nbsp;Edit</i></a>
                            {{-- <a href="javascript:void(0);" data-id="{{ $allsurve->surve_id }}" class="btn btn-sm btn-primary edit" ><i class="fas fa-edit">&nbsp;Edit</i></a> --}}
                            <a href="{{url('Individual.print',$allsurve->surve_id)}}"  class="btn btn-sm btn-success "><i class="fas fa-print" aria-hidden="true" >&nbsp;<span>Print</span></i></a>
                            {{-- <a href="{{ url('Individual.delete',$allsurve->surve_id) }}"  class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash" aria-hidden="true" >&nbsp;<span>Delete</span></i></a> --}}

                            </div>
                        </td>



                          </tr>

                          @endforeach





                    </tbody>

                </table>

              </div>

          </div>

     </div>


     <!---  Edit  -->

{{-- Mapper --}}

{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


             <div id="tableContent">

                @php
                 Mapper::map(23.773184 , 90.406912);
                @endphp

              <div style="width:100%; height:240px;">

                     {!!  Mapper::render() !!}

              </div>

             </div>

          ...
        </div>

      </div>
    </div>
</div> --}}



 <!----  inline edit  --->

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    {{-- <script>$.fn.poshytip={defaults:null}</script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
    <!-- Inline update -->

<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    $('.update').editable({
           url: "{{ route('information.update') }}",
           type: 'text',
           pk: 1,
           name: 'name',
           title: 'Enter name'
    });
</script>





 @endsection
 @push('js')
 <script>
    $(document).ready( function () {
      datatable=$('#myTable').DataTable();
} );
</script>


<script>
    $(document).ready(function () {
    $('#myInput').keyup(function(){


        var input, filter, parent, child, a, i, txtValue;
        input = $("#myInput");
        filter = input.val().toUpperCase();

        parent = document.getElementById("search_content");

        child = parent.getElementsByClassName("col-md-3");

        // if(filter.length > 0){
        //     $('.faqs-title-box')[0].style.display = 'none';
        // }else{
        //     $('.faqs-title-box')[0].style.display = '';
        // }

        for (i = 0; i < child.length; i++) {
            a = child[i];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                child[i].style.display = "";
            } else {
                child[i].style.display = "none";
            }
        }
    });
});
</script>


{{-- <script>

    $(".edit").on("click", function(){


       var id = $(this).attr("data-id");



      $.ajax({

        url: "{{ route('survey.edit') }}",
         data: {"id": id,"_token": "{{ csrf_token() }}"},
         type: 'post',
        success: function(result)
        {

          $('#exampleModal').modal('show');
          $('#tableContent').html(result.html);
        }
      });
    });
  </script> --}}

{{-- <script>
    $(document).ready(function() {
      datatable = $('#myTable').DataTable({
          ajax:{
            url: "{{ route('survey.dataSource') }}",
            data: function (d) {
              d._token = "{{ csrf_token() }}",
              d.name = $('#name').val(),
              d.division_id = $('#division_id').val()
            },
            dataType: "json",
            type: "POST",
          },
          columns: [
            { data: "id", 'visible':false},
            { data: "division_id", orderable: false},
            { data: "name"},
            { data: "bn_name", orderable: false},
            { data: "lat", orderable: false},
            { data: "lon", orderable: false},
            { data: "url", orderable: false},
            { data: "actions", orderable: false, searchable: false,width: "100px"},
          ],
          autoWidth : true,
          processing: true,
          serverSide: true,
          searching : false,
          scrollY: '70vh',
          sDom: 'rtlipf',
          responsive: true,
          order: [[ 0, "desc" ]],
          aaSorting: [],
          lengthMenu: [[25, 50, 100, 200, -1], [25, 50, 100, 200, "All"]],
          iDisplayLength: 50,
          columnDefs: [
            // { orderable: false, targets: 4 }
            // { "width": "10%", "targets": [1,4] }
          ],
        });

      datatable.columns.adjust().draw();

      $(document).on('change','.filter', function(){
        datatable.draw();
      });

      $(document).on('keyup','.filter', function(){
        datatable.draw();
      });

      $(document).on('blur','.filter', function(){
        datatable.draw();
      });

    });

    </script> --}}




    <script>
        $('#update_confirm').on('submit',function(e){


             e.preventDefault();

            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-Token' : "{{ csrf_token() }}"
                }
            });
            $.ajax({


                url : "{{ url('update.servey') }}",
                type : "post",
                data:$('#update_confirm').serialize(),

                success:function(message)
                {
                    location.reload();
                    // $('#table-item').append(message.html);
                    //  $("#update_confirm").trigger("reset");
                    //  $('#exampleModal').hide();
                    //  $("body").removeClass("modal-open");
                    //  $('.modal-backdrop').hide();




                    Swal.fire(
                     'Update!',
                     'Successfully !',
                    'success'
                   );


                }

            })
        });
    </script>


{{-- <script>

    $(document).ready(function() {



        $(document).on('click','#ProfileEdit',function(){

            var id = $(this).attr("data-id");

            event.preventDefault();
              jQuery.noConflict();

            $.ajax({

                   url: "{{ route('location.view') }}",
                   data: {"id": id,"_token": "{{ csrf_token() }}"},
                   type: 'post',


                success: function(result)
                     {

                       $("#exampleModal").modal('show');
                       $('#tableContent').html(result.html);

                    }
            });

      });
    });



    </script> --}}



 @endpush
