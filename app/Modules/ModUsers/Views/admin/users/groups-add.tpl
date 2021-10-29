<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">{__('Добавить группу')}</h4>
                {form_open()}
                    <div class="form-group">
                        <label for="exampleInputEmail1">{__('Имя группы')}</label>
                        <input type="text" name="name" class="form-control {if session('errors.name')}is-invalid{/if}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{__('Укажите имя группы')}">
                        <div class="invalid-feedback">
                            {session('errors.name')}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">{__('Описание группы')}</label>
                        <input type="text" name="description" class="form-control {if session('errors.description')}is-invalid{/if}" id="exampleInputPassword1" placeholder="{__('Укажите описание группы')}">
                        <div class="invalid-feedback">
                            {session('errors.description')}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{__('Добавить')}</button>
                {form_close()}
            </div> <!-- end card-body-->
        </div>
    </div>
</div>
