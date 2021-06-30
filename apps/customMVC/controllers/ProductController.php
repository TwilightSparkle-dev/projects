<?php

/**
 * Контроллер ProductController
 * Товар
 */
class ProductController
{

    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionView($productId)
    {
        $productImgName = '/include/content/products/img/product_img-'.$productId.'.jpg';
        // Получаем инфомрацию о товаре
        $product = Product::getProductById($productId);
        define('title_page', $product['meta_title']);



        require_once(ROOT . "/include/content/products/static/$_SESSION[language].php");

        require_once(ROOT . '/views/layouts/header.php');
        //View
        require_once(ROOT . '/views/site/card.php');
        //Footer
        require_once(ROOT . '/views/layouts/footer.php');
        return true;
    }

}
