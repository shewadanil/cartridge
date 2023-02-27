<?php


namespace App;


class Response
{
    /**
     * @var string[]
     */
    private array $headers;
    private int $status;
    private string $output;

    public function __construct(string $output, int $code = 200)
    {
        $this->output = $output;
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
    public function setHeader($key, $value){
        if (!isset($this->headers[$key])){
            $this->headers[$key] = [$value];
        }else{
            $this->headers[$key][] = $value;
        }
    }
}