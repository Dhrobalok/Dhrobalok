@extends('backend.admin.userdashboard.header')
@section('content')

<style>
    .page-header h1 {
    margin: 0;
    color: #b2b2b2;
    font-weight: 300;
    font-size: 30px;
    line-height: 1.25;
}
</style>

@if($hardwareall!='[]')



<div class="row justify-content-start p-3">
    @foreach ($hardwareall as $allhardware)


    <div class="col-md-3 py-4">
        <div class="card">
            <div class="card-header">
                @php
                $compane=App\Models\Compane::where('employe_id',$allhardware->employee_id)->first();
                @endphp
                <h5 class="text-center p-2" style="color:cadetblue;">Company&nbsp;Name</h5>
                <h5 class="text-center" style="color:rgb(48, 55, 63)">{{ $compane->name }}</h5>

            </div>
            <a href="{{ url('view.hardware',$allhardware->id) }}">
            <div class="card-body py-3 shadow">

                <div class="image-content text-center" >

                   <img  src = "{{ URL :: to($allhardware -> image) }}" style="max-width: 100%;height:auto;">
                </div>


            </div>
        </a>

        </div>

    </div>

      <div class="col-md-3 p-4">
         <table class="table">
             <tbody>
                <tr>
                    <td> Category</td>
                    <td>:</td>
                    <td>{{ $allhardware->category  }}</td>
                </tr>



                <tr>
                    <td>Price</td>
                    <td>:</td>
                    <td>{{ $allhardware->price  }} <span style="font-family: fantasy;">&#2547;</span></td>

                </tr>
             </tbody>

         </table>

      </div>

    @endforeach
</div>


@else
<div class="row justify-content-center">
    <p class="text-center">Not Match With This Parameter</p>
</div>

@endif
@include('backend.admin.userdashboard.footer')
@endsection
