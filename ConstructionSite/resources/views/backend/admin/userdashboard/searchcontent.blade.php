@extends('backend.admin.userdashboard.header')
@section('content')




    <div class="row justify-content-start py-4 ">

        <div class="card-header" style="width: 18rem;">
          <p style="text-align: center;font-size:15px;"><strong style="display: inline-block;">Apt List (sort)</strong> </p>
        </div>




    </div>

    <div class="row justify-content py-3">
      @foreach ($projectinfo as  $project)


      <div class="col-md-3 py-4">
        <div class="card">
          <div class="card-body py-3 shadow">
            <div class="image-content">
              <a href="{{ url('propertySearch',$project->id) }}"><img  src = "{{ URL :: to($project -> image) }}" style="width: 100%;"></a>
                {{-- <hr style="border: 1px solid red;">   --}}
                {{-- <h5 style="font-size: 20px; color:black;float:left;">{{ $project->name }}</h5> --}}
            </div>

          </div>

        </div>



      </div>

      <div class="col-md-3 py-2">

        {{-- <div class="card" style="width: 18rem;">
          <div class="card-body py-3 shadow"> --}}
            <div class="image-content">
              <table class="table">
                <tbody>
                  <tr>
                    <th>Project&nbspName:</th>
                    <td style="display: inline-block;">{{ $project->name }}</td>
                  </tr>

                  <tr>
                    <th>Size:</th>
                    <td style="display: inline-block;">{{ $project->size }}</td>
                  </tr>

                  <tr>
                    <th>Price:</th>
                    <td style="display: inline-block;">{{ $project->price }}</td>
                    <th><img src="{{ asset('images/5784811.png') }}" alt="" width="20px;" height="80%" style="display:inline-block;"></th>
                  </tr>

                  <tr>

                    <th>Type:</th>

                    <td>{{ucwords($project->type)}}</td>

                  </tr>

                </tbody>

              </table>


                {{-- <h5 style="font-size: 15px;">{{ $project->name }}</h5> --}}
            </div>

          {{-- </div>

        </div> --}}

      </div>
     @endforeach

    </div>

   @include('backend.admin.userdashboard.footer')




@endsection
