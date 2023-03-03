<?php


namespace App;


class MainController extends AbstractController
{

    public function handle(): Response
    {
        $response = $this->successResponse(new View("index_view"));
        return $response;
    }
}