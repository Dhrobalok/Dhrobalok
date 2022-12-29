

 @foreach ($questions as $questions)
 <tr>


 @if ($questions->type==1)
    @php
       $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

    @endphp
    <input type="hidden" name="iteam_id" value="{{$itemId}}">

     <td><label>&nbsp;&nbsp;&nbsp;{{ucwords($questions->name)}}<span class = "text-danger"></span></label></td>

       {{-- @if ($SurveVALUE)

       <td style="width: 100%">
         <input type="hidden" name="q_id[]" value="{{$questions->id}}">
         <input type= "text" class="form-control"  name="Q_value[]" value="{{$SurveVALUE->value}}">
       </td>

       @else --}}

       <td style="width: 100%">
         <input type="hidden" name="q_id[]" value="{{$questions->id}}">
         <input type= "text" class="form-control"  name="Q_value[]" required>
       </td>



       {{-- @endif --}}


     <td>
         <a href="javascript:void(0);" class="delete" data-id="{{ $questions->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>



 @elseif ($questions->type==2)
   @php
    $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

    @endphp

   <input type="hidden" name="iteam_id" value="{{$itemId}}">

     <td><label>&nbsp;&nbsp;&nbsp;{{ucwords($questions->name)}}<span class = "text-danger"></span></label></td>
     {{-- @if ($SurveVALUE)

     <td>
         <input type="hidden" name="q_id[]" value="{{$questions->id}}">
         <input type= "file" class="form-control"  name="image[]">
         <span>{{$SurveVALUE->value}}</span>
     </td>

     @else --}}

     <td>
         <input type="hidden" name="q_id[]" value="{{$questions->id}}">
         <input type= "file" class="form-control"  name="file[]">
     </td>


     {{-- @endif --}}


     <td>
         <a href="javascript:void(0);" class="delete" data-id="{{ $questions->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>


 @elseif ($questions->type==3)

   @php
       $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

     @endphp

<input type="hidden" name="iteam_id" value="{{$itemId}}">

     <td><label>&nbsp;&nbsp;&nbsp;{{ucwords($questions->name)}}<span class = "text-danger"></span></label></td>

      {{-- @if ($SurveVALUE)

      <td>
         <input type="hidden" name="q_id[]" value="{{$questions->id}}">
         <input type= "date" class="form-control"  name="Q_value[]" value="{{$SurveVALUE->value}}" >
     </td>

     @else --}}

     <td>
         <input type="hidden" name="q_id[]" value="{{$questions->id}}">
         <input type= "date" class="form-control"  name="Q_value[]"   required>
     </td>

      {{-- @endif --}}

     <td>
         <a href="javascript:void(0);" class="delete" data-id="{{ $questions->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>



 @elseif ($questions->type==4)

     @php
        $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

      @endphp

<input type="hidden" name="iteam_id" value="{{$itemId}}">
     <td><label>&nbsp;&nbsp;&nbsp;{{ucwords($questions->name)}}<span class = "text-danger"></span></label></td>

       {{-- @if ($SurveVALUE)

       <td style="width: 100%">
         <input type="hidden" name="q_id[]" value="{{$questions->id}}">
         <input type="text" class="form-control" value="{{$SurveVALUE->value}}" >

       </td>

       @else --}}

       <td style="width: 100%">
         <input type="hidden" name="q_id[]" value="{{$questions->id}}">
         <textarea  id="" name="Q_value[]" class="form-control"></textarea>
       </td>


       {{-- @endif --}}

     <td>
         <a href="javascript:void(0);" class="delete" data-id="{{ $questions->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>


 @elseif ($questions->type==5)

 <input type="hidden" name="iteam_id" value="{{$itemId}}">
   <input type="hidden" name="q_id[]" value="{{$questions->id}}">
      @php
         // $name=App\Models\question('id',$questions->id)->first();
         $questionAll=App\Models\Checkboxe::where('q_id',$questions->id)->get();
         $CheckboxVal=App\Models\Surve::where('q_id',$questions->id)->where('item_id',$itemId)->first();

      @endphp





     <td class="head"><label>{{ucwords($questions->name)}}<span class = "text-danger"></span></label></td>


       {{-- @if ($CheckboxVal)

           <td>
            <input type="checkbox" name="Q_value[]" value="{{$CheckboxVal->value}}" checked><span>&nbsp;{{ucwords($CheckboxVal->value)}}</span>
           </td>


       @else --}}

       <td style="width: 80%;">

       @foreach ( $questionAll as $question)

         {{-- @php
            $checkbox=App\Models\Checkboxe::where('q_id',$question->q_id)->get();

         @endphp --}}


          @if ($question->name)

             <input type="checkbox" name="Q_value[]" value="{{$question->name}}"><span>&nbsp;{{ucwords($question->name)}}</span>


           @endif

        @endforeach

       </td>





     <td>
         <a  class="delete"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>



 @endif
 </tr>
