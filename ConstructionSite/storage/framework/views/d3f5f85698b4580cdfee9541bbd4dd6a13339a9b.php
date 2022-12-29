
<?php $__env->startSection('content'); ?>
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
    
    <div class="row justify-content-center">
      
        
        <div class="card">
            
           
            <div class="card-header text-center">
                <img class="img4" src="<?php echo e(asset('images/excavator-construction-logo-with-buildings_23-2148657768.webp')); ?>" alt="">
                <h4>Project Information</h4>

                <?php if(\Session::has('msg')): ?>
                  <div class="alert alert-success">
                    <ul>
                      <li><?php echo \Session::get('msg'); ?></li>
                      </ul>
                 </div>
             <?php endif; ?>
            </div>
            <div class="card-body shadow-lg">
                <form enctype="multipart/form-data" action="<?php echo e(route('project.save')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row  justify-content-start">

                        <div class="col-md-6">
                            <label>Project Name<span class="text-danger">*</span></label>
                        </div>
                        
                    </div>
                    <div class="row form-group justify-content-center">
                        <?php
                      
                        $id=Session::get('id')
                        ?>
                        
                        
                        <input type="hidden" name="employeeid" value="<?php echo e($id); ?>">

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="name"
                                value="<?php echo e(old('name')); ?>" placeholder="Project Name" required>
                            <?php if($errors -> has('name')): ?>
                            <small><?php echo e($errors -> first('name')); ?></small>
                            <?php endif; ?>
                        </div>
                       
                    </div>

                    <div class="row  justify-content-start">

                        
                           

                        <div class="col-md-6">
                            <label>Type</label><span class="text-danger">*</span></label>
                        </div>

                        
                    </div>

                    <div class="row form-group justify-content-center">
                        <div class="col-md-12">

                            <select name="type" id="" class="form-control" required>
                                <option value="">Select Type</option>
                               <option value="ongoing">Ongoing</option>
                               <option value="upcoming">Upcoming</option>
                               <option value="complete">Complete</option>
                            </select>
                            
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
                            
                            <input type="text" class="form-control"  name="locationName" placeholder="Location Details" required >
                            
                            <?php if($errors -> has('email')): ?>
                            <small><?php echo e($errors -> first('email')); ?></small>
                            <?php endif; ?>
                         <!-- LOcation -->
                       </div>

                       
                    </div>
                         
                         <div class="row  justify-content-strat">

                            <div class="col-md-6">
                                <label>Location Map<span class="text-danger">*</span></label>
                            </div>
    
                           
                            
                        </div>

                        <div class="row form-group justify-content-start">

                            <div class="col-md-12">
                                
                               
                                <input type="text" class="form-control"  id="lat" name="lat" placeholder="location" required>
                                <input type="hidden" class="form-control" name="lng" id="lng" placeholder="lng">
                                <?php if($errors -> has('email')): ?>
                                <small><?php echo e($errors -> first('email')); ?></small>
                                <?php endif; ?>
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

                        
                                <div class="col-md-6 py-2">
                                    <label>Project Image</label><span class="text-danger">*</span></label>
                                </div>
                            </div>

                        <div class="row form-group justify-content-center">

                            <div class="col-md-12">
                                <input type="file" class="form-control" name="image"
                                value="<?php echo e(old('image')); ?>" placeholder="front image" required>
                                <br>
                                <?php if($errors -> has('image')): ?>
                                <small>This ration should be 1400/1400 Formate will be jpg,png,jpeg</small>
                                <small><?php echo e($errors -> first('image')); ?></small>
                                <?php endif; ?>
                            </div>
                           
                        </div>

                        <div class="row  justify-content-center">

                        
                           

                            <div class="col-md-6">
                                <label>Size</label><span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-6">
                                <label>Price</label><span class="text-danger">*</span></label>
                            </div>
                        </div>

                        


                        <div class="row form-group justify-content-center">

                         

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="size"
                                value="<?php echo e(old('mobile_no')); ?>" placeholder="project size" required>
                                <?php if($errors -> has('name')): ?>
                                <small><?php echo e($errors -> first('name')); ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="price"
                                value="<?php echo e(old('mobile_no')); ?>" placeholder="project price" required>
                                <?php if($errors -> has('name')): ?>
                                <small><?php echo e($errors -> first('name')); ?></small>
                                <?php endif; ?>
                            </div>
                           
                        </div>

                      


                        <div class="row  justify-content-start">

                        
                            <div class="col-md-6">
                                <label>Layout Plane</label><span class="text-danger">*</span></label>
                            </div>
                        </div>

                        <div class="row form-group justify-content-center">

                            <div class="col-md-12">
                                <input type="file" class="form-control" name="image2"
                                value="<?php echo e(old('image2')); ?>" placeholder="Layout Plan" required>
                                <br>
                               
                                <?php if($errors -> has('image2')): ?>
                                <small>This ration should be 1400/1400 Formate will be jpg,png,jpeg</small>
                                <small><?php echo e($errors -> first('image2')); ?></small>
                                <?php endif; ?>
                            </div>
                           
                        </div>

                        <div class="row justify-content-start">

                        
                            <div class="col-md-6">
                                <label>Land Area</label><span class="text-danger">*</span></label>
                            </div>
                        </div>


                        <div class="row form-group justify-content-center">
                          
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="area" placeholder="please Input your land area" required>

                            </div>
                        </div>

                        <div class="row justify-content-start">

                        
                            <div class="col-md-6">
                                <label>Number Of Building</label><span class="text-danger">*</span></label>
                            </div>
                        </div>


                        <div class="row form-group justify-content-center">
                          
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="numbuilding" placeholder="number Of building" required>

                            </div>
                        </div>


                        <div class="row justify-content-start">

                        
                            <div class="col-md-6">
                                <label>Building Height</label><span class="text-danger">*</span></label>
                            </div>
                        </div>


                        <div class="row form-group justify-content-center">
                          
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="height" placeholder="building height" required>

                            </div>
                        </div>

                        <div class="row justify-content-start">

                        
                            <div class="col-md-6">
                                <label>Number Of Flat</label><span class="text-danger">*</span></label>
                            </div>
                        </div>


                        <div class="row form-group justify-content-center">
                          
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="numberflat" placeholder="number Of flat" required>

                            </div>
                        </div>


                        <div class="row justify-content-start">

                        
                            <div class="col-md-6">
                                <label>Number Of Car Parking</label><span class="text-danger">*</span></label>
                            </div>
                        </div>


                        <div class="row form-group justify-content-center">
                          
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="numparking" placeholder="number Of car parking" required>

                            </div>
                        </div>


                        <div class="row  justify-content-start">

                        
                           

                            <div class="col-md-3">
                                <label>Lifts</label><span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-3">
                                <label>Sub Station</label><span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-3">
                                <label>Generator</label><span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-3">
                                <label>F.Escape</label><span class="text-danger">*</span></label>
                            </div>
                      </div>


                      <div class="row form-group justify-content-start">

                         

                        <div class="col-md-3">
                            <input type="text" class="form-control" name="lift"
                            value="<?php echo e(old('mobile_no')); ?>" placeholder="Lift" required>
                            <?php if($errors -> has('name')): ?>
                            <small><?php echo e($errors -> first('name')); ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-3">
                            <input type="text" class="form-control" name="substation"
                            value="<?php echo e(old('mobile_no')); ?>" placeholder="Sub Station" required>
                            <?php if($errors -> has('name')): ?>
                            <small><?php echo e($errors -> first('name')); ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-3">
                            <input type="text" class="form-control" name="generator"
                            value="<?php echo e(old('mobile_no')); ?>" placeholder="Generator" required>
                            <?php if($errors -> has('name')): ?>
                            <small><?php echo e($errors -> first('name')); ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-3">
                            <input type="text" class="form-control" name="fEscape"
                            value="<?php echo e(old('mobile_no')); ?>" placeholder="F.Escape" required>
                            <?php if($errors -> has('name')): ?>
                            <small><?php echo e($errors -> first('name')); ?></small>
                            <?php endif; ?>
                        </div>
                       
                    </div>


                    
                    <div class="row  justify-content-start">

                        
                           

                        <div class="col-md-3">
                            <label>Stair</label><span class="text-danger">*</span></label>
                        </div>

                        <div class="col-md-3">
                            <label>Community Hall</label><span class="text-danger">*</span></label>
                        </div>

                        <div class="col-md-3">
                            <label>Prayer Hall</label><span class="text-danger">*</span></label>
                        </div>

                        <div class="col-md-3">
                            <label>Gym</label><span class="text-danger">*</span></label>
                        </div>
                  </div>


                  <div class="row form-group justify-content-start">

                         

                    <div class="col-md-3">
                        <input type="text" class="form-control" name="stair"
                        value="<?php echo e(old('mobile_no')); ?>" placeholder="Stair" required>
                        <?php if($errors -> has('name')): ?>
                        <small><?php echo e($errors -> first('name')); ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-3">
                        <input type="text" class="form-control" name="communityhall"
                        value="<?php echo e(old('mobile_no')); ?>" placeholder="Community Hall" required>
                        <?php if($errors -> has('name')): ?>
                        <small><?php echo e($errors -> first('name')); ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-3">
                        <input type="text" class="form-control" name="prayerhall"
                        value="<?php echo e(old('mobile_no')); ?>" placeholder="Prayer Hall" required>
                        <?php if($errors -> has('name')): ?>
                        <small><?php echo e($errors -> first('name')); ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-3">
                        <input type="text" class="form-control" name="gym"
                        value="<?php echo e(old('mobile_no')); ?>" placeholder="GYM" required>
                        <?php if($errors -> has('name')): ?>
                        <small><?php echo e($errors -> first('name')); ?></small>
                        <?php endif; ?>
                    </div>
                   
                </div>


                

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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/backend/admin/uploadproject/create.blade.php ENDPATH**/ ?>