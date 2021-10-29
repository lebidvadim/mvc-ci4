<?php
/*%%SmartyHeaderCode:3316064505eb54eff1b76e6_76335948%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e5b457f02cd28fd0526d67b69b15133f309d4aa' => 
    array (
      0 => '/home/dimckale/lebid.pro/ci4/app/Modules/Admin/Views/main.tpl',
      1 => 1588939162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3316064505eb54eff1b76e6_76335948',
  'tpl_function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'config_auth' => 0,
    'title' => 0,
    'breadcrumb' => 0,
    'message' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5eb54eff1dbdd3_47132271',
  'cache_lifetime' => 3600,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5eb54eff1dbdd3_47132271')) {
function content_5eb54eff1dbdd3_47132271 ($_smarty_tpl) {
?>
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
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/theme.min.css" rel="stylesheet" type="text/css" />

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
                        <img src="/assets/images/logo-light.png"/>
                    </a>

                    <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex align-items-center">

                                            <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn header-item waves-effect waves-light"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="/assets/images/users/avatar-3.jpg"
                                     alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1">midav</span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    Настройка
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="https://ci4.lebid.pro/logout">
                                    Выйти
                                </a>
                            </div>
                        </div>
                    
                </div>
            </div>
        </header>
        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Админ панель - пользователи</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                                users-admin

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-center text-lg-left">
                            2020 © MVP.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right d-none d-lg-block">
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

</html><?php }
}
?>