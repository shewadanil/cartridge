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
    protected function successResponse(ViewInterface $view, int $code):Response{
        return new Response($view, $code);
    }
    protected function redirect(ViewInterface $view, $url, $code):Response{
        $response = new Response($view, $code);
        $response->setHeader('Location', $url);
        return $response;
    }

}
