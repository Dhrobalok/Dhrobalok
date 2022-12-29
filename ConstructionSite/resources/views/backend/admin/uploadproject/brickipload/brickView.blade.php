@extends('backend.admin.userdashboard.header')
<style>



</style>
@section('content')

<div class="row justify-content-start p-3">
    @foreach ($brickall as $bricks)


    <div class="col-md-3 py-4">
        <div class="card">
          <a href="{{ route('brick.view',$bricks->id) }}">
            <div class="card-body py-3 shadow">
                @php
                $compane=App\Models\Compane::where('employe_id',$bricks->employee_id)->first();
                @endphp
                <h5 class="text-center p-2" style="color:cadetblue;">Company&nbsp;Name</h5>
                <h5 class="text-center" style="color:rgb(48, 55, 63)">{{ $compane->name }}</h5>
                <div class="image-content">

                   <img  src = "{{ URL :: to($bricks -> image) }}" style="max-width: 100%;height:auto;">
                </div>


            </div>
        </a>

        </div>

    </div>

      <div class="col-md-3 p-4">
         <table class="table">
             <tbody>
                <tr>
                    <th>Brick Name</th>
                    <td>{{ $bricks->brickname  }}</td>
                </tr>

                <tr>
                    <th>Size</th>
                    <td>{{ $bricks->bricksize  }}</td>
                </tr>

                <tr>
                    <th>price</th>
                    <td>{{ $bricks->price  }}</td>
                    <th><img src="{{ asset('images/5784811.png') }}" alt="" width="20px;" height="80%" style="display:inline-block;"></th>
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
