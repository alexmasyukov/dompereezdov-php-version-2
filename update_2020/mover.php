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
                'id' => null,
                'parent_id' => null,
                'old_id' => $page->id,
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
     * Получает все страницы по 3-м типам и ставит типы друг за другом
     * @return array
     */
    private function getAllPages() {
        $connecteds = $this->getPages(Constants::PAGE_TYPE_CONNECTED);
        $towns = $this->getPages(Constants::PAGE_TYPE_TOWN);
        $services = $this->getPages(Constants::PAGE_TYPE_SERVICE);

        $this->counts = (object)array(
            Constants::PAGE_TYPE_CONNECTED => $connecteds->rowCount,
            Constants::PAGE_TYPE_TOWN => $towns->rowCount,
            Constants::PAGE_TYPE_SERVICE => $services->rowCount,
        );

        $pages = array_merge($connecteds->result, $towns->result, $services->result);

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

}


