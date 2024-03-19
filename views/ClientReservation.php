<!DOCTYPE html>
<?php $connect=new mysqli('localhost','root','','flightmanagement');
	  $res="SELECT*FROM Reservation WHERE idClient='".$this->session->userdata('idClient')."' ORDER By Date";
	  $reseek=$connect->query($res);
?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?php echo $this->session->userdata('NomCl')." ".$this->session->userdata('Prenom');?></title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">


<!-- bootstrap -->
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" />

<!-- uniform -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/uniform/css/uniform.default.min.css'); ?>" />

<!-- animate.css -->
<link rel="stylesheet" href="<?php echo base_url('assets/wow/animate.css'); ?>" />


<!-- gallery -->
<link rel="stylesheet" href="<?php echo base_url('assets/gallery/blueimp-gallery.min.css'); ?>">


<!-- favicon -->
<link rel="shortcut icon" href="<?php echo base_url('images/favicon.png'); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo base_url('images/favicon.png'); ?>" type="image/x-icon">

<link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">

</head>

<body id="home" style="font-family:Comic Sans Ms; background-image:url('<?php echo base_url('images/back.jpg');?>');">


<!-- top 
  <form class="navbar-form navbar-left newsletter" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter Your Email Id Here">
        </div>
        <button type="submit" class="btn btn-inverse">Subscribe</button>
    </form>
 top -->

<!-- header -->
<nav class="navbar  navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <br>
      
	<a class="navbar-brand" href="#Mprofil" title="Voir Votre Compte" data-toggle="modal">
         <img class="img-circle" style="width:50px; height:50px" src="<?php echo base_url($this->session->userdata('Avatar'));?>" alt="" />
	</a>
        <div class="collapse navbar-collapse navbar-left">
        <ul class="nav navbar-nav">
            <li> <a href="#Mprofil" title="Voir Votre Compte" style="color:black;font-family:Matura MT Script Capitals;" data-toggle="modal">Bonjour &nbsp;<?php echo $this->session->userdata('NomCl')." ".$this->session->userdata('Prenom');?>&nbsp; !&nbsp;&nbsp;&nbsp;&nbsp;</a><li>
        </ul>
        </div>
		</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav">
		
        <li><a href="<?php echo site_url ('Welcome/index');?>"><i class="fa fa-home">&nbsp;</i>Accueil </a></li>
		<li><a href="<?php echo site_url('gestion/client');?>" title="Retour"><i class="fa fa-angle-left">&nbsp;</i>Page Précédente</a></li>
        <li><a title="Ecraser la session de Connexion" href="<?php echo site_url ('utilisateur/deconnexion');?>"><button class="btn btn-default"><i class="fa fa-cogs">&nbsp</i>Déconnexion</button></a></li>
      </ul>
    </div><!-- Wnavbar-collapse -->
  <!-- container-fluid -->
  </div>
</nav>

<div class="container">
<div class="col-sm-5">
</div>
<div class="col-sm-5">
<?php echo $this ->session ->flashdata('msg'); ?>
</div>
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-3">
<h3 style="color:black;font-family:Century Gothic;"><?php echo $this->session->userdata('NomCl')." ".$this->session->userdata('Prenom');?></h3>
    <div class="wowload fadeInLeft"><img style="width:250px;height:250px" class="img-circle" src="<?php echo base_url($this->session->userdata('Avatar'));?>" alt="" /></div>
</div>
<div class="col-sm-8">
<h4>Voici vos réservations en cours</h4>
<table class="table">
<thead>
<tr><th>Vol</th><th>Date de réservation</th><th>Date du vol</th><th>Heure du vol</th><th>Compagnie</th><th>Etat de Réservation</th></tr>
</thead>
<tbody>
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
		
		$aerotry="SELECT*FROM Aeroport WHERE idAeroport='".$vol->idAeroDest."';";
		$aeroseek=$connect->query($aerotry);
		$aeroport=$aeroseek->fetch_object();
		
		$aero2try="SELECT*FROM Aeroport WHERE idAeroport='".$vol->idAeroDep."';";
		$aero2seek=$connect->query($aero2try);
		$aeroport2=$aero2seek->fetch_object();

