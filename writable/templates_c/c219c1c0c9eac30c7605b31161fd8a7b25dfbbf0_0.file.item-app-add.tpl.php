<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-23 13:07:51
         compiled from "/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/ajax/item-app-add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12204472665ec9667777bc40_59896234%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c219c1c0c9eac30c7605b31161fd8a7b25dfbbf0' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/ajax/item-app-add.tpl',
      1 => 1589445229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12204472665ec9667777bc40_59896234',
  'variables' => 
  array (
    'groups' => 0,
    'gr' => 0,
    'products' => 0,
    'pro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ec9667779ed52_55359937',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ec9667779ed52_55359937')) {
function content_5ec9667779ed52_55359937 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12204472665ec9667777bc40_59896234';
?>
<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 app-items">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <select name="id_gr[]" class="form-control">
                    <option value="0">Выберите категорию</option>
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
                <select class="form-control" name="name[]" data-toggle="select2" disabled>
                    <option value="0">Выберите товар</option>
                    <?php
$foreach_1_pro_sav['s_item'] = isset($_smarty_tpl->tpl_vars['pro']) ? $_smarty_tpl->tpl_vars['pro'] : false;
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['pro'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['pro']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['pro']->value) {
$_smarty_tpl->tpl_vars['pro']->_loop = true;
$foreach_1_pro_sav['item'] = $_smarty_tpl->tpl_vars['pro'];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['pro']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['pro']->value->name;?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['pro'] = $foreach_1_pro_sav['item'];
}
if ($foreach_1_pro_sav['s_item']) {
$_smarty_tpl->tpl_vars['pro'] = $foreach_1_pro_sav['s_item'];
}
?>
                </select>
            </div>
            <div class="form-group row">
                <div class="col">
                    <input type="number" name="count[]" class="form-control" placeholder="Количество">
                </div>
                <div class="col">
                    <select class="form-control" name="unit[]">
                        <option value="кг.">килограмов</option>
                        <option value="тон">тон</option>
                        <option value="ящи.">ящиков</option>
                        <option value="пач.">пачек</option>
                        <option value="меш.">мешков</option>
                        <option value="шт.">штук</option>
                        <option value="лит.">литров</option>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-danger del-app-item">Удалить</button>
        </div> <!-- end card-body-->
    </div>
</div><?php }
}
?>