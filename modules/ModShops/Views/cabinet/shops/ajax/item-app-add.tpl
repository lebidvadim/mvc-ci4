<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 app-items">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <select name="id_gr[]" class="form-control">
                    <option value="0">Выберите категорию</option>
                    {foreach $groups as $gr}
                        <option value="{$gr->id}">{$gr->name}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="name[]" data-toggle="select2" disabled>
                    <option value="0">Выберите товар</option>
                    {foreach $products as $pro}
                        <option value="{$pro->id}">{$pro->name}</option>
                    {/foreach}
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