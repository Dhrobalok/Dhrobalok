@extends('backend.admin.index')
@section('content')

<style>

  

    img
      {
        width: 80px;
        height: 70px;
        background: #fff;
        border-radius: 10px;
      }

      .img3
      {
        width: 90px;
        height: 90px;
        background: #fff;
        border-radius: 10px;

      }
      #card
      {
        background: #00c6ff;
        width: 97%;
      }

    .statistic-section {
     padding-top: 70px;
     padding-bottom: 70px;
     background: #00c6ff;  /* fallback for old browsers */
     background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);
     background: linear-gradient(to right, #0072ff, #00c6ff); 
}

.count-title {
    font-size: 50px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
	  text-align: center;
	  font-weight: bold;
    color: #fff;
}

.stats-text {
    font-size: 15px;
    font-weight: normal;
    margin-top: 15px;
    margin-bottom: 0;
    text-align: center;
	  color: #fff;
	  text-transform: uppercase;
	  font-weight: bold;
}

.stats-line-black {
	margin: 12px auto 0;
    width: 55px;
    height: 2px;
    background-color: #fff;
}
.stats-icon {
	  font-size: 35px;
	  margin: 0 auto;
    float: none;
    display: table;
    color: #fff;
}

@media (max-width: 992px) {
	.counter {
		margin-bottom: 40px;
	}
}
</style>
<div class="container-fluid">
   
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="alert alert-light alert-dismissible fade show shadom-lg">
                <div class="row p-0 m-0">
                    <div class="col-md-1">
                        <div class="f-roboto text-green text-center">
                            <img src="{{ asset('company_pic/ru-logo.png') }}" alt="">
                           
                        </div>

                       
                    </div>

                    <div class="col-md-9">
                        <div class="f-roboto text-green text-center p-0 m-0 ">
                            <p class="h3" style=" margin-top:25px; display:inline-block;color:burlywood;">Welcome&nbsp;To&nbsp;Rajshahi&nbsp;University</p>
                           
                        </div>

                       
                    </div>

                </div>
                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
        </div>

       
    </div>

        @php
            $profile=App\Models\Profile::get();
            $department=App\Models\Department::get();
            $totalprofile=count($profile);
            $totaldepartment=count($department);
        @endphp
    <section id="statistic" class="statistic-section one-page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fas fa-users fa-2x stats-icon "></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" >{{ $totalprofile }}</span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Total Profiles</p>
                    </div>
                </div>
                
                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fa fa-briefcase fa-2x stats-icon"></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" >{{ $totaldepartment }}</span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Total Office</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    


@endsection
@push('css')
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
@endpush
@push('js')
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
            'X-CSRF-Token': "{{ csrf_token() }}"
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

@endpush
