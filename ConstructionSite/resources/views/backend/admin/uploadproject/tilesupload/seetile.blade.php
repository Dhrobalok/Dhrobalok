@extends('backend.admin.userdashboard.header')
@section('content')

@if($alltiles!='[]')

<div class="row justify-content-start p-3">
    @foreach ($alltiles as $steels)


    <div class="col-md-3 py-4">
        <div class="card">
            <div class="card-header">
                @php
                $compane=App\Models\Compane::where('employe_id',$steels->employee_id)->first();
                @endphp
                <h5 class="text-center p-2" style="color:cadetblue;">Company&nbsp;Name</h5>
                <h5 class="text-center" style="color:rgb(48, 55, 63)">{{ $compane->name }}</h5>

            </div>
            <a href="{{ route('Tile.view',$steels->id) }}">
            <div class="card-body py-3 shadow">

                <div class="image-content">

                 <img  src = "{{ URL :: to($steels -> image) }}" style="max-width: 100%;height:auto;">
                </div>


            </div>
        </a>

        </div>

    </div>

      <div class="col-md-3 p-4">
         <table class="table">
             <tbody>
                <tr>
                    <th>Tiles Category</th>
                    <td>{{ $steels->category  }}</td>
                </tr>

                <tr>
                    <th>Tiles Size</th>
                    <td>{{ $steels->size  }}</td>
                </tr>

                <tr>
                    <th>Tiles Price</th>
                    <td>{{ $steels->price  }}</td>
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
