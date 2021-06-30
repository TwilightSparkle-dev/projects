<?php
/**
 * Created by PhpStorm.
 * User: Twilight Sparkle
 * Date: 01.02.2019
 * Time: 14:05
 */

class Custompage
{
    public static function createPage($name, $status)
    {
        Db::getConnection();

        $result = R::dispense('custompage');

        if ($result) {
            $result->name = $name;
            $result->status = $status;

            R::store($result);
            return true;
        } else {
            return false;
        }
    }

    public static function getCustomPageList()
    {
        Db::getConnection();

        $result = R::findAll('custompage');

        if ($result) {

            return $result;
        } else {
            return false;
        }
    }

    public static function getCustompageById($id)
    {
        Db::getConnection();

        // Текст запроса к БД
        $result = R::load('custompage', $id);


        return $result;
    }

    public static function updateCustompageById($id, $name, $status)
    {
        Db::getConnection();

        // Текст запроса к БД
        $result = R::load('custompage', $id);

        if ($result) {
            $result->name = $name;
            $result->status = $status;

            R::store($result);
            return true;
        } else {
            return false;
        }

    }



}