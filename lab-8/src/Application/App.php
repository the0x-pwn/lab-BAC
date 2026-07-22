<?php
namespace Src\Application;
use Src\Http\HandelRoute;
use Src\Http\Request;
use Src\Http\Response;
use Src\Http\Route;
use Src\Session\SessionConfig;

class App
{
    protected Request $request;
    protected Response $response;
    protected Route $route;
    protected HandelRoute $handel;

    public function __construct()
    {
        SessionConfig::start();
        $this->request = new Request();
        $this->response = new Response();
        $this->route = new Route($this->request, $this->response);
    }

    public function run()
    {
        return $this->route->handel();
    }

}