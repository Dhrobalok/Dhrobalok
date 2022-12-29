@extends('backend.Dashboard.AdminDashUser')
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

#mytable_filter
{
    float: right !important;
}

#list
{
    width: 340px !important;
}
</style>

 @section('content')

 <div class="col-md-11">

    <div class="card shadow p-2 mt-2">


          <div class="card-body">
            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100 js-dataTable-full" id="mytable">


                  <thead>

                          <th>Sl No.</th>
                          <th>Student&nbsp;Name</th>

                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Course</th>

                          <th>Action</th>

                  </thead>

                  @php
                      $i=1;
                  @endphp

                  <tbody>
                       @foreach ($allseminar as $allseminars)
                        <tr>

                             <td>{{$i++}}</td>
                             <td>{{ucwords($allseminars->name)}}</td>
                             <td>{{$allseminars->email}}</td>
                             <td>{{$allseminars->mobile}}</td>

                             @php
                                 $seminar=App\Models\Upcomingcourse::where('id',$allseminars->course_id)->first();
                             @endphp

                             @if ($seminar)

                                <td>{{ucwords($seminar->name)}}</td>


                                @else

                                <td>N/a</td>

                             @endif

                             <td>
                                @can('delete')

                                   <a href="{{route('UserSeminar',$allseminars->id)}}" class=" btn-sm btn-danger"><i class="fas fa-times"></i>&nbsp;Delete</a>
                                @endcan
                             </td>

                       </tr>

                       @endforeach

                  </tbody>


                  <div>

             </table>

          </div>



    </div>
</div>

</div>
 @endsection
