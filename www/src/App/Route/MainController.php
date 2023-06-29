<?php


namespace App\Route;
use App\Attribute\RouteMethod;
use App\Model\Cartridge\Cartridg;
use App\Model\User\UserAuth;
use App\View\View;
use App\Response;
use App\Attribute\Route;
#[Route()]
class MainController extends AbstractController
{
    #[RouteMethod('/')]
    public function main(): Response
    {
        $barcode = Cartridg::getByBarcode($this->request->getPostKey('barcode'));
        $check = $this->request->getPostKey('barcode');
        $response = $this->successResponse(new View("index_view", ['results'=>$barcode,'check' =>$check,
            'user' => $this->user]), 200);
        return $response;
    }
}