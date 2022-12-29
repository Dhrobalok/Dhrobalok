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
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->make('backend.header-footer-files.css_files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('css'); ?>


</head>

<body>
    <?php $user = Auth :: user(); ?>
    <div id="page-container"
        class="enable-page-overlay side-scroll page-header-fixed main-content-narrow side-trans-enabled sidebar-o-xs sidebar-o page-header-dark">
        <!-- Side Overlay-->
        <aside id="side-overlay">
            <!-- Side Header -->
            <div class="bg-image" style="background-image: url("
                <?php echo e(asset('media/various/bg_side_overlay_header.jpg')); ?>")>
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
                                                data-theme="<?php echo e(asset('assets/css/themes/xwork.min.css')); ?>" href="#">
                                                xWork
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xmodern"
                                                data-toggle="theme"
                                                data-theme="<?php echo e(asset('assets/css/themes/xmodern.min.css')); ?>" href="#">
                                                xModern
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xeco"
                                                data-toggle="theme"
                                                data-theme="<?php echo e(asset('assets/css/themes/xeco.min.css')); ?>" href="#">
                                                xEco
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xsmooth"
                                                data-toggle="theme"
                                                data-theme="<?php echo e(asset('assets/css/themes/xsmooth.min.css')); ?>" href="#">
                                                xSmooth
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xinspire"
                                                data-toggle="theme"
                                                data-theme="<?php echo e(asset('assets/css/themes/xinspire.min.css')); ?>" href="#">
                                                xInspire
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xdream"
                                                data-toggle="theme"
                                                data-theme="<?php echo e(asset('assets/css/themes/xdream.min.css')); ?>" href="#">
                                                xDream
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xpro"
                                                data-toggle="theme"
                                                data-theme="<?php echo e(asset('assets/css/themes/xpro.min.css')); ?>" href="#">
                                                xPro
                                            </a>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <a class="d-block py-3 text-white font-size-sm font-w600 bg-xplay"
                                                data-toggle="theme"
                                                data-theme="<?php echo e(asset('assets/css/themes/xplay.min.css')); ?>" href="#">
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
                    <a class="font-w600 text-white tracking-wide" href="index.html">
                        <span class="smini-visible">
                            D<span class="opacity-75">x</span>
                        </span>
                        <span class="smini-hidden">
                            Accounting System
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
                            <a class="nav-main-link" href="<?php echo e(route('backend.admin.index')); ?>">
                                <i class="nav-main-link-icon fas fa-tachometer-alt"></i>
                                <span class="nav-main-link-name">Dashboard</span>

                            </a>
                        </li>

                       
                        <?php if($user -> hasRole(['Administration'])): ?>
                        <?php
                        $roles_related_routes = array('roles','permission-settings','role-base-user-assign');
                        $is_role_tab_active = false;

                        foreach($roles_related_routes as $role_route)
                        {
                        if(strpos(request() -> path(),$role_route) !== false)
                        {
                        $is_role_tab_active = true;
                        }
                        }
                        ?>
                        <li class="nav-main-item <?php echo e($is_role_tab_active == true ? 'open' : ''); ?>">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-user-tie"></i>

                                <span class="nav-main-link-name">Administration</span>
                            </a>
                            <ul class="nav-main-submenu">


                                <li
                                    class="nav-main-item <?php echo e($is_role_tab_active == true ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="\roles">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Roles and Permissions</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.payroll.settings.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Payroll Settings</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if($user -> hasRole(['Administration','Accountant'])): ?>
                        <?php
                        $path = request() -> path();
                        $is_accounts_tab_active = false;
                        $accounts_routes =
                        array('cost-centers','category','accounts','banks','cheque-book','debit-voucher','credit-voucher','expenditure'
                        ,'transfer-voucher','journal-voucher','bill-vouchers','approve','approver','approved-vouchers','rejected-vouchers',
                        'generated-vouchers','bill-users','loan-account-setup','trial-balance-report-start','cash-book-report-start',
                        'cost-center-wise-report-start','head-wise-report-start','code-wise-report-start');
                        $route_prefix = '';
                        foreach($accounts_routes as $account_route)
                        {
                        if(strpos($path,$account_route) !== false)
                        {
                        $is_accounts_tab_active = true;
                        $route_prefix = $account_route;
                        }
                        }

                        ?>
                        <li class="nav-main-item <?php echo e($is_accounts_tab_active == true ? 'open' : ''); ?>">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-file-invoice"></i>

                                <span class="nav-main-link-name">Accountant</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view cost')): ?>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix == 'cost-centers' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('cost-center-index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Cost Centers</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view accounts')): ?>
                                <li
                                    class="nav-main-item <?php echo e(in_array($route_prefix,['category','accounts']) == true ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('category.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">All Categories</span>
                                        </a>
                                <li class="nav-main-item <?php echo e(in_array($route_prefix,['category','accounts']) == true ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('accounts.index')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">All Accounts</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view cheque')): ?>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix == 'cheque-book' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.cheque-book.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Cheque Book Records</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view banks')): ?>
                                <li class="nav-main-item  <?php echo e($route_prefix == 'banks' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.banks.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Banks</span>
                                    </a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve_setup vouchers')): ?>
                                <li class="nav-main-item  <?php echo e($route_prefix == 'approver' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.approver.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Approver Config</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view vouchers')): ?>
                                <li
                                    class="nav-main-item  <?php echo e($route_prefix == 'approved-vouchers' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.voucher.approved')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Approved Vouchers</span>
                                    </a>
                                </li>

                                <li
                                    class="nav-main-item <?php echo e($route_prefix == 'rejected-vouchers' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.voucher.rejected')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Backwarded Vouchers</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix == 'generated-vouchers' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.voucher.generated')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Generated Vouchers</span>
                                    </a>
                                </li>

                                <li
                                    class="nav-main-item <?php echo e($route_prefix == 'bill-users' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.bill-users.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Online Bill Users</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.loan.set-approvers')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Online Bills</span>
                                    </a>
                                </li> -->
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account_setup account')): ?>
                                <li
                                    class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.bank-reconciliation')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Bank Reconciliation</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                                <span class="nav-main-link-name">Cost Center</span>
                            </a>
                            <ul class="nav-main-submenu">

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.cost-center.type.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Types</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo e(route('cost-center-index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Cost Centers</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- PARTIAL PAYMENT -->
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                                <span class="nav-main-link-name">Partial Management</span>
                            </a>
                            <ul class="nav-main-submenu">

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.partial.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Partial Payment</span>
                                    </a>
                                </li>

                            </ul>

                            <ul class="nav-main-submenu">

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo e(route('bulk.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Payment_Bulk_Order</span>
                                    </a>
                                </li>

                            </ul>
                        </li>


                    <!-- PARTIAL PAYMENT -->

                    <!--GTC leadger -->

                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                            <span class="nav-main-link-name">Gtc Management</span>
                        </a>


                        <ul class="nav-main-submenu">

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?php echo e(route('gtc.index')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                    <span class="nav-main-link-name">Gtc</span>
                                </a>
                            </li>

                        </ul>
                    </li>



                    <!--gtc leadger -->

                    <!--  fdr MANAGEMENT  -->

                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                            <span class="nav-main-link-name">FDR Management</span>
                        </a>


                        <ul class="nav-main-submenu">
                            <li class="nav-main-item ">
                                <a class="nav-main-link" href="<?php echo e(URL::to('/fdr')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                    <span class="nav-main-link-name">Fdr Create</span>
                                </a>
                            </li>

                        </ul>


                        <ul class="nav-main-submenu">
                            <li class="nav-main-item ">
                                <a class="nav-main-link" href="<?php echo e(URL::to('/viewfdr')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                    <span class="nav-main-link-name">View Fdr</span>
                                </a>
                            </li>

                        </ul>

                    </li>

                    <!--  fdr MANAGEMENT  -->


                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                                <span class="nav-main-link-name">Sales & Purchase</span>
                            </a>
                            <ul class="nav-main-submenu">

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.sales.vendors.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Vendors</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.sales.customers.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Customers</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if($user -> hasRole(['Administration','Budget Manager'])): ?>
                        <?php
                        $is_budget_tab_active = false;
                        $budgets_routes = array('budgets','budget-accountings');
                        $route_prefix_budget = '';
                        foreach($budgets_routes as $budget_route)
                        {
                        if(strpos($path,$budget_route) !== false)
                        {
                        $is_budget_tab_active = true;
                        $route_prefix_budget = $budget_route;
                        }
                        }

                        ?>
                        <li class="nav-main-item <?php echo e($is_budget_tab_active == true ? 'open' : ''); ?>">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-dollar-sign"></i>

                                <span class="nav-main-link-name">Budget</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view budget')): ?>

                                <!-- <li class="nav-main-item <?php echo e($route_prefix_budget == 'budget-accountings' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('budget-levels.index')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Project Labels</span>
                                    </a>
                                </li>

                                <li class="nav-main-item <?php echo e($route_prefix_budget == 'budgets' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('budgets.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Budgets</span>
                                    </a>
                                </li>


                                <li
                                    class="nav-main-item <?php echo e($route_prefix_budget == 'budget-accountings' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('budget-accountings.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Budget Accountings</span>
                                    </a>
                                    <a class="nav-main-link">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Budget for Accounts</span>
                                    </a>
                                </li>
                                <li class="nav-main-item <?php echo e($route_prefix_budget == 'budget-accountings' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('budget-check-report-start')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Budget Check</span>
                                    </a>
                                </li>
                                <li class="nav-main-item <?php echo e($route_prefix_budget == 'budget-accountings' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('budget-control-report-start')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Budget Control</span>
                                    </a>
                                </li> -->
                                <li class="nav-main-item <?php echo e($route_prefix_budget == 'budget-accountings' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.budget.status')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Current Status</span>
                                    </a>
                                </li>
                                <li class="nav-main-item ">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.budget.define')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Define Budget</span>
                                    </a>
                                </li>

                                <li class="nav-main-item ">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.advancebudget.index')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Advance Budget</span>
                                    </a>
                                </li>
                               <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if($user -> hasRole(['Administration','Payroll Manager'])): ?>
                        <?php
                        $is_payroll_tab_active = false;
                        $payroll_routes =
                        array('employees','type','department','designation','grade','pay-scale','salary-segment','set-bonus','festivals',
                        'salary-sheets','view-salary','general-payroll-report-start','view-employee','view-payslip','generated-salary-preview');
                        $route_prefix_payroll = '';
                        foreach($payroll_routes as $payroll_route)
                        {
                        if(strpos($path,$payroll_route) !== false)
                        {
                        $is_payroll_tab_active = true;
                        $route_prefix_payroll = $payroll_route;
                        }
                        }

                        ?>
                        <li class="nav-main-item <?php echo e($is_payroll_tab_active == true ? 'open' : ''); ?>">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">

                                <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                                <span class="nav-main-link-name">Employee Management</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view employees')): ?>
                                <li
                                    class="nav-main-item <?php echo e(in_array($route_prefix_payroll,['employees','view-employee','view-payslip']) == true ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link"
                                        href="<?php echo e(route('admin.employee-management.employees.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Employees</span>
                                    </a>
                               </li>
                               <li
                                    class="nav-main-item <?php echo e($route_prefix_payroll == 'department' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link"
                                        href="<?php echo e(route('admin.employees.division.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Divisions</span>
                                    </a>
                                </li>

                                <li
                                    class="nav-main-item <?php echo e($route_prefix_payroll == 'department' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link"
                                        href="<?php echo e(route('admin.employees.department.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Departments</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_payroll == 'department' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link"
                                        href="<?php echo e(route('admin.employees.section.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Sections</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_payroll == 'designation' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link"
                                        href="<?php echo e(route('admin.employee-management.employee-designation.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Designations</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_payroll == 'grade' ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.salary-management.grade.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Grades</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-main-item <?php echo e($is_payroll_tab_active == true ? 'open' : ''); ?>">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">

                                <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                                <span class="nav-main-link-name">Payroll</span>
                            </a>
                            <ul class="nav-main-submenu">

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view payroll')): ?>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_payroll == 'pay-scale' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link"
                                        href="<?php echo e(route('admin.salary-management.payscale.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Pay Scales</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_payroll == 'salary-segment' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.salary-segment.distribution')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Segment Wise Distribution</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-main-item <?php echo e(in_array($route_prefix_payroll,['view-salary','salary-sheets','generated-salary-preview']) == true ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.salary-generation.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Salary Sheets</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view festivals')): ?>
                                <li
                                    class="nav-main-item <?php echo e(in_array($route_prefix_payroll,['set-bonus','festivals']) == true ? 'current-active-link':''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.festival.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Festival Manager</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('download payroll')): ?>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_payroll == 'general-payroll-report-start' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('payroll-report-start')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Reports</span>
                                    </a>
                                </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if($user -> hasRole(['Administration','Pension Manager'])): ?>
                        <?php
                        $is_pension_tab_active = false;
                        $pension_routes = array('pension-users','generate-preview','pension-process');
                        $route_prefix_pension = '';
                        foreach($pension_routes as $pension_route)
                        {
                        if(strpos($path,$pension_route) !== false)
                        {
                        $is_pension_tab_active = true;
                        $route_prefix_pension = $pension_route;
                        }
                        }

                        ?>
                        <li class="nav-main-item <?php echo e($is_pension_tab_active == true ? 'open' : ''); ?>">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                                <span class="nav-main-link-name">Pensions</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view pension')): ?>
                                <li
                                    class="nav-main-item <?php echo e(in_array($route_prefix_pension,['pension-users']) == true ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.pension-users.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Pensions of Users</span>
                                    </a>
                                    <a class = "nav-main-link" href = "<?php echo e(route('admin.pension-user.approval-pendings')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Pending Pensions Users</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('generate pension')): ?>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_pension == 'pension-process' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.pension-process.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Generated Pensions</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        <!-- </li> -->
                        <?php endif; ?>
                        <?php if($user -> hasRole(['Administration','Provident Fund Manager'])): ?>
                        <?php
                        $is_gratuity_tab_active = false;
                        $is_provident_tab_active = false;

                        $gratuity_routes = array('gratuity-users','gratuity-process');
                        $provident_fund_routes = array('pf-contribution','pf-loan','config-app-panel');
                        $route_prefix_gratuity = '';
                        $route_prefix_provident_fund = '';

                        foreach($gratuity_routes as $gratuity_route)
                        {
                        if(strpos($path,$gratuity_route) !== false)
                        {
                        $is_gratuity_tab_active = true;
                        $route_prefix_gratuity = $gratuity_route;
                        }
                        }

                        foreach($provident_fund_routes as $provident_route)
                        {
                        if(strpos($path,$provident_route) !== false)
                        {
                        $is_provident_tab_active = true;
                        $route_prefix_provident_fund = $provident_route;
                        }
                        }
                        ?>
                        <!-- <li class="nav-main-item <?php echo e($is_gratuity_tab_active == true ? 'open' : ''); ?>"> -->
                            <!-- <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                                <span class="nav-main-link-name">Gratuity</span>
                            </a> -->
                            <ul class="nav-main-submenu">
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_gratuity == 'gratuity-users' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.gratuity-users.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Gratuity of Users</span>
                                    </a>
                                    <a class = "nav-main-link" href = "<?php echo e(route('admin.gratuity-user.approval-pending')); ?>">
                                    <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Pending Gratuity</span>
                                    </a>
                                </li>
                                <!-- <li
                                    class="nav-main-item <?php echo e($route_prefix_gratuity == 'gratuity-process' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.gratuity-process.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Generated Gratuity</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-main-item <?php echo e($is_provident_tab_active == true ? 'open' : ''); ?>">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                                <span class="nav-main-link-name">Provident Funds</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view provident')): ?>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_provident_fund == 'pf-contribution' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.pf-contribution.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Provident Fund Contributions</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                            <ul class="nav-main-submenu">
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_provident_fund == 'pf-loan' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.pf-loan.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Provident Fund Loans</span>
                                    </a>
                                </li>

                            </ul>

                            <ul class="nav-main-submenu">
                                <li class="nav-main-item <?php echo e($route_prefix_provident_fund == 'config-app-panel' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('pfdr.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">FDR_PF</span>
                                    </a>
                                </li>

                            </ul>

                            
                            


                            


                            <ul class="nav-main-submenu">
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_provident_fund == 'config-app-panel' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.pf-loan.approval-panel-config')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Configuare loan approval panel</span>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav-main-submenu">
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_provident_fund == 'config-app-panel' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.pf-loan.pending-loans')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Pending Loans</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if($user -> hasRole(['Administration','House Building Loan Manager'])): ?>
                        <?php
                        $is_loan_tab_active = false;

                        $loan_routes = array('house-loan','config-approval-panel','pending-loans');
                        $route_prefix_loan = '';


                        foreach($loan_routes as $loan_route)
                        {
                        if(strpos($path,$loan_route) !== false)
                        {
                        $is_loan_tab_active = true;
                        $route_prefix_loan = $loan_route;
                        }
                        }
                        ?>
                        <li class="nav-main-item <?php echo e($is_loan_tab_active == true ? 'open' : ''); ?>">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>

                                <span class="nav-main-link-name">House Building Loan</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view loans')): ?>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_loan == 'house-loan' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.loan.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Loans</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve_setup loans')): ?>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_loan == 'config-approval-panel' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.loan.set-approvers')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Set Approvers</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve loans')): ?>
                                <li
                                    class="nav-main-item <?php echo e($route_prefix_loan == 'pending-loans' ? 'current-active-link' : ''); ?>">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.loan.pending-loans')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Pending Loans</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <li
                                    class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo e(route('admin.loan.waiting.index')); ?>">
                                        <i class="nav-main-link-icon far fa-circle"></i>
                                        <span class="nav-main-link-name">Upcoming Loans To Complete</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php endif; ?>

                        <!-- <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fas fa-users"></i>

                                <span class="nav-main-link-name">Account Sections</span>
                            </a>
                            <ul class="nav-main-submenu">

                            </ul>
                        </li> -->
                    </ul>
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
                 <div class="dropdown">
                   <a class="btn btn-primary dropdown-toggle f-100" href="#" role="button" id="accounting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Accounting
                   </a>
                     
               
                   <div class="dropdown-menu" aria-labelledby="accounting">
 
    
                     <a class="dropdown-item" href="<?php echo e(route('admin.voucher.debit.index')); ?>">Payment Vouchers </a>
    
                       
                    
                 
                   <a class="dropdown-item" href="<?php echo e(route('admin.voucher.credit.index')); ?>">Receive Vouchers</a>
                   
                   <a class="dropdown-item" href="<?php echo e(route('admin.voucher.journal.index')); ?>">Journal Vouchers</a>
                   <a class="dropdown-item" href="#">Misc. Vouchers</a>
                   <!--<a class="dropdown-item" href="<?php echo e(route('advancevoucher')); ?>">Advanced Vouchers</a>-->

                   <!-- <a class="dropdown-item" href="<?php echo e(route('admin.bill-vouchers.index')); ?>">Bill Vouchers</a> -->
                   </div>
                </div>
                 </div>

                 <div>
                 <div class="dropdown">
                   <a class="btn btn-primary dropdown-toggle f-100" href="#" role="button" id="reporting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Reporting
                   </a>

                   <div class="dropdown-menu" aria-labelledby="reporting">
                   <a class="dropdown-item" href="<?php echo e(route('trial-balance-report-start')); ?>">Trial Balance Report</a>
                   <a class="dropdown-item" href="<?php echo e(route('cash-book-report-start')); ?>">Cash Book Report</a>
                   <a class="dropdown-item" href="<?php echo e(route('profitloss.report')); ?>">Profit and Loss Report </a>
                   
                   <a class="dropdown-item" href="<?php echo e(route('invoice')); ?>">Bulk Invoice Form</a>
                   <a class="dropdown-item" href="<?php echo e(route('admin.reports.reconciliation.index')); ?>">Reconciliation Report</a>
                   <a class="dropdown-item" href="<?php echo e(route('admin.report.cost-center.index')); ?>">Cost Center Report</a>
                   <a class="dropdown-item" href="<?php echo e(route('view-balance-sheet')); ?>">Balance Sheet</a>
                   <a class="dropdown-item" href="<?php echo e(route('payroll-report-start')); ?>">Payroll Report</a>
                   <a class="dropdown-item" href="<?php echo e(route('admin.report.pf.index')); ?>">Provident Fund Report</a>
                   <a class="dropdown-item"  href="<?php echo e(route('agreement.download')); ?>">Vat_Tax_Comssion_Report of Stone Salling</a>
                   <!--a class="dropdown-item"  href="<?php echo e(route('daily_stone_selling_report.download')); ?>">Dailly Stone salling Report</a-->
                   <a class="dropdown-item" href="<?php echo e(route('gtc.report')); ?>">Gtc Report</a>
                   <a class="dropdown-item" href="<?php echo e(route('bulk.duration')); ?>">Bulk Report</a>

                   </div>
                </div>
                 </div>
                 <div>
                 <div class="dropdown">
                   <a class="btn btn-primary dropdown-toggle f-100" href="#" role="button" id="configuration" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Configuration
                   </a>

                   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                   <a class="dropdown-item" href="#">Actionhhhf</a>
                   <a class="dropdown-item" href="#">Another action</a>
                   <a class="dropdown-item" href="#">Something else here</a>
                   </div>
                </div>
                 </div>

                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block f-100"><?php echo e(Auth :: user() -> name); ?></span>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0"
                                aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                                    User Options
                                </div>
                                <div class="p-2">


                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo e(route('logout-custom')); ?>">
                                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- END Right Section -->

                </div>
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
                <?php echo $__env->yieldContent('content'); ?>

            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-0">
                <div class="row font-size-sm">

                    <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                        <a class="font-w600" href="#" target="_blank">Accouting System</a> &copy; <span
                            data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>

    <?php echo $__env->make('backend.header-footer-files.js_files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="modal fade" id="loader" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="background:none;">
                <div class="modal-body">

                    <!-- <h3 class = "ff-roboto"  style = "color:#1dbf73"><i class="fa fa-clock mr-2"></i>Please Wait</h3> -->
                    <img src="<?php echo e(asset('assets/media/various/loader.gif')); ?>">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="saving" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="background:none;">
                <div class="modal-body">

                    <h3 class = "ff-roboto"  style = "color:#1dbf73"><i class="fa fa-clock mr-2"></i>Record Saving..</h3>
                    <!-- <img src="<?php echo e(asset('assets/media/various/saving.gif')); ?>" style = "width:150px;height:150px;"> -->

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

<?php /**PATH F:\laragon\www\rajit_project\mgmclac.rajbilling.com\resources\views/backend/admin/index.blade.php ENDPATH**/ ?>