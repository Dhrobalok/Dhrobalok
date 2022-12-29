

<div class="col-md-8 border shadow p-4">


     @php
         $allitem=App\Models\Item::where('user_id',$id)->get();
     @endphp

    <table>


        @foreach ($allitem as $itemid)

           @php
               $itemname=App\Models\Item::where('id',$itemid->id)->first();
           @endphp


                <thead>
                        @php
                            $questionName=App\Models\question::
                             where('user_id',$itemid->user_id)
                            ->where('iteam_id',$itemid->id)
                            ->get();
                        @endphp



                        <tr>
                            <h4 align="center" style="font-weight: bold;">{{$itemname->name}}</h4>
                           <br>

                                @foreach ($questionName as $question)
                                    <th>{{$question->name}}</th>
                                @endforeach


                        </tr>

                </thead>







        <tbody>

            @php
                 $survey_id=App\Models\Surve::select('surve_id')
                        ->where('user_id',$itemid->user_id)
                        ->where('item_id',$itemid->id)
                        ->distinct()
                        ->get();
            @endphp








            @foreach ($survey_id as $surveyid)

              <tr>


                 @php
                         $surveyall=App\Models\Surve::
                          where('user_id',$itemid->user_id)
                          ->where('item_id',$itemid->id)
                          ->where('surve_id',$surveyid->surve_id)

                        ->get();
                 @endphp

                 @foreach ($surveyall as $surveyvalue)
                            @php
                                    $questionID=App\Models\question::
                                    where('id',$surveyvalue->q_id)
                                    ->first();
                            @endphp

                            @if ($questionID)

                               <td>{{$surveyvalue->value}}</td>

                               @else
                               <td>N/a</td>

                            @endif

                 @endforeach



             </tr>

            @endforeach











        </tbody>



 @endforeach




   {{-- Copy Item --}}
            @php
            $copyitem=App\Models\Copyitm::where('user_id',$id)->get();
            @endphp

            @if ($allitem!=null)
               @foreach ( $copyitem as $item)

                    <thead>

                      @php
                        $Copyquestion=App\Models\Copyquestion::
                         where('user_id',$item->user_id)
                        ->where('item_id',$item->item_id)
                        ->get();
                        @endphp

                            @php
                              $itemname=App\Models\Item::where('id',$item->item_id)->first();
                            @endphp

                        <tr>
                            <h4 align="center" style="font-weight: bold;">{{$itemname->name}}</h4>
                         <br>

                                @foreach ($Copyquestion as $question)
                                    <th>{{$question->name}}</th>
                                @endforeach


                        </tr>


                    </thead>


                    <tbody>


                        @php
                            $survey_id=App\Models\Surve::select('surve_id')
                                ->where('user_id',$item->user_id)
                                ->where('item_id',$item->item_id)
                                ->distinct()
                                ->get();
                         @endphp










                   @foreach ($survey_id as $surveyid)

                     <tr>


                        @php
                                $surveyall=App\Models\Surve::
                                 where('user_id',$item->user_id)
                                 ->where('item_id',$item->item_id)
                                 ->where('surve_id',$surveyid->surve_id)

                               ->get();
                        @endphp



                        @foreach ($surveyall as $surveyvalue)
                                   @php
                                           $questionID=App\Models\Copyquestion::
                                           where('id',$surveyvalue->q_id)
                                           ->first();
                                   @endphp

                                   @if ($questionID)

                                      <td>{{$surveyvalue->value}}</td>

                                      @else
                                      <td>N/a</td>

                                   @endif

                        @endforeach



                    </tr>

                   @endforeach









                    </tbody>

               @endforeach





            @endif

    {{-- Copy Item --}}



    </table>






 </div>

