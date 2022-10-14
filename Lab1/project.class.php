<?php
require_once('task.class.php');
require_once('user.class.php');
require_once('sender.class.php');
require_once('logger.class.php');
class Project
{
    private $senderMessage;
    private $logger;
    private function __construct($TaskList, $UserList, ISender $senderMessage,ILogger $logger)
    {
        $this->logger = $logger;
        if($senderMessage instanceof ISender){
            $this->senderMessage = $senderMessage;
        }
        else{
            $this->senderMessage = new MessengerSender();
            $this->logger->log('no send message sended or invalid data');
        }

        $this->TaskList = $TaskList;
        $this->UserList = $UserList;
    }
    public function createTask(IUser $UserList, string $someParams)
    {
        $this->TaskList[] = new Task($UserList, $someParams, $this->senderMessage);
    }
    public function setStatusToTask(Task $Task,string $status,IUser $User)
    {
        if(in_array($User,$this->UserList)){
            $Task->setStatus($status);
            $this->logger->log('time is '.time().' and user is '.$User->user.'');
        }
    }
    public function addNewUser(IUser $User){
        if(!in_array($User,$this->UserList)){
            $old_userlist = $this->UserList;
            $this->UserList[]=$User;
            foreach($old_userlist as $user)
            {
                if($user instanceof Admin)
                {
                    $user->sendMessage('added new user '.$User->user);
                }
            }
        }
    }
}
