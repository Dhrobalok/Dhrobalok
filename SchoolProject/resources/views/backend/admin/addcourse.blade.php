@extends('backend.Dashboard.AdminDashUser')

@section('css')
<style>
    #myTable th
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

#myTable_filter
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

       <div class="col-md-11 pt-4">

        <div class="card shadow p-4">

              <div class="text-center mt-4">
                  <span style="color: rgb(239, 128, 128);font-weight:bold;">Image should be jpeg,png,jpg,gif,svg,max:2 MB,dimension 600*340 </span>
              </div>


              @if (\Session::has('alrt'))
              <div class="text-center mt-4">
                  <ul>
                      <li>{!! \Session::get('alrt') !!} <a href="{{route('addbatch')}}"><i class="fas fa-arrow-right"></i></a></li>
                  </ul>
              </div>
              @endif

            <div class="card-header">
                <div align="right" >

                    <a class="btn btn-primary btn-sm" id = "decline_btn"
                    href="{{route('addCourse')}}"><i class="fas fa-arrow-circle-left"></i>
                    Back</a>

                </div>

            </div>

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


                        @if ($errors->has('image'))

                          <span class="text-danger">{{ $errors->first('image') }}</span>

                         @endif


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

        </div>

       </div>


       <br><br><br><br>
 @endsection








