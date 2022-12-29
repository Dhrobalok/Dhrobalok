@extends('backend.admin.index')

@section('content')
<div class="container">
    <!-- Page Content -->       
    <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Budgets</h3>
                @can('create budget')
                <a href="{{route('budgets.create')}}" ><i class="fa fa-plus" style="float: right;" data-toggle="tooltip" title="Create New Budget"></i></a>
                @endcan
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell text-center">Name</th>
                            <th class="d-none d-sm-table-cell text-center">Label</th>
                            <th class="d-none d-sm-table-cell text-center">Start</th>
                            <th class="d-none d-sm-table-cell text-center">End</th>
                            <th class="d-none d-sm-table-cell text-center">Cost</th>
                            <th class="d-none d-sm-table-cell text-center">Status</th>
                            <th class="d-none d-sm-table-cell text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($budgets as $budget)                        
                        <tr>
                            <td class="text-center">{{$budget->name}}</td>
                            @php
                                $label = App\Models\BudgetLevel::find($budget->level_id);
                            @endphp
                            <td class="text-center">{{$label->name}}</td>
                            @php
                                $start_date = substr($budget->start_date, 0, 10);
                                $end_date = substr($budget->end_date, 0, 10);
                            @endphp
                            <td class="text-center">{{$start_date}}</td>
                            <td class="text-center">{{$end_date}}</td>
                            <td class="text-center">{{$budget->cost}}</td>
                            @if($budget->status == 0)
                            <td class="text-center"><span class="badge badge-dark">Inactive</span></td>
                            @elseif($budget->status == 1)
                            <td class="text-center"><span class="badge badge-success">Active</span></td>
                            @else
                            <td class="text-center"><span class="badge badge-warning">Modified</span></td>
                            @endif
                            <td class="d-none d-sm-table-cell">
                                <div class="btn-group">
                                     @can('edit budget')
                                     <a class="btn btn-sm btn-outline-primary" href="{{ route('budgets.edit', $budget->id) }}"
                                style="margin-left:5%;border-radius:5px 5px 5px 5px"><i class="fas fa-edit"></i></a>

                                     <!-- <button class="btn shadow-none" style=" float: left;"><a href="{{ route('budgets.edit', $budget->id) }}"><i class="fa fa-edit" style="padding-right: 5px;" data-toggle="tooltip" title="Edit"></i></a></button> -->
                                     <button class="btn btn-sm btn-outline-primary" style="margin-left:8%;border-radius:5px 5px 5px 5px"><a href="{{ route('budgets.modify', $budget->id) }}"><i class="fas fa-info" style="padding-right: 5px;" data-toggle="tooltip" title="Add/Subtract"></i></a></button>
                                     @endcan
                                    <!-- <i class="fa fa-edit" style="padding-right: 5px;" data-toggle="tooltip" title="Edit Role"></i> -->
                                    @can('delete budget')
                                    <form action="{{ route('budgets.destroy', $budget->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-sm btn-outline-primary" type="submit" style="color:red;border-color:red;margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fa fa-trash" style="border: none;" data-toggle="tooltip" title="Delete Budget"></i></button>
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
        <!-- END Dynamic Table Full -->
        </div>
    <!-- END Page Content 
                            
                            

    -->
@endsection




