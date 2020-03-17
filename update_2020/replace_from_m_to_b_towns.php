<?php
/**
 * Created by PhpStorm.
 * User: Alexey Masyukov  a.masyukov@chita.ru
 * Date: 2020-02-22
 * Time: 18:39
 */

//ini_set("display_errors", 1);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

$root = realpath($_SERVER['DOCUMENT_ROOT']);
require $root.'/constants/common.php';
require $root.'/configuration.php';
require $root.'/core/class.database.inc';
require $root.'/core/class.core.inc';
require $root.'/core/functions.php';
require $root.'/update_2020/data/new_m_towns.php';

$log = true;

$pages = [];
$id = 100002;
foreach ($new_m_towns as $town) {
    $town['id'] = $id++;
    $pages[] = $town;
}


foreach ($pages as $page) {
    $cpu = eng_name($page['name']);

    $sql = "UPDATE
                pages
            SET
                parent_id             = 0,
                part_type             = '".Constants::PART_MOSCOW_TO_B."',
                cpu                   = '".$cpu."',
                cpu_path              = '".$cpu."',
                type                  = '".Constants::PAGE_TYPE_TOWN."',
                page_type             = '".Constants::PAGE_TYPE_TOWN."',
                name                  = '".$page['name']."',
                public                = 1,
                sort                  = 0,
                level                 = -1,
                town_start_admin_name = '".$page['name']." (из Москвы в Б)',
                p_ro                  = '".$page['p_ro']."',
                p_da                  = '".$page['p_da']."',
                p_ve                  = '".$page['p_ve']."',
                p_tv                  = '".$page['p_tv']."',
                p_pr                  = '".$page['p_pr']."',
                etnohoronim_mn_p_da   = '".$page['etnohoronim_mn_p_da']."',
                distance_from_moscow  = '".$page['distance_from_moscow']."',
                prenadlezhnost1       = '".$page['prenadlezhnost1']."',
                tip_np_iz_a_v_b       = '".$page['tip_np_iz_a_v_b']."'
            WHERE
                id = ".$page['id'];

//    core::log($sql);
    Database::query($sql, 'asResult');
}


$id = 100386;
$sqls = [];
foreach ($pages as $page) {
    //    echo $page['id'].' - '.$page['name'].'<br>';
    $newService = prepareRow(
        array(),
        array(
            'parent_id'             => $page['id'],
            'part_type'             => Constants::PART_MOSCOW_TO_B,
            'type'                  => Constants::PAGE_TYPE_SERVICE,
            'public'                => 0,
            'town_start_admin_name' => ''
        ));

    $cpu = eng_name($page['name']);

    foreach ([Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU, Constants::PEREEZDY_MOSKVA_XXX_CPU] as $link) {
        $a = $newService;
        $a['id'] = $id++;
        $a['cpu'] = $link.$cpu;
        $a['cpu_path'] = '/moskva/'.$a['cpu'].'/';
        // Заметим, что у GRUZOPEREVOZKI_MOSKVA_XXX_CPU другой page_type
        $a['page_type'] = $link == Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU ? Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE_WITH_CAR : Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE;
        $a['public'] = 0; //$link == Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU ? 0 : 1;
        $sqls[] = $a;
    }
}

foreach ($sqls as $query) {
    $sql = "UPDATE
                pages
            SET
                parent_id             = '".$query['parent_id']."',
                part_type             = '".$query['part_type']."',
                cpu                   = '".$query['cpu']."',
                cpu_path              = '".$query['cpu_path']."',
                type                  = '".$query['type']."',
                page_type             = '".$query['page_type']."',
                name                  = '".$query['name']."',
                public                = ".$query['public'].",
                sort                  = 0,
                level                 = -1
            WHERE
                id                      = ".$query['id'];

//    core::log($sql);
    Database::query($sql, 'asResult');
}


function prepareRow($object, $otherKeys) {
    $result = array(
        'id'                    => '',
        'parent_id'             => '',
        'part_type'             => '',
        'name'                  => NULL,
        'cpu_path'              => '',
        'cpu'                   => '',
        'sort'                  => '',
        'public'                => '',
        'type'                  => '',
        'page_type'             => '',
        'breadcrumb_ids'        => '',
        'breadcrumb_paths'      => '',
        'breadcrumb_names'      => '',
        'town_start_admin_name' => '',
        'level'                 => '',
        'p_ro'                  => '',
        'p_da'                  => '',
        'p_ve'                  => '',
        'p_tv'                  => '',
        'p_pr'                  => '',
        'etnohoronim_mn_p_da'   => '',
        'zn_1'                  => '',
        'zn_2'                  => '',
        'zn_3'                  => '',
        'zn_4'                  => '',
        'zn_5'                  => '',
        'zn_6'                  => '',
        'zn_7'                  => '',
        'distance_from_moscow'  => '',
        'prenadlezhnost1'       => '',
        'tip_np_iz_a_v_b'       => '',
        'old_id'                => '',
        'old_parent_id'         => ''
    );

    foreach (array_keys($object) as $key) {
        $result[$key] = $object[$key];
    }
    $result = array_merge($result, $otherKeys);
    return $result;
}

//
