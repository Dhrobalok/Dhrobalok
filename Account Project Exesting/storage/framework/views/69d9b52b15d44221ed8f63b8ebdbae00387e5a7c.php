
<?php $__env->startSection('content'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
   
    <div class="row justify-content-center">
        <h4 style="font-size:17px;">মধ্যপাড়া গ্রানাইট মাইনিং কোম্পানী লিমিটেড</h4>
      
        

    </div>

    <div class="row justify-content-center">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <h5>(পেট্টোবাংলার একটি কোম্পানি)</h5>
      
        <div class="col-md-4">
              
              <p  style="font-size:12px;display:inline-block;margin-left:89px;">কর সনাক্তকরণ সংখ্যা-৩৯৩৫৩১৬৯০৮২৫</p>
        </div>
        
            
    </div>

    

    <div class="row justify-content-center">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h5 >মধ্যপাড়া,পার্বতীপুর,দিনাজপুর ।</h5>
        <div class="col-md-4">
            <p style="font-size:12px;display:inline-block;margin-left:89px;">কর সনাক্তকরণ সংখ্যা-৩৯৩৫৩১৬৯০৮২৫</p>

      </div>
        

    </div>

    <div class="row justify-content-center">
        <h6>চেক/স্থানান্তরের মাধ্যমে পরিশোধ ভাউচার</h6>
       

    </div>
    <br>
    <form action="<?php echo e(route('admin.voucher.debit.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
    <div class="row justify-content-sm-start">
      
             
        
            <div class="col-md-4">
                <label>টাকার পরিমাণ<span class="text-danger">*</span></label>
            </div>
            <div class="col-md-4">
                <label>ব্যাংক হিসাব নম্বর <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-4">
                <label>ভাউচার নম্বর <span class="text-danger">*</span></label>
            </div>
       

    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <input type="text" class="form-control" name="totalamount" id="totalamount" value="<?php echo e(old('email')); ?>" readonly>
            <?php if($errors -> has('email')): ?>
            <small><?php echo e($errors -> first('email')); ?></small>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="acnumber" value="<?php echo e(old('email')); ?>">
            <?php if($errors -> has('email')): ?>
            <small><?php echo e($errors -> first('email')); ?></small>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="voucherno" value="<?php echo e(old('password')); ?>">
            <?php if($errors -> has('password')): ?>
            <small><?php echo e($errors -> first('password')); ?></small>
            <?php endif; ?>
        </div>
       
    </div>
    
<br>
    <div class="row justify-content-sm-start">
      
             
        
        <div class="col-md-4">
            <label>চেক নম্বর<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            <label>তারিখ <span class="text-danger">*</span></label>
        </div>
   

  </div>

  <div class="row justify-content-center">
    <div class="col-md-4">
        <input type="text" class="form-control" name="checkno" value="<?php echo e(old('email')); ?>">
        <?php if($errors -> has('email')): ?>
        <small><?php echo e($errors -> first('email')); ?></small>
        <?php endif; ?>
    </div>
    <div class="col-md-4">
     
    </div>
    <div class="col-md-4">
        <input type="date" class="form-control" name="date" value="<?php echo e(old('password')); ?>">
        <?php if($errors -> has('password')): ?>
        <small><?php echo e($errors -> first('password')); ?></small>
        <?php endif; ?>
    </div>
   
</div>

<br>
<br>
<div class="row justify-content-md-start">
  <p>টাকা (কথায়) :</p>


</div>

<div class="content">
    <div class="row justify-content-md-end">
          
        <div class="row">

            <div class="col-md-12 form-group text-right">
                <a href="#"  >লেনদেন
                </a>
            </div>
        </div>
    </div>

  <div class="row justify-content-md-start">
    <table class="table table-bordered table-striped" id="dynamicTable">
        <thead>
            <tr class = "text-center text-black">
                <th style="font-size:14px;">হিসাব নং</th>
                <th style="font-size:14px;">নোট</th>
                <th style="font-size:14px;">বিবরণ</th>
                <th style="font-size:14px;">টাকা</th>
                <th style="font-size:14px;"></th>
            </tr>
        </thead>
        <tbody id="entries">
          
                <tr>
                    <?php
                        $chartall=App\Models\ChartOfAccount::get();
                    ?>
                    
            <td>
                <select class="form-control chart" data="0"  name="chart[]" required>
                 
                      <?php $__currentLoopData = $chartall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chartalls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          
                     <option value="<?php echo e($chartalls->id); ?>"><?php echo e($chartalls->name); ?></option>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                </select>
            </td>
            <td><input type="text" class="form-control" name="note[]"  class="js-flatpickr form-control bg-white" ></td>

            <td><input type="text" class="form-control" name="description[]" id="description0" class="js-flatpickr form-control bg-white"  readonly></td>
            <td><input type="number" value="" class="form-control amount" name="amount[]" id="amount0" class="js-flatpickr form-control bg-white" placeholder="পরিমাণ" onblur="sum()" required></td>

         <td><button type="button" name="add" id="add" class="btn btn-alt-primary">নতুন&nbsp;লেনদেন</button></td>
                </tr>

         
                
                
        </tbody>

    </table>


    <table class="table">
      
        <tbody>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td><td></td>
               
                
                <td>মোট</td>
                <td> =&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control"  id="total" value="" style="display: inline-block;height:50%;width:50%" readonly></td>

            </tr>

        </tbody>

        
           
        </footer>
    
    </table>

  </div>
    


</div>



<footer style="padding: 50px;">

    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <input type="file" class="form-control" name="DeputyGeneralManager" value="<?php echo e(old('email')); ?>">
            <?php if($errors -> has('email')): ?>
            <small><?php echo e($errors -> first('email')); ?></small>
            <?php endif; ?>
        </div>

        <div class="col-md-4">
            <input type="file" class="form-control" name="DeputyGeneralManager2" value="<?php echo e(old('email')); ?>">
            <?php if($errors -> has('email')): ?>
            <small><?php echo e($errors -> first('email')); ?></small>
            <?php endif; ?>
        </div>

        <div class="col-md-4">
            <input type="file" class="form-control" name="GeneralManager" value="<?php echo e(old('email')); ?>">
            <?php if($errors -> has('email')): ?>
            <small><?php echo e($errors -> first('email')); ?></small>
            <?php endif; ?>
        </div>



    </div>

    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray;">
            <label>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;
                &nbsp;
                উপ-মহাব্যবস্থাপক(অর্থ/হিসাব)<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray;">
            <label>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;উপ-ব্যবস্থাপক(বিএন্ডএফ/এপিএন্ডবি)<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray;">
            <label>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;মহাব্যবস্থাপক(হিসাব ও অর্থ)<span class="text-danger">*</span></label>
        </div>

    </div>

    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <input type="file" class="form-control" name="Manager" value="<?php echo e(old('email')); ?>">
            <?php if($errors -> has('email')): ?>
            <small><?php echo e($errors -> first('email')); ?></small>
            <?php endif; ?>
        </div>
    </div>

    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray;">
            <label>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;
                &nbsp;
                ব্যবস্থাপক(এফএন্ডএল/এপিএন্ডবি)<span class="text-danger">*</span></label>
        </div>

    </div>

</footer>

   
<div class="row justify-content-center">

    <div >
        <button class="btn btn-primary" style="text-align: center">Submit</button>

    </div>
   

 </div>
</form>
  
</div>



<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){
       

        ++i;

        $("#dynamicTable").append('<tr><?php$chartall=App\Models\ChartOfAccount::get();?><td><select class="form-control chart" data="'+i+'"  name="chart[]" required><?php $__currentLoopData = $chartall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chartalls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($chartalls->id); ?>"><?php echo e($chartalls->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td> <td><input type="text" class="form-control" name="note[]"  class="js-flatpickr form-control bg-white" ></td><td><input type="text" class="form-control" name="description[]" id="description'+i+'" class="js-flatpickr form-control bg-white"  readonly></td><td><input type="number" class="form-control amount" data="'+i+'" name="amount[]" id="amount'+i+'" onblur="sum()" class="js-flatpickr form-control bg-white" placeholder="পরিমাণ"  required></td><td><i class="fa fa-trash-o delete" onblur="delete()" style="font-size:48px;color:red"></i></td></tr>');

    });

    $(document).on('click', '.delete', function(){
         $(this).parents('tr').remove();

         sum();
    });

   </script>

