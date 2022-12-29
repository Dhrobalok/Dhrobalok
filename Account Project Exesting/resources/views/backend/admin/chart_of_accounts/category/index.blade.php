@extends('backend.admin.index')
@section('content')
<div class="container-fluid mb-4">
    @if(Session :: get('success-message'))
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header bg-white">
                    <h4 class="f-100 mt-1 mb-1" style="color:#1dbf73"><i
                            class="fa fa-check-circle mr-2"></i>{{ Session :: get('success-message') }}</h4>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-100" style="font-weight:700; font-size:20px; color:blue">Account Categories
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
                            <a style="color:blue;font-weight:700" href="{{ route('category.create') }}">
                                <i class="fa fa-plus-circle mr-2"></i>Add New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped js-dataTable-full">
                        <thead>
                            <tr class="text-center">
                                <th>Name</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accountCategories as $account_category)
                            <tr class="text-center">
                                <td>{{ $account_category -> category_name }}</td>
                                <td>{{ $account_category -> category_type }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('category.edit',['category' => $account_category -> id]) }}"
                                            class="custom-btn mr-1"><i class="fa fa-info"></i></a>
                                        <form action="{{ route('category.destroy', ['category' => $account_category -> id])}}"
                                            method="post"
                                            onsubmit="return confirm('Are you sure you wish to delete?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i
                                                    class="fa fa-trash-alt"></i></button>
                                        </form>
                                    </div>
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
@endsection
