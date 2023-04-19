<?php


namespace App;
use Attribute\Method;
use Attribute\Table;
use App\AbstractController;
#[Table('App')]
class App
{
    private Request $request;
    #[Method('appConstract')]
    public function __construct(Request $req) {
        $this->request = $req;
    }

    public function handle() : Response{
        try {
            $controller  = $this->controllerFabric();
            if($controller != null){
                return $controller->handle();
            }else {
                return new Response(new View('error/not_found'), 404);
            }

        }catch (\Exception $exception){
            return new Response(new View('error/exception', ['exception' => $exception]), 500);
        }


    }
    #[Method('appController')]
    protected function controllerFabric() : ?AbstractController {
        if($this->request->getUri() === '/') {
            return $this->controller('main');
        }
        if($this->request->getUri() === '/new_record' && $this->request->getMethod() === 'GET') {
            return $this->controller('create_cartridge');
        }
        if($this->request->getUri() === '/db' && $this->request->getMethod() === 'POST') {
            return $this->controller('');
        }
        if($this->request->getUri() === '/cartrige' && $this->request->getMethod() === 'PUT') {
            return $this->controller('edit_cartirige');
        }
        if($this->request->getUri() === '/cartrige' && $this->request->getMethod() === 'DELETE') {
            return $this->controller('delete_cartrige');
        }
        if($this->request->getUri() === '/login' && $this->request->getMethod() === 'GET') {
            return $this->controller('login');
        }
            return null;

    }


    protected function controller(string $type) : ?AbstractController {
        switch($type) {
            case 'main':
                return new MainController($this->request);
            case 'login':
                return new LoginController($this->request);
            case 'create_cartridge':
                return new RecordController($this->request);
        }
        return null;
    }


}