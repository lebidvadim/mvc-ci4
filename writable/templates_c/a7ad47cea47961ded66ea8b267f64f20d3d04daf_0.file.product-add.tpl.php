<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-12 10:09:35
         compiled from "/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/modals/product-add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:15375597975ebabc2f94f5a3_00748871%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7ad47cea47961ded66ea8b267f64f20d3d04daf' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/modals/product-add.tpl',
      1 => 1589193847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15375597975ebabc2f94f5a3_00748871',
  'variables' => 
  array (
    'groups' => 0,
    'gr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ebabc2f96d123_32973657',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ebabc2f96d123_32973657')) {
function content_5ebabc2f96d123_32973657 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15375597975ebabc2f94f5a3_00748871';
echo form_open();?>

<h4>Добавить товар</h4>
<?php if (in_groups('scorepr')) {?>
    <input type="hidden" name="type" value="1">
<?php } elseif (in_groups('scorest')) {?>
    <input type="hidden" name="type" value="2">
<?php }?>
<div class="form-group">
    <select name="id_gr" class="form-control">
        <?php
$foreach_0_gr_sav['s_item'] = isset($_smarty_tpl->tpl_vars['gr']) ? $_smarty_tpl->tpl_vars['gr'] : false;
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['gr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['gr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gr']->value) {
$_smarty_tpl->tpl_vars['gr']->_loop = true;
$foreach_0_gr_sav['item'] = $_smarty_tpl->tpl_vars['gr'];
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['gr']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['gr']->value->name;?>
</option>
        <?php
$_smarty_tpl->tpl_vars['gr'] = $foreach_0_gr_sav['item'];
}
if ($foreach_0_gr_sav['s_item']) {
$_smarty_tpl->tpl_vars['gr'] = $foreach_0_gr_sav['s_item'];
}
?>
    </select>
</div>
<div class="form-group">
    <input type="text" name="name" id="product-search" autocomplete="off" class="form-control" placeholder="<?php echo __('Найменование');?>
">
</div>
<div class="d-flex justify-content-center align-items-center">
    <button type="submit" name="add" class="waves-effect waves-light btn btn-success m-2"><?php echo __('Добавить');?>
</button>
    <button type="button" class="waves-effect waves-light btn btn-primary" data-dismiss="modal" aria-label="Close"><?php echo __('Отмена');?>
</button>
</div>
<?php echo form_close();

}
}
?>