<?php
use core\Cotroller\Controller;


class index extends Controller
{

    private $model;

    public function __construct()
    {
      
    }

    public function index()
    {
        $this->views('index/index', null);
    }
    

}

