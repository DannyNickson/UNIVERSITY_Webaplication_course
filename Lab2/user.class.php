<?php

require_once('connection.class.php');

class User{
    private $connection;

    public function connectToSomeStorage(string $Storage)
    {
        if($Storage =='Amazon')
        {   
            $this->connection = Connection::getInstance();
            $this->connection->connectAmazonStorage('username','password');
        }
        elseif($Storage =="Local")
        {
            $this->connection = Connection::getInstance();
            $this->connection->LocalStorage('username','password');
        }
    }

}