<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center">
                <div class="w-100 d-block my-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-5">
                            <div class="card">
                                <h4 class="card-header">{$title}</h4>
                                <div class="card-body">
                                    <form action="{route_to('reset-password')}" method="post">
                                        {csrf_field()}
                                        <div class="form-group">
                                            <label for="token">{lang('Auth.token')}</label>
                                            <input type="text" class="form-control {if session('errors.token')}is-invalid{/if}"
                                                   name="token" placeholder="{lang('Auth.token')}" value="{old('token', $token)}">
                                            <div class="invalid-feedback">
                                                {session('errors.token')}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">{lang('Auth.email')}</label>
                                            <input type="email" class="form-control {if session('errors.email')}is-invalid{/if}"
                                                   name="email" aria-describedby="emailHelp" placeholder="{lang('Auth.email')}" value="{old('email')}">
                                            <div class="invalid-feedback">
                                                {session('errors.email')}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">{lang('Auth.newPassword')}</label>
                                            <input type="password" class="form-control {if session('errors.password')}is-invalid{/if}"
                                                   name="password">
                                            <div class="invalid-feedback">
                                                {session('errors.password')}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="pass_confirm">{lang('Auth.newPasswordRepeat')}</label>
                                            <input type="password" class="form-control {if session('errors.pass_confirm')}is-invalid{/if}"
                                                   name="pass_confirm">
                                            <div class="invalid-feedback">
                                                {session('errors.pass_confirm')}
                                            </div>
                                        </div>

                                        <div class="mb-3 text-center">
                                            <button class="btn btn-primary btn-block" type="submit">{__('Сбросить пароль')}</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div> <!-- end .w-100 -->
            </div> <!-- end .d-flex -->
        </div> <!-- end col-->
    </div> <!-- end row -->
</div>