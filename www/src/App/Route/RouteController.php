<?php


namespace App\Route;
use App\Attribute\Route;
use App\Attribute\RouteMethod;
use App\Model\Cartridge\Cartridg;
use App\View\RawHtmlView;
use App\View\View;
use App\Response;
#[Route(RouteController::class)]
class RouteController extends AbstractController
{
    #[Route("main")]
    public function main(): Response
    {
        $barcode = Cartridg::getByBarcode($this->request->getPostKey('barcode'));
        $response = $this->successResponse(new View("index_view", ['results'=>$barcode]), 200);
        return $response;
    }
    #[Route("login")]
    public function login(): Response
    {
        $response = $this->successResponse(new View("login"), 200);
        return $response;
    }

    #[Route("new_record")]
    public function new_record(): Response
    {
        $check = $this->request->getPostKey('check');
        if ($check != null && $this->request->getPostKey('barcode')!= null){
            $array = $this->request->getPostArrayKey(['id', 'barcode', 'price', 'date', 'model', 'service']);
            $cartridge = new Cartridg();
            $cartridge->createNewRecord($array);
            $response = $this->redirect(new RawHtmlView(''), '/record_apply?check=true', 302);
        }else{
            $response = $this->successResponse(new View("new_record", ['check' => $check]), 200);
        }
        return $response;
    }

    #[Route("edit_cartridge")]
    public function edit_cartridge(): Response
    {
        $check = $this->request->getPostKey('check');
        $array = $this->request->getPostArrayKey(['id', 'barcode', 'price', 'date', 'model', 'service']);
        $cartridge = Cartridg::getById($this->request->getPostKey('id'));// Возвращает экземпляр класса по Id
        if ($check){
            $cartridge->setValue($array);
            $cartridge->save();
            $response = $this->redirect(new RawHtmlView(''), '/record_apply?check=true', 302);
        }
        else{
            $response = $this->successResponse(new View("edit_cartridge",
                ['results'=>$cartridge, 'check' => $check]), 200);
        }
        return $response;
    }
    #[Route("record_apply")]
    public function record_apply(): Response
    {
            $check = $this->request->getGet('check');
            $response = $this->successResponse(new View("record_apply",
                ['check' => $check,]), 200);
            return $response;
    }
    #[Route("delete_cartridge")]
    public function delete_cartridge(): Response
    {
        $check = $this->request->getPostKey('check');
        $cartridge = Cartridg::getById($this->request->getPostKey('id'));
        if ($check && $cartridge != null){
            $cartridge->delete($this->request->getPostKey('id'));
            $response = $this->redirect(new RawHtmlView(''), '/record_apply?check=true', 302);
        }else{
            $response = $this->successResponse(new View("delete_cartridge",['result' => $cartridge]), 200);
        }
        return $response;
    }


}