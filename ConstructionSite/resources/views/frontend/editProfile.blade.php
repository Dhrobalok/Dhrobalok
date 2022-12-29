

@extends('frontend.layout')
@section('content')
<style>
    #agrani_bank
    {
        width: 50px;
        height: 40px;

        background: #fff;
        border-radius: 40px;
        position: relative;
    }

    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;

}

</style>


    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">



                 <div class="card-header">

                         <h4>
                            Profile&nbsp;Update
                         </h4>

                          <div class="row justify-content-center">
                            <img id="output"/>
                                <script>
                                var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                    }
                                };
                                </script>


                          </div>


                          <div class="row justify-content-center">

                            <input type="file" name="image" accept="image/*" onchange="loadFile(event)">

                          </div>


                     </div>



                     <div class="card-body">

                        <div class="row justify-content-start">
                            <div class="col-md-6">

                                <label for=""></label>

                            </div>

                        </div>

                     </div>


                 </div>







            </div>

        </div>

    </div>





@endsection
@push('js')


@endpush
