<?php
//ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$log = true;

// Создать класс с константами и вынести туда все названия услуги и cpu к ним
// Добавить новые услуги в объект $servicesTable из генерации Google таблицы
//          с использованием констант
// (6 ч)
// todo Понять какие данные можно брать от родителей
//          и упростить таблицу pages для ускорения загрузки страницы
// todo Переписать class.pageMskServices.inc для извлечения данных от родителей (pages)
//          хлебные кношки, склонения, доп. переменные,
// todo Очистить и удалить теперь не нужные столбцы в таблице pages
// todo Восстановить исходную таблицу pages и упростить из предыдущих шагов
// ()
// todo Добавить функцию в класс class.photogallery.inc получения галереи по id (вместо id категории)
// todo Добавить галереи для новых услуг и связать их с объектом услуг
// todo Очистить категории фотогалерей в БД и убрать раздел Категории в ПУ
// (1 ч)
// todo Шаблон страницы услуги с машиной
// todo Дописать условия услуг с машинами
// todo Дописать класс class.pageMskServices.inc для работы с новыми услугами с машиной
//          и вывод шаблона mskServicesPage__service_with_car.tpl
// (20:15 - 20:58)
// todo Добавить Раздел Прайсы в ПУ и заполнить таблицы с ценами
// todo Показать нужные таблицы в нужных услугах
// todo Обновить класс class.pageMskServices.inc для выборки нужных данных для цен таблиц
// todo Расчет цены в таблицах по формулам и связкам
// todo отзывы на сайте по услугам не правильно работают
// todo отзывы в ПУ
// todo Привязка отзывов к новым услугам
// todo Хлебные крошки на услугах и родителях
// todo Не показывать услуги, если в них нет текста
// todo
// todo
// todo
// todo
// todo
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
        require $root . '/constants/common.php';
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