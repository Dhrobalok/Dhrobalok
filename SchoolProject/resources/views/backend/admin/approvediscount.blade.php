@extends('backend.Dashboard.AdminDashUser')
<style>
    #myTable th
    {
        color:rgb(250, 235, 235);
    font-size:15px;
    line-height: 10px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;
    background-color: rgb(129, 152, 212)
    }
    .form-control
    {
        display: block;
        width:100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }


    #myTable2 th
    {
        color:rgb(250, 235, 235);
    font-size:15px;
    line-height: 22px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;
    background-color: rgb(129, 152, 212)
    }

    #myTable2 td
    {
        color:rgb(25, 19, 19);
    font-size:15px;
    line-height: 20px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;

    }


    #myTable3 th
    {
        color:rgb(250, 235, 235);
    font-size:15px;
    line-height: 22px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;
    background-color: rgb(129, 152, 212)
    }

    #myTable3 td
    {
        color:rgb(25, 19, 19);
    font-size:15px;
    line-height: 20px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;

    }


/* .table-responsive
{
    overflow-x: hidden !important;
} */

#myTable_filter
{
    float: right !important;
}


    .select2-container--default
    .select2-selection--multiple
    .select2-selection__choice
     {
    background-color: #081824 !important;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
    /* z-index: 9999 !important; */
}

#list
{
    width: 350px !important;
}

#exampleModal6
{
    width: 120% !important;
}


</style>

@section('content')

@php
    $i=1
@endphp

<div class="col-md-11">

    <div class="card shadow p-2 mt-2">

           <div class="card-header">

                 <h4>Approve Discount</h4>

           </div>



        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">

                <table class="table table-hover table-striped mt-2 w-100" id="myTable">

                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Course&nbsp;Name</th>
                            <th>User&nbsp;Name</th>
                            <th>Discount</th>
                            <th>Special&nbsp;Discount</th>

                        </tr>
                    </thead>


                    <tbody>

                        @foreach ($alldiscount as $discountall)



                        <tr>
                            <td>
                                {{$i++}}
                            </td>

                            @if ($discountall->discount_course)

                                <td>
                                    {{ucwords($discountall->discount_course->name)}}
                                </td>

                              @else

                               <td>N/A</td>

                            @endif


                            @if ($discountall->discount_user)

                                <td>{{ucwords($discountall->discount_user->name)}}</td>


                             @else

                               <td>N/A</td>

                            @endif



                            @if ($discountall->active==1)

                                <td class="cancel" id="{{$discountall->id}}">
                                    {{-- <span style="color:red;">Approved</span> --}}

                                    <a type="button" class="Canceldiscount" data-id="1">Cancel</a>&nbsp;


                                    {{-- CancelDiscount<input type="checkbox" name="discount" value="1" class="Canceldiscount"> --}}

                                </td>


                             @else

                                <td class="offer" id="{{$discountall->id}}">
                                    {{$discountall->discount}}%&nbsp;

                                    <a type="button" data-id="1" class="discount"><i class="fas fa-check-square"></i></a>
                                    {{-- <input type="checkbox" name="discount" value="1" class="discount"> --}}


                                </td>


                            @endif


                            @if ($discountall->s_active==1)

                                    <td class="cancel" id="{{$discountall->id}}">
                                        {{-- <span style="color:red;">Approved</span> --}}

                                        <a type="button" class="Canceldiscount" data-id="2">Cancel</a>&nbsp;
                                        {{-- <a type="button" class="edit" data-id="2"><i class="fas fa-pen"></i></a> --}}


                                    </td>
                             @else

                             <td class="offer" id="{{$discountall->id}}">

                                {{$discountall->special}}%&nbsp;

                                <a type="button" data-id="2" class="discount"><i class="fas fa-check-square"></i></a>
                                {{-- <input type="checkbox" value="2" name="special" class="discount"> --}}

                                <a type="button" class="edit" data-id="2"><i class="fas fa-pen"></i></a>

                            </td>

                            @endif



                            {{-- @if ($discountall->active==0)

                                    <td>

                                        <a type="button" data-id="{{$discountall->id}}" class="btn btn-sm btn-info aproveConfirm">ApproveConfirm</a>


                                    </td>


                             @else

                                <td>
                                    <span style="color:red">Approved</span>
                                </td>

                            @endif --}}


                        </tr>

                        @endforeach
                    </tbody>


                </table>



            </div>


        </div>

    </div>


 </div>



    {{-- Special Discount --}}

    <div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <center><h4 style="color:red">Update Special Discount</h4></center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body border shadow">

            <form action="{{route('specialDiscount.update')}}" method="post">

                @csrf

                <div id="special">

                </div>




                <div class="row justify-content-center">

                    <button class="btn btn-primary">Update</button>

               </div>

            </form>



        ...
        </div>

        </div>
        </div>
        </div>



 @endsection


 @push('js')


 <script>
    $(document).ready(function ()
    {

        $(document).on('click','.discount',function()
            {




                const val=$(this).parent().closest('.offer').attr('id');
                 const id = $(this).attr("data-id");
                //  const id = $(this).val();








                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('aproveconfirm') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            val : val,



                        },
                        dataType:'json',


                      success: function(response)
                       {

                            location.reload();


                       }
               });

            });


    });
 </script>



<script>
    $(document).ready(function ()
    {

        $(document).on('click','.Canceldiscount',function()
            {




                const val=$(this).parent().closest('.cancel').attr('id');
                 const id = $(this).attr("data-id");









                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('aprovecancel') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            val : val,



                        },
                        dataType:'json',


                      success: function(response)
                       {

                            location.reload();


                       }
               });

            });


    });
 </script>


<script>
    $(document).ready(function ()
    {

        $(document).on('click','.edit',function()
            {




                const val=$(this).parent().closest('.offer').attr('id');
                 const id = $(this).attr("data-id");









                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('editspecial') }}",
                        type : "get",
                        data :
                        {
                            id : id,
                            val : val,



                        },
                        dataType:'json',


                      success: function(response)
                       {

                        $('#special').append(response.html);

                        $("#exampleModal7").modal('show');


                       }
               });

            });


    });
 </script>


<script>
    function myFunction2()
    {
      location.reload();
    }
    </script>

 @endpush
