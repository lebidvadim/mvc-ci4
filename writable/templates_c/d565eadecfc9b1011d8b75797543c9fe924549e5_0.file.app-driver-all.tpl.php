<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-12 12:37:44
         compiled from "/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/app-driver-all.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5242480985ebadee850c0e9_44588310%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd565eadecfc9b1011d8b75797543c9fe924549e5' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/modules/ModShops/Views/cabinet/shops/app-driver-all.tpl',
      1 => 1589303360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5242480985ebadee850c0e9_44588310',
  'variables' => 
  array (
    'app' => 0,
    'ap' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ebadee8538f45_61120734',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ebadee8538f45_61120734')) {
function content_5ebadee8538f45_61120734 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5242480985ebadee850c0e9_44588310';
if ($_smarty_tpl->tpl_vars['app']->value) {?>
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead class="thead-light">
            <tr>
                <th width="70">#</th>
                <th>Тип заявки</th>
                <th>Заказ открыт</th>
                <th>Магазинов дали заявки</th>
                <th>Товаров</th>
                <th>Статус</th>
                <th width="100"></th>
            </tr>
            </thead>
            <tbody>
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
                <tr>
                    <th scope="row"><?php echo $_smarty_tpl->tpl_vars['ap']->value->id;?>
</th>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['ap']->value->type == 1) {?>
                            Продукты
                        <?php } else { ?>
                            Строй материалы
                        <?php }?>
                    </td>
                    <td><?php echo date('d-m-Y в H:i',$_smarty_tpl->tpl_vars['ap']->value->data);?>
</td>
                    <td><?php echo count(explode(',',$_smarty_tpl->tpl_vars['ap']->value->id_shops));?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ap']->value->count_app;?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['ap']->value->status == 0) {?>
                            <span class="badge badge-info">В работе</span>
                        <?php } elseif ($_smarty_tpl->tpl_vars['ap']->value->status == 1) {?>
                            <span class="badge badge-success">Выполнен</span>
                        <?php }?>
                    </td>
                    <td>
                        <a href="<?php echo site_url('cabinet/app-driver/edit/');
echo $_smarty_tpl->tpl_vars['ap']->value->id;?>
" class="btn btn-sm btn-info waves-effect waves-light"><i class="far fa-file-alt"></i></a>
                    </td>
                </tr>

            <?php
$_smarty_tpl->tpl_vars['ap'] = $foreach_0_ap_sav['item'];
}
if ($foreach_0_ap_sav['s_item']) {
$_smarty_tpl->tpl_vars['ap'] = $foreach_0_ap_sav['s_item'];
}
?>

            </tbody>
        </table>
    </div>
    <nav class="mt-3">
        <?php echo $_smarty_tpl->tpl_vars['pager']->value->links();?>

    </nav>
<?php } else { ?>
    <div class="alert alert-warning" role="alert">
        <?php echo __('Заявок нет.');?>

    </div>
<?php }
}
}
?>