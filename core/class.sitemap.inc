<?php

class Sitemap {
    private function __construct() {
    }

    private static function getContentPages() {
        return Database::query('select cpu_path from content where public = 1', 'column');
    }

    private static function getPages() {
        return Database::query('select type, page_type, part_type, cpu_path from pages where public = 1');
    }

    private static function getCars() {
        $carsPages = Database::query('select cpu_path from cars where public = 1', 'column');
        $carsPages[] = '/cars/';
        return $carsPages;
    }


    private static function getReviews() {
        include_once $GLOBALS['root'].'/core/class.pageReviews.inc';
        $reviewsPages = [];
        $reviewsPages[] = '/otzyvy/';
        foreach (PageReviews::$painTable as $cpu => $pain) {
            $reviewsPages[] = "/otzyvy/$cpu/";
        }
        return $reviewsPages;
    }

    public static function view() {
        $pagesAll = self::getPages();

        $pages = array_filter($pagesAll, function ($item) {
            return !($item['page_type'] == Constants::PAGE_TYPE_TOWN &&
                $item['type'] == Constants::TYPE_TOWN &&
                $item['part_type'] == Constants::PART_MOSCOW_TO_B);
        });

        $pages_PART_MOSCOW_TO_B = array_filter($pagesAll, function ($item) {
            return ($item['page_type'] == Constants::PAGE_TYPE_TOWN &&
                $item['type'] == Constants::TYPE_TOWN &&
                $item['part_type'] == Constants::PART_MOSCOW_TO_B);
        });


        $pages_MO = array_map(function ($item) {
            return $item['cpu_path'];
        }, $pages);

        $pages_MOSCOW_TO_B_PEREVOZKI = array_map(function ($item) {
            return '/moskva/'.Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU.$item['cpu_path'].'/';
        }, $pages_PART_MOSCOW_TO_B);

        $pages_MOSCOW_TO_B_PEREEZDI = array_map(function ($item) {
            return '/moskva/'.Constants::PEREEZDY_MOSKVA_XXX_CPU.$item['cpu_path'].'/';
        }, $pages_PART_MOSCOW_TO_B);


        $links = array_merge(
            $pages_MO,
            $pages_MOSCOW_TO_B_PEREVOZKI,
            $pages_MOSCOW_TO_B_PEREEZDI,
            self::getContentPages(),
            self::getCars(),
            self::getReviews()
        );

        Core::getSmarty()->assign('links', $links);
        Core::getSmarty()->assign('host', Core::getUrl()->host);
        Core::getSmarty()->assign('protocol', $GLOBALS['protocol']);
        Core::getSmarty()->display('sitemap.tpl');
    }
}