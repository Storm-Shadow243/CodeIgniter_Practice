
<?php $connect=new mysqli('localhost','root','','flightmanagement');
	  $res="SELECT*FROM Reservation WHERE idClient='".$this->session->userdata('idClient')."' ORDER By Date";
	  $reseek=$connect->query($res);
?>
<?php 
	while($reserv=$reseek->fetch_object()){
		$volget="SELECT*FROM Vol WHERE idVol='".$reserv->idVol."';";
		$volseek=$connect->query($volget);
		$vol=$volseek->fetch_object();
		
		$avionget="SELECT*FROM Avion WHERE idAvion='".$vol->idAvion."';";
		$avionseek=$connect->query($avionget);
		$avion=$avionseek->fetch_object();
		
		$compget="SELECT*FROM Compagnie WHERE id_Comp='".$avion->id_Comp."';";
		$compseek=$connect->query($compget);
		$comp=$compseek->fetch_object();
	}
?>