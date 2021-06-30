<?php

/**
 * Класс Currency - модель для работы с валютами
 */
class Currency
{
    /**
     * Возвращает массив валют для списка в админпанели <br/>
     * (при этом в результат попадают и включенные и выключенные валюты)
     * @return array <p>Массив валют</p>
     */
    public static function getCurrencyListAdmin()
    {
        // Соединение с БД
        //Db::getConnection();

        // Запрос к БД
        $result = R::findAll('currency');

        // Получение и возврат результатов
        $currencyList = array();
        $i = 0;
        foreach ($result as $row) {
            $currencyList[$i]['id'] = $row['id'];
            $currencyList[$i]['name'] = $row['name'];
            $currencyList[$i]['factor'] = $row['factor'];
            $currencyList[$i]['char'] = $row['char'];
            $i++;
        }
        return $currencyList;
    }

    /**
     * Добавляет новую валюту
     * @param string $name <p>Название</p>
     * @param integer $factor <p>Курс</p>
     * @param integer $char <p>Символ</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createCurrency($name, $factor, $char)
    {
        // Соединение с БД
       // Db::getConnection();

        // Текст запроса к БД
        $result = R::dispense('currency');

        if($result){
            $result->name = $name;
            $result->factor = $factor;
            $result->char = $char;

            R::store($result);
            return true;
        }else{
            return false;
        }
    }

    /**
     * Редактирование валюты с заданным id
     * @param integer $id <p>id валюты</p>
     * @param string $name <p>Название</p>
     * @param integer $factor <p>курс</p>
     * @param integer $char <p>символ</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateCurrencyById($id, $name, $factor, $char)
    {
        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД
        $result = R::load('currency', $id);

        if($result){
            $result->name = $name;
            $result->factor = $factor;
            $result->char = $char;

            R::store($result);
            return true;
        }else{
            return false;
        }

    }

    /**
     * Удаляет валюту с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteCurrencyById($id)
    {

        // Текст запроса к БД
        $result = R::findOne('currency', $id);

        if($result){
            R::trash($result);
            return true;
        } else{
            return false;
        }
    }


    /**
     * Возвращает валту с указанным id
     * @param integer $id <p>id валюты</p>
     * @return mixed <p>Массив с информацией о валюте</p>
     */
    public static function getCurrencyById($id)
    {
        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД
        $result = R::load('currency', $id);

        // Возвращаем данные
        return $result;
    }

}