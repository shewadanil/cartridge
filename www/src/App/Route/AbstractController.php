<?php


namespace App\Route;
use App\Db;
use App\Model\User\User;
use App\Model\User\UserAuth;
use App\Request;
use App\Response;
use App\View\ViewInterface;

abstract class AbstractController {
    protected Request $request;
    protected ?User $user;

    public function __construct(Request $request) {
        $this->request = $request;
        $this->user = UserAuth::getUserByToken();
    }
    protected function successResponse(ViewInterface $view, int $code):Response{
        return new Response($view, $code);
    }
    protected function redirect(ViewInterface $view, $url, $code):Response{
        $response = new Response($view, $code);;
        $response->setHeader('Location', $url);
        return $response;
    }

}
