@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="f-roboto">Generate Pension</div>
                </div>
                <div class="card-body">
                <form id="generate_pension" action="{{ route('admin.pension.generate.confirm') }}" method="post">
                  @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-md-2">
                                            <label>Month : </label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="month">
                                                @for($months = 1; $months <= 12; $months++) @php $month_name=date('F',
                                                    mktime(0, 0, 0, $months, 10));@endphp <option
                                                    value="{{ $month_name  }}">{{ $month_name }}</option>
                                                    @endfor

                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Year : </label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="year">
                                                @for($year = 2021; $year <= 2035; $year++) <option value={{ $year }}>
                                                    {{ $year }}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <input type="hidden" name="mode" value="generate" id="mode">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <h3 class="f-100">{{ $company -> company_name }}</h3>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <h4 class="f-100" style="line-height:10px">
                                                    {{ $company -> company_address }}</h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead>
                                                        <tr class="text-center text-black">
                                                            <th>Employee</th>
                                                            <th>Grade</th>
                                                            <th>PayScale</th>
                                                            <th>Last Basic Pay</th>
                                                            <th>Basic Pension</th>
                                                            <th>Health Allow.</th>
                                                            <th>
                                                                Bonus
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        @foreach($users as $user)
                                                        <tr class="text-center">
                                                            <td>{{ $user -> getEmployee -> name }}</td>
                                                            <td>{{ $user -> getGrade -> name  }}</td>
                                                            <td>{{ $user -> getPayScale -> name  }}</td>
                                                            <td>{{ $user -> last_basic_pay }}</td>
                                                            <td>{{ $user -> basic_pension_amount }}</td>
                                                            <td>{{ $user -> health_fee }}</td>
                                                            <td style="width:10%">
                                                                <input type="number" class="form-control" name="bonus[]"
                                                                    value="0" required>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-info mr-2 f-100"
                                                        id = "generate_btn">Generate</button>
                                                    <button type="submit" class="btn btn-danger f-100"
                                                        id = "download_btn">Print Generate Preview</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
  $('#generate_btn').click(function(e){
     e.preventDefault();
     const Data  = new FormData($('#generate_pension')[0]);

      $.ajaxSetup({
          headers:
          {
              'X-CSRF-Token' : "{{ csrf_token() }}"
          }
      });
      $.ajax({
          url : "{{ route('admin.pension.generate.confirm') }}",
          type : "post",
          data: Data,
          processData : false,
          contentType : false,
          success:function(message){
              Swal.fire({
                 'title' : message,
                 'icon' : 'success'
              });
          }
      })
  });
  $('#download_btn').click(function(){
      $('#mode').val('download');
      $('#pension_generate').submit();
  });
</script>
@endpush