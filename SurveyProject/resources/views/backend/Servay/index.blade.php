@extends('backend.Dashboard.servey')

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

.modal-content
{
    margin-top: 10px !important;
}

.editable-click, a.editable-click, a.editable-click:hover {
    text-decoration: none !important;
    border-bottom: none !important;
}
#myTable th
{
color:rgb(250, 235, 235);
font-size:15px;
line-height: 14px;
text-transform:capitalize;
font-weight: 400px !important;
width: 20px !important;
background-color: rgb(98, 104, 98)
}

/* .image
{
     background-image:url('images/DNA-AdobeStock_banner.webp');
    opacity: 1.2;
    height: 50%;
     width: 100%;
} */


</style>
@section('content')

<div class="image">
    <div class="card shadow mt-5" >

        <div class="card-body">

            @if( Session::has("delete") )
            <script>
               Swal.fire({
                 icon: 'success',
                 title: 'Survey Delete !',

                 })

            </script>


           @endif


           @if( Session::has("update") )
           <script>
              Swal.fire({
                icon: 'success',
                title: 'Title Updated !',

                })

           </script>


          @endif

         <div class="table-responsive">


            @php
                $user_id=Session::get('user_id');
                $itemid=App\Models\Copyitm::where('user_id',$user_id)->get();


            @endphp


            <table class="table table-hover" id="myTable">

                <thead style="background-color:#051016;">
                    <tr>
                    <th>No</th>
                    <th>Suervy&nbsp;Title</th>
                    <th>Key&nbsp;Word</th>
                    <th>Modified&nbsp;Date</th>
                    <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($itemid as $item)
                    @php
                        $iteamname=App\Models\Item::where('id',$item->item_id)
                         ->orderBy('id','desc')
                        ->first();
                    @endphp



                    @php
                          $itemName=App\Models\Surve::
                          where('item_id',$item->item_id)
                          ->where('user_id',$user_id)
                          ->orderBy('created_at','desc')
                         ->first();
                    @endphp
                    <tr>

                        <td>
                            {{$i++}}

                        </td>

                        @if ($iteamname)

                          <td>


                               <a href="" class="update" data-name="name" data-type="text" data-pk="{{ $iteamname->id }}" data-title="Enter name" style="text-decoration: none; color:rgb(23, 27, 27);">{{ ucwords($iteamname->name)}}</a>
                                <br>
                               <p>
                                <span>Created&nbsp;:&nbsp;{{$iteamname->created_at->format('m-d-y')}}</span>
                              </p>



                            </td>

                            <td>
                                {{ucwords($iteamname->keyword)}}
                            </td>


                         @else
                            <td>
                                0
                            </td>

                            <td>
                                0
                            </td>

                             @endif










                        @if ($itemName)
                        <td class="p-2">
                            <p>{{$itemName->created_at->format('m-d-y')}}</p>

                        </td>

                        @else
                        <td class="p-2">
                            <p> Not Modify</p>

                        </td>

                        @endif




                        <td>
                            <div class="d-flex gap-1" style="width:100% !important">

                            {{-- <button id="{{$surveyall->id}}" class="btn btn-sm btn-primary py-2"><i class="fas fa-edit"></i></button> --}}
                            {{-- <a href="{{url('view.survey',$surveyall->id)}}"  style="text-decoration: none;" class="btn btn-sm btn-primary py-2"><i class="fas fa-eye"></i></a> --}}
                            <a href="{{url('view.survey',$item->item_id)}}"  style="text-decoration: none; font-size:12px; " class="btn btn-sm btn-primary py-2"><i class="fas fa-eye">&nbsp;<span style="font-size:13px;">View</span></i></a>
                            <a href="{{url('survey.print',$item->item_id)}}" style="font-size:12px;" class="btn btn-sm btn-success py-2"><i class="fas fa-print">&nbsp;<span style="font-size:13px;">Print</span></i></a>
                            {{-- <a  href="{{ url('delete.survey',$item->item_id) }}" style="font-size:12px;" class="btn btn-sm btn-danger py-2" onclick="return confirm('Are you sure?')"><i class="fas fa-trash" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a> --}}
                          </div>
                        </td>


                    </tr>




                    @endforeach


                    @php
                    $user_id=Session::get('user_id');
                    $itemId=App\Models\Item::where('user_id',$user_id)->orderBy('created_at','desc')->get();


                    @endphp







                     @if ( $itemId !='[]')


                     @foreach ( $itemId as $items)

                     @php
                     $itemDate=App\Models\Surve::
                     where('item_id',$items->id)
                     ->where('user_id',$user_id)


                    ->first();
                    @endphp







                     <tr>

                        <td>
                            {{$i++}}


                        </td>

                        <td>


                               {{$items->name}}
                                <br>
                               <p>
                                <span>Created&nbsp;:&nbsp;{{$items->created_at->format('m-d-y')}}</span>
                              </p>


                        </td>

                        <td>
                            {{ucwords($items->keyword)}}
                        </td>


                        @if ($itemDate)
                        <td class="p-2">

                            {{ $itemDate->created_at->format('m-d-y')}}

                        </td>

                        @else
                        <td class="p-2">

                             Not Modify

                        </td>

                        @endif




                        <td>
                            <div class="d-flex gap-1" style="width:100% !important">
                            {{-- <button id="{{$surveyall->id}}" class="btn btn-sm btn-primary py-2"><i class="fas fa-edit"></i></button> --}}
                            {{-- <a href="{{url('view.survey',$surveyall->id)}}"  style="text-decoration: none;" class="btn btn-sm btn-primary py-2"><i class="fas fa-eye"></i></a> --}}
                            <a href="{{url('view.survey',$items->id)}}"  style="text-decoration: none; font-size:12px;" class="btn btn-sm btn-primary py-2"><i class="fas fa-eye">&nbsp;<span style="font-size:13px;">View</span></i></a>
                            <a href="{{url('survey.print',$items->id)}}" style="font-size:12px;" class="btn btn-sm btn-success py-2"><i class="fas fa-print">&nbsp;<span style="font-size:13px;">Print</span></i></a>
                            {{-- <a  href="{{ url('delete.survey',$items->id) }}" style=" font-size:12px;" class="btn btn-sm btn-danger py-2" onclick="return confirm('Are you sure?')"><i class="fas fa-trash" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a> --}}
                            <div>
                        </td>


                    </tr>




                    @endforeach


                 @endif




                </tbody>

            </table>




          </div>




        </div>




    </div>



