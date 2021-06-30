<?php

/**
 * Класс User - модель для работы с пользователями
 */
class User
{
    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return mixed : integer user id or false
     */
    public static function checkUserData($email, $password)
    {
        // Соединение с БД
        Db::getConnection();

        $user = R::findOne('users', 'email = ?', array($email));

        if ($user) {
            if ($password == $user->password){
                return $user['id'];
            } else {
                return false;
            }
        }
    }

    /**
     * Возвращает страну пользователя<br/>
     * Иначе дает ее
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function checkUserLanguage()
    {

        if(isset($_SESSION['language'])){
            return $_SESSION['language'];
        }else{
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

            if($lang == 'ru' || $lang == 'en' || $lang == 'uk'){
                $_SESSION['language'] = $lang;

                return $_SESSION['language'];
            }else{
                $_SESSION['language'] = 'en';
                return $_SESSION['language'];
            }
        }

    }


    public static function getPageList()
    {
        Db::getConnection();

        $allPages = R::findAll('page');

        $output = array();

        $i = 0;
        foreach ($allPages as $row){
            if($row["$_SESSION[language]_name"] != ''){
                $output[$i]['name'] = $row["$_SESSION[language]_name"];
                $output[$i]['link'] = $row['link'];
                $i++;
            }
        }
        return $output;
    }

    public static function getHeaderContent($lang)
    {

        Db::getConnection();

        $langNow = R::findOne('language', 'id = ?', [$lang]);

        $result = R::findAll('headcontent');

        $out = array();
        $i = 1;
        foreach ($result as $row){
            $out[$i] = $row[$langNow['short_name']];
            $i++;
        }

        return $out;
    }
    public static function getHoldingContent($lang)
    {

        Db::getConnection();

        $langNow = R::findOne('language', 'id = ?', [$lang]);

        $result = R::findAll('holdingcontent');

        $out = array();
        $i = 1;
        foreach ($result as $row){
            $out[$i] = $row[$langNow['short_name']];
            $i++;
        }

        return $out;
    }


    public static function getHeaderContentUser($lang)
    {
        Db::getConnection();

        $result = R::findOne('headercontent', 'lang = ?', [$lang]);

        return $result;
    }

    public static function getHomeContentUser($lang)
    {
        Db::getConnection();

        $result = R::findOne('homecontent', 'lang = ?', [$lang]);

        return $result;
    }










    public static function getHoldingContentUser($lang)
    {

        Db::getConnection();

        $result = R::findAll('holdingcontent');

        $out = array();
        $i = 1;
        foreach ($result as $row){
            $out[$i] = $row[$lang];
            $i++;
        }

        return $out;
    }


    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public static function auth($userId)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }

    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    /**
     * Проверяет является ли пользователь гостем
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }


    /**
     * Проверяет номер контракта спонсора: существует ли он
     * @param string $sponsor_number <p>Номер контракта спонсора</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkSponsorNumber($sponsor_number)
    {
        if ($sponsor_number == '') {
            return true;
        } else {
            // Соединение с БД
            Db::getConnection();

            if (R::count('users', "my_sponsor_number = ?", array($sponsor_number)) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     * @param string $name <p>Имя</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет пол
     * @param string $sex <p>Пол</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkSex($sex)
    {
        if ($sex == '') {
            return false;
        }
        return true;
    }

    /**
     * Проверяет дату рождения
     * @param string $birthday <p>Дата рождения</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkBirthday($birthday)
    {
        if ($birthday == '') {
            return false;
        }
        return true;
    }

    /**
     * Проверяет телефон: не меньше, чем 10 символов
     * @param string $phone <p>Телефон</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет не занят ли телефон другим пользователем
     * @param type $phone <p>Телефон</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPhoneExists($phone)
    {
        // Соединение с БД
        return true;
    }

    /**
     * Проверяет страну
     * @param string $country <p>Пол</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkCountry($country)
    {
        if ($country == '') {
            return false;
        }
        if (strlen($country) != 3) {
            return false;
        }
        return true;
    }

    /**
     * Проверяет город
     * @param string $city <p>Город</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkCity($city)
    {
        if ($city == '') {
            return false;
        }
        return true;
    }

    /**
     * Проверяет индекс
     * @param string $zip <p>индекс</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkZip($zip)
    {
        if ($zip == '') {
            return false;
        }
        return true;
    }

    /**
     * Проверяет улицу
     * @param string $street <p>улица</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkStreet($street)
    {
        if ($street == '') {
            return false;
        }
        return true;
    }

    /**
     * Проверяет дом
     * @param string $house <p>дом</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkHouse($house)
    {
        if ($house == '') {
            return false;
        }
        return true;
    }

    /**
     * Проверяет номер дома
     * @param string $number_house <p>Номер дома</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkNumberHouse($number_house)
    {
        if ($number_house == '') {
            return false;
        }
        return true;
    }

    /**
     * Проверяет email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет не занят ли email другим пользователем
     * @param type $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmailExists($email)
    {
        // Соединение с БД

        if (R::count('users', "email = ?", array($email)) > 0) {
            return false;
        }
        return true;
    }

    /**
     * Проверяет пароль: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет пароль на соответствие
     * @param string $password <p>Пароль</p>
     * @param string $password_confirm <p>Пароль повторно</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPasswordConfirm($password, $password_confirm)
    {
        if ($password == $password_confirm) {
            return true;
        }
        return false;
    }


    /**
     * Возвращает пользователя с указанным id
     * @param integer $id <p>id пользователя</p>
     * @return mixed <p>Массив с информацией о пользователе</p>
     */
    public static function getUserById($id)
    {
        // Соединение с БД
        Db::getConnection();

        $user = R::findOne('users', 'id = ?', array($id));


        return $user;
    }
}
