<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-12 04:26:34
         compiled from "/home/dimckale/lebid.pro/report/themes/default/site/auth/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13806944105eba6bca11fcd5_31589569%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd15b92541eff4c5a4d7d1ca15206636c6e610428' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/themes/default/site/auth/login.tpl',
      1 => 1588946751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13806944105eba6bca11fcd5_31589569',
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5eba6bca13d9f4_25799487',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5eba6bca13d9f4_25799487')) {
function content_5eba6bca13d9f4_25799487 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13806944105eba6bca11fcd5_31589569';
?>
<form action="<?php echo route_to('login');?>
" method="post">
    <?php echo csrf_field();?>

    <?php if ($_smarty_tpl->tpl_vars['config']->value->validFields === array('email')) {?>
        <div class="form-group">
            <label for="login"><?php echo lang('Auth.email');?>
</label>
            <input type="email" class="form-control <?php if (session('errors.login')) {?>is-invalid<?php }?>" name="login" placeholder="<?php echo lang('Auth.email');?>
">
            <div class="invalid-feedback">
                <?php echo session('errors.login');?>

            </div>
        </div>
    <?php } else { ?>
        <div class="form-group">
            <label for="login"><?php echo lang('Auth.emailOrUsername');?>
</label>
            <input type="text" class="form-control <?php if (session('errors.login')) {?>is-invalid<?php }?>" name="login" placeholder="<?php echo lang('Auth.emailOrUsername');?>
">
            <div class="invalid-feedback">
                <?php echo session('errors.login');?>

            </div>
        </div>
    <?php }?>
    <div class="form-group">
        <a href="<?php echo site_url('forgot');?>
" class="text-muted float-right"><?php echo __('Забыли пароль?');?>
</a>
        <label for="password"><?php echo lang('Auth.password');?>
</label>
        <input type="password" name="password" class="form-control <?php if (session('errors.password')) {?>is-invalid<?php }?>" placeholder="<?php echo lang('Auth.password');?>
">
        <div class="invalid-feedback">
            <?php echo session('errors.password');?>

        </div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['config']->value->allowRemembering) {?>
        <div class="form-group pb-3">
            <div class="custom-control custom-checkbox checkbox-primary">
                <input type="checkbox" name="remember" class="custom-control-input" id="checkbox-signin" <?php if (old('remember')) {?> checked<?php }?>>
                <label class="custom-control-label" for="checkbox-signin"><?php echo __('Запомни меня');?>
</label>
            </div>
        </div>
    <?php }?>
    <div class="mb-3 text-center">
        <button class="btn btn-primary btn-block" type="submit"> <?php echo __('Войти');?>
 </button>
    </div>
</form><?php }
}
?>