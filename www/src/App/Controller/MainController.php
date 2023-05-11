<?php


namespace App\Controller;
use App\View\View;
use App\Response;
use App\Attribute\Controller;
#[Controller(MainController::class)]
class MainController extends AbstractController
{

    public function handle(): Response
    {
        $response = $this->successResponse(new View("index_view"));
        return $response;
    }
}