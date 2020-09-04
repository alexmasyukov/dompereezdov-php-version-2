<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);
include_once $root."/cms/system/base_connect.php";

// Считываем таблицу с нужными изображениями
$table_img_catalog_products = [];
// Считываем всю таблицу в ассоциативный массив


$images_query = $db->query("SELECT * FROM content_images");
if ($images_query->rowCount() != 0) {
    $images = $images_query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($images as $image) {
        $table_img_catalog_products[] = array(
            "id"          => $image["id"],
            "id_products" => $image["id_products"],
            "big_img"     => $image["big_img"],
            "small_img"   => $image["small_img"],
            "general"     => $image["general"]
        );
    }
}


// Считываем все изображения из папки
$files_array = scandir($root.'/images/content_images/content/', 0);

$scanned_directory = array_diff($files_array, array('..', '.'));

foreach ($scanned_directory as $files_one_array) {

    // Получаем имя файла

    $file_name = htmlspecialchars_decode($files_one_array);
    $find = 0;

    // Ищем его в массиве из MySQL
    // Если он не найден - удаляем его
    foreach ($table_img_catalog_products as $data_array) {

        $small_img = substr($data_array['small_img'], strlen('../../..//images/content_images/conten/'), 999);
        $big_img = substr($data_array['big_img'], strlen('../../..//images/content_images/content/'), 999);


        if ($file_name == $small_img || $file_name == $big_img) {
            $find = 1;
            echo '<span>'.$file_name.'  <span style="color: green;"> Найден</span></span><br/>';
            break;
        };
    };

    if ($find == 0) {
        unlink($root.'/images/content_images/content/'.$file_name);
        echo '<span>'.$file_name.'  <span style="color: red;"> Удален</span></span><br/>';
    }


};