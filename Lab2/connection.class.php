<?php

class Connection extends Singleton
{
    public $connectionHandler;
    public function connectAmazonStorage()
    {
        $this->connectionHandler = new AmazonStorage($this->username,$this->password);
    }
     public function connectLocalStorage()
    {
        $this->connectionHandler = new LocalStorage($this->username,$this->password);
    }

}
