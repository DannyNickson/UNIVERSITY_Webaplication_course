<?php
require_once('sender.class.php');

interface IUser{
    public function sendMessage(string $message);
}

class User implements IUser{
    private $senderMessages;
    private function __construct(ISender $senderMessages)
    {
        $this->User = "SomeUser";
        $this->senderMessages = $senderMessages;
    } 
    public function sendMessage(string $message)
    {
        $sendResult = $this->senderMessages->send($message);
    }
}

class Admin implements IUser{
    private $senderMessages;
    private function __construct(ISender $senderMessages)
    {
        $this->User = "Administrator";
        $this->senderMessages = $senderMessages;
    } 
    public function sendMessage(string $message)
    {
        $sendResult = $this->senderMessages->send($message);
    }
}