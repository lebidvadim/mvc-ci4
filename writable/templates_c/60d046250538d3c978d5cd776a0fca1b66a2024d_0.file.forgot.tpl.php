<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-12 13:15:02
         compiled from "/home/dimckale/lebid.pro/report/themes/default/site/auth/forgot.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12390765835ebae7a6bafd24_96149253%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60d046250538d3c978d5cd776a0fca1b66a2024d' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/themes/default/site/auth/forgot.tpl',
      1 => 1588934175,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12390765835ebae7a6bafd24_96149253',
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ebae7a6bc9c23_13664539',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ebae7a6bc9c23_13664539')) {
function content_5ebae7a6bc9c23_13664539 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12390765835ebae7a6bafd24_96149253';
?>
<form action="<?php echo route_to('forgot');?>
" method="post">
    <?php echo csrf_field();?>

    <div class="form-group">
        <label for="email"><?php echo lang('Auth.emailAddress');?>
</label>
        <input type="email" class="form-control <?php if (session('errors.email')) {?>is-invalid<?php }?>"
                                                   name="email" aria-describedby="emailHelp" placeholder="<?php echo lang('Auth.email');?>
">
        <div class="invalid-feedback">
            <?php echo session('errors.email');?>

        </div>
    </div>
    <div class="mb-3 text-center">
        <button class="btn btn-primary btn-block" type="submit"><?php echo __('Сбросить пароль');?>
</button>
    </div>
</form><?php }
}
?>