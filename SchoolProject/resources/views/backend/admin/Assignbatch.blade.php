


@php
    $i=1;
@endphp


<div class="table-responsive-sm p-0 m-0">

    <table class="table table-sm table-hover" id="myTable3">


        <thead>
            <tr>
                <th>Id</th>
                <th>Course&nbsp;Name</th>
                <th>Remaining&nbsp;seat</th>
                <th>Time</th>
                <th>Day</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

            @foreach ($alltime as $time)

            <tr>

                <td>{{$i++}}</td>
               @if ($time->usertime_id)



                  <td>{{$time->usertime_id->name}}</td>
                  @else

                  <td>N/A</td>

               @endif

               @php
                   $total=App\Models\Courseenroll::where('course',$time->course_id)
                   ->where('batch',$time->batch)
                   ->get();

                   $batch_seat=App\Models\Batch::where('course_id',$time->course_id)
                   ->where('batch_number',$time->batch)
                   ->first();

                   $totalseat=count($total);
               @endphp

               @if ($batch_seat)
                   <td>{{$batch_seat->seat-$totalseat}}</td>

               @else

                  <td>N/A</td>

               @endif




                <td>{{$time->time}}</td>
                <td>{{$time->day}}</td>


                @if ($time->active==0)

                  @can('add')
                    <td class="assignbatch" id="{{$time->course_id}}">
                      <a type="button" data-id="{{$time->id}}" class="btn btn-sm btn-secondary assignConfirm">Assign</a>

                    </td>

                  @endcan


                @else

                   <td><span><i class="fas fa-check-square" style="color: red;font-size:22px;"></i></span></td>

                @endif




            </tr>
            @endforeach





        </tbody>

     </table>




</div>

