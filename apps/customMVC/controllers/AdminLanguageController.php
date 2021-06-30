<?php

/**
 * Контроллер AdminLanguageController
 * Управление языками в админпанели
 */
class AdminLanguageController extends AdminBase
{
    /**
     * Action для страницы "Управление языками"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $languageList = Language::getLanguageListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_language/index.php');
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
            $shortName = $_POST['short_name'];
            $status = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните название';
            }
            if (!isset($shortName) || empty($shortName)) {
                $errors[] = 'Заполните код языка';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Language::createLanguage($name, $shortName, $status);

                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/language");
            }
        }

        require_once(ROOT . '/views/admin_language/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать язык"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $language = Language::getLanguageById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $shortName = $_POST['short_name'];
            $status = $_POST['status'];

            // Сохраняем изменения
            Language::updateLanguageById($id, $name, $shortName, $status);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/language");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_language/update.php');
        return true;
    }
    /**
     * Action для страницы "Удалить язык"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Language::deleteLanguageById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/language");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_language/delete.php');
        return true;
    }


}