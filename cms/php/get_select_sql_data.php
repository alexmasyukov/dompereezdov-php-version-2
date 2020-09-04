<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);
include_once $root."/cms/system/base_connect.php";


function get_select_html($sql_table_name, $field_value, $field_text, $select_type, $select) {
    global $db;
    $query = "SELECT $field_text, $field_value FROM $sql_table_name";

    $query_result = $db->query($query);
    if ($query_result->rowCount() == 0) {
        return (FALSE);
    }

    $select_html = '';
    while ($array = $query_result->fetchAll(PDO::FETCH_ASSOC)) {

        if ($select_type != '') {
            if ($select_type == 'value') {
                if ($array[$field_value] == $select) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                };
            };
            if ($select_type == 'text') {
                if ($array[$field_text] == $select) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                };
            };
        } else {
            $selected = '';
        }

        $select_html .= '<option value="'.htmlspecialchars_decode($array[$field_value]).'"  '.$selected.'>'.htmlspecialchars_decode($array[$field_text]).'</option>';
    }

    return $select_html;
}


;


function get_select_html_plus_data(
    $sql_table_name,
    $field_value,
    $field_text,
    $select_type,
    $select,
    $sql_prefix_table,
    $data
) {
    global $db;
    $query = "SELECT * FROM $sql_table_name ORDER BY sort;"; // Получаем все записи ИМЕННО доп. характеристик

    $query_result = $db->query($query);
    if ($query_result->rowCount() == 0) {
        return (FALSE);
    }

    $select_html = '';
    $items = $query_result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($items as $item) {
        if ($select_type != '') {
            if ($select_type == 'value') {
                if ($item[$field_value] == $select) { // id
                    $selected = 'selected';
                } else {
                    $selected = '';
                };
            };
            if ($select_type == 'text') {
                if ($item[$field_text] == $select) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                };
            };
        } else {
            $selected = '';
        }


        if ($item['type'] == 'string') {
            $data_html = '';
            $x = 0;

            // Формируем data-атрибуты
            while ($x < count($data)) {
                if ($data[$x] == 'prefix_id') {
                    $data_html .= ' data-'.$data[$x].'="'.$item['prefix'].'" ';
                    $x++;
                    continue;
                }
                $data_html .= ' data-'.$data[$x].'="'.$item[$data[$x]].'" ';
                $x++;
            } // while
        } // if

        $select_html .= '<option '.$data_html.' value="'.htmlspecialchars_decode($item[$field_value]).'"  '.$selected.'>'.htmlspecialchars_decode($item[$field_text]).' ('.$item['prefix'].')</option>';
        //get_prefix_id($sql_prefix_table, $array['prefix_id'])
    }

    return $select_html;
}


function get_flies_on_dir($dir, $params) {
    $select_html = '';
    $files_array = scandir($dir, $params);
    //$files2 = scandir($dir, 1);

    //echo('<pre>');
    //print_r($files1);

    $scanned_directory = array_diff($files_array, array('..', '.'));

    foreach ($scanned_directory as $files_one_array) {
        $file_name = substr($files_one_array, 0, strrpos($files_one_array, '.'));
        $select_html .= $files1.'<option value="'.htmlspecialchars_decode($file_name).'">'.htmlspecialchars_decode($file_name).'</option>';
    }

    return $select_html;
}


//function get_prefix_id($sql_prefix_table, $id) {
//    //		$query = "SELECT title FROM $sql_prefix_table WHERE id=$id";
//    //				!$result return return ('');
//    //		while ($array = mysql_fetch_array($result)) {
//    //			return $array['title'];
//    //		}
//    return '333';
//}


?>