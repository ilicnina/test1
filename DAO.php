<?php

include_once 'db.php';

class DAO{
	private $db;
	private $GETSTUDENT = "SELECT * FROM student WHERE id=?";
	private $INSERTSTUDENT = "INSERT INTO student (id,ime,prezime,brIndexa) VALUES (?,?,?,?)";
	private $UPDATESTUDENT = "UPDATE student SET ime=?, prezime=?, brIndexa=? WHERE id=?";
	private $DELETESTUDENT = "DELETE FROM student WHERE id=?";
	private $GETLASTNSTUDENT = "SELECT * FROM student ORDER BY id DESC LIMIT?";

	public function __construct(){
		$this->db=DB::createInstance();
	}

	public function getStudent($id){
		$statement = $this->db->prepare($this->GETSTUDENT);
		$statement->bindValue(1,$id);
		$statement->execute();

		$result = $statement->fetch();
		return $result;
	}

	public function insertStudent($id,$ime,$prezime,$brIndexa){
		$statement = $this->db->prepare($this->INSERTSTUDENT);
		$statement->bindValue(1, $id);
		$statement->bindValue(2, $ime);
		$statement->bindValue(3, $prezime);
		$statement->bindValue(4, $brIndexa);
		$statement->execute();	
	}

	public function updateStudent($id,$ime,$prezime,$brIndexa){
		$statement = $this->db->prepare($this->UPDATESTUDENT);
		$statement->bindValue(1, $id);
		$statement->bindValue(2, $ime);
		$statement->bindValue(3, $prezime);
		$statement->bindValue(4, $brIndexa);
		$statement->execute();
	}

	public function deleteStudent($id){
		$statement = $this->db->prepare($this->DELETESTUDENT);
		$statement->bindValue(1,$id);
		$statement->execute();

	}  

	//DODATNA FJA

	public function getLastNStudent($n){
		$statement = $this->db->prepare($this->GETLASTNSTUDENT);
		$statement->bindValue(1,$n, PDO::PARAM_INIT);
		$statement->execute();

		$result = $statement->fetch();
		return $result;
	}
}

?>


