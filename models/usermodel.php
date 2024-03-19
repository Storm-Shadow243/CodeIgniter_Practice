 <?php
class UserModel  extends CI_Model{
    
    public function __construct(){
        parent::__construct();
		$this -> tableName = 'Client' ;
		$this -> primaryKey = 'idClient' ;
		$this -> tableComp = 'AgentComp' ;
		$this -> tableRva = 'AgentRva' ;
		$this -> Comp = 'Compagnie' ;
    }
	public function checkAccess($agent){
		$checker = $this->db->query("SELECT Etat FROM Compagnie WHERE id_Comp='$agent';");
        return $checker->result();
	}
    public function connexionAgentComp($email,$password){
        $query=  $this->db->query("SELECT*FROM AgentComp WHERE Email='$email' AND Password='$password';");
        return $query->result();
    }
	    public function connexionClient($email,$password){
        $question=  $this->db->query("SELECT*FROM Client WHERE Email='$email' AND Password='$password';");
        return $question->result();
    }
	    public function connexionAgentRva($email,$password){
        $ask=  $this->db->query("SELECT*FROM AgentRva WHERE Email='$email' AND Password='$password';");
        return $ask->result();
    }
	public function insert ($data = array()){
		$insert = $this -> db-> insert ($this ->tableName,$data );
			if($insert){
				return $this -> db-> insert_id ();
			}
			else{
				return false ;
			}
		}
	public function insertComp ($data = array()){
		$insert = $this -> db-> insert ($this ->Comp,$data );
			if($insert){
				return $this -> db-> insert_id ();
			}
			else{
				return false ;
			}
		}
	public function insertRva ($data = array()){
		$insert = $this -> db-> insert ($this ->tableRva,$data );
			if($insert){
				return $this -> db-> insert_id ();
			}
			else{
				return false ;
			}
		}
	public function insertAgentComp ($data = array()){
		$insert = $this -> db-> insert ($this ->tableComp,$data );
			if($insert){
				return $this -> db-> insert_id ();
			}
			else{
				return false ;
			}
		}
		
	public function modifierAgentRva($data,$id){
        $this->db->where("idAgent",$id);
		$this->db->update($this->tableRva,$data);
		}
	public function modifierAgentComp($data,$id){
        $this->db->where("idAgent",$id);
		$this->db->update($this->tableComp,$data);
		}
		
	public function modifierClient($data,$id){
        $this->db->where("idClient",$id);
		$this->db->update($this->tableName,$data);
		}
	public function setEtatComp($data,$id){
		$this->db->where("id_Comp",$id);
		$this->db->update($this->Comp,$data);
	}
	public function getClient($idCl){
		$query3 = $this->db->query("SELECT*FROM Client WHERE idClient='".$idCl."';");
		return $query3->result();
	}
	}
?>