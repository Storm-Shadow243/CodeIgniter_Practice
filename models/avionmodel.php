<?php
class avionmodel extends CI_Model{
    
    public function __construct(){
        parent::__construct();
		$this->tableName='Avion';
		$this->tableImages='ImagesAvions';
    }
	public function setEtat($data, $id){
		$this->db->where("idAvion",$id);
		$this->db->update($this->tableName,$data);
	}
	public function nouvelAvion($data = array()){
		$insert = $this -> db-> insert ($this ->tableName,$data );
			if($insert){
				return $this -> db-> insert_id ();
			}
			else{
				return false ;
			}
	}
	public function upload($data = array()){
		$insert = $this -> db-> insert ($this ->tableImages,$data );
			if($insert){
				return $this -> db-> insert_id ();
			}
			else{
				return false ;
			}
	}
	public function getAvion($avion){
		$question = $this->db->query("SELECT*FROM Avion WHERE idAvion='$avion';");
		return $question->result();
	}
	public function getImage($avion){
		$question = $this->db->query("SELECT*FROM ImagesAvions WHERE idAvion='$avion';");
		return $question->result();
	}
	public function getAvions($comp){
		$question = $this->db->query("SELECT*FROM Avion WHERE id_Comp='$comp';");
		return $question->result();
	}
}
?>