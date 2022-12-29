
@extends('backend.admin.index')




@section('content')

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

    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-light alert-dismissible fade show shadom-lg" role="alert">
                <div class="row p-0 m-0">
                    <div class="col-md-1">
                        <div class="f-roboto text-green text-center">
                            <img class="img3" src="{{ asset('images/excavator-construction-logo-with-buildings_23-2148657768.webp') }}" alt="">


                        </div>


                    </div>

                    <div class="col-md-10 pt-4">

                        <div class="f-roboto text-green text-center p-0 m-0">
                            <p class="h4" style="display:inline-block;color:#1dbf73;">Welcome&nbsp;To&nbsp;Builders&nbsp;Community</p>

                        </div>


                   </div>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>


      @php
          $alluser=App\Models\User::Where('status',1)->get();
          $userall=count($alluser);
          $companystatus=Session::get('companystatus');
          $id=Session::get('id');
          $status=Session::get('status');
      @endphp
      @php
          $apart=App\Models\Project::get();
          $totalApt=count($apart);
          $land=App\Models\Land::get();
          $totalLand=count($land);
          $brick=App\Models\Brick::get();
          $totalBrick=count($brick);

          $Total=$totalApt+$totalLand+$totalBrick;

          $totalrewal=App\Models\Payslip::where('status',0)->get();
          $totalfee=count($totalrewal);

          $totaluser=App\Models\User::where('status',0)->get();
          $totalReg=count($totaluser);

      @endphp
      @if ($status==2)

      <section id="statistic" class="statistic-section one-page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fas fa-users fa-2x stats-icon "></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" >{{ $userall }}</span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Total Users</p>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fa fa-laptop fa-2x stats-icon"></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" >{{ $Total }}</span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Total Project</p>
                    </div>
                </div>


                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fa fa-credit-card fa-2x stats-icon"></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" >{{ $totalfee }}</span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Renewal Request</p>
                    </div>
                </div>


                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fas fa-users fa-2x stats-icon"></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" >{{ $totalReg}}</span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">New Register</p>
                    </div>
                </div>


            </div>
        </div>
    </section>


     @else
      @if ($companystatus=='Apartment')
        @php
              $allproject=App\Models\Project::where('employeeid', $id)->get();
              $all=count($allproject);
        @endphp

       @elseif ($companystatus=='Brick')

           @php

              $allproject=App\Models\Brick::where('employee_id', $id)->get();
              $all=count($allproject);
           @endphp

      @elseif ($companystatus=='Land')

           @php

           $allproject=App\Models\Land::where('employeeid', $id)->get();
           $all=count($allproject);
          @endphp

      @elseif ($companystatus=='Cement')

           @php

            $allproject=App\Models\Cement::where('employee_id', $id)->get();
            $all=count($allproject);
          @endphp

     @elseif ($companystatus=='Steel')

        @php

         $allproject=App\Models\Steel::where('employee_id', $id)->get();
         $all=count($allproject);
       @endphp

    @elseif ($companystatus=='Tiles')

        @php

        $allproject=App\Models\Tile::where('employee_id', $id)->get();
        $all=count($allproject);
       @endphp


    @elseif ($companystatus=='Door')

     @php

       $allproject=App\Models\Door::where('employee_id', $id)->get();
       $all=count($allproject);
     @endphp


    @elseif ($companystatus=='Sanitary')

       @php

        $allproject=App\Models\Sanitar::where('employee_id', $id)->get();
        $all=count($allproject);
      @endphp


@elseif ($companystatus=='Feetings')

@php

 $allproject=App\Models\Fiting::where('employee_id', $id)->get();
 $all=count($allproject);
@endphp


@elseif ($companystatus=='Sand')

@php

 $allproject=App\Models\Sand::where('employee_id', $id)->get();
 $all=count($allproject);
@endphp

@elseif ($companystatus=='Hardware')

@php

 $allproject=App\Models\Hardwar::where('employee_id', $id)->get();
 $all=count($allproject);
@endphp

@elseif ($companystatus=='Electric')

@php

 $allproject=App\Models\Electric::where('employee_id', $id)->get();
 $all=count($allproject);
@endphp


@elseif ($companystatus=='Paint')

@php

 $allproject=App\Models\Paint::where('employee_id', $id)->get();
 $all=count($allproject);
@endphp

@elseif ($companystatus=='Architect')

@php

 $allproject=App\Models\Architect::where('employee_id', $id)->get();
 $all=count($allproject);
@endphp

@elseif ($companystatus=='Interior')

@php

 $allproject=App\Models\Interior::where('employee_id', $id)->get();
 $all=count($allproject);
@endphp





    @endif

      <section id="statistic" class="statistic-section one-page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fas fa-users fa-2x stats-icon "></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" >{{ $userall }}</span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Total Users</p>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fa fa-laptop fa-2x stats-icon"></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" >{{ $all }}</span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Total Project</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

      @endif




        <!--  fmjdfndfkdb -->


            </div>
        </div>
    </div>
</div>


<script>

    $('.counter').counterUp({
delay: 10,
time: 2000
});
$('.counter').addClass('animated fadeInDownBig');
$('h3').addClass('animated fadeIn');

</script>

@endsection




@push('js')
{{-- <script>
    $('.counter').counterUp({
  delay: 10,
  time: 2000
});
$('.counter').addClass('animated fadeInDownBig');
$('h3').addClass('animated fadeIn');
</script> --}}





@endpush





{{-- <script>

    $(document).ready(function() {
        alert('fdfg')
       $('.count-number').counterUp({
           delay: 10,
           time: 100
       });
});
</script> --}}






{{-- @push('css')

@endpush

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

@endpush --}}


