{if $app}
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead class="thead-light">
            <tr>
                <th width="70">#</th>
                <th>Заказ открыт</th>
                <th>Заказ закроется</th>
                <th>Товаров</th>
                <th>Статус</th>
                <th width="100"></th>
            </tr>
            </thead>
            <tbody>
            {foreach $app as $ap}
                <tr>
                    <th scope="row">{$ap->id}</th>
                    <td>{date('d-m-Y в H:i',$ap->data)}</td>
                    <td>{date('d-m-Y в H:i',$ap->data_end)}</td>
                    <td>{count(json_decode($ap->app))}</td>
                    <td>
                        {if $ap->status == 0}
                            <span class="badge badge-warning">Открыт</span>
                        {elseif $ap->status == 1}
                            <span class="badge badge-info">В работе</span>
                        {elseif $ap->status == 2}
                            <span class="badge badge-success">Выполнен</span>
                        {/if}
                    </td>
                    <td>
                        {if $ap->status == 0}
                            <a href="{site_url('cabinet/app/edit/')}{$ap->id}" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fas fa-pencil-alt"></i></a>
                        {/if}
                        <a href="{site_url('cabinet/app/view/')}{$ap->id}" class="btn btn-sm btn-info waves-effect waves-light"><i class="far fa-file-alt"></i></a>
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
        {__('Заявок нет.')}
    </div>
{/if}