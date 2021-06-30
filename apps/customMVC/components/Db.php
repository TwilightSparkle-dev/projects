<?php

/**
 * Класс Db
 * Компонент для работы с базой данных
 */
class Db
{

    /**
     * Устанавливает соединение с базой данных
     *
     */
    public static function getConnection()
    {
// Получаем параметры подключения из файла
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        require_once "rb-mysql.php";

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        if(!R::testConnection()){
            R::setup( $dsn, $params['user'], $params['password'] ); //for both mysql or mariaDB
        }

        R::freeze(false);

        return true;

    }

}
