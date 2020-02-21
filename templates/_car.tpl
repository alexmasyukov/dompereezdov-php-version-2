<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 car">
    {if $page->cars_withoutLink}
        <p style="font-size: 15px; color: #0c9cd0;">{$car->name|upper}</p>
        <img src="{$car->small_img}" alt="{$car->name}" title="{$car->name}" style="margin-bottom: 10px;"/>
    {else}
        <a href="{$protocol}://{$HTTP_HOST}{$car->cpu_path}">
            {$car->name}
            <img src="{$car->small_img}" alt="{$car->name}" title="{$car->name}"/>
        </a>
    {/if}
    <div class="clearfix"></div>

    <table>
        {foreach $car->attributes as $attribute}
            <tr>
                <td>{$attribute->title}</td>
                <td>{$attribute->value}</td>
            </tr>
        {/foreach}
    </table>
</div>

