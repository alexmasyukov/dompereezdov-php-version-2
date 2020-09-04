<script>
    jQuery(document).ready(function () {
        jQuery('body #prices')
            .addClass('open, active')

    });
</script>

<?php
include_once $root.'/cms/php/get_select_sql_data.php';

//Сссылка на кнопки Сохранить и закрыть, Закрыть
$exit_link = 'admin.php?link=prices&filter='.$filter;

//Описание формы (Название сверху и путь на сером фоне)
$form_info = array(
    page_title        => 'Редактирование таблицы с прайсом',
    module_title      => 'Прайсы',
    where_you_title_1 => 'Таблицы прайсов',
    where_you_link_1  => $exit_link
);

//Получаем категории для выбора родителя (с radio button)
//$catalog_categories_json_data = get_categories_json_data(
//        'my_works_category', //Таблица категорий модуля
//        false, // Кнопка редактирования категории,
//        true, //Radio button при выборе родительской категории,
//        $link, //название текущей формы согласно link_array - admin.php
//        $sql_images_table_name,
//        $sql_images_table_id_title,
//        $sql_features_table_name,
//        $sql_features_table_id_title,
//        'category_id' // $sql_table_id_title -> прикрепляется к radio-button при сохранении выбора категории в виде data-table-field="parent_id"
//        // Используется form.js для формирования запроса к БД. ЕСЛИ таблица_category: parent_id, ЕСЛИ это редактироваие материла и т.п.: category_id
//);


//Используем возможность загрузки изображений?
$show_load_images = false;
// Используем дополнительные характеристики?
$show_features = false;
// Путь к папке с изображениями для загрузчика изображений
$this_module_images_path = '';
// Параментры изображений (Вместо чисел Берутся переменные из configuration.php )
$this_module_big_img_width = 900;
$this_module_big_img_height = 900;
$this_module_small_img_width = 150;
$this_module_small_img_height = 150;


// НЕ ТРОГАЕМ --- НЕ ТРОГАЕМ --- НЕ ТРОГАЕМ
$save_onclick = "
		save_data(
			'.page-content',
			'$id',
			'$sql_table',
			'$sql_images_table_name',
			'$sql_images_table_id_title',
			'#images_data',
			'',
			'$sql_features_table_name',
			'$sql_features_table_id_title'
		);";

$save_and_close_onclick = "
		save_data(
			'.page-content',
			'$id',
			'$sql_table',
			'$sql_images_table_name',
			'$sql_images_table_id_title',
			'#images_data',
			'$exit_link',
			'$sql_features_table_name',
			'$sql_features_table_id_title'
		);";

$close_onclick = "
		close_page(
			'".$exit_link."'
		);";
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">

        <?php include_once $root.'/cms/pages/load_save_modal.php'; ?>

        <textarea id="images_data"></textarea>
        <input id="sql_id_elemet" value="<?php echo $id; ?>"></input>


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo $form_info['page_title']; ?>
                    <small><?php echo $form_info['module_title']; ?></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo $admin_panel_link ?>">
                            Панель управления
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="<?php echo $form_info['where_you_link_1']; ?>">
                            <?php echo $form_info['where_you_title_1']; ?>
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="<?php echo $form_info['where_you_link_2']; ?>">
                            <?php echo $form_info['where_you_title_2']; ?>
                        </a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-horizontal form-row-seperated">
                    <div class="portlet">
                        <div class="portlet-title">

                            <div class="actions btn-set">

                                <?php if ($id != '') { ?>
                                    <button class="btn green save_but" onclick="<?php echo $save_onclick; ?>"><i
                                                class="fa fa-check"></i>Сохранить
                                    </button>
                                <?php } ?>


                                <button class="btn green" onclick="<?php echo $save_and_close_onclick; ?>"><i
                                            class="fa fa-check-circle"></i> Сохранить и закрыть
                                </button>
                                <button class="btn default" onclick="<?php echo $close_onclick; ?>"><i
                                            class="fa fa-reply"></i> Закрыть
                                </button>

                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_general" data-toggle="tab">
                                            Основные
                                        </a>
                                    </li>
                                    <?php if ($show_features == true) { ?>
                                        <li>
                                            <a href="#tab_reviews" data-toggle="tab">
                                                Дополнительные характеристики
                                            </a>
                                        </li>
                                        <?php
                                    };
                                    ?>
                                    <?php if ($show_load_images == true) { ?>
                                        <li>
                                            <a href="#tab_images" data-toggle="tab">
                                                Изображения
                                            </a>
                                        </li>
                                        <?php
                                    };
                                    ?>
                                    <!--                                    <li>-->
                                    <!--                                        <a href="#tab_meta" data-toggle="tab">-->
                                    <!--                                            Метаданные-->
                                    <!--                                        </a>-->
                                    <!--                                    </li>-->

                                </ul>
                                <div class="tab-content no-space">
                                    <div class="tab-pane active" id="tab_general">

                                        <div class="form-group">
                                            <label class="col-md-1 control-label">Название:
                                                <span class="required">
                                                        *
                                                    </span>
                                            </label>
                                            <div class="col-md-10">
                                                    <textarea
                                                            type="text"
                                                            class="form-control"
                                                            data-massive-element-type="textarea"
                                                            data-default-value=""
                                                            data-necessarily="true"
                                                            data-table-field="name"
                                                            id="name"
                                                            placeholder=""
                                                            rows=2
                                                    ></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-1 control-label">Содержание:
                                                <span class="required">
                                                        *
                                                    </span>
                                            </label>
                                            <div class="col-md-11">
                                                    <textarea
                                                            class="form-control myckeditor"
                                                            data-massive-element-type="ckeditor"
                                                            data-default-value=""
                                                            data-necessarily="true"
                                                            data-table-field="content"
                                                            id="content"
                                                            placeholder=""
                                                            rows=10
                                                    ></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-1 control-label">Статус:
                                                <span class="required">
                                                        *
                                                    </span>
                                            </label>
                                            <div class="col-md-11">
                                                <select
                                                        class="table-group-action-input form-control input-medium"
                                                        type="select"
                                                        data-massive-element-type="select"
                                                        data-necessarily="true"
                                                        data-table-field="public"
                                                        data-select-of-type="value"
                                                        id="price_public"
                                                >
                                                    <option value="1" selected>Опубликовано</option>
                                                    <option value="0">Не опубликовано</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

<script>
    load_data(
        '<?php echo $sql_table; ?>',
        '<?php echo $id; ?>',
        '<?php echo $sql_images_table_name; ?>',
        '<?php echo $sql_images_table_id_title; ?>',
        '<?php echo $sql_features_table_name; ?>',
        '<?php echo $sql_features_table_id_title; ?>'
    );
</script>