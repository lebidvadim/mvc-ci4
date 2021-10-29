<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">{__('Редактировать пользователя')}</h4>
                {form_open()}
                <div class="form-group">
                    <label for="email">Группа</label>
                    <select class="form-control {if session('errors.groups')}is-invalid{/if}" name="groups">
                        {foreach $groups as $gr}
                            <option value="{$gr->id}"{if $userEdit->group[0]['group_id'] == $gr->id} selected{/if}>{$gr->description}</option>
                        {/foreach}
                    </select>
                    <div class="invalid-feedback">
                        {session('errors.groups')}
                    </div>
                </div>


                <div class="form-group">
                    <label for="password">Новый пароль</label>
                    <input type="password" name="password" class="form-control {if session('errors.password')}is-invalid{/if}" placeholder="Пароль" autocomplete="off">
                    <div class="invalid-feedback">
                        {session('errors.password')}
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass_confirm">Повторить пароль</label>
                    <input type="password" name="pass_confirm" class="form-control {if session('errors.pass_confirm')}is-invalid{/if}" placeholder="Повторить пароль" autocomplete="off">
                    <div class="invalid-feedback">
                        {session('errors.pass_confirm')}
                    </div>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light">{__('Сохранить')}</button>
                {form_close()}
            </div> <!-- end card-body-->
        </div>
    </div>
</div>
