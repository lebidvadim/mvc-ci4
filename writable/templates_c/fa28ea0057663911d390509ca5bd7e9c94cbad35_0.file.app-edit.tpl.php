<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-14 03:58:01
         compiled from "/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/app-edit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:15155904865ebd08190cf8f0_84963720%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa28ea0057663911d390509ca5bd7e9c94cbad35' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/app-edit.tpl',
      1 => 1589445259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15155904865ebd08190cf8f0_84963720',
  'variables' => 
  array (
    'app' => 0,
    'groups' => 0,
    'gr' => 0,
    'ap' => 0,
    'pro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ebd08190f3596_41434330',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ebd08190f3596_41434330')) {
function content_5ebd08190f3596_41434330 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15155904865ebd08190cf8f0_84963720';
?>
<div class="mb-3">
    <a href="<?php echo site_url('cabinet/app');?>
" class="btn btn-outline-dark">Назад</a>
    <button type="button" id="add-item-app" class="btn btn-outline-success ml-2">Добавить товар</button>
    <button type="button" id="remove-item-app" class="btn btn-outline-danger ml-2">Очистить</button>
</div>
<?php echo form_open();?>

<div id="app-bk" class="row">
    <?php
$foreach_0_ap_sav['s_item'] = isset($_smarty_tpl->tpl_vars['ap']) ? $_smarty_tpl->tpl_vars['ap'] : false;
$_from = $_smarty_tpl->tpl_vars['app']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ap'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ap']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ap']->value) {
$_smarty_tpl->tpl_vars['ap']->_loop = true;
$foreach_0_ap_sav['item'] = $_smarty_tpl->tpl_vars['ap'];
?>

        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 app-items">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <select name="id_gr[]" class="form-control">
                            <option value="0">Выберите категорию</option>
                            <?php
$foreach_1_gr_sav['s_item'] = isset($_smarty_tpl->tpl_vars['gr']) ? $_smarty_tpl->tpl_vars['gr'] : false;
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['gr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['gr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gr']->value) {
$_smarty_tpl->tpl_vars['gr']->_loop = true;
$foreach_1_gr_sav['item'] = $_smarty_tpl->tpl_vars['gr'];
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['gr']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['ap']->value->id_gr == $_smarty_tpl->tpl_vars['gr']->value->id) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['gr']->value->name;?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['gr'] = $foreach_1_gr_sav['item'];
}
if ($foreach_1_gr_sav['s_item']) {
$_smarty_tpl->tpl_vars['gr'] = $foreach_1_gr_sav['s_item'];
}
?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="name[]" data-toggle="select2">
                            <option value="0">Выберите товар</option>
                            <?php
$foreach_2_pro_sav['s_item'] = isset($_smarty_tpl->tpl_vars['pro']) ? $_smarty_tpl->tpl_vars['pro'] : false;
$_from = $_smarty_tpl->tpl_vars['ap']->value->products;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['pro'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['pro']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['pro']->value) {
$_smarty_tpl->tpl_vars['pro']->_loop = true;
$foreach_2_pro_sav['item'] = $_smarty_tpl->tpl_vars['pro'];
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['pro']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['pro']->value->id == $_smarty_tpl->tpl_vars['ap']->value->name) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['pro']->value->name;?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['pro'] = $foreach_2_pro_sav['item'];
}
if ($foreach_2_pro_sav['s_item']) {
$_smarty_tpl->tpl_vars['pro'] = $foreach_2_pro_sav['s_item'];
}
?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="number" name="count[]" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ap']->value->count;?>
" placeholder="Количество">
                        </div>
                        <div class="col">
                            <select class="form-control" name="unit[]">
                                <option value="кг."<?php if ($_smarty_tpl->tpl_vars['ap']->value->unit == 'кг.') {?> selected<?php }?>>килограмов</option>
                                <option value="тон"<?php if ($_smarty_tpl->tpl_vars['ap']->value->unit == 'тон') {?> selected<?php }?>>тон</option>
                                <option value="ящи."<?php if ($_smarty_tpl->tpl_vars['ap']->value->unit == 'ящи.') {?> selected<?php }?>>ящиков</option>
                                <option value="пач."<?php if ($_smarty_tpl->tpl_vars['ap']->value->unit == 'пач.') {?> selected<?php }?>>пачек</option>
                                <option value="меш."<?php if ($_smarty_tpl->tpl_vars['ap']->value->unit == 'меш.') {?> selected<?php }?>>мешков</option>
                                <option value="шт."<?php if ($_smarty_tpl->tpl_vars['ap']->value->unit == 'шт.') {?> selected<?php }?>>штук</option>
                                <option value="лит."<?php if ($_smarty_tpl->tpl_vars['ap']->value->unit == 'лит.') {?> selected<?php }?>>литров</option>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger del-app-item">Удалить</button>
                </div> <!-- end card-body-->
            </div>
        </div>

    <?php
$_smarty_tpl->tpl_vars['ap'] = $foreach_0_ap_sav['item'];
}
if ($foreach_0_ap_sav['s_item']) {
$_smarty_tpl->tpl_vars['ap'] = $foreach_0_ap_sav['s_item'];
}
?>
</div>
<hr class="mt-0">
<div class="mb-3">
    <button type="submit" class="btn btn-success">Сохранить</button>
</div>
<?php echo form_close();

}
}
?>