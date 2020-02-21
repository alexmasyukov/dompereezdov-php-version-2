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
                                {$price->content}
                            {else}
                                {if $page->cars_onlyId}
                                    {foreach $cars as $car}
                                        <div class="text">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 col-sm-3">
                                                    <img src="{$car->big_img}" alt="{$car->name}"
                                                         title="{$car->name}"
                                                         class="img-responsive"/>
                                                </div>
                                                <div class="col-lg-9 col-md-8 col-sm-9">
                                                    <p style="font-size: 16px">{$car->name|upper}</p>
                                                    {$car->description}
                                                </div>
                                            </div>
                                            <table>
                                                {foreach $car->attributes as $attribute}
                                                    <tr>
                                                        <td class="td_left">{$attribute->title}</td>
                                                        <td class="td_right">{$attribute->value}</td>
                                                    </tr>
                                                {/foreach}
                                            </table>
                                        </div>
                                    {/foreach}
                                {else}
                                    {include '_carsPage__all_cars_page.tpl'}
                                {/if}
                            {/if}
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
                                            {* Исключаем в списке услуг текущую услугу (мы итак на ее странице,
                                            зачем показывать ее в списке *}
                                            {if $service->cpu_path neq $page->cpu_path}
                                                <li>
                                                    <a href="{$service->link}">{$service->title} в {$page->p_pr}</a>
                                                </li>
                                            {/if}
                                        {/foreach}
                                    </ul>
                                </div>
                            </div>
                        {/if}

                        <div class="bl text text-bottom">
                            {$page->bottom_text}
                        </div>

                        {if $page->breadcrumb_names}
                            <div class="bl mini-breadcumb">
                                {foreach from=$page->breadcrumb_names key=$k item=$item}
                                    <a href="{$page->breadcrumb_paths[$k]}">{$item}</a>
                                {/foreach}
                            </div>
                        {/if}

                        {*{if $page->cpu != 'vyvoz-mebeli'}*}
                        {*{include '_mskServicesPage__map.tpl'}*}
                        {*{/if}*}
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