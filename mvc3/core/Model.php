<?php
namespace core;

use PDO;

class Model
{

    protected $connect;

    public function __construct()
    {
        $this->connect = new Database();
        $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->connect->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
        $this->connect->exec("SET NAMES 'utf8';");
        ini_set('max_execution_time', 30000);

    }
}

