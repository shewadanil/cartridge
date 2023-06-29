<?php


namespace App\Route;
use App\Attribute\RouteMethod;
use App\Exceptions\InvalidArgument;
use App\Model\User\User;
use App\Model\User\UserAuth;
use App\View\RawHtmlView;
use App\View\View;
use App\Response;
use App\Attribute\Route;
#[Route]
class LoginController extends AbstractController
{
    #[RouteMethod('/login', 'GET')]
    public function login(): Response
    {
        if ($this->request->getPostStatus()){
            $array = $this->request->getPostArrayKey(['login', 'password']);
            try {
                $user = User::login($array);
                UserAuth::createToken($user);
                /*$response = $this->successResponse(new View("login"), 200);*/
                $response = $this->redirect(new RawHtmlView(''), '/', 302);
            }catch (InvalidArgument $exception){
                $response = $this->successResponse(new View("login", ['error' => $exception->getMessage()]), 200);
            }

        }else{
            $response = $this->successResponse(new View("login"), 200);
        }
        return $response;
    }
    #[RouteMethod('/exit', 'GET')]
    public function logOut(): Response{
        if (isset($this->user) === true){
            $this->user->logOut();
            $response = $this->redirect(new RawHtmlView(''), '/?login=false', 302);
        }else{
            $response = $this->redirect(new RawHtmlView(''), '/', 302);
        }
        return $response;
    }


}