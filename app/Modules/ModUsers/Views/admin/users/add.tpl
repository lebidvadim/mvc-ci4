<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">{__('Добавить пользователя')}</h4>
                {form_open()}
                <input type="hidden" value="1" name="active">
                <div class="form-group">
                    <label for="email">Группа</label>
                    <select class="form-control {if session('errors.groups')}is-invalid{/if}" name="groups">
                        {foreach $groups as $gr}
                        <option value="{$gr->id}">{$gr->description}</option>
                        {/foreach}
                    </select>
                    <div class="invalid-feedback">
                        {session('errors.groups')}
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Эмаил</label>
                    <input type="text" class="form-control {if session('errors.email')}is-invalid{/if}"
                           name="email" aria-describedby="emailHelp" placeholder="Эмаил" value="{old('email')}">
                    <div class="invalid-feedback">
                        {session('errors.email')}
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Логин</label>
                    <input type="text" class="form-control {if session('errors.username')}is-invalid{/if}" name="username" placeholder="Логин" value="{old('username')}">
                    <div class="invalid-feedback">
                        {session('errors.username')}
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
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
                <button type="submit" class="btn btn-primary waves-effect waves-light">{__('Добавить')}</button>
                {form_close()}
            </div> <!-- end card-body-->
        </div>
    </div>
</div>
