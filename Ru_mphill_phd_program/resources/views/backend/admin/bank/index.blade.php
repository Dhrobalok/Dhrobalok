@extends('backend.admin.index')
@section('content')
<div class="block block-rounded" style="margin-left:22%;margin-right:2%;margin-top:7%;">
    <div class="block-header block-header-default">
        <h3 class="block-title">Banks</h3>
         {{-- @can('create banks') --}}
        <a href="{{ route('admin.banks.create') }}">Add New Bank</a>
        {{-- @endcan --}}
    </div>
    <div class="block-content block-content-full">
        @if(Session :: get('message') != NULL)
        <div class="alert alert-danger">
            {{ Session :: get('message') }}
            @php
            Session :: put('message',NULL);
            @endphp
        </div>
        @endif
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Bank Name</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banks as $bank)
                <tr>
                    <td class="text-center">{{ $bank -> bank_name }}</td>

                    <td>
                        <div class="btn-group">
                           @can('view banks')
                            <a class="btn btn-sm btn-outline-primary"
                                href="{{ route('admin.banks.view',['bank_id' => $bank -> id]) }}"
                                style="border-radius:5px 5px 5px 5px"><i class="fas fa-info-circle"></i></a>
                           @endcan
                           {{-- @can('delete banks') --}}
                            <a class="btn btn-sm btn-outline-danger"
                                href="{{ route('admin.banks.delete',['bank_id' => $bank -> id]) }}"
                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-trash"></i></a>
                          {{-- @endcan --}}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
