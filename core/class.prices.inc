<?php
/**
 * Created by PhpStorm.
 * User: Alexey Masyukov  a.masyukov@chita.ru
 * Date: 2020-02-22
 * Time: 02:04
 */

class Prices {
    /**
     * Получаем прайс по id
     * @param $id
     * @return object
     */
    public static function getPriceById($id) {
        $price = (object)Database::query("
                SELECT 
                    *
                FROM 
                    prices
                WHERE
                    id = $id
                    AND public = 1
            ", 'fetch');

        $price->content = Core::charsDecode($price->content);
        return $price;
    }
}


