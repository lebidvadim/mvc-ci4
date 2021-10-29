<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-12 13:12:52
         compiled from "/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/modals/product-edit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20818894705ebae724b43fd6_93388816%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e12406ace55448927a2c5bfd3a08d0d5b843cca' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/modals/product-edit.tpl',
      1 => 1589194108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20818894705ebae724b43fd6_93388816',
  'variables' => 
  array (
    'product' => 0,
    'groups' => 0,
    'gr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ebae724b62670_72110060',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ebae724b62670_72110060')) {
function content_5ebae724b62670_72110060 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20818894705ebae724b43fd6_93388816';
echo form_open();?>

<h4>Редактировать товар <b><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</b></h4>
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
" <?php if ($_smarty_tpl->tpl_vars['product']->value->id_gr == $_smarty_tpl->tpl_vars['gr']->value->id) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['gr']->value->name;?>
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
    <input type="text" name="name" autocomplete="off" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
" placeholder="<?php echo __('Найменование');?>
">
</div>
<div class="d-flex justify-content-center align-items-center">
    <button type="submit" name="del" class="waves-effect waves-light btn btn-success m-2"><?php echo __('Сохранить');?>
</button>
    <button type="button" class="waves-effect waves-light btn btn-primary" data-dismiss="modal" aria-label="Close"><?php echo __('Отмена');?>
</button>
</div>
<?php echo form_close();

}
}
?>