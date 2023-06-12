<?php


namespace App\Route;
use App\Attribute\Route;
use App\Attribute\RouteMethod;
use App\Model\Cartridge\Cartridg;
use App\View\View;
use App\Response;
#[Route(RouteController::class)]
class RouteController extends AbstractController
{
    #[Route("main")]
    public function main(): Response
    {

        $result = Cartridg::getByBarcode($this->request->getPostKey('barcode'));
        $response = $this->successResponse(new View("index_view", ['results'=>$result]));
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

        $response = $this->successResponse(new View("new_record_cartridge"));
        return $response;
    }
}