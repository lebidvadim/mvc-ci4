{if $users}
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Эмаил</th>
                <th>Логин</th>
                <th>Дата создания</th>
                <th>Группа</th>
                <th>Статус</th>
                <th width="90"></th>
            </tr>
            </thead>
            <tbody>
            {foreach $users as $us}
            <tr>
                <th scope="row">{$us->id}</th>
                <td>{$us->email}</td>
                <td>{$us->username}</td>
                <td>{$us->created_at}</td>
                <td>{$us->group[0]['description']}</td>
                <td>{if $us->active == 0}<span class="badge badge-danger">Не активирован</span>{else}<span class="badge badge-success">Активирован</span>{/if}</td>
                <td>
                    <a href="{site_url('admin/users/edit/')}{$us->id}" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{site_url('modal/users/del/')}{$us->id}" class="btn btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            {/foreach}

            </tbody>
        </table>
    </div>
    <nav class="mt-3">
        {$pager->links()}
    </nav>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="document" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="spinner-border avatar-sm text-primary m-2" role="status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{else}
    <div class="alert alert-warning" role="alert">
        {__('Записей нет.')}
    </div>
{/if}