<?php 
class controller{
	protected $db;
	
	public function __construct(){
		global $config;
		$this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
	}
	public function loadView($viewName, $viewData = array()){
		
		require 'views/'.$viewName.'.php';
	}

	
	public function loadTemplate($viewName, $viewData = array()){
		
		extract($viewData);
		require 'views/template.php';
	}



	public function loadViewInTemplate($viewName, $viewData = array()){
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

	
	public function loadTemplateAdmin($viewName, $viewData = array()){
		
		require 'views/admin/template.php';
	}

	public function loadViewInTemplateAdmin($viewName, $viewData = array()){
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

}