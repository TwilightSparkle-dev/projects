<?php

/**
 * Класс Product - модель для работы с товарами
 */
class Product
{

    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    /**
     * Возвращает массив последних товаров
     * @param type $count [optional] <p>Количество</p>
     * @param type $page [optional] <p>Номер текущей страницы</p>
     * @return array <p>Массив с товарами</p>
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД
        $result = R::findLike('product',array(
            'status' => array('1')));


        // Получение и возврат результатов
        $i = 0;
        $productsList = array();
        foreach ($result as $row) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];

            $i++;
        }
        return $productsList;
    }


    public static function createProduct($options)
    {
        // Соединение с БД
        Db::getConnection();

        $result = R::dispense('product');

        $result->name = $options['name'];

        R::store($result);

        return true;
    }

    public static function getProductContentById($content)
    {
        Db::getConnection();

        $result = R::findOrCreate('productcontent', [
            'lang' => $content['lang'],
            'product_id' => $content['productId']
        ]);


        $result->status = $content['status'];
        $result->metaTitle = $content['metaTitle'];
        $result->metaDescription = $content['metaDescription'];
        $result->titleMini = $content['titleMini'];
        $result->title = $content['title'];
        $result->slogan = $content['slogan'];
        $result->shortDescription = $content['shortDescription'];
        $result->videoLink = $content['videoLink'];
        $result->titleTwo = $content['titleTwo'];
        $result->fullDescription = $content['fullDescription'];
        $result->secondSlogan = $content['secondSlogan'];
        $result->customHtml = $content['customHtml'];

        R::store($result);

        return true;
    }


    public static function getProductContentInfo($param)
    {
        Db::getConnection();

        $result = R::findLike('productcontent', [
            'product_id' => [$param['product_id']],
            'lang' => [$param['lang']]
        ]);

        $out = array();
        foreach($result as $row){
            $out['meta_title'] = $row['meta_title'];
            $out['meta_description'] = $row['meta_description'];
            $out['full_description'] = $row['full_description'];
            $out['custom_html'] = $row['custom_html'];
            $out['second_slogan'] = $row['second_slogan'];
            $out['short_description'] = $row['short_description'];
            $out['slogan'] = $row['slogan'];
            $out['status'] = $row['status'];
            $out['title'] = $row['title'];
            $out['title_mini'] = $row['title_mini'];
            $out['title_two'] = $row['title_two'];
            $out['video_link'] = $row['video_link'];
        }

        return $out;
    }




    /**
     * Возвращает список товаров в указанной категории
     * @param int $categoryId <p>id категории</p>
     * @param int $page [optional] <p>Номер страницы</p>
     * @return array <p>Массив с товарами</p>
     */
    public static function getProductsListByCategory($categoryId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        //Db::getConnection();

        // Текст запроса к БД

        $result = R::findLike('product',array(
            'status' => array('1')));


        // Получение и возврат результатов
        $i = 0;
        $products = array();
        foreach ($result as $row) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];

            $i++;
        }
        return $products;
    }

    /**
     * Возвращает продукт с указанным id
     * @param integer $id <p>id товара</p>
     * @return mixed <p>Массив с информацией о товаре</p>
     */
    public static function getProductById($id)
    {
        Db::getConnection();

        // Текст запроса к БД
        $result = R::findLike('productcontent', [
            'product_id' => [$id],
            'lang' => [$_SESSION['language']]
        ], 'LIMIT 1');

        $out = array();

        foreach ($result as $row){

            $out['id'] = $row['product_id'];
            $out['title_mini'] = $row['title_mini'];
            $out['title'] = $row['title'];
            $out['slogan'] = $row['slogan'];
            $out['short_description'] = $row['short_description'];
            $out['title_two'] = $row['title_two'];
            $out['full_description'] = $row['full_description'];
            $out['second_slogan'] = $row['second_slogan'];
            $out['custom_html'] = $row['custom_html'];
            $out['meta_title'] = $row['meta_title'];
            $out['status'] = $row['status'];
            $out['video_link'] = $row['video_link'];
        }

        return $out;

    }

    public static function findProductContent($id)
    {
        Db::getConnection();

        $result = R::find('productcontent', 'product_id = ?', [$id]);

        if($result){
            return $result;
        }else{
            return false;
        }

    }


    /**
     * Возвращаем количество товаров в указанной категории
     * @param integer $categoryId
     * @return integer
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        // Соединение с БД
       // $db = Db::getConnection();

        // Текст запроса к БД
        $result = R::findLike('product',array(
            'status' => array('1')));

        // Получение и возврат результатов
        $i = 0;

        foreach ($result as $row) {
            $i++;
        }
        return $i;
    }

    /**
     * Возвращает список товаров с указанными индентификторами
     * @param array $idsArray <p>Массив с идентификаторами</p>
     * @return array <p>Массив со списком товаров</p>
     */
    public static function getProdustsByIds($idsArray)
    {
        // Соединение с БД
        Db::getConnection();

        $find = R::findLike('product', array(
            'id' => $idsArray));


        $i = 0;
        $products = array();
        foreach ($find as $row) {
            if ($row['status'] == '1') {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['countbox'] = $row['countbox'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['min'] = $row['min'];
                $products[$i]['amount'] = $row['amount'];
                $i++;
            }
        }
        return $products;
    }

    /**
     * Возвращает список товаров
     * @return array <p>Массив с товарами</p>
     */

    public static function getProductsListMenu()
    {
        Db::getConnection();

        $result = R::findLike('productcontent', [
            'lang' => [$_SESSION['language']],
            'status' => [1]
        ]);

        $out = array();
        $i = 0;
        foreach ($result as $row){

            $out[$i]['id'] = $row['product_id'];
            $out[$i]['title_mini'] = $row['title_mini'];

            $i++;
        }

        return $out;
    }

    public static function getProductsList()
    {

        Db::getConnection();

        $result = R::findLike('productcontent', [
            'lang' => [$_SESSION['language']],
            'status' => [1]
        ]);

        $out = array();
        $i = 0;
        foreach ($result as $row){

            $out[$i]['id'] = $row['product_id'];
            $out[$i]['title_mini'] = $row['title_mini'];

            $i++;
        }

        return $out;

    }

    public static function getProductsListAdmin()
    {

        Db::getConnection();

        $result = R::findAll('product');

        $out = array();
        $i = 0;
        foreach ($result as $row){

            $out[$i]['id'] = $row['id'];
            $out[$i]['name'] = $row['name'];

            $i++;
        }

        return $out;

    }



    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function  getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/products/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

}
