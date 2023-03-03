<?php


namespace App;


class View implements ViewInterface
{   private string $address;
    private array $ar;
    public function __construct(string $address, array $ar = []){
        $this->address = $address;
        $this->ar = $ar;
    }
    function handle(): string
    {
        ob_start();
        $this->extract();
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
    private function extract(){
        extract($this->ar);
        include 'src/view/' . $this->address . '.php';
    }
}