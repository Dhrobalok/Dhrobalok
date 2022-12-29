@extends('backend.admin.userdashboard.header')
@section('content')

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>

.container {
  position: relative;
  text-align: center;
  color: white;
}

.center
{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.center2
{
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.solid
{
    margin: 0 -15px;
  border: 0;
  border-top: 1px solid #c9c7c7;
}

p
{
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;

}

span
{

}



.img-responsive2
{


    background: rgba(76, 175, 80, 0.3);


}

i {
    float: left;
    color: green;
    display: inline-block;
}


.vr {
    border-left: 6px solid #c69320;
  height: 320px;
  position: absolute;
  left: 35%;

  top:10px;
  border-radius: 10px;
}
</style>



  <section class="section-class">
      <div class="container">
         <div class="row">

            <img class="img-responsive" src="{{ asset('images/dev-plot.jpg') }}" width="100%" height="220px;" >

            <div class="center">
                <h1 class="text-center p-2">ABOUT  <span style="color:#c69320;">{{$companyinform->name}}</span></h1>


             </div>

         </div>

      </div>

  </section>

  @php
  $contact=App\Models\Employee::where('id',$companyinform->employe_id)->first();
@endphp



   <section class="section-class">

      <div class="container">
          <div class="row justify-center p-5 mt-4">
              <div class="col-md-4">

                <img  src = "{{ URL :: to($companyinform -> logo) }}" style="width:100%;">

              </div>




              <div class="col-md-8">

                 <table class="table table-borderless w-100">

                    <tbody>


                        <tr>
                            <td style="vertical-align: middle"><i class="fas fa-map-marker-alt"></i></td>
                            <td align="left">
                                <span>{{$companyinform->address}}</span>
                            </td>
                        </tr>


                        <tr>
                            <td style="vertical-align: middle"><i class="fas fa-phone"></i></td>
                            <td align="left">
                                <span>{{$contact->mobile_no}}</span>
                            </td>
                        </tr>

                        <tr>

                            <td style="vertical-align: middle"><i class="fas fa-envelope"></i></td>
                            <td align="left">
                                <span>{{$contact->email}}</span>
                            </td>

                        </tr>




                        <tr>
                             <td align="left"><strong>Description</strong></td>

                            <td align="left" style="text-align: justify;color:#023020; font-size:18px;">
                            {{$companyinform->description}}
                            </td>
                        </tr>




                    </tbody>

                 </table>


                {{-- <p class="font-weight-bold" style="text-align: justify; color:#023020; font-size:20px;line-height:32px;">{{$companyinform->description}}</p>

                <h4 style="color:black;">Head Office</h4>

                <p style="color:#393232;">
                    {{ $companyinform->address }}



                </p>

                <p style="color: #c6a2a2">
                    <span class="fa fa-phone"></span>{{$contact->mobile_no}}

                </p>

                <p style="color: #23c089;">
                    <span class="fa fa-envelope"></span>
                    {{$contact->email}}
                </p> --}}

              </div>

          </div>

      </div>


   </section>


  <section class="section-class" >









@include('backend.admin.userdashboard.footer')
@endsection
