<?php
namespace core\Cotroller;

class Controller
{

    public function __construct()
    {
        header('Content-type: text/html; charset=utf-8');
    }

   public function views($view, $data = [])
    {
        require_once 'views/' . $view . '.php';
    }
}

?>