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