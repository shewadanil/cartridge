<?php


namespace App;
use App\Request;


abstract class AbstractController {
    protected Request $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public abstract function handle(): Response;
    protected function successResponse(ViewInterface $view){
        return new Response($view);
    }

}
