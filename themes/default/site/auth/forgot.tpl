<form action="{route_to('forgot')}" method="post">
    {csrf_field()}
    <div class="form-group">
        <label for="email">{lang('Auth.emailAddress')}</label>
        <input type="email" class="form-control {if session('errors.email')}is-invalid{/if}"
                                                   name="email" aria-describedby="emailHelp" placeholder="{lang('Auth.email')}">
        <div class="invalid-feedback">
            {session('errors.email')}
        </div>
    </div>
    <div class="mb-3 text-center">
        <button class="btn btn-primary btn-block" type="submit">{__('Сбросить пароль')}</button>
    </div>
</form>