<?php


namespace App\Route;
use App\Attribute\RouteMethod;
use App\Model\User\User;
use App\View\View;
use App\Response;
use App\Attribute\Route;
#[Route]
class LoginController extends AbstractController
{
    #[RouteMethod('/login', 'GET')]
    public function login(): Response
    {
        $check = $this->request->getPostKey('check');
        if ($check != null && $this->request->getPostKey('login')!= null){
            $array = $this->request->getPostArrayKey(['login', 'password']);
            $user = User::login($array);
            $response = $this->successResponse(new View("login", ['check' => $check]), 200);
            /*$response = $this->redirect(new RawHtmlView(''), '/', 302);*/
        }else{
            $response = $this->successResponse(new View("login", ['check' => $check]), 200);
        }
        return $response;
    }
}