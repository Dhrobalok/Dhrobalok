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

            @php
                $alllist=App\Models\Logo::get();
            @endphp

            <p align="right"><a href="{{url('LogoAdvertise')}}" class="btn btn-sm btn-primary"><span style="font-size: 14px;">Upload&nbsp;Logo</span></a></p>

              <div class="table-responsive">
                   <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Id</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Company&nbsp;Name</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Logo</span></th>


                            <th class="d-none d-sm-table-cell text-center"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i=1;
                        @endphp

                        @foreach ($alllist as $logo)


                        @if($logo->company_id != Null)

                           @php
                               $company=App\Models\Compane::where('id',$logo->company_id)->first();
                           @endphp

                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$company->name}}</td>
                            <td class="text-center">
                                <img  src = "{{ URL :: to($company -> logo) }}" height = "70px" width = "70px">
                            </td>

                            <td class="text-center">
                                <a href="{{url('edit.logo',$logo->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit" aria-hidden="true">&nbsp;<span style="font-size:13px;">Edit</span></i></a>

                                    <a href="{{url('delete.logo',$logo->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>


                            </td>
                         </tr>

                         @else

                         <tr>
                            <td>{{$i++}}</td>
                            <td>{{$logo->company_name}}</td>
                            <td class="text-center">
                                <img  src = "{{ URL :: to($logo -> logo) }}" height = "70px" width = "70px">
                            </td>

                            <td class="text-center">
                                <a href="{{url('edit.logo',$logo->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit" aria-hidden="true">&nbsp;<span style="font-size:13px;">Edit</span></i></a>

                                    <a href="{{url('delete.logo',$logo->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>


                            </td>
                         </tr>



                        @endif


                        @endforeach


                    </tbody>

                   </table>

              </div>

          </div>

      </div>



    @endsection
