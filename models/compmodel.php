<?php
class compmodel extends CI_Model{
    
    public function __construct(){
        parent::__construct();
		$this->tableName='Compagnie';
    }
	public function modComp($data, $id){
		$this->db->where("id_Comp",$id);
		$this->db->update($this->tableName,$data);
	}
	public function getComp($comp){
		$question = $this->db->query("SELECT*FROM Compagnie WHERE id_Comp='$comp';");
		return $question->result();
	}
}
?>