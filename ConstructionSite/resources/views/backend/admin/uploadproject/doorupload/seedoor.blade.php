@extends('backend.admin.userdashboard.header')
@section('content')

@if($alldoor!='[]')

<div class="row justify-content-start p-3">
    @foreach ($alldoor as $alldoors)


    <div class="col-md-3 py-4">
        <div class="card">
            <div class="card-header">
                @php
                $compane=App\Models\Compane::where('employe_id',$alldoors->employee_id)->first();
                @endphp
                <h5 class="text-center p-2" style="color:cadetblue;">Company&nbsp;Name</h5>
                <h5 class="text-center" style="color:rgb(48, 55, 63)">{{ $compane->name }}</h5>

            </div>
            <a href="{{ route('door.view',$alldoors->id) }}">
            <div class="card-body py-3 shadow">

                <div class="image-content">

                  <img  src = "{{ URL :: to($alldoors -> image) }}"  style="max-width: 100%;height:auto;">
                </div>


            </div>
           </a>

        </div>

    </div>

      <div class="col-md-3 p-4">
         <table class="table">
             <tbody>
                <tr>
                    <th>Door Category</th>
                    <td>{{ $alldoors->category  }}</td>
                </tr>

                <tr>
                    <th>Door Size</th>
                    <td>{{ $alldoors->size  }}</td>
                </tr>

                <tr>
                    <th>Door Price</th>
                    <td>{{ $alldoors->price  }}</td>
                    <th><img src="{{ asset('images/5784811.png') }}" alt="" width="20px;" height="80%" style="display:inline-block;"></th>
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
