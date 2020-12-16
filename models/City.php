<?php

namespace app\models;

/**
 * City.
 */
class City extends \yii\base\Model
{
    public static $cities = [
        1 => 'Москва',
        2 => 'Екатеринбург',
        3 => 'Санкт-Петербург',
    ];

    public function getCitiesStaff()
    {
        $data = [];
        foreach (self::$cities as $key => $city) {
            $data[$key]['name'] = $city;
            $data[$key]['data'] = [];
        }

        $staff = Staff::find()->asArray()->all();
        foreach ($staff as $item) {
            $data[$item['city_id']]['data'][] = $item['fullname'];
        }

        return $data;
    }
}
