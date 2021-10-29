<div><a href="{site_url('admin/users/groups-add')}" class="btn btn-outline-success waves-effect waves-light mb-3">{__('Добавить группу')}</a></div>
{if $groups}
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Описание</th>
                <th width="90"></th>
            </tr>
            </thead>
            <tbody>
            {foreach $groups as $gr}
            <tr>
                <th scope="row">{$gr->id}</th>
                <td>{$gr->name}</td>
                <td>{$gr->description}</td>
                <td>
                    <a href="{site_url('admin/users/groups-edit/')}{$gr->id}" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{site_url('modal/users/group-del/')}{$gr->id}" class="btn btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-trash-alt"></i></a>
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