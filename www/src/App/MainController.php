<?php


namespace App;


class MainController extends AbstractController
{

    public function handle(): Response
    {

        $response = $this->successResponse(new RawHtmlView('Hello World'));
        $response->setHeader('dadada', 'adadad');
        return $response;
    }
}