<?php

class categoryController extends controller{

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
	$u->setLoggedUser();
$categorias = new Category();
	$data['user_name'] = $u->getName();
	$data['user_email'] = $u->getEmail();
	$data['lista'] = $categorias->getAll();

	$this->loadTemplate('categoria', $data);
}

public function addCategory(){
	
	$data = array();
	$u = new Users();
	$u->setLoggedUser();

	$data['user_name'] = $u->getName();
	$data['user_email'] = $u->getEmail();

	$this->loadTemplate('addCat', $data);
}

public function cat_save(){
	if(!empty($_POST['name'])){
		$name = $_POST['name'];
	    $status = $_POST['status'];

        $images = array();
	    if(isset($_FILES['fotos']) && !empty($_FILES['fotos']['tmp_name'])){
	    	 $images = $_FILES['fotos'];

	    }
		$categorias = new Category();
		$categorias->add($name,$status,$images);


		header("Location: ".BASE_URL."category");
	}
}


public function editCategorias($id){
		$data = array();
$u = new Users();
	$u->setLoggedUser();

	
	$data['user_name'] = $u->getName();
	$data['user_email'] = $u->getEmail();


	if(!empty($id)){
		$categorias = new Category();

		if(!empty($_POST['name'])){
			$name = $_POST['name'];

			$categorias->edit($name, $id);
		} else {

		$data['info'] = $categorias->get($id);

		if(isset($data['info']['id'])){
$this->loadTemplate('editcat', $data);
exit;
		}

		// $this->loadTemplateAdmin('edit', $dados);
	}
}
	header("Location: ".BASE_URL."category");
}


public function delCat($id){
	if(!empty($id)){
		$categorias = new Category();
		$categorias->delete($id);
	}
	header("Location: ".BASE_URL."category");
}


}