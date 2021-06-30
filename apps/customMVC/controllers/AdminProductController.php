<?php

/**
 * Контроллер AdminProductController
 * Управление товарами в админпанели
 */
class AdminProductController extends AdminBase
{

    /**
     * Action для страницы "Управление товарами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список товаров
        $productsList = Product::getProductsListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function actionCreate()
    {

        self::checkAdmin();

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];



            $errors = false;

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {

                $id = Product::createProduct($options);


                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                };

                header("Location: /admin/product");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function actionUpdate($id)
    {

        self::checkAdmin();

        $langList = Language::getLanguageListAdmin();

        $product = Product::getProductById($id);

        $productList = Product::findProductContent($id);





        // Подключаем вид
        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Product::deleteProductById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }


    public function actionGetProductContent()
    {
        self::checkAdmin();

        header("Cache-Control: no-store");
        header("Content-Type: text/html; charset=utf-8");


        $content = $_POST;


       $result = Product::getProductContentById($content);

        if($result){
            $error["name"] = "ok";
            exit(json_encode($content));
        }else{
            $error["name"] = "error";
            exit(json_encode($content));
        }
    }


    public function actionGetProductContentInfo()
    {
        self::checkAdmin();

        header("Cache-Control: no-store");
        header("Content-Type: text/html; charset=utf-8");


        $param['lang'] = $_POST['lang'];
        $param['product_id'] = $_POST['productId'];

        $result = Product::getProductContentInfo($param);

        if($result){
            $error["name"] = "ok";
            exit(json_encode($result));
        }else{
            $error["name"] = "error";
            exit(json_encode($result));
        }
    }

}
