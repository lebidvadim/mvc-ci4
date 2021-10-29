<div class="mb-3"><a href="{site_url('cabinet/app')}" class="btn btn-outline-dark">Назад</a></div>
<div class="pb-4">
    <div class="table-responsive ">
        <table class="table table-bordered mb-0">
            <thead class="thead-light">
            <tr>
                <th width="50">#</th>
                <th>Найменование</th>
                <th width="150">Количество</th>
            </tr>
            </thead>
            <tbody>

            {foreach $cat as $c}
                {if $c->count != 0}
                    <tr class="table-warning">
                        <th colspan="3" class="text-center">{$c->name}</th>
                    </tr>
                    {$i = 1}
                    {foreach $app as $a}
                        {if $a->id_gr == $c->id}
                            <tr>
                                <td>{$i}</td>
                                <td>{$a->product[0]->name}</td>
                                <td>{$a->count} {$a->unit}</td>
                            </tr>
                            {$i = $i+1}
                        {/if}
                    {/foreach}
                {/if}
            {/foreach}
            </tbody>
        </table>
    </div>
</div>