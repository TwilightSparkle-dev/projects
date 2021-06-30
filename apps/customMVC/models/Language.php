<?php
/**
 * Класс Language - модель для работы с языками
 */

class Language
{
    /**
     * Смена языка в сессии
     * @param int $short_name
     * @return mixed
     */
    public static function changeLanguage($short_name)
    {

        $_SESSION['language'] = $short_name;

        return $_SESSION['language'];
    }

    /**
     * Возвращает массив языков для списка на сайте
     * @return array <p>Массив с языками</p>
     */
    public static function getLanguageList()
    {
        // Соединение с БД
        Db::getConnection();


        // Запрос к БД

        $result = R::findLike('language', array(
            'status' => array('1')));


        // Получение и возврат результатов
        $i = 0;
        $siteLanguageList = array();
        foreach ($result as $row) {
            $siteLanguageList[$i]['id'] = $row['id'];
            $siteLanguageList[$i]['name'] = $row['name'];
            $siteLanguageList[$i]['short_name'] = $row['short_name'];
            $i++;
        }
        return $siteLanguageList;
    }

    public static function getLanguageListAdmin()
    {
        Db::getConnection();

        // Запрос к БД
        $result = R::findAll('language');

        // Получение и возврат результатов
        $languageList = array();
        $i = 0;
        foreach ($result as $row) {
            $languageList[$i]['id'] = $row['id'];
            $languageList[$i]['name'] = $row['name'];
            $languageList[$i]['short_name'] = $row['short_name'];
            $languageList[$i]['status'] = $row['status'];
            $i++;
        }
        return $languageList;
    }

    /**
     * Возвращает текстое пояснение статуса для языка :<br/>
     * <i>0 - Скрыт, 1 - Отображается</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '2':
                return 'Админ режим';
                break;
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

    /**
     * Добавляет новый язык
     * @param string $name <p>Название</p>
     * @param integer $shortName <p>Код языка</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createLanguage($name, $shortName, $status)
    {
        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД
        $result = R::dispense('language');

        if ($result) {
            $result->name = $name;
            $result->shortName = $shortName;
            $result->status = $status;

            R::store($result);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Возвращает язык с указанным id
     * @param integer $id <p>id категории</p>
     * @return mixed <p>Массив с информацией о языке</p>
     */
    public static function getLanguageById($id)
    {
        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД
        $result = R::load('language', $id);

        // Возвращаем данные
        return $result;
    }

    /**
     * Редактирование языка с заданным id
     * @param integer $id <p>id языка</p>
     * @param string $name <p>Название</p>
     * @param integer $shortName <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateLanguageById($id, $name, $shortName, $status)
    {
        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД
        $result = R::load('language', $id);

        if ($result) {
            $result->name = $name;
            $result->shortName = $shortName;
            $result->status = $status;

            R::store($result);
            return true;
        } else {
            return false;
        }

    }

    /**
     * Удаляет язык с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteLanguageById($id)
    {
        // Соединение с БД


        // Текст запроса к БД
        $result = R::findOne('language', $id);

        if ($result) {
            R::trash($result);
            return true;
        } else {
            return false;
        }
    }

    public static function getHeadMultilang($lang, $param)
    {
        Db::getConnection();

        $langNow = R::findOne('language', 'id = ?', [$lang]);

        for($i = 1; $i <= 8; $i++){
            $result = R::load('headcontent', $i);
            $result->$langNow['short_name'] = $param["content_$i"];

            R::store($result);
        }
        $j = 1;
        for($i = 9; $i <= 30; $i++){
            $result = R::load('headcontent', $i);
            $result->$langNow['short_name'] = $param["popup_$j"];
            R::store($result);
            $j++;
        }

        return true;
    }
    public static function getHoldingMultilang($lang, $param)
    {
        Db::getConnection();

        $langNow = R::findOne('language', 'id = ?', [$lang]);

        for($i = 1; $i <= 37; $i++){
            $result = R::load('holdingcontent',  $i);
            $result->$langNow['short_name'] = $param["content_$i"];

            R::store($result);

        }
        return true;
    }
}

