<?php
class volsmodel extends CI_Model{
    
    public function __construct(){
        parent::__construct();
		$this->tableName='Vol';
		$this->protable='Programmer';
    }
	public function setStatusVol($data, $id){
		$this->db->where("idVol",$id);
		$this->db->update($this->tableName,$data);
	}
	public function getVol1($dep,$dest,$date){
		$query = $this->db->query("SELECT*FROM Vol WHERE idAeroDep='$dep' AND idAeroDest='$dest' AND DateDep='$date' ORDER BY DateDep;");
		return $query->result();
	}
	public function getVol2($date){
		$query2 = $this->db->query("SELECT*FROM Vol WHERE DateDep='$date' ORDER BY DateDep;");
		return $query2->result();
	}
	public function getVol($id){
		$question = $this->db->query("SELECT*FROM Vol WHERE idVol='$id';");
		return $question->result();
	}
	public function getVol3($dest){
		$query3 = $this->db->query("SELECT*FROM Vol WHERE idAeroDest='$dest' AND DateDep >'".date('Y-m-d')."' ORDER BY DateDep;");
		return $query3->result();
	}
	public function programmer($data = array()){
		$insert = $this -> db-> insert ($this ->tableName,$data );
			if($insert){
				return $this -> db-> insert_id ();
			}
			else{
				return false ;
			}
	}
	public function insertProgr($data = array()){
		$insert = $this -> db-> insert ($this ->protable,$data );
			if($insert){
				return $this -> db-> insert_id ();
			}
			else{
				return false ;
			}
	}
	public function modifier($data,$id){
        $this->db->where("idVol",$id);
		$this->db->update($this->tableName,$data);
		}
	
	public function modifier2($id,$datedep,$datearr,$HeureDep,$HeureArr){
        $try=$this->db->query("UPDATE Vol SET
								DateDep='$datedep',
								DateArrivee='$datearr',
								HeureDep='$HeureDep',
								HeureArr='$HeureArr'
								WHERE idVol='".$id."';"
								);
		return $try;
		}
	public function modifier3($data,$id){
        $this->db->where("idVol",$id);
		$this->db->update($this->tableName,$data);
		}
	public function modifierProgr($donnee,$id){
        $this->db->where("idVol",$id);
		$this->db->update($this->protable,$donnee);
		}
	public function CancelVol($id){
       $this->db->query("DELETE FROM Vol WHERE idVol='".$id."';");
	}
	public function getAeroport($id){
		$question = $this->db->query("SELECT*FROM Aeroport WHERE idAeroport='$id';");
		return $question->result();
	}
}
?>