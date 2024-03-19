<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	$this->load->model('usermodel');
		$this->load->library(array('form_validation'));
		if (isset ($_COOKIE['privilege']) && isset ($_COOKIE['Email']) && isset ($_COOKIE['Password'])){
			if ($_COOKIE['privilege']=="Client"){
			if($this->usermodel->connexionClient($_COOKIE['Email'],$_COOKIE['Password'])){
				foreach ($this->usermodel->connexionClient($_COOKIE['Email'],$_COOKIE['Password']) as $row){
							$sess_data=array(
							'idClient'=>$row->idClient,
							'NomCl'=>$row->NomCl,
							'Prenom'=>$row->Prenom,
							'Sexe'=>$row->Sexe,
							'Adresse'=>$row->Adresse,
							'Telephone'=>$row->Telephone,
							'Email'=>$row->Email,
							'Password'=>$row->Password,
							'NumP'=>$row->NumeroPieceIdentite,
							'Nationalite'=>$row->Nationalite,
							'Avatar'=>$row->AvatarClient);
						$this->session->set_userdata($sess_data);
						$this->load->view('client');
				}
			}
			else{return $this->loading();}
		}
		elseif($_COOKIE['privilege']=="AgentRVA"){
			if($this->usermodel->connexionAgentRva($_COOKIE['Email'],$_COOKIE['Password'])){
				foreach ($this->usermodel->connexionAgentRva($_COOKIE['Email'],$_COOKIE['Password']) as $row){
							$sess_data=array(
							'idAgent'=>$row->idAgent,
							'Nom'=>$row->Nom,
							'Prenom'=>$row->Prenom,
							'Service'=>$row->Service,
							'Matricule'=>$row->Matricule,
							'Adresse'=>$row->Adresse,
							'Email'=>$row->Email,
							'Password'=>$row->Password,
							'Telephone'=>$row->Telephone,
							'AvatarAgent'=>$row->AvatarAgent,
							'idAeroport'=>$row->idAeroport);
						$this->session->set_userdata($sess_data);
						$this->load->view('aeroport');
				}
			} 
			else{return $this->loading();}
		}
		elseif($_COOKIE['privilege']=="AgentComp"){
			if($this->usermodel->connexionAgentComp($_COOKIE['Email'],$_COOKIE['Password'])){
				foreach ($this->usermodel->connexionAgentComp($_COOKIE['Email'],$_COOKIE['Password']) as $row){
							$sess_data=array(
							'idAgent'=>$row->idAgent,
							'Nom'=>$row->Nom,
							'Prenom'=>$row->Prenom,
							'Service'=>$row->Service,
							'Fonction'=>$row->Fonction,
							'Adresse'=>$row->Adresse,
							'Email'=>$row->Email,
							'Password'=>$row->Password,
							'Telephone'=>$row->Telephone,
							'AvatarAgent'=>$row->AvatarAgent,
							'id_Comp'=>$row->id_Comp);
						$this->session->set_userdata($sess_data);
						$this->load->view('compagnie');
				}
			} 
			else{return $this->loading();}
	}
		else{return $this->loading();}
	}
	else{return $this->loading();}
}
public function loading(){
		$this->load->model('usermodel');
		$this->load->library(array('form_validation'));
		
		setcookie("privilege",'',0,"/");
		setcookie("Email",'',0,"/");
		setcookie("Password",'',0,"/");
		
		$this->load->view('index');
		}
}
