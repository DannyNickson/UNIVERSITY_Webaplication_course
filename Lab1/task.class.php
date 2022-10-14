<?php
require_once('user.class.php');
require_once('sender.class.php');
class Task
{
    private $senderMessage;
    private function __construct($UserList, string $someParams,ISender $senderMessage)
    {
        $this->senderMessage = $senderMessage;
        $this->someParams = $someParams;
        $this->sendMessageToUsers($UserList);
      
    }
    private function sendMessageToUsers(User $UserList)
    {
        foreach ($UserList as $User) {
            
            $User->sendMessage("Created new task specialy for you.",$this->senderMessage);
        } 
    }
    public function setStatus($status)
    {
        $this->someParams['status'] = $status;
        return true;
    }
}
