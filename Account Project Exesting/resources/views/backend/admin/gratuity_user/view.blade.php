@extends('backend.admin.index')

@section('content')
<!-- Page Content -->

<!-- Dynamic Table Full -->
<div class="block-content block-content-full">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <div class="f-roboto">Gratuity User Info</div>
                </div>
                <div class="col-md-3 text-right">
                   
                    <a href="{{ route('admin.gratuity-users.index') }}" class="btn btn-info f-100"><i
                            class="fa fa-arrow-left mr-2"></i>Back</a>
                   
                </div>
                <div class="col-md-3 text-right">
                     
                       @if($user -> status == 0)
                       <button type="button" class="btn btn-info f-100" id = "approve_btn"><i class="fa fa-check mr-2"></i>Approve</button>
                       @endif
                    
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row text-black">
                <div class="col-md-6 text-right">
                    <p class="f-100">Employee Name : </p>
                </div>
                <div class="col-md-6">
                    <p class="f-100">{{ $user -> getEmployee -> name }}</p>
                </div>
            </div>
            <div class="row text-black">
                <div class="col-md-6 text-right">
                    <p class="f-100">Grade : </p>
                </div>
                <div class="col-md-6">
                    <p class="f-100">{{ $user -> getGrade -> name }}</p>
                </div>
            </div>
            <div class="row text-black">
                <div class="col-md-6 text-right">
                    <p class="f-100">PayScale : </p>
                </div>
                <div class="col-md-6">
                    <p class="f-100">{{ $user -> getPayScale -> name }}</p>
                </div>
            </div>
            <div class="row text-black">
                <div class="col-md-6 text-right">
                    <p class="f-100">Last Basic Salary : </p>
                </div>
                <div class="col-md-6">
                    <p class="f-100">{{ $user -> last_basic_pay }} Taka</p>
                </div>
            </div>
            <div class="row text-black">
                <div class="col-md-6 text-right">
                    <p class="f-100">Retire Date : </p>
                </div>
                <div class="col-md-6">
                    <p class="f-100">{{ date('Y-m-d',strtotime($user -> retd_date)) }}</p>
                </div>
            </div>
            {{-- 
                
                
              
            <div class="row text-black">
                <div class="col-md-6 text-right">
                    <p class="f-100">Total Service Year : </p>
                </div>
                <div class="col-md-6">
                    <p class="f-100">{{ $user -> total_service_year }} Yrs</p>
                </div>
            </div>

            <div class="row text-black">
                <div class="col-md-6 text-right">
                    <p class="f-100">Percentage Of Basic Pay: </p>
                </div>
                <div class="col-md-6">
                    <p class="f-100">{{ $user -> percentage_basic_pay }} % </p>
                </div>
            </div>
            <div class="row text-black">
                <div class="col-md-6 text-right">
                    <p class="f-100">Mandatory PF Per Taka: </p>
                </div>
                <div class="col-md-6">
                    <p class="f-100">{{ $user -> mandatory_pf_per_tk }} Taka </p>
                </div>
            </div>

             <div class="row text-black">
                <div class="col-md-6 text-right">
                    <p class="f-100">Total : </p>
                </div>
                <div class="col-md-6">
                    <p class="f-100">{{ $user -> total_amount }} Taka </p>
                </div>
            </div>

         --}}
            <div class="row text-black">
                <div class="col-md-6 text-right">
                    <p class="f-100">Gratuity Date: </p>
                </div>
                <div class="col-md-6">
                    <p class="f-100">{{ date('Y-m-d',strtotime($user -> gratuity_date)) }}</p>
                </div>
            </div>
            
           
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
$('#approve_btn').click(function() {

    if (confirm('Are you sure to approve?')) {
        const gratuity_user_id = "{{ $user -> id }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url: "{{ route('admin.gratuity-user.approve') }}",
            type: "post",
            data: {
                gratuity_user_id: gratuity_user_id
            },
            success: function(message) {
                Swal.fire({
                    'title': message,
                    'icon': 'success'
                })
            }
        });
    }
});
</script>
@endpush