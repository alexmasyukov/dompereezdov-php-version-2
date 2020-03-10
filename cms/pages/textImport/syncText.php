<?php
/**
 * Created by PhpStorm.
 * User: Alexey Masyukov  a.masyukov@chita.ru
 * Date: 2019-06-12
 * Time: 15:26
 */

$root = realpath($_SERVER['DOCUMENT_ROOT']);
include_once $root . '/configuration.php';
include_once $root . '/constants/common.php';
include_once $root . '/cms/pages/textImport/textDirections.php';
include_once $root . '/core/class.core.inc';
include_once $root . '/core/class.pageMskServices.inc';
include_once $root . '/core/class.database.inc';

$log = true;

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : false;
$file = isset($_REQUEST['file']) ? $_REQUEST['file'] : false;
$textDirectionRequest = $_REQUEST['textDirection'];
$textPositionRequest = isset($_REQUEST['textPosition']) ? $_REQUEST['textPosition'] : false;;
$serviceRequest = $_REQUEST['service'];
$direction = '';
$cpu = $serviceRequest ? $serviceRequest : false;


if (!empty($directions[$textDirectionRequest])) {
    $direction = $directions[$textDirectionRequest];
} else {
    echo '<p style="color: red">Не наден запрос в $direction!</p>';
    exit;
}


if ($action !== 'SHOW_INFORMATION') {
    if (!$file) {
        echo '<p style="color: red">Не выбран или не загружен файл!</p>';
        exit;
    }
}

$pages= Database::query($direction->sql, 'withCount');
if ($pages->rowCount < 1) pagesNotFound();
$ids = array_column($pages->result, 'id');

if ($cpu) {
    echo '<p style="color: rebeccapurple"><b>$cpu:</b> <br>'.$cpu.'</p><br>';


    $direction->sql = 'SELECT id FROM pages WHERE cpu = "' . $cpu . '" AND parent_id IN (' . implode(', ', $ids) . ')';

    // Для переездов из Москвы в Б нужны особые запросы
    if ($cpu == Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU) {
        $direction->sql = 'SELECT id FROM pages WHERE cpu LIKE "' . $cpu . '%" AND parent_id IN (' . implode(', ', $ids) . ')';
    }
    if ($cpu == Constants::PEREEZDY_MOSKVA_XXX_CPU) {
        $direction->sql = 'SELECT id FROM pages WHERE cpu LIKE "' . $cpu . '%" AND parent_id IN (' . implode(', ', $ids) . ')';
    }

    echo '<p class="mysql"><b>Запрос MySQL:</b> <br/>'.$direction->sql.'</p><br>';

    $pagesWithCpu = Database::query($direction->sql, 'withCount');
    if ($pagesWithCpu->rowCount < 1) pagesNotFound();
    $ids = array_column($pagesWithCpu->result, 'id');
} else {
    echo '<p class="mysql"><b>Запрос MySQL:</b> <br/>'.$direction->sql.'</p><br>';
}


echo '<p style="color: green"><b>Найдено страниц:</b> '.count($ids).'</p><br>';

if ($action == 'SHOW_INFORMATION') showFindResultTable($direction->sql);

if ($action == 'SHOW_INFORMATION') exit;


$text = file_get_contents($file);
$textItems = explode('+++++', $text);
$textItemsCount = count($textItems);

if (count($ids) > $textItemsCount) {
    echo '<p style="color: red">Количество страниц больше чем текстов в файле! Некоторые страницы будут без текста!</p>';
}


setUnpublicTextsByPagesIds($ids);
recordTextsToPages($ids, $textItems, $textPositionRequest);

echo '<p style="color: green">Обработано страниц: '.count($ids).'</p><br>';



if ($action !== 'SHOW_INFORMATION') showFindResultTable($direction->sql);


function recordTextsToPages($ids, $texts, $textPosition) {
    foreach ($ids as $key => $pageId) {
        $text = '';
        if (!empty($texts[$key])) $text = $texts[$key];

        $text = mb_convert_encoding($text,  "UTF-8", "windows-1251");

        $updateSQL = "UPDATE pages_texts SET $textPosition = '".Core::charsEncode($text)."'
                            WHERE page_id = $pageId";

        $insertSQL = "INSERT INTO pages_texts (page_id, $textPosition)
                            VALUES ($pageId, '".Core::charsEncode($text)."')";

        $result = Database::query($updateSQL, 'asResult');

        if ($result->rowCount() == 0) {
            Database::query($insertSQL, 'asResult');
        }

        setPublicPage($pageId);
    }
}



function setUnpublicTextsByPagesIds($pagesIds) {
    $sql = 'UPDATE pages SET public = 0 WHERE id IN ('.implode(',', (array)$pagesIds).')';
    Database::query($sql, 'asResult');
}


function setPublicPage($id) {
    $sql = "UPDATE pages SET public = 1 WHERE id = $id";
    Database::query($sql, 'asResult');
}


function showFindResultTable($sql) {
    // Отображаем таблицу городов
    $sql = str_replace('SELECT id FROM', 'SELECT id, parent_id, name, cpu_path FROM', $sql);
    $pages = Database::query($sql);
    showNames($pages, ['id', 'parent_id', 'name', 'cpu_path'], true);
}

function pagesNotFound() {
    echo '<p style="color: red">Таких страниц не найдено!</p>';
    exit;
}


function e($text) {
    echo $text . '<br>';
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
function showNames($pages, $keys, $isTable = false) {
    echo $isTable ? '<table>' : null;

    startTr();
    foreach ($keys as $key) {
        printTd($key, true);
    }
    endTr();

    foreach ($pages as $page) {
        startTr();
        printRowByKeys($page, $keys);
        endTr();
    }
    echo $isTable ? '</table>' : null;
}