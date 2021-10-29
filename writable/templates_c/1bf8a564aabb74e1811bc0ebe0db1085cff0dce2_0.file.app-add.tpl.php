<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-23 13:06:42
         compiled from "/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/app-add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17043845165ec9663238cce1_09766368%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bf8a564aabb74e1811bc0ebe0db1085cff0dce2' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/app-add.tpl',
      1 => 1589445221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17043845165ec9663238cce1_09766368',
  'variables' => 
  array (
    'groups' => 0,
    'gr' => 0,
    'products' => 0,
    'pro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ec96632406ec6_56637469',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ec96632406ec6_56637469')) {
function content_5ec96632406ec6_56637469 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17043845165ec9663238cce1_09766368';
?>
<div class="mb-3">
    <a href="<?php echo site_url('cabinet/app');?>
" class="btn btn-outline-dark">Назад</a>
    <button type="button" id="add-item-app" class="btn btn-outline-success ml-2">Добавить товар</button>
    <button type="button" id="remove-item-app" class="btn btn-outline-danger ml-2">Очистить</button>
</div>
<?php echo form_open();?>

<?php if (in_groups('scorepr')) {?>
    <input type="hidden" name="type" value="1">
<?php } elseif (in_groups('scorest')) {?>
    <input type="hidden" name="type" value="2">
<?php }?>
<div id="app-bk" class="row">
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
    </div>
</div>
<hr class="mt-0">
<div class="mb-3">
    <button type="submit" class="btn btn-success">Создать</button>
</div>
<?php echo form_close();

}
}
?>