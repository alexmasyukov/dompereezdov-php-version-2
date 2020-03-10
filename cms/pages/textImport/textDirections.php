<?php
/**
 * Created by PhpStorm.
 * User: Alexey Masyukov  a.masyukov@chita.ru
 * Date: 2019-06-16
 * Time: 18:07
 * @param $service
 * @param $sqlParentId
 * @return string
 */

include_once $root . '/constants/common.php';
include_once $root . '/core/class.page.inc';
include_once $root . '/core/class.pageMskServices.inc';

$textPositions = array(
    'top_text' => 'Верхний',
    'bottom_text' => 'Нижний'
);

$services = [];
foreach (PageMskServices::$servicesTable as $service) {
    $services[] = (object)array(
        'title' => $service['russianName'],
        'cpu' => $service['cpu'],
    );
}


$directions = array(
    'Москва'                                    => (object)array(
        'sql' => 'SELECT id FROM pages WHERE id = ' . Constants::START_ID__M
    ),
    'Москва > округа'                           => (object)array(
        'sql' => 'SELECT id FROM pages WHERE part_type = "' . Constants::PART_MOSCOW . '" AND parent_id = ' . Constants::START_ID__M . ' AND type = "' . Constants::TYPE_OKRUG . '"'
    ),
    'Москва > районы'                           => (object)array(
        'sql' => 'SELECT id FROM pages WHERE part_type = "' . Constants::PART_MOSCOW . '" AND parent_id = ' . Constants::START_ID__M . ' AND type = "' . Constants::TYPE_RAION . '"'
    ),
    'Москва > города'                           => (object)array(
        'sql' => 'SELECT id FROM pages WHERE part_type = "' . Constants::PART_MOSCOW . '" AND parent_id = ' . Constants::START_ID__M . ' AND type = "' . Constants::TYPE_TOWN . '"'
    ),
    'end1'                                      => '',
    'Московская область'                        => (object)array(
        'sql' => 'SELECT id FROM pages WHERE id = 1'
    ),
    'Московская область > районы'               => (object)array(
        'sql' => ' SELECT id FROM pages WHERE part_type = "' . Constants::PART_MO . '" AND page_type = "' . Constants::PAGE_TYPE_CONNECTED . '"'
    ),
    'Московская область > населенные пункты'    => (object)array(
        'sql' => ' SELECT id FROM pages WHERE part_type = "' . Constants::PART_MO . '" AND page_type = "' . Constants::PAGE_TYPE_TOWN . '"'
    ),
    'end2'                                      => '',
    'Из Москвы в Б > Грузоперевозки (связующая)' => (object)array(
        'sql' => 'SELECT id FROM pages WHERE part_type = "' . Constants::PART_MOSCOW_TO_B . '" AND cpu_path = "/moskva/gruzoperevozki-iz-moskvy/"'
    ),
    'Из Москвы в Б > Переезды (связующая)'       => (object)array(
        'sql' => 'SELECT id FROM pages WHERE part_type = "' . Constants::PART_MOSCOW_TO_B . '" AND cpu_path = "/moskva/pereezdy-iz-moskvy/"'
    ),
    'Из Москвы в Б > Города'                     => (object)array(
        'sql' => 'SELECT id FROM pages WHERE part_type = "' . Constants::PART_MOSCOW_TO_B . '" AND page_type = "' . Constants::PAGE_TYPE_TOWN . '"'
    ),
);



//function getServiceSQL($service, $sqlParentId) {
//    //        'sql' => 'select id from pages where name = \'        грузоперевозки\' AND parent_id IN ('.$oneDirections['Москва > округа']->sql.')'
//    return "select id from pages where cpu = '" . trim($service) . "' AND parent_id IN ($sqlParentId)";
//}

//$partDir = array(
//    'Москва'             => 'SELECT id FROM pages WHERE part_type = "' . Constants::PART_MOSCOW . '"',
//    'Московская область' => 'SELECT id FROM pages WHERE part_type = "' . Constants::PART_MO . '"',
//    'Из Москвы в Б'      => 'SELECT id FROM pages WHERE part_type = "' . Constants::PART_MOSCOW_TO_B . '"',
//);


//$pageTypeDir = array(
//    'Связующая' => [
//        ['page_type', Constants::PAGE_TYPE_CONNECTED],
//    ],
//    'Округ' => [
//        ['type', Constants::TYPE_OKRUG],
//    ],
//    'Район' => [
//        ['type', Constants::TYPE_RAION],
//        ['page_type', Constants::TYPE_RAION],
//    ],
//    'Город / Населенный пункт' => [
//        ['type', Constants::TYPE_TOWN],
//    ],
//);

//$textDirections = array(
//    'Москва > округа > Грузоперевозки'     => (object)array(
//        'sql' => getServiceSQL('gruzoperevozki', $oneDirections['Москва > округа']->sql),
//    ),
//    'Москва > округа > Вывоз мебели'       => (object)array(
//        'sql' => getServiceSQL('vyvoz-mebeli', $oneDirections['Москва > округа']->sql),
//    ),
//    'Москва > округа > Перевозка пианино'  => (object)array(
//        'sql' => getServiceSQL('perevozka-pianino', $oneDirections['Москва > округа']->sql),
//    ),
//    'Москва > округа > Квартирный переезд' => (object)array(
//        'sql' => getServiceSQL('kvartirnyj-pereezd', $oneDirections['Москва > округа']->sql),
//    ),
//    'Москва > округа > Дачный переезд'     => (object)array(
//        'sql' => getServiceSQL('dachnyj-pereezd', $oneDirections['Москва > округа']->sql),
//    ),
//    'Москва > округа > Офисный переезд'    => (object)array(
//        'sql' => getServiceSQL('ofisnyj-pereezd', $oneDirections['Москва > округа']->sql),
//    ),
//    'Москва > округа > Перевозка мебели'   => (object)array(
//        'sql' => getServiceSQL('perevozka-mebeli', $oneDirections['Москва > округа']->sql),
//    ),
//    'Москва > округа > Грузовое такси'     => (object)array(
//        'sql' => getServiceSQL('gruzovoe-taksi', $oneDirections['Москва > округа']->sql),
//    ),
//
//
//    'end2' => '',
//
//
//    'Москва > районы > Грузоперевозки'     => (object)array(
//        'sql' => getServiceSQL('gruzoperevozki', $oneDirections['Москва > районы']->sql),
//    ),
//    'Москва > районы > Вывоз мебели'       => (object)array(
//        'sql' => getServiceSQL('vyvoz-mebeli', $oneDirections['Москва > районы']->sql),
//    ),
//    'Москва > районы > Перевозка пианино'  => (object)array(
//        'sql' => getServiceSQL('perevozka-pianino', $oneDirections['Москва > районы']->sql),
//    ),
//    'Москва > районы > Квартирный переезд' => (object)array(
//        'sql' => getServiceSQL('kvartirnyj-pereezd', $oneDirections['Москва > районы']->sql),
//    ),
//    'Москва > районы > Дачный переезд'     => (object)array(
//        'sql' => getServiceSQL('dachnyj-pereezd', $oneDirections['Москва > районы']->sql),
//    ),
//    'Москва > районы > Офисный переезд'    => (object)array(
//        'sql' => getServiceSQL('ofisnyj-pereezd', $oneDirections['Москва > районы']->sql),
//    ),
//    'Москва > районы > Перевозка мебели'   => (object)array(
//        'sql' => getServiceSQL('perevozka-mebeli', $oneDirections['Москва > районы']->sql),
//    ),
//    'Москва > районы > Грузовое такси'     => (object)array(
//        'sql' => getServiceSQL('gruzovoe-taksi', $oneDirections['Москва > районы']->sql),
//    ),
//
//
//    'end3' => '',
//
//
//    'Москва > города > Грузоперевозки'     => (object)array(
//        'sql' => getServiceSQL('gruzoperevozki', $oneDirections['Москва > города']->sql),
//    ),
//    'Москва > города > Вывоз мебели'       => (object)array(
//        'sql' => getServiceSQL('vyvoz-mebeli', $oneDirections['Москва > города']->sql),
//    ),
//    'Москва > города > Перевозка пианино'  => (object)array(
//        'sql' => getServiceSQL('perevozka-pianino', $oneDirections['Москва > города']->sql),
//    ),
//    'Москва > города > Квартирный переезд' => (object)array(
//        'sql' => getServiceSQL('kvartirnyj-pereezd', $oneDirections['Москва > города']->sql),
//    ),
//    'Москва > города > Дачный переезд'     => (object)array(
//        'sql' => getServiceSQL('dachnyj-pereezd', $oneDirections['Москва > города']->sql),
//    ),
//    'Москва > города > Офисный переезд'    => (object)array(
//        'sql' => getServiceSQL('ofisnyj-pereezd', $oneDirections['Москва > города']->sql),
//    ),
//    'Москва > города > Перевозка мебели'   => (object)array(
//        'sql' => getServiceSQL('perevozka-mebeli', $oneDirections['Москва > города']->sql),
//    ),
//    'Москва > города > Грузовое такси'     => (object)array(
//        'sql' => getServiceSQL('gruzovoe-taksi', $oneDirections['Москва > города']->sql),
//    ),
//
//
//    'end4' => '',
//
//
//    'Московская область > нас. пункты > Грузоперевозки'     => (object)array(
//        'sql' => getServiceSQL('gruzoperevozki', $oneDirections['Московская область > населенные пункты']->sql),
//    ),
//    'Московская область > нас. пункты > Вывоз мебели'       => (object)array(
//        'sql' => getServiceSQL('vyvoz-mebeli', $oneDirections['Московская область > населенные пункты']->sql),
//    ),
//    'Московская область > нас. пункты > Перевозка пианино'  => (object)array(
//        'sql' => getServiceSQL('perevozka-pianino', $oneDirections['Московская область > населенные пункты']->sql),
//    ),
//    'Московская область > нас. пункты > Квартирный переезд' => (object)array(
//        'sql' => getServiceSQL('kvartirnyj-pereezd', $oneDirections['Московская область > населенные пункты']->sql),
//    ),
//    'Московская область > нас. пункты > Дачный переезд'     => (object)array(
//        'sql' => getServiceSQL('dachnyj-pereezd', $oneDirections['Московская область > населенные пункты']->sql),
//    ),
//    'Московская область > нас. пункты > Офисный переезд'    => (object)array(
//        'sql' => getServiceSQL('ofisnyj-pereezd', $oneDirections['Московская область > населенные пункты']->sql),
//    ),
//    'Московская область > нас. пункты > Перевозка мебели'   => (object)array(
//        'sql' => getServiceSQL('perevozka-mebeli', $oneDirections['Московская область > населенные пункты']->sql),
//    ),
//    'Московская область > нас. пункты > Грузовое такси'     => (object)array(
//        'sql' => getServiceSQL('gruzovoe-taksi', $oneDirections['Московская область > населенные пункты']->sql),
//    ),
//
//    //
//    //
//    //    'Московская область > районы' => (object)array(
//    //        'sql' => 'select * from pages where type = "район" AND parent_id >= 1 AND parent_id < 10000'
//    //    ),
//    //    'end6' => '',
//    //    'Московская область > нас. пункты' => (object)array(
//    //        'sql' => 'select * from pages where page_type = "town" AND parent_id >= 1 AND parent_id < 10000'
//    //    ),
//    //    'Московская область > нас. пункты > Грузоперевозки' => '',
//    //    'Московская область > нас. пункты > Вывоз мебели' => '',
//    //    'Московская область > нас. пункты > Перевозка пианино' => '',
//    //
//    //    'Московская область > нас. пункты > Дачный переезд' => '',
//    //    'Московская область > нас. пункты > Офисный переезд' => '',
//    //    'Московская область > нас. пункты > Перевозка мебели' => '',
//    //    'Московская область > нас. пункты > Грузовое такси' => '',
//);
//
//$textDirections = array_merge($oneDirections, $textDirections);


/**
 * Москва
 * Московская область
 *
 *      округ
 *      район
 *      населенный пункт
 *
 *          Услуга
 *          сам нас. пункт
 *
 *              верхний текст
 *              нижний текст
 **/