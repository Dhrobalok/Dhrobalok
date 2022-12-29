@extends('backend.Dashboard.AdminDashUser')

@section('css')
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
@endsection

 @section('content')

 @if (session('msg'))
 <div>
 <script>
     alert('Another Batch Is alocated at the time')
 </script>
 </div>
 @endif

    @if($errors->has('image'))

       <script>
           alert('The image may not be greater than 1024 kilobytes. ')
       </script>

        {{-- <div class="error">{{ $message }}</div> --}}
    @endif

 <div class="col-md-11">

    <div class="card shadow p-2 mt-2">
        <div class="text-right">

            @can('add')
              <a  href="{{route('add.course')}}" class=" btn-sm btn-primary">AddCourse</a>

            @endcan



        </div>





        <div class="card-body">



            <div class="table-responsive-sm p-0 m-0">


                <table class="table table-hover table-striped mt-2 w-100 js-dataTable-full" id="mytable">


                  <thead>

                          <th>Course_Id</th>
                          <th>Course&nbsp;Name</th>

                          <th>Fees</th>
                          <th>Duration</th>

                          <th>Image</th>
                          <th>Status</th>
                          <th>Action</th>

                  </thead>

                  <tbody>

                    @php
                         $allcourse=App\Models\Course::get();
                        $i=1;
                    @endphp

                       @foreach ($allcourse as $course)

                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{ucwords($course->name)}}</td>

                                <td>{{$course->fees}}</td>
                                <td>{{$course->duration}}&nbsp;Months</td>



                                <td>

                                    <img src="{{URL::to($course->image)}}" width="100%" alt="">
                                </td>

                                @if ($course->active==1)
                                <td>Active</td>

                                @else

                                <td>Inactive</td>

                              @endif
                                <td>

                                    <div class="d-flex gap-2">


                                        @can('edit')
                                        <a href="{{url('CourseEdit',$course->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i></a>&nbsp;
                                            {{-- <button type="button" data-toggle="modal" data-target="#exampleModal2" value="{{ $course->id }}" class="btn btn-primary btn-xs editbtn" style="margin-right:5px;"><i class="fas fa-edit" style="font-size: 12px;padding:2px;">&nbsp;Edit</i>
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </button> --}}

                                        @endcan




                                        @can('add')
                                                <a href="{{url('Activecourse',$course->id)}}" class="btn btn-sm btn-secondary"><i class="fas fa-check" style="font-size: 12px;padding:2px;">&nbsp;Active</i></a>
                                                &nbsp;&nbsp;
                                            <a href="{{route('Delete',$course->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-times" style="font-size: 12px;padding:2px;">&nbsp;Inactive</i></a>

                                        @endcan


                                    </div>
                                </td>


                            </tr>

                       @endforeach


                  </tbody>

                </table>

            </div>


        </div>

    </div>


 </div>


 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span style="color:blueviolet;">
                Add&nbsp;Course

            </span>


           </h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border shadow">

                 <form method="post" action="{{route('Course.Add')}}" enctype="multipart/form-data">
                    @csrf


                                    <div class="row justify-content-start">


                                        <div class="col-md-6">
                                            <label>Course&nbsp;Name</label><span class="text-danger"></span></label>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Course&nbsp;Category</label><span class="text-danger"></span></label>
                                        </div>

                                    </div>

                                <div class="row form-group justify-content-start">

                                    <div class="col-md-6">

                                        <input type="text" name="course" id="" placeholder="Course Name" class="form-control">

                                    </div>

                                    <div class="col-md-6">

                                        @php
                                            $category=App\Models\Coursecategore::get();
                                        @endphp

                                        <select name="category_id" id="" class="form-control">

                                           <option value="">Select Category</option>
                                           @foreach ($category as $allcategory)

                                           <option value="{{$allcategory->id}}">{{$allcategory->name}}</option>

                                           @endforeach
                                        </select>

                                     </div>

                                </div>









                                <div class="row justify-content-start">


                                    <div class="col-md-6">
                                        <label>Duraion</label><span class="text-danger"></span></label>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Fees</label><span class="text-danger"></span></label>
                                    </div>



                                </div>

                            <div class="row form-group justify-content-start">



                                <div class="col-md-6">

                                    <input type="text" name="duration" id="" placeholder="Duration" class="form-control">

                                </div>

                                <div class="col-md-6">

                                    <input type="text" name="fees" id="" placeholder="Fees" class="form-control">

                                </div>

                            </div>






                            <div class="row justify-content-start">




                                <div class="col-md-6">
                                    <label>Course Image</label><span class="text-danger"></span></label>
                                </div>

                                <div class="col-md-6">
                                    <label>Fullpayment Discount/Tk</label><span class="text-danger"></span></label>
                                </div>

                            </div>

                        <div class="row form-group justify-content-start">



                            <div class="col-md-6">

                                <input type="file" name="image"  class="form-control">





                            </div>


                            <div class="col-md-6">

                                <input type="text" name="fullpayment" placeholder="Fullpayment" id="" class="form-control">

                            </div>

                        </div>










                        <div class="row justify-content-start">


                            <div class="col-md-6">
                                <label>Installment</label><span class="text-danger"></span></label>
                            </div>

                            <div class="col-md-6">
                                <label>Installment Discount/Tk</label><span class="text-danger"></span></label>
                            </div>


                        </div>

                    <div class="row form-group justify-content-start">



                        <div class="col-md-6">

                            <select name="installment" id="" class="form-control">

                               <option value="">Please Select One</option>

                               <option value="1">Number Of Installment one</option>
                               <option value="2">Number Of Installment Two</option>
                               <option value="3">Number Of Installment Three</option>
                               <option value="4">Number Of Installment Four</option>
                               <option value="5">Number Of Installment Five</option>
                               <option value="6">Number Of Installment Six</option>
                               <option value="7">Number Of Installment Seven </option>
                               <option value="8">Number Of Installment Eight</option>
                               <option value="9">Number Of Installment Nine</option>
                               <option value="10">Number Of Installment Ten</option>
                               <option value="11">Number Of Installment Eleven</option>
                               <option value="12">Number Of Installment Twelve</option>


                            </select>

                    </div>


                    <div class="col-md-6">
                        <input type="text" name="installment_amount" class="form-control" placeholder="Enter Installment Amount">

                    </div>

                  </div>


                  <div class="row justify-content-start">




                        <div class="col-md-6">
                            <label>Learning Site</label><span class="text-danger"></span></label>
                        </div>

                        <div class="col-md-6">
                            <label for="">Feature Course</label>

                        </div>


                  </div>


                  <div class="row form-group justify-content-start">



                        <div class="col-md-6">

                            <select name="learning_site" id="" class="form-control">

                            <option value="">Choose Option</option>
                            <option value="1">Online</option>
                            <option value="2">Offline</option>
                            </select>

                        </div>

                        <div class="col-md-6">

                            <input type="radio" name="feature" value="1">&nbsp;Yes

                            <input type="radio" name="feature" value="0">&nbsp;No
                         </div>



                    </div>



                    <div class="row justify-content-start">

                        <div class="col-md-6">
                            <label for="">Discount Start</label>

                        </div>

                        <div class="col-md-6">
                            <label for="">Discount End</label>

                        </div>

                    </div>

                    <div class="row form-group justify-content-start">

                        <div class="col-md-6">
                            <input type="date" name="s_date" class="form-control">

                        </div>


                        <div class="col-md-6">
                            <input type="date" name="e_date" class="form-control">

                        </div>

                    </div>

                     <div class="row justify-content-start">
                        <div class="col-md-6">
                            <label>Description</label><span class="text-danger"></span></label>
                        </div>
                     </div>


                     <div class="row form-group justify-content-start">

                        <div class="col-md-12">

                            <textarea name="description" id="" cols="2" rows="5" class="form-control">

                            </textarea>

                            {{-- <input type="text" name="description" id="" placeholder="Description" class="form-control"> --}}

                        </div>

                     </div>


                    <div class="row justify-content-center mb-1 mt-4">
                        <button class="btn btn-primary">Course&nbsp;Save</button>

                    </div>
                 </form>
          ...
        </div>

      </div>
    </div>
  </div>








  {{-- Update Course --}}

  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
    <span style="color:blueviolet;">
      Edit&nbsp;Course

    </span>


    </h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body border shadow">

        <form action="{{route('update.course')}}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" id="courseid" value="">
                 <div class="row justify-content-start">


                     <div class="col-md-6">
                         <label>Course&nbsp;Name</label><span class="text-danger"></span></label>
                     </div>

                     <div class="col-md-6">
                        <label>Course&nbsp;Category</label><span class="text-danger"></span></label>
                    </div>

                 </div>

             <div class="row form-group justify-content-start">

                 <div class="col-md-6">

                     <input type="text" name="course" id="course" value="" class="form-control">

                 </div>


                 <div class="col-md-6">

                    @php
                    $category=App\Models\Coursecategore::get();
                @endphp

                <select name="category_id" id="category" value="" class="form-control">

                   <option value="">Select Category</option>
                   @foreach ($category as $allcategory)

                   <option value="{{$allcategory->id}}">{{$allcategory->name}}</option>

                   @endforeach
                </select>

                </div>

             </div>


               <div class="row justify-content-start">
                  <div class="col-md-6">
                      <label for="">Image</label>

                  </div>

               </div>


               <div class="row form-group justify-content-start">
                <div class="col-md-12">
                    <input type="file" name="image" id="image" class="form-control" value="">

                </div>

             </div>



                    <div class="row justify-content-start">


                        <div class="col-md-6">
                            <label>Duration</label><span class="text-danger"></span></label>
                        </div>

                        <div class="col-md-6">
                        <label>Fees</label><span class="text-danger"></span></label>
                    </div>

                    </div>

                <div class="row form-group justify-content-start">

                    <div class="col-md-6">

                        <input type="text" name="duration" id="duration" value="" class="form-control">

                    </div>

                    <div class="col-md-6">

                    <input type="text" name="fees" id="fees" value=""  class="form-control">

                </div>

                </div>




                <div class="row justify-content-start">


                    <div class="col-md-6">
                        <label>Fullpayment</label><span class="text-danger"></span></label>
                    </div>

                    <div class="col-md-6">
                    <label>Installment</label><span class="text-danger"></span></label>
                </div>

                </div>

            <div class="row form-group justify-content-start">

                <div class="col-md-6">

                    <input type="text" name="fullpayment" id="fullpayment" value="" class="form-control">

                </div>

                <div class="col-md-6">

                    <select name="installment" id="installment" value="" class="form-control">

                        <option value="">Please Select One</option>

                        <option value="1">Number Of Installment one</option>
                        <option value="2">Number Of Installment Two</option>
                        <option value="3">Number Of Installment Three</option>
                        <option value="4">Number Of Installment Four</option>
                        <option value="5">Number Of Installment Five</option>
                        <option value="6">Number Of Installment Six</option>
                        <option value="7">Number Of Installment Seven </option>
                        <option value="8">Number Of Installment Eight</option>
                        <option value="9">Number Of Installment Nine</option>
                        <option value="10">Number Of Installment Ten</option>
                        <option value="11">Number Of Installment Eleven</option>
                        <option value="12">Number Of Installment Twelve</option>


                     </select>

            </div>

            </div>


             <div class="row justify-content-start">


                <div class="col-md-6">
                    <label>Installment&nbsp;Amount</label><span class="text-danger"></span></label>
                </div>

                 <div class="col-md-6">
                     <label>Description</label><span class="text-danger"></span></label>
                 </div>

             </div>

         <div class="row form-group justify-content-start">

            <div class="col-md-6">

                <input type="text" name="installmentamount" id="installmentamount" value="" class="form-control">

            </div>

             <div class="col-md-6">

                <textarea name="description" id="" cols="1" rows="1" class="form-control">

                </textarea>

             </div>

         </div>



         <div class="row justify-content-start">


            <div class="col-md-6">
                <label>Start&nbsp;Date</label><span class="text-danger"></span></label>
            </div>

             <div class="col-md-6">
                 <label>End&nbsp;Date</label><span class="text-danger"></span></label>
             </div>

         </div>

     <div class="row form-group justify-content-start">

        <div class="col-md-6">

            <input type="date" name="s_date" id="s_date" value="" class="form-control">

        </div>

         <div class="col-md-6">

            <input type="date" name="e_date" id="e_date" value="" class="form-control">

         </div>

     </div>













 <div class="row justify-content-center m-10">

       <button class="btn btn-success">Submit</button>

 </div>

             </form>

    ...
    </div>

    </div>
    </div>
    </div>







 @endsection

 @push('js')


 <script>
    $(document).ready(function (e)
    {

        $(document).on('click','#addCourse',function()
            {

                event.preventDefault();
                jQuery.noConflict();

                $.ajax({



                      success: function(data)
                       {

                        $("#exampleModal").modal('show');
                        // $('#tableContent2').html(data.html);

                       }
               });

            });


    });
 </script>









