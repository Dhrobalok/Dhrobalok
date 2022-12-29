@extends('backend.Dashboard.Master')
@section('content')


<style>
    #myTable th
{
    color:rgb(250, 235, 235);
font-size:14px;
line-height: 14px;
text-transform:capitalize;
font-weight: 400px !important;
width: 20px !important;
background-color: rgb(133, 127, 120)
}

.form-control-sm {
    min-height: calc(1.5em + 0.7rem + 2px);
    padding: 0.2rem 0.9rem !important;
    font-size: 1.0rem !important;
    border-radius: 0.35rem !important;
}

.editable-click, a.editable-click, a.editable-click:hover {
    text-decoration: none !important;
    border-bottom: none !important;
}

a
{
    text-decoration: none !important;

}
</style>




@if( Session::has("delete") )
<script>
   Swal.fire({
     icon: 'success',
     title: 'Student Delete !',

     })

</script>


@endif


{{-- <form action="{{url('Student.upload')}}" method="post" enctype="multipart/form-data">
    @csrf --}}


  <div class="card shadow p-4">

     <div class="card-header w-100">
          <p align="right" class="p-0 m-0">
             <a href="{{url('/upload')}}" class="btn btn-sm btn-success">
                Student&nbsp;Upload

            </a>

           <a href="{{url('csv.download')}}" class="btn btn-sm btn-success"><i class="fas fa-download" style="color:rgb(232, 218, 244);"></i>&nbsp;Format</a>


          </p>

     </div>

     <div class="table-responsive mt-3">
        <table class="table table-hover"  id="myTable">

            <thead>
               <th class="text-center">Id</th>
               <th class="text-center">Student Id</th>
               <th class="text-center"></th>
            </thead>


            <tbody>
               @php
                   $allstduent=App\Models\Student::get();
                   $i=1;
               @endphp
               @foreach ($allstduent as  $studentall)

               <tr>
                   <td class="text-center">{{$i++}}</td>
                   <td class="text-center">{{$studentall->studentid}}</td>

                   <td class="text-center">

                    <a  href="{{ url('delete.student',$studentall->id) }}" style="font-size:12px;" class="btn btn-sm btn-danger py-1" onclick="return confirm('Are you sure?')"><i class="fas fa-times" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>

                   </td>
               </tr>

               @endforeach

            </tbody>

        </table>
   </div>




  </div>


{{-- <tr>

    <th>Upload Student</th>



</tr>
<tr>


    <td>

        <input type="file" class="form-control" name="student" placeholder="Enter Teacher Name">

    </td>



    </tr> --}}
</table>


{{-- <div class="row justify-content-center mb-2">
    <button class="btn btn-primary" style="width: 25%;"> Submit</button>

</div> --}}


{{-- </form> --}}




@endsection


@push('js')

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endpush
