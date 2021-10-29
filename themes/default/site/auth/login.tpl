<form action="{route_to('login')}" method="post">
    {csrf_field()}
    {if $config->validFields === ['email']}
        <div class="form-group">
            <label for="login">{lang('Auth.email')}</label>
            <input type="email" class="form-control {if session('errors.login')}is-invalid{/if}" name="login" placeholder="{lang('Auth.email')}">
            <div class="invalid-feedback">
                {session('errors.login')}
            </div>
        </div>
    {else}
        <div class="form-group">
            <label for="login">{lang('Auth.emailOrUsername')}</label>
            <input type="text" class="form-control {if session('errors.login')}is-invalid{/if}" name="login" placeholder="{lang('Auth.emailOrUsername')}">
            <div class="invalid-feedback">
                {session('errors.login')}
            </div>
        </div>
    {/if}
    <div class="form-group">
        <a href="{site_url('forgot')}" class="text-muted float-right">{__('Забыли пароль?')}</a>
        <label for="password">{lang('Auth.password')}</label>
        <input type="password" name="password" class="form-control {if session('errors.password')}is-invalid{/if}" placeholder="{lang('Auth.password')}">
        <div class="invalid-feedback">
            {session('errors.password')}
        </div>
    </div>

    {if $config->allowRemembering}
        <div class="form-group pb-3">
            <div class="custom-control custom-checkbox checkbox-primary">
                <input type="checkbox" name="remember" class="custom-control-input" id="checkbox-signin" {if old('remember')} checked{/if}>
                <label class="custom-control-label" for="checkbox-signin">{__('Запомни меня')}</label>
            </div>
        </div>
    {/if}
    <div class="mb-3 text-center">
        <button class="btn btn-primary btn-block" type="submit"> {__('Войти')} </button>
    </div>
</form>