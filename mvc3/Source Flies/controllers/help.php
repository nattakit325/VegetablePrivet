<?php
/**
* 
*/
class help Extends Controller 
{
	
	function __construct()
	{
		parent:: __construct();
		echo "We are inside help<br/>";
	}

	function other($arg = false){
		echo "We are inside other in help<br/>";
		echo 'Optional:'.$arg.'/<br/>';

		require 'models/help_model.php';
		$model = new help_model();
	}
}
?>