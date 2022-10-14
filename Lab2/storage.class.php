<?php
interface IStorage
{
    public function connect(string $username, string $password);
}

class LocalStorage  implements IStorage
{
    private $connectionHandler;
    public $value;
    private function connectToLocalStorage(string $username, string $password)
    {
        try {
            //connecting to local storage
            return true;
        } catch (\Throwable $th) {
            //throw $th
            return false;
        }
    }
    public function connect(string $username, string $password)
    {
        $this->connectToLocalStorage($username, $password);
    }
}

class AmazonStorage  implements IStorage
{
    private $connectionHandler;
    private function connectToAmazonStorage(string $username, string $password)
    {
        try {
            //connecting to local storage
            return true;
        } catch (\Throwable $th) {
            //throw $th
            return false;
        }
    }
    public function connect(string $username, string $password)
    {
        $this->connectToAmazonStorage($username, $password);
    }
}
