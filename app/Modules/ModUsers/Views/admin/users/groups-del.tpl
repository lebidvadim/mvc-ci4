{form_open()}
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">{__('Удалить группу')}!</h4>
    <p>{__('Вы Уверены что хотите удалить группу <b>[name]</b>?',[$group['name']])}</p>
    <hr>
    <div>
        <button type="submit" name="del" class="waves-effect waves-light btn btn-danger m-2">{__('Да')}</button>
        <a href="{site_url('admin/users/groups')}" class="waves-effect waves-light btn btn-primary" data-dismiss="modal" aria-label="Close">{__('Нет')}</a>
    </div>
</div>
{form_close()}