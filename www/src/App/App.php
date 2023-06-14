<?php


namespace App;
use App\Attribute\Route;
use App\Route\AbstractController;
use App\View\View;

class App
{
    private Request $request;
    private ScanClass $scanClass;
    public $route;

    public function __construct(Request $req) {
        $this->request = $req;
        $this->scanClass = new ScanClass("src");
    }
    public function handle() : Response{
        try {
            $controller  = $this->controllerFabric();
            if($controller != null){
                $route = $this->route;
                return $controller->$route(); // Возвращает метод RoutController
            }else {
                return new Response(new View('error/not_found'), 404);
            }

        }catch (\Exception $exception){
            return new Response(new View('error/exception', ['exception' => $exception]), 500);
        }


    }
    protected function controllerFabric() : ?AbstractController {
        if($this->request->getUri() === '/') {
            return $this->controller('main');
        }
        if($this->request->getUri() === '/new_record' && $this->request->getMethod() === 'GET') {
            return $this->controller('record');
        }
        if($this->request->getUri() === '/login' && $this->request->getMethod() === 'GET') {
            return $this->controller('login');
        }
        if($this->request->getUri() === '/edit_cartridge' && $this->request->getMethod() === 'POST') {
            return $this->controller('edit_cartridge');
        }
            return null;

    }


    protected function controller(string $type) : ?AbstractController {
        $classattr = $this->scanClass->findClassByAttribute("App\Attribute\Route");

       foreach ($classattr as $value){
           $methodattr = $this->scanClass->findMethodByAttribute($value);
           foreach ($methodattr as $result){
               if ($result === $type){
                   /*print_r($result);*/
                   $this->route = $result;
                   return new $value($this->request); //Возвращает RouteController
               }
           }

        }
       /* switch($type) {
            case 'main':
                return new \App\Controller\MainController($this->request);
            case 'login':
                return new \App\Controller\LoginController($this->request);
            case 'create_cartridge':
                return new \App\Controller\RecordController($this->request);
        }*/
        return null;
    }


}