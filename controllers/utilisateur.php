<?php
	class Utilisateur extends CI_Controller{
		public function __construct(){
		parent::__construct();
		$this->load->helper(array('string'));
		}
	public function connexion(){
        $this->load->model('usermodel');
		if(!empty($this->input->post('privilege'))){
		$privilege=$this->input->post('privilege');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
				if ($privilege=="AgentComp"){
					$line = $this->usermodel->connexionAgentComp($email,$password);
					if($line){
						foreach ($line as $row){
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
							'id_Comp'=>$row->id_Comp,
							'logged_in'=>TRUE);
						$this->session->set_userdata($sess_data);
						$agent=$row->id_Comp;
						$cheking=$this->usermodel->checkAccess($agent);
						foreach($cheking as $chek){
						if($chek->Etat=="Actif"){
						setcookie('privilege',$privilege,time()+(86400 * 30),"/");
						setcookie('Email',$row->Email,time()+(86400 * 30),"/");
						setcookie('Password',$row->Password,time()+(86400 * 30),"/");
						redirect('gestion/compagnie');
						}else{
						$this->session->unset_userdata($sess_data);
						$data['error'] = $data['error'] = '<h4><div class="alert alert-info alert-dismissable">L\'accès de votre Compqgnie est bloqué !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
						$this->load->view('index',$data);
						}
						}
						
					}
					}
					else{
						$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Login ou mot de passe invalide !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
						$this->load->view('index',$data);
					}
				}
				elseif($privilege=="AgentRVA"){
					$line2 = $this->usermodel->connexionAgentRva($email,$password);
					if($line2){
						foreach ($line2 as $row){
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
							'idAeroport'=>$row->idAeroport,
							'logged_in'=>TRUE);
						$this->session->set_userdata($sess_data);
						setcookie('privilege',$privilege,time()+(86400 * 30),"/");
						setcookie('Email',$row->Email,time()+(86400 * 30),"/");
						setcookie('Password',$row->Password,time()+(86400 * 30),"/");
						redirect('gestion/aeroport');
					}
					}
					else{
						$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Login ou mot de passe invalide !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
						$this->load->view('index',$data);
					}
				}
			elseif($privilege=="Client"){
					$line3 = $this->usermodel->connexionClient($email,$password);
					if($line3){
						foreach ($line3 as $row){
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
							'Avatar'=>$row->AvatarClient,
							'logged_in'=>TRUE);
						$this->session->set_userdata($sess_data);
						setcookie('privilege',$privilege,time()+(86400 * 30),"/");
						setcookie('Email',$row->Email,time()+(86400 * 30),"/");
						setcookie('Password',$row->Password,time()+(86400 * 30),"/");
						redirect('gestion/client');
						}
					}
					else{
						$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Login ou mot de passe invalide !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
						$this->load->view('index',$data);
					}
				}
		}
		else {
						$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Veuillez remplir tous les Champs !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
						$this->load->view('index',$data);
		}
	}
	public function modifierCompteClient(){
		$this->load->model('usermodel');
		$id = $this->input->post("id");
		$picture = $this->do_upload();
			$pass1 = $this->input->post("pass1");
			$pass2 = $this->input->post("pass2");
			if($pass1==$pass2){
			
			$data=array(
				'Email' => $this->input->post("email"),
				'Adresse' => $this->input->post("adresse"),
				'Telephone' => $this->input->post("numtel"),
				'Password' => $pass2,
				'AvatarClient'=> $picture
			);
			$resultat=$this->usermodel->modifierClient($data,$id);
			
			$this->session->set_flashdata('msg', '<h4><div class="alert alert-info alert-dismissable">Profil mis à jour avec succès !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
			$sess_data=array(
							'idClient'=>$id,
							'NomCl'=>$this->input->post("nom"),
							'Prenom'=>$this->input->post("pre"),
							'NumP'=>$this->input->post("num"),
							'Nationalite'=>$this->input->post("nat"),
							'Sexe'=>$this->input->post("sex"),
							'Adresse'=>$this->input->post("adresse"),
							'Email'=>$this->input->post("email"),
							'Password'=>$pass2,
							'Telephone'=>$this->input->post("numtel"),
							'Avatar'=>$picture,
							'logged_in'=>TRUE);
						$this->session->set_userdata($sess_data);
				redirect ('gestion/client','refresh');
			}
			else{
				echo"<script>alert('Les mots de passe ne corresepondent pas!!!');</script>";
				redirect('gestion/client', 'refresh');
			}
		}
	public function modifierCompteAgent(){
		$this->load->model('usermodel');
		$id = $this->input->post("id");
		$picture = $this->do_upload();
			$pass1 = $this->input->post("pass1");
			$pass2 = $this->input->post("pass2");
			if($pass1==$pass2){
			
			$data=array(
                'Service' => $this->input->post("serv"),
				'Adresse' => $this->input->post("adresse"),
				'Email' => $this->input->post("email"),
				'Password' => $pass2,
				'Telephone' => $this->input->post("num"),
				'idAeroport' => $this->input->post("affectation"),
				'AvatarAgent'=> $picture
			);
			$resultat=$this->usermodel->modifierAgentRva($data,$id);
			
			$this->session->set_flashdata('msg', '<h4><div class="alert alert-info alert-dismissable">Profil mis à jour avec succès !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
			$sess_data=array(
							'idAgent'=>$id,
							'Nom'=>$this->input->post("nom"),
							'Prenom'=>$this->input->post("pre"),
							'Service'=>$this->input->post("serv"),
							'Matricule'=>$this->input->post("mat"),
							'Adresse'=>$this->input->post("adresse"),
							'Email'=>$this->input->post("email"),
							'Password'=>$pass2,
							'Telephone'=>$this->input->post("num"),
							'AvatarAgent'=>$picture,
							'idAeroport'=>$this->input->post("affectation"),
							'logged_in'=>TRUE);
						$this->session->set_userdata($sess_data);
				redirect ('gestion/aeroport','refresh');
			}
			else{
				echo"<script>alert('Les mots de passe ne corresepondent pas!!!');</script>";
				redirect('gestion/aeroport', 'refresh');
			}
		}
		
		
public function modifierCompteAgentComp(){
		$this->load->model('usermodel');
		$id = $this->input->post("id");
		$picture = $this->do_upload();
			$pass1 = $this->input->post("pass1");
			$pass2 = $this->input->post("pass2");
			if($pass1==$pass2){
			
			$data=array(
				'Fonction' => $this->input->post("fonct"),
                'Service' => $this->input->post("serv"),
				'Adresse' => $this->input->post("adresse"),
				'Email' => $this->input->post("email"),
				'Password' => $pass2,
				'Telephone' => $this->input->post("num"),
				'AvatarAgent'=> $picture
			);
			$resultat=$this->usermodel->modifierAgentComp($data,$id);
			
			$this->session->set_flashdata('msg', '<h4><div class="alert alert-info alert-dismissable">Profil mis à jour avec succès !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
			$sess_data=array(
							'idAgent'=>$id,
							'Nom'=>$this->input->post("nom"),
							'Prenom'=>$this->input->post("pre"),
							'Service'=>$this->input->post("serv"),
							'Fonction'=>$this->input->post("fonct"),
							'Adresse'=>$this->input->post("adresse"),
							'Email'=>$this->input->post("email"),
							'Password'=>$pass2,
							'Telephone'=>$this->input->post("num"),
							'AvatarAgent'=>$picture,
							'id_Comp'=>$this->input->post("comp"),
							'logged_in'=>TRUE);
						$this->session->set_userdata($sess_data);
				redirect ('gestion/compagnie','refresh');
			}
			else{
				echo"<script>alert('Les mots de passe ne corresepondent pas!!!');</script>";
				redirect('gestion/compagnie', 'refresh');
			}
		}
		
		
	public function deconnexion(){
		
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		setcookie("privilege",'',0,"/");
		setcookie("Email",'',0,"/");
		setcookie("Password",'',0,"/");
		return redirect('Welcome/index');
	}
	public function inscrireComp(){
		$this->load->model('usermodel');
		$picture = $this->do_upload();
		//Preparation du tableau pour les donnees de la compagnie
		$userData = array('NomComp'=>$this->input->post('nom'),'CodeIATA'=>$this->input->post('code'),'Siege'=>$this->input->post('siege'),'Telephone'=>$this->input->post('phone'),'Email'=>$this->input->post('email'),'Etat'=>$this->input->post('etat'),'Logo'=>$picture);
		//Passation des donnees au model
		$insertUserData = $this->usermodel->insertComp($userData );
		//Message de confirmation de l'insertion.
		if( $insertUserData ){$this->session->set_flashdata('msg' ,'<div class="alert alert-danger text-center">Votre Inscription a réussi<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
		}
		else{
		$this->session->set_flashdata('error_msg' , 'Un Problème est survenu, veuillez réesseyer.' );
		}
	
		//Form for adding user data
				 
		return redirect('gestion/aeroport', 'refresh');
	}
	
	
	public function inscrireCl(){
		if($this->input->post('Password')==$this->input->post('Password1')){
		$this->load->model('usermodel');
		$picture = $this->do_upload();
		//Preparation du tableau pour les donnees de l'utilisarteur
		$userData = array('NomCl'=>$this->input->post('Nom'),'Prenom'=>$this->input->post('Prenom'),'Sexe'=>$this->input->post('Sexe'),'DateNaissance'=>$this->input->post('DateNaissance'),'Telephone'=>$this->input->post('Telephone'),'Email'=>$this->input->post('Email'),'Password'=>$this->input->post('Password'),'NumeroPieceIdentite'=>$this->input->post('NumeroPieceIdentite'),'Nationalite'=>$this->input->post('Nationalite'),'AvatarClient'=>$picture);
		//Passation des donnees au model
		$insertUserData = $this->usermodel->insert($userData );
		//Message de confirmation de l'insertion.
		if( $insertUserData ){$data['error']='<div class="alert alert-danger text-center">Votre Inscription a réussi<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>';
		}
		else{
		$data['error']='<div class="alert alert-danger text-center">Une erreur est survenue<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>';
		}
	
		//Form for adding user data
				 
		$this->load->view('index',$data);
	}
	else{
		echo"<script>alert('Les mots de passe ne corresepondent pas!!!');</script>";
		redirect('Welcome', 'refresh');
	}	
	}
	public function inscrireAgentRva(){
		$this->load->model('usermodel');
		$picture = $this->do_upload();
		$pass1 = $this->input->post("pass1");
		$pass2 = $this->input->post("pass2");
		if($pass1==$pass2){
		//Preparation du tableau pour les donnees de l'utilisarteur
		$userData = array('Nom'=>$this->input->post('nom'),'Prenom'=>$this->input->post('prenom'),'Service'=>$this->input->post('serv'),'Matricule'=>$this->input->post('mat'),'Adresse'=>$this->input->post('adresse'),'Telephone'=>$this->input->post('num'),'Email'=>$this->input->post('email'),'Password'=>$pass2,'AvatarAgent'=>$picture,'idAeroport'=>$this->input->post('affectation'));
		//Passation des donnees au model
		$insertUserData = $this->usermodel->insertRva($userData );
		//Message de confirmation de l'insertion.
		if( $insertUserData ){$this->session->set_flashdata('success_msg' ,'<h4><div class="alert alert-info alert-dismissable">L\'agent est inscrit avec succès !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
		}
		else{
		$this->session->set_flashdata('error_msg' , '<h4><div class="alert alert-info alert-dismissable">Un Problème est survenu, Veuillez réessayer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
		}
	
		//Form for adding user data
				 
		return redirect('gestion/aeroport');
	}
	else{echo"<script>alert('Les mots de passe ne corresepondent pas!!!');</script>";
				redirect('gestion/aeroport', 'refresh');}
	}
	public function inscrireAgentComp(){
		$this->load->model('usermodel');
		$picture = $this->do_upload();
		$pass1 = $this->input->post("pass1");
		$pass2 = $this->input->post("pass2");
		if($pass1==$pass2){
		//Preparation du tableau pour les donnees de l'utilisarteur
		$userData = array('Nom'=>$this->input->post('nom'),'Prenom'=>$this->input->post('prenom'),'Service'=>$this->input->post('serv'),'Fonction'=>$this->input->post('fonct'),'Adresse'=>$this->input->post('adresse'),'Telephone'=>$this->input->post('num'),'Email'=>$this->input->post('email'),'Password'=>$pass2,'AvatarAgent'=>$picture,'id_Comp'=>$this->input->post('affectation'));
		//Passation des donnees au model
		$insertUserData = $this->usermodel->insertAgentComp($userData );
		//Message de confirmation de l'insertion.
		if( $insertUserData ){$this->session->set_flashdata('msg' ,'<h4><div class="alert alert-info alert-dismissable">L\'agent est inscrit avec succès !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
		}
		else{
		$this->session->set_flashdata('msg' , '<h4><div class="alert alert-info alert-dismissable">Un Problème est survenu, Veuillez réessayer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
		}
	
		//Form for adding user data
				 
		return redirect('gestion/compagnie', 'refresh');
	}
	else{echo"<script>alert('Les mots de passe ne corresepondent pas!!!');</script>";
				redirect('gestion/compagnie', 'refresh');}
	}
	
	private function do_upload(){
		$type=explode('.',$_FILES["picture"]["name"]);
		$type=$type[count($type)-1];
		$url="./uploads/images/".uniqid(rand()).'.'.$type;
		if(in_array($type, array("jpg","jpeg","png","gif"))){
			if(is_uploaded_file($_FILES["picture"]["tmp_name"])){
			move_uploaded_file($_FILES["picture"]["tmp_name"],$url);
			return $url;
		}
		else{
			return './uploads/images/default.png/';
		}
	}
	else{return './uploads/images/default.png/';}
		}
	public function setEtatComp(){
		$this->load->model('usermodel');
		$id=$this->input->post('id');
		$data=array('Etat'=>$this->input->post("etat"));
			$resultat=$this->usermodel->setEtatComp($data,$id);
			
			
				$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Modification Réussie!!!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
				redirect('gestion/aeroport','refresh');
		}
	
	}
?>
