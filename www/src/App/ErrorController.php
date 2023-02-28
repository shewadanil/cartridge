<?php


namespace App;


class ErrorController extends AbstractController
{


    public function handle(): Response
    {
        $response = $this->successResponse(new View('error'));
        return $response;
    }
}