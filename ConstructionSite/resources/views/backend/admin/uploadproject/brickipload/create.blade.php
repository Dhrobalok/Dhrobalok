@extends('backend.admin.index')
@section('content')
<style>
    .img4
    {
        width: 90px;
        height: 90px;
        background: #fff;
        border-radius: 45px;


    }

</style>

<div class="content">
    {{-- <div class="spinner-grow text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div> --}}
    <div class="row justify-content-center">

        {{-- <img class="img4" src="{{ asset('images/excavator-construction-logo-with-buildings_23-2148657768.webp') }}" alt=""> --}}
        <div class="card">


            <div class="card-header text-center">
                <img class="img4" src="{{ asset('images/excavator-construction-logo-with-buildings_23-2148657768.webp') }}" alt="">
                <h4>Brick Information</h4>

                @if (\Session::has('msg'))
                  <div class="alert alert-success">
                    <ul>
                      <li>{!! \Session::get('msg') !!}</li>
                      </ul>
                 </div>
             @endif
            </div>
            <div class="card-body shadow-lg">
                <form enctype="multipart/form-data" action="{{ route('brick.save') }}"  method="POST">
                    @csrf



                    <div class="row  justify-content-start">




                        <div class="col-md-6">
                            <label>Brick Name</label><span class="text-danger">*</span></label>
                        </div>


                    </div>

                    <div class="row form-group justify-content-center">
                        <div class="col-md-12">
                            @php

                            $id=Session::get('id')
                            @endphp

                            <input type="hidden" name="employeeid" value="{{$id}}">
                            <input type="text" class="form-control" name="brickname"
                            value="{{ old('mobile_no') }}" placeholder="Brick Name" required>
                            @if($errors -> has('name'))
                            <small>{{ $errors -> first('name') }}</small>
                            @endif
                        </div>

                    </div>



                    <div class="row  justify-content-strat">

                        <div class="col-md-6">
                            <label>Brick Image<span class="text-danger">*</span></label>
                        </div>



                    </div>




                    <div class="row form-group justify-content-start">

                        <div class="col-md-12">

                            <input type="file" class="form-control"  name="image" placeholder="Image" required>

                            

                       </div>


                    </div>

                    <div class="row  justify-content-start">




                        <div class="col-md-6">
                            <label>Brick Size</label><span class="text-danger">*</span></label>
                        </div>


                    </div>

                    <div class="row form-group justify-content-center">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="bricksize"
                            value="{{ old('mobile_no') }}" placeholder="Brick Size" required>
                            @if($errors -> has('name'))
                            <small>{{ $errors -> first('name') }}</small>
                            @endif
                        </div>

                    </div>


                    <div class="row  justify-content-start">




                        <div class="col-md-6">
                            <label>Brick Category</label><span class="text-danger">*</span></label>
                        </div>


                    </div>

                    <div class="row form-group justify-content-center">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="category"
                            value="{{ old('mobile_no') }}" placeholder="Brick Category" required>
                            @if($errors -> has('name'))
                            <small>{{ $errors -> first('name') }}</small>
                            @endif
                        </div>

                    </div>


                    <div class="row  justify-content-start">




                        <div class="col-md-6">
                            <label>Brick Price</label><span class="text-danger">*</span></label>
                        </div>


                    </div>

                    <div class="row form-group justify-content-center">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="price"
                            value="{{ old('mobile_no') }}" placeholder="Brick Price" required>
                            @if($errors -> has('name'))
                            <small>{{ $errors -> first('name') }}</small>
                            @endif
                        </div>

                    </div>

                    <div class="row justify-content-start">


                        <div class="col-md-6">
                            <label>City</label><span class="text-danger">*</span></label>
                        </div>
                    </div>

                    <div class="row justify-content-start">
                        <div class="col-md-12">


                         <select name="city" id="" class="form-control" required>
                            <option value="">Select City</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Mymensingh">Mymensingh</option>
                         </select>
                        </div>

                    </div>

                    <div class="row  justify-content-strat">

                        <div class="col-md-6">
                            <label>Address<span class="text-danger">*</span></label>
                        </div>



                    </div>




                    <div class="row form-group justify-content-start">

                        <div class="col-md-12">

                            <input type="text" class="form-control"  name="address" placeholder="Address" required>

                            @if($errors -> has('email'))
                            <small>{{ $errors -> first('email') }}</small>
                            @endif

                       </div>


                    </div>

                         <div class="row  justify-content-strat">

                            <div class="col-md-6">
                                <label>Location Map<span class="text-danger">*</span></label>
                            </div>



                        </div>

                        <div class="row form-group justify-content-start">

                            <div class="col-md-12">
                                {{-- < class="form-control" onclick="myFunction()" ><i class="fa fa-map-marker" aria-hidden="true"></i></> --}}

                                <input type="text" class="form-control"  id="lat" name="lat" placeholder="location">
                                <input type="hidden" class="form-control" name="lng" id="lng" placeholder="lng">
                                @if($errors -> has('email'))
                                <small>{{ $errors -> first('email') }}</small>
                                @endif
                             <!-- LOcation -->
                           </div>


                         <div id="map" style="height:200px; width: 400px;" class="my-3"></div>

                           <script>
                                let map;
                                   function initMap() {
                                        map = new google.maps.Map(document.getElementById("map"), {
                                        center: { lat: -34.397, lng: 150.644 },
                                        zoom: 8,
                                        scrollwheel: true,
                                       });
                               const uluru = { lat: -34.397, lng: 150.644 };
                               let marker = new google.maps.Marker({
                                   position: uluru,
                                   map: map,
                                   draggable: true
                               });
                               google.maps.event.addListener(marker,'position_changed',
                                   function (){
                                        let lat = marker.position.lat()
                                       let lng = marker.position.lng()
                                       $('#lat').val(lat)
                                       $('#lng').val(lng)
                                   })
                               google.maps.event.addListener(map,'click',
                               function (event){
                                   pos = event.latLng
                                   marker.setPosition(pos)
                               })
                           }
                       </script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                        type="text/javascript"></script>


                       <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                       type="text/javascript"></script>






                        </div>




                            <!-- LOcation -->






                <div class="row justify-content-start">


                    <div class="col-md-6">
                        <label>Write something about your company</label><span class="text-danger">*</span></label>
                    </div>
                </div>

               <textarea name="description" id="" cols="80" rows="5" class="form-control">



               </textarea>




                        <div class="row form-group justify-content-center py-2">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </div>
             </div>


            </form>

    </div>

</div>


@endsection
