<?php
class Category extends model{
public function __construct() {
	parent::__construct();
}

	public function getAll(){
		$array = array();

		$sql = "SELECT * FROM category";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function get($id){
		$array = array();

		$sql =  "SELECT * FROM category WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}
		return $array;
	}


	public function add($name,$status,$images){

				$url = '';
		if(count($images) > 0){
			$tipos = array('image/jpeg', 'image/jpg', 'image/png');
			if(in_array($images['type'], $tipos)){
				$tipo = 'images';

				$url = md5(time().rand(0,999));
				switch ($images['type']) {
					case 'image/jpeg':
					case 'image/jpg':
						$url .= '.jpg';
						break;
					case 'image/png';
						$url .= '.png';
						break;	
					
				}
				move_uploaded_file($images['tmp_name'], 'assets/images/uploads/categorias/'.$url);
			}
		}

		$sql = "INSERT INTO category (name,status,imagem_destacada) VALUES (:name,:status,:imagem_destacada)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->bindValue(':status', $status);
		$sql->bindValue(':imagem_destacada', $url);
		$sql->execute();
	}

	public function edit($name, $id){
		$sql =  "UPDATE category SET name = :name WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function delete($id){
		$sql = "DELETE FROM category WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
}