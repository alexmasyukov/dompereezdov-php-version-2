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
require $root . '/constants/common.php';
require $root . '/configuration.php';
require $root . '/core/class.database.inc';
require $root . '/core/class.core.inc';
require $root . '/core/class.page.inc';
require $root . '/core/class.pageMskServices.inc';
require $root . '/core/functions.php';
require $root . '/update_2020/data/new_m_towns.php';

$log = true;
$names = ['id', 'parent_id', 'cpu_path', 'old_id', 'old_parent_id'];

echo 'НЕЛЬЗЯ ИСПОЛЬЗОВАТЬ ПОСЛЕ 16 МАРТА !!!!!!!!';

/** СОБЛЮДАЙ ТАКОЙ ПОРЯДОК ФУНКЦИЙ !!!!!! */
//$Mover = new Mover();
//$Mover->addNewServicesTo__mo();
//$Mover->setNewId__mo();
//$Mover->showNames(Mover::$pages_mo[Constants::PAGE_TYPE_CONNECTED], $names, true);
//$Mover->showNames(Mover::$pages_mo[Constants::PAGE_TYPE_TOWN], $names, true);
//$Mover->showNames(Mover::$pages_mo[Constants::PAGE_TYPE_SERVICE], $names, true);

//$Mover->addNewServicesTo__m();
//$Mover->setNewId__m();
//$Mover->showNames(Mover::$pages_m[Constants::PAGE_TYPE_CONNECTED], $names, true);
//$Mover->showNames(Mover::$pages_m[Constants::PAGE_TYPE_TOWN], $names, true);
//$Mover->showNames(Mover::$pages_m[Constants::PAGE_TYPE_SERVICE], $names, true);

//$Mover->join();
//$Mover->setNewParentId();
//$Mover->showNames(Mover::$pages, $names, true);

//$Mover->addNewConnectedTo__m_to_b();
//$Mover->addNewTownsTo__m_to_b();
//$Mover->addNewServicesTo__m_to_b();
//$Mover->showNames(Mover::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_CONNECTED], $names, true);
//$Mover->showNames(Mover::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_TOWN], $names, true);
//$Mover->showNames(Mover::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE], $names, true);

//$Mover->join__m_to_b();
//core::log(Mover::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_CONNECTED]);
//core::log(Mover::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_TOWN]);
//core::log(Mover::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE]);

//$Mover->showNames(Mover::$pages, $names, true);

//$Mover->recordPages();

/** это работает и было сделано. Можно не выполнять постоянно. Протестировано 8 марта */
//$Mover = new Mover();
//$Mover->getReviews();
//$Mover->getPages__without_splitting();
//$Mover->setNew__town_start_id__reviews();
//$Mover->updateReviews();
//$Mover->showNames(Mover::$reviews, ['id', 'usluga', 'town_start_id', 'old_town_start_id'], true);


/** это работает и было сделано. Можно не выполнять постоянно. Протестировано 8 марта */
//$Mover = new Mover();
//$Mover->getPages__without_splitting();
//$Mover->getPagesTexts_before__without_processing();
//$Mover->deletePagesTexts__whichNotFoundInPages();
//$Mover->setNewPageIdPagesTexts();
//$Mover->recordPagesTexts();
//$Mover->showNames(Mover::$pagesTexts, ['id', 'page_id', 'old_page_id'], true);

//Mover::removeTestText();
//Mover::setUnpublicPagesWhereTextsNotFound();
//Mover::setPublicPagesWhereTextsNotFound();

class Mover {
    public static $counts = array();
    public static $pages = array();
    public static $newServices = array();

    public static $reviews = array();
    public static $pagesTexts = array();

    public static $pages_mo = array(
        Constants::PAGE_TYPE_CONNECTED => [],
        Constants::PAGE_TYPE_TOWN      => [],
        Constants::PAGE_TYPE_SERVICE   => []
    );
    public static $pages_m = array(
        Constants::PAGE_TYPE_CONNECTED => [],
        Constants::PAGE_TYPE_TOWN      => [],
        Constants::PAGE_TYPE_SERVICE   => [],
    );

