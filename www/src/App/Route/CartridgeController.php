<?php


namespace App\Route;
use App\Attribute\Route;
use App\Attribute\RouteMethod;
use App\Model\Cartridge\Cartridg;
use App\Model\User\User;
use App\View\RawHtmlView;
use App\View\View;
use App\Response;
#[Route]
class CartridgeController extends AbstractController
{
    #[RouteMethod('/new_record', 'GET')]
    public function new_record(): Response
    {
        if ($this->request->getPostStatus()){
            $array = $this->request->getPostArrayKey(['id', 'barcode', 'price', 'date', 'model', 'service']);
            $cartridge = new Cartridg();
            $cartridge->createNewRecord($array);
            $response = $this->redirect(new RawHtmlView(''),
                'Cartridge/record_apply?check=true', 302);
        }else{
            $response = $this->successResponse(new View("Cartridge" . DIRECTORY_SEPARATOR . "new_record"), 200);
        }
        return $response;
    }

    #[RouteMethod('/edit_cartridge', 'GET')]
    public function edit_cartridge(): Response
    {

        $array = $this->request->getPostArrayKey(['id', 'barcode', 'price', 'date', 'model', 'service']);
        $cartridge = Cartridg::getById($this->request->getGet('id'));// Возвращает экземпляр класса по Id
        if ($this->request->getPostStatus()){
            $cartridge->setValue($array);
            $cartridge->save();
            $response = $this->redirect(new RawHtmlView(''), "Cartridge/record_apply?check=true", 302);
        }
        else{
            $response = $this->successResponse(new View("Cartridge" . DIRECTORY_SEPARATOR . "edit_cartridge",
                ['results'=>$cartridge]), 200);
        }
        return $response;
    }
    #[RouteMethod('/Cartridge/record_apply', 'GET')]
    public function record_apply(): Response
    {
        $check = $this->request->getGet('check');
        $response = $this->successResponse(new View("Cartridge" . DIRECTORY_SEPARATOR . "record_apply",
                ['check' => $check,]), 200);
        return $response;
    }

    #[RouteMethod('/delete_cartridge', 'GET')]
    public function delete_cartridge(): Response
    {

        $cartridge = Cartridg::getById($this->request->getGet('id'));
        if ($this->request->getPostStatus()){
            $cartridge->delete($this->request->getPostKey('id'));
            $response = $this->redirect(new RawHtmlView(''), "Cartridge" . DIRECTORY_SEPARATOR . "record_apply?check=true", 302);
        }else{
            $response = $this->successResponse(new View("Cartridge" . DIRECTORY_SEPARATOR . "delete_cartridge",['result' => $cartridge]), 200);
        }
        return $response;
    }


}