
@extends('backend.Dashboard.Master')


@section('content')

<style>
    #myTable th
{
    color:rgb(250, 235, 235);
font-size:14px;
line-height: 14px;
text-transform:capitalize;
font-weight: 400px !important;
width: 20px !important;
background-color: rgb(133, 127, 120)
}

.modal-content
{
    margin-top: 10px !important;
}

.editable-click, a.editable-click, a.editable-click:hover {
    text-decoration: none !important;
    border-bottom: none !important;
}

.form-control-sm {
    min-height: calc(1.5em + 0.7rem + 2px);
    padding: 0.2rem 0.9rem !important;
    font-size: 1.0rem !important;
    border-radius: 0.35rem !important;
}

body
{
    overflow-x: hidden;
}
</style>

@php

 $allitem=App\Models\Item::orderBy('id','desc')->get();
@endphp


@if( Session::has("delete") )
<script>
   Swal.fire({
     icon: 'success',
     title: 'Survey Delete Successfully',

     })



</script>



@endif

<div class="card shadow mt-3 p-4">
    <div class="table-responsiv mt-4">

        <table class="table table-hover" id="myTable">

            <thead style="background-color:#5a5752;">
                <tr>
                <th>No</th>
                <th>Suervy&nbsp;Title</th>
                <th>Key&nbsp;Word</th>
                <th>Total&nbsp;Question</th>
                <th>Modified&nbsp;Date</th>
                <th>Action</th>

                </tr>

            </thead>

            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($allitem as $item)




                @php
                      $itemName=App\Models\Surve::where('item_id',$item->id)

                      ->orderBy('created_at','desc')
                     ->first();
                @endphp

                   @php
                      $allquestion=App\Models\question::where('iteam_id',$item->id)

                     ->get();
                @endphp
                <tr>

                    <td>
                        {{$i++}}

                    </td>

                    <td>


                           <a href="" class="update" data-name="name" data-type="text" style="text-decoration: none; color:rgb(23, 27, 27);">{{ ucwords($item->name)}}</a>
                            <br>
                           <p>
                            <span>Created&nbsp;:&nbsp;{{$item->created_at->format('m-d-y')}}</span>
                          </p>


                    </td>

                    <td>{{$item->keyword}}</td>

                    <td class="text-center">
                        {{count($allquestion)}}

                    </td>


                    @if ($itemName)
                    <td class="p-2">
                        <p>{{$itemName->created_at->format('m-d-y')}}</p>

                    </td>

                    @else
                    <td class="p-2">
                        <p> Not Modify</p>

                    </td>

                    @endif




                    <td>
                        <div class="d-flex gap-1" style="width:100% !important">
                        <a href="{{url('Admin.view.survey',$item->id)}}"  style="text-decoration: none; font-size:12px; " class="btn btn-sm btn-primary"><i class="fas fa-eye">&nbsp;<span style="font-size:13px;">View</span></i></a>
                        <a href="{{url('Admin.survey.print',$item->id)}}" style="font-size:12px;" class="btn btn-sm btn-success"><i class="fas fa-print">&nbsp;<span style="font-size:13px;">Print</span></i></a>
                        <a  href="{{ url('Admin.delete.survey',$item->id) }}" style="font-size:12px;" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-times" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>
                      </div>
                    </td>


                </tr>




                @endforeach





        </tbody>
        </table>

    </div>

</div>


@endsection
@push('js')
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endpush
