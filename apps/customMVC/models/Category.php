<?php

/**
 * Класс Category - модель для работы с категориями товаров
 */
class Category
{

    /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    public static function getCategoriesList()
    {
        // Соединение с БД
        Db::getConnection();

        // Запрос к БД

        $result = R::findLike('category', array(
            'status' => array('1')));



        // Получение и возврат результатов
        $i = 0;
        $categoryList = array();
        foreach ($result as $row) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * Возвращает массив категорий для списка в админпанели <br/>
     * (при этом в результат попадают и включенные и выключенные категории)
     * @return array <p>Массив категорий</p>
     */
    public static function getCategoriesListAdmin()
    {
        // Соединение с БД
        //Db::getConnection();

        // Запрос к БД
        $result = R::findAll('category');

        // Получение и возврат результатов
        $categoryList = array();
        $i = 0;
        foreach ($result as $row) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteCategoryById($id)
    {
        // Соединение с БД


        // Текст запроса к БД
        $result = R::findOne('category', $id);

       if($result){
           R::trash($result);
           return true;
       } else{
           return false;
       }
    }

    /**
     * Редактирование категории с заданным id
     * @param integer $id <p>id категории</p>
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД
        $result = R::load('category', $id);

        if($result){
            $result->name = $name;
            $result->sortOrder = $sortOrder;
            $result->status = $status;

            R::store($result);
            return true;
        }else{
            return false;
        }

    }

    /**
     * Возвращает категорию с указанным id
     * @param integer $id <p>id категории</p>
     * @return mixed <p>Массив с информацией о категории</p>
     */
    public static function getCategoryById($id)
    {
        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД
        $result = R::load('category', $id);

        // Возвращаем данные
        return $result;
    }

    /**
     * Возвращает текстое пояснение статуса для категории :<br/>
     * <i>0 - Скрыта, 1 - Отображается</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

    /**
     * Добавляет новую категорию
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createCategory($name, $sortOrder, $status)
    {
        // Соединение с БД
        Db::getConnection();

        // Текст запроса к БД
        $result = R::dispense('category');

        if($result){
            $result->name = $name;
            $result->sortOrder = $sortOrder;
            $result->status = $status;

            R::store($result);
            return true;
        }else{
            return false;
        }
    }

}
