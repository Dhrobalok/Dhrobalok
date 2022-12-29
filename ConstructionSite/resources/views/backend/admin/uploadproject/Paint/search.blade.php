@extends('backend.admin.userdashboard.master')


{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="jquery.counterup.min.js"></script> --}}

@section('content')

<div class="row justify-content-center">

    <div class="col-md-3">

    </div>


    <div class="col-md-5" style="padding: 80px;">

        <div class="card" id="card1">

            <div class="card-header">
                <h5 style="text-align: center;">Search Paint</h5>
              <form action="{{ url('paint.location') }}" method="POST" id="form-submit">
                    @csrf

                    <div class="py-2">
                        <select name="city" id="address" class="form-control">
                            <option value="">Select City</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Mymensingh">Mymensingh</option>
                         </select>

                    </div>

                    <div class="py-2" >

                        <select name="adress" id="adress_details" class="form-control" >
                         <option value="">Please Select Location</option>


                        </select>

                    </div>



                <div class="text-center">
                    <button class="btn btn-primary" id="btnFetch">Search</button>
                </div>

             </form>

            </div>


        </div>


    </div>


    <div class="col-md-2">

    </div>



    @php
    $allLogo=App\Models\Logo::get();
   @endphp



            <div class="col-md-1 offset-md-1">



                  <div class="scrollit">

                    <table class="table table-borderless" style="background-color: #125d9b;">
                        <tbody style="overflow:scroll;">

                         @foreach ($allLogo as $logo)

                         @if ($logo->company_id==null)
                         <tr>

                           <td class="text-center">
                               <a href="{{$logo->link}}">

                                   <img src="{{URL :: to($logo -> logo)}}" width="50" height="50" id="logo">
                               </a>
                           </td>


                        </tr>

                        @endif

                          @php
                              $companyLogo=App\Models\Compane::where('id',$logo->company_id)->first();
                          @endphp

                          @if ($companyLogo)
                          <tr>

                            <td class="text-center">
                                <a href="{{route('about.company',$companyLogo->id)}}">

                                    <img src="{{URL :: to($companyLogo -> logo)}}" width="50" height="50" id="logo">
                                </a>
                            </td>


                         </tr>

                          @endif







                       @endforeach

                        </tbody>



                     </table>

                  </div>





            </div>














</div>





@endsection


@push('js')



<script >
$(document).ready(function (){

    $(document).on('change', '#address', function(){

        const addreess = $(this).val();
    $.ajax({
        url : "{{ url('paint.find') }}",
        type : "get",
        data : { addreess : addreess },
        dataType:'json',
        success:function(res)
        {




           var htmloption="<option value=''>Please Select Location</option>";
           $.each(res.adress,function(){
                $.each(this,function(k,v){

                    htmloption+="<option value='"+v+"'>"+v+"</option>";
                })
           })



           $('#adress_details').html(htmloption);



        }
    });

   });

});



</script>

<script type="text/javascript">
    $(document).ready(function() {

     $("#btnFetch").click(function() {
       // disable button
       $(this).prop("disabled", true);

       $(this).html(
         '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>'

       );
	   var size=$('#size').val();
	   var price=$('#price').val();
	   if(size=='')
	   {
        //  $('size-error').text('Please Fill Up');
		 $(this).prop("disabled", false);
		 $(this).text('Search');
		 $("input[name=size]").focus();
	   }
	   else if(price=='')
	   {
		// $('size-error').text('Please Fill Up');
		 $(this).prop("disabled", false);
		 $(this).text('Search');
		 $("input[name=price]").focus();
	   }
	   else
	   {
		$("#form-submit").submit();

	   }
    //    $("#form-submit").submit();
     });
 });

 </script>


@endpush








