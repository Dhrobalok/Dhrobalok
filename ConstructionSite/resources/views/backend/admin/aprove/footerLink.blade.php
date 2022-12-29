@extends('backend.admin.index')

   @section('content')

   <style>
    .btn-sm {
    padding: 5.25rem -19 !important;
    font-size: .675rem !important;

    line-height: 1.5;
    border-radius: 0.2rem;
}
   </style>

      <div class="card shadow">
          <div class="card-body">

            @php
                $alllist=App\Models\Footer::get();
            @endphp


            <p align="right"><a href="{{url('Addfooter')}}" class="btn btn-sm btn-primary"><span style="font-size: 14px;">Add&nbsp;Footer&nbsp;Link</span></a></p>

              <div class="table-responsive">
                   <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Id</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Company&nbsp;Name</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Service</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Usefull&nbsp;Link&nbsp;Name</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Useful&nbsp;Link</span></th>



                            <th class="d-none d-sm-table-cell text-center"></th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                        $i=1;
                    @endphp

                    @foreach ($alllist as $logo)

                    <tr>
                        <td>{{$i++}}</td>

                        <td>{{$logo->name}}</td>

                        <td>
                           {{$logo->service}}
                        </td>

                         <td>
                            {{$logo->linkname}}
                         </td>

                         <td>
                            {{$logo->link}}
                         </td>

                        <td>

                            <div class="d-flex">


                                <a href="{{url('delete.footer',$logo->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-times"></i></a>


                            </div>



                        </td>
                     </tr>




                    @endforeach



                    </tbody>

                   </table>

              </div>

          </div>

      </div>



    @endsection
