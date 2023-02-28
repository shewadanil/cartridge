<?php


namespace App;
use App\AbstractController;
use App\MainController;

class App
{
    private Request $request;

    public function __construct(Request $req) {
        $this->request = $req;
    }

    public function handle() : Response{
        $controller  = $this->controllerFabric();
        if($controller != null){
            return $controller->handle();
        }else {
            $controller = $this->controller('error');
            return $controller->handle();
        }

    }

    protected function controllerFabric() : ?AbstractController {
        if($this->request->getUri() === '/') {
            return $this->controller('main');
        }
        if($this->request->getUri() === '/cartrige' && $this->request->getMethod() === 'GET') {
            return $this->controller('get_cartrige');
        }
        if($this->request->getUri() === '/cartrige' && $this->request->getMethod() === 'POST') {
            return $this->controller('create_cartrige');
        }
        if($this->request->getUri() === '/cartrige' && $this->request->getMethod() === 'PUT') {
            return $this->controller('edit_cartirige');
        }
        if($this->request->getUri() === '/cartrige' && $this->request->getMethod() === 'DELETE') {
            return $this->controller('delete_cartrige');
        }
        if($this->request->getUri() === '/login') {
            return $this->controller('login');
        }
            return null;

    }


    protected function controller(string $type) : AbstractController {
        switch($type) {
            case 'main':
                return new MainController($this->request);
            case 'login':
                return new LoginController($this->request);
            case 'error':
                return new ErrorController($this->request);
        }
    }


}