<script>
    $(document).ready(function (e)
    {

        $(document).on('click','.editbtn',function()
            {



                var id = $(this).val();



                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                 type:"get",
                  url:"/CourseEdit/"+id,

                     // url:"{{ url('TrainerEdit') }}",
                     // data: {"id": id,"_token": "{{ csrf_token() }}"},

                     // type: 'post',

                      success: function(response)
                       {


                         // $("#exampleModal2").modal('show');
                         // $('#tableContent2').html(data.html); trainerid
                         $('#image').val(response.course.image);
                         $('#courseid').val(response.course.id);
                         $('#course').val(response.course.name);
                         $('#description').val(response.course.description);
                         $('#fees').val(response.course.fees);
                         $('#category').val(response.course.category_id);
                         $('#duration').val(response.course.duration);
                         $('#s_day').val(response.course.s_day);
                         $('#l_day').val(response.course.l_day);
                         $('#fullpayment').val(response.payment.fullpayment);
                         $('#installment').val(response.payment.installment);
                         $('#installmentamount').val(response.payment.installment_amount);

                         $('#s_date').val(response.payment.s_date);
                         $('#e_date').val(response.payment.e_date);
                       }
               });

            });


    });
 </script>


<script>

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><select name="day[]"  class="form-control"><option value="">Choose&nbsp;Day</option><option value="Sat">Saturday</option><option value="Sun">Sunday</option><option value="Mon">Monday</option><option value="Tue">Tuesday</option><option value="Wed">Wednesday</option><option value="Thu">Thursday</option></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script>


<script>
    function myFunction2()
    {
      location.reload();
    }
    </script>

 @endpush

