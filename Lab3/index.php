<?php
abstract class Creator
{
    abstract public function factoryMethod(): Social;

    public function postMessage($message, $params): string
    {
        $social = $this->factoryMethod($message);
        $social->connect($params);
        $social->postMessage($message);
        return "Creator works!";
    }
}

class LinkedInCreator extends Creator
{
    public function factoryMethod(): Social
    {
        return new LinkedInSocial();
    }
}
class FaceBookCreator extends Creator
{
    public function factoryMethod(): Social
    {
        return new FaceBookSocial();
    }
}

interface Social
{
    public function connect($param);
    public function postMessage($message);
}

class LinkedInSocial implements Social
{
    public function connect($param)
    {
        $someConnector = "connected with params ";
        return  $someConnector . $param;
    }
    public function postMessage($message)
    {
        return "posted message " . $message;
    }
}

class FaceBookSocial implements Social
{
    public function connect($param)
    {
        $someConnector = "connected with params ";
        return  $someConnector . $param;
    }
    public function postMessage($message)
    {
        return "posted message " . $message;
    }
}
function clientCode(Creator $creator, string $message, array $param)
{
    //...
    echo "Is this working?" . $creator->postMessage($message, $param);
    //...
}

clientCode(new LinkedInCreator(), "Hi!", ["puchkovdd@gmail.com", "eqwdqfq"]);
clientCode(new FaceBookCreator(), "Hi!", ["dannynickson", "eqwdqfq"]);
