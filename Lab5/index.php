<?php

abstract class Page
{
    protected $rerender;

    public function __construct(Rerender $rerender)
    {
        $this->rerender = $rerender;
    }
    abstract public function show();
}

class SimplePage extends Page
{
    protected $title;
    protected $content;

    public function __construct(Rerender $rerender, $title, $content)
    {
        parent::__construct($rerender);
        $this->title = $title;
        $this->content = $content;
    }
    public function show()
    {
        return $this->rerender->rerender([$this->title, $this->content]);
    }
}
class ProductPage extends Page
{
    protected $product;

    public function __construct(Rerender $rerender, $product)
    {
        parent::__construct($rerender);
        $this->product = $product;
    }
    public function show()
    {
        return $this->rerender->rerender([$this->product]);
    }
}

class Product
{
    private $title, $description, $image;

    public function __construct(
        string $title,
        string $description,
        string $image
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }
}

interface Rerender
{
    public function rerender(array $params);
}

class HTMLRerender implements Rerender
{
    public function rerender(array $params)
    {
        return "page with this params in HTML:" . $params;
    }
}

class JSONRerender implements Rerender
{
    public function rerender(array $params)
    {
        return "page with this params in JSON:" . $params;
    }
}
class XMLRerender implements Rerender
{
    public function rerender(array $params)
    {
        return "page with this params in XML:" . $params;
    }
}


function clientCode(Page $page)
{
    echo $page->show();
}




