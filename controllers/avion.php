<?php
	class avion extends CI_Controller{
		public function __construct(){
		parent::__construct();
		
		}
		public function setEtat(){
		$this->load->model('avionmodel');
		$id=$this->input->post('id');
		$data=array('Etat'=>$this->input->post("etat"));
		$resultat=$this->avionmodel->setEtat($data,$id);
			
		$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Etat de Service Modifié!!!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
		redirect('gestion/compagnie','refresh');
		}
		public function nouvelAvion(){
		$this->load->model('avionmodel');
		$date=$this->input->post('annee').'-'.$this->input->post('mois').'-'.$this->input->post('jour');
		//Preparation du tableau pour les donnees de l'utilisarteur
		$userData = array('NomAv'=>$this->input->post('nom'),'Immat'=>$this->input->post('immat'),'DateEntree'=>$date,'NbrPlaces'=>$this->input->post('place'),'PMAD'=>$this->input->post('pmad'),'Etat'=>$this->input->post('etat'),'typeAv'=>$this->input->post('type'),'id_Comp'=>$this->input->post('affectation'));
		//Passation des donnees au model
		$insertUserData = $this->avionmodel->nouvelAvion($userData );
		//Message de confirmation de l'insertion.
		if( $insertUserData ){$this->session->set_flashdata('msg' ,'<div class="alert alert-info alert-dismissable">Le '.$this->input->post('nom').' fait desormé partie de notre flotte!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
		}
		else{
		$this->session->set_flashdata('msg' , '<h4><div class="alert alert-info alert-dismissable">Un Problème est survenu, Veuillez réessayer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
		}
		return redirect('gestion/compagnie', 'refresh');
		}
		public function upload(){
		$this->load->model('avionmodel');
		$url=$this->do_upload();
		$name=$this->input->post('nom');
		$desc=$this->input->post('desc');
		$avion=$this->input->post('id');
		//Preparation du tableau pour les donnees de l'utilisarteur
		$userData = array('Url'=>$url,'NomImage'=>$name,'Description'=>$desc,'idAvion'=>$avion);
		//Passation des donnees au model
		$insertUserData = $this->avionmodel->upload($userData);
		//Message de confirmation de l'insertion.
		if( $insertUserData ){$this->session->set_flashdata('msg' ,'<div class="alert alert-info alert-dismissable">Téléchqrgement réussi!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
		}
		else{
		$this->session->set_flashdata('msg' , '<h4><div class="alert alert-info alert-dismissable">Un Problème est survenu, Veuillez réessayer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
		}
		return redirect('gestion/Avions', 'refresh');
		}	
		private function do_upload(){
		$type=explode('.',$_FILES["picture"]["name"]);
		$type=$type[count($type)-1];
		$url="./planes/images/".uniqid(rand()).'.'.$type;
		if(in_array($type, array("jpg","jpeg","png","gif"))){
			if(is_uploaded_file($_FILES["picture"]["tmp_name"])){
			move_uploaded_file($_FILES["picture"]["tmp_name"],$url);
			return $url;
		}
		else{
			return './planes/images/default.jpg/';
		}
	}
	else{return './planes/images/default.jpg/';}
		}
	}
?>