<div class="mb-3"><a href="{site_url('cabinet/app-driver')}" class="btn btn-outline-dark">Назад</a></div>
<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item">
        <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link active">
            <span>Весь заказ</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link">
            <span>По магазинам</span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane" id="home1">
        {foreach $shops->app as $ap}
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">{$ap->username}</li>
            </ol>


                    <div class="table-responsive mb-3">
                        <table class="table table-bordered mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th width="50">#</th>
                                <th>Найменование</th>
                                <th width="100">Количество</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach $ap->group as $group}
                                <tr class="table-warning">
                                    <th colspan="3" class="text-center">{$group->name}</th>
                                </tr>
                                {$i = 1}
                                {foreach $ap->app as $a}
                                    {if $a->id_gr == $group->id}
                                        <tr>
                                            <td>{$i}</td>
                                            <td>{$a->name}</td>
                                            <td>{$a->count} {$a->unit}</td>
                                        </tr>
                                        {$i = $i+1}
                                    {/if}
                                {/foreach}
                            {/foreach}
                            </tbody>
                        </table>
                    </div>

        {/foreach}
    </div>
    <div class="tab-pane show active" id="profile1">


        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Все заказ</li>
        </ol>


                <div class="table-responsive mb-3">
                    <table class="table table-bordered mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th width="50">#</th>
                            <th>Найменование</th>
                            <th width="100">Количество</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $app['groups'] as $group}
                            <tr class="table-warning">
                                <th colspan="3" class="text-center">{$group->name}</th>
                            </tr>
                            {$i = 1}
                            {foreach $app['prod'] as $a}
                                {if $a[0]->id_gr == $group->id}
                                    {foreach $a as $z}
                                        <tr>
                                            <td>{$i}</td>
                                            <td>{$z->name}</td>
                                            <td>{$z->cou_sum} {$z->unit}</td>
                                        </tr>
                                        {$i = $i+1}
                                    {/foreach}
                                {/if}
                            {/foreach}
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
</div>