</div>









    <!----  inline edit  --->

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    {{-- <script>$.fn.poshytip={defaults:null}</script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
    <!-- Inline update -->

<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    $('.update').editable({
           url: "{{ route('title.update') }}",
           type: 'text',
           pk: 1,
           name: 'name',
           title: 'Enter name'
    });
</script>

<script>
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>

@endsection

 @push('js')

{{-- <script>

$(document).on('click','button',function(e){


var item_id=this.id;


e.preventDefault();

$.ajax({

url: "{{ route('edit.form') }}",
type: "post",
data: {
 item_id : item_id,
 _token:     '{{ csrf_token() }}'
},
success: function (response) {

    $('#html-content').html(response.html);
    $('#decline').modal('show');
   // You will get response from your PHP page (what you echo or print)
},
error: function(jqXHR, textStatus, errorThrown) {
   console.log(textStatus, errorThrown);
}
});


});



</script> --}}

<script>
    $('#decline_confirm').on('submit',function(e){



         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url : "{{ url('Iteam.Update') }}",
            type : "post",
            data:$('#decline_confirm').serialize(),

            success:function(message)
            {

                Swal.fire(
                 'Survey Item!',
                 'Successfully Saved!',
                'success'
               );

                $('#decline').modal('hide');
            // //    $('#d2').html('html');
            }

        })
    });
</script>
{{-- <script>
    $(document).on('click','a',function(){


          var data=this.id;
          alert(data)

         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({

            url : "{{ route('item.update') }}",
            type : "POST",
            data: {id:data},
            // data:$('#decline_confirm').serialize(),

            success:function(message)
            {

                Swal.fire(
                 'Question!',
                 'Successfully Saved!',
                'success'
               );
               $('#decline').modal('hide');
            // //    $('#decline_btn').text('Office Save');
            }

        })
    });
</script> --}}

{{-- <script>
    $(document).on('click', 'a', function ()
    {
    alert(this.id);
   });
</script> --}}

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>





@endpush



