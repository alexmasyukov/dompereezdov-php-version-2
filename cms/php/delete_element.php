<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);
include_once $root."/cms/system/base_connect.php";

// Проверка авторизации пользователя
include_once $root."/cms/autorization.php";


// Принимаем переменную идентификатора в базе

$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$sql_table_name = $_REQUEST['sql_table_name'];
$sql_images_table_name = $_REQUEST['sql_images_table_name'];
$sql_images_table_id_title = $_REQUEST['sql_images_table_id_title'];
$sql_features_table_name = $_REQUEST['sql_features_table_name'];
$sql_features_table_id_title = $_REQUEST['sql_features_table_id_title'];


//Проверяем имеет ли эта работы изображения и упоминания в таблице my_works_images
// Если да - удаляем все изображения и все элементы таблици с этим id в таблице my_works_images
// Если нет - удаляем элемент по id в таблице my_works

switch ($type) {
    case 'category':
        {
            $query_result = $db->query("SELECT parent_id FROM $sql_table_name WHERE id = $id");

            $parent_id = 0;
            if ($query_result->rowCount() > 0) {
                $items = $query_result->fetchAll(PDO::FETCH_ASSOC);
                foreach ($items as $item) {
                    $parent_id = $item['parent_id'];
                }
            }


            // Находим все элементы где этот элемент был главный (parent_id был равен id)
            // Заменяем у этих элементов parent_id на его parent_id
            $query_result = $db->query("SELECT * FROM $sql_table_name WHERE parent_id = $id");
            $items = $query_result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($items as $item) {
                $result = $db->query("UPDATE $sql_table_name SET parent_id=$parent_id WHERE id=".$item['id']);
            }

            $query_result = $db->query("DELETE FROM $sql_table_name WHERE id=$id");

            echo json_encode(array(
                'result' => 1,
            ));
            break;
        }

    case 'element':
        {
            // Считываем нужные данные из БД таблица my_works_images
            $query = "select * from $sql_images_table_name WHERE $sql_images_table_id_title=$id";
            $query_result = $db->query($query);

            $images = $query_result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($images as $image) {
                // Удаляем фалы изображений
                @unlink($root.str_replace('../../..//', '/', $image['big_img']));
                @unlink($root.str_replace('../../..//', '/', $image['small_img']));
            }

            // Удаляем элемент из БД таблицы _images
            $query_result = $db->query("DELETE FROM $sql_images_table_name WHERE $sql_images_table_id_title=$id");

            // Удаляем элемент из БД таблицы _features_values
            $query_result = $db->query("DELETE FROM $sql_features_table_name WHERE $sql_features_table_id_title=$id");

            // Удаляем элемент из БД
            $query_result = $db->query("DELETE FROM $sql_table_name WHERE id=$id");

            echo '{
                "result": 1
            }';
            break;
        }
}