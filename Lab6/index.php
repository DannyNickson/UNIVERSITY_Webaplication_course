<?php

interface Downloader{
    public function download();
}
class SimpleDownloader implements Downloader
{
    public function download()
    {
        return "You got a file!";
    }
} 
class ProxyDownloader implements Downloader
{
    private $simpledownloader;
    public function __construct(Downloader $simpledownloader)
    {
        $this->simpledownloader = $simpledownloader;
    }
    public function cashing($file)
    {
        echo "We are cashing the file:" . $file;
        echo "\n";
    }
    public function download()
    {
        $file = "some_file.txt";
        $this->cashing($file);
        return $this->simpledownloader->download();
    }
}

function clientCode(Downloader $downloader)
{
    echo $downloader->download();
}

$simpledownloader = new SimpleDownloader();
clientCode($simpledownloader);
echo "\n";

$proxy = new ProxyDownloader($simpledownloader);
clientCode($proxy);