<script>
    function sum()
    {
        var total=0;

        $('.amount').each(function(index,value){
         
        total+= parseFloat($(this).val());
            
        });
        document.getElementById("total").value = total;
        document.getElementById("totalamount").value = total;

   

    }
</script>







<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>
td,
th,
.dataTables_info,
.page-link,
.form-control {
    font-size: 18px;
    font-family: 'Gentium Basic';
}

.block-title,
a {
    font-size: 18px;
    font-family: 'Gentium Basic';
    color: blue;
    font-weight: bolder;
}

.btn-outline-primary {
    font-size: 15px;
    font-family: 'Gentium Basic';
    margin-left: 2px;
}

input.custom-checkbox {
    transform: scale(1.5);
    margin-right: 9%;
    margin-top: 5%;
}

label,
h5 {
    font-family: 'Gentium Basic'
}

.list-group {
    font-family: 'Gentium Basic';
    font-size: 20px;
    line-height: 14px;
    background: white;
}
</style>

<?php $__env->stopPush(); ?>



<?php $__env->startPush('js'); ?>
<script>
     $(document).on('change','.chart',function(){
       
    // let i=$(this).attr('data');
    // var total=$('#amount'+i).val()+total;
    

    let index=$(this).attr('data');
   
    // var x=document.getElementById("amount").value;
    //   alert(total);
       
    // var total=total+x;
    // document.getElementById("total").innerHTML = total;


    const student_id = $(this).val();
    $.ajax({
        url : "<?php echo e(route('description.find')); ?>",
        type : "get",
        data : { student_id : student_id },
        success:function(res)
        {
          // designationsalert(res)
           $('#description'+index).val(res['description']);
           
           $("#total").text(total);

        //    $('#name').val(res['teacher_name']);
        //    $('#designations').val(res['teacher_designation']);
           
           
        
      
        }
    });
})
</script>










    
<?php $__env->stopPush(); ?>



<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\mgmclac.rajbilling.com\resources\views/backend/admin/vouchers/debit_vouchers/create.blade.php ENDPATH**/ ?>