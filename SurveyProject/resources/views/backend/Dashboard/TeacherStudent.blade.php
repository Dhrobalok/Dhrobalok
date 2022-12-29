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


  <div class="card shadow p-4 mt-4">
    <div class="table-responsive mt-4 py-2">

    <table class="table table-hover" id="myTable">

        <thead>

                <th>StudentId</th>
                <th>Name</th>

                <th>Batch</th>
                <th>TeacherName</th>
                <th>SelectSurvey</th>




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
                <td>{{ucwords($users->firstname)}}{{ucwords($users->lastname)}}</td>
                <td>{{$users->batch}}</td>


                @php
                  $item=App\Models\Teacher::where('id',$users->supervisor)->first();
                @endphp
                @if ($item)

                   <td>
                       {{$item->name}}
                  </td>

                  @else
                  <td>N/a</td>

                @endif




                <td class="text-center">

                    <div class="d-flex gap-1" style="width:100% !important">
                        <a href="{{url('Admin.Teachersurveyprint',$users->studentId)}}" style="font-size:12px;" class="btn btn-sm btn-success py-2"><i class="fas fa-print">&nbsp;<span style="font-size:13px;">Print</span></i></a>
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
