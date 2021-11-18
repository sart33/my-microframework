<?php

namespace App\Db;

use \PDO;
class DbConnection
{

    static private $_instance;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance instanceof DbConnection) {

        } else {
            try {
                self::$_instance = new PDO(DB_TYPE . ':' . 'host=' . DB_HOST . ';' . 'port='. DB_PORT .';'. 'dbname=' . DB_NAME . ';' .
                    'user=' . DB_USER . ';' . 'password=' . DB_PASS);
            } catch (\PDOException $e) {
                echo 'connection Error: ' . $e->getMessage();
            }
        }

        return self::$_instance;

    }

    public static function inquireIntoDb($query, $obj = null)
    {
        try {
            $sth = self::getInstance()->query($query);

            if (!empty($sth)) {
                if(isset($obj) && $obj === 'obj') {
                    return $sth->fetchAll(PDO::FETCH_OBJ);

                } else {
                    return $sth->fetchAll(PDO::FETCH_ASSOC);
                }
            } else {
                throw new \LogicException('Invalid sql query syntax');
            }
        } catch (\Exception $e) {
            $messageException = "[" . date('Y-m-d H:i:s', time()) . "] Exception message: " . $e->getMessage() . " in file: " . $e->getFile() . " line number: " . $e->getLine() . PHP_EOL;
            file_put_contents(dirname(__DIR__) . '/Log/exception.txt', $messageException, FILE_APPEND | LOCK_EX);
            echo $e->getMessage();
            exit;

        }
    }

}