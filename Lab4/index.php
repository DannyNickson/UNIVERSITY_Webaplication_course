<?php
interface Notification
{
    public function send(string $title, string $message);
}
class EmailNotification implements Notification
{
    private $adminEmail;
    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }
    public function send(string $title, string $message): void
    {
        mail($this->adminEmail, $title, $message);
        echo "Sent email with title '$title' to '{$this->adminEmail}' that
                says '$message'.";
    }
}

class SlackSender
{
    private $login;
    private $apiKey;
    private $chatID;
    
    public function __construct($login,$apiKey,$chatID)
    {
        $this->login = $login;
        $this->apiKey = $apiKey;
        $this->chatID = $chatID;
    }

    public function login()
    {
        echo "we login with ".$this->login;
    }
    public function sendMessage($message){
        echo "we posted message chatID: ".$this->chatID. " message: ".$message;
    }
}
class SmsSender
{
    private $phone;
    private $sender;
    
    public function __construct($phone,$sender)
    {
        $this->phone = $phone;
        $this->sender = $sender;
    }

    public function sendMessage($message){
        echo "we posted message from sender: ".$this->sender. " message: ".$message;
    }
}

class SlackAdapter implements Notification
{
    private $slack;
    private $params;

    public function __construct($slack,$params)
    {
        $this->slack = $slack;
        $this->params = $params;
    }
    public function send(string $title, string $message)
    {
        $this->slack->login();
        $this->slack->sendMessage($this->params,$message);
    }
}
class SMSAdapter implements Notification
{
    private $sms;

    public function __construct($sms)
    {
        $this->sms = $sms;
    }
    public function send(string $title, string $message)
    {
        $this->sms->sendMessage($message);
    }
}
function clientCode(Notification $notification)
{
    echo $notification->send("ALARM!","WE ON FIRE!");
}

$slack = new SlackSender("login","apikey","1123321");
$notification = new SlackAdapter($slack,"Hello!");
clientCode($notification);
