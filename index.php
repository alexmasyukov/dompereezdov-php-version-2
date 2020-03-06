<?php
//ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$log = true;

// Создать класс с константами и вынести туда все названия услуги и cpu к ним
// Добавить новые услуги в объект $servicesTable из генерации Google таблицы
//          с использованием констант
// (6 ч)
// ШАГ ЧИСТОТА. Понять какие данные можно брать от родителей
//          и упростить таблицу pages для ускорения загрузки страницы
// Переписать class.pageMskServices.inc для извлечения данных от родителей (pages)
//          хлебные кношки, склонения, доп. переменные
// Очистить и удалить теперь не нужные столбцы в таблице pages
// (16 ч)
// Добавить функцию в класс class.photogallery.inc получения галереи по id (вместо id категории)
// Добавить галереи для новых услуг и связать их с объектом услуг
// Очистить категории фотогалерей в БД и убрать раздел Категории в ПУ
// (1 ч)
// Шаблон страницы услуги с машиной
// Дописать условия услуг в классе class.pageMskServices.inc  с машинами
// Дописать класс class.pageMskServices.inc для работы с новыми услугами с машиной
//          и вывод шаблона mskServicesPage__service_with_car.tpl
// (2:40 ч)
// Создать таблицу prices
// Добавить Раздел Прайсы в ПУ
// (30 м)
// Сделать класс для работы с прайсами
// Заполнить таблицу прайсами
// (30 м)
// Обновить класс class.pageMskServices.inc для выборки нужных данных для цен таблиц
// Показать нужные таблицы в нужных услугах
// Обновить шаблоны mskServicesPage__service.tpl, _car.tpl
// Возможность указать и вывести несколько машин с прайсом на страницу (заказ газели)
// Параметр для отключения ссылок на машинах
// Стилизовать таблицу машины
// (3 ч)
// Форматировать и стилизовать прайсы
// (1:20 ч)
// Обновить констранты на старых услугах с листа Мета
// (30 м)
// ШАГ А. Придумать как разнести в таблице pages все страницы на 3 раздела
//          Москва, МО, из Моксвы в Б
// Начать писать переносчик и обновлятор основных таблиц
// (3 ч)
// основной объект страниц $pages_mo и $pages_m порядок: connected, town, service
// установить part_type
// (1 ч)
// восстановить таблицу pages и сделать ШАГ ЧИСТОТА + упростить с восстановлением cpu районов
// сформировать массивы с сортировкой и созданием ключей old_id, old_parent_id
// сделать склонения новых городов 
// сформировать массив новых городов из Москвы в Б в таблице 
// Добавить новые города из Москвы в Б 
// Добавить новые услуги на города из Москвы в Б 
// Добавить новые услуги на МО + М 
// создать новые идентификаторы для страниц 
// создать новые parent_id для страниц (в одном массиве) 
// выгружать страницы с новыми идентификаторами в таблицу pages 
// (8ч)
//  Хлебные крошки
// (3ч)
// todo правки обновлятора
// todo В скопированной таблице reviews обновить старые идентификторы,
//          но с сохранением старых id_old
// todo В скопированной таблице pages_texts обновить старые идентификторы,
//          но с сохранением старых page_id_old
// Импорт дополнительных переменных в pages из Google таблицы
// (13 ч)
// Роутер Перевозки или Переезды из Москвы в Б связующая и роутер 2-х услуг
// (1ч + 2ч)
// Шаблоны страниц из Москвы в Б
// Получение списка городов из Москвы в Б
// Дописать функцию замены переменных в названиях
// (2:32 ч)
// Написать регулярные выражения для разбора (10) и  (10|6000) https://regex101.com/ сервис для тестирования регулярок
// Расчет цены в таблицах по формулам и связкам
// Расчет цен в машинах на услуге Грузоперевозки из Москвы в Б
// Другие услуги на связующих страницах из Москвы в Б
// Сделать считывание дополнительных переменных из родителя на всех страницах
// Добавить в заменитель новые переменные из крайних столбцов таблицы pages (MtoB)
// (5:40 ч)


// todo отзывы в ПУ. Форма редактирования отыва в CMS
// todo отзывы на сайте по услугам не правильно работают
// todo Привязка отзывов к новым услугам

// todo импортер текстов
// todo Mover. заполнить пустые тексты там, где их нет

// todo (Проверь это) Не показывать услуги, если в них нет текста
// todo сделать rss для турбо страниц и обновить его в вебмастере

// соединить отзывы
// повторить логику работы отзывов
// сделать всю логику отзывов
// сделать sitemap
// посмотреть на каком веб местере настроены турбо страницы
// галереи
// поправить страницы отзывов пагинацию
// сделать келлми

if (isset($_GET['nc'])) header("X-Accel-Expires: 0");

// Основные подключения
$root = realpath($_SERVER['DOCUMENT_ROOT']);
require $root . '/constants/common.php';
require $root . '/configuration.php';
require $root . '/core/class.database.inc';
require $root . '/core/class.core.inc';
require $root . '/core/class.page.inc';
require $root . '/core/class.menu.inc';
require $root . '/core/class.reviews.inc';
require $root . '/core/functions.php';
require $root . '/frontend/libs/smarty/libs/Smarty.class.php';

$core = new Core();

// start html compressed
//ob_start('compressHtml');


switch (Core::getUrl()->module) {
    case 'index':
        require $root . '/core/class.pageHome.inc';
        $homePage = new PageHome();
        $homePage->view();
        break;
    case 'cars':
        require $root . '/core/class.cars.inc';
        require $root . '/core/class.pageCars.inc';
        $carsPage = new PageCars();
        $carsPage->view();
        break;
    case 'otzyvy':
        // Здесь используется табличный метод Макконела
        include_once $root . '/core/class.reviews.inc';
        include_once $root . '/core/class.pageReviews.inc';
        $reviewsPage = new PageReviews(Core::getUrl()->action);
        $reviewsPage->view();
        break;
    case 'moskovskaya-oblast':
    case 'moskva':
        require $root . '/core/class.prices.inc';
        require $root . '/core/class.cars.inc';
        require $root . '/core/class.photogallery.inc';
        require $root . '/core/class.pageMskServices.inc';
        $mskServicesPage = new PageMskServices();
        $mskServicesPage->view();
        break;
    case 'sitemap.xml':
        header('Content-Type: application/xml; charset=utf-8');
        require $root . '/core/class.sitemap.inc';
        Sitemap::view();
        break;
    //      todo rss for turbo pages
    //    case 'rss':
    //        break;
    default:
        require $root . '/core/class.pageContent.inc';
        $PageContent = new PageContent();
        $pageData = $PageContent->getPageOfCpuPatch(Core::getUrl()->urlPath);
        if (!$pageData) {
            Page::view404();
        } else {
            $PageContent->view((object)$pageData);
        }
}


// end html compressed
ob_end_flush();


/**
 * Функция избавляется от переносов, пробелов и т.д. минифицирует HTML
 * @param $compress
 * @return null|string|string[]
 */
function compressHtml($compress) {
    $i = array('/([\n\r])+/s', '/([\r])+/s', '/([\n])+/s', '/([\t])+/s');
    $one = preg_replace($i, '', $compress);
    $ii = array('/\s{2,}/');
    $two = preg_replace($ii, ' ', $one);
    $iii = array('/[\>]\s{1,}[\<]/');
    $tree = preg_replace($iii, '><', $two);
    $res_compress = preg_replace('/<!--(.*?)-->/', '', $tree);
    return $res_compress;
}