

@extends('backend.Dashboard.servey')

<style>
    td
    {
        text-align: center;
    }
</style>
@section('content')

              <div class="row justify-content-center">
                   <div class="col-md-7">
                        <div class="card shadow mt-4" style="background-color: rgb(250, 249, 243);">

                            <p class="text-right p-2">

                                {{-- <a href="{{route('Profile.update')}}">Edit</a> --}}

                                <a id="ProfileEdit" class="btn btn-sm btn-success py-1">
                                  <span style="color:aliceblue;">Edit Profile</span>
                                </a>
                            </p>




                            <div class="card-body">
                                  <table class="table table-borderless">

                                    <tbody>
                                        <tr>
                                                <td>Name</td>
                                                <td>:</td>
                                                <td>{{$userdetails->firstname}}</td>

                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td >:</td>
                                            <td>{{$userdetails->email}}</td>

                                       </tr>

                                    </tbody>
                                  </table>

                            </div>

                        </div>

                   </div>

              </div>



              <div class="border shadow text-center p-5 mt-6">
                <p>Powerd By</p>

                <a href="https://rajit.net/">
                    <img src="https://rajit.net/wp-content/themes/websdevrajit/images/logo.png" alt="" class="img-responsive" style="width: 120px;;background-color:rgb(107, 88, 75);">
                </a>

            </div>


            <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update</h5>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body border shadow">

                             <form method="post" id="update_confirm2">
                                @csrf

                                <div  id="tableContent2">


                                </div>

                                <div class="row justify-content-center mb-1 mt-4">
                                    <button class="btn btn-primary" style="width: 20%;">Update</button>

                                </div>
                             </form>
                      ...
                    </div>

                  </div>
                </div>
              </div>


@endsection

@push('js')

<script>

    $(document).ready(function() {



        $(document).on('click','#ProfileEdit',function(){

            event.preventDefault();
              jQuery.noConflict();

            $.ajax({

                  url: "{{ route('Profile.update') }}",

                  type: 'get',
                success: function(result)
                     {


                       $("#exampleModal6").modal('show');
                      $('#tableContent2').html(result.html);
                    }
            });

      });
    });



    </script>


<script>
    $('#update_confirm2').on('submit',function(e){


         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({


            url : "{{ route('Update.Profile') }}",
            type : "post",
            data:$('#update_confirm2').serialize(),

            success:function(message)
            {
                location.reload();





                Swal.fire(
                 'Update!',
                 'Successfully !',
                'success'
               );


            }

        })
    });
</script>



@endpush
