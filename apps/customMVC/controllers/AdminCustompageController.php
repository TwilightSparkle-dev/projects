<?php
/**
 * Created by PhpStorm.
 * User: Twilight Sparkle
 * Date: 31.01.2019
 * Time: 15:54
 */

class AdminCustompageController extends AdminBase
{
    /**
     * Action для страницы "Управление языками"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        $custompageList = Custompage::getCustomPageList();


        // Подключаем вид
        require_once(ROOT . '/views/admin_custompage/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить язык"
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
            $status = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните название';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Custompage::createPage($name, $status);

                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/custompage");
            }
        }

        require_once(ROOT . '/views/admin_custompage/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $customPage = Custompage::getCustompageById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $status = $_POST['status'];

            // Сохраняем изменения
            Custompage::updateCustompageById($id, $name, $status);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/custompage");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_custompage/update.php');
        return true;
    }

    public function actionContent($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $langList = Language::getLanguageListAdmin();
        $customPage = Custompage::getCustompageById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $status = $_POST['status'];

            // Сохраняем изменения
            Custompage::updateCustompageById($id, $name, $status);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/custompage");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_custompage/content.php');
        return true;
    }



}