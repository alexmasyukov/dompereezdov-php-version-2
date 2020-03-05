<?php

class Constants {
    // Типы таблиц для расчета цен на странице Переезды из Москвы в Б
    const TYPE_PRICE_TABLE__ONLY_CAR_ID = 'TYPE_PRICE_TABLE__ONLY_CAR_ID';
    const TYPE_PRICE_TABLE__CAR_ID_WITH_PRICE = 'TYPE_PRICE_TABLE__CAR_ID_WITH_PRICE';

    // Типы страниц
    const TYPE_OKRUG = 'okrug';
    const TYPE_RAION = 'raion';
    const TYPE_TOWN = 'town';
    const TYPE_SERVICE = 'service';

    const PAGE_TYPE_CONNECTED = 'connected';
    const PAGE_TYPE_TOWN = 'town';
    const PAGE_TYPE_SERVICE = 'service';
    const PAGE_TYPE_SERVICE_WITH_CAR = 'service_with_car';

    const PAGE_TYPE_MOSCOW_TO_B_CONNECTED = 'moscow_to_b_connected';
    const PAGE_TYPE_MOSCOW_TO_B_TOWN = self::TYPE_TOWN;
    const PAGE_TYPE_MOSCOW_TO_B_SERVICE = 'moscow_to_b_service';
    const PAGE_TYPE_MOSCOW_TO_B_SERVICE_WITH_CAR = 'moscow_to_b_service_with_car';

    // Типы разделов страниц
    const PART_MO = 'mo';
    const PART_MOSCOW = 'moscow';
    const PART_MOSCOW_TO_B = 'moscowToB';

    // Остальное
    const PEREEZDI = '! Переезды';
    const TRANSPORTNIE_USLUGI = '! Транспортные услуги';

    const TITLE_PRICE_1 = '! Цены на грузоперевозки';
    const TITLE_PRICE_2 = '! Цены на переезд';
    const SIMILAR_SERVICES_2 = '! Другие услуги';
    const TITLE_GALLERY_1 = '! Фото машин из нашего парка';

    // Услуги
    const GRUZOPEREVOZKI_CPU = 'gruzoperevozki';
    const GRUZOPEREVOZKI = '! Грузоперевозки';

    const VIVOZ_MEBELI_CPU = 'vyvoz-mebeli';
    const VIVOZ_MEBELI = '! Вывоз мебели ';

    const GRUZOVOE_TAKSI_CPU = 'gruzovoe-taksi';
    const GRUZOVOE_TAKSI = '! Грузовое такси';

    const KVARTIRNII_PEREEZD_CPU = 'kvartirnyj-pereezd';
    const KVARTIRNII_PEREEZD = '! Квартирный переезд';

    const DACHNII_PEREEZD_CPU = 'dachnyj-pereezd';
    const DACHNII_PEREEZD = '! Дачный переезд';

    const OFISNII_PEREEZD_CPU = 'ofisnyj-pereezd';
    const OFISNII_PEREEZD = '! Офисный переезд';

    const PEREVOZKA_MEBELI_CPU = 'perevozka-mebeli';
    const PEREVOZKA_MEBELI = '! Перевозка мебели';

    const PEREVOZKA_PIANINO_CPU = 'perevozka-pianino';
    const PEREVOZKA_PIANINO = '! Перевозка пианино';

    // Новые услуги 19.02.2020
    const VYVOZ_MUSORA_CPU = 'vyvoz-musora';
    const VYVOZ_MUSORA = 'Вывоз мусора';

    const ZAKAZAT_GAZEL_CPU = 'zakazat-gazel';
    const ZAKAZAT_GAZEL = 'Заказать Газель';

    const GRUZCHIKI_CPU = 'gruzchiki';
    const GRUZCHIKI = 'Грузчики';

    const DEMONTAZHNYE_RABOTY_CPU = 'demontazhnye-raboty';
    const DEMONTAZHNYE_RABOTY = 'Демонтажные работы';

    const DEMONTAZH_POLOV_CPU = 'demontazh-polov';
    const DEMONTAZH_POLOV = 'Демонтаж полов';

    const DEMONTAZH_KVARTIRY_CPU = 'demontazh-kvartiry';
    const DEMONTAZH_KVARTIRY = 'Демонтаж квартиры';

    const DEMONTAZH_DOMA_CPU = 'demontazh-doma';
    const DEMONTAZH_DOMA = 'Демонтаж дома';

    const DEMONTAZH_DVEREY_CPU = 'demontazh-dverey';
    const DEMONTAZH_DVEREY = 'Демонтаж дверей';

    const DEMONTAZH_STEN_CPU = 'demontazh-sten';
    const DEMONTAZH_STEN = 'Демонтаж стен';

    const DEMONTAZH_VANNOY_CPU = 'demontazh-vannoy';
    const DEMONTAZH_VANNOY = 'Демонтаж ванной';

    const DEMONTAZH_SANTEHKABINY_CPU = 'demontazh-santehkabiny';
    const DEMONTAZH_SANTEHKABINY = 'Демонтаж сантехкабины';

    const DEMONTAZH_MEBELI_CPU = 'demontazh-mebeli';
    const DEMONTAZH_MEBELI = 'Демонтаж мебели';

    const HYUNDAI_PORTER_CPU = 'hyundai-porter';
    const HYUNDAI_PORTER = 'Грузоперевозки Хёндай Портер';

    const GAZEL_STANDART_CPU = 'gazel-standart';
    const GAZEL_STANDART = 'Грузоперевозки на Газели 3 метра';

    const GAZEL_UDLINYONNAYA_CPU = 'gazel-udlinyonnaya';
    const GAZEL_UDLINYONNAYA = 'Грузоперевозки на удлинённой Газели';

    const ZIL_BYCHOK_CPU = 'zil-bychok';
    const ZIL_BYCHOK = 'Грузоперевозки Зил Бычок';

    const PYATITONNIK_CPU = 'pyatitonnik';
    const PYATITONNIK = 'Грузоперевозки 5 тонн';

    const SEMITONNIK_CPU = 'semitonnik';
    const SEMITONNIK = 'Грузоперевозки 7 тонн';

    // Из Москвы в Б, связующие страницы
    const GRUZOPEREVOZKI_IZ_MOSKVY_CPU = 'gruzoperevozki-iz-moskvy';
    const GRUZOPEREVOZKI_IZ_MOSKVY = 'Грузоперевозки из Москвы';

    const PEREEZDY_IZ_MOSKVY_CPU = 'pereezdy-iz-moskvy';
    const PEREEZDY_IZ_MOSKVY = 'Переезды из Москвы';

    // Из Москвы в Б, страницы услуг
    // Проверяются по частичному вхождению в PageMskServices->getAdditionalFields()
    //   потому что делать переписывать архитектуру не вариант
    const GRUZOPEREVOZKI_MOSKVA_XXX_CPU = 'gruzoperevozki-moskva-';
    const GRUZOPEREVOZKI_MOSKVA_XXX = 'Грузоперевозки из Москвы';

    const PEREEZDY_MOSKVA_XXX_CPU = 'pereezdy-moskva-';
    const PEREEZDY_MOSKVA_XXX = 'Переезды из Москвы';
}