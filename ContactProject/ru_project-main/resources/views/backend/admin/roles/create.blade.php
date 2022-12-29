@extends('backend.admin.index')

@section('content')


<div class="card">
<div class="block-content block-content-full">
    <div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Id</th>
                <th class="d-none d-sm-table-cell text-center">User Name</th>
                <th class="d-none d-sm-table-cell text-center">Action</th>
               
                
            </tr>
        </thead>
        @php
            $i=1;
        @endphp
        <tbody>
            @foreach ($alluser as $userall)
            <tr>
               
                <td >{{ $i++ }}</td>
                <td >{{$userall->name }}</td>
                <td ><a href="{{ route('permission',['userid'=>$userall->id]) }}">permission</a></td>
                    
            
                
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
</div>
@endsection

