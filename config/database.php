<?php
namespace config;

class Database
{
    const HOST = 'localhost';
    const USER = 'dev';
    const PASSWORD = '';
    const DATABASE_NAME = 'testdb';

    public function connect()
    {
        $mysqli = new \mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE_NAME);

        if ($mysqli->connect_errno) {
            echo "connection failed: ".$mysqli->connect_error;
        }

        return $mysqli;
    }
}

?>