<?php

class Connection {

    const HOSTNAME = '172.16.4.20';
    const DB = 'mediaway';
    const USER = 'user'; #change in production
    const PASSWORD = 'verydifficultpassword'; #change in production

    private static $conn = null;

    public static function getConnection() {
        $dsn = "mysql:host=" . self::HOSTNAME . ";dbname=" . self::DB;

        if (self::$conn == null) {
            try {
                
                self::$conn = new PDO($dsn, self::USER, self::PASSWORD);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(/*$GLOBALS['debug']*/true){
                    echo "Successfully connected:<br>" . PHP_EOL;
                }
            } catch (PDOException $e) {
                throw $e;
            }
        }
        return self::$conn;
    }

}
