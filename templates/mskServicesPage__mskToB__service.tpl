{include '_header.tpl'}

<div class="container all_catalog">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 page page_content">
            <div class="bg_white">
                <div class="row">
                    <div class="col-md-12">
                        {$breadcrumb}

                        <h1>{$page->h1}</h1>

                        <div class="bl text text-top">
                            {$page->top_text}
                        </div>

                        <div class="bl cars">
                            <h2>{$page->titlePrice}</h2>
                            {if $page->priceId}
                                <div class="bl text">
                                    {$price->content}
                                </div>
                            {else}
                                {include '_carsPage__all_cars_page.tpl'}
                            {/if}
                        </div>

                        <div class="bl text text-bottom">
                            {$page->bottom_text}
                        </div>

                        {if $photogallery}
                            {include '_mskServicePage__photogallery.tpl'}
                        {/if}

                        {if $similarServices}
                            <div class="bl similar-uslugi pohojie_uslugi">
                                <h3>{$page->titleSimilarServices}</h3>
                                <div class="bl uslugi-list">
                                    <ul class="uslugi-ul">
                                        {foreach $similarServices as $service}
                                            {* Исключаем в списке услуг текущую услугу (мы и так на ее странице,
                                            зачем показывать ее в списке *}
                                            {if $service->cpu_path neq $page->cpu_path}
                                                <li>
                                                    <a href="{$service->link}">{$service->title} в {$page->p_ve}</a>
                                                </li>
                                            {/if}
                                        {/foreach}
                                    </ul>
                                </div>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="aside1">
            {include '_left_block_of_page.tpl'}
        </div>
    </div>
</div>

<style>
    table.price_table_1,
    table.price_table_2 {
        width: 100%;
    }

    table th {
        background: #004660 !important;
        border: 0px !important;
    }

    .page table {
        border: 0px !important;
    }

    .td_left {
        text-align: center;
        width: 30%;
        border: 10px solid #fff !important;
        border-left: 0px solid #fff !important;
        background: #EBEBEB !important;

    }

    .td_right {
        background: #F2FDFF !important;
        border: 10px solid #fff !important;
        font-weight: 600;
        font-family: "Open Sans Bold";
    }

    .td_right span {
        font-family: 'Open Sans';
        font-weight: 400 !important
    }
</style>

{include '_footer.tpl'}