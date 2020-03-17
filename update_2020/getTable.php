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

//include_once $root . '/update_2020/data/mo_names.php';
//include_once $root . '/update_2020/data/m_names.php';
//include_once $root . '/update_2020/data/distance_from_moskow_and_addit.php';
include_once $root . '/update_2020/data/m_new_names__16_03_2020.php';
include_once $root . '/update_2020/data/new_m_towns.php';

$log = true;
//$parts = ['/moskovskaya-oblast/', '/moskva/'];
$sql_columns = [
    //    'id',
    //    'parent_id',
    //    'type',
    //    'page_type',
    //    'level',
    'name',
    'p_ro',
    'p_da',
    'p_ve',
    'p_tv',
    'p_pr',
    'etnohoronim_mn_p_da',
    //    'zn_1',
    //    'zn_2',
    //    'zn_3',
    //    'zn_4',
    //    'zn_5',
    //    'zn_6',
    //    'zn_7'
];

$table_columns = [
    //    'id',
    //    'type',
    //    'page_type',
    //    'level',
    'name',
    'p_ro',
    'p_da',
    'p_ve',
    'p_tv',
    'p_pr',
    'etnohoronim_mn_p_da',
    //    'zn_1',
    //    'zn_2',
    //    'zn_3',
    //    'zn_4',
    //    'zn_5',
    //    'zn_6',
    //    'zn_7'
];

viewTableOfPart();


function viewTableOfPart() {
    $sql_columns = $GLOBALS['sql_columns'];

    echo '<table>
                <thead>
                    <th>name</th>'; //
    foreach ($sql_columns as $col) {
        echo '<th>' . $col . '</th>';
    }
    echo '</thead>';


    $pages = getPages();
    $newSklonPages = $GLOBALS['new_m_towns'];

    foreach ($GLOBALS['m_new_names'] as $new_m) {
        startTr();
        printTd($new_m['name']);

        $found = findPageByName($pages, $new_m['name']);
        if ($found) {
            printTd($found['name']);
            printTd($found['p_ro']);
            printTd($found['p_da']);
            printTd($found['p_ve']);
            printTd($found['p_tv']);
            printTd($found['p_pr']);
            printTd($found['etnohoronim_mn_p_da']);
        } else {
            $old_sklon_found = findPageByName($newSklonPages, $new_m['name']);
            if ($old_sklon_found) {
                printTd($old_sklon_found['name'], true);
                printTd($old_sklon_found['p_ro'], true);
                printTd($old_sklon_found['p_da'], true);
                printTd($old_sklon_found['p_ve'], true);
                printTd($old_sklon_found['p_tv'], true);
                printTd($old_sklon_found['p_pr'], true);
                printTd('');
            }
        }

        endTr();
    }


    //    foreach ($pages as $page) {
    //        startTr();
    //        printTd($page['name']);
    //        endTr();
    //    }

    //    foreach ($GLOBALS['distance_from_moscow'] as $distance_from_moscow_page) {
    //        $page = findPageByName($pages, $distance_from_moscow_page['name']);
    //
    //
    //        if ($page) {
    //            startTr();
    //            printTd($distance_from_moscow_page['name']);
    //            printTd($distance_from_moscow_page['distance_from_moscow']);
    //            printTd($distance_from_moscow_page['prenadlezhnost1']);
    //            printTd($distance_from_moscow_page['tip_np_iz_a_v_b']);
    //            printRow($page);
    //            endTr();
    //        } else {
    //            continue;
    //        }
    //    }
    //    foreach ($GLOBALS['distance_from_moscow'] as $distance_from_moscow_page) {
    //        $page = findPageByName($pages, $distance_from_moscow_page['name']);
    //
    //        if (!$page) {
    //            startTr();
    //            printTd($distance_from_moscow_page['name']);
    //            printTd($distance_from_moscow_page['distance_from_moscow']);
    //            printTd($distance_from_moscow_page['prenadlezhnost1']);
    //            printTd($distance_from_moscow_page['tip_np_iz_a_v_b']);
    //            endTr();
    //        }
    //    }


    echo '</table>';

    //    $pages_YES = [];
    //    $pages_NO = [];
    //    $pages_NO[] = $newPage;
    //    $pages_YES[] = $page;

    //    foreach ($pages_YES as $page) {
    //        printRow($page);
    //    }
    //
    //    foreach ($pages_NO as $page) {
    //        printRow($page);
    //    }


}


function startTr() {
    echo '<tr>';
}


function endTr() {
    echo '</tr>';
}


function printTd($text, $isRed = false) {
    if ($isRed) {
        echo '<td><span style="color:red">' . $text . '</span></td>';
        return;
    }
    echo '<td>' . $text . '</td>';
}


function printRow($page) {
    foreach ($GLOBALS['sql_columns'] as $key) {
        echo '<td>' . $page[$key] . '</td>';
    }
}


function printRowByKeys($page, $keys) {
    foreach ($keys as $key) {
        echo '<td>' . $page[$key] . '</td>';
    }
}


function getPages() {
    $sql_columns = $GLOBALS['sql_columns'];

    $sql = "SELECT
                " . implode(',', $sql_columns) . "
            FROM 
                pages_before_doing
            WHERE 
                (page_type <> 'service'
                    and page_type <> 'service_with_car')
                order by
                    name, type
            ";
    $pages = Database::query($sql, 'withCount');

    //    echo $sql;
    //    echo $pages->rowCount;

    if ($pages->rowCount > 0) {
        return $pages->result;
    }

    return [];
}


function findPageByName($pages, $name) {
    foreach ($pages as $page) {
        if (mb_strtolower(trim($name)) == mb_strtolower(trim($page['name']))) {
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
    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ddd;
        padding: 5px;
    }

    thead {
        text-align: left;
    }
</style>

