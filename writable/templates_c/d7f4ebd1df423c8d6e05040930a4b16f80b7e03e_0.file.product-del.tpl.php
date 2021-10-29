<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-13 02:57:09
         compiled from "/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/modals/product-del.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1170094485ebba8553b9392_43783991%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7f4ebd1df423c8d6e05040930a4b16f80b7e03e' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/modals/product-del.tpl',
      1 => 1589114170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1170094485ebba8553b9392_43783991',
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ebba8553e28b3_72029157',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ebba8553e28b3_72029157')) {
function content_5ebba8553e28b3_72029157 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1170094485ebba8553b9392_43783991';
echo form_open();?>

<h4>Удалить товар <b><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</b>?</h4>
<p>Вы уверены что хотите удалить товар <b><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</b>!</p>
<div class="d-flex justify-content-center align-items-center">
    <button type="submit" name="del" class="waves-effect waves-light btn btn-danger m-2"><?php echo __('Да');?>
</button>
    <button type="button" class="waves-effect waves-light btn btn-primary" data-dismiss="modal" aria-label="Close"><?php echo __('Нет');?>
</button>
</div>
<?php echo form_close();

}
}
?>