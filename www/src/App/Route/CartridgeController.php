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
            $array = $this->request->getPostArrayKey(['barcode', 'price', 'date', 'model', 'service']);
            $array["id"] = $this->request->getGet('id');
            $cartridge = new Cartridg();
            $cartridge->createNewRecord($array);
            $array['id'] = $cartridge->returnLastRequest();
            $response = $this->redirect(new RawHtmlView(''),
                "cartridge" . DIRECTORY_SEPARATOR .
                "record_apply?check=true&id=" . $array['id'], 302);
        }else{
            $response = $this->successResponse(new View("Cartridge" . DIRECTORY_SEPARATOR . "new_record"), 200);
        }
        return $response;
    }

    #[RouteMethod('/edit_cartridge', 'GET')]
    public function edit_cartridge(): Response
    {
        $array = $this->request->getPostArrayKey(['barcode', 'price', 'date', 'model', 'service']);
        $array["id"] = $this->request->getGet('id');
        $cartridge = Cartridg::getById($this->request->getGet('id'));// Возвращает экземпляр класса по Id
        if ($this->request->getPostStatus()){
            $cartridge->setValue($array);
            $cartridge->save();
            $response = $this->redirect(new RawHtmlView(''),
                "cartridge" . DIRECTORY_SEPARATOR .
                "record_apply?check=true&id=" . $array['id'], 302);
        }
        else{
            $response = $this->successResponse(new View("Cartridge" . DIRECTORY_SEPARATOR . "edit_cartridge",
                ['results'=>$cartridge]), 200);
        }
        return $response;
    }
    #[RouteMethod('/cartridge/record_apply', 'GET')]
    public function record_apply(): Response
    {
        $cartridge = Cartridg::getById($this->request->getGet('id'));
        $check = $this->request->getGet('check');
        $response = $this->successResponse(new View("Cartridge" . DIRECTORY_SEPARATOR . "record_apply",
                ['check' => $check, 'cartridge' => $cartridge, 'user' => $this->user]), 200);
        return $response;
    }

    #[RouteMethod('/delete_cartridge', 'GET')]
    public function delete_cartridge(): Response
    {

        $cartridge = Cartridg::getById($this->request->getGet('id'));
        if ($this->request->getPostStatus() && $cartridge != null){
            $cartridge->delete($this->request->getPostKey('id'));
            $response = $this->redirect(new RawHtmlView(''), "cartridge" . DIRECTORY_SEPARATOR .
                "record_apply?check=true", 302);
        }else{
            $response = $this->successResponse(new View("Cartridge"
                . DIRECTORY_SEPARATOR . "delete_cartridge",['result' => $cartridge]), 200);
        }
        return $response;
    }


}