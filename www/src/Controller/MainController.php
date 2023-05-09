<?php


namespace App\Controller;
use App\View\View;
use App\Response;

class MainController extends AbstractController
{

    public function handle(): Response
    {
        $response = $this->successResponse(new View("index_view"));
        return $response;
    }
}