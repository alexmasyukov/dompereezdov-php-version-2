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
                            <img src="{$generalCar->big_img}"
                                 alt="{$generalCar->name}"
                                 title="{$generalCar->name}"
                                 class="img-responsive"
                                 style="max-width: 264px; float:left;
                                         padding: 4px 20px 0px 0;"
                            />
                            {$page->top_text}
                            <div class="clear"></div>
                        </div>

                        <div class="bl text">
                            <h2>{$page->titlePrice}</h2>
                            <table>
                                {foreach $generalCar->attributes as $attribute}
                                    <tr>
                                        <td class="left">{$attribute->title}</td>
                                        <td class="right">{$attribute->value}</td>
                                    </tr>
                                {/foreach}
                            </table>
                        </div>

                        <div class="bl text text-bottom">
                            {$page->bottom_text}
                        </div>

                        <div class="bl cars">
                            <h2>{$page->titleGallery}</h2>
                            {include '_carsPage__all_cars_page.tpl'}
                        </div>

                        {if $photogallery}
                            {include '_mskServicePage__photogallery.tpl'}
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
    .left {
        text-align: center;
        width: 30%;
        border: 10px solid #fff !important;
        border-left: 0px solid #fff !important;
        background: #EBEBEB !important;

    }

    .right {
        background: #F2FDFF !important;
        border: 10px solid #fff !important;
        font-weight: 600;
        font-family: "Open Sans Bold";
    }

    .right span {
        font-family: 'Open Sans';
        font-weight: 400 !important
    }

    .car_name_span {
        min-height: 43px;
        display: block;
        width: 84%;
    }
</style>


{include '_footer.tpl'}