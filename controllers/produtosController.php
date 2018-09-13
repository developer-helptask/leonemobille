<?php 
class produtosController extends controller{

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

	$produtos = new Product();
	$data['user_name'] = $u->getName();
	$data['user_email'] = $u->getEmail();
	$data['lista'] = $produtos->getAll();

	$this->loadTemplate('produtos', $data);
}


public function addProdutos(){
	
	$data = array();
$u = new Users();
	$u->setLoggedUser();

	$categorias = new Category();
	$data['user_name'] = $u->getName();
	$data['user_email'] = $u->getEmail();
	$data['lista_cat'] = $categorias->getAll();

	$this->loadTemplate('addProduto', $data);
}


public function produto_save(){
if(!empty($_POST['name'])){
		$name = $_POST['name'];
		$categorias = $_POST['categorias'];
	     $images = array();
	    if(isset($_FILES['images']) && !empty($_FILES['images']['tmp_name'])){
	    	 $images = $_FILES['images'];

	    }

		$produtos = new Product();
		$produtos->add($categorias, $name, $images);


		header("Location: ".BASE_URL."produtos");
	}
}


public function delProd($id){
	if(!empty($id)){
		$produtos = new Product();
		$produtos->delete($id);
	}
	header("Location: ".BASE_URL."admin/produtos");
}

}