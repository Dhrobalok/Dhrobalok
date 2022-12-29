@extends('backend.admin.index')

   @section('content')

   <style>
    .btn-sm {
    padding: 6.25rem -19 !important;
    font-size: .675rem !important;
    5rem: ;
    line-height: 1.5;
    border-radius: 0.2rem;
}
   </style>

      <div class="card shadow">
          <div class="card-body">

            <p align="right"><a href="{{url('Vedio.Upload')}}" class="btn btn-sm btn-primary">Upload&nbsp;File</a></p>

              <div class="table-responsive">
                   <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Id</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Company&nbsp;Name</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Vedio</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Duration</span></th>


                            <th class="d-none d-sm-table-cell text-center"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i=1;
                        @endphp

                        @foreach ($vedioFile as $vedio)

                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$vedio->name}}</td>


                                    <td class="text-center">
                                        <video id="my-video" class="video-js vjs-default-skin" controls preload="auto" data-setup='{"inactivityTimeout": 0}' width="160" height="160">
                                            <source src="{{ URL :: to($vedio -> vedio) }}" type='video/mp4'>
                                        </video>
                                    </td>

                            


                            <td class="text-center">
                                {{$vedio->duration}}&nbsp;Seconds
                            </td>

                            <td class="text-center">
                                <a href="{{url('edit.vedio',$vedio->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit" aria-hidden="true">&nbsp;<span style="font-size:13px;">Edit</span></i></a>

                                    <a href="{{url('delete.vedio',$vedio->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-times" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>


                            </td>
                         </tr>

                        @endforeach


                    </tbody>

                   </table>

              </div>

          </div>

      </div>



    @endsection
