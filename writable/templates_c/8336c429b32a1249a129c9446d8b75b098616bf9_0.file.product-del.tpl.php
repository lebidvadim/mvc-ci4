<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-10 13:53:17
         compiled from "/home/dimckale/lebid.pro/ci4/modules/ModShops/Views/cabinet/shops/modals/product-del.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16389503995eb84d9dbf1c98_13053740%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8336c429b32a1249a129c9446d8b75b098616bf9' => 
    array (
      0 => '/home/dimckale/lebid.pro/ci4/modules/ModShops/Views/cabinet/shops/modals/product-del.tpl',
      1 => 1589114170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16389503995eb84d9dbf1c98_13053740',
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5eb84d9dc19d88_09493856',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5eb84d9dc19d88_09493856')) {
function content_5eb84d9dc19d88_09493856 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16389503995eb84d9dbf1c98_13053740';
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