<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Lunoz - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- App css -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/theme.css" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <div class="main-content">

        <header id="page-topbar">
            <div class="navbar-header">
                <!-- LOGO -->
                <div class="navbar-brand-box d-flex align-items-left">
                    <a href="/" class="logo">
                        <img src="assets/images/logo-light.png"/>
                    </a>

                    <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex align-items-center">

                    {if logged_in()}
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn header-item waves-effect waves-light"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-3.jpg"
                                     alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1">{$user->username}</span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                {if in_groups('admin')}
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{site_url('admin')}">
                                        {__('?????????? ????????????')}
                                    </a>
                                {else}
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{site_url('cabinet')}">
                                        {__('??????????????')}
                                    </a>
                                {/if}
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{site_url('logout')}">
                                    {__('??????????')}
                                </a>
                            </div>
                        </div>
                    {else}
                        {if $config_auth->allowRegistration}
                        <div class="dropdown d-inline-block">
                            <a href="{site_url('register')}" type="button" class="btn header-item noti-icon waves-effect waves-light d-flex align-items-center" data-toggle="tooltip" data-original-title="??????????????????????">
                                <i class="fas fa-user-plus"></i>
                            </a>

                        </div>
                        {/if}
                        <div class="dropdown d-inline-block">
                            <a href="{site_url('login')}" type="button" class="btn header-item noti-icon waves-effect waves-light d-flex align-items-center" data-toggle="tooltip" data-original-title="????????">
                                <i class="fas fa-sign-in-alt"></i>
                            </a>

                        </div>
                    {/if}

                </div>
            </div>
        </header>

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="bx bx-home-smile"></i>{__('??????????????')}
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row d-none d-sm-flex">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            {if $title}<h4 class="mb-0 font-size-18">{$title}</h4>{/if}
                            {if $breadcrumb}{$breadcrumb}{/if}
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                {if $message}{$message}{/if}
                {$content}

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="text-center text-sm-left">
                            2020 ?? MVP.
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="text-right d-none d-sm-block">
                            MVP - <a href="https://lebid.pro/" target="_blank">lebid.pro</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- jQuery  -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/waves.js"></script>
<script src="/assets/js/simplebar.min.js"></script>

<!-- App js -->
<script src="/assets/js/theme.js"></script>

</body>

</html>