@extends('backend.Dashboard.AdminDashUser')

@section('css')

<style>
    #mytable th
    {
        color:rgb(250, 235, 235);
    font-size:15px;
    line-height: 10px;
    text-transform:capitalize;
    font-weight: 400px !important;
    width: 20px !important;
    background-color: rgb(129, 152, 212)
    }

/* .table-responsive
{
    overflow-x: hidden !important;
} */

#myTable_filter
{
    float: right !important;
}

#list
{
    width: 340px !important;
}
</style>

@endsection

@php
    $i=1;
@endphp
 @section('content')

        <div class="col-md-11">

             <div class="card shadow p-3">
                @can('add')
                        <div align="right">

                <a class="btn btn-primary btn-sm" id = "decline_btn"
                href="{{url('client.save')}}">
                Client Image</a>

                        </div>

                @endcan

                  <div class="card-body">
                    <div class="table-responsive-sm mt-2">



                        <table class="table table-striped js-dataTable-full" id="mytable">

                             <thead>
                                 <tr>
                                   <th>Id</th>
                                   <th>Slider Image</th>
                                   <th>Action</th>

                                 </tr>
                             </thead>


                             <tbody>
                               @foreach ($allclient as $client)
                                   <tr>
                                       <td>{{$i++}}</td>
                                       <td><img src="{{URL::to($client->image)}}" width="40" height="40" alt=""></td>

                                       <td>
                                            <div class="d-flex">
                                               @can('delete')
                                               <a href="{{route('delete.slider',$client->id)}}" class="btn-danger btn-sm active" onclick="return confirm('Are you sure?')"><i class="fas fa-times"></i>&nbsp;Delete</a>

                                               @endcan



                                            </div>

                                       </td>
                                   </tr>

                               @endforeach

                             </tbody>

                        </table>

                    </div>

                  </div>



             </div>

        </div>



 @endsection










