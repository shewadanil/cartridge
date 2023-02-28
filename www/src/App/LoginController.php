<?php


namespace App;


class LoginController extends AbstractController
{



    public function handle(): Response
    {
        $response = $this->successResponse(new View("login"));
        return $response;
    }
}