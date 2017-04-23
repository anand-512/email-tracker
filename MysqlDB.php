<?php
/**
 * Created by PhpStorm.
 * User: CD
 * Date: 4/23/17
 * Time: 5:04 PM
 */
require_once ('vendor/joshcam/mysqli-database-class/MysqliDb.php');
require_once ('config.php');

class MysqlDB {
    public static function getInstance()
    {
        if(is_null(MysqliDb::getInstance()))
        {
            return new MysqliDb (DBHOST, DBUSER, DBPASSWORD, DBNAME);
        }
        return MysqliDb::getInstance();
    }
}