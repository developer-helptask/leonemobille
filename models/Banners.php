<?php
class Banners extends model{
public function __construct() {
	parent::__construct();
}

	public function getAll(){
		$array = array();

		$sql = "SELECT * FROM banners";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
		public function getAllLimit(){
		$array = array();

		$sql = "SELECT * FROM banners LIMIT 3";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
public function get($id){
	$array = array();
	$sql = "SELECT * FROM banners WHERE id = :id";
	$sql = $this->db->prepare($sql);
	$sql->bindValue(':id', $id);
	$sql->execute();

	if($sql->rowCount() > 0){
		$array = $sql->fetch();
	}
	return $array;
}
	
	public function add($name,$images,$url,$alt,$title){

		$linkimage = '';
		if(count($images) > 0){
			$tipos = array('image/jpeg', 'image/jpg', 'image/png');
			if(in_array($images['type'], $tipos)){
				$tipo = 'images';

				$linkimage = md5(time().rand(0,999));
				switch ($images['type']) {
					case 'image/jpeg':
					case 'image/jpg':
						$linkimage .= '.jpg';
						break;
					case 'image/png';
						$linkimage .= '.png';
						break;	
					
				}
				move_uploaded_file($images['tmp_name'], 'assets/images/uploads/banners/'.$linkimage);
			}
		}


		$sql = "INSERT INTO banners (name,image,url,alt,title) VALUES (:name,:image,:url,:alt,:title)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->bindValue(':image', $linkimage);
		$sql->bindValue(':url', $url);
		$sql->bindValue(':alt', $alt);
		$sql->bindValue(':title', $title);
		$sql->execute();
	}

	public function delete($id){
		$sql = "DELETE FROM banners WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
}