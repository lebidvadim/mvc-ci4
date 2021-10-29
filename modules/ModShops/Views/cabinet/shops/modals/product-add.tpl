{form_open()}
<h4>Добавить товар</h4>
{if in_groups('scorepr')}
    <input type="hidden" name="type" value="1">
{elseif in_groups('scorest')}
    <input type="hidden" name="type" value="2">
{/if}
<div class="form-group">
    <select name="id_gr" class="form-control">
        {foreach $groups as $gr}
            <option value="{$gr->id}">{$gr->name}</option>
        {/foreach}
    </select>
</div>
<div class="form-group">
    <input type="text" name="name" id="product-search" autocomplete="off" class="form-control" placeholder="{__('Найменование')}">
</div>
<div class="d-flex justify-content-center align-items-center">
    <button type="submit" name="add" class="waves-effect waves-light btn btn-success m-2">{__('Добавить')}</button>
    <button type="button" class="waves-effect waves-light btn btn-primary" data-dismiss="modal" aria-label="Close">{__('Отмена')}</button>
</div>
{form_close()}