@extends('backend.admin.index')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Dynamic Table Full -->
        <div class="block"  style = "min-width:850px; float:left;">
            <div class="block-header block-header-default">
                <h3 class="block-title">Budget Accounting</h3>
                @can('create budget')
                <a href="{{route('budget-accountings.create')}}" ><i class="fa fa-plus" style="float: right;" data-toggle="tooltip" title="New Budget Accounting"></i></a>
                @endcan
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th>Budget</th>
                            <th>Account</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Cost</th>
                            <th>Status</th>
                            <th class="d-none d-sm-table-cell">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($budget_accountings as $budac)                        
                        <tr>
                            @php
                                $budget = App\Models\Budget::find($budac->budget_id);
                                $account = App\Models\ChartOfAccount::find($budac->coa_id);
                                $start_date = substr($budac->start_date, 0, 10);
                                $end_date = substr($budac->end_date, 0, 10);
                            @endphp
                            <td class="text-center">{{$budget->name}}</td>
                            <td class="text-center">{{$account->name}}</td>
                            <td class="text-center">{{$start_date}}</td>
                            <td class="text-center">{{$end_date}}</td>
                            <td class="text-center">{{$budac->cost}}</td>
                            @if($budac->status == 0)
                            <td class="text-center"><span class="badge badge-dark">Inactive</span></td>
                            @elseif($budac->status == 1)
                            <td class="text-center"><span class="badge badge-success">Active</span></td>
                            @else
                            <td class="text-center"><span class="badge badge-warning">Modified</span></td>
                            @endif
                            <td class="d-none d-sm-table-cell">
                                <div class="btn-group">
                                     @can('edit budget')
                                     <button class="btn shadow-none" style=" float: left;"><a href="{{ route('budget-accountings.edit', $budac->id) }}"><i class="fa fa-edit" style="padding-right: 5px;" data-toggle="tooltip" title="Edit"></i></a></button>
                                     <button class="btn shadow-none" style=" float: left;"><a href="{{ route('budget-accountings.modify', $budac->id) }}"><i class="fa fa-info" style="padding-right: 5px;" data-toggle="tooltip" title="Add/Subtract"></i></a></button>
                                     @endcan
                                    <!-- <i class="fa fa-edit" style="padding-right: 5px;" data-toggle="tooltip" title="Edit Role"></i> -->
                                    @can('delete budget')
                                    <form action="{{ route('budget-accountings.destroy', $budac->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn shadow-none" type="submit" style="float: left; "><i class="fa fa-trash" style="border: none;" data-toggle="tooltip" title="Delete Budget"></i></button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full
        </div> -->
    <!-- END Page Content 
                            
                            

    -->
@endsection


