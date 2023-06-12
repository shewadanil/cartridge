<?php


namespace App\Route;
use App\Db;
use App\Request;
use App\Response;
use App\View\ViewInterface;


abstract class AbstractController {
    protected Request $request;
    protected Db $db;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    /*public abstract function handle(): Response;*/
    protected function successResponse(ViewInterface $view){
        return new Response($view);
    }

}
