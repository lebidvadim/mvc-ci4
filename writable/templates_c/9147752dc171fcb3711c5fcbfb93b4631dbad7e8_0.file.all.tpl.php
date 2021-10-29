<?php /* Smarty version 3.1.28-dev/21, created on 2020-05-14 08:15:36
         compiled from "/home/dimckale/lebid.pro/report/app/Modules/ModUsers/Views/admin/users/all.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:226953065ebd4478a8dd55_02245587%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9147752dc171fcb3711c5fcbfb93b4631dbad7e8' => 
    array (
      0 => '/home/dimckale/lebid.pro/report/app/Modules/ModUsers/Views/admin/users/all.tpl',
      1 => 1589102374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226953065ebd4478a8dd55_02245587',
  'variables' => 
  array (
    'users' => 0,
    'us' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/21',
  'unifunc' => 'content_5ebd4478abb5a9_73138631',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ebd4478abb5a9_73138631')) {
function content_5ebd4478abb5a9_73138631 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '226953065ebd4478a8dd55_02245587';
if ($_smarty_tpl->tpl_vars['users']->value) {?>
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Эмаил</th>
                <th>Логин</th>
                <th>Дата создания</th>
                <th>Группа</th>
                <th>Статус</th>
                <th width="90"></th>
            </tr>
            </thead>
            <tbody>
            <?php
$foreach_0_us_sav['s_item'] = isset($_smarty_tpl->tpl_vars['us']) ? $_smarty_tpl->tpl_vars['us'] : false;
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['us'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['us']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['us']->value) {
$_smarty_tpl->tpl_vars['us']->_loop = true;
$foreach_0_us_sav['item'] = $_smarty_tpl->tpl_vars['us'];
?>
            <tr>
                <th scope="row"><?php echo $_smarty_tpl->tpl_vars['us']->value->id;?>
</th>
                <td><?php echo $_smarty_tpl->tpl_vars['us']->value->email;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['us']->value->username;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['us']->value->created_at;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['us']->value->group[0]['description'];?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['us']->value->active == 0) {?><span class="badge badge-danger">Не активирован</span><?php } else { ?><span class="badge badge-success">Активирован</span><?php }?></td>
                <td>
                    <a href="<?php echo site_url('admin/users/edit/');
echo $_smarty_tpl->tpl_vars['us']->value->id;?>
" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fas fa-pencil-alt"></i></a>
                    <a href="<?php echo site_url('modal/users/del/');
echo $_smarty_tpl->tpl_vars['us']->value->id;?>
" class="btn btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php
$_smarty_tpl->tpl_vars['us'] = $foreach_0_us_sav['item'];
}
if ($foreach_0_us_sav['s_item']) {
$_smarty_tpl->tpl_vars['us'] = $foreach_0_us_sav['s_item'];
}
?>

            </tbody>
        </table>
    </div>
    <nav class="mt-3">
        <?php echo $_smarty_tpl->tpl_vars['pager']->value->links();?>

    </nav>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="document" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="spinner-border avatar-sm text-primary m-2" role="status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="alert alert-warning" role="alert">
        <?php echo __('Записей нет.');?>

    </div>
<?php }
}
}
?>