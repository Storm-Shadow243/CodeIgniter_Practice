
<!DOCTYPE html>
<?php $connect=new mysqli('localhost','root','','flightmanagement');
	  $this->session->keep_flashdata('tab');
	 
	  $getVol="SELECT*FROM Vol WHERE idAeroDest ='".$this->session->flashdata('tab')."' AND DateDep >'".date('Y-m-d')."' AND StatusVol='Autorise' ORDER BY DateDep;";
	  $vol=$connect->query($getVol);
	  	
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Régie des voies Aériennes | RVA</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<!-- font awesome -->
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

<body id="home" style="font-family:Comic Sans Ms; background-image: url('<?php echo base_url('images/back.jpg');?>')">


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
      <a class="navbar-brand" href="index.php"><img src="<?php echo base_url('images/logo.png'); ?>"  alt="holiday crown"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
		<?php echo isset($error) ? $error: '';?>
      <ul class="nav navbar-nav">   
		<li><a href="<?php echo site_url ('Welcome/index');?>">Accueil </a></li>
        <li><a href="#Connect" data-toggle="modal"><button class="btn btn-default"><i class="fa fa-key">&nbsp;</i>Se Connecter</button></a></li>
        <li><a href="#Inscription" data-toggle="modal"><button class="btn btn-default"><i class="fa fa-edit">&nbsp;</i>S'inscrire</button></a></li>
		<li><a href="#About" data-toggle="modal"><button class="btn btn-default"><i class="fa fa-question">&nbsp;</i>A propos</button></a></li> 
      </ul>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->
<?php 
		   $aerodep="SELECT*FROM Aeroport WHERE idAeroport='".$this->session->flashdata('tab')."'";
		   $aero1=$connect->query($aerodep);
		   $aero1f=$aero1->fetch_object();


?>

<div class="container">
	  <?php echo $this ->session ->flashdata('msg');?>
	  <hr/>
	 <div class="alert alert-danger text-center" ><h3 style="color: blue; font-family:Century Gothic;">Voici La liste des Vols pouvant attérir à&nbsp;<i style="color: black;"><?php echo $aero1f->Localisation." dans l'".$aero1f->NomAeroport;?></i></h3></div>
	  <hr/>
	  <div class="row">
      <?php while($volt=$vol->fetch_object()){
		   $av="SELECT*FROM Avion WHERE idAvion='".$volt->idAvion."'";
		   $avion=$connect->query($av);
		   $avionyetu=$avion->fetch_object();
		   		   
		  $aerodep1="SELECT*FROM Aeroport WHERE idAeroport='".$volt->idAeroDep."'";
		  $aero2=$connect->query($aerodep1);
		  $aero2f=$aero2->fetch_object();
	  
		   
		   $comp1="SELECT*FROM Compagnie WHERE id_Comp='".$avionyetu->id_Comp."'";
		   $com=$connect->query($comp1);
		   $compa=$com->fetch_object();
			echo'<a href="#reserv'.$volt->idVol.'" title="Cliquez pour Reserver" data-toggle="modal"><div class="col-sm-3"><div class="panel panel-default"><div class="panel-heading">
				<h4 class="panel-title">'.$compa->NomComp.'</h4>
				</div><div class="panel-body"><p><ul class="list list-unstyled" style="color:purple;"><li>Départ : '.$aero2f->Localisation.'</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$aero2f->NomAeroport.'</li><li>Escales : '.$volt->Escales.'</li><li>Date d\'arrivée : '.$volt->DateArrivee.'</li><li>Heure du Vol : '.$volt->HeureDep.'</li><li>Heure d\'arrivée : '.$volt->HeureArr.'</li><li style="color:green;">Prix : <i style="color:lime">A partir de </i> '.$volt->PrixBillet.' $</li><li>Type Appareil : '.$avionyetu->typeAv.'</li><li style="color:red;">Places disponibles : '.$volt->NbrPlaces.'</li></ul></p></div><div class="panel-footer">Nom Avion : '.$avionyetu->NomAv.'</div></div></div></a>';
	  
	   ?>
	   <div class="modal fade" id="reserv<?php echo $volt->idVol;?>" style="font_family:'NewTime Romani';">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(51,122,183);">
					<button class="close" data-dismiss="modal">x</button>
					<h4 class="modal-title" style="text-align:center; font-family:Comic Sans Ms; color:black"><i class="fa fa-plane"></i>&nbsp;Reserver chez&nbsp;<?php echo $compa->NomComp;?>&nbsp;Pour le Vol de&nbsp;<?php echo $avionyetu->NomAv;?></h4>
				</div>
				<div class="modal-body">
				<div class="row">
				<div class="col-md-offset-2 col-md-8">
                    <Center>     
					<h4>Vous ne pouvez reserver sans être connecté sur le site</h4>
					<hr/>
					</Center>
					<ul class="list list-unstyled" style="color:black;font-family:Century Gothic;">
					<li>Vol :&nbsp;<?php echo $volt->idVol;?> </li>
					<li>De :&nbsp;<?php echo $avionyetu->NomAv.' - type : '.$avionyetu->typeAv;?> </li>
					<li>Compagnie :&nbsp;<?php echo $compa->NomComp;?> </li>
					<li>Décolle de&nbsp;<?php echo $aero1f->Localisation.' à l\''.$aero1f->NomAeroport;?> </li>
					<li>A la date&nbsp;<?php echo $volt->DateDep.' à '.$volt->HeureDep;?> </li>
					<li>Attérit à&nbsp;<?php echo $aero2f->Localisation.' à l\''.$aero2f->NomAeroport;?> </li>
					<li>A la date&nbsp;<?php echo $volt->DateArrivee.' à '.$volt->HeureArr;?> </li>
					<li>Après escale à&nbsp;<?php echo $volt->Escales;?> </li>
					</ul>              
                <hr/>                
				</div>
				<?php echo form_open('gestion/ResBlogged');?>
				<input type="hidden" name="vol" value="<?php echo $volt->idVol;?>"/>
				<input type="hidden" name="aerodep" value="<?php echo $volt->idAeroDep;?>"/>
				<input type="hidden" name="aerodest" value="<?php echo $volt->idAeroDest;?>"/>
				<input type="hidden" name="avion" value="<?php echo $avionyetu->idAvion;?>"/>
				<input type="hidden" name="comp" value="<?php echo $avionyetu->id_Comp;?>"/>
				<center><button type="submit" class="btn btn-primary">Plus de Détails</button></center>
				<?php echo form_close();?>
				</div>
				</div>
			</div>
		</div>
		</div>
	   
	   
	 <?php  }?>
       
 </div><center>
