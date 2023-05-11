<?php


namespace App\Controller;
use App\View\View;
use App\Response;
use App\Attribute\Controller;
#[Controller(LoginController::class)]
class LoginController extends AbstractController
{



    public function handle(): Response
    {
        $response = $this->successResponse(new View("login"));
        return $response;
    }
}