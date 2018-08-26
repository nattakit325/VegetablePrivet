<?php
class index Extends Controller {

	function __construct(){
		parent:: __construct();
		$this->view->render('index/index');

	}
} 
?>