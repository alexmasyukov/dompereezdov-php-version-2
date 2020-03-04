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

include_once $root . '/update_2020/data/distance_from_moskow_and_addit.php';

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

foreach ($GLOBALS['distance_from_moscow'] as $newTown) {
    $sql = 'INSERT INTO pages (' . implode(',', $columns) . ') 
                        VALUES (\'' . implode('\',\'', array_values((array)$values)) . '\')';

    //                echo $sql;
    $result = Database::query($sql, 'asResult');
}