@endforeach



{{-- @foreach ($questions as $question)
<tr>

@if ($question->type==1)
<input type="hidden" name="iteam_id" value="{{$itemId}}">
    <td><label>&nbsp;&nbsp;&nbsp;{{ucwords($question->name)}}<span class = "text-danger"></span></label></td>
    <td>
        <input type="hidden" name="q_id[]" value="{{$question->id}}">
        <input type= "text" class="form-control"  name="Q_value[]"  required>
    </td>
    <td>
        <a href="javascript:void(0);" class="delete" data-id="{{ $question->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
    </td>



@elseif ($question->type==2)
<input type="hidden" name="iteam_id" value="{{$itemId}}">
    <td><label>&nbsp;&nbsp;&nbsp;{{ucwords($question->name)}}<span class = "text-danger"></span></label></td>
    <td>
        <input type="hidden" name="q_id[]" value="{{$question->id}}">
        <input type= "file" class="form-control"  name="Q_value[]"  required>
    </td>
    <td>
        <a href="javascript:void(0);" class="delete" data-id="{{ $question->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
    </td>


@elseif ($question->type==3)
<input type="hidden" name="iteam_id" value="{{$itemId}}">
    <td><label>&nbsp;&nbsp;&nbsp;{{ucwords($question->name)}}<span class = "text-danger"></span></label></td>
    <td>
        <input type="hidden" name="q_id[]" value="{{$question->id}}">
        <input type= "date" class="form-control"  name="Q_value[]"  required>
    </td>
    <td>
        <a href="javascript:void(0);" class="delete" data-id="{{ $question->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
    </td>


@elseif ($question->type==4)

<input type="hidden" name="iteam_id" value="{{$itemId}}">
    <td><label>&nbsp;&nbsp;&nbsp;{{ucwords($question->name)}}<span class = "text-danger"></span></label></td>
    <td>
        <input type="hidden" name="q_id[]" value="{{$question->id}}">
        <textarea  id="" name="Q_value[]" class="form-control"></textarea>
    </td>
    <td>
        <a href="javascript:void(0);" class="delete" data-id="{{ $question->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
    </td>


@elseif ($question->type==5)
<input type="hidden" name="q_id[]" value="{{$question->id}}">

<input type="hidden" name="iteam_id" value="{{$itemId}}">
     @php
        // $name=App\Models\question('id',$questions->id)->first();
        $questionAll=App\Models\Checkboxe::where('q_id',$question->id)->distinct()->get();

     @endphp



    <td><label>{{ucwords($question->name)}}<span class = "text-danger"></span></label></td>
    <td>
     @foreach ( $questionAll as $questions)

             @if ($question->name !=Null)


                     <input type="checkbox" name="Q_value[]" value="{{$questions->name}}"><span>&nbsp;{{ucwords($questions->name)}}</span>
             @endif

     @endforeach

    </td>

    <td>
        <a href="javascript:void(0);" class="delete" data-id="{{ $question->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
    </td>

@endif

</tr>

@endforeach --}}
