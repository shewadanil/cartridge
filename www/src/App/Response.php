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
    public function setHeader($key, $value){
        if (!isset($this->headers[$key])){
            $this->headers[$key] = [$value];
        }else{
            $this->headers[$key][] = $value;
        }
    }
    function generateResponse(){
        http_response_code($this->status);
        foreach ($this->headers as $name => $value){

            foreach ($value as $key){
                header("{$name}: {$key}", false);

            }
        }
        echo $this->view->handle();


    }
}