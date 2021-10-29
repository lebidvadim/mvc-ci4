<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-11 05:54:14
         compiled from "/home/dimckale/lebid.pro/ci4/modules/ModShops/Views/cabinet/shops/products-all.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:747140595eb92ed6593f45_06117085%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61765b4e888b7236f8f374b3d014a5805fed3840' => 
    array (
      0 => '/home/dimckale/lebid.pro/ci4/modules/ModShops/Views/cabinet/shops/products-all.tpl',
      1 => 1589194450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '747140595eb92ed6593f45_06117085',
  'variables' => 
  array (
    'products' => 0,
    'pr' => 0,
    'groups' => 0,
    'gr' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5eb92ed6603ea5_24632020',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5eb92ed6603ea5_24632020')) {
function content_5eb92ed6603ea5_24632020 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '747140595eb92ed6593f45_06117085';
?>
<div class="mb-3"><a class="btn btn-outline-success" href="<?php echo site_url('modal/products/add');?>
" data-toggle="modal" data-target=".modal-product">Добавить товар</a></div>

<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead class="thead-light">
            <tr>
                <th width="70">#</th>
                <th>Найменование</th>
                <th>Раздел</th>
                <th width="90"></th>
            </tr>
            </thead>
            <tbody>
            <?php
$foreach_0_pr_sav['s_item'] = isset($_smarty_tpl->tpl_vars['pr']) ? $_smarty_tpl->tpl_vars['pr'] : false;
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['pr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->value) {
$_smarty_tpl->tpl_vars['pr']->_loop = true;
$foreach_0_pr_sav['item'] = $_smarty_tpl->tpl_vars['pr'];
?>
                <tr>
                    <th scope="row"><?php echo $_smarty_tpl->tpl_vars['pr']->value->id;?>
</th>
                    <td><?php echo $_smarty_tpl->tpl_vars['pr']->value->name;?>
</td>
                    <td><?php
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
if ($_smarty_tpl->tpl_vars['gr']->value->id == $_smarty_tpl->tpl_vars['pr']->value->id_gr) {
echo $_smarty_tpl->tpl_vars['gr']->value->name;
}
$_smarty_tpl->tpl_vars['gr'] = $foreach_1_gr_sav['item'];
}
if ($foreach_1_gr_sav['s_item']) {
$_smarty_tpl->tpl_vars['gr'] = $foreach_1_gr_sav['s_item'];
}
?></td>
                    <td>
                        <a href="<?php echo site_url('modal/products/edit/');
echo $_smarty_tpl->tpl_vars['pr']->value->id;?>
" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="modal" data-target=".modal-product"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?php echo site_url('modal/products/del/');
echo $_smarty_tpl->tpl_vars['pr']->value->id;?>
" class="btn btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target=".modal-product"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php
$_smarty_tpl->tpl_vars['pr'] = $foreach_0_pr_sav['item'];
}
if ($foreach_0_pr_sav['s_item']) {
$_smarty_tpl->tpl_vars['pr'] = $foreach_0_pr_sav['s_item'];
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
        <?php echo __('Товаров нет.');?>

    </div>
<?php }?>
<div class="modal fade modal-product" tabindex="-1" role="document" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="spinner-border avatar-sm text-primary m-2" role="status"></div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
?>