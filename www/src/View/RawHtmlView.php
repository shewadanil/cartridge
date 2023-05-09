<?php


namespace App\View;


class RawHtmlView implements ViewInterface
{

    private string $output;

    function __construct(string $output)
    {
        $this->output = $output;
    }

    function handle(): string
    {
        return $this->output;
    }
}