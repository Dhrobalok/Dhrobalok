@extends('backend.admin.index')
@section('content')
<style>
    * {
  box-sizing: border-box;
}

.zoom {
  padding: 50px;
  /* background-color: green; */
  transition: transform .2s;
  width: 150px;
  height: 150px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(4.5); /* IE 9 */
  -webkit-transform: scale(4.5); /* Safari 3-8 */
  transform: scale(4.5);
}
</style>

<div class="row justify-content-center">

       <div class="col-md-8">

        <div class="card shadow">


            <div class="card-body">
                  <form action="{{url('footerAdd')}}" method="POST" enctype="multipart/form-data">
                       @csrf


                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <label for="">Company Name</label>


                            </div>




                        </div>



                        <div class="row justify-content-center form-group ">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Company Name">

                            </div>



                        </div>


                     <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">Service</label>


                        </div>


                    </div>

                    <div class="row justify-content-center form-group">



                        <div class="col-md-6">
                            <input type="text" name="service" class="form-control" placeholder="Service">


                        </div>

                    </div>


                    <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">Usefull&nbsp;Link&nbsp;Name</label>


                        </div>


                    </div>

                    <div class="row justify-content-center form-group">



                        <div class="col-md-6">
                            <input type="text" name="linkname" class="form-control" placeholder="Link name">


                        </div>

                    </div>


                    <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">Usefull&nbsp;Link</label>


                        </div>


                    </div>

                    <div class="row justify-content-center form-group">



                        <div class="col-md-6">
                            <input type="text" name="link" class="form-control" placeholder="Link">


                        </div>

                    </div>



                    <div class="row justify-content-center p-4">


                            <button class="btn btn-success">Submit</button>



                    </div>


                  </form>



            </div>
            </div>

       </div>

</div>

{{-- Modal --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                 <form method="post" id="update_confirm">
                    @csrf



                        <div class="row justify-content-center">


                            <div class="col-md-6">
                                <label for="">Company&nbsp;Name</label>


                            </div>


                        </div>

                        <div class="row justify-content-center form-group">



                            <div class="col-md-6">
                                @php
                                    $allCompane=App\Models\Compane::get();
                                @endphp


                                    <select name="Company" id="" class="form-control">

                                        <option value="">Choose Option</option>
                                        @foreach ($allCompane as $compane)
                                        <option value="{{$compane->id}}">{{$compane->name}}</option>
                                        @endforeach
                                    </select>





                            </div>

                        </div>





                    <div class="row justify-content-center mb-1 mt-4">
                        <button class="btn btn-primary" style="width: 15%;"> Submit</button>

                    </div>
                 </form>
          ...
        </div>

      </div>
    </div>


@endsection

@push('js')

<script>
    $(document).ready(function() {

        $(document).on('click','.company',function()
        {
            var selected=$(this).val();

            if(selected==2)
            {
                $('#exampleModal').modal('show');
            }

        })

    });
  </script>

<script>
    $('#update_confirm').on('submit',function(e){


         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({


            url : "{{ url('Register') }}",
            type : "post",
            data:$('#update_confirm').serialize(),

            success:function(message)
            {

               location.reload();


            }

        })
    });
</script>



@endpush
