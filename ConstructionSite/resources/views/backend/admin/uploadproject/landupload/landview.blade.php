@extends('backend.admin.userdashboard.header')
@section('content')

 @if ($landall!='[]')



<div class="row justify-content-start p-3">
    @foreach ($landall as $bricks)


    <div class="col-md-3 py-4">
        <div class="card">
            <div class="card-header">
                @php
                $compane=App\Models\Compane::where('employe_id',$bricks->employeeid)->first();
                @endphp
                <h5 class="text-center p-2" style="color:cadetblue;">Company&nbsp;Name</h5>
                <h5 class="text-center" style="color:rgb(48, 55, 63)">{{ $compane->name }}</h5>

            </div>
            <a href="{{ route('Land.view',$bricks->id) }}">
            <div class="card-body py-3 shadow">

                <div class="image-content">

                   <img  src = "{{ URL :: to($compane -> logo) }}" style="width: 100%;">
                </div>


            </div>
        </a>

        </div>

    </div>

      <div class="col-md-3 p-4">
         <table class="table">
             <tbody>
                <tr>
                    <th>Land Area</th>
                    <td>:</td>
                    <td>{{ $bricks->area  }}</td>
                </tr>

                <tr>
                    <th>Land Size</th>
                    <td>:</td>
                    <td>{{ $bricks->size  }}</td>
                </tr>

                <tr>
                    <th>Land Price</th>
                    <td>:</td>
                    <td>{{ $bricks->price  }}&nbsp;<span style="font-family: fantasy;">&#2547;</span></td>
                   
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