<p class="animated fadeInUp" style="color:rgb(255,255,255)"><a href="<?php echo site_url('gestion/viewVol');?>" class="btn btn-primary"><i class="fa fa-plane">&nbsp;</i>Tous les programmes des Vols ?&nbsp;<i class="fa fa-search"></i></a></p>
</center>
</div>


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
<!-- services -->
<footer class="spacer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4>Régie des voies Aériennes</h4>
                    <p>Nous sommes une grande équipe mobilisée pour le service de la population du Congolaise. Rendez-vous la vie facile en rejoignant notre plate-forme. Soyez plus expéditif dans vos réservations. Contactez nos compagnies et vous ne serez pas déçu. Consultez les programmes des vols et réservez dans le vol de votre choix auprès de la compagnie qui vous fournit le meilleur offre.  </p>
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
                    <h4>Suggestions</h4>
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Votre E-mail Ici">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Envoyer</button>
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

<div class="text-center copyright">&copy Tous droits Réservés - <a href="http://rva-rdc.com">Régie des voies aériennes</a></div>

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




<div class="modal fade" id="Connect" style="font_family:'NewTime Romani';">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(191,161,69);">
					<button class="close" data-dismiss="modal">x</button>
					<h3 class="modal-title" style="text-align:center; font_family:NewTime Romani; color:black">Connexion</h3>
				</div>
				<div class="modal-body">
				<div class="row">
				<div class="col-md-offset-2 col-md-8">
                    <Center>     
					
						<?php echo form_open('utilisateur/connexion', array('method'=>'post'));?>
						<input type="hidden" value="Client" name="privilege" />
						<br>
						<input type="text" class="form-control" placeholder="Votre E-mail" name="email" value="" required />
                        <br>                     
                        <input type="password" class="form-control" placeholder="Votre Mot de Passe" name="password" value="" required />
						
						<br>
						
                        <button type="submit" class="btn btn-default" name="CONNECT" value=""><i class="fa fa-key"></i>  &nbsp; Connexion</button>
						<br>
						<br>
						<span style="color:black; font_family:NewTime Romani;">Copyright &copy 2017-RVA/Bukavu.</span>
						<?php echo form_close();?>
                    </Center>              
                                    
				</div>
				</div>
				</div>
			</div>
		</div>
		</div>
		
		
		<div class="modal fade" id="Inscription" style="font_family:'NewTime Romani';">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: white;">
					<button class="close" data-dismiss="modal">x</button>
					<h3 class="modal-title" style="text-align:center; font-family:Century Gothic; color:black">INSCRIPTION</h3>
				</div>
				<div class="modal-body" style="overflow-y:auto;">
				<div class="row">
				<div>
					
				   <Center> 
						<?php echo $this ->session ->flashdata('error_msg' ); ?>
						<?php echo form_open_multipart('utilisateur/inscrireCl', array('method'=>'post'));?>
						<br>
						<div class="form-group col-sm-4">
						<input style="color:black;" type="text" class="form-control" placeholder="Nom" name="Nom" required />
						<br>
						<input style="color:black;" type="text" class="form-control" placeholder="Prenom" name="Prenom" required />
						<br>
						<select style="color:black;" name="Sexe" class="form-control"><option value="M" >Votre Sexe</option><option value="M">Homme</option><option value="F">Fémin</option><select>
						<br>
						<br>
						<input style="color:black;" type="text" class="form-control" placeholder="Date de Naissance" name="DateNaissance" required />
						<br>
						<input style="color:black;" type="text" class="form-control" placeholder="Numéro de Téléphone" name="Telephone" required />
						<br>
						</div><div class="form-group col-sm-4">
						<input style="color:black;" type="text" class="form-control" placeholder="Email" name="Email" required />
                        <br>                     
                        <input style="color:black;" type="password" class="form-control" placeholder="Mot de Passe" name="Password" required />
						<br>
						<input style="color:black;" type="password" class="form-control" placeholder="Confirmer mot de passe" name="Password1" required />
						<br>
						<input style="color:black;" type="text" class="form-control" placeholder="Numero de Carte d'identité" name="NumeroPieceIdentite" required />
						<br>
						<input style="color:black;" type="text" class="form-control" placeholder="Nationalité" name="Nationalite" required />
						<label>Votre Photo</label><?php echo form_upload('picture');?></div>
                        <button type="submit" class="btn btn-success" name="userSubmit" value=""><i class="fa fa-key"></i>  &nbsp; S'inscrire</button>
						<br>
						<br>
						<?php echo form_close();?>
						<span style="color:black; font_family:NewTime Romani;">Copyright &copy 2017-RVA/Bukavu.</span>
					
                    </Center>              
                                    
				</div>
 				</div>
				</div>
			</div>
		</div>
		</div>
		
		
	<div class="modal fade" id="About" style="font_family:'NewTime Romani';">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(191,161,69);">
					<button class="close" data-dismiss="modal">x</button>
					<h3 class="modal-title" style="text-align:center; font_family:NewTime Romani; color:black">A propos de Nous</h3>
				</div>
				<div class="modal-body" style="background-color: rgb(191,101,10);">
				<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<img class="img-circle" style="width:120px; height:120px; float:left;" src="<?php echo base_url('images/Johannes.jpg');?>" />
				    <h4 style="color:black;font-family:Comic Sans Ms;">Ce site est un projet qui s'inscrit dans le cadre du mémoire de fin de cycle de Licence de l'étudiant de l'ISP Bukavu, KAHASHA BAHATI Jean Rostand, dirigé par le Chef de Travaux TASHO KASONGO Issa. C'est un travail de fin d'études universitaires en Pédagogie Appliquée, Option Informatique de Gestion.</h4>           
                    <br>
					<br>
	
				</div>
 				</div>
				<center>
				<a href="<?php echo base_url('attachements/UserGuide.pdf')?>" data-toggle="modal"><button class="btn btn-primary"><i class="fa fa-book">&nbsp;</i>Aide</button></a>
				<a href="<?php echo base_url('attachements/licence.txt')?>" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-star">&nbsp;</i>Licence</button></a>
				</center>
				</div>
			</div>
		</div>
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


<script>  
	
	$("#pop").popover({placement:'top', trigger:'hover'});
	$("#pop").popover({delay: { show: 800, hide: 300 }});
  $(function (){
    $("#afficher").click(function() {
      $("#afficher").hide();
      $(".alert").show("slow");
    }); 
    $(".close").click(function() {
      $(".alert").hide("slow");
      $("#afficher").show();
    }); 
  }); 
  
  $(function(){
      $('.panel').collapse();
      $('#show, #hide, #toggle').click(function(){
        $('.panel').collapse($(this).attr('id'));
      });
  });
  $(function (){
				$('a').tooltip({ placement:'top' });
				});
	$(function (){
		$('.carousel').carousel({ interval: 2000 });
	});
	$(function () {
$('#first').click(function() { $('.carousel').carousel(0); });
$('#prev').click(function() {$('.carousel').carousel('prev'); });
$('#pause').click(function() { $('.carousel').carousel('pause');});
$('#play').click(function() { $('.carousel').carousel('cycle');});
$('#next').click(function() { $('.carousel').carousel('next');});
$('#last').click(function() { $('.carousel').carousel(2); });});

</script>


</body>
</html>