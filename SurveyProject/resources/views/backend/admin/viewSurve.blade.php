@extends('backend.Dashboard.Master')

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

                            <th style="color: rgb(253, 243, 228);">
                                Action
                             </th>


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


                                             <td style="color: rgb(81, 78, 73); font-family:Arial, Helvetica, sans-serif;font-size:13px;">

                                                <p href="" class="update" data-name="name" data-type="text" data-pk="{{ $surveInform->id }}" data-title="Enter name" style="text-decoration: none; color:rgb(23, 27, 27);">{{$surveInform->value}}
                                                </p>



                                             </td>


                                            @endif





                                 @else


                                 <td style="color: rgb(81, 78, 73); font-family:Arial, Helvetica, sans-serif;font-size:13px;">

                                    N/A
                                </td>



                                 @endif










                                  @endforeach




                                  <td>
                                    <div class="d-flex gap-1" style="width:100% !important">

                                        {{-- <button id="{{$surveyall->id}}" class="btn btn-sm btn-primary py-2"><i class="fas fa-edit"></i></button> --}}
                                        {{-- <a href="{{url('view.survey',$surveyall->id)}}"  style="text-decoration: none;" class="btn btn-sm btn-primary py-2"><i class="fas fa-eye"></i></a> --}}
                                        {{-- <a href="{{url('Admin.survey.view',$Surveyids->servey_id)}}"  style="text-decoration: none; font-size:12px; " class="btn btn-sm btn-primary py-2"><i class="fas fa-eye">&nbsp;<span style="font-size:13px;">View</span></i></a> --}}
                                        <a href="{{url('Admin.surveyprint',$Surveyids->servey_id)}}" style="font-size:12px;" class="btn btn-sm btn-success py-2"><i class="fas fa-print">&nbsp;<span style="font-size:13px;">Print</span></i></a>
                                        <a  href="{{ url('Admin.survey.delete',$Surveyids->servey_id) }}" style="font-size:12px;" class="btn btn-sm btn-danger py-2" onclick="return confirm('Are you sure?')"><i class="fas fa-trash" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>
                                       </div>
                                    </td>




                              </tr>

                             @endforeach


                          @endforeach



                    </tbody>

                </table>

              </div>

          </div>

     </div>

     @endsection
