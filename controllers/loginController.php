<?php
class loginController extends controller{

	public function index(){
		$data = array();

		if(isset($_POST['name']) && !empty($_POST['name'])){
			$name = addslashes($_POST['name']);
			$pass = addslashes($_POST['password']);

			$u = new Users();

			if($u->doLogin($name, $pass)){
				header("Location: ".BASE_URL."home");
				exit;
			} else {
				$data['error'] = 'Email e/ou senha errada.';
			}
		}
		$this->loadView('login', $data);
	}

	public function logout(){
		$u = new Users();
		$u->setLoggedUser();
		$u->logout();

		header("Location: ".BASE_URL);
	}
}