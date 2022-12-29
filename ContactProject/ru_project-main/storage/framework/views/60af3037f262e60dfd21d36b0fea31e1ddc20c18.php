
<?php $__env->startSection('content'); ?>

<style>

    #form1
           {

        display:none;

            }

            img
      {
        width: 80px;
        height: 70px;
        background: #fff;
        border-radius: 10px;
      }
</style>
<div class="container-fluid">
    
    
    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-light alert-dismissible fade show shadom-lg" role="alert">
                <div class="row">
                    <div class="col-md-8">
                        <div class="f-roboto text-green"><img src="<?php echo e(asset('company_pic/ru-logo.png')); ?>" alt=""><p style="display:inline-block;font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome To University&nbspof&nbspRajshahi</p>
                        </div>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <div class="f-roboto">Quick Access</div>
                        </div>
                    </div>
                    <div class="row">
                       

                        <div class="col-md-6 text-center">
                            <img src="<?php echo e(URL :: to('employee_images/house-loan.png')); ?>" class="rounded-circle">
                        </div>

                        <div class="col-md-6 text-center">
                            <img src="<?php echo e(URL :: to('employee_images/accounts-logo.png')); ?>" class="rounded-circle">
                        </div>
                        
                    </div>
                 <div class="row">
                    
                    
                   

                   
                    <?php
                    $employee_id=Session::get('employeeid');
                    $id=Session::get('rollno'); 
  
                   $permission=App\Models\Permission::where('employee_id',$employee_id)->get();

                   ?>

                   <?php if($id==2): ?>

                   <div class="col-md-6 text-center">
                    <a class="nav-main-link" href="<?php echo e(url('addcategory')); ?>"><span class="nav-main-link-name">Add category</span></a>
                   </div>

                <div class="col-md-6 text-center">
                    <a class="nav-main-link" href="<?php echo e(route('user.aprove')); ?>">
                         
                        <span class="nav-main-link-name">Approve User</span>
                    </a>
                </div>
                       
                   <?php endif; ?>

                   <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if($permission_id->permission_Id==3): ?>
                   <div class="col-md-6 text-center">
                    <a class="nav-main-link" href="<?php echo e(url('addcategory')); ?>"><span class="nav-main-link-name">Add category</span></a>
                   </div>

                <div class="col-md-6 text-center">
                    <a class="nav-main-link" href="<?php echo e(route('user.aprove')); ?>">
                         
                        <span class="nav-main-link-name">Approve User</span>
                    </a>
                </div>
                 
                      
                  
                 <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      
                      
                        
                       
                    </div> 
                </div>
            </div>
        </div>
    </div>
    
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>
.text-green {
    color: #1dbf73;
}

.btn-custom {
    background: white;
    padding: 5px 40px;
    color: blue;
    font-family: 'Gentium Basic';
    border: 2px solid #4a73e8;
    display: inline-block;
    cursor: pointer;
    font-weight: 700;
    border-radius: 5px;
}

.btn-custom:hover {
    background: #4a73e8;
    border: 2px solid blue;
    color: white;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function() {
    var income_chart = document.getElementById('income_chart').getContext('2d');
    var myChart = new Chart(income_chart, {
        type: 'line',
        data: {
            labels: ['2020', '2021', '2022', '2023', '2024'],
            datasets: [{
                label: 'Income',
                data: [1200, 2009, 300, 5000, 7665],
                backgroundColor: '#1dbf73',
                borderColor: '#e5e5e5',
                borderWidth: 2,
                fill: true,
                width: 900
            }]
        }
    });

    var cost_of_goods_chart = document.getElementById('cost_of_goods_chart').getContext('2d');
    var myChart = new Chart(cost_of_goods_chart, {
        type: 'line',
        data: {
            labels: ['2020', '2021', '2022', '2023', '2024'],
            datasets: [{
                label: 'Cost of Goods Sold',
                data: [1200, 2009, 300, 5000, 7665],
                backgroundColor: '#1dbf73',
                borderColor: '#e5e5e5',
                borderWidth: 2,
                fill: true,
                width: 900
            }]
        }
    });
    var expenses = document.getElementById('expenses_chart').getContext('2d');
    var myChart = new Chart(expenses, {
        type: 'line',
        data: {
            labels: ['2020', '2021', '2022', '2023', '2024'],
            datasets: [{
                label: 'Cost of Goods Sold',
                data: [1200, 2009, 300, 5000, 7665],
                backgroundColor: '#1dbf73',
                borderColor: '#e5e5e5',
                borderWidth: 2,
                fill: true,
                width: 900
            }]
        }
    });

    var profit = document.getElementById('net_profit_chart').getContext('2d');
    var myChart = new Chart(profit, {
        type: 'line',
        data: {
            labels: ['2020', '2021', '2022', '2023', '2024'],
            datasets: [{
                label: 'Net Profit/Loss',
                data: [1200, 2009, 300, 5000, 7665],
                backgroundColor: '#1dbf73',
                borderColor: '#e5e5e5',
                borderWidth: 2,
                fill: true,
                width: 900
            }]
        }
    });

    var accounts = document.getElementById('ap_ar_chart').getContext('2d');
    var myChart = new Chart(accounts, {
        type: 'bar',
        data: {
            labels: ['2020', '2021', '2022', '2023', '2024'],
            datasets: [{
                    label: 'AP',
                    data: [1200, 2009, 300, 5000, 7665],
                    backgroundColor: '#1dbf73',
                    borderColor: '#e5e5e5',
                    borderWidth: 2,
                    fill: true,
                    width: 900
                },
                {
                    label: 'AR',
                    data: [1200, 2009, 300, 5000, 7665],
                    backgroundColor: 'rgb(0,0,255,.5)',
                    borderColor: '#e5e5e5',
                    borderWidth: 2,
                    fill: true,
                    width: 900
                }
            ]
        }
    });
})
</script>
<script>
$('input[type="file"]').change(function(e) {

    var Icon = $(this).prop('files')[0];
    var reader = new FileReader();
    reader.onload = function() {
        $("#" + "company_logo").attr("src", reader.result);
    }
    reader.readAsDataURL(Icon);
});

$('#company_settings').submit(function(e) {
    e.preventDefault();
    var company_name = $('#company_name').val();
    var company_address = $('#company_address').val();
    var opening_date = $('#opening_date').val();
    var fiscal_year_end = $('#fiscal_year').val();
    var CompanySetup = new FormData();

    CompanySetup.append('company_name', company_name);
    CompanySetup.append('company_address', company_address);
    CompanySetup.append('opening_date', opening_date);
    CompanySetup.append('fiscal_year', fiscal_year_end);
    CompanySetup.append('logo', $('#company_logo_upload').prop('files')[0]);

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': "<?php echo e(csrf_token()); ?>"
        }
    });
    $.ajax({
       
        type: "POST",
        data: CompanySetup,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {

            $('#company_settings')[0].reset();
            $('#account_setup').modal('hide');
            showSuccessWindow('Company information setup completed');
        }
    });
})
</script>

<script>


    $("#formButton").click(function(){
        $("#form1").toggle();
    });

    var input = document.getElementById("myInput");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("myBtn").click();
  }
});


</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\Ru_emergency_contact\resources\views/backend/admin/dashboard.blade.php ENDPATH**/ ?>