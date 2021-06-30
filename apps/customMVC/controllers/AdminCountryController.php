<?php
/**
 * Контроллер AdminCountryController
 * Управление странами в админпанели
 */

class AdminCountryController extends AdminBase
{
    /**
     * Action для страницы "Управление странами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $countryList = Country::getCountryListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_country/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить страну"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $default_language = $_POST['default_language'];
            $currency_id = $_POST['currency_id'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните имя';
            }
            if (!isset($default_language) || empty($default_language)) {
                $errors[] = 'Заполните язык';
            }
            if (!isset($currency_id) || empty($currency_id)) {
                $errors[] = 'Заполните валюту';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую страну
                Country::createCountry($name, $default_language, $currency_id);

                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/country");
            }
        }

        require_once(ROOT . '/views/admin_country/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать страну"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной валюте
        $country = Country::getCountryById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $default_language = $_POST['default_language'];
            $currency_id = $_POST['currency_id'];

            // Сохраняем изменения
            Country::updateCountryById($id, $name, $default_language, $currency_id);

            // Перенаправляем пользователя на страницу управлениями валютами
            header("Location: /admin/country");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_country/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить страну"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Country::deleteCountryById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/country");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_country/delete.php');
        return true;
    }

}