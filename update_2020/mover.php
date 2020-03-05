<?php
/**
 * Created by PhpStorm.
 * User: Alexey Masyukov  a.masyukov@chita.ru
 * Date: 2020-02-22
 * Time: 18:39
 */

$root = realpath($_SERVER['DOCUMENT_ROOT']);
require $root . '/constants/common.php';
require $root . '/configuration.php';
require $root . '/core/class.database.inc';
require $root . '/core/class.core.inc';
require $root . '/core/class.page.inc';
require $root . '/core/functions.php';

$log = true;

$Mover = new Mover();
//core::log($Mover->pages);
$Mover->showNames();
$Mover->setNewId();
//core::log($Mover->pages);
$Mover->setNewParentId();
//core::log($Mover->pages);
// Считать все тексты
// Обновить page_id на всех текстах
// Считать все отзывы
// Обновить town_start_id на всех отзывах
// Установить раздел у страниц PART_
// Добавляем новые города
// Добавить новые услуги в разделы PART_MO, PART_MOSCOW
// Добавить новые услуги в раздел PART_MOSCOW_TO_B


class Mover {
    public $counts = array();
    public $pages = array();

    /**
     * Mover constructor.
     */
    public function __construct() {
        $this->pages = $this->getAllPages();
    }

    public function showNames() {
        echo '<table>';
        foreach ($this->pages as $page) {
            $this->startTr();
            $this->printRowByKeys($page, ['id', 'parent_id', 'cpu_path', 'name', 'part_type', 'type', 'page_type']);
            $this->endTr();
        }
        echo '</table>';
    }


    /**
     * Создает новые страницы из старых с новым идентификтором
     * и новым parent_id созданным на основе старых связей
     * записывает все в $this->newPages
     */
    public function setNewId() {
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


    /**
     * Устанавливает новый parent_id
     * $this->pages[NUMBER]   NUMBER - это старый id
     */
    public function setNewParentId() {
        foreach ($this->pages as &$page) {
            if ($page->old_parent_id == 0) {
                $page->parent_id = 0;
                continue;
            }

            $page->parent_id = $this->getNewIdByOldParentId($page->old_parent_id);
        }
    }

    /**
     * Возвращает новый id при нахождении элемента по старому parent_id
     * @param $oldParentId
     * @return mixed
     */
    private function getNewIdByOldParentId($oldParentId) {
        return $this->pages[$oldParentId]->id;
    }


    /**
     * Возвращает все страницы по очереди Мо, М
     * отсортированные порядку: connected, towns, services
     * с установленным part_type
     * @return array
     */
    private function getAllPages() {
        $sql = "SELECT * FROM pages WHERE id < 10000 ORDER BY id";
        $mo = Database::query($sql, 'withCount');

        $sql = "SELECT * FROM pages WHERE id >= 10000 ORDER BY id";
        $m = Database::query($sql, 'withCount');

        $this->counts = (object)array(
            Constants::PART_MO     => $mo->rowCount,
            Constants::PART_MOSCOW => $m->rowCount,
        );

        // Сортируем $mo по порядку connected, towns, services
        $connected = array_filter($mo->result, function($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_CONNECTED;
        });
        $towns = array_filter($mo->result, function($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_TOWN;
        });
        $services = array_filter($mo->result, function($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_SERVICE;
        });
        $mo->result = array_merge($connected, $towns, $services);


        // Сортируем $m по порядку connected, towns, services
        $connected = array_filter($m->result, function($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_CONNECTED;
        });
        $towns = array_filter($m->result, function($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_TOWN;
        });
        $services = array_filter($m->result, function($page) {
            return $page['page_type'] == Constants::PAGE_TYPE_SERVICE;
        });
        $m->result = array_merge($connected, $towns, $services);


        // Устанавливаем part_type
        foreach ($mo->result as &$page) {
            $page['part_type'] = Constants::PART_MO;
        }
        foreach ($m->result as &$page) {
            $page['part_type'] = Constants::PART_MOSCOW;
        }


        $pages = array_merge($mo->result, $m->result);

        $preparedPages = array();
        foreach ($pages as $page) {
            $id = $page['id'];
            // устанавливаем в ключ старый идентификатор для удобства
            $preparedPages[$id] = (object)$page;
        }

        return $preparedPages;
    }


    /**
     * Возвращает все страницы по типу page_type
     * @param $pageType
     * @return array|mixed
     */
    private function getPages($pageType) {
        $sql = "SELECT 
                    *
                FROM 
                    pages 
                WHERE
                    page_type = '$pageType'
                ORDER BY
                    id
                ";
        return Database::query($sql, 'withCount');
    }


    public function movePagesToNewTable() {
        core::log($this->newPages);
    }


    function startTr() {
        echo '<tr>';
    }


    function endTr() {
        echo '</tr>';
    }


    function printTd($text) {
        echo '<td>' . $text . '</td>';
    }


    function printRow($page) {
        foreach ($GLOBALS['sql_columns'] as $key) {
            echo '<td>' . $page[$key] . '</td>';
        }
    }


    function printRowByKeys($page, $keys) {
        foreach ($keys as $key) {
            echo '<td>' . $page->$key . '</td>';
        }
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
}


