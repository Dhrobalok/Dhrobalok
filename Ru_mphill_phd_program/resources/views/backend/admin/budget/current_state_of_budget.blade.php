@extends('backend.admin.index')
@section('content')
<div class="container mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="f-roboto">Budget Current State</div>
                </div>
                <div class="card-body">
                     <form action = "{{ route('admin.budget.report.pdf') }}" method = "get">
                    <div class="row">
                        <div class="col-md-3">
                            
                        </div>
                        <div class="col-md-9 text-right">
                            <button type = "submit" class="f-100 btn btn-danger mr-4"><i
                                    class="fa fa-file-pdf mr-2"></i>Download PDF</button>
                        </div>
                    </div>
                     </form>
                    <div class="row mt-2">
                        <div class="col-md-12" style="max-height:500px;overflow-y:scroll">
                            <table class="table table-bordered table-sm table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <td>Account Name</td>
                                        <td>Account Type</td>
                                        <td>Usable Amount(Max)</td>
                                        <td>Remaining Amount</td>
                                        <td>Budget Type</td>
                                        <td>Status</td>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($entries as $entry)
                                    <tr class="text-center">
                                        <td>{{ $entry -> account -> name }}</td>
                                        <td>
                                            {{ $entry -> account -> account_category -> category_name }}
                                        </td>
                                        <td>
                                            {{ number_format($entry -> max_usable_amount) }}
                                        </td>
                                        <td>{{ number_format($entry -> remaining_amount) }}</td>
                                        <td>
                                          {{ $entry -> allocation_type }}
                                        </td>
                                        <td>
                                            {{ $entry -> status == 0 ? 'Normal' : 'Limit Exceeded'}}
                                        </td>
                                       
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