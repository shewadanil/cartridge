<?php


namespace App;


class View implements ViewInterface
{   private string $address;
    public function __construct(string $address, array $ar = []){
        $this->address = $address;
        extract($ar);

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