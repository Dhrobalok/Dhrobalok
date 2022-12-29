
@php
    $name=App\Models\Item::where('id',$iteam_id)->first();
@endphp
<h2>{{$name->name}}&nbsp;Report</h2>

<table>

    <thead>
        <tr>
            <th>Survey&nbsp;Id</th>
            @foreach ($questionName as $name)

            <th>{{ucwords($name->name)}}</th>

            @endforeach




        </tr>

    </thead>



    <tbody>

        @foreach ($userId as $allsurve)

           @php
               $SurveyId=App\Models\Survetotal::select('servey_id')->where('user_id',$allsurve->user_id)

               ->where('item_id',$iteam_id)
               ->get();
           @endphp

             @foreach ( $SurveyId as  $Surveyids)


             <tr>

                <td>
                    {{$Surveyids->servey_id}}

                </td>






                 @foreach ($questionName as $allquestion)


                  @php
                    $surveInform=App\Models\Surve::where('surve_id',$Surveyids->servey_id)
                    ->where('user_id',$allsurve->user_id)
                    ->where('q_id',$allquestion->id)
                    ->first();
                  @endphp






                 @if($surveInform)

                            @if ($allquestion->type==2)


                                <td>

                                    <a href="{{route('file.download',$surveInform->id)}}"><i class="fas fa-download">&nbsp;Download</i></a>


                                </td>


                             @else


                             <td>

                                <p href="" class="update" data-name="name" data-type="text" data-pk="{{ $surveInform->id }}" data-title="Enter name" style="text-decoration: none; color:rgb(23, 27, 27);">{{$surveInform->value}}
                                </p>



                             </td>


                            @endif





                 @else


                 <td>

                    N/A
                </td>



                 @endif










                  @endforeach






              </tr>

             @endforeach


          @endforeach



    </tbody>

</table>
