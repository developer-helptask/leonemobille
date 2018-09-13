<?php

class bannerController extends controller{

public function __construct() {
	parent::__construct();

	$u = new Users();
	if($u->isLogged() == false){
		header("Location: ".BASE_URL."login");
		exit;
	}
	}
	
public function index(){
	
	$data = array();
	$u = new Users();
	$banners = new Banners();
	$u->setLoggedUser();

	$data['user_name'] = $u->getName();
	$data['user_email'] = $u->getEmail();
	$data['lista'] = $banners->getAll();
	$this->loadTemplate('banner', $data);
}


public function addBanner(){
	
	$data = array();
	$u = new Users();
	$u->setLoggedUser();
	$data['user_name'] = $u->getName();
	$data['user_email'] = $u->getEmail();

	$this->loadTemplate('addBanner', $data);
}

public function banner_save(){
	
	if(!empty($_POST['name'])){
		$name = $_POST['name'];
		$url = $_POST['url'];
	    $alt = $_POST['alt'];
	    $title = $_POST['title'];
	    

	    $images = array();
	    if(isset($_FILES['fotos']) && !empty($_FILES['fotos']['tmp_name'])){
	    	 $images = $_FILES['fotos'];

	    }

		$banners = new Banners();
		$banners->add($name,$images,$url,$alt,$title);


		header("Location: ".BASE_URL."banner");
	}
}

public function editBanner($id){
		$data = array();
$u = new Users();
	$u->setLoggedUser();
	$data['user_name'] = $u->getName();

	if(!empty($id)){
		$banners = new Banners();

		$dados['info'] = $banners->get($id);

		if(isset($dados['info']['id'])){
$this->loadTemplate('editBanner', $data);
exit;

		}
		// $this->loadTemplateAdmin('edit', $dados);
	}
}
public function delBanner($id){
	if(!empty($id)){
		$banners = new Banners();
		$banners->delete($id);
	}
	header("Location: ".BASE_URL."banner");
}




}