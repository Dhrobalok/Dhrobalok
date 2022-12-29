<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>RU Contact</title>

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
     <!-- edit inline-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    <script>$.fn.poshytip={defaults:null}</script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
    <!-- edit inline-->
 

    @include('backend.header-footer-files.css_files')
    @stack('css')



     <style>
        
    /* img
      {
        width: 60px;
        height: 70px;
        background: #fff;
        border-radius: 15px;
      }

      .img3
      {
        width: 90px;
        height: 90px;
        background: #fff;
        border-radius: 10px;

      } */

      .logo
      {
        width: 60px;
        height: 60px;
        background: #fff;
        border-radius: 35px;

      }
     </style>
</head>

<body>
    @php $user = Auth :: user(); @endphp
    <div id="page-container"
        class="enable-page-overlay side-scroll page-header-fixed main-content-narrow side-trans-enabled sidebar-o-xs sidebar-o page-header-dark">
        <!-- Side Overlay-->
        <aside id="side-overlay">
            <!-- Side Header -->
            <div class="bg-image" style="background-image: url("
                {{asset('media/various/bg_side_overlay_header.jpg')}}")>
                <div class="bg-primary-op">
                    <div class="content-header">

                        <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout"
                            data-action="side_overlay_close">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Side Overlay -->
                    </div>
                </div>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="content-side">
                <!-- Side Overlay Tabs -->
                <div class="block block-transparent pull-x pull-t">
                    <ul class="nav nav-tabs nav-tabs-block nav-justified" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#so-settings">
                                <i class="fa fa-fw fa-cog"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#so-people">
                                <i class="far fa-fw fa-user-circle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#so-profile">
                                <i class="far fa-fw fa-edit"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="block-content tab-content overflow-hidden">
                        <!-- Settings Tab -->
                        <div class="tab-pane pull-x fade fade-up show active" id="so-settings" role="tabpanel">
                            <div class="block mb-0">
                                <!-- Color Themes -->
                                <!-- Toggle Themes functionality initialized in Template._uiHandleTheme() -->
                                <div class="block-content block-content-sm block-content-full bg-body">
                                    <span class="text-uppercase font-size-sm font-w700">Color Themes</span>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="row gutters-tiny text-center">
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-default"
                                                data-toggle="theme" data-theme="default" href="#">
                                                Default
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xwork"
                                                data-toggle="theme"
                                                data-theme="{{asset('assets/css/themes/xwork.min.css')}}" href="#">
                                                xWork
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xmodern"
                                                data-toggle="theme"
                                                data-theme="{{asset('assets/css/themes/xmodern.min.css')}}" href="#">
                                                xModern
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xeco"
                                                data-toggle="theme"
                                                data-theme="{{asset('assets/css/themes/xeco.min.css')}}" href="#">
                                                xEco
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xsmooth"
                                                data-toggle="theme"
                                                data-theme="{{asset('assets/css/themes/xsmooth.min.css')}}" href="#">
                                                xSmooth
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xinspire"
                                                data-toggle="theme"
                                                data-theme="{{asset('assets/css/themes/xinspire.min.css')}}" href="#">
                                                xInspire
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xdream"
                                                data-toggle="theme"
                                                data-theme="{{asset('assets/css/themes/xdream.min.css')}}" href="#">
                                                xDream
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xpro"
                                                data-toggle="theme"
                                                data-theme="{{asset('assets/css/themes/xpro.min.css')}}" href="#">
                                                xPro
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xplay"
                                                data-toggle="theme"
                                                data-theme="{{asset('assets/css/themes/xplay.min.css')}}" href="#">
                                                xPlay
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <a class="d-block py-3 bg-body-dark font-w600 text-dark" href="#">All Color
                                                Themes</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Color Themes -->

                                <!-- Sidebar -->
                                <div class="block-content block-content-sm block-content-full bg-body">
                                    <span class="text-uppercase font-size-sm font-w700">Sidebar</span>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="row gutters-tiny text-center">
                                        <div class="col-6 mb-1">
                                            <a class="d-block py-3 bg-body-dark font-w600 text-dark"
                                                data-toggle="layout" data-action="sidebar_style_dark"
                                                href="javascript:void(0)">Dark</a>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <a class="d-block py-3 bg-body-dark font-w600 text-dark"
                                                data-toggle="layout" data-action="sidebar_style_light"
                                                href="javascript:void(0)">Light</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Sidebar -->

                                <!-- Header -->
                                <div class="block-content block-content-sm block-content-full bg-body">
                                    <span class="text-uppercase font-size-sm font-w700">Header</span>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="row gutters-tiny text-center mb-2">
                                        <div class="col-6 mb-1">
                                            <a class="d-block py-3 bg-body-dark font-w600 text-dark"
                                                data-toggle="layout" data-action="header_style_dark"
                                                href="javascript:void(0)">Dark</a>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <a class="d-block py-3 bg-body-dark font-w600 text-dark"
                                                data-toggle="layout" data-action="header_style_light"
                                                href="javascript:void(0)">Light</a>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <a class="d-block py-3 bg-body-dark font-w600 text-dark"
                                                data-toggle="layout" data-action="header_mode_fixed"
                                                href="javascript:void(0)">Fixed</a>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <a class="d-block py-3 bg-body-dark font-w600 text-dark"
                                                data-toggle="layout" data-action="header_mode_static"
                                                href="javascript:void(0)">Static</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Header -->

                                <!-- Content -->
                                <div class="block-content block-content-sm block-content-full bg-body">
                                    <span class="text-uppercase font-size-sm font-w700">Content</span>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="row gutters-tiny text-center">
                                        <div class="col-6 mb-1">
                                            <a class="d-block py-3 bg-body-dark font-w600 text-dark"
                                                data-toggle="layout" data-action="content_layout_boxed"
                                                href="javascript:void(0)">Boxed</a>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <a class="d-block py-3 bg-body-dark font-w600 text-dark"
                                                data-toggle="layout" data-action="content_layout_narrow"
                                                href="javascript:void(0)">Narrow</a>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <a class="d-block py-3 bg-body-dark font-w600 text-dark"
                                                data-toggle="layout" data-action="content_layout_full_width"
                                                href="javascript:void(0)">Full Width</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Content -->

                                <!-- Layout API -->
                                <div class="block-content row justify-content-center border-top">
                                    <div class="col-9">
                                        <a class="btn btn-block btn-hero-primary" href="be_layout_api.html">
                                            <i class="fa fa-fw fa-flask mr-1"></i> Layout API
                                        </a>
                                    </div>
                                </div>
                                <!-- END Layout API -->
                            </div>
                        </div>


                        <!-- Profile -->
                        <div class="tab-pane pull-x fade fade-up" id="so-profile" role="tabpanel">
                            <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                                <div class="block mb-0">
                                    <!-- Personal -->
                                    <div class="block-content block-content-sm block-content-full bg-body">
                                        <span class="text-uppercase font-size-sm font-w700">Personal</span>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" readonly class="form-control" id="staticEmail"
                                                value="Admin">
                                        </div>
                                        <div class="form-group">
                                            <label for="so-profile-name">Name</label>
                                            <input type="text" class="form-control" id="so-profile-name"
                                                name="so-profile-name" value="George Taylor">
                                        </div>
                                        <div class="form-group">
                                            <label for="so-profile-email">Email</label>
                                            <input type="email" class="form-control" id="so-profile-email"
                                                name="so-profile-email" value="g.taylor@example.com">
                                        </div>
                                    </div>
                                    <!-- END Personal -->

                                    <!-- Password Update -->
                                    <div class="block-content block-content-sm block-content-full bg-body">
                                        <span class="text-uppercase font-size-sm font-w700">Password Update</span>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="form-group">
                                            <label for="so-profile-password">Current Password</label>
                                            <input type="password" class="form-control" id="so-profile-password"
                                                name="so-profile-password">
                                        </div>
                                        <div class="form-group">
                                            <label for="so-profile-new-password">New Password</label>
                                            <input type="password" class="form-control" id="so-profile-new-password"
                                                name="so-profile-new-password">
                                        </div>
                                        <div class="form-group">
                                            <label for="so-profile-new-password-confirm">Confirm New Password</label>
                                            <input type="password" class="form-control"
                                                id="so-profile-new-password-confirm"
                                                name="so-profile-new-password-confirm">
                                        </div>
                                    </div>
                                    <!-- END Password Update -->

                                    <!-- Options -->
                                    <div class="block-content block-content-sm block-content-full bg-body">
                                        <span class="text-uppercase font-size-sm font-w700">Options</span>
                                    </div>
                                    <div class="block-content">
                                        <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                            <input type="checkbox" class="custom-control-input" id="so-settings-status"
                                                name="so-settings-status" value="1">
                                            <label class="custom-control-label" for="so-settings-status">Online
                                                Status</label>
                                        </div>

                                        <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                            <input type="checkbox" class="custom-control-input"
                                                id="so-settings-notifications" name="so-settings-notifications"
                                                value="1" checked>
                                            <label class="custom-control-label"
                                                for="so-settings-notifications">Notifications</label>
                                        </div>



                                    </div>
                                    <!-- END Options -->

                                    <!-- Submit -->
                                    <div class="block-content row justify-content-center border-top">
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-block btn-hero-primary">
                                                <i class="fa fa-fw fa-save mr-1"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                    <!-- END Submit -->
                                </div>
                            </form>
                        </div>
                        <!-- END Profile -->
                    </div>
                </div>
                <!-- END Side Overlay Tabs -->
            </div>
            <!-- END Side Content -->
        </aside>
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="bg-header-dark">
                <div class="content-header bg-white-10">
                    
                    <!-- Logo -->
                    <a class="font-w600 text-white tracking-wide" href="{{ route('admin.index') }}">
                        <span class="smini-visible">
                            D<span class="opacity-75"></span>
                        </span>
                        <span class="smini-hidden">
                            
                            <img class="logo" src="{{ asset('company_pic/ru-logo.png') }}" alt="" >  
                               
                            
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>

                        <!-- <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler"
                            data-class="fa-toggle-off fa-toggle-on"
                            onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');"
                            href="javascript:void(0)">
                            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                        </a> -->

                        <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close"
                            href="javascript:void(0)">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
            </div>
            <div class="js-sidebar-scroll">


                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.index') }}">
                                <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
                                <span class="nav-main-link-name">Dashboard </span>

                            </a>
                        </li>

                       
                      

                         @php
                             $id=Session::get('rollno'); 
                            //  $status=App\Models\User::where('id',$id)->first();

                         @endphp
                        
                         @if($id==2)
                            <li class="nav-main-item ">
                                <a class="nav-main-link" href="{{ route('rolesetting') }}">
                                    <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
                                    <span class="nav-main-link-name">Roles and Permissions</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                    aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
    
                                    <span class="nav-main-link-name">New Information</span>
                                </a>
                                <ul class="nav-main-submenu">
    
    
                                    <li class="nav-main-item">

                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ url('addcategory') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Add Category</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ url('designation') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Add Designation</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ url('newoffice') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Add office</span>
                                            </a>
                                        </li>
                                        
                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ url('newfacults') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Add Facults</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ route('newadditional') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Add Employee</span>
                                            </a>
                                        </li>

                                       
                                    </li>
                                </ul>
                            </li>

                           
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                    aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
    
                                    <span class="nav-main-link-name">Contacts</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    @php
                                          $uinitname=App\Models\Department::select('unit_name')->distinct()->get();
                                    @endphp
                                
                                  @foreach ($uinitname as $ofifcename)
                                  <li class="nav-main-item ">
                                    <a class="nav-main-link" href="{{ url('office.Show',$ofifcename->unit_name) }}">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">{{ $ofifcename->unit_name }}</span>
                                    </a>
                                </li>
                                  @endforeach
                                  

                                </ul>
                                   
                            </li>
                           


                            <li class="nav-main-item ">
                                <a class="nav-main-link" href="{{ route('user.aprove') }}">
                                    <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
                                    <span class="nav-main-link-name">Approve User</span>
                                </a>
                            </li>

                            <li class="nav-main-item ">
                                <a class="nav-main-link" href="{{ route('category.inform') }}">
                                    <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
                                    <span class="nav-main-link-name">Category Information</span>
                                </a>
                            </li>

                          

                            

                          


                            <li class="nav-main-item ">
                                <a class="nav-main-link" href="{{ route('indexadd') }}">
                                    <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
                                    <span class="nav-main-link-name">Additional Responsibility</span>
                                </a>
                            </li>

                         

                            <li class="nav-main-item ">
                                <a class="nav-main-link" href="{{ route('dataSyn') }}">
                                    <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
                                    <span class="nav-main-link-name">Data Synchronization</span>
                                </a>
                            </li>
                          @else
                         
                            @php
                              $employee_id=Session::get('employeeid');
            
                             $permission=App\Models\Permission::where('employee_id',$employee_id)->get();
     
                             @endphp
                             @foreach ( $permission as  $permission_id )
                             

                             @if ($permission_id->permission_Id==1)

                             <li class="nav-main-item ">
                                 <a class="nav-main-link" href="{{ route('category.inform') }}">
                                     <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
                                     <span class="nav-main-link-name">Category Information</span>
                                 </a>
                             </li>

                             <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                    aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
    
                                    <span class="nav-main-link-name">Contacts</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    @php
                                          $uinitname=App\Models\Department::select('unit_name')->distinct()->get();
                                    @endphp
                                
                                  @foreach ($uinitname as $ofifcename)
                                  <li class="nav-main-item ">
                                    <a class="nav-main-link" href="{{ url('office.Show',$ofifcename->unit_name) }}">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">{{ $ofifcename->unit_name }}</span>
                                    </a>
                                </li>
                                  
                                @endforeach

                                </ul>
                                   
                            </li>
                           
                           


                             @elseif($permission_id->permission_Id==3)

                             <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                    aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
    
                                    <span class="nav-main-link-name">New Information</span>
                                </a>
                                <ul class="nav-main-submenu">
    
    
                                    <li class="nav-main-item">

                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ url('addcategory') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Add Category</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ url('designation') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Add Designation</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ url('newoffice') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Add office</span>
                                            </a>
                                        </li>
                                        
                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ url('newfacults') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Add Facults</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ route('newadditional') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Add Employee</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item ">
                                            <a class="nav-main-link" href="{{ route('transfer') }}">
                                                <i class="nav-main-link-icon far fa-circle"></i>
                                                <span class="nav-main-link-name">Employee Transfer</span>
                                            </a>
                                        </li>

                                       
                                    </li>
                                </ul>
                            </li>    
                              

                            <li class="nav-main-item ">
                                <a class="nav-main-link" href="{{ route('indexadd') }}">
                                    <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
                                    <span class="nav-main-link-name">Additional Responsibility</span>
                                </a>
                            </li>
                           
                       
                           
                            

                         
                            

                           
                           
                           @endif
                           @endforeach 
                        

                            
                          
                                
                         
                    </ul>
                    @endif 
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->
         

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                

                <div>
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-dual" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>
                 <div>
                     @php
                        $allcategory=App\Models\Categor::get();
                        
                     @endphp

                    @php
                     $employee_id=Session::get('employeeid');

                    $permission=App\Models\Permission::where('employee_id',$employee_id)->get();

                   @endphp
                    @foreach ( $permission as  $permission_id )
                      @if($permission_id->permission_Id==3)
                   
                 <div class="dropdown">
                   <a class="btn btn-primary dropdown-toggle f-100" href="#" role="button" id="accounting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    All Category
                   </a>

                   <div class="dropdown-menu" aria-labelledby="accounting">
                       @foreach ($allcategory as $category)
                           
                   
                   <a class="dropdown-item" href="{{ url('category.add',$category->id) }}">{{ $category->category_name }}</a>
                   {{-- <a class="dropdown-item" href="{{ route('sdfsdf.cate',['categoryid'=>$category->id]) }}">{{ $category->category_name }}</a> --}}
                   {{-- <a class="dropdown-item" ">Receive Vouchers</a> --}}
                   @endforeach
                  
                  
                   </div>
                </div>
                @endif
                @endforeach
                 </div>

                 <div>
                  <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle f-100" href="#" role="button" id="accounting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (Session::get('status')==2)
                        {{ Session::get('emailname') }}

                        @else
                        {{ Session::get('emailname') }} 
                        @endif
              
                      </a>

                      <div class="dropdown-menu" aria-labelledby="accounting">

                        @if (Session::get('status')==2)
                        <a class="dropdown-item" href="{{ route('LogoutAdmin') }}">
                            <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                        </a>

                        @else
                        <a class="dropdown-item" href="{{ url('signout') }}">
                            <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                        </a>
                        @endif
              
                      
                       
                       
                        </div>
                    
                   </div>
                </div>
                 </div> 
                 <div>
               

                    <!-- END Left Section -->

                    <!-- Right Section -->
                 
                        <!-- User Dropdown -->
                        {{-- <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block f-100">{{ Session()->get('authmail') }}</span>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0"
                                aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                                    User Options
                                </div>
                                <div class="p-2">


                                    <div role="separator" class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout-admin') }}">
                                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div> --}}
                    <!-- END Right Section -->

                
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-header-dark">
                    <div class="bg-white-10">
                        <div class="content-header">
                            <form class="w-100" action="be_pages_generic_search.html" method="POST">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                        <button type="button" class="btn btn-alt-primary" data-toggle="layout"
                                            data-action="header_search_off">
                                            <i class="fa fa-fw fa-times-circle"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control border-0" placeholder="Search or hit ESC.."
                                        id="page-header-search-input" name="page-header-search-input">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-header-dark">
                    <div class="bg-white-10">
                        <div class="content-header">
                            <div class="w-100 text-center">
                                <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            <!-- Hero -->
            <div class="content">
                <div
                    class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">


                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content  pl-0 pr-0 pb-4">
                @yield('content')

            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-0">
                <div class="row font-size-sm">

                    <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                        <a class="font-w600" href="#" target="_blank">RU Contact</a> &copy; <span
                            data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>

    @include('backend.header-footer-files.js_files')

    <div class="modal fade" id="loader" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="background:none;">
                <div class="modal-body">

                    <!-- <h3 class = "ff-roboto"  style = "color:#1dbf73"><i class="fa fa-clock mr-2"></i>Please Wait</h3> -->
                    <img src="{{ asset('assets/media/various/loader.gif') }}">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="saving" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="background:none;">
                <div class="modal-body">

                    <h3 class = "ff-roboto"  style = "color:#1dbf73"><i class="fa fa-clock mr-2"></i>Record Saving..</h3>
                    <!-- <img src="{{ asset('assets/media/various/saving.gif') }}" style = "width:150px;height:150px;"> -->

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="success" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                <div class="row text-center">
                    <div class="col-md-12">
                      <div class = "ff-roboto" style = "font-size:20px;color:#1dbf73">Message</div>
                    </div>
                  </div>
               </div>
                <div class="modal-body">
                  <div class="row text-center">
                    <div class="col-md-12">
                    <label style = "font-size:100px;color:#1dbf73;"><i class="fa fa-check-circle"></i></label>
                    </div>
                  </div>
                  <div class="row text-center mb-4">
                    <div class="col-md-12">
                      <div class = "f-100" id = "message" style = "font-size:20px;font-weight:700;color:#1dbf73"></div>
                    </div>
                  </div>

                  <div class="row text-center mb-4">
                    <div class="col-md-12">
                      <button class = "btn f-100" style = "background:#f0f3f8;color:black;padding:10px 30px;font-weight:100" type = "button" data-dismiss="modal">Ok</button>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>

