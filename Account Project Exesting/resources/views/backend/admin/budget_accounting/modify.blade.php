@extends('backend.admin.index')

@section('content')
<!-- Page Content -->
<div class="content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Modify Budget Accounting</h3>
            <a class="btn btn-primary" href="{{ route('budget-accountings.index') }}"> Back</a>
        </div>

        <form id="accounts_form_create" action="{{ route('budget-accountings.change', $budac->id) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Changed budget</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="cost" name="cost" required>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <button type="submit" class="form-control btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END Dynamic Table Full -->

</div>
<!-- END Page Content -->

@endsection
