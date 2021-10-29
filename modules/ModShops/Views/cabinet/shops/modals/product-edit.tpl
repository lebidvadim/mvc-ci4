{form_open()}
<h4>Редактировать товар <b>{$product->name}</b></h4>
<div class="form-group">
    <select name="id_gr" class="form-control">
        {foreach $groups as $gr}
            <option value="{$gr->id}" {if $product->id_gr == $gr->id} selected{/if}>{$gr->name}</option>
        {/foreach}
    </select>
</div>
<div class="form-group">
    <input type="text" name="name" autocomplete="off" class="form-control" value="{$product->name}" placeholder="{__('Найменование')}">
</div>
<div class="d-flex justify-content-center align-items-center">
    <button type="submit" name="del" class="waves-effect waves-light btn btn-success m-2">{__('Сохранить')}</button>
    <button type="button" class="waves-effect waves-light btn btn-primary" data-dismiss="modal" aria-label="Close">{__('Отмена')}</button>
</div>
{form_close()}