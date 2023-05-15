<?php


namespace App\Route;
use App\Attribute\Route;
use App\Attribute\RouteMethod;
use App\View\View;
use App\Response;
#[Route(RouteController::class)]
class RouteController extends AbstractController
{
    #[Route("main")]
    public function main(): Response
    {
        $response = $this->successResponse(new View("index_view"));
        return $response;
    }
    #[Route("login")]
    public function login(): Response
    {
        $response = $this->successResponse(new View("login"));
        return $response;
    }
    #[Route("record")]
    public function record(): Response
    {
        $response = $this->successResponse(new View("new_record"));
        return $response;
    }
}