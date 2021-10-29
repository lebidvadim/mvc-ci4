{form_open()}
<h4>Удалить товар <b>{$product->name}</b>?</h4>
<p>Вы уверены что хотите удалить товар <b>{$product->name}</b>!</p>
<div class="d-flex justify-content-center align-items-center">
    <button type="submit" name="del" class="waves-effect waves-light btn btn-danger m-2">{__('Да')}</button>
    <button type="button" class="waves-effect waves-light btn btn-primary" data-dismiss="modal" aria-label="Close">{__('Нет')}</button>
</div>
{form_close()}