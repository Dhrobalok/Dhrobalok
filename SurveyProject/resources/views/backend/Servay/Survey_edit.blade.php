@extends('backend.Dashboard.servey')
@section('content')


<style>
    .card{
        width: 60%;
    }
</style>


  <section class="row justify-content-center">

    <div class="card shadow p-2" style="background-color: #f3f7f9;">

        <div class="card-header text-center py-1">

            <h4 style="font-family: inherit;">Update {{ucwords($id)}}</h4>

        </div>

           <form action="{{url('update.servey')}}" method="post"  enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="survey_id" value="{{$id}}">

            @foreach ($surve_value as $QuestionId)

               @php
                   $question=App\Models\question::where('id',$QuestionId->q_id)->first();
               @endphp


               @if ( $question->type==2)


                  <div class="row justify-content-start ">

                     <div class="col-md-6">
                           <label style="color:rgb(56, 142, 142);">{{ucwords($question->name)}}</label><span class="text-danger"></span></label>
                     </div>



                  </div>


                  <div class="row form-group justify-content-center">

                    <div class="col-md-12">
                        <input type="hidden" name="q_id[]" value="{{$QuestionId->q_id}}">

                        <input type="file" class="form-control"  name="file[]">
                        <span style="align:center;">{{$QuestionId->value}}</span>

                   </div>

                </div>



                 @else

                 <div class="row justify-content-start">

                    <div class="col-md-6">
                          <label style="color:rgb(56, 142, 142);">{{ucwords($question->name)}}</label><span class="text-danger"></span></label>
                    </div>



                 </div>


                 <div class="row form-group justify-content-center p-2">

                    <div class="col-md-12">
                        <input type="hidden" name="q_id[]" value="{{$QuestionId->q_id}}">

                        <input type="text" class="form-control"  name="value[]" value="{{$QuestionId->value}}">

                   </div>

                </div>


               @endif

           @endforeach


               <div class="row form-group justify-content-center mt-4 py-3">


                    <button  class="btn btn-success" style="width:50%;">Update&nbsp;Survey</button>





               </div>

           </form>

    </div>



  </section>








    @endsection






              {{-- <div class="table-responsive mt-4 p-3">
                <table class="table table-hover"  id="myTable">

                    <thead style="background-color:#6b787f;">
                        <tr>
                            <th style="color: rgb(253, 243, 228);">Survey&nbsp;Id</th>
                          @foreach ($surve_value as $QuestionId)
                             @php
                                 $question=App\Models\question::where('id',$QuestionId->q_id)->first();
                             @endphp

                            <th style="color: rgb(253, 243, 228);">{{ucwords($question->name)}}</th>

                            @endforeach




                        </tr>

                    </thead>



                    <tbody>

                        <tr>
                            <td>{{$id}}</td>
                            <input type="hidden" name="survey_id" value="{{$id}}">
                            @foreach ($surve_value as $allsurve)


                             @php
                                 $type=App\Models\question::where('id',$allsurve->q_id)
                                 ->where('type','=',2)
                                 ->first();

                             @endphp

                             @if ($type)

                             <td style="color: rgb(81, 78, 73); font-family:Arial, Helvetica, sans-serif;font-size:13px;">
                                <div class="d-flex gap-3" style="width:180px !important">
                                 <input type="hidden" name="q_id[]" value="{{$allsurve->q_id}}">
                                <input type="file" class="form-control" name="file[]">
                                </div>

                            </td>


                             @else
                             <td style="color: rgb(81, 78, 73); font-family:Arial, Helvetica, sans-serif;font-size:13px;">
                                <div class="d-flex gap-3" style="width:180px !important">
                                 <input type="hidden" name="q_id[]" value="{{$allsurve->q_id}}">
                                <input type="text" class="form-control" name="value[]" value="{{$allsurve->value }}">
                                </div>

                            </td>

                             @endif











                        @endforeach

                          </tr>




                    </tbody>

                </table>

              </div>

 --}}
