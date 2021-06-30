<?php
/**
 * Класс Country - модель для работы со странами
 */

class Country
{
    public static function getCountryListAdmin()
    {
        // Соединение с БД
        //Db::getConnection();

        // Запрос к БД
        $result = R::findAll('country');


        // Получение и возврат результатов
        $countryList = array();
        $i = 0;
        foreach ($result as $row) {
            $countryList[$i]['id'] = $row['id'];
            $countryList[$i]['name'] = $row['name'];
            $countryList[$i]['default_language'] = $row['default_language'];
            $temp = Currency::getCurrencyById($row['currency_id']);
            $countryList[$i]['currency_id'] = $temp->name;
            $i++;
        }
        return $countryList;
    }

    /**
     * Добавляет новую страну
     * @param string $name <p>Название</p>
     * @param integer $default_language <p>Стандартный язык</p>
     * @param integer $currency_id <p>ID валюты</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createCountry($name, $default_language, $currency_id)
    {
        // Соединение с БД
        // Db::getConnection();

        // Текст запроса к БД
        $result = R::dispense('country');

        if($result){
            $result->name = $name;
            $result->default_language = $default_language;
            $result->currency_id = $currency_id;

            R::store($result);
            return true;
        }else{
            return false;
        }
    }

    /**
     * Редактирование страны с заданным id
     * @param integer $id <p>id страны</p>
     * @param string $name <p>Название</p>
     * @param integer $default_language <p>курс</p>
     * @param integer $currency_id <p>символ</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateCountryById($id, $name, $default_language, $currency_id)
    {
        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД
        $result = R::load('country', $id);

        if($result){
            $result->name = $name;
            $result->default_language = $default_language;
            $result->currency_id = $currency_id;

            R::store($result);
            return true;
        }else{
            return false;
        }

    }

    /**
     * Удаляет страну с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteCountryById($id)
    {

        // Текст запроса к БД
        $result = R::findOne('country', $id);

        if($result){
            R::trash($result);
            return true;
        } else{
            return false;
        }
    }


    /**
     * Возвращает страну с указанным id
     * @param integer $id <p>id страны</p>
     * @return mixed <p>Массив с информацией о стране</p>
     */
    public static function getCountryById($id)
    {
        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД
        $result = R::load('country', $id);

        // Возвращаем данные
        return $result;
    }
}