@extends('backend.admin.userdashboard.header')
<style>

a
{
    text-decoration: none !important;
}


</style>
@section('content')

<div class="row justify-content-start p-3">
    @foreach ($allArchetect as $Architects)


    <div class="col-md-3 py-4">
        <div class="card">
          <a href="{{ route('Architect.view',$Architects->id) }}">
            <div class="card-body py-3 shadow">
                @php
                $compane=App\Models\Compane::where('employe_id',$Architects->employee_id)->first();
                @endphp
                <h5 class="text-center p-2" style="color:cadetblue;">Company&nbsp;Name</h5>
                <h5 class="text-center" style="color:rgb(48, 55, 63)">{{ $compane->name }}</h5>
                <div class="image-content">

                   <img  src = "{{ URL :: to($Architects -> image) }}" style="max-width: 100%;height:auto;">
                </div>


            </div>
        </a>

        </div>

    </div>

      <div class="col-md-3 p-4">
         <table class="table">
             <tbody>
                <tr>
                    <th>Architect Name</th>
                    <td>{{ $Architects->architect_name  }}</td>
                </tr>

                <tr>
                    <th>Designation</th>
                    <td>{{ $Architects->designation  }}</td>
                </tr>

                <tr>
                    <th>Institute</th>
                    <td>{{ $Architects->institute  }}</td>

                </tr>
             </tbody>

         </table>

      </div>

    @endforeach
</div>

<div>

</div>


@include('backend.admin.userdashboard.footer')
@endsection
