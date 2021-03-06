<form action="{route_to('register')}" method="post">
    {csrf_field()}
    <div class="form-group">
        <label for="email">{lang('Auth.email')}</label>
        <input type="text" class="form-control {if session('errors.email')}is-invalid{/if}"
               name="email" aria-describedby="emailHelp" placeholder="{lang('Auth.email')}" value="{old('email')}">
        <div class="invalid-feedback">
            {session('errors.email')}
        </div>
    </div>

    <div class="form-group">
        <label for="username">{lang('Auth.username')}</label>
        <input type="text" class="form-control {if session('errors.username')}is-invalid{/if}" name="username" placeholder="{lang('Auth.username')}" value="{old('username')}">
        <div class="invalid-feedback">
            {session('errors.username')}
        </div>
    </div>

    <div class="form-group">
        <label for="password">{lang('Auth.password')}</label>
        <input type="password" name="password" class="form-control {if session('errors.password')}is-invalid{/if}" placeholder="{lang('Auth.password')}" autocomplete="off">
        <div class="invalid-feedback">
            {session('errors.password')}
        </div>
    </div>

    <div class="form-group">
        <label for="pass_confirm">{lang('Auth.repeatPassword')}</label>
        <input type="password" name="pass_confirm" class="form-control {if session('errors.pass_confirm')}is-invalid{/if}" placeholder="{lang('Auth.repeatPassword')}" autocomplete="off">
        <div class="invalid-feedback">
            {session('errors.pass_confirm')}
        </div>
    </div>

    <div class="mb-3 text-center">
        <button class="btn btn-primary btn-block" type="submit">{__('Регистрация')}</button>
    </div>
</form>