    public static $pages_m_to_b = array(
        Constants::PAGE_TYPE_MOSCOW_TO_B_CONNECTED => [],
        Constants::PAGE_TYPE_MOSCOW_TO_B_TOWN      => [],
        Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE   => [],
    );
    private static $mo__startId = 1;
    private static $m__startId = Constants::START_ID__M;
    private static $m_to_b__startId = 100000;

    /**
     * Mover constructor.
     */
    public function __construct() {
        $this->getAllPages();

        // Определяем услуги которые нужно добавлять
        self::$newServices = array_filter(PageMskServices::$servicesTable, function ($service) {
            return !empty($service['isNew']) && $service['isNew'] == true;
        });
    }

    public static function removeTestText() {
        $sql = "delete from pages_texts where id >= 3036";
        Database::query($sql, 'asResult');
    }

    public static function setPublicPagesWhereTextsNotFound() {
        $sql = "UPDATE pages SET public = 1 where id NOT IN (select distinct page_id from pages_texts)";
        Database::query($sql, 'asResult');
//        SELECT id, name, cpu_path, public from pages where id NOT IN (select distinct page_id from pages_texts)
    }

    public static function setUnpublicPagesWhereTextsNotFound() {
        $sql = "UPDATE pages SET public = 0 where id NOT IN (select distinct page_id from pages_texts)";
        Database::query($sql, 'asResult');
    }

    /**
     * удалить строки в pages_texts у которых страница в pages не находится по page_id (page_id = id <> find)
     */
    public function deletePagesTexts__whichNotFoundInPages() {
        $prepared = [];
        foreach (self::$pagesTexts as $text) {
            $old_page_id = $text['page_id'];
            if (!$this->getNewPageIdByOldId($old_page_id)) {
//                self::e('select * from pages_clean where id = '.$old_page_id);
                continue;
            };
            $text['old_page_id'] = $old_page_id;
            $prepared[] = $text;
        }

        self::$pagesTexts = $prepared;
    }

    /**
     * Проставляет новый page_id в текстах
     */
    public function setNewPageIdPagesTexts() {
        foreach (self::$pagesTexts as &$text) {
            $old_page_id = $text['old_page_id'];
            $text['page_id'] = $this->getNewPageIdByOldId($old_page_id);
        }
    }

    /**
     * Записывает обработанные тексты в БД
     */
    public function recordPagesTexts() {
        $sql = "TRUNCATE pages_texts";
        Database::query($sql, 'asResult');

        foreach (self::$pagesTexts as &$text) {
            $text['top_text'] = strip_tags($text['top_text']);
            $text['bottom_text'] = strip_tags($text['bottom_text']);

            $text['top_text'] = str_replace(['+7(926)792-01-05', '&nbsp;'], ['#phone1#', ' '], $text['top_text']);
            $text['bottom_text'] = str_replace(['+7(926)792-01-05', '&nbsp;'], ['#phone1#', ' '], $text['bottom_text']);

            $sql = 'INSERT INTO pages_texts (page_id, top_text, bottom_text)
                        VALUES ('.$text['page_id'].', "'.Core::charsEncode($text['top_text']).'",
                         "'.Core::charsEncode($text['bottom_text']).'");';

//            self::e($sql);
            Database::query($sql, 'asResult');
        }
    }


    /**
     *
     *  Получает id, page_id из таблицы текстов для страниц pages_texts_before
     *
     */
    public function getPagesTexts_before__without_processing() {
        $sql = "SELECT * FROM pages_texts_before ORDER BY id"; //   LIMIT 100
        self::$pagesTexts = Database::query($sql);
    }

    /**
     * Получает все страницы из pages
     * (в начале файла, где она вызывается по идее pages уже полностью обновлены)
     */
    public function getPages__without_splitting() {
        $sql = "SELECT * FROM pages ORDER BY id";
        self::$pages = Database::query($sql);
    }

    public function createEmptyTextWhereTheyNone() {
        $texts = [];
        foreach (self::$pagesTexts as $text) {
            $texts[$text['page_id']] = $text;
        }

        $existing = [];
        foreach ($texts as $text) {
            $existing[] = $text['page_id'];
        }

        foreach (self::$pages as $page) {
            if (in_array($page['id'], $existing)) {
                //                echo $page['id'].' ---- ОК !!!!!!!! <br>';
                //                echo $texts[$page['id']]['top_text'];

                echo '<a href="https://dp.local' . $page['cpu_path'] . '">link</a><br/>';
                continue;
            }

            $sql = 'INSERT INTO pages_texts (page_id) VALUES ("' . $page['id'] . '");';
            //            Database::query($sql);
            echo $sql . '<br>';
        }
    }


