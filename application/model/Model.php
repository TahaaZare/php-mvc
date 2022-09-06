<?php

namespace Application\Model;

use PDO;
use PDOException;


class Model
{

    protected $connection;
    public function __construct()
    {
        #region Check Connection

        if (!isset($connection)) {
            global $dbHost, $dbName, $dbUserName, $dbPassoword;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ];

            try {
                $this->connection = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUserName, $dbPassoword);
            } catch (PDOException $e) {
                echo "DataBase Error for connection is {$e->getMessage()} !!!";
            }
        }

        #endregion
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    #region Query

    protected function query($query, $values = null)
    {
        try {
            if ($values == null) {
                return $this->connection->query($query);
            } else {
                //query
                $stmt = $this->connection->prepare($query);
                $stmt -> execute($values);
                return $stmt;
            }
        } catch (PDOException $e) {
            echo "Error From Query Section ! ERROR : {$e}";
        }
    }

    #endregion

    #region Execute

    protected function execute($query, $values = null)
    {
        try {
            if ($values == null) {
                $this->connection->exec($query);
            } else {
                $stmt = $this->connection->prepare($query);
                $stmt->execute($values);
            }
            return true;
        } catch (PDOException $e) {
            echo "Error From Execute Section ! ERROR : {$e}";
            return false;
        }
    }

    #endregion

    #region close connection

    protected function closeConnection(){
        $this->connection = null;
    }

    #endregion
}
