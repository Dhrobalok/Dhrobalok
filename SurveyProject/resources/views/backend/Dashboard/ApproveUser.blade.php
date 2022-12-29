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
</style>



        @if( Session::has("approve") )
        <script>
            Swal.fire({
              icon: 'success',
              title: 'Approved Successfully',

              })

         </script>



        @endif


        @if( Session::has("delete") )
        <script>
           Swal.fire({
             icon: 'success',
             title: 'User Deleted',

             })


        </script>
        @endif

               <div class="card shadow mt-4 p-4">
                <div class="table-responsive mt-4 py-2">

                <table class="table table-hover" id="myTable">

                    <thead>

                            <th>StudentId</th>
                            <th>Name</th>

                            <th>Batch</th>
                            <th>Status</th>
                            <th>Survey&nbsp;Allocation</th>
                            <th></th>


                    </thead>

                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($user as $users)
                        <tr>


                            <td>
                                {{$users->studentId}}

                            </td>
                            <td>{{ucwords($users->firstname)}}{{ucwords($users->Haque)}}</td>
                            <td>{{$users->batch}}</td>

                            @if ($users->status==1)
                            <td >

                                <span class="badge badge-success" style="font-size: 15px;">Active</span>

                            </td>

                            @else
                             <td>

                                <span class="badge badge-danger" style="font-size: 15px;">Inactive</span>


                             </td>



                            @endif

                            @php
                              $item=App\Models\Copyitm::where('user_id',$users->studentId)->first();
                            @endphp
                            @if ($item)
                              @php
                                  $itemName=App\Models\Item::where('id',$item->item_id)->first();
                              @endphp
                               <td>
                                   {{$itemName->name}}
                              </td>

                              @else
                              <td>N/a</td>

                            @endif




                            <td class="text-center">

                                <div class="d-flex gap-1" style="width:100% !important">
                                    <a href="{{ url('useraprove',$users->id) }}"> <button type="button" class="btn btn-primary btn-sm p-1 m-0"> <i class="fa fa-plus">&nbsp;Active</i></button></a>

                                    <a href="{{ url('user.delete',$users->id) }}"><button type="button" class="btn btn-danger btn-sm p-1 m-0"><i class="fa fa-ban" aria-hidden="true">&nbsp;Inactive</i></button></a>
                                    <a href="{{ url('SurveyAllocation',$users->studentId) }}"><button type="button" class="btn btn-danger btn-sm p-1 m-0"><i class="fa fa-tasks" aria-hidden="true">&nbsp;Survey&nbsp;Allocation</i></button></a>
                                    <a href="{{ url('Edit.Survey',$users->studentId) }}"><button type="button" class="btn btn-danger btn-sm p-1 m-0"><i class="fa fa-edit" aria-hidden="true">&nbsp;Edit&nbsp;Survey</i></button></a>
                                </div>

                                {{-- <a href="{{ url('useraprove',$users->id) }}><button type="button" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus">&nbsp;Approve</i></button></a> --}}

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