    /**
     * Обновляет в отзывах town_start_id
     */
    public function updateReviews() {
        foreach (self::$reviews as $review) {
            $sql = 'UPDATE 
                        feedback 
                    SET 
                        town_start_id = "' . $review['town_start_id'] . '" 
                    WHERE id = ' . $review['id'];
            Database::query($sql, 'asResult');
        }
    }

    /**
     * Проставляет новый town_start_id в отзыве
     */
    public function setNew__town_start_id__reviews() {
        foreach (self::$reviews as &$review) {
            $town_start_id = $review['old_town_start_id'];
            $review['town_start_id'] = $this->getNewPageIdByOldId($town_start_id);
        }
    }

    /**
     * Получает все отзывы
     */
    public function getReviews() {
        $sql = "SELECT * FROM feedback_before";
        $reviews = Database::query($sql);

        $prepare = [];
        foreach ($reviews as $review) {
            $id = $review['id'];
            $prepare[$id] = $review;
            $prepare[$id]['old_town_start_id'] = $review['town_start_id'];
        }

        self::$reviews = $prepare;
    }


    /**
     * Объединяет массивы МО и М (уже с новыми услугами) и преобразует
     */
    public function join() {
        //        $prepared = [];
        $pages = array_merge(
            self::$pages_mo[Constants::PAGE_TYPE_CONNECTED],
            self::$pages_mo[Constants::PAGE_TYPE_TOWN],
            self::$pages_mo[Constants::PAGE_TYPE_SERVICE],
            self::$pages_m[Constants::PAGE_TYPE_CONNECTED],
            self::$pages_m[Constants::PAGE_TYPE_TOWN],
            self::$pages_m[Constants::PAGE_TYPE_SERVICE]
        );

        //        // для удобства проставления parent_id в дальшейшем
        //        foreach ($pages as $page) {
        //            if (!empty($page['old_id'])) {
        //                $id = $page['old_id'];
        //            } else {
        //                $id = $page['id'];
        //            }
        //
        //            $prepared[$id] = $page;
        //        }

        self::$pages = $pages;
    }

