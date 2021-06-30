<?php

/**
 * Контроллер AdminCategoryController
 * Управление категориями товаров в админпанели
 */
class AdminTaskController extends AdminBase
{

    /**
     * Action для страницы "Управление сайтами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        //Header
        require_once(ROOT . '/views/layouts/header_admin.php');
        //View
        require_once(ROOT . '/views/admin_site/index.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer_admin.php');
        return true;
    }

    /**
     *
     *
     *
     *
     *
     * Action для страницы "Управление Head"
     *
     *
     *
     *
     *
     */
    public function actionChangeHeader()
    {




        // Проверка доступа
        self::checkAdmin();

        $langList = Language::getLanguageListAdmin();



        //Header
        require_once(ROOT . '/views/layouts/header_admin.php');
        //View
        require_once(ROOT . '/views/admin_site/head.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer_admin.php');
        return true;
    }

    public function actionUpdateHeadLangContent()
    {

        self::checkAdmin();

        header("Cache-Control: no-store");
        header("Content-Type: text/html; charset=utf-8");


        $content = $_POST;


        $result = Task::updateHeadContent($content);

        if($result){
            $error["name"] = "ok";
            exit(json_encode($content));
        }else{
            $error["name"] = "error";
            exit(json_encode($content));
        }
    }

    public function actionGetHeadLangContent()
    {
        self::checkAdmin();

        header("Cache-Control: no-store");
        header("Content-Type: text/html; charset=utf-8");


        $param['lang'] = $_POST['lang'];


        $result = Task::getHeaderContentInfo($param);

        if($result){
            $error["name"] = "ok";
            exit(json_encode($result));
        }else{
            $error["name"] = "error";
            exit(json_encode($result));
        }
    }


    /**
     *
     *
     *
     *
     *
     * Action для страницы "Управление Home"
     *
     *
     *
     *
     *
     */
    public function actionChangeHome()
    {




        // Проверка доступа
        self::checkAdmin();

        $langList = Language::getLanguageListAdmin();



        //Header
        require_once(ROOT . '/views/layouts/header_admin.php');
        //View
        require_once(ROOT . '/views/admin_site/home.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer_admin.php');
        return true;
    }

    public function actionUpdateHomeLangContent()
    {

        self::checkAdmin();

        header("Cache-Control: no-store");
        header("Content-Type: text/html; charset=utf-8");


        $content = $_POST;


        $result = Task::updateHomeContent($content);

        if($result){
            $error["name"] = "ok";
            exit(json_encode($content));
        }else{
            $error["name"] = "error";
            exit(json_encode($content));
        }
    }
    public function actionGetHomeLangContent()
    {
        self::checkAdmin();

        header("Cache-Control: no-store");
        header("Content-Type: text/html; charset=utf-8");


        $param['lang'] = $_POST['lang'];


        $result = Task::getHomeContentInfo($param);

        if($result){
            $error["name"] = "ok";
            exit(json_encode($result));
        }else{
            $error["name"] = "error";
            exit(json_encode($result));
        }
    }



    /**
     *
     *
     *
     *
     *
     * Action для страницы "Управление Holding"
     *
     *
     *
     *
     *
     */
    public function actionChangeHolding()
    {




        // Проверка доступа
        self::checkAdmin();

        $langList = Language::getLanguageListAdmin();



        //Header
        require_once(ROOT . '/views/layouts/header_admin.php');
        //View
        require_once(ROOT . '/views/admin_site/holding.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer_admin.php');
        return true;
    }

    public function actionUpdateHoldingLangContent()
    {

        self::checkAdmin();

        header("Cache-Control: no-store");
        header("Content-Type: text/html; charset=utf-8");


        $content = $_POST;


        $result = Task::updateHomeContent($content);

        if($result){
            $error["name"] = "ok";
            exit(json_encode($content));
        }else{
            $error["name"] = "error";
            exit(json_encode($content));
        }
    }
    public function actionGetHoldingLangContent()
    {
        self::checkAdmin();

        header("Cache-Control: no-store");
        header("Content-Type: text/html; charset=utf-8");


        $param['lang'] = $_POST['lang'];


        $result = Task::getHomeContentInfo($param);

        if($result){
            $error["name"] = "ok";
            exit(json_encode($result));
        }else{
            $error["name"] = "error";
            exit(json_encode($result));
        }
    }


    /**
     *
     *
     *
     *
     *
     * Action для страницы "Управление know"
     *
     *
     *
     *
     *
     */
    public function actionChangeKnow()
    {




        // Проверка доступа
        self::checkAdmin();

        $langList = Language::getLanguageListAdmin();



        //Header
        require_once(ROOT . '/views/layouts/header_admin.php');
        //View
        require_once(ROOT . '/views/admin_site/know.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer_admin.php');
        return true;
    }

    public function actionUpdateKnowLangContent()
    {

        self::checkAdmin();

        header("Cache-Control: no-store");
        header("Content-Type: text/html; charset=utf-8");


        $content = $_POST;


        $result = Task::updateHomeContent($content);

        if($result){
            $error["name"] = "ok";
            exit(json_encode($content));
        }else{
            $error["name"] = "error";
            exit(json_encode($content));
        }
    }
    public function actionGetKnowLangContent()
    {
        self::checkAdmin();

        header("Cache-Control: no-store");
        header("Content-Type: text/html; charset=utf-8");


        $param['lang'] = $_POST['lang'];


        $result = Task::getHomeContentInfo($param);

        if($result){
            $error["name"] = "ok";
            exit(json_encode($result));
        }else{
            $error["name"] = "error";
            exit(json_encode($result));
        }
    }
















    public function actionHoldingContent($lang)
    {
        // Проверка доступа
        self::checkAdmin();

        $holdContent = User::getHoldingContent($lang);

        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы


            $param['content_1'] = $_POST['content_1'];
            $param['content_2'] = $_POST['content_2'];
            $param['content_3'] = $_POST['content_3'];
            $param['content_4'] = $_POST['content_4'];
            $param['content_5'] = $_POST['content_5'];
            $param['content_6'] = $_POST['content_6'];
            $param['content_7'] = $_POST['content_7'];
            $param['content_8'] = $_POST['content_8'];
            $param['content_9'] = $_POST['content_9'];
            $param['content_10'] = $_POST['content_10'];
            $param['content_11'] = $_POST['content_11'];
            $param['content_12'] = $_POST['content_12'];
            $param['content_13'] = $_POST['content_13'];
            $param['content_14'] = $_POST['content_14'];
            $param['content_15'] = $_POST['content_15'];
            $param['content_16'] = $_POST['content_16'];
            $param['content_17'] = $_POST['content_17'];
            $param['content_18'] = $_POST['content_18'];
            $param['content_19'] = $_POST['content_19'];
            $param['content_20'] = $_POST['content_20'];
            $param['content_21'] = $_POST['content_21'];
            $param['content_22'] = $_POST['content_22'];
            $param['content_23'] = $_POST['content_23'];
            $param['content_24'] = $_POST['content_24'];
            $param['content_25'] = $_POST['content_25'];
            $param['content_26'] = $_POST['content_26'];
            $param['content_27'] = $_POST['content_27'];
            $param['content_28'] = $_POST['content_28'];
            $param['content_29'] = $_POST['content_29'];
            $param['content_30'] = $_POST['content_30'];
            $param['content_31'] = $_POST['content_31'];
            $param['content_32'] = $_POST['content_32'];
            $param['content_33'] = $_POST['content_33'];
            $param['content_34'] = $_POST['content_34'];
            $param['content_35'] = $_POST['content_35'];
            $param['content_36'] = $_POST['content_36'];
            $param['content_37'] = $_POST['content_37'];

            Language::getHoldingMultilang($lang, $param);



            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/task");
        }


        //Header
        require_once(ROOT . '/views/layouts/header_admin.php');
        //View
        require_once(ROOT . '/views/admin_site/holding.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer_admin.php');
        return true;
    }

    public function actionPage()
    {
        // Проверка доступа
        self::checkAdmin();

        $pages = Task::getPageListAdmin();


        //Header
        require_once(ROOT . '/views/layouts/header_admin.php');
        //View
        require_once(ROOT . '/views/admin_site/pageList.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer_admin.php');
        return true;
    }


    /**
     * Action для страницы "Добавить товар"
     */
    public function actionPagecreate()
    {
        // Проверка доступа
        self::checkAdmin();


        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['ru_name'] = $_POST['ru_name'];
            $options['en_name'] = $_POST['en_name'];
            $options['uk_name'] = $_POST['uk_name'];
            $options['link'] = $_POST['link'];
            $options['status'] = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['ru_name']) || empty($options['ru_name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {

                // Добавляем новый товар
                Task::createPage($options);


                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/page");
            }
        }

        //Header
        require_once(ROOT . '/views/layouts/header_admin.php');
        //View
        require_once(ROOT . '/views/admin_site/pageCreate.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer_admin.php');
        return true;
    }
}