@extends('backend.admin.userdashboard.header')
@section('content')

@if($allfeeting!='[]')

<div class="row justify-content-start p-3">
    @foreach ($allfeeting as $allfeetings)


    <div class="col-md-3 py-4">
        <div class="card">
            <div class="card-header">
                @php
                $compane=App\Models\Compane::where('employe_id',$allfeetings->employee_id)->first();
                @endphp
                <h5 class="text-center p-2" style="color:cadetblue;">Company&nbsp;Name</h5>
                <h5 class="text-center" style="color:rgb(48, 55, 63)">{{ $compane->name }}</h5>

            </div>
            <a href="{{ route('Feeting.view',$allfeetings->id) }}">
            <div class="card-body py-3 shadow">

                <div class="image-content">

                  <img  src = "{{ URL :: to($allfeetings -> image) }}" style="max-width: 100%;height:auto;">
                </div>


            </div>
        </a>

        </div>

    </div>

      <div class="col-md-3 p-4">
         <table class="table">
             <tbody>
                <tr>
                    <td style="font-family: Franklin Gothic Medium"> Category</td>
                    <td>:</td>
                    <td>{{ $allfeetings->category  }}</td>
                </tr>

                <tr>
                    <td style="font-family: Franklin Gothic Medium">Iteam</td>
                    <td>:</td>
                    <td>{{ $allfeetings->productitem  }}</td>
                </tr>

                <tr>
                    <td style="font-family: Franklin Gothic Medium">Price</td>
                    <td>:</td>
                    <td>{{ $allfeetings->price  }}&nbsp;<span style="font-family: fantasy;">&#2547;</td>

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
