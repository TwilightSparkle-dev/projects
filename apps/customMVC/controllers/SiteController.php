<?php

/**
 * Контроллер CartController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionCard()
    {




        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/card.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }
    public function actionGame()
    {


        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/game.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }



    public function actionContact()
    {




        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/contact.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }
    public function actionStandards()
    {

        require_once(ROOT . "/include/content/standarts/$_SESSION[language].php");
        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/standards.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }
    public function actionDealers()
    {


        $products = Product::getProductsList();

        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/dealers.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }
    public function actionKnow()
    {



        require_once(ROOT . "/include/content/know/$_SESSION[language].php");
        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/know.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }
    public function actionShop()
    {



        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $order = $_POST['product'];
            $type = $_POST['type'];
            $count = $_POST['count'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $name = $_POST['name'];

            // Флаг ошибок в форме
            $errors = false;


            if($order == ''){
                $errors = true;
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию

                $adminEmail = 'ukrmatinvest@gmail.com';
                $header = "Content-type: text/html; charset=utf-8 \r\n";
                $subject = 'IMPERATYV новый заказ';

                $message = 'email клиента: ' . $email . '<br>';
                $message .= 'Телефон клиента: ' . $phone . '<br>';
                $message .= 'Имя клиента: ' . $name . '<br>';
                $message .= 'Продукт: ' . $order . '<br>';
                $message .= 'Диаметр: ' . $type . ' <br>';
                $message .= 'Длинна : ' . $count . 'м.<br>';

                mail($adminEmail, $subject, $message, $header);

                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /thankyou");
            }

        }
        require_once(ROOT . "/include/content/shop/$_SESSION[language].php");
        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/shop.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }
    public function actionProduction()
    {


        $products = Product::getProductsList();

        require_once(ROOT . "/include/content/production/$_SESSION[language].php");
        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/production.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }


    public function actionThankyou()
    {





        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/thankyou.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }


    public function actionBuy()
    {



        require_once(ROOT . "/include/content/buy/$_SESSION[language].php");
        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/buy.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }
    public function actionHolding()
    {

        $holdContent = User::getHoldingContentUser($_SESSION['language']);

        require_once(ROOT . "/include/content/holding/$_SESSION[language].php");
        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/holding.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {

        $homeContent = User::getHomeContentUser($_SESSION['language']);

        require_once(ROOT . "/include/content/home/$_SESSION[language].php");
        //Header
        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/index.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');

        return true;
    }



    /**
     * Action для страницы "О магазине"
     */
    public function actionAbout()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/about.php');
        return true;
    }

}
