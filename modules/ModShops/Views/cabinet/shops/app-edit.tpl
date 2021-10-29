<div class="mb-3">
    <a href="{site_url('cabinet/app')}" class="btn btn-outline-dark">Назад</a>
    <button type="button" id="add-item-app" class="btn btn-outline-success ml-2">Добавить товар</button>
    <button type="button" id="remove-item-app" class="btn btn-outline-danger ml-2">Очистить</button>
</div>
{form_open()}
<div id="app-bk" class="row">
    {foreach $app as $ap}

        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 app-items">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <select name="id_gr[]" class="form-control">
                            <option value="0">Выберите категорию</option>
                            {foreach $groups as $gr}
                                <option value="{$gr->id}"{if $ap->id_gr == $gr->id} selected{/if}>{$gr->name}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="name[]" data-toggle="select2">
                            <option value="0">Выберите товар</option>
                            {foreach $ap->products as $pro}
                                <option value="{$pro->id}"{if $pro->id == $ap->name} selected{/if}>{$pro->name}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="number" name="count[]" class="form-control" value="{$ap->count}" placeholder="Количество">
                        </div>
                        <div class="col">
                            <select class="form-control" name="unit[]">
                                <option value="кг."{if $ap->unit == 'кг.'} selected{/if}>килограмов</option>
                                <option value="тон"{if $ap->unit == 'тон'} selected{/if}>тон</option>
                                <option value="ящи."{if $ap->unit == 'ящи.'} selected{/if}>ящиков</option>
                                <option value="пач."{if $ap->unit == 'пач.'} selected{/if}>пачек</option>
                                <option value="меш."{if $ap->unit == 'меш.'} selected{/if}>мешков</option>
                                <option value="шт."{if $ap->unit == 'шт.'} selected{/if}>штук</option>
                                <option value="лит."{if $ap->unit == 'лит.'} selected{/if}>литров</option>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger del-app-item">Удалить</button>
                </div> <!-- end card-body-->
            </div>
        </div>

    {/foreach}
</div>
<hr class="mt-0">
<div class="mb-3">
    <button type="submit" class="btn btn-success">Сохранить</button>
</div>
{form_close()}