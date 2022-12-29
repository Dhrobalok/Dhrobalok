@extends('backend.admin.index')
@section('content')
<div class="block block-rounded" style="margin-left:22%;margin-right:2%;margin-top:7%;">
    <div class="block-header block-header-default">
        <h3 class="block-title">Project Labels</h3>
        @can('create budget')
        <a href="{{ route('budget-levels.create') }}">Add New Project Label</a>
        @endcan
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
                    <th class="d-none d-sm-table-cell text-center">Label Name</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($levels as $level)
                <tr>
                    <td class="text-center">{{ $level -> name }}</td>

                    <td>
                        <div class="btn-group">
                            @can('edit budget')
                            <a class="btn btn-sm btn-outline-primary"
                                href="{{ route('budget-levels.edit', $level -> id) }}"
                                style="border-radius:5px 5px 5px 5px"><i class="fas fa-info-circle"></i></a>
                            @endcan
                            @can('delete budget')
                            <form action="{{ route('budget-levels.destroy', $level->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit" style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-trash"></i></button>
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
