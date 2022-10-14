<?php
interface ILogger
{
    public function log($message);
}

class ConsoleLogger implements ILogger
{
    private function saveToDB($message)
    {
        //send to BD
    }
    public function log($message)
    {
        try{
            $this->saveToDB($message);
        }
        catch(error $e){
            //error
        }

        //logging to admin console
    }
}