    /**
     * Объединяем страница M и МО в self::$pages
     */
    public function join__m_to_b() {
        $pages__m_to_b = array_merge(
            self::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_CONNECTED],
            self::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_TOWN],
            self::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE]
        );

        self::$pages = array_merge(self::$pages, $pages__m_to_b);
    }


    /**
     * Записывает страницы в БД
     */
    public function recordPages() {
        $sql = "TRUNCATE pages";
        Database::query($sql, 'asResult');

        //        array_splice(self::$pages, 10);

        foreach (self::$pages as $page) {
            //            echo $page['id'].'<br/>';
            if (empty($page['parent_id'])) $page['parent_id'] = 0;
            if (empty($page['sort'])) $page['sort'] = 0;
            if (empty($page['level'])) $page['level'] = -1;
            if (empty($page['old_id'])) $page['old_id'] = 0;
            if (empty($page['old_parent_id'])) $page['old_parent_id'] = 0;


            $sql = 'INSERT INTO pages (' . implode(',', array_keys($page)) . ') 
                        VALUES ("' . implode('","', array_values($page)) . '");';
            //            echo $sql;

            if ($page['id'] == 1852) {
                echo $sql;
            }
            Database::query($sql, 'asResult');
        }
    }


    /**
     * Проставляет новые идентификаторы в мо порядку
     */
    public function setNewId__mo() {
        $page_types = [Constants::PAGE_TYPE_CONNECTED, Constants::PAGE_TYPE_TOWN, Constants::PAGE_TYPE_SERVICE];
        foreach ($page_types as $pageType) {
            foreach (Mover::$pages_mo[$pageType] as &$page) {
                $page['id'] = self::$mo__startId++;
            }
        }
    }


    /**
     * Проставляет новые идентификаторы в м порядку
     */
    public function setNewId__m() {
        $page_types = [Constants::PAGE_TYPE_CONNECTED, Constants::PAGE_TYPE_TOWN, Constants::PAGE_TYPE_SERVICE];
        foreach ($page_types as $pageType) {
            foreach (Mover::$pages_m[$pageType] as &$page) {
                $page['id'] = self::$m__startId++;
            }
        }
    }


    /**
     * Добавляет новые услуги в массив МО  self::$pages_mo[Constants::PAGE_TYPE_SERVICE]
     */
    public function addNewServicesTo__mo() {
        $towns = self::$pages_mo[Constants::PAGE_TYPE_TOWN];
        $newServices = $this->prepareNewServicesByTowns($towns, self::$mo__startId);
        self::$pages_mo[Constants::PAGE_TYPE_SERVICE] =
            array_merge(self::$pages_mo[Constants::PAGE_TYPE_SERVICE], $newServices);
    }

    /**
     * Добавляет новые услуги в массив М self::$pages_m[Constants::PAGE_TYPE_SERVICE]
     */
    public function addNewServicesTo__m() {
        $towns = self::$pages_m[Constants::PAGE_TYPE_TOWN];
        $newServices = $this->prepareNewServicesByTowns($towns, self::$m__startId);
        self::$pages_m[Constants::PAGE_TYPE_SERVICE] =
            array_merge(self::$pages_m[Constants::PAGE_TYPE_SERVICE], $newServices);
    }

    /**
     * Генерирует массив из новых услуг по городам
     * @param     $towns
     * @param int $startId
     * @return array
     */
    private function prepareNewServicesByTowns($towns, $startId = 0) {
        $result = array();

        foreach ($towns as $town) {
            foreach (self::$newServices as $service) {
                $newService = self::prepareRow(
                    array(),
                    array(
                        'id'            => $startId++,
                        'parent_id'     => $town['id'],
                        'part_type'     => Constants::PART_MO,
                        'cpu'           => $service['cpu'],
                        'cpu_path'      => $town['cpu_path'] . $service['cpu'] . '/',
                        'type'          => Constants::PAGE_TYPE_SERVICE,
                        'page_type'     => $service['pageType'],
                        'public'        => 1,
                        'level'         => -1,
                        'old_id'        => '',
                        'old_parent_id' => $town['id']
                    ));

                $result[] = $newService;
            }
        }

        return $result;
    }

    /**
     * Добавляет новые города из Москвы в Б в self::$pages_m_to_b
     */
    public function addNewTownsTo__m_to_b() {
        $new_m_towns = $GLOBALS['new_m_towns'];

        foreach ($new_m_towns as $town) {
            $cpu = eng_name($town['name']);
            self::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_TOWN][] =
                self::prepareRow(
                    $town,
                    array(
                        'id'                    => self::$m_to_b__startId++,
                        'parent_id'             => 0, // Может Москва родитель?
                        'part_type'             => Constants::PART_MOSCOW_TO_B,
                        'cpu'                   => $cpu,
                        'cpu_path'              => $cpu,
                        'type'                  => Constants::PAGE_TYPE_TOWN,
                        'page_type'             => Constants::PAGE_TYPE_TOWN,
                        'public'                => 1,
                        'town_start_admin_name' => $town['name'].' (из Москвы в Б)',
                        'breadcrumb_names'      => '', //'Москва*'.$town['name'],
                        'breadcrumb_paths'      => '',//'/moskva/*/moskva/'.$cpu.'/'
                    ));
        }
    }

    /**
     * Добавляет новые ДВЕ услуги к городам из Москвы в Б
     */
    public function addNewServicesTo__m_to_b() {
        $towns = self::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_TOWN];

        foreach ($towns as $town) {
            $newService = self::prepareRow(
                array(),
                array(
                    'parent_id'             => $town['id'],
                    'part_type'             => Constants::PART_MOSCOW_TO_B,
                    'type'                  => Constants::PAGE_TYPE_SERVICE,
                    'public'                => 1,
                    'town_start_admin_name' => ''
                ));

            $cpu = eng_name($town['name']);

            foreach ([Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU, Constants::PEREEZDY_MOSKVA_XXX_CPU] as $link) {
                $a = $newService;
                $a['id'] = self::$m_to_b__startId++;
                $a['cpu'] = $link . $cpu;
                $a['cpu_path'] = '/moskva/' . $a['cpu'] . '/';
                // Заметим, что у GRUZOPEREVOZKI_MOSKVA_XXX_CPU другой page_type
                $a['page_type'] = $link == Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU ? Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE_WITH_CAR : Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE;
                self::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE][] = $a;
            }
        }
    }

    /**
     * Добавляет 2 связующие страницы в раздел Из Москвы в Б
     */
    public function addNewConnectedTo__m_to_b() {
        $newConnected =
            self::prepareRow(
                array(),
                array(
                    'parent_id'             => 0,
                    'part_type'             => Constants::PART_MOSCOW_TO_B,
                    'type'                  => Constants::PAGE_TYPE_CONNECTED,
                    'page_type'             => Constants::PAGE_TYPE_MOSCOW_TO_B_CONNECTED,
                    'public'                => 1,
                    'town_start_admin_name' => ''
                )
            );

        foreach ([Constants::GRUZOPEREVOZKI_IZ_MOSKVY_CPU, Constants::PEREEZDY_IZ_MOSKVY_CPU] as $link) {
            $a = $newConnected;
            $a['id'] = self::$m_to_b__startId++;
            $a['cpu'] = $link;
            $a['cpu_path'] = '/moskva/' . $link . '/';
            self::$pages_m_to_b[Constants::PAGE_TYPE_MOSCOW_TO_B_CONNECTED][] = $a;
        }
    }


    private function prepareRow($object, $otherKeys) {
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


    /**
     * Возвращает все страницы по очереди Мо, М
     * отсортированные порядку: connected, towns, services, service_with_car
     * с установленным old_id, old_parent_id, part_type
     * @return void
     */
    private function getAllPages() {
        $sql = "SELECT * FROM pages_clean WHERE id < 10000 ORDER BY id";
        $mo = Database::query($sql, 'withCount');

        $sql = "SELECT * FROM pages_clean WHERE id >= 10000 ORDER BY id";
        $m = Database::query($sql, 'withCount');

        self::$counts = (object)array(
            Constants::PART_MO     => $mo->rowCount,
            Constants::PART_MOSCOW => $m->rowCount,
        );

        // Устанавливаем old_id, old_parent_id, part_type
        foreach ($mo->result as &$page) {
            $page['old_id'] = $page['id'];
            $page['old_parent_id'] = $page['parent_id'];
            $page['part_type'] = Constants::PART_MO;
        }
        foreach ($m->result as &$page) {
            $page['old_id'] = $page['id'];
            $page['old_parent_id'] = $page['parent_id'];
            $page['part_type'] = Constants::PART_MOSCOW;
        }

        // Сортируем $mo по порядку connected, towns, services, service_with_car
        self::$pages_mo[Constants::PAGE_TYPE_CONNECTED] = array_filter($mo->result, function ($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_CONNECTED;
        });
        self::$pages_mo[Constants::PAGE_TYPE_TOWN] = array_filter($mo->result, function ($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_TOWN;
        });
        self::$pages_mo[Constants::PAGE_TYPE_SERVICE] = array_filter($mo->result, function ($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_SERVICE;
        });
        //        self::$pages_mo[Constants::PAGE_TYPE_SERVICE_WITH_CAR] = array_filter($mo->result, function ($page) {
        //            return $page['page_type'] == Constants::PAGE_TYPE_SERVICE_WITH_CAR;
        //        });

        // Сортируем $m по порядку connected, towns, services, service_with_car
        self::$pages_m[Constants::PAGE_TYPE_CONNECTED] = array_filter($m->result, function ($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_CONNECTED;
        });
        self::$pages_m[Constants::PAGE_TYPE_TOWN] = array_filter($m->result, function ($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_TOWN;
        });
        self::$pages_m[Constants::PAGE_TYPE_SERVICE] = array_filter($m->result, function ($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_SERVICE;
        });
        //        self::$pages_m[Constants::PAGE_TYPE_SERVICE_WITH_CAR] = array_filter($m->result, function ($page) {
        //            return $page['page_type'] == Constants::PAGE_TYPE_SERVICE_WITH_CAR;
        //        });
    }


    /**
     * Устанавливает новый parent_id
     * $this->pages[NUMBER]   NUMBER - это старый id
     */
    public function setNewParentId() {
        foreach (self::$pages as &$page) {
            if ($page['old_parent_id'] == 0) {
                $page['parent_id'] = 0;
                continue;
            }

            $page['parent_id'] = $this->getNewPageIdByOldId($page['old_parent_id']);
        }
    }

    //    /**
    //     * Возвращает новый id при нахождении элемента по старому parent_id
    //     * @param $oldParentId
    //     * @return mixed
    //     */
    //    private function getNewIdByOldParentId($oldParentId) {
    //        foreach (self::$pages as $page) {
    //            if
    //        }
    //        return self::$pages[$oldParentId]['id'];
    //    }

    static function e($text){
        echo $text.'<br>';
    }

    function startTr() {
        echo '<tr>';
    }


    function endTr() {
        echo '</tr>';
    }


    function printTd($text, $isBold = false) {
        echo '<td>' . ($isBold ? '<b>' : null) . $text . ($isBold ? '</b>' : null) . '</td>';
    }


    function printRow($page) {
        foreach ($GLOBALS['sql_columns'] as $key) {
            echo '<td>' . $page[$key] . '</td>';
        }
    }


    function printRowByKeys($page, $keys) {
        foreach ($keys as $key) {
            if ($key == 'id') $page[$key] = '*' . $page[$key] . '*';
            echo '<td>' . $page[$key] . '</td>';
        }
    }

    /**
     * @param      $pages
     * @param      $keys
     * @param bool $isTable
     */
    public function showNames($pages, $keys, $isTable = false) {
        echo $isTable ? '<table>' : null;

        $this->startTr();
        foreach ($keys as $key) {
            $this->printTd($key, true);
        }
        $this->endTr();

        foreach ($pages as $page) {
            $this->startTr();
            $this->printRowByKeys($page, $keys);
            $this->endTr();
        }
        echo $isTable ? '</table>' : null;
    }

    /**
     *
     * @param $old_id
     * @return string
     */
    private function getNewPageIdByOldId($old_id) {
        foreach (self::$pages as $page) {
            if ($page['old_id'] == $old_id) {
                return $page['id'];
            }
        }
//        self::e('NONE '.$old_id);
        return false;
    }


    /** ------------------------------------------------------- */
    /** ------------------------------------------------------- */
    /** ------------------------------------------------------- */

    /**
     * Возвращает все страницы по типу page_type
     * @param $pageType
     * @return array|mixed
     */
    private function getPages($pageType) {
        $sql = "SELECT 
                    *
                FROM 
                    pages_clean 
                WHERE
                    page_type = '$pageType'
                ORDER BY
                    id
                ";
        return Database::query($sql, 'withCount');
    }


    /**
     * Получает все страницы по 3-м типам и ставит типы друг за другом
     * @return array
     */
    private function getAllPagesByPageTypes() {
        $connections = $this->getPages(Constants::PAGE_TYPE_CONNECTED);
        $towns = $this->getPages(Constants::PAGE_TYPE_TOWN);
        $services = $this->getPages(Constants::PAGE_TYPE_SERVICE);

        $this->counts = (object)array(
            Constants::PAGE_TYPE_CONNECTED => $connections->rowCount,
            Constants::PAGE_TYPE_TOWN      => $towns->rowCount,
            Constants::PAGE_TYPE_SERVICE   => $services->rowCount,
        );

        $pages = array_merge($connections->result, $towns->result, $services->result);

        $preparedPages = array();
        foreach ($pages as $page) {
            $id = $page['id'];
            // устанавливаем в ключ старый идентификатор для удобства
            $preparedPages[$id] = (object)$page;
        }

        return $preparedPages;
    }


    /**
     * Создает новые страницы из старых с новым идентификтором
     * и новым parent_id созданным на основе старых связей
     * записывает все в $this->newPages
     */
    public function setNewId_OLD() {
        $id = 1;
        foreach ($this->pages as &$page) {
            // Создаем новые страницы
            $newPage = (object)array(
                'id'            => null,
                'parent_id'     => null,
                'old_id'        => $page->id,
                'old_parent_id' => $page->parent_id
            );

            // добавляем в новую страницу оставшиеся поля из старой
            foreach ($page as $key => $value) {
                $newPage->$key = $value;
            }

            // обновляем ключи затертые на предыдушем шаге
            $newPage->id = $id;
            $newPage->parent_id = null;

            // обновляем получившуюся новую страницу в массиве
            $page = $newPage;

            $id++;
        }
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
