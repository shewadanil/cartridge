<?php


namespace App\Controller;
use App\View\View;
use App\Response;
use App\Attribute\Controller;
#[Controller(RecordController::class)]
class RecordController extends AbstractController
{

    public function handle(): Response
    {
        $response = $this->successResponse(new View("new_record"));
        return $response;
    }
}
