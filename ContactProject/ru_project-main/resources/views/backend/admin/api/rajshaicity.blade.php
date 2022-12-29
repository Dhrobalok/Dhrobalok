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
    {{-- @include('backend.header-footer-files.css_files')
    @stack('css') --}}


</head>
<body>
    

<div class="card-body">
    <div class="table-responsive">
    {{-- <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
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
        <tbody> --}}
            @php
                $i=1;
                $ff=0;
                
            @endphp
             @php 
             $informationalls = json_encode($informationall, true);
            @endphp
            @foreach ( $informationalls as $inform )
                @php
                    $categoryname=App\Models\Categor::where('id',$inform['category_id'])->first();
                    // $string = explode("-",$categoryname->category_name);
                    $REMOVESPACE=preg_replace('/[\s_]/', '', $categoryname->category_name);
                @endphp
            
           

            @if(Str::lower($REMOVESPACE) == "rajshahicity")
                
            
            <tr>
                @php
                echo "{{";
            @endphp
            "Id":"{{ $i++ }}"
            <br>
            
            "OfficeName":"{{ $inform['officename'] }}"
            <br>
            
            "OfficeType":"{{ $inform['officeno'] }}"
            <br>
            "Category":"{{ $categoryname['category_name'] }}"
            <br>
            "CellNo":"{{ $inform['cell_no'] }}"
            <br>
            "Email":"{{ $inform['email'] }}"
             <br>
            @php
                echo "}}";
            @endphp
            <br>
                
            </tr>
            @endif
            
            @endforeach
        {{-- </tbody>
        </table> --}}
    </div>

        </div>

    </body>
    </html>
