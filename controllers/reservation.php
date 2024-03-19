<?php
	class reservation extends CI_Controller{
		public function __construct(){
		parent::__construct();
		
		}
	public function getReservation(){
		$this->load->model('resmodel');
		$id=$this->input->post('vol');
		$resultat=$this->resmodel->getReservation($id);
		if($resultat){
			$this->session->set_flashdata('tab',$id);
			redirect('gestion/OpsRes');
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Aucune Réservation disponible pour ce vol! Désolé!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
			redirect('gestion/reservations');
		}	
	}
	public function setStatus(){
		$this->load->model('resmodel');
		$phone=$this->input->post('compPhone');
		$id=$this->input->post('id');
		$tab=$this->input->post('flash');
		$status=$this->input->post('etat');
		$email=$this->input->post('mailing');
		if($status=="C"){
		$data=array('StatusReservation'=>$status);
		$resultat=$this->resmodel->setStatus($data,$id);
		$this->session->set_flashdata('tab',$tab);
		
		$config=array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'kahashajean@gmail.com',
			'smtp_pass' => 'kahashajohn'
			);
			
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('kahashajean@gmail');
		$this->email->to($email);
		$this->email->subject('Notification de Confirmation de Réservation');
		$this->email->message('Votre Réservation pour '.$tab.' a été approuvée! Veuillez vous rendre dans notre site pour voir et Imprimer Votre Billet. \n 
		Bienvenu(e) à Bord! \n Contactez notre service client au '.$phone);
		
		if ($this->email->send()){
		$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Réservation Approuvée!!! Un Email a été envoyé au client<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
		}
		else{$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Réservation Approuvée!!! Veuillez notifier le client<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');}

		redirect('gestion/OpsRes');
	}
	else{
		$resultat=$this->resmodel->deleteRes($id);
		
		$config=array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'kahashajean@gmail.com',
			'smtp_pass' => 'kahashajohn'
			);
			
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('kahashajean@gmail');
		$this->email->to($email);
		$this->email->subject('Notification d\'annulation de Réservation');
		$this->email->message('Votre Réservation pour '.$tab.' a été annulé! Veuillez nous excuser, contactez notre service client au '.$phone);
		
		if ($this->email->send()){
		$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Réservation Annulée et Supprimée!!! Un Email a été envoyé au client<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
		}
		else{$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Réservation Annulée et Supprimée!!! Veuillez notifier le client<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');}
		
		$this->session->set_flashdata('tab',$tab);
		redirect('gestion/OpsRes','refresh');
	}	
	}
	public function cancelRes(){
		$this->load->model('resmodel');
		$id=$this->input->post('id');
		$ident=$this->input->post('id2');
		$placesRes=$this->input->post('placesres');
		$placesVol=$this->input->post('placesvol');
		
		$newplaces=$placesRes+$placesVol;
		$resultat=$this->resmodel->deleteRes($id);
		$data=array(
		'NbrPlaces'=>$newplaces);
		$res=$this->resmodel->modVolinRes($data,$ident);
		
		$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Réservation Annulée et Supprimée!!!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
		redirect('gestion/ClientRes','refresh');

	}
	public function reserver(){
		if ($this->input->post('places') < $this->input->post('place')){
		$this->session->set_flashdata('msg' , '<h4><div class="alert alert-info alert-dismissable">Vous démandez Plus de places! Il n\'y en a pas assez SVP!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');	
		redirect('gestion/ClientViewVol', 'refresh');
		}
		else{
		$this->load->model('resmodel');
		$date=$this->input->post('dateR');
		$ident=$this->input->post('vol');
		$newplaces=$this->input->post('places')-$this->input->post('place');
		//Preparation du tableau pour les donnees de l'utilisarteur
		$userData = array('Date'=>$date,'NbrPlaces'=>$this->input->post('place'),'idClient'=>$this->input->post('client'),'StatusReservation'=>$this->input->post('status'),'idVol'=>$ident);
		//Passation des donnees au model
		$insertData = $this->resmodel->reserver($userData );
		//Message de confirmation de l'insertion.
		if( $insertData ){$this->session->set_flashdata('msg' ,'<h4><div class="alert alert-info alert-dismissable">Votre réservation a été crée, Veuiller suivre son déroulement !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
		$data=array(
		'NbrPlaces'=>$newplaces);
		$res=$this->resmodel->modVolinRes($data,$ident);
		}
		else{
		$this->session->set_flashdata('msg' , '<h4><div class="alert alert-info alert-dismissable">Un Problème est survenu, Veuillez réessayer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
		}
		}
		return redirect('gestion/client', 'refresh');
		}
}
?>