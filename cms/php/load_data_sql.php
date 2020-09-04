<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);
include_once $root."/cms/system/base_connect.php";

$sql_table_name = $_POST['sql_table_name'];
$id = $_POST['id'];
$sql_images_table_name = $_POST['sql_images_table_name'];
$sql_images_table_id_title = $_POST['sql_images_table_id_title'];
$sql_features_table_name = $_POST['sql_features_table_name'];
$sql_features_table_id_title = $_POST['sql_features_table_id_title'];


function get_column_names_with_show($conn_id, $tbl_name) {
    global $db;
    $query = "SHOW COLUMNS FROM $tbl_name";
    $query_result = $db->query($query);

    if ($query_result->rowCount() == 0) {
        return (FALSE);
    }

    $result_array = $query_result->fetchAll();

    $names = array(); # создать пустой массив
    foreach ($result_array as $item) {
        # первое значение каждой строки вывода – это имя столбца
        list ($name) = $item;

        $names[] = $name; # добавить имя в конец массива
    }

    return ($names);
}


// Получаем имена столбцов
$columns = get_column_names_with_show('', $sql_table_name);


// Формируем SQL запрос столбцов

$sql_column_query = '';
$column_number = 0;
while ($column_number < count($columns)) {
    if ($column_number == count($columns) - 1) {
        $sql_column_query .= $columns[$column_number];
    } else {
        $sql_column_query .= $columns[$column_number].',';
    }
    $column_number++;
}


//print_r($sql_column_query);

$mysql_string = 'select '.$sql_column_query.' from '.$sql_table_name.' WHERE id='.$id.';';
$query_result = $db->query($mysql_string);
$items = $query_result->fetchAll(PDO::FETCH_ASSOC);

$values = [];
foreach ($items as $item) {
    foreach ($columns as $key => $column) {
        $values[] = html_entity_decode(htmlspecialchars_decode($item[$column]), ENT_QUOTES, 'UTF-8');
    }
}


$image_data = '';
if ($sql_images_table_name != '' && $sql_images_table_name != 'undefined' && $sql_images_table_name != 'none') {
    // Считываем данные зображений из БД
    $images_query_result = $db->query("select * from $sql_images_table_name WHERE $sql_images_table_id_title=".$id."");

    $images = $images_query_result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($images as $image) {
        $image_data .=
            $image['id'].';'.
            $image[$sql_images_table_id_title].';'.
            $image['big_img'].';'.
            $image['small_img'].';'.
            $image['general'].';'.
            ';'.
            $image['name'].';'.
            $image['sort'].';';
    }
};

$features_data = [];
if ($sql_features_table_name != '' && $sql_features_table_name != 'undefined' && $sql_features_table_name != 'none') {
    $features_query_result = $db->query("select * from $sql_features_table_name WHERE $sql_features_table_id_title=".$id." ORDER BY sort;");
    $features = $features_query_result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($features as $feature) {
        $features_data[] = array(
            $feature['id'],
            $feature[$sql_features_table_id_title],
            $feature['features_id'],
            html_entity_decode(htmlspecialchars_decode($feature['value']), ENT_QUOTES, 'UTF-8'),
            $feature['sort']
        );
    }
};


$documents = [];


echo '{
    "sql_fields": '.json_encode($columns).', 
    "sql_values": '.json_encode($values).',
    "image_data": "'.$image_data.'",
    "features_data": '.json_encode($features_data).',
    "documents_data": '.json_encode($documents).'  
}';