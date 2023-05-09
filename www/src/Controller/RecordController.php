<?php


namespace App\Controller;
use App\View\View;
use App\Response;

class RecordController extends AbstractController
{

    public function handle(): Response
    {
        $response = $this->successResponse(new View("new_record"));
        return $response;
    }
}
