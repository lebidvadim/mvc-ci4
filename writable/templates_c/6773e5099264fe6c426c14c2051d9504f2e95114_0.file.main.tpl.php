<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-10 13:52:03
         compiled from "/home/dimckale/lebid.pro/ci4/themes/default/site/auth/main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10365248045eb84d536e79d5_87061215%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6773e5099264fe6c426c14c2051d9504f2e95114' => 
    array (
      0 => '/home/dimckale/lebid.pro/ci4/themes/default/site/auth/main.tpl',
      1 => 1588934079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10365248045eb84d536e79d5_87061215',
  'variables' => 
  array (
    'title' => 0,
    'message' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5eb84d536e8c78_89597244',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5eb84d536e8c78_89597244')) {
function content_5eb84d536e8c78_89597244 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10365248045eb84d536e79d5_87061215';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
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
<body class="bg-primary">
<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center min-vh-100">
                    <div class="w-100 d-block my-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-5">
                                <div class="card">
                                    <h4 class="card-header"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h4>
                                    <div class="card-body">
                                        <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

                                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end container -->
</div>
<!-- end page -->

<!-- jQuery  -->
<?php echo '<script'; ?>
 src="/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/js/metismenu.min.js"><?php echo '</script'; ?>
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