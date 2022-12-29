@extends('backend.admin.userdashboard.header')
@section('content')

@if($allsanitary!='[]')

<div class="row justify-content-start p-3">
    @foreach ($allsanitary as $allsanitarys)


    <div class="col-md-3 py-4">
        <div class="card">
            <div class="card-header">
                @php
                $compane=App\Models\Compane::where('employe_id',$allsanitarys->employee_id)->first();
                @endphp
                <h5 class="text-center p-2" style="color:cadetblue;">Company&nbsp;Name</h5>
                <h5 class="text-center" style="color:rgb(48, 55, 63)">{{ $compane->name }}</h5>

            </div>
            <a href="{{ route('Sanitary.view',$allsanitarys->id) }}">
            <div class="card-body py-3 shadow">

                <div class="image-content">

                 <img  src = "{{ URL :: to($allsanitarys -> image) }}" style="max-width: 100%;height:auto;">
                </div>


            </div>
        </a>

        </div>

    </div>

      <div class="col-md-3 p-4">
         <table class="table">
             <tbody>
                <tr>
                    <th>Sanitary&nbsp;Category</th>
                    <td>:</td>
                    <td>{{ $allsanitarys->category  }}</td>
                </tr>

                <tr>
                    <th>Sanitary&nbsp;Iteam</th>
                    <td>:</td>
                    <td>{{ $allsanitarys->productitem  }}</td>
                </tr>

                <tr>
                    <th>Sanitary&nbsp;Price</th>
                    <td>:</td>
                    <td>{{ $allsanitarys->price  }}&nbsp;<span style="font-family: fantasy;">&#2547;</span></td>

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
