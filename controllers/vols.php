<?php
	class vols extends CI_Controller{
		public function __construct(){
		parent::__construct();
		$this->load->helper(array('string'));
		}
	public function index(){
		$this->startmenu();
	}
	public function setStatusVol(){
		$this->load->model('volsmodel');
		$id=$this->input->post('id');
		$data=array('StatusVol'=>$this->input->post("etat"),'idAgent'=>$this->input->post('agent'));
			$resultat=$this->volsmodel->setStatusVol($data,$id);
				$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable col-sm-4">Modification réussi!!!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
				redirect('gestion/AdminViewVol','refresh');
		
	} 
	public function getVol1(){
		$this->load->model('volsmodel');
		$dep=$this->input->post('aerodep');
		$dest=$this->input->post('aerodest');
		$jour=$this->input->post('jour');
		$mois=$this->input->post('mois');
		$annee=$this->input->post('annee');
		$date=$annee.'-'.$mois.'-'.$jour;
		$dateSent=$jour.'-'.$mois.'-'.$annee;
		$resultat=$this->volsmodel->getVol1($dep,$dest,$date);
		if($resultat){
			if($date > date('Y-m-d')){
			$tab=array('date'=>$date,'sent'=>$dateSent,'dep'=>$dep,'dest'=>$dest);
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Vols Disponibles pour le '.$dateSent.'</div>');
			$this->session->set_flashdata('tab',$dateSent);
			$this->session->set_flashdata('tab1',$date);
			$this->session->set_flashdata('tab2',$dep);
			$this->session->set_flashdata('tab3',$dest);
			redirect('gestion/viewVolDateDest');
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable"> La date du '.$dateSent.' est dépassée. Veuillez sélectionner parmis les autres Vols proposés!</div>');
			redirect('gestion/viewVol');
		}
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Aucun Vol disponible pour le '.$dateSent.'. Veuillez sélectionner parmis les autres Vols proposés!</div>');
			redirect('gestion/viewVol');
		}	
	}
	public function getVol2(){
		$this->load->model('volsmodel');
		$jour=$this->input->post('jour');
		$mois=$this->input->post('mois');
		$annee=$this->input->post('annee');
		$date=$annee.'-'.$mois.'-'.$jour;
		$dateSent=$jour.'-'.$mois.'-'.$annee;
		$resultat=$this->volsmodel->getVol2($date);
		$today = date('Y-m-d');
		if($resultat){
			if($date > $today){
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Vols Disponibles pour le '.$dateSent.'</div>');
			$this->session->set_flashdata('tab',$dateSent);
			$this->session->set_flashdata('tab1',$date);
			redirect('gestion/viewVolDate');
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable"> La date du '.$dateSent.' est dépassée. Veuillez sélectionner parmis les autres Vols proposés!</div>');
			redirect('gestion/viewVol');
		}
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Aucun Vol disponible pour le '.$dateSent.'. Veuillez sélectionner parmis les autres Vols proposés!</div>');
			redirect('gestion/viewVol');
		}	
	}
	
	public function getVol3(){
		$this->load->model('volsmodel');
		$dest=$this->input->post('aerodest');
		$resultat=$this->volsmodel->getVol3($dest);
		if($resultat){
			$this->session->set_flashdata('tab',$dest);
			redirect('gestion/viewVolDest');
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Aucun Vol disponible pour votre recherche! Veuillez sélectionner parmis les autres Vols proposés!</div>');
			redirect('gestion/viewVol');
		}	
	}
	
	
	public function getVolCl1(){
		$this->load->model('volsmodel');
		$dep=$this->input->post('aerodep');
		$dest=$this->input->post('aerodest');
		$jour=$this->input->post('jour');
		$mois=$this->input->post('mois');
		$annee=$this->input->post('annee');
		$date=$annee.'-'.$mois.'-'.$jour;
		$dateSent=$jour.'-'.$mois.'-'.$annee;
		$resultat=$this->volsmodel->getVol1($dep,$dest,$date);
		if($resultat){
			if ($date > date('Y-m-d')){
			$tab=array('date'=>$date,'sent'=>$dateSent,'dep'=>$dep,'dest'=>$dest);
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Vols Disponibles pour le '.$dateSent.'</div>');
			$this->session->set_flashdata('tab',$dateSent);
			$this->session->set_flashdata('tab1',$date);
			$this->session->set_flashdata('tab2',$dep);
			$this->session->set_flashdata('tab3',$dest);
			redirect('gestion/ClientViewVolDateDest');
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable"> La date du '.$dateSent.' est dépassée. Veuillez sélectionner parmis les autres Vols proposés!</div>');
			redirect('gestion/ClientViewVol');
		}
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Aucun Vol disponible pour le '.$dateSent.'. Veuillez sélectionner parmis les autres Vols proposés!</div>');
			redirect('gestion/ClientViewVol');
		}	
	}
	public function getVolCl2(){
		$this->load->model('volsmodel');
		$jour=$this->input->post('jour');
		$mois=$this->input->post('mois');
		$annee=$this->input->post('annee');
		$date=$annee.'-'.$mois.'-'.$jour;
		$dateSent=$jour.'-'.$mois.'-'.$annee;
		$resultat=$this->volsmodel->getVol2($date);
		if($resultat){
			if ($date > date('Y-m-d')){
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Vols Disponibles pour le '.$dateSent.'</div>');
			$this->session->set_flashdata('tab',$dateSent);
			$this->session->set_flashdata('tab1',$date);
			redirect('gestion/ClientViewVolDate');
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable"> La date du '.$dateSent.' est dépassée. Veuillez sélectionner parmis les autres Vols proposés!</div>');
			redirect('gestion/ClientViewVol');
		}
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Aucun Vol disponible pour le '.$dateSent.'. Veuillez sélectionner parmis les autres Vols proposés!</div>');
			redirect('gestion/ClientViewVol');
		}	
	}
	
	public function getVolCl3(){
		$this->load->model('volsmodel');
		$dest=$this->input->post('aerodest');
		$resultat=$this->volsmodel->getVol3($dest);
		if($resultat){
			$this->session->set_flashdata('tab',$dest);
			redirect('gestion/ClientViewVolDest');
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Aucun Vol disponible pour votre recherche! Veuillez sélectionner parmis les autres Vols proposés!</div>');
			redirect('gestion/ClientViewVol');
		}	
	}
	
		
		public function programmer(){
		$this->load->model('volsmodel');
		$date1=$this->input->post('annee1').'-'.$this->input->post('mois1').'-'.$this->input->post('jour1');
		$date2=$this->input->post('annee2').'-'.$this->input->post('mois2').'-'.$this->input->post('jour2');
		$userData = array('idVol'=>$this->input->post('id'),'DateDep'=>$date1,'DateArrivee'=>$date2,'HeureDep'=>$this->input->post('heuredep'),'HeureArr'=>$this->input->post('heurearr'),'PrixBillet'=>$this->input->post('prix'),'StatusVol'=>$this->input->post('status'),'NbrPlaces'=>$this->input->post('place'),'Escales'=>$this->input->post('escales'),'idAvion'=>$this->input->post('idAv'),'idAeroDep'=>$this->input->post('idAero1'),'idAeroDest'=>$this->input->post('idAero2'));
		$progrdata=array('DateProgr'=>date('Y-m-d'),'idAgent'=>$this->input->post('agent'),'idVol'=>$this->input->post('id'));
		
		//Passation des donnees au model
		$insertUserData = $this->volsmodel->programmer($userData);
		$insertProgr = $this->volsmodel->insertProgr($progrdata);
		//Message de confirmation de l'insertion.
		if(!$insertUserData){$this->session->set_flashdata('msg' ,'<h4><div class="alert alert-info alert-dismissable">Le vol a été programmé !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
		}
		else{
		$this->session->set_flashdata('msg' , '<h4><div class="alert alert-info alert-dismissable">Un Problème est survenu, Veuillez réessayer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
		}
	
		//Form for adding user data
				 
		return redirect('gestion/OpsVol', 'refresh');
		}
		
		private function sendMail(){
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
			$this->email->to('');
			$this->email->subject('Notification d\'annulation de Vol');
			$this->email->message('Votre vol pour... a été annulé! Veuillez nous excuser');
		}
		public function modifier1(){
		$this->load->model('volsmodel');
		$id = $this->input->post('id');
		$agent = $this->input->post('agent');
			$data=array(
				'idAvion'=> $this->input->post('Av')
				);
			$donnee=array(
				'DateProgr' => date('Y-m-d'),
				'idAgent' => $agent
			);
			
			$resultat=$this->volsmodel->modifier($data,$id);
			$resultat2=$this->volsmodel->modifierProgr($donnee,$id);
			$this->session->set_flashdata('tab',$id);
			$this->session->set_flashdata('msg', '<h4><div class="alert alert-info alert-dismissable">Appareil Changés !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
			redirect('gestion/FormModVol');
	}
	public function modifier2(){
		$this->load->model('usermodel');
		$this->load->model('resmodel');
		$this->load->model('volsmodel');
		$phone=$this->input->post('num');
		$comp=$this->input->post('comp');
		$id = $this->input->post('id');
		$agent = $this->input->post('agent');
		$datearr = $this->input->post('annee2').'-'.$this->input->post('mois2').'-'.$this->input->post('jour2');
		$datedep = $this->input->post('annee1').'-'.$this->input->post('mois1').'-'.$this->input->post('jour1');

		$HeureDep = $this->input->post('heuredep');
		$HeureArr = $this->input->post('heurearr');
		$donnee=array(
				'DateProgr' => date('Y-m-d'),
				'idAgent' => $agent
			);
			
			$resultat=$this->volsmodel->modifier2($id,$datedep,$datearr,$HeureDep,$HeureArr);
			$resultat2=$this->volsmodel->modifierProgr($donnee,$id);
			
		$ask=$this->resmodel->getReservation($id);
		foreach($ask as $row){
			$row->idClient=$idCl;
			$dem=$this->usermodel->getClient($idCl);
			foreach($dem as $got){
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
			$this->email->to($got->Email);
			$this->email->subject('Notification de Modification du Vol Réservé');
			$this->email->message('Le Vol '.$id.' de la compagnie '.$comp.' a été modifié!Rendez-vous sur le site pour plus d\'infos ou appelez le : '.$phone);
		}	
		}
		
			
			
			$this->session->set_flashdata('tab',$id);
			
			$this->session->set_flashdata('msg', '<h4><div class="alert alert-info alert-dismissable">Dates et Heures modifiées!!!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
			redirect('gestion/FormModVol');
	}
	public function modifier3(){
		$this->load->model('usermodel');
		$this->load->model('resmodel');
		$this->load->model('volsmodel');
		$phone=$this->input->post('num');
		$comp=$this->input->post('comp');
		$id = $this->input->post('id');
		$agent = $this->input->post('agent');
		$data=array(
				'PrixBillet' => $this->input->post('prix'),
				'NbrPlaces'=> $this->input->post('place'),
				'Escales'=> $this->input->post('escales'));
				
		$donnee=array(
				'DateProgr' => date('Y-m-d'),
				'idAgent' => $agent
			);
			
		$resultat=$this->volsmodel->modifier3($data,$id);
		$resultat2=$this->volsmodel->modifierProgr($donnee,$id);
		$ask=$this->resmodel->getReservation($id);
		foreach($ask as $row){
			$row->idClient=$idCl;
			$dem=$this->usermodel->getClient($idCl);
			foreach($dem as $got){
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
			$this->email->to($got->Email);
			$this->email->subject('Notification de Modification du Vol Réservé');
			$this->email->message('Le Vol '.$id.' de la compagnie '.$comp.' a été modifié!Rendez-vous sur le site pour plus d\'infos ou appelez le : '.$phone);
	}
	}
			$this->session->set_flashdata('tab',$id);
			$this->session->set_flashdata('msg', '<h4><div class="alert alert-info alert-dismissable">Le Prix, le nombre des places et les escales sont modifiés!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>');
			redirect('gestion/FormModVol');
	}
	public function getVol(){
		$this->load->model('volsmodel');
		$id=$this->input->post('vol');
		$resultat=$this->volsmodel->getVol($id);
		
		$this->session->set_flashdata('tab',$id);
		redirect('gestion/FormModVol');
	}
	public function getVolCancelled(){
		$this->load->model('volsmodel');
		$id=$this->input->post('vol');
		$resultat=$this->volsmodel->getVol($id);
		
		$this->session->set_flashdata('tab',$id);
		redirect('gestion/FormCancelVol');
	}
	public function CancelVol1(){
		$this->load->model('usermodel');
		$this->load->model('resmodel');
		$this->load->model('volsmodel');
		$id=$this->input->post('vol');
		$phone=$this->input->post('num');
		$comp=$this->input->post('comp');
		$raison=$this->input->post('raison');
		$ask=$this->resmodel->getReservation($id);
		foreach($ask as $row){
			$row->idClient=$idCl;
			$dem=$this->usermodel->getClient($idCl);
			foreach($dem as $got){
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
			$this->email->to($got->Email);
			$this->email->subject('Notification de suppression de Vol');
			$this->email->message('Le Vol '.$id.' de la compagnie '.$comp.' a été annulé! Veuillez nous excuser, contactez notre service client au '.$phone.'Raison d\'annulation : '.$raison);
	}
	}
	$resultat=$this->volsmodel->CancelVol($id);
	$this->session->set_flashdata('msg', '<h5><div class="alert alert-info alert-dismissable">Le vol est annulé et supprimé définitivement du système! Les Clients Sont informés<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h5>');
		redirect('gestion/CancelVol','refresh');
	}
}
?>