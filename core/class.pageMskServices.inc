<?php
/**
 * Created by PhpStorm.
 * User: Alexey Masyukov  a.masyukov@chita.ru
 * Date: 2019-05-28
 * Time: 11:53
 */

class PageMskServices extends Page {
    public static $servicesTable = array(
        Constants::GRUZOPEREVOZKI_CPU     => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'cpu'                               => Constants::GRUZOPEREVOZKI_CPU,
            'reviewsServiceTitle'               => Constants::GRUZOPEREVOZKI,
            'adminPanelReviewsFormInput_usluga' => Constants::GRUZOPEREVOZKI,
            'russianName'                       => Constants::GRUZOPEREVOZKI,
            'metaTitle'                         => 'Дешевые грузоперевозки в #нас-пункт-пп#, перевозка и доставка грузов',
            'metaDescription'                   => 'Грузовые перевозки в #нас-пункт-пп# срочно и дешево с «ДомПереездов». Для перевозки мебели и мелких грузов незаменимым станет заказ газели с грузчиками недорого.',
            'h1'                                => 'Грузоперевозки в #нас-пункт-пп# недорого',
            'titlePrice'                        => 'Цены на грузоперевозки в #нас-пункт-пп#',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'titleGallery'                      => Constants::TITLE_GALLERY_1,
            'galleryId'                         => 59,
            'cars_withoutLink'                  => true
        ),
        Constants::VIVOZ_MEBELI_CPU       => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'cpu'                               => Constants::VIVOZ_MEBELI_CPU,
            'russianName'                       => Constants::VIVOZ_MEBELI,
            'reviewsServiceTitle'               => Constants::VIVOZ_MEBELI,
            'adminPanelReviewsFormInput_usluga' => Constants::VIVOZ_MEBELI,
            'metaTitle'                         => 'Вывоз мебели и техники на утилизацию в #нас-пункт-пп# недорого',
            'metaDescription'                   => 'Вывоз, утилизация мебели и техники в #нас-пункт-пп# избавит от ненужного хлама в квартире. «ДомПереездов» качественно организует демонтаж и вывоз старой мебели.',
            'h1'                                => 'Вывоз и утилизация мебели и техники в #нас-пункт-пп# недорого',
            'titlePrice'                        => 'Цены на вывоз мебели и техники в #нас-пункт-пп#',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'titleGallery'                      => 'Фото вывоза мебели',
            'galleryId'                         => 60,
            'priceId'                           => 1
        ),
        Constants::GRUZOVOE_TAKSI_CPU     => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'cpu'                               => Constants::GRUZOVOE_TAKSI_CPU,
            'russianName'                       => Constants::GRUZOVOE_TAKSI,
            'reviewsServiceTitle'               => Constants::GRUZOVOE_TAKSI,
            'adminPanelReviewsFormInput_usluga' => Constants::GRUZOVOE_TAKSI,
            'metaTitle'                         => 'Грузовое такси в #нас-пункт-пп# дешево, заказать грузотакси с грузчиками',
            'metaDescription'                   => 'Заказ грузового такси в #нас-пункт-пп# срочно и дешево. Доставка на грузовом такси с «ДомПереездов» экономично и надежно!',
            'h1'                                => 'Грузовое такси в #нас-пункт-пп#, заказать с грузчиками недорого',
            'titlePrice'                        => 'Цены на грузовое такси в #нас-пункт-пп#',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'titleGallery'                      => 'Фото машин из нашего автопарка',
            'isNewService'                      => true,
            'galleryId'                         => 59,
            'cars_withoutLink'                  => true
        ),
        Constants::KVARTIRNII_PEREEZD_CPU => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'cpu'                               => Constants::KVARTIRNII_PEREEZD_CPU,
            'russianName'                       => Constants::KVARTIRNII_PEREEZD,
            'reviewsServiceTitle'               => Constants::KVARTIRNII_PEREEZD,
            'adminPanelReviewsFormInput_usluga' => Constants::PEREEZDI,
            'metaTitle'                         => 'Квартирный переезд в #нас-пункт-пп# с грузчиками недорого',
            'metaDescription'                   => 'Компания «ДомПереездов» организует квартирный переезд в #нас-пункт-пп# с грузчиками недорого. Сборка, разборка и упаковка вещей качественно.',
            'h1'                                => 'Квартирный переезд в #нас-пункт-пп# с грузчиками дешево',
            'titlePrice'                        => 'Цены на квартирный переезд в #нас-пункт-пп#',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'titleGallery'                      => 'Фото машин для квартирного переезда',
            'isNewService'                      => true,
            'galleryId'                         => 63,
            'priceId'                           => 3
        ),
        Constants::DACHNII_PEREEZD_CPU    => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'cpu'                               => Constants::DACHNII_PEREEZD_CPU,
            'russianName'                       => Constants::DACHNII_PEREEZD,
            'reviewsServiceTitle'               => Constants::DACHNII_PEREEZD,
            'adminPanelReviewsFormInput_usluga' => Constants::PEREEZDI,
            'metaTitle'                         => 'Дачный переезд в #нас-пункт-пп# недорого с грузчиками. Перевозка мебели на дачу.',
            'metaDescription'                   => 'Осуществим дачный переезд в #нас-пункт-пп# с грузчиками недорого и аккуратно. Переезд на дачу с «ДомПереездов» выгодно и вежливо.',
            'h1'                                => 'Дачный переезд в #нас-пункт-пп#, перевозка вещей на дачу недорого',
            'titlePrice'                        => 'Цены на дачный переезд в #нас-пункт-пп#',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'titleGallery'                      => 'Фото машин для дачного переезда',
            'isNewService'                      => true,
            'galleryId'                         => 59,
            'priceId'                           => 4
        ),
        Constants::OFISNII_PEREEZD_CPU    => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'cpu'                               => Constants::OFISNII_PEREEZD_CPU,
            'russianName'                       => Constants::OFISNII_PEREEZD,
            'reviewsServiceTitle'               => Constants::OFISNII_PEREEZD,
            'adminPanelReviewsFormInput_usluga' => Constants::PEREEZDI,
            'metaTitle'                         => 'Переезд офиса в #нас-пункт-пп# с грузчиками недорого. Перевозка офисной мебели.',
            'metaDescription'                   => 'Профессионально организуем офисный переезд в #нас-пункт-пп#. Сборка, разборка, качественная упаковка от мувинговой компании "ДомПереездов!',
            'h1'                                => 'Офисный переезд в #нас-пункт-пп# с грузчиками недорого',
            'titlePrice'                        => 'Цены на офисный переезд в #нас-пункт-пп#',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'titleGallery'                      => 'Фото машин для офисного переезда',
            'isNewService'                      => true,
            'galleryId'                         => 63,
            'priceId'                           => 5
        ),
        Constants::PEREVOZKA_MEBELI_CPU   => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'cpu'                               => Constants::PEREVOZKA_MEBELI_CPU,
            'russianName'                       => Constants::PEREVOZKA_MEBELI,
            'reviewsServiceTitle'               => Constants::PEREVOZKA_MEBELI,
            'adminPanelReviewsFormInput_usluga' => Constants::PEREVOZKA_MEBELI,
            'metaTitle'                         => 'Перевозка мебели в #нас-пункт-пп# с грузчиками недорого. Разборка, сборка.',
            'metaDescription'                   => 'Перевозка мебели в #нас-пункт-пп# c «ДомПереездов» недорого и аккуратно. Профессиональная разборка, сборка и упаковка мебели.',
            'h1'                                => 'Перевозка мебели в #нас-пункт-пп# с грузчиками недорого.',
            'titlePrice'                        => 'Цены на перевозку мебели в #нас-пункт-пп#',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'titleGallery'                      => 'Фото машин для перевозки мебели',
            'isNewService'                      => true,
            'galleryId'                         => 59,
            'priceId'                           => 6
        ),
        Constants::PEREVOZKA_PIANINO_CPU  => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'cpu'                               => Constants::PEREVOZKA_PIANINO_CPU,
            'russianName'                       => Constants::PEREVOZKA_PIANINO,
            'reviewsServiceTitle'               => Constants::PEREVOZKA_PIANINO,
            'adminPanelReviewsFormInput_usluga' => Constants::PEREVOZKA_PIANINO,
            'metaTitle'                         => 'Перевозка пианино в #нас-пункт-пп# дешево, грузчики для перевозки пианино недорого',
            'metaDescription'                   => 'Профессиональная перевозка пианино, фортепиано, рояля в #нас-пункт-пп# обойдется дешево с «ДомПереездов». Грузчики для перевозки пианино помогут недорого перевести музыкальный инструмент.',
            'h1'                                => 'Перевозка пианино и роялей в #нас-пункт-пп# недорого',
            'titlePrice'                        => 'Цены на перевозку пианино и рояля в #нас-пункт-пп#',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'titleGallery'                      => 'Фото перевозки пианино',
            'galleryId'                         => 61,
            'priceId'                           => 2
        ),

        /** ----------------------- **/
        /** НОВЫЕ УСЛУГИ 19.02.2020 **/
        /** ----------------------- **/

        Constants::VYVOZ_MUSORA_CPU              => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::VYVOZ_MUSORA,
            'reviewsServiceTitle'               => Constants::VYVOZ_MUSORA,
            'adminPanelReviewsFormInput_usluga' => Constants::VYVOZ_MUSORA,
            'cpu'                               => Constants::VYVOZ_MUSORA_CPU,
            'metaTitle'                         => 'Вывоз мусора в #нас-пункт-пп#, вывезем строительный и бытовой мусор недорого',
            'metaDescription'                   => 'Компания «ДомПереездов» окажет услуги по вывозу строительного, бытового и прочего мусора с грузчиками недорого в #нас-пункт-пп#.',
            'h1'                                => 'Вывоз строительного и бытового мусора в #нас-пункт-пп# недорого',
            'titlePrice'                        => 'Цены на вывоз мусора в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото вывоза мусора',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 65,
            'priceId'                           => 7,
            'isNew'                             => true
        ),
        Constants::ZAKAZAT_GAZEL_CPU             => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::ZAKAZAT_GAZEL,
            'reviewsServiceTitle'               => Constants::ZAKAZAT_GAZEL,
            'adminPanelReviewsFormInput_usluga' => Constants::ZAKAZAT_GAZEL,
            'cpu'                               => Constants::ZAKAZAT_GAZEL_CPU,
            'metaTitle'                         => 'Заказать Газель в #нас-пункт-пп# с грузчиками недорого',
            'metaDescription'                   => 'Заказать Газель в #нас-пункт-пп# с грузчиками недорого. Организуем грузоперевозки на Газели.',
            'h1'                                => 'Заказать Газель в #нас-пункт-пп#, перевозки на Газели с грузчиками недорого',
            'titlePrice'                        => 'Цены на заказ Газели в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото Газелей для перевозки',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 66,
            'cars_onlyId'                       => [11, 12],
            'isNew'                             => true
        ),
        Constants::GRUZCHIKI_CPU                 => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::GRUZCHIKI,
            'reviewsServiceTitle'               => Constants::GRUZCHIKI,
            'adminPanelReviewsFormInput_usluga' => Constants::GRUZCHIKI,
            'cpu'                               => Constants::GRUZCHIKI_CPU,
            'metaTitle'                         => 'Грузчики в #нас-пункт-пп#, недорогие услуги грузчиков',
            'metaDescription'                   => 'Компания «ДомПереездов» предоставляет услуги грузчиков в #нас-пункт-пп# недорого.',
            'h1'                                => 'Грузчики в #нас-пункт-пп#, заказ грузчиков недорого',
            'titlePrice'                        => 'Цены на услуги грузчиков в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото грузчиков',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 67,
            'priceId'                           => 8,
            'isNew'                             => true
        ),
        Constants::DEMONTAZHNYE_RABOTY_CPU       => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::DEMONTAZHNYE_RABOTY,
            'reviewsServiceTitle'               => Constants::DEMONTAZHNYE_RABOTY,
            'adminPanelReviewsFormInput_usluga' => Constants::DEMONTAZHNYE_RABOTY,
            'cpu'                               => Constants::DEMONTAZHNYE_RABOTY_CPU,
            'metaTitle'                         => 'Демонтажные работы в #нас-пункт-пп#. Прайс-лист на демонтажные услуги',
            'metaDescription'                   => 'Демонтажные работы в #нас-пункт-пп# недорого. Актуальные цены на услуги демонтажа на сайте «ДомПереездов».',
            'h1'                                => 'Демонтажные работы в #нас-пункт-пп# недорого, актуальный прайс-лист',
            'titlePrice'                        => 'Цены на демонтажные работы в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото демонтажных работ',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 68,
            'priceId'                           => 9,
            'isNew'                             => true
        ),
        Constants::DEMONTAZH_POLOV_CPU           => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::DEMONTAZH_POLOV,
            'reviewsServiceTitle'               => Constants::DEMONTAZH_POLOV,
            'adminPanelReviewsFormInput_usluga' => Constants::DEMONTAZH_POLOV,
            'cpu'                               => Constants::DEMONTAZH_POLOV_CPU,
            'metaTitle'                         => 'Демонтаж полов в #нас-пункт-пп#. Паркет, ламинат, плитка',
            'metaDescription'                   => 'Осуществляем демонтаж полов в #нас-пункт-пп#. Заказать демонтаж паркета, ламината, плитки, бетонной стяжки недорого.',
            'h1'                                => 'Демонтаж полов (паркет, ламинат, плитка) в #нас-пункт-пп#',
            'titlePrice'                        => 'Цены на демонтаж полов в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото демонтажа полов',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 69,
            'priceId'                           => 10,
            'isNew'                             => true
        ),
        Constants::DEMONTAZH_KVARTIRY_CPU        => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::DEMONTAZH_KVARTIRY,
            'reviewsServiceTitle'               => Constants::DEMONTAZH_KVARTIRY,
            'adminPanelReviewsFormInput_usluga' => Constants::DEMONTAZH_KVARTIRY,
            'cpu'                               => Constants::DEMONTAZH_KVARTIRY_CPU,
            'metaTitle'                         => 'Демонтаж квартиры в #нас-пункт-пп# недорого',
            'metaDescription'                   => 'Компания «ДомПереездов» оказывает услуги демонтажа квартиры в #нас-пункт-пп# недорого.',
            'h1'                                => 'Демонтаж квартиры в #нас-пункт-пп# недорого',
            'titlePrice'                        => 'Цены на демонтаж квартиры в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото демонтажа квартиры',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 70,
            'priceId'                           => 11,
            'isNew'                             => true
        ),
        Constants::DEMONTAZH_DOMA_CPU            => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::DEMONTAZH_DOMA,
            'reviewsServiceTitle'               => Constants::DEMONTAZH_DOMA,
            'adminPanelReviewsFormInput_usluga' => Constants::DEMONTAZH_DOMA,
            'cpu'                               => Constants::DEMONTAZH_DOMA_CPU,
            'metaTitle'                         => 'Демонтаж дома в #нас-пункт-пп# недорого',
            'metaDescription'                   => 'Компания «ДомПереездов» выполняет демонтаж домов в #нас-пункт-пп# недорого.',
            'h1'                                => 'Демонтаж дома в #нас-пункт-пп# недорого',
            'titlePrice'                        => 'Цены на демонтаж дома в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото демонтажа дома',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 71,
            'priceId'                           => 12,
            'isNew'                             => true
        ),
        Constants::DEMONTAZH_DVEREY_CPU          => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::DEMONTAZH_DVEREY,
            'reviewsServiceTitle'               => Constants::DEMONTAZH_DVEREY,
            'adminPanelReviewsFormInput_usluga' => Constants::DEMONTAZH_DVEREY,
            'cpu'                               => Constants::DEMONTAZH_DVEREY_CPU,
            'metaTitle'                         => 'Демонтаж дверей в #нас-пункт-пп# недорого',
            'metaDescription'                   => 'Компания «ДомПереездов» выполнит демонтаж дверей (межкомнатные, входные, балконные) в #нас-пункт-пп# недорого.',
            'h1'                                => 'Демонтаж дверей (межкомнатные, входные, балконные) в #нас-пункт-пп#',
            'titlePrice'                        => 'Цены на демонтаж дверей в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото демонтажа дверей',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 72,
            'priceId'                           => 13,
            'isNew'                             => true
        ),
        Constants::DEMONTAZH_STEN_CPU            => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::DEMONTAZH_STEN,
            'reviewsServiceTitle'               => Constants::DEMONTAZH_STEN,
            'adminPanelReviewsFormInput_usluga' => Constants::DEMONTAZH_STEN,
            'cpu'                               => Constants::DEMONTAZH_STEN_CPU,
            'metaTitle'                         => 'Демонтаж стен в #нас-пункт-пп# недорого',
            'metaDescription'                   => 'Демонтаж стен в #нас-пункт-пп# недорого. Выполним демонтаж (слом) стен (кирпич, штукатурка, гипсокартон).',
            'h1'                                => 'Демонтаж стен в #нас-пункт-пп# недорого',
            'titlePrice'                        => 'Цены на демонтаж стен в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото демонтажа стен',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 73,
            'priceId'                           => 14,
            'isNew'                             => true
        ),
        Constants::DEMONTAZH_VANNOY_CPU          => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::DEMONTAZH_VANNOY,
            'reviewsServiceTitle'               => Constants::DEMONTAZH_VANNOY,
            'adminPanelReviewsFormInput_usluga' => Constants::DEMONTAZH_VANNOY,
            'cpu'                               => Constants::DEMONTAZH_VANNOY_CPU,
            'metaTitle'                         => 'Демонтаж ванной в #нас-пункт-пп# недорого',
            'metaDescription'                   => 'Демонтаж ванной в #нас-пункт-пп# недорого. Выполним демонтаж в ванной комнате (ванна, джакузи, душевая кабина).',
            'h1'                                => 'Демонтаж ванной в #нас-пункт-пп# недорого',
            'titlePrice'                        => 'Цены на демонтаж ванной в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото демонтажа ванной',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 74,
            'priceId'                           => 15,
            'isNew'                             => true
        ),
        Constants::DEMONTAZH_SANTEHKABINY_CPU    => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::DEMONTAZH_SANTEHKABINY,
            'reviewsServiceTitle'               => Constants::DEMONTAZH_SANTEHKABINY,
            'adminPanelReviewsFormInput_usluga' => Constants::DEMONTAZH_SANTEHKABINY,
            'cpu'                               => Constants::DEMONTAZH_SANTEHKABINY_CPU,
            'metaTitle'                         => 'Демонтаж сантехкабины в #нас-пункт-пп# недорого',
            'metaDescription'                   => 'Демонтаж сантехкабины в #нас-пункт-пп# недорого. Выполним демонтаж перегородок в сантехкабине (гипс, кирпич).',
            'h1'                                => 'Демонтаж сантехкабины в #нас-пункт-пп# недорого',
            'titlePrice'                        => 'Цены на демонтаж сантехкабины в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото демонтажа сантехкабины',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 75,
            'priceId'                           => 16,
            'isNew'                             => true
        ),
        Constants::DEMONTAZH_MEBELI_CPU          => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE,
            'russianName'                       => Constants::DEMONTAZH_MEBELI,
            'reviewsServiceTitle'               => Constants::DEMONTAZH_MEBELI,
            'adminPanelReviewsFormInput_usluga' => Constants::DEMONTAZH_MEBELI,
            'cpu'                               => Constants::DEMONTAZH_MEBELI_CPU,
            'metaTitle'                         => 'Демонтаж мебели в #нас-пункт-пп# недорого',
            'metaDescription'                   => 'Компания «ДомПереездов» выполнит демонтаж мебели в #нас-пункт-пп# недорого.',
            'h1'                                => 'Демонтаж мебели в #нас-пункт-пп# недорого',
            'titlePrice'                        => 'Цены на демонтаж мебели в #нас-пункт-пп#',
            'titleGallery'                      => 'Фото демонтажа мебели',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 76,
            'priceId'                           => 17,
            'isNew'                             => true
        ),
        Constants::HYUNDAI_PORTER_CPU            => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE_WITH_CAR,
            'russianName'                       => Constants::HYUNDAI_PORTER,
            'reviewsServiceTitle'               => Constants::HYUNDAI_PORTER,
            'adminPanelReviewsFormInput_usluga' => Constants::HYUNDAI_PORTER,
            'cpu'                               => Constants::HYUNDAI_PORTER_CPU,
            'metaTitle'                         => 'Грузоперевозки Хёндай Портер #нас-пункт-ип#',
            'metaDescription'                   => 'Компания «ДомПереездов» предлагает Хёндай Портер грузоподъёмностью 1 тонна для перевозки и доставки грузов в #нас-пункт-пп#.',
            'h1'                                => 'Грузоперевозки Хёндай Портер #нас-пункт-ип#',
            'titlePrice'                        => 'Цены на грузоперевозки Хёндай Портером в #нас-пункт-пп#',
            'titleGallery'                      => 'Другие автомобили',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 77,
            'carId'                             => 10,
            'isNew'                             => true
        ),
        Constants::GAZEL_STANDART_CPU            => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE_WITH_CAR,
            'russianName'                       => Constants::GAZEL_STANDART,
            'reviewsServiceTitle'               => Constants::GAZEL_STANDART,
            'adminPanelReviewsFormInput_usluga' => Constants::GAZEL_STANDART,
            'cpu'                               => Constants::GAZEL_STANDART_CPU,
            'metaTitle'                         => 'Грузоперевозки на Газели 3 метра #нас-пункт-ип#',
            'metaDescription'                   => 'Компания «ДомПереездов» предоставит стандартную Газель 3 метра на 1,5 тонны для перевозки и доставки грузов в #нас-пункт-пп#.',
            'h1'                                => 'Грузоперевозки на Газели 3 метра #нас-пункт-ип#',
            'titlePrice'                        => 'Цены на грузоперевозки Газелью 3 метра в #нас-пункт-пп#',
            'titleGallery'                      => 'Другие автомобили',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 78,
            'carId'                             => 11,
            'isNew'                             => true
        ),
        Constants::GAZEL_UDLINYONNAYA_CPU        => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE_WITH_CAR,
            'russianName'                       => Constants::GAZEL_UDLINYONNAYA,
            'reviewsServiceTitle'               => Constants::GAZEL_UDLINYONNAYA,
            'adminPanelReviewsFormInput_usluga' => Constants::GAZEL_UDLINYONNAYA,
            'cpu'                               => Constants::GAZEL_UDLINYONNAYA_CPU,
            'metaTitle'                         => 'Грузоперевозки на Газели 4 метра #нас-пункт-ип#',
            'metaDescription'                   => 'Компания «ДомПереездов» предлагает удлинённую Газель 4 метра на 1,5 тонны для перевозки и доставки грузов в #нас-пункт-пп#.',
            'h1'                                => 'Грузоперевозки на Газели 4 метра #нас-пункт-ип#',
            'titlePrice'                        => 'Цены на грузоперевозки удлинённой Газелью 4 метра в #нас-пункт-пп#',
            'titleGallery'                      => 'Другие автомобили',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 79,
            'carId'                             => 12,
            'isNew'                             => true
        ),
        Constants::ZIL_BYCHOK_CPU                => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE_WITH_CAR,
            'russianName'                       => Constants::ZIL_BYCHOK,
            'reviewsServiceTitle'               => Constants::ZIL_BYCHOK,
            'adminPanelReviewsFormInput_usluga' => Constants::ZIL_BYCHOK,
            'cpu'                               => Constants::ZIL_BYCHOK_CPU,
            'metaTitle'                         => 'Грузоперевозки ЗИЛ ""Бычок"" #нас-пункт-ип#',
            'metaDescription'                   => 'Компания «ДомПереездов» предлагает автомобили ЗИЛ на 3 тонны для перевозки и доставки грузов в #нас-пункт-пп#.',
            'h1'                                => 'Грузоперевозки ЗИЛ ""Бычок"" 3 тонны #нас-пункт-ип#',
            'titlePrice'                        => 'Цены на грузоперевозки ЗИЛом в #нас-пункт-пп#',
            'titleGallery'                      => 'Другие автомобили',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 80,
            'carId'                             => 13,
            'isNew'                             => true
        ),
        Constants::PYATITONNIK_CPU               => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE_WITH_CAR,
            'russianName'                       => Constants::PYATITONNIK,
            'reviewsServiceTitle'               => Constants::PYATITONNIK,
            'adminPanelReviewsFormInput_usluga' => Constants::PYATITONNIK,
            'cpu'                               => Constants::PYATITONNIK_CPU,
            'metaTitle'                         => 'Грузоперевозки 5 тонн #нас-пункт-ип#',
            'metaDescription'                   => 'Компания «ДомПереездов» предлагает грузовые автомобили 5 тонн: Iveco Eurocargo, Mercedes Atego для перевозки и доставки грузов в #нас-пункт-пп#.',
            'h1'                                => 'Грузоперевозки 5 тонн #нас-пункт-ип#',
            'titlePrice'                        => 'Цены на грузоперевозки пятитонником в #нас-пункт-пп#',
            'titleGallery'                      => 'Другие автомобили',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 81,
            'carId'                             => 14,
            'isNew'                             => true
        ),
        Constants::SEMITONNIK_CPU                => array(
            'pageType'                          => Constants::PAGE_TYPE_SERVICE_WITH_CAR,
            'russianName'                       => Constants::SEMITONNIK,
            'reviewsServiceTitle'               => Constants::SEMITONNIK,
            'adminPanelReviewsFormInput_usluga' => Constants::SEMITONNIK,
            'cpu'                               => Constants::SEMITONNIK_CPU,
            'metaTitle'                         => 'Грузоперевозки 7 тонн #нас-пункт-ип#',
            'metaDescription'                   => 'Компания «ДомПереездов» предлагает грузовики на 7 тонн: MAN, ЗИЛ, Foton для перевозки и доставки грузов в #нас-пункт-пп#.',
            'h1'                                => 'Грузоперевозки 7 тонн #нас-пункт-ип#',
            'titlePrice'                        => 'Цены на грузоперевозки семитонником в #нас-пункт-пп#',
            'titleGallery'                      => 'Другие автомобили',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 82,
            'carId'                             => 15,
            'isNew'                             => true
        ),

        // Из Москвы в Б
        Constants::GRUZOPEREVOZKI_IZ_MOSKVY_CPU  => array(
            'pageType'                          => Constants::PAGE_TYPE_MOSCOW_TO_B_CONNECTED,
            'russianName'                       => Constants::GRUZOPEREVOZKI_IZ_MOSKVY,
            'reviewsServiceTitle'               => Constants::GRUZOPEREVOZKI_IZ_MOSKVY,
            'adminPanelReviewsFormInput_usluga' => Constants::GRUZOPEREVOZKI_IZ_MOSKVY,
            'cpu'                               => Constants::GRUZOPEREVOZKI_IZ_MOSKVY_CPU,
            'metaTitle'                         => 'Недорогие перевозки из Москвы в различные населённые пункты',
            'metaDescription'                   => 'Грузовые перевозки из Москвы в различные населённые пункты срочно и дешево с «ДомПереездов»',
            'h1'                                => 'Недорогие перевозки из Москвы в различные населённые пункты',
            'titlePrice'                        => '',
            'titleGallery'                      => '',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'serviceLink'                       => '/moskva/gruzoperevozki-moskva-'
        ),
        Constants::PEREEZDY_IZ_MOSKVY_CPU        => array(
            'pageType'                          => Constants::PAGE_TYPE_MOSCOW_TO_B_CONNECTED,
            'russianName'                       => Constants::PEREEZDY_IZ_MOSKVY,
            'reviewsServiceTitle'               => Constants::PEREEZDY_IZ_MOSKVY,
            'adminPanelReviewsFormInput_usluga' => Constants::PEREEZDY_IZ_MOSKVY,
            'cpu'                               => Constants::PEREEZDY_IZ_MOSKVY_CPU,
            'metaTitle'                         => 'Недорогие переезды из Москвы в разные населённые пункты',
            'metaDescription'                   => 'Компания «ДомПереездов» осуществляет недорогие переезды с грузчиками из Москвы в различные населённые пункты.',
            'h1'                                => 'Недорогие переезды из Москвы в разные населённые пункты',
            'titlePrice'                        => '',
            'titleGallery'                      => '',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'serviceLink'                       => '/moskva/pereezdy-moskva-'
        ),
        Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU => array(
            'pageType'                          => Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE_WITH_CAR,
            'russianName'                       => Constants::GRUZOPEREVOZKI_MOSKVA_XXX,
            'reviewsServiceTitle'               => Constants::GRUZOPEREVOZKI_MOSKVA_XXX,
            'adminPanelReviewsFormInput_usluga' => Constants::GRUZOPEREVOZKI_MOSKVA_XXX,
            'cpu'                               => Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU,
            'metaTitle'                         => 'Грузоперевозки из Москвы в #нас-пункт-вп#, перевозка и доставка грузов недорого',
            'metaDescription'                   => 'Грузовые перевозки из Москвы в #нас-пункт-вп# срочно и дешево с «ДомПереездов»',
            'h1'                                => 'Грузоперевозки из Москвы в #нас-пункт-вп#, перевозка и доставка грузов недорого',
            'titlePrice'                        => 'Цены на грузоперевозки из Москвы в #нас-пункт-вп#',
            'titleGallery'                      => 'Фото машин для грузоперевозок',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 59,
            'cars_withoutLink'                  => true,
        ),
        Constants::PEREEZDY_MOSKVA_XXX_CPU       => array(
            'pageType'                          => Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE,
            'russianName'                       => Constants::PEREEZDY_MOSKVA_XXX,
            'reviewsServiceTitle'               => Constants::PEREEZDY_MOSKVA_XXX,
            'adminPanelReviewsFormInput_usluga' => Constants::PEREEZDY_MOSKVA_XXX,
            'cpu'                               => Constants::PEREEZDY_MOSKVA_XXX_CPU,
            'metaTitle'                         => 'Квартирный и дачный переезд из Москвы в #нас-пункт-вп#',
            'metaDescription'                   => 'Компания «ДомПереездов» осуществляет недорогие квартирные и дачные переезды с грузчиками из Москвы в #нас-пункт-вп#.',
            'h1'                                => 'Квартирный и дачный переезд из Москвы в #нас-пункт-вп#',
            'titlePrice'                        => 'Цены на переезд из Москвы в #нас-пункт-вп#',
            'titleGallery'                      => 'Фото машин для переездов',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'galleryId'                         => 63,
            'priceId'                           => 18
        ),

        'default' => array(
            'pageType'                          => Constants::PAGE_TYPE_TOWN,
            'cpu'                               => '', // автогенерация
            'galleryId'                         => 62,
            'russianName'                       => '', // автозаполнение
            'metaTitle'                         => '! Недорогие грузоперевозки, переезды квартир, офисов и дач, вывоз мебели и техники на утилизацию, перевозка пианино в #нас-пункт-пп#',
            'metaDescription'                   => '! Компания «ДомПереездов» предлагает недорогие, но при этом качественные транспортные услуги в #нас-пункт-пп#. Кроме того к Вашим услугам бригады опытных грузчиков и такелажников.',
            'h1'                                => '! Недорогие транспортные услуги в #нас-пункт-пп#',
            'titlePrice'                        => '',
            'titleSimilarServices'              => Constants::SIMILAR_SERVICES_2,
            'titleGallery'                      => Constants::TITLE_GALLERY_1,
            'reviewsServiceTitle'               => Constants::TRANSPORTNIE_USLUGI,
            'adminPanelReviewsFormInput_usluga' => Constants::TRANSPORTNIE_USLUGI
        ),
    );


    /**
     * PageServices constructor.
     */
    public function __construct() {
        parent::__construct();

        // Конвертируем таблицу услуг в объект для удобства
        // Без этого половина работать не будет
        self::$servicesTable = (object)self::$servicesTable;
        foreach (self::$servicesTable as &$service) {
            $service = (object)$service;
        }
    }


    /**
     * Возвращает страницу по ее urlPath
     * @param $urlPath
     * @return mixed
     */
    private function getPageByUrlPath($urlPath) {
        $urlPath = Core::charsDecode($urlPath);
        $sql = "SELECT
                    *
                FROM
                    pages
                WHERE
                    public = 1 
                    AND cpu_path = '$urlPath'";
        $smf = Database::query($sql, 'withCountFetch');
        if ($smf->rowCount <= 0) Page::view404();
        return (object)$smf->result;
    }


    /**
     * Заменяет некоторые словосочетания на ссылки
     * @param $page
     * @return string
     */
    private function replaceWordsInTextOnLinks($page) {
        $keys = ['top_text', 'bottom_text'];
        foreach ($keys as $key) {
            $page->$key = mb_str_replace('реальных отзывов клиентов', '<a href="/otzyvy/">реальных отзывов клиентов</a>', $page->$key);
            $page->$key = mb_str_replace('сотни отзывов реальных клиентов', '<a href="/otzyvy/">сотни отзывов реальных клиентов</a>', $page->$key);
            $page->$key = mb_str_replace('рассказали в отзывах', '<a href="/otzyvy/">рассказали в отзывах</a>', $page->$key);
            $page->$key = mb_str_replace('отзывах реальных заказчиков', '<a href="/otzyvy/">отзывах реальных заказчиков</a>', $page->$key);
            $page->$key = mb_str_replace('сотни заказчиков, оставивших отзыв', '<a href="/otzyvy/">сотни заказчиков, оставивших отзыв</a>', $page->$key);
            $page->$key = mb_str_replace('сотни отзывов реальных заказчиков', '<a href="/otzyvy/">сотни отзывов реальных заказчиков</a>', $page->$key);
            $page->$key = mb_str_replace('пишут в отзывах сотни реальных клиентов', '<a href="/otzyvy/">пишут в отзывах сотни реальных клиентов</a>', $page->$key);
            $page->$key = mb_str_replace('сотнями отзывов наших клиентов', '<a href="/otzyvy/">сотнями отзывов наших клиентов</a>', $page->$key);
            $page->$key = mb_str_replace('многочисленными отзывами', '<a href="/otzyvy/">многочисленными отзывами</a>', $page->$key);

            // 04.03.2020 Добавляем новые якоря
            $page->$key = mb_str_replace('пишут об этом в отзывах', '<a href="/otzyvy/">пишут об этом в отзывах</a>', $page->$key);
            $page->$key = mb_str_replace('сотни реальных отзывов наших заказчиков', '<a href="/otzyvy/">сотни реальных отзывов наших заказчиков</a>', $page->$key);
        }
        return $page;
    }

    /**
     * Получает тексты по ID страницы
     * @param $pageId
     * @param $table
     * @return array|mixed
     */
    private function getTextsByPageID($pageId, $table) {
        $sql = "SELECT 
                    top_text, 
                    bottom_text 
                FROM 
                    $table
                WHERE 
                    page_id = $pageId";
        $texts = (object)Database::query($sql, 'fetch');
        // Декодируем тексты и обрабатываем их
        foreach ($texts as &$text) {
            $text = Core::charsDecode($text);
        }
        return $texts;
    }


    /**
     * Получаем дополнительные параметры из массива self::$servicesTable
     * @return string
     */
    private function getAdditionalFields() {
        // Получаем самый последний элемент в ссылке
        // https://dp.local/moskovskaya-oblast/pavlovo-posadskiy-rayon/pavlovskiy-posad/perevozka-pianino/
        // он - это ключ массива в self::$servicesTable
        $serviceInUrl = end(Core::getUrl()->uriParts);

        // 01.03.2020 Делаем так, потому что архитектура не подразумевала
        // страницы Из Москвы в Б. И сделать это по другому будет затратно по времени
        if ($serviceInUrl == '') {
            // Связующие страницы из Москвы в Б
            if (Core::getUrl()->action == Constants::GRUZOPEREVOZKI_IZ_MOSKVY_CPU) {
                $serviceInUrl = Constants::GRUZOPEREVOZKI_IZ_MOSKVY_CPU;
            }

            if (Core::getUrl()->action == Constants::PEREEZDY_IZ_MOSKVY_CPU) {
                $serviceInUrl = Constants::PEREEZDY_IZ_MOSKVY_CPU;
            }

            // Старница услуги из Москвы в Б
            if (substr_count(Core::getUrl()->action, Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU) == 1) {
                $serviceInUrl = Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU;
            }

            if (substr_count(Core::getUrl()->action, Constants::PEREEZDY_MOSKVA_XXX_CPU) == 1) {
                $serviceInUrl = Constants::PEREEZDY_MOSKVA_XXX_CPU;
            }
        }

        foreach (self::$servicesTable as $service => $serviceData) {
            if ($serviceInUrl == trim($service)) {
                return $serviceData;
            }
        }
        return self::$servicesTable->default;
    }


    /**
     * Возвращает массив из Услуг для этого населенного пункта
     * @param $pageId
     * @return array
     */
    private function getSimilarServices($pageId) {
        $sql = "
            SELECT 
                name,
                cpu_path
            FROM 
                pages 
            WHERE 
                parent_id = $pageId
                AND public = 1
            ORDER BY
                id";
        $services = Database::query($sql, 'withCount');
        if ($services->rowCount > 0) {
            foreach ($services->result as &$service) {
                $service = (object)$service;
                $service->link = $service->cpu_path;

                // Получаем русское название услуги из self::$servicesTable
                $uriParths = explode('/', $service->link);
                // удаляем последний слеш / (он будет всегда! Так настроен .htaccess)
                array_pop($uriParths);
                // Получаем cpu услуги
                $serviceKey = end($uriParths);
                $service->title = self::$servicesTable->$serviceKey->russianName;

                // Для правильной установки названия услуги в списке "ДРУГИЕ УСЛУГИ"
                // на странице услуги из Москвы в Б, нужно сравнивать вхождение в строку,
                // так как полноценного cpu-path не возможно получить
                if (substr_count($serviceKey, Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU) == 1) {
                    $serviceKey = Constants::GRUZOPEREVOZKI_MOSKVA_XXX_CPU;
                    $service->title = self::$servicesTable->$serviceKey->russianName;
                }

                if (substr_count($serviceKey, Constants::PEREEZDY_MOSKVA_XXX_CPU) == 1) {
                    $serviceKey = Constants::PEREEZDY_MOSKVA_XXX_CPU;
                    $service->title = self::$servicesTable->$serviceKey->russianName;
                }
            }
            return $services->result;
        } else {
            return array();
        }
    }


    /**
     * Возвращает массив населенных пунктов
     * @param $pageId
     * @return array
     */
    private function getChildTowns($pageId) {
        $sql = "
            SELECT 
                name,
                cpu_path
            FROM 
                pages 
            WHERE 
                parent_id = $pageId
                AND public = 1
            ORDER BY
                type, name";
        $towns = Database::query($sql, 'withCount');
        if ($towns->rowCount > 0) {
            foreach ($towns->result as &$town) {
                $town = (object)$town;
                $town->title = mb_ucfirst(str_replace([' ', ' '], ' ', $town->name));
                $town->link = $town->cpu_path;
                $town->type = Constants::PAGE_TYPE_TOWN;
            }
            return $towns->result;
        } else {
            return array();
        }
    }


    /**
     * Возвращает массив склоненных имен родителя
     * @param $parentId
     * @return object
     */
    private function getParentTownNames($parentId) {
        $sql = "
            SELECT 
                name,
                p_ro,
                p_da,
                p_ve,
                p_tv,
                p_pr,
                etnohoronim_mn_p_da,
                zn_1,
                zn_2,
                zn_3,
                zn_4,
                zn_5,
                zn_6,
                zn_7,
                distance_from_moscow,
                prenadlezhnost1,
                tip_np_iz_a_v_b
            FROM 
                pages 
            WHERE 
                id = $parentId
                AND public = 1
            ORDER BY
                id";
        $page = Database::query($sql, 'fetch');
        return (object)$page;
    }


    /**
     * Возвращает населенные пункты для списка Москва в Б
     * @param $partType
     * @return array|mixed
     */
    function getTownsByPart_moscowToB($partType) {
        $sql = "
            SELECT 
                id, name, cpu
            FROM 
                pages 
            WHERE 
                part_type = '" . $partType . "'
                AND type = '" . Constants::TYPE_TOWN . "'
                AND public = 1
            ORDER BY
                name";
        $towns = Database::query($sql);

        if ($towns) {
            foreach ($towns as &$town) {
                $town = (object)$town;
            }
        }

        return $towns;
    }

    /**
     * Делает первую букву заглавной в текстах стараницы
     * @param $page
     * @return mixed
     */
    private function setUCFirstInTexts($page) {
        $page->top_text = mb_ucfirst(trim($page->top_text));
        $page->bottom_text = mb_ucfirst(trim($page->bottom_text));
        return $page;
    }

    /**
     * @param $page
     * @return mixed
     */
    private function replaceWordsInTextToNames($page) {
        $keys = [
            'top_text', 'bottom_text', 'name', 'town_start_admin_name',
            'russianName', 'reviewsServiceTitle', 'adminPanelReviewsFormInput_usluga',
            'metaTitle', 'metaDescription', 'h1', 'titlePrice', 'titleGallery',
            'titleSimilarServices'
        ];
        foreach ($keys as $key) {
            $page->$key = mb_str_replace('#нас-пункт-ип#', $page->name, $page->$key);
            $page->$key = mb_str_replace('#нас-пункт-рп#', $page->p_ro, $page->$key);
            $page->$key = mb_str_replace('#нас-пункт-дп#', $page->p_da, $page->$key);
            $page->$key = mb_str_replace('#нас-пункт-вп#', $page->p_ve, $page->$key);
            $page->$key = mb_str_replace('#нас-пункт-тп#', $page->p_tv, $page->$key);
            $page->$key = mb_str_replace('#нас-пункт-пп#', $page->p_pr, $page->$key);

            $page->$key = mb_str_replace('#нас-пункт-пи#', $page->name, $page->$key);
            $page->$key = mb_str_replace('#нас-пункт-пр#', $page->p_ro, $page->$key);
            $page->$key = mb_str_replace('#нас-пункт-пд#', $page->p_da, $page->$key);
            $page->$key = mb_str_replace('#нас-пункт-пв#', $page->p_ve, $page->$key);
            $page->$key = mb_str_replace('#нас-пункт-пт#', $page->p_tv, $page->$key);
            $page->$key = mb_str_replace('#нас-пункт-пп#', $page->p_pr, $page->$key);

            $page->$key = mb_str_replace('#name#', $page->name, $page->$key);

            $page->$key = mb_str_replace('#prenadlezhnost1#', $page->prenadlezhnost1, $page->$key);
            $page->$key = mb_str_replace('#tip_np_iz_a_v_b#', $page->tip_np_iz_a_v_b, $page->$key);

            $page->$key = mb_str_replace('#p_ro#', $page->p_ro, $page->$key);
            $page->$key = mb_str_replace('#p_da#', $page->p_da, $page->$key);
            $page->$key = mb_str_replace('#p_ve#', $page->p_ve, $page->$key);
            $page->$key = mb_str_replace('#p_tv#', $page->p_tv, $page->$key);
            $page->$key = mb_str_replace('#p_pr#', $page->p_pr, $page->$key);

            // Так как нет в БД значений для всех переменных с with_type, заменяем их вместо
            //    $page->$key = mb_str_replace('#p_ro_with_type#', $page->p_ro_with_type, $page->$key);
            // на
            $page->$key = mb_str_replace('#p_ro_with_type#', $page->p_ro, $page->$key);
            $page->$key = mb_str_replace('#p_da_with_type#', $page->p_da, $page->$key);
            $page->$key = mb_str_replace('#p_ve_with_type#', $page->p_ve, $page->$key);
            $page->$key = mb_str_replace('#p_tv_with_type#', $page->p_tv, $page->$key);
            $page->$key = mb_str_replace('#p_pr_with_type#', $page->p_pr, $page->$key);

            $page->$key = mb_str_replace('#zn_1#', $page->zn_1, $page->$key);
            $page->$key = mb_str_replace('#zn_2#', $page->zn_2, $page->$key);
            $page->$key = mb_str_replace('#zn_3#', $page->zn_3, $page->$key);
            $page->$key = mb_str_replace('#zn_4#', $page->zn_4, $page->$key);
            $page->$key = mb_str_replace('#zn_5#', $page->zn_5, $page->$key);
            $page->$key = mb_str_replace('#zn_6#', $page->zn_6, $page->$key);
            $page->$key = mb_str_replace('#zn_7#', $page->zn_7, $page->$key);
            $page->$key = mb_str_replace('#etnohoronim_mn_p_da#', $page->etnohoronim_mn_p_da, $page->$key);

            $page->$key = Page::replacePhones($page->$key);
        }
        return $page;
    }


    /**
     * Генерирует отзывы для левого блока по правилам
     * @param $page
     */
    private function setReviewsOnLeftBlock($page) {
        // В панеле управления должно быть так:
        //      Москва
        //          в панеле в списке только Москва и 4 города Москвы
        //          При выборе Москва - отзыв отобрашается на всех районах и округах Москвы
        //          в зависимости от услуги

        //      Московская область
        //          Все районы
        //          все нас пункты (иерархически)

        switch ($page->page_type) {
            case Constants::PAGE_TYPE_TOWN:
                // ЭТО РАБОТАЕТ ТОЛЬКО ДЛЯ МОСКВЫ
                // В МОСКВЕ ВООБЩН ВСЕ С ТИПОМ town, сделано было для удобства,
                // чтобы показывать сразу услуги
                // ведь у элементов МОСКВЫ нет дочерних элементов
                if ($page->id >= 10000) {
                    switch ($page->type) {
                        // ДЛЯ ЦАО и РАЙОНОВ
                        case 'okrug':
                        case 'raion':
                            $this->buildReviewsOnLeftBlock(array(
                                'townId'                     => 10000,
                                Constants::PAGE_TYPE_SERVICE => Constants::TRANSPORTNIE_USLUGI
                            ));
                            break;
                        // ДЛЯ ГОРОДОВ (4 штуки)
                        case Constants::PAGE_TYPE_TOWN:
                            $this->buildReviewsOnLeftBlock(array(
                                'townId'                     => $page->id,
                                Constants::PAGE_TYPE_SERVICE => Constants::TRANSPORTNIE_USLUGI
                            ));
                            break;
                    }
                }

                // ЭТО РАБОТАЕТ ТОЛЬКО НА МОСКОВСКОЙ ОБЛАСТИ
                if ($page->id < 10000) {
                    $this->buildReviewsOnLeftBlock(array(
                        'townId'                     => $page->id,
                        Constants::PAGE_TYPE_SERVICE => Constants::TRANSPORTNIE_USLUGI
                    ));
                }
                break;

            case Constants::PAGE_TYPE_CONNECTED:
                // ЭТО РАБОТАЕТ ТОЛЬКО НА МОСКОВСКОЙ ОБЛАСТИ
                // Транспортные услуги :
                // Если выбрана Москва - Это связующая страница connected везде + страница контента (+) /services/transportnye-uslugi/
                // Если выбрана МО - на страницу только на https://dp.local/moskovskaya-oblast/
                // Если выбран нас. пункт МО - то на его страницу connected
                // Если выбран район МО - то на его страницу connected
                $this->buildReviewsOnLeftBlock(array(
                    'townId'                     => $page->id,
                    Constants::PAGE_TYPE_SERVICE => Constants::TRANSPORTNIE_USLUGI
                ));
                break;

            case Constants::PAGE_TYPE_SERVICE:
            case 'service_with_type':
                // Показываем отзывы привязанные к родителю (так как мы на услуге, а нам нужен нас. пункт)
                $townId = $page->parent_id;

                // ЭТО РАБОТАЕТ ТОЛЬКО ДЛЯ МОСКВЫ
                // Если это страница услуги любого населенного пункта Москвы
                if ($page->parent_id >= 10000) {
                    // значит показываем в этой услуги отзывы со ВСЕЙ Москвы
                    $townId = 10000;

                    // НО!
                    // Если это города Москвы (их всего 4), показываем отзывы именно этих городов
                    $parentPageType = Database::query("select type from pages where id = $page->parent_id", 'fetch');
                    if ($parentPageType['type'] == Constants::PAGE_TYPE_TOWN) {
                        $townId = $page->parent_id;
                    }
                }


                switch (Core::getUrl()->lastUriPart) {
                    // todo: Добавить сюда новые услуги. Переписать эту выборку
                    case Constants::GRUZOPEREVOZKI_CPU:
                        // Грузоперевозки
                        // Если выбрана Москва отображаются на главной странице (+) https://dp.local/
                        //      + на всех районах и округах Москвы
                        // Если выбран нас. пункт МО - то на его страницу
                        // Если выбран район МО - то на его страницу
                        $this->buildReviewsOnLeftBlock(array(
                            'townId'                     => $townId, // (+)
                            Constants::PAGE_TYPE_SERVICE => Constants::GRUZOPEREVOZKI
                        ));
                        break;

                    case Constants::KVARTIRNII_PEREEZD_CPU:
                    case Constants::OFISNII_PEREEZD_CPU:
                    case Constants::DACHNII_PEREEZD_CPU:
                        // Переезды (все услуги переездов)
                        // Если выбрана Москва отображаются на страницах контента: (+)
                        //      Квартирный переезд
                        //      Офисный переезд
                        //      Дачный переезд
                        // + на всех районах и округах Москвы
                        //  Если выбран нас. пункт МО - то на его страницу
                        //  Если выбран район МО - то на его страницу
                        $this->buildReviewsOnLeftBlock(array(
                            'townId'                     => $townId, // (+ на всех районах и округах Москвы)
                            Constants::PAGE_TYPE_SERVICE => Constants::PEREEZDI
                        ));
                        break;

                    case Constants::VIVOZ_MEBELI_CPU:
                        // Вывоз мебели
                        // Если выбрана Москва контент (+) Вывоз старой мебели
                        // + на всех районах и округах Москвы
                        //  Если выбран нас. пункт МО - то на его страницу
                        //  Если выбран район МО - то на его страницу
                        $this->buildReviewsOnLeftBlock(array(
                            'townId'                     => $townId, // (+ на всех районах и округах Москвы)
                            Constants::PAGE_TYPE_SERVICE => Constants::VIVOZ_MEBELI
                        ));
                        break;

                    case Constants::PEREVOZKA_PIANINO_CPU:
                        // Перевозка пианино
                        // Если выбрана Москва контент (+) Перевозка пианино
                        // + на всех районах и округах Москвы
                        //  Если выбран нас. пункт МО - то на его страницу
                        //  Если выбран район МО - то на его страницу
                        $this->buildReviewsOnLeftBlock(array(
                            'townId'                     => $townId, // (+ на всех районах и округах Москвы)
                            Constants::PAGE_TYPE_SERVICE => Constants::PEREVOZKA_PIANINO
                        ));
                        break;

                    case Constants::GRUZOVOE_TAKSI_CPU:
                        // Грузовое такси
                        // Если выбрана Москва, на всех районах и округах Москвы
                        //  Если выбран нас. пункт МО - то на его страницу
                        //  Если выбран район МО - то на его страницу
                        $this->buildReviewsOnLeftBlock(array(
                            'townId'                     => $townId, // (+ на всех районах и округах Москвы)
                            Constants::PAGE_TYPE_SERVICE => Constants::GRUZOVOE_TAKSI
                        ));
                        break;

                    case Constants::PEREVOZKA_MEBELI_CPU:
                        // Певозка мебели
                        // Если выбрана Москва, контент Перевозка мебели
                        // + на всех районах и округах Москвы
                        //  Если выбран нас. пункт МО - то на его страницу
                        //  Если выбран район МО - то на его страницу
                        $this->buildReviewsOnLeftBlock(array(
                            'townId'                     => $townId, // (+ на всех районах и округах Москвы)
                            Constants::PAGE_TYPE_SERVICE => Constants::PEREVOZKA_MEBELI
                        ));
                        break;
                }
                break;
            default:
        }
    }

    private function prepareBreadcrumbs($page) {
        // todo: fix it
        $breadcrumbs = (object)Database::query("select 
                breadcrumb_ids,
                breadcrumb_paths,
                breadcrumb_names 
            from pages where id = $page->parent_id", 'fetch'); //

        //        $breadcrumbs->breadcrumb_ids .= '*'.$page->id;

        $breadcrumbs->breadcrumb_names = explode('*', $breadcrumbs->breadcrumb_names);
        $breadcrumbs->breadcrumb_paths = explode('*', $breadcrumbs->breadcrumb_paths);

        return (object)array_merge((array)$page, (array)$breadcrumbs);
    }

    /**
     * Возвращает html таблицы с посчитанными ценами в таблицах для
     * страницы Переезды из Москвы в Б
     * @param $tableType - тип таблицы ( (id)  или (id|price) )
     * @param $tableHtmlContent - html код таблицы с переменными
     * @param $allCars - массив со всеми автомобили из автопарка
     *          constants/common.php
     * @param $distance_from_moscow - расстояние от Москвы
     * @return mixed
     */
    private function calculatePricesInTableHtmlContent($tableType, $tableHtmlContent, $allCars, $distance_from_moscow) {
        // Делаем удобство Array[car_id] = (object)car
        $cars = [];
        foreach ($allCars as $car) {
            $cars[$car->id] = $car;
        }

        switch ($tableType) {
            // (id_машины)
            case Constants::TYPE_PRICE_TABLE__ONLY_CAR_ID:
                preg_match_all('/\(([0-9]{2})\)/', $tableHtmlContent, $vars);
                list($labels, $carIds) = $vars;

                foreach ($labels as $key => $text) {
                    $carId = $carIds[$key];
                    $carPrice_KM_outside_city = end($cars[$carId]->attributes)->intValue;
                    $carPrice = reset($cars[$carId]->attributes)->intValue;

                    $result = $distance_from_moscow * 2 * $carPrice_KM_outside_city + $carPrice;
                    $tableHtmlContent = str_replace($labels[$key], number_format($result, 0, '', ' ') . ' руб.', $tableHtmlContent);
                }
                break;

            // (id_машины|цена_грузчики)
            case Constants::TYPE_PRICE_TABLE__CAR_ID_WITH_PRICE:
                preg_match_all('/\(([0-9]{2})\|([0-9]+?)\)/', $tableHtmlContent, $vars);
                list($labels, $carIds, $prices) = $vars;

                foreach ($labels as $key => $text) {
                    $carId = $carIds[$key];
                    $carPrice = reset($cars[$carId]->attributes)->intValue;
                    $carPrice_KM_outside_city = end($cars[$carId]->attributes)->intValue;
                    $price = $prices[$key]; // Грузчики

                    $result = $distance_from_moscow * 2 * $carPrice_KM_outside_city + $carPrice + $price;
                    $tableHtmlContent = str_replace($labels[$key], number_format($result, 0, '', ' ') . ' руб.', $tableHtmlContent);
                }
                break;
        }


        return $tableHtmlContent;
    }


    /**
     * Отображаем страницу
     */
    public function view() {
        parent::view();

        $page = $this->getPageByUrlPath(Core::getUrl()->urlPath);
        $texts = $this->getTextsByPageID($page->id, 'pages_texts');
        $additionalFilelds = $this->getAdditionalFields();

        core::log($page);
        core::log($additionalFilelds);

        // Соединяем все подготовленное в общий объект
        $page = (object)array_merge((array)$page, (array)$texts);
        $page = (object)array_merge((array)$page, (array)$additionalFilelds);

        // 20.02.2020 Выключаем карты навседа
        // Core::getSmarty()->assign('carsForMap', Cars::getCarsJsonForYandexMap());

        if (!empty($page->galleryId)) {
            Core::getSmarty()->assign('photogallery', Photogallery::getImagesByGallaryId($page->galleryId));
        }


        // Если нам нужно показать прайс, получаем его из БД
        if ($page->priceId) {
            Core::getSmarty()->assign('price', Prices::getPriceById($page->priceId));
        }

        switch ($page->page_type) {
            case Constants::PAGE_TYPE_SERVICE_WITH_CAR:
            case Constants::PAGE_TYPE_SERVICE:
            case Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE:
            case Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE_WITH_CAR:
                // Так как это дочерняя страница - услуга, чтобы нам узнать имя этого населенного пункта,
                // получаем родителя (так как нас. пункт это родитель страницы услуги в БД)
                // и для удобства, заменяем в объекте $page данные некоторых ключей, на данные ключей объекта,
                // что получила функция getParentTownNames()
                // (ключи у $page и объекта возвращаемого getParentTownNames() одинаковые)
                $page = (object)array_merge((array)$page, (array)$this->getParentTownNames($page->parent_id));
                break;
        }

        switch ($page->page_type) {
            case Constants::PAGE_TYPE_SERVICE_WITH_CAR:
            case Constants::PAGE_TYPE_SERVICE:
                // Дополнительные услуги для списка услуг (используя parent_id)
                Core::getSmarty()->assign('similarServices', $this->getSimilarServices($page->parent_id));

                // Получаем все машины
                $cars = Cars::getCars();

                // Если нам нужны только некоторые машины, фильтруем их
                // $page->cars_onlyId всегда содержит массив из id
                if ($page->cars_onlyId) {
                    $carsOnly = $page->cars_onlyId;
                    $cars = array_filter($cars, function ($item) use ($carsOnly) {
                        // Конвертируем символы в описании
                        $item->description = core::charsDecode($item->description);

                        // Если эта нужная нам машина, оставляем ее
                        foreach ($carsOnly as $needCarId) {
                            if ($item->id == $needCarId) return $item;
                        }
                        return false;
                    });
                }
                Core::getSmarty()->assign('cars', $cars);
                break;

            // Todo какого хуя я так сделал? Все равно проверяется page_type!
            //  Нарушение принципов чистого кода!
            //  Разнести условия на case
            case Constants::PAGE_TYPE_CONNECTED:
            case Constants::PAGE_TYPE_TOWN:
                if ($page->page_type == Constants::PAGE_TYPE_CONNECTED) {
                    // На странице районов и областей Вместо услуг в списке выводим СПИСОК НАСЕЛЕННЫХ ПУНКТОВ
                    Core::getSmarty()->assign('similarServices', $this->getChildTowns($page->id));
                } else {
                    // Дополнительные услуги для списка услуг
                    Core::getSmarty()->assign('similarServices', $this->getSimilarServices($page->id));
                }
                break;
            case Constants::PAGE_TYPE_MOSCOW_TO_B_CONNECTED:
                // Устанавливаем ссылку для города (так как страницы connected могут быть разных услуг)
                // serviceLink указана прямо в self::serviceTable и встраивается в $page через функцию
                Core::getSmarty()->assign('serviceLink', $page->serviceLink);
                Core::getSmarty()->assign('towns', $this->getTownsByPart_moscowToB(Constants::PART_MOSCOW_TO_B));
                break;

        }

        // Middleware
        $page = $this->replaceWordsInTextToNames($page);
        $page = $this->replaceWordsInTextOnLinks($page);
        $page = $this->setUCFirstInTexts($page);


        // Эти свойства в шаблоне берутся из $page напрямую
        //        if ($page->breadcrumb_names) {
        ////            $page->breadcrumb_names = explode('*', $page->breadcrumb_names);
        ////            $page->breadcrumb_paths = explode('*', $page->breadcrumb_paths);
        ////            array_pop($page->breadcrumb_names);
        ////            array_pop($page->breadcrumb_paths);
        //        } else {
        //            $page = $this->prepareBreadcrumbs($page);
        //        }
        $page = $this->prepareBreadcrumbs($page);

        // Обновляем хлебные крошки, добавляя название страницы в конец
        $this->updateBreadcrumb($page);


        //        core::log($page->breadcrumb_ids);
        //        core::log($page->breadcrumb_paths);
        //        core::log($page->breadcrumb_names);

        // Обязательно делаем это после Middleware
        switch ($page->page_type) {
            case Constants::PAGE_TYPE_SERVICE_WITH_CAR:
                // Получаем вообще все машины
                $cars = Cars::getCars();

                // Добавляем название города в назавние всех машин
                foreach ($cars as &$car) {
                    $car->name = $car->name . ' в ' . $page->p_da;
                }

                // Это Id той машины, о которой страницы
                $generalCarId = $page->carId;

                // Фильтруем все машины и получаем машину, о которой страница
                $generalCar = current(array_filter(
                    $cars,
                    function ($item) use ($generalCarId) {
                        return $item->id == $generalCarId;
                    }));


                // Фильтруем все машины и получаем все остальные машины,
                // без машины о которой страница
                $carsWithoutGeneralCar = array_filter(
                    $cars,
                    function ($item) use ($generalCarId) {
                        return ($item->id != $generalCarId);
                    });

                // Меняем ссылки у машин по умолчанию (в раздел Автопарк) на ссылки,
                // которые принадлежат услугам текущего города
                // Например: moskovskaya-oblast/balashiha/hyundai-porter/
                //           moskovskaya-oblast/balashiha/semitonnik/
                $carsWithoutGeneralCar = array_map(
                    function ($item) use ($page) {
                        $needService = null;

                        // Нам нужно найти услугу с типом service_with_car
                        // и carId = какой нибудь из этого массива машин
                        foreach (self::$servicesTable as $key => $service) {
                            if ($service->carId == $item->id && $service->pageType == Constants::PAGE_TYPE_SERVICE_WITH_CAR) {
                                $needService = $service;
                            }
                        }

                        // Начинаем собирать новую ссылку на машину
                        // Получаем последний элемет массива ссылок города, он всегда без услуги в конце
                        $left = end($page->breadcrumb_paths);
                        // Услуга, которую мы нашли по совпадению id машины содержит нужный нам cpu
                        // ВНИМАНИЕ! cpu машины и cpu усулуги могут не совпадать!
                        $right = $needService->cpu;

                        $item->cpu_path = $left . $right . '/';
                        return $item;
                    }, $carsWithoutGeneralCar);

                Core::getSmarty()->assign('cars', $carsWithoutGeneralCar);
                Core::getSmarty()->assign('generalCar', $generalCar);
                break;
            case Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE_WITH_CAR:
                // Получаем все машины
                $cars = Cars::getCars();

                // Делаем расчет по формуле на ценах машин
                foreach ($cars as &$car) {
                    $carPrice = reset($car->attributes)->intValue;
                    $carPrice_KM_outside_city = end($car->attributes)->intValue;
                    // Удаляем характеристику 'Выезд за город', ее отображать не нужно
                    $pop = array_pop($car->attributes);

                    $result = $page->distance_from_moscow * 2 * $carPrice_KM_outside_city + $carPrice;
                    echo $result;
                    $car->attributes['Цена']->intValue = $result;
                    $car->attributes['Цена']->value = number_format($result, 0, '', ' ') . ' руб';
                }

                Core::getSmarty()->assign('cars', $cars);
                break;

            case Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE:
                // Считаем цены в таблицах с переменными на
                if ($page->priceId) {
                    // Получаем все машины
                    $cars = Cars::getCars();

                    // Таблицы считывается из БД выше, так как не только на этой странице
                    // есть таблицы с ценами
                    $table = Core::getSmarty()->tpl_vars['price']->value;

                    // Посчитаем цены в таблице с переменными вида: (id_машины)
                    $table->content = $this->calculatePricesInTableHtmlContent(
                        Constants::TYPE_PRICE_TABLE__CAR_ID_WITH_PRICE, $table->content, $cars, $page->distance_from_moscow);

                    // Посчитаем цены в таблице с переменными вида: (id_машыны|цена)
                    $table->content = $this->calculatePricesInTableHtmlContent(
                        Constants::TYPE_PRICE_TABLE__ONLY_CAR_ID, $table->content, $cars, $page->distance_from_moscow);

                    // Обновим таблицу в шаблонизаторе
                    Core::getSmarty()->assign('price', $table);
                }
                break;

            default:
                break;
        }

        // Формируем отзывы слева в блоке
        $this->setReviewsOnLeftBlock($page);

        // 20.02.2020 Карты отключили навсегда
        // Core::getSmarty()->assign('mapPath', str_replace('*', ',', $page->breadcrumb_names));

        Core::getSmarty()->assign('page', $page);
        // Все meta берутся из массива $servicesTable (заменяются из $additionalFilelds)
        Core::getSmarty()->assign('metaTitle', $page->metaTitle);
        Core::getSmarty()->assign('metaDescription', $page->metaDescription);
        Core::getSmarty()->assign('metaKeywords', $page->metaKeywords);
        // end Middleware

        switch ($page->page_type) {
            case Constants::PAGE_TYPE_SERVICE:
                Core::getSmarty()->display('mskServicesPage__service.tpl');
                break;
            case Constants::PAGE_TYPE_SERVICE_WITH_CAR:
                Core::getSmarty()->display('mskServicesPage__service_with_car.tpl');
                break;
            case Constants::PAGE_TYPE_CONNECTED:
            case Constants::PAGE_TYPE_TOWN:
                Core::getSmarty()->display('mskServicesPage__default.tpl');
                break;

            // Москва в Б
            case Constants::PAGE_TYPE_MOSCOW_TO_B_CONNECTED:
                Core::getSmarty()->display('mskServicesPage__mskToB__default.tpl');
                break;
            case Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE_WITH_CAR:
            case Constants::PAGE_TYPE_MOSCOW_TO_B_SERVICE:
                // Получаем Другие услуги
                Core::getSmarty()->assign('similarServices', $this->getSimilarServices($page->parent_id));

                Core::getSmarty()->display('mskServicesPage__mskToB__service.tpl');
                break;
        }
    }
}