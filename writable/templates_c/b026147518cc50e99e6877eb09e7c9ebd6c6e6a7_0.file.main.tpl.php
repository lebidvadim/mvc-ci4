<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-14 08:15:29
         compiled from "/home/dimckale/lebid.pro/report/app/Modules/Core/Views/admin/main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9684684245ebd4471a023b0_04944851%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b026147518cc50e99e6877eb09e7c9ebd6c6e6a7' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/app/Modules/Core/Views/admin/main.tpl',
      1 => 1589306609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9684684245ebd4471a023b0_04944851',
  'variables' => 
  array (
    'menu' => 0,
    'm' => 0,
    'sub' => 0,
    'title' => 0,
    'breadcrumb' => 0,
    'message' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ebd4471a23895_90801495',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ebd4471a23895_90801495')) {
function content_5ebd4471a23895_90801495 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9684684245ebd4471a023b0_04944851';
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
                        <img src="/assets/images/logo-light.png"/>
                    </a>

                    <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-inline-block">
                        <a href="<?php echo site_url('logout');?>
" type="button" class="btn header-item noti-icon waves-effect waves-light d-flex align-items-center" data-toggle="tooltip" data-original-title="Выход">
                            <i class="fas fa-sign-in-alt"></i>
                        </a>

                    </div>
                </div>
            </div>
        </header>
        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <?php
$foreach_0_m_sav['s_item'] = isset($_smarty_tpl->tpl_vars['m']) ? $_smarty_tpl->tpl_vars['m'] : false;
$_from = $_smarty_tpl->tpl_vars['menu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['m']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
$foreach_0_m_sav['item'] = $_smarty_tpl->tpl_vars['m'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['disable'] == 0) {?>

                                    <?php if (!empty($_smarty_tpl->tpl_vars['m']->value['submenu'])) {?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" id="topnav-<?php echo $_smarty_tpl->tpl_vars['m']->value['active'];?>
" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo $_smarty_tpl->tpl_vars['m']->value['icon'];
echo $_smarty_tpl->tpl_vars['m']->value['title'];?>

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-<?php echo $_smarty_tpl->tpl_vars['m']->value['active'];?>
">
                                                <?php
$foreach_1_sub_sav['s_item'] = isset($_smarty_tpl->tpl_vars['sub']) ? $_smarty_tpl->tpl_vars['sub'] : false;
$_from = $_smarty_tpl->tpl_vars['m']->value['submenu'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['sub']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
$foreach_1_sub_sav['item'] = $_smarty_tpl->tpl_vars['sub'];
?>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['sub']->value['url'];?>
" class="dropdown-item"><?php echo $_smarty_tpl->tpl_vars['sub']->value['title'];?>
</a>
                                                <?php
$_smarty_tpl->tpl_vars['sub'] = $foreach_1_sub_sav['item'];
}
if ($foreach_1_sub_sav['s_item']) {
$_smarty_tpl->tpl_vars['sub'] = $foreach_1_sub_sav['s_item'];
}
?>
                                            </div>
                                        </li>
                                    <?php } else { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
">
                                                <?php echo $_smarty_tpl->tpl_vars['m']->value['icon'];
echo $_smarty_tpl->tpl_vars['m']->value['title'];?>

                                            </a>
                                        </li>
                                    <?php }?>

                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars['m'] = $foreach_0_m_sav['item'];
}
if ($foreach_0_m_sav['s_item']) {
$_smarty_tpl->tpl_vars['m'] = $foreach_0_m_sav['s_item'];
}
?>
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
                            <?php if ($_smarty_tpl->tpl_vars['title']->value) {?><h4 class="mb-0 font-size-18"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h4><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['breadcrumb']->value) {
echo $_smarty_tpl->tpl_vars['breadcrumb']->value;
}?>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <?php if ($_smarty_tpl->tpl_vars['message']->value) {
echo $_smarty_tpl->tpl_vars['message']->value;
}?>
                <?php echo $_smarty_tpl->tpl_vars['content']->value;?>


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="text-center text-sm-left">
                            2020 © MVP.
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
<?php echo '<script'; ?>
 src="/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/js/waves.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/js/simplebar.min.js"><?php echo '</script'; ?>
>

<!-- App js -->
<?php echo '<script'; ?>
 src="/assets/js/theme.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
?>