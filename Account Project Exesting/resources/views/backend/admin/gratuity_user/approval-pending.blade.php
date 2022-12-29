@extends('backend.admin.index')
@section('content')

<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Approval Pending Gratuity Users</h3>
       
    </div>
    <div class="block-content block-content-full">
        <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>

                    <th class="d-none d-sm-table-cell text-center">Name</th>
                    <th class="d-none d-sm-table-cell text-center">Total Gratuity Amount</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

                <tr class="text-center">
                    @php
                    $total=App\Models\Gratuity::where('employee_id',$user -> employee_id)->get()->sum('contribution');
                @endphp


                    <td class="text-center">{{ $user -> getEmployee -> name }}</td>
                    <td class="text-center">{{ $total }}</td>
                    @if($user -> status == 0)
                    <td class="text-center"><span class="badge badge-dark">Under Review</span></td>
                    @elseif($user -> status == 1)
                    <td class="text-center"><span class="badge badge-success">Approved</span></td>
                    @else
                    <td class="text-center"><span class="badge badge-info">Completed</span></td>
                    @endif
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-info mr-2"
                                href="{{ route('admin.gratuity-users.view',['id' => $user -> id]) }}"><i
                                    class="fas fa-info-circle"></i></a>
                            
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