?>
<tr><td><?php echo $reserv->idVol;?></td><td><?php echo $reserv->Date;?></td><td><?php echo $vol->DateDep;?></td><td><?php echo $vol->HeureDep;?></td><td><?php echo $comp->NomComp;?></td><?php if ($reserv->StatusReservation=="NC"){ echo '<td><a style="color:green;" data-toggle="modal" title="Paramètres Avancés" href="#Ops'.$reserv->idReservation.'"><i class="fa fa-lock">&nbsp</i> Non Confirmé &nbsp;<i class="fa fa-eye"></i></a></td>';} 

elseif($reserv->StatusReservation=="C"){ echo '<td><a data-toggle="modal" href="#View'.$reserv->idReservation.'" style="color:blue;" title="Voir Etat">Confirmé - Cliquez ici</i></a></td>';} ?></tr>

<div class="modal fade " id="<?php echo "Ops".$reserv->idReservation;?>" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
<div class="modal-dialog " style="width:350px;">  
<div class="modal-content panel-green ">				
<div class="panel-heading">
<div class="modal-body" style="height:250px;overflow-y: auto;">	
											
											
<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-user"></i>&nbsp;Réservation sur&nbsp;<?php echo $reserv->idVol;?></h4>
<br>
<center>
<label>
<?php echo form_open_multipart('reservation/cancelRes',array('method'=>'post'));?>
<br>
Votre Réservation est en attente de confirmation
</label>
<br>
<input type="hidden" value="<?php echo $reserv->idReservation;?>" name="id" />
<input type="hidden" name="id2" value="<?php echo $reserv->idVol; ?>"/>
<input type="hidden" name="placesres" value="<?php echo $reserv->NbrPlaces; ?>"/>
<input type="hidden" name="placesvol" value="<?php echo $vol->NbrPlaces; ?>"/>
<br>
Souhaitez-vous l'annuler?
</center>
											
</div>
<div class="modal-footer">
<div class="form-group">
<center>
<button type="submit" class="btn btn-danger"><span class="fa fa-edit"></span>   Annuler</button>
<button type="submit" class="btn btn-success" data-dismiss="modal"><span class="fa fa-trash"></span>   Quitter</button>
<?php echo form_close();?>
											
</center>
</div>
<p>
<i><h3 style="font_family:NewTime Roman; color:black; font-size:15px; text-align:center;">&copy; RVA <?php echo date('Y');?>|tout droit réservé</h3></i>
</div> 
</div>
</div>
</div> 
				
</div>




<div class="modal fade " id="<?php echo "View".$reserv->idReservation;?>" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
<div class="modal-dialog " style="width:600px;">  
<div class="modal-content panel-green ">				
<div class="panel-heading">
<div class="modal-body" style="height:320px;overflow-y: auto; background-color:rgb(220,255,220)">	
											
											
<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-plane"></i>&nbsp;Réservation sur&nbsp;<?php echo $reserv->idVol;?></h4>
<br>

<p style="font-family:Century Gothic; color:black">
<?php if ($this->session->userdata('Sexe')=="F"){ echo 'Très Chère Madame <b>'.$this->session->userdata('NomCl').' '.$this->session->userdata('Prenom').'</b>';}elseif($this->session->userdata('Sexe')=="M"){ echo 'Très Cher Monsieur '.$this->session->userdata('NomCl').' '.$this->session->userdata('Prenom');}?>
<br>Votre Réservation pour <i class="fa-fa-plane">&nbsp;</i><span style="color:green;"><?php echo $reserv->idVol;?></span> a été confirmée par <span style="color:lime;font-weight:bold;"><?php echo $comp->NomComp;?></span>
<br>
<br>
Nous Vous attendons au <?php echo '<span style="color:purple;">'.$vol->DateDep.'</span> avant <span style="color:blue">'.$vol->HeureDep.'</span>';?>
<br>
<br>
Soyez à temps au guichet à l'<?php echo '<span style="color:red">'.$aeroport2->NomAeroport.'</span> pour payer votre Billet';?>
<br>
Nous vous garantissons un service de qualité jusqu'à <span style="color:cyan;font-weight:bold;"><?php echo $aeroport->Localisation;?></span>
<br>
</p>
<center>
<h1><i style="color:purple;">Bon Voyage!</i></h1>
</center>											
</div>
<div class="modal-footer">
<div class="form-group">
<center>

<button type="submit" class="btn btn-success" data-dismiss="modal"><span class="fa fa-refresh"></span>&nbsp;Fermer</button>
											
</center>
</div>
</div> 
</div>
</div>
</div> 
				
</div>




<?php }?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<!-- reservation-information -->



<!-- services -->
<div class="spacer services wowload fadeInUp">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="<?php echo base_url('images/photos/8.jpg'); ?>" class="img-responsive" alt="slide"></div>                
                <div class="item  height-full"><img src="<?php echo base_url('images/photos/9.jpg'); ?>"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="<?php echo base_url('images/photos/10.jpg'); ?>"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Le confort<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="TourCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="<?php echo base_url('images/photos/6.jpg'); ?>" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="<?php echo base_url('images/photos/3.jpg'); ?>"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="<?php echo base_url('images/photos/4.jpg'); ?>"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">L'écoute<a href="<?php echo site_url('gallery.php'); ?>" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="FoodCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="<?php echo base_url('images/photos/1.jpg');?>" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="<?php echo base_url('images/photos/2.jpg');?>"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="<?php echo base_url('images/photos/5.jpg'); ?>"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">La rapidité<a href="<?php echo site_url('gallery.php'); ?>" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>
    </div>
</div>
</div>


<footer class="spacer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4>Régie des Voies Aériennes RDC</h4>
                    <p>Nous sommes une grande équipe mobilisée pour le service de la population Congolaise. Rendez-vous la vie facile en rejoignant notre plate-forme. Soyez plus expéditif dans vos réservations. Contactez nos compagnies et vous ne serez pas déçu. Consultez les programmes des vols et réservez dans le vol de votre choix auprès de la compagnie qui vous fournit le meilleur offre.  </p>
                </div>              
                 
                 <div class="col-sm-3">
                    <h4>Liens Rapides</h4>
                    <ul class="list-unstyled">
                        <li><a href="rooms-tariff.php">Rooms & Tariff</a></li>        
                        <li><a href="introduction.php">Introduction</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="tour.php">Tour Packages</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                 <div class="col-sm-4 subscribe">
                    <h4>Vos suggéstions</h4>
                    <div class="input-group">
                    <textarea class="form-control" placeholder="Votre Message Ici" name="mailing"></textarea>
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Envoyez</button>
                    </span>
                    </div>
                    <div class="social">
                    <a href="#"><i class="fa fa-facebook-square" data-toggle="tooltip" data-placement="top" data-original-title="facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"  data-toggle="tooltip" data-placement="top" data-original-title="instragram"></i></a>
                    <a href="#"><i class="fa fa-twitter-square" data-toggle="tooltip" data-placement="top" data-original-title="twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest-square" data-toggle="tooltip" data-placement="top" data-original-title="pinterest"></i></a>
                    <a href="#"><i class="fa fa-tumblr-square" data-toggle="tooltip" data-placement="top" data-original-title="tumblr"></i></a>
                    <a href="#"><i class="fa fa-youtube-square" data-toggle="tooltip" data-placement="top" data-original-title="youtube"></i></a>
                    </div>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container-->    
    
    <!--/.footer-bottom--> 
</footer>

<div class="text-center copyright">&copy Tous droits Réservés - <a href="http://www.rva-rdc.com">Régie des voies aériennes</a></div>

<a href="#home" class="toTop scroll"><i class="fa fa-angle-up"></i></a>




<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>

<script src="<?php echo base_url('assets/jquery.js'); ?>"></script>

<!-- wow script -->
<script src="<?php echo base_url('assets/wow/wow.min.js'); ?>"></script>

<!-- uniform -->
<script src="<?php echo base_url('assets/uniform/js/jquery.uniform.js'); ?>"></script>


<!-- boostrap -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js'); ?>" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="<?php echo base_url('assets/mobile/touchSwipe.min.js'); ?>"></script>

<!-- jquery mobile -->
<script src="<?php echo base_url('assets/respond/respond.js'); ?>"></script>

<!-- gallery -->
<script src="<?php echo base_url('assets/gallery/jquery.blueimp-gallery.min.js'); ?>"></script>


<!-- custom script -->
<script src="<?php echo base_url('assets/script.js'); ?>"></script>

</body>
</html>