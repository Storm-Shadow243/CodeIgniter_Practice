<?php
	class gestion extends CI_Controller{
		public function __construct(){
		parent::__construct();
		$this->load->model('avionmodel');
		$this->load->model('volsmodel');
		$this->load->model('compmodel');
		}
	public function index(){
		return redirect('Welcome', 'refresh');
	}
	public function adminViewVol(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('AdminViewVol');}
	}
	public function compagnie(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('compagnie');}
	}
	public function client(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('client');}
	}
	public function aeroport(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('aeroport');}
	} 
	public function viewVolDateDest(){
		if ($this->session->flashdata('tab')=="" || $this->session->flashdata('tab1')=="" || $this->session->flashdata('tab2')=="" || $this->session->flashdata('tab3')==""){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable"> Page Expirée! Relancez la recherche !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('viewVol',$data);
		}
		else{
		$this->load->view('viewVolDateDest');}
	}
	public function viewVolDest(){
		if ($this->session->flashdata('tab')==""){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Page Expirée! Relancez la recherche !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('viewVolDest');}
	}
	public function viewVolDate(){
		if ($this->session->flashdata('tab')=="" || $this->session->flashdata('tab1')==""){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Page Expirée! Relancez la recherche !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('viewVolDate');}
	}
	public function viewVol(){
		$this->load->view('viewVol');
	}
	public function ClientViewVolDateDest(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		if ($this->session->flashdata('tab')=="" || $this->session->flashdata('tab1')=="" || $this->session->flashdata('tab2')=="" || $this->session->flashdata('tab3')==""){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable"> Page Expirée! Relancez la recherche !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('client',$data);
		}
		else{$this->load->view('ClientViewVolDateDest');}
		}
	}
	public function ClientViewVolDest(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		if ($this->session->flashdata('tab')==""){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Page Expirée! Relancez la recherche !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('client',$data);
		}
		else{
		$this->load->view('ClientViewVolDest');}
	}
	}
	public function ClientViewVolDate(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		if ($this->session->flashdata('tab')=="" || $this->session->flashdata('tab1')==""){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Page Expirée! Relancez la recherche !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('client',$data);
		}
		else{
		$this->load->view('ClientViewVolDate');}
	}
	}
	public function ClientViewVol(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('ClientViewVol');}
	}
	public function OpsVol(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('OpsVol');}
	}
	public function OpsRes(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('OpsRes');}
	}
	public function reservations(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('reservations');}
	}
	public function MajVol(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('MajVol');}
	}
	public function CancelVol(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('CancelVol');}
	}
	public function FormModVol(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('FormModVol');}
	}
	public function FormCancelVol(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('FormCancelVol');}
	}
	public function printBill(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->library('Pdf');
		$this->load->view('test');}
	}
	public function printBill2(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$donnee=array('vol'=>$this->input->post('vol'),
					  'res'=>$this->input->post('res'),
					  'avion'=>$this->input->post('avion'),
					  'immat'=>$this->input->post('immat'),
					  'type'=>$this->input->post('type'),
					  'comp'=>$this->input->post('comp'),
					  'compC'=>$this->input->post('compC'),
					  'logo'=>$this->input->post('logo'),
					  'aero'=>$this->input->post('aero'),
					  'loc'=>$this->input->post('loc'),
					  'code'=>$this->input->post('code'),
					  'aero2'=>$this->input->post('aero2'),
					  'loc2'=>$this->input->post('loc2'),
					  'code2'=>$this->input->post('code2'),
					  'place'=>$this->input->post('place'),
					  'prix'=>$this->input->post('prix'));
		$this->load->library('Pdf');
		$this->load->view('test2',$donnee);}
		
	}
	public function ClientRes(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		//$this->load->library('Pdf');
		$this->load->view('ClientRes');}
	}
public function ClientReservation(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		//$this->load->library('Pdf');
		$this->load->view('ClientReservation');}
	}
	public function ResBlogged(){
		$vol=$this->input->post('vol');
		$avion=$this->input->post('avion');
		$comp=$this->input->post('comp');
		$dep=$this->input->post('aerodep');
		$dest=$this->input->post('aerodest');
		
		$tab = array ('Vol'=>$this->volsmodel->getVol($vol),
					  'Avion'=>$this->avionmodel->getAvion($avion),
					  'Image'=>$this->avionmodel->getImage($avion),
					  'Compagnie'=>$this->compmodel->getComp($comp),
					  'Depart'=>$this->volsmodel->getAeroport($dep),
					  'Destination'=>$this->volsmodel->getAeroport($dest));
		
		$this->load->view('blog/ResBlogged',$tab);
	}
	public function ResBloggedCl(){
		$vol=$this->input->post('vol');
		$avion=$this->input->post('avion');
		$comp=$this->input->post('comp');
		$dep=$this->input->post('aerodep');
		$dest=$this->input->post('aerodest');
		
		$tab = array ('Vol'=>$this->volsmodel->getVol($vol),
					  'Avion'=>$this->avionmodel->getAvion($avion),
					  'Image'=>$this->avionmodel->getImage($avion),
					  'Compagnie'=>$this->compmodel->getComp($comp),
					  'Depart'=>$this->volsmodel->getAeroport($dep),
					  'Destination'=>$this->volsmodel->getAeroport($dest));
		
		$this->load->view('blog/ResBloggedCl',$tab);
	}
	public function Avions(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('Avions');}
	}
	public function trial(){
		$vol=$this->input->post('vol');
		$avion=$this->input->post('avion');
		$comp=$this->input->post('comp');
		$dep=$this->input->post('aerodep');
		$dest=$this->input->post('aerodest');
		
		$tab = array ('Vol'=>$this->volsmodel->getVol($vol),
					  'Avion'=>$this->avionmodel->getAvion($avion),
					  'Image'=>$this->avionmodel->getImage($avion),
					  'Compagnie'=>$this->compmodel->getComp($comp),
					  'Depart'=>$this->volsmodel->getAeroport($dep),
					  'Destination'=>$this->volsmodel->getAeroport($dest));
		
		$this->load->view('blog/trial',$tab);
	}
	public function FetchAvions(){
		if ($this->session->userdata('logged_in')==FALSE){
			$data['error'] = '<h4><div class="alert alert-info alert-dismissable">Connectez-vous Pour Continuer !<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div></h4>';
			$this->load->view('index',$data);
		}
		else{
		$this->load->view('AvionsView');
		}
	}
}
?>