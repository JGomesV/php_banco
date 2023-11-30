<?php

namespace App\persistence; 

use App\Systemservices\MonologFactory;

class ConnectionFactory{

   static $dbuser= 'root';

   static $dbpassword= '795648Jv@';

   static $dbhost= '127.0.0.1';

   static $dbname = 'test';

   static $pdo;

    static function  getConnectionInstance(){
        try{
            self::$pdo = new \PDO("mysql:host=" . self::$dbhost . ";dbname=" . self::$dbname, self::$dbuser, self::$dbpassword);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            MonologFactory::getInstance()->info("Conexao obtida com sucesso!!");
        }
        catch(\PODExceptinon $ex){
            MonologFactory::getInstance()->info("falha ao obter a conexao!");   
            MonologFactory::getInstance()->info($ex->getMessage());
        }
        return self::$pdo;
    }

}