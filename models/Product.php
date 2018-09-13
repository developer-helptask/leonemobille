<?php
class Product extends model{
public function __construct() {
	parent::__construct();
}

	public function getAll(){
		$array = array();

		$sql = "SELECT * FROM produtos";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
public function get($id){
	$array = array();
	$sql = "SELECT * FROM produtos WHERE id = :id";
	$sql = $this->db->prepare($sql);
	$sql->bindValue(':id', $id);
	$sql->execute();

	if($sql->rowCount() > 0){
		$array = $sql->fetch();
	}
	return $array;
}
	public function add($categorias,$name,$images){

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
				move_uploaded_file($images['tmp_name'], 'assets/images/uploads/produtos/'.$url);
			}
		}



		$sql = "INSERT INTO produtos (name,images,id_category) VALUES (:name,:images,:id_category)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->bindValue(':images', $url);
		$sql->bindValue(':id_category', $categorias);
		$sql->execute();
	}

	public function delete($id){
		$sql = "DELETE FROM produtos WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function listar ($qt = 0){
		$sql =  "SELECT * FROM produtos";
		if($qt > 0){
			$sql .= "LIMIT ".$qt;
		}

		$sql = $this->db->query($sql);
		$produtos = array();

		if($sql->rowCount() > 0){
			$produtos = $sql->fetchAll();
		}

		return $produtos;

	}

	public function listar_categoria($cat){
		$sql = "SELECT * FROM produtos WHERE id_category = '$cat'";
		$sql = $this->db->query($sql);
		$produtos = array();
		if($sql->rowCount() > 0){
			$produtos = $sql->fetchAll();
		}

		return $produtos;
	}
}