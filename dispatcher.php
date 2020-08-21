<?php
namespace Vendor;
use Vendor\Controllers\tasksController;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        // var_dump($this->request);
        // die();
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        /* $file = ROOT . 'Controllers/' . $name . '.php';
        echo $name;
        die();
        require($file);
        $controller = new $name(); */
        $controller = new tasksController;
        return $controller;
    }

}
