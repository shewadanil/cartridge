<?php


namespace App;


class MainController extends AbstractController
{

    public function handle(): Response
    {
        $response = $this->successResponse(new View("index_view", ['data' => '12.03.2000', 'name' => 'Danil']));
        return $response;
    }
}