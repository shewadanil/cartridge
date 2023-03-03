<?php


namespace App;


class View implements ViewInterface
{   private string $name;
    public function __construct(string $name){
        $this->name = $name;

    }
    function handle(): string
    {
        ob_start();
        include 'src/view/' . $this->name . '.php';
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}