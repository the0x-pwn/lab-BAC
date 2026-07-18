<?php
namespace Src\Application;

use Dotenv\Dotenv;
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
        $env = Dotenv::createImmutable(base_path());
        $env->load();
        $this->request = new Request();
        $this->response = new Response();
        $this->checkCSRF();
        $this->route = new Route($this->request, $this->response);
    }

    public function run()
    {
        return $this->route->handel();
    }


    protected function checkCSRF()
    {
        if (!session()->exists('csrf')) {
            session()->set('csrf', csrf());
        }

        if ($this->request->method() === 'post') {
            $csrfSession = session()->get('csrf');
            $csrfRequest = $this->request->input('_csrf');

            if (!$csrfSession || !$csrfRequest) {
                response()->jsonMessage('Not Found Token', 401);
            }

            if (!hash_equals($csrfSession, $csrfRequest)) {
                response()->jsonMessage('Invalid CSRF Token', 401);
            }

            session()->set('csrf', csrf());
        }
    }
}