<?php
class resmodel extends CI_Model{
    
    public function __construct(){
        parent::__construct();
		$this->tableName='Reservation';
		$this->tableVol='Vol';
    }
	public function getReservation($id){
		$query3 = $this->db->query("SELECT*FROM Reservation WHERE idVol='".$id."';");
		return $query3->result();
	}
	public function setStatus($data, $id){
		$this->db->where("idReservation",$id);
		$this->db->update($this->tableName,$data);
    }
	public function deleteRes($id){
		$this->db->query("DELETE FROM Reservation WHERE idReservation='".$id."';");
	}
	public function modVolinRes($data,$ident){
        $this->db->where("idVol",$ident);
		$this->db->update($this->tableVol,$data);
		}
	public function reserver($data = array()){
		$insert = $this -> db-> insert ($this ->tableName,$data );
			if($insert){
				return $this -> db-> insert_id ();
			}
			else{
				return false ;
			}
	}
}
?>