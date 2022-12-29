@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-info">
                <div class="card-header f-100 border-info">
                  <b>Online Biller Profile</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Organization/Individual Name : </label>
                        </div>
                        <div class="col-lg-6">
                            <label>{{ $bill_user -> user_info -> name }}</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Email : </label>
                        </div>
                        <div class="col-lg-6">
                            <label>{{ $bill_user -> user_info -> email }}</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Contact No : </label>
                        </div>
                        <div class="col-lg-6">
                            <label>{{ $bill_user -> contact_no }}</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Address : </label>
                        </div>
                        <div class="col-lg-6">
                            <label>{{ $bill_user -> address }}</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Status : </label>
                        </div>
                        <div class="col-lg-6">
                            @if($bill_user -> status == 0)
                            <label>Inactive</label>
                            @else
                            <label>Active</label>
                            @endif
                        </div>
                    </div>
                    
                    @if($bill_user -> status == 0)
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button class="btn btn-primary f-100"
                                onclick="approve_confirm({{ $bill_user -> id}})">Approve</button>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
function approve_confirm(bill_user_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': "{{ csrf_token() }}"
        }
    });

    $.ajax({
        url: "{{ route('approve-bill-user') }}",
        type: "post",
        data: {
            Id: bill_user_id
        },
        success: function(response) {
            Swal.fire('Suucessfully approved');
        }
    })
}
</script>
@endpush