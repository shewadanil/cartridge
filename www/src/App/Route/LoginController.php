<?php


namespace App\Route;
use App\View\View;
use App\Response;
use App\Attribute\Route;
#[Route(LoginController::class)]
class LoginController extends AbstractController
{



    public function handle(): Response
    {
        $response = $this->successResponse(new View("login"));
        return $response;
    }
}