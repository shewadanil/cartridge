<?php


namespace App\Route;
use App\View\View;
use App\Response;
use App\Attribute\Route;
#[Route]
class RecordController extends AbstractController
{

    public function handle(): Response
    {
        $response = $this->successResponse(new View("new_record"));
        return $response;
    }
}
