<?php


namespace App;
use App\View\ViewInterface;

class Response
{
    /**
     * @var Array<Array<string>>
     */
    private array $headers;
    private int $status;
    private ViewInterface $view;
    private string $output;

    public function __construct(ViewInterface $view, int $code = 200)
    {
        $this->view = $view;
        $this->status = $code;
        $this->headers = [];
    }

    /**
     * @param string $output
     */
    public function setOutput(string $output): void
    {
        $this->output = $output;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
    public function getStatus() : int
    {
        return $this->status;
    }
    public function setHeader($name, $key){
        if (!isset($this->headers[$name])){
            $this->headers[$name] = [$key];
        }else{
            $this->headers[$name][] = $key;
        }
    }
    function generateResponse(){
        http_response_code($this->status);
        foreach ($this->headers as $name => $value){
            foreach ($value as $key){
                header("{$name}: {$key}", false, $this->status);
                exit();            }
        }
        echo $this->view->handle();
    }

}