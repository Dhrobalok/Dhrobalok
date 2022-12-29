
<?php $__env->startSection('content'); ?>

<style>

    #form1
           {

        display:none;

            }
</style>
<div class="container-fluid">
    <?php
    $company = App\Models\CompanySettings :: find(1);

    ?>
    <?php if($company): ?>
    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-light alert-dismissible fade show shadom-lg" role="alert">
                <div class="row">
                    <div class="col-md-8">
                        <div class="f-roboto text-green">Welcome <?php echo e($company -> company_name); ?>

                        </div>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(!$company): ?>

    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-light alert-dismissible fade show shadom-lg" role="alert">
                <div class="row">
                    <div class="col-md-8">
                        <div class="f-roboto pt-1">Company Information Center
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <button class="btn-custom f-100" data-target="#account_setup" data-toggle="modal"><strong>Setup
                                Now</strong></button>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <div class="f-roboto">Approval Pendings</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <label class="f-roboto text-green">Vouchers</label>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="f-roboto text-green">Online Bills</label>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="f-roboto text-green">House Loan</label>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <label class="f-roboto text-black"><?php echo e($voucher_pendings + $total); ?></label>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="f-roboto text-black">100</label>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="f-roboto text-black">200</label>
                        </div>



                    </div>
                    <div class="row form-group">
                        <div class="col-md-4 text-center">
                            <a class="btn-custom" href="<?php echo e(route('admin.approve.index')); ?>">View All</a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a class="btn-custom" href="<?php echo e(route('admin.bill-users.index')); ?>">View All</a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a class="btn-custom" href="<?php echo e(route('admin.pf-loan.pending-loans')); ?>">View All</a>
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-md-4 text-center">
                            <label class="f-roboto text-green">FDR Notification</label>
                        </div>

                        <div class="col-md-4 text-center">
                            <label class="f-roboto text-green">Advance Notification</label>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-4 text-center">

                            <label class="f-roboto text-black"><?php echo e(Session::get('rr') + Session::get('pf')); ?></label>
                        </div>


                        <div class="col-md-4 text-center">

                            <label class="f-roboto text-black"><?php echo e(Session::get('ad_voucher')); ?></label>
                        </div>

                    </div>



                    <div class="row form-group">
                        <div class="col-md-4 text-center">



                            <button type="button" id="formButton" class="btn-custom">view all</button>


                             <form id="form1">
                                <?php if( Session::get('rr')!=0 || Session::get('pf')!=0 ): ?>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"></label>


                                                    <ul class="list-group">
                                                        <button type="button" class="list-group-item list-group-item-action active">

                                                          </button>





                                                     <?php $__currentLoopData = $key; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fdr_Number=>$fdr_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="list-group-item">


                                                       <span style="line-height: 33px;">FDR <?php echo e($fdr_Number); ?> for mature <?php echo e($fdr_value); ?>  days left</span>

                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                        
                                                     <?php $__currentLoopData = $pkey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pfdr_Number=>$pfdr_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <li class="list-group-item">


                                                    <span style="line-height: 33px;">PFFDR <?php echo e($pfdr_Number); ?> for mature <?php echo e($pfdr_value); ?>  days left</span>

                                                     </li>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                                      </ul>



                                  </div>
                                  <?php endif; ?>
                             </form>
                             </div>


                             <div class="col-md-4 text-center">
                                <a class="btn-custom" href="<?php echo e(route('notuploadvoucher')); ?>">View All</a>
                            </div>





                        </div>

                    </div>

                </div>
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
                        <div class="col-md-3 text-center">
                            <img src="<?php echo e(URL :: to('employee_images/employee-logo.png')); ?>" class="rounded-circle">
                        </div>
                        <div class="col-md-3 text-center">
                            <img src="<?php echo e(URL :: to('employee_images/accounts-logo.png')); ?>" class="rounded-circle">
                        </div>
                        <div class="col-md-3 text-center">
                            <img src="<?php echo e(URL :: to('employee_images/budget-icon.png')); ?>" class="rounded-circle">
                        </div>
                        <div class="col-md-3 text-center">
                            <img src="<?php echo e(URL :: to('employee_images/house-loan.png')); ?>" class="rounded-circle">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <a href="<?php echo e(route('admin.employee-management.employees.index')); ?>">Employees</a>
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="<?php echo e(route('accounts.index')); ?>">Chart Of Accounts</a>
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="#">Budgets</a>
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="#">House Loans</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto pt-1">Income
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="f-roboto pt-1">Tk. 4883883
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto text-black" style="font-size:14px;"><strong>Jan 1,2016 to April
                                    1,2016</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto" style="font-size:14px;">Jan 1,2015 to April
                                1,2015(Prev)
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <canvas id="income_chart">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto pt-1">
                                Cost of Goods Sold
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="f-roboto pt-1">
                                Tk. 484837
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto text-black" style="font-size:14px;"><strong>Jan 1,2016 to April
                                    1,2016</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto" style="font-size:14px;">Jan 1,2015 to April
                                1,2015(Prev)
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <canvas id="cost_of_goods_chart">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto pt-1">Expenses
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="f-roboto pt-1">Tk. 4883883
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto text-black" style="font-size:14px;"><strong>Jan 1,2016 to April
                                    1,2016</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto" style="font-size:14px;">Jan 1,2015 to April
                                1,2015(Prev)
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <canvas id="expenses_chart">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto pt-1">
                                Net Profit
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="f-roboto pt-1">
                                Tk. 484837
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto text-black" style="font-size:14px;"><strong>Jan 1,2016 to April
                                    1,2016</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto" style="font-size:14px;">Jan 1,2015 to April
                                1,2015(Prev)
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <canvas id="net_profit_chart">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="f-roboto pt-1">AP and AR Balances
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <canvas id="ap_ar_chart">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="f-roboto pt-1">Latest Revenues
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="account_setup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title text-black f-roboto" id="exampleModalLabel">Company Information Setup</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white">

                <div class="card border-0">
                    <div class="card-body bg-white">
                        <form id="company_settings">
                           <div class="row text-center">
                                <div class="col-md-12">
                                    <img src="<?php echo e(URL :: to('employee_images/default-logo.png')); ?>" height="150px"
                                        width="150px" class="rounded-circle" id="company_logo">
                                </div>

                            </div>
                            <div class="row text-center">
                               <div class="col-md-12">

                                    <input type="file" id="company_logo_upload" hidden />
                                    <label for="company_logo_upload"
                                        style="display: inline-block;background-color: #1dbf73;color: white;padding: 0.3rem 2rem;font-family: Gentium Basic;border-radius: 0.3rem;cursor: pointer;margin-top: 1rem;">Upload
                                        Logo</label>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Name<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Company Name" required
                                        id="company_name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Address</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Company address(In short)"
                                        id="company_address">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Opening Date<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <label>Fiscal Year End<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <input type="date" class="form-control" required id="opening_date">
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" required id="fiscal_year">
                                </div>
                            </div>
                            <div class="row text-center mt-3 form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn text-white f-100"
                                        style="background:#1dbf73">Apply</button>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
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
        url: "<?php echo e(route('admin.company-profile.store')); ?>",
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

<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\mgmclac.rajbilling.com\resources\views/backend/admin/dashboard.blade.php ENDPATH**/ ?>