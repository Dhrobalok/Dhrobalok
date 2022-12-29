@extends('backend.admin.index')
@section('content')
<div class="container-fluid pl-0 pr-0 ml-0 mr-0 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row text-right">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a class="custom-btn bg-primary border-0 mr-2"
                                    href="{{ route('admin.payment-terms.index') }}">Back</a>
                                <a class="custom-btn"
                                    href="{{ route('admin.payment-terms.edit',['terms_id' => $term -> id]) }}">Edit</a>
                            </div>
                        </div>
                    </div>

                    <div class="f-roboto mb-4">Payment Term Information</div>

                    <div class="row">
                        <div class="col-md-2">
                            <label>Name</label>
                        </div>
                        <div class="col-md-10 pr-0">
                            <p class="f-100">{{ $term -> name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Description in Invoice</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-0">
                            <p class="f-100">{{ $term -> description_on_invoice }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Created By</label>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $term -> user -> name }}</p>
                        </div>
                        <div class="col-md-1">
                            <label>Status</label>
                        </div>
                        <div class="col-md-3">
                            <p class="f-100">{{ $term -> status ? "Active" : "Deactive"}} </p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="f-roboto">Rules</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped text-black">
                                <thead>
                                    <tr>
                                        <th>Due Type</th>
                                        <th>Percentage/Amount</th>
                                        <th>Number Of Days</th>
                                        <th>Options</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="rules">
                                    @foreach($term -> details as $term_detail)
                                    <tr>
                                       
                                        <td>
                                            {{ $term_detail -> due_type }}
                                        </td>
                                        <td>
                                            {{ $term_detail -> amount }}
                                        </td>
                                        <td>
                                            {{ $term_detail -> number_of_days }}
                                        </td>
                                        <td>{{  $term_detail -> option }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection