<?php
/**
 * Created by PhpStorm.
 * User: Alexey Masyukov  a.masyukov@chita.ru
 * Date: 2019-04-08
 * Time: 10:13
 */
//
date_default_timezone_set("Pacific/Palau");
//
//ini_set('error_reporting', E_ALL & ~E_NOTICE);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

$server = $_SERVER['HTTP_HOST'];
$root = realpath($_SERVER['DOCUMENT_ROOT']);
require $root . '/configuration.php';
include_once $root . '/core/functions.php';
include_once $root . '/core/class.database.inc';
include_once $root . '/core/class.core.inc';

include_once $root . '/update_2020/data/mo_names.php';
include_once $root . '/update_2020/data/m_names.php';
include_once $root . '/update_2020/data/distance_from_moskow_and_addit.php';

$log = true;
$parts = ['/moskovskaya-oblast/', '/moskva/'];
$sql_columns = [
    'id',
    'parent_id',
    'type',
    'page_type',
    'level',
    'name',
    'p_ro',
    'p_da',
    'p_ve',
    'p_tv',
    'p_pr',
    'etnohoronim_mn_p_da',
    'zn_1',
    'zn_2',
    'zn_3',
    'zn_4',
    'zn_5',
    'zn_6',
    'zn_7'
];

//foreach ($parts as $part) {
//    //    echo '<h1>' . $part . '</h1>';
//    viewTableOfPart($part);
//    break;
//}

viewTableOfPart($parts[1]);


function viewTableOfPart($part) {
    $sql_columns = $GLOBALS['sql_columns'];

    echo '<table>
                <thead>
                    '; //<th>MO_PAGE_NAME</th>
    foreach ($sql_columns as $col) {
        echo '<th>' . $col . '</th>';
    }

    echo '<th>NEW__etnohoronim_mn_p_da</th>';
    echo '<th>NEW__zn_1</th>';
    echo '<th>NEW__zn_2</th>';
    echo '<th>NEW__zn_3</th>';
    echo '<th>NEW__zn_4</th>';
    echo '<th>NEW__zn_5</th>';
    echo '<th>NEW__zn_6</th>';
    echo '<th>NEW__zn_7</th>';

    echo '</thead>';


    $pages = getPagesOfPart($part);

//        foreach ($pages as $page) {
//            echo '<tr>';
//            echo '<td>' . $page['name'] . '</td>';
//            echo '</tr>';
//        }

//    foreach ($GLOBALS['M_GOOGLE_TABLE_PAGES'] as $M_GT_PAGE) {
    foreach ($pages as $page) {
        echo '<tr>';
        printRow($page);
        echo '</tr>';
//        $page = findPageByName($pages, $M_GT_PAGE['name']);


//        echo '<td>' . $M_GT_PAGE['name'] . '</td>';
//        if ($page) {
//            if ($page['p_ro'] == "") continue;
//            printRow($page);

//            foreach (array_keys($page) as $key) {
//                if (
//                        $key == 'zn_1' ||
//                        $key == 'zn_2' ||
//                        $key == 'zn_3' ||
//                        $key == 'zn_4' ||
//                        $key == 'zn_5' ||
//                        $key == 'zn_6' ||
//                        $key == 'zn_7' ||
//                        $key == 'etnohoronim_mn_p_da') {
//
//                    if (trim($page[$key]) == trim($MO_GT_PAGE[$key])) {
//                        echo '<td>ок</td>';
//                    } else {
//                        echo '<td>!!!!!!!!!   ' . $MO_GT_PAGE[$key] . '</td>';
//                    }
//
//                }
//            }


//        } else {
//            echo '<td>FALSE</td>';
//        }
//        echo '</tr>';
    }
    echo '</table>';
}


function printRow($page) {
    foreach (array_keys($page) as $key) {
        echo '<td>' . $page[$key] . '</td>';
    }
}


function getPagesOfPart($part) {
    $sql_columns = $GLOBALS['sql_columns'];

    $sql = "SELECT
                " . implode(',', $sql_columns) . "
            FROM
                pages
            WHERE
                (cpu_path LIKE '$part%' OR cpu_path = '$part')
                AND type <> 'service'
            order by
                name";
    $pages = Database::query($sql, 'withCount');

    if ($pages->rowCount > 0) {
        return $pages->result;
    }

    return [];
}


function findPageByName($pages, $name) {
    foreach ($pages as $page) {
        if (trim($name) == trim($page['name'])) {
            return $page;
        }
    }

    return false;
}


/**
 *
 */
function getColumnNames() {
    $columns = Database::query("SHOW COLUMNS FROM pages", 'column');
    foreach ($columns as $col) {
        echo "<th>$col</th>";
    }
}


?>

<style>
    thead {
        text-align: left;
    }
</style>

