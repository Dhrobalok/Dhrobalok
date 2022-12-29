<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Dashboard</title>

    <meta name="description"
        content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description"
        content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('backend.header-footer-files.css_files')
    @stack('css')


</head>
<body>
    

<div class="card-body">
    <div class="table-responsive">
    <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Sl. No</th>
                <th class="d-none d-sm-table-cell text-center">OfficeName</th>
                <th class="d-none d-sm-table-cell text-center">Office No</th>
                <th class="d-none d-sm-table-cell text-center">Type</th>
                
                <th class="d-none d-sm-table-cell text-center">Cell.No</th>
                <th class="d-none d-sm-table-cell text-center">Email</th>
                
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($informationall as $inform )
                @php
                    $categoryname=App\Models\Categor::where('id',$inform->category_id)->first();
                @endphp
            
            <tr>
                <td class="text-center">{{ $i++ }}</td>
                <td class="text-center">{{ $inform->officename }}</td>
                <td class="text-center">{{ $inform->officeno }}</td>
                <td class="text-center">{{ $categoryname->category_name }}</td>
                <td class="text-center">{{ $inform->cell_no }}</td>
                <td class="text-center">{{ $inform->email }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>

        </div>

    </body>
    </html>
