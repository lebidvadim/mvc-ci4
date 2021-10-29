<div class="mb-3"><a class="btn btn-outline-success" href="{site_url('modal/products/add')}" data-toggle="modal" data-target=".modal-product">Добавить товар</a></div>

{if $products}
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead class="thead-light">
            <tr>
                <th width="70">#</th>
                <th>Найменование</th>
                <th>Раздел</th>
                <th width="90"></th>
            </tr>
            </thead>
            <tbody>
            {foreach $products as $pr}
                <tr>
                    <th scope="row">{$pr->id}</th>
                    <td>{$pr->name}</td>
                    <td>{foreach $groups as $gr}{if $gr->id == $pr->id_gr}{$gr->name}{/if}{/foreach}</td>
                    <td>
                        <a href="{site_url('modal/products/edit/')}{$pr->id}" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="modal" data-target=".modal-product"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{site_url('modal/products/del/')}{$pr->id}" class="btn btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target=".modal-product"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            {/foreach}

            </tbody>
        </table>
    </div>
    <nav class="mt-3">
        {$pager->links()}
    </nav>
{else}
    <div class="alert alert-warning" role="alert">
        {__('Товаров нет.')}
    </div>
{/if}
<div class="modal fade modal-product" tabindex="-1" role="document" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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