<?php
interface ISender
{
    public function send(string $message);
}


class EmailSender implements ISender
{
    private function sendToEmail($message)
    {
        echo "send to Email";
    }

    public function send($message)
    {
        $this->sendToEmail($message);
    }
}
class SmsSender implements ISender
{
    private function sendToSms($message)
    {
        echo "send to Sms";
    }

    public function send($message)
    {
        $this->sendToSms($message);
    }
}
class MessengerSender implements ISender
{
    private function sendToMessenger($message)
    {
        echo "send to Messenger";
    }

    public function send($message)
    {
        $this->sendToMessenger($message);
    }
}
