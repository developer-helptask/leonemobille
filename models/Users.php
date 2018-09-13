<?php

class Users extends model{

	private $userInfo;
	public function isLogged(){
		
		if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
			return true;
		} else {
			return false;
		}
	}
	public function doLogin($name, $password){
		
		$sql = $this->db->prepare("SELECT * FROM users WHERE name = :name AND password = :password");
		$sql->bindValue(':name', $name);
		$sql->bindValue(':password', md5($password));
		$sql->execute();

		if($sql->rowCount() > 0){
			$row = $sql->fetch();
			$_SESSION['ccUser'] = $row['id'];

			return true; 
		} else {
			return false;
		}
	}

	public function setLoggedUser(){
		if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
			$id = $_SESSION['ccUser'];

			$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
			$sql->bindValue(':id', $id);
			$sql->execute();

			if($sql->rowCount() > 0){

					$this->userInfo = $sql->fetch();
			}
		}
	}

public function logout(){
	unset($_SESSION['ccUser']);
}



public function getEmail() {
	if(isset($this->userInfo['email'])){
	return $this->userInfo['email'];
} else {
	return '';
}
}
public function getName() {
	if(isset($this->userInfo['name'])){
	return $this->userInfo['name'];
} else {
	return '';
}
}
}