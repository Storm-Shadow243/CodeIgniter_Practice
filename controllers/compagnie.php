<?php
	class compagnie extends CI_Controller{
		public function __construct(){
		parent::__construct();
		
		}
		public function modComp(){
		$this->load->model('compmodel');
		$id=$this->input->post('id');
		$picture=$this->do_upload();
		$data=array('Siege'=>$this->input->post("siege"),'Telephone'=>$this->input->post("phone"),'Email'=>$this->input->post("email"),'Logo'=>$picture);
		$resultat=$this->compmodel->modComp($data,$id);
			
		$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissable">Modification réussie!!!<button href="#" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button></div>');
		redirect('gestion/compagnie','refresh');
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
	}
?>