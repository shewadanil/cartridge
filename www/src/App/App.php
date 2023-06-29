<?php


namespace App;
use App\Attribute\Route;
use App\Exceptions\PageNoteFound;
use App\Route\AbstractController;
use App\View\View;

class App
{
    private Request $request;
    private ScanClass $scanClass;
    private $route;

    public function __construct(Request $req) {
        $this->request = $req;
        $this->scanClass = new ScanClass("src");
    }
    public function handle() : Response{
        try {
            $controller = $this->controller();
            if($controller != null){
                $route = $this->route;
                return $controller->$route(); // Возвращает метод RoutController
            }else {
                throw new PageNoteFound();
            }

        }
        catch (PageNoteFound $exception){
            return new Response(new View('error/not_found', ['error' => $exception->getMessage()]), 404);
        }
        catch (\Exception $exception){
            return new Response(new View('error/exception', ['exception' => $exception]), 500);
        }

    }

    protected function controller() : ?AbstractController {
        $uri = $this->request->getUri();
        $httpMethod = $this->request->getMethod();
        $classattr = $this->scanClass->findRoute($uri, $httpMethod);
        if ($classattr === null){
            return null;
        }
       foreach ($classattr as $className => $method){
           foreach ($method as $nameMethod => $result){
                   $this->route = $nameMethod;
                   return new $className($this->request); //Возвращает RouteController

           }

        }
       return null;
    }
    /*protected function controllerFabric() : ?AbstractController {
        if($this->request->getUri() === '/') {
            return $this->controller('main');
        }
        if($this->request->getUri() === '/new_record') {
            return $this->controller('new_record');
        }
        if($this->request->getUri() === '/login') {
            return $this->controller('login');
        }
        if($this->request->getUri() === '/edit_cartridge') {
            return $this->controller('edit_cartridge');
        }if($this->request->getUri() === '/delete_cartridge') {
            return $this->controller('delete_cartridge');
        }
        if($this->request->getUri() === '/record_apply') {
            return $this->controller('record_apply');
        }
        return null;

    }*/


}