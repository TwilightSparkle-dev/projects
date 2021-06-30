<?php

return array(

    // Товар:
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
    // Каталог:
    'catalog' => 'catalog/index', // actionIndex в CatalogController
    // Категория товаров:
    // Корзина:
    'cart/checkout' => 'cart/checkout', // actionAdd в CartController    
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController    
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController    
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
    'cart' => 'cart/index', // actionIndex в CartController
    // Пользователь:


    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'user/changeLanguage/([A-z]+)' => 'user/changeLanguage/$1', // actionChangeLanguage в UserController




    'admin/default/update/([0-9]+)' => 'adminDefault/update/$1',
    'admin/default' => 'adminDefault/index',
    // Custom page
    'admin/custompage/content/([0-9]+)' => 'adminCustompage/content/$1',
    'admin/custompage/delete/([0-9]+)' => 'adminCustompage/delete/$1',
    'admin/custompage/update/([0-9]+)' => 'adminCustompage/update/$1',
    'admin/custompage/create' => 'adminCustompage/create',
    'admin/custompage' => 'adminCustompage/index',



    // Управление сайтом
    //'admin/task/holding/([0-9]+)' => 'adminTask/holdingContent/$1',
    'admin/task/know/content/get' => 'adminTask/getKnowLangContent',
    'admin/task/know/multilangcontent' => 'adminTask/updateKnowLangContent',
    'admin/task/know' => 'adminTask/changeKnow',


    'admin/task/holding/content/get' => 'adminTask/getHoldingLangContent',
    'admin/task/holding/multilangcontent' => 'adminTask/updateHoldingLangContent',
    'admin/task/holding' => 'adminTask/changeHolding',


    'admin/task/home/content/get' => 'adminTask/getHomeLangContent',
    'admin/task/home/multilangcontent' => 'adminTask/updateHomeLangContent',
    'admin/task/home' => 'adminTask/changeHome',


    'admin/task/head/content/get' => 'adminTask/getHeadLangContent',
    'admin/task/head/multilangcontent' => 'adminTask/updateHeadLangContent',
    'admin/task/head' => 'adminTask/changeHeader',
    'admin/task' => 'adminTask/index',



    // Управление языками:
    'admin/language/create' => 'adminLanguage/create',
    'admin/language/update/([0-9]+)' => 'adminLanguage/update/$1',
    'admin/language/delete/([0-9]+)' => 'adminLanguage/delete/$1',
    'admin/language' => 'adminLanguage/index',


    // Управление товарами:
    'admin/product/get/content/update' => 'adminProduct/getProductContentInfo',
    'admin/product/content/update' => 'adminProduct/getProductContent',
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    // Управление категориями:    
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    'admin/page' => 'adminTask/page',
    'admin/pagecreate' => 'adminTask/pagecreate',


    // Управление заказами:    
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    // Админпанель:
    'admin' => 'admin/index',
    // О магазине
    'game' => 'site/game',
    'contacts' => 'site/contact',
    'about' => 'site/about',
    'holding' => 'site/holding',
    'production' => 'site/production',
    'buy' => 'site/buy',
    'shop' => 'site/shop',
    'know' => 'site/know',
    'dealers' => 'site/dealers',
    'standards' => 'site/standards',
    'contact' => 'site/contact',
    'card' => 'site/card',
    'thankyou' => 'site/thankyou',
    //Главная страница
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
);
