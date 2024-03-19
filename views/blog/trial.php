<?php

foreach($Vol as $flight){
	 $id=$flight->idVol;
	 $datedep=$flight->DateDep;
	 $datearr=$flight->DateArrivee;
	 $heuredep=$flight->HeureDep;
	 $heurearr=$flight->HeureArr;
	 $prix=$flight->PrixBillet;
	 $places=$flight->NbrPlaces;
	 $escale=$flight->Escales;
 }
 
 foreach($Compagnie as $comp){
	 $idC=$comp->id_Comp;
	 $name=$comp->NomComp;
	 $Iata=$comp->CodeIATA;
	 $siege=$comp->Siege;
	 $phone=$comp->Telephone;
	 $mail=$comp->Email;
	 $etat=$comp->Etat;
	 $logo=$comp->Logo;
 }
 foreach($Avion as $plane){
	 $idA=$plane->idAvion;
	 $immat=$plane->Immat;
	 $nom=$plane->NomAv;
	 $entr=$plane->DateEntree;
	 $nbrplace=$plane->NbrPlaces;
	 $type=$plane->typeAv;
 }
 foreach($Depart as $aero1){
	 $nomdep=$aero1->NomAeroport;
	 $loc1=$aero1->Localisation;
 }
 foreach($Destination as $aero2){
	 $nomarr=$aero2->NomAeroport;
	 $loc2=$aero2->Localisation;
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Essaie</title>

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

<body id="home" style="font-family:Comic Sans Ms;">


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
	
      <ul class="nav navbar-nav"> 
		<li><?php echo isset($error) ? $error: '';?></li>
		<li><a href="<?php echo site_url ('Welcome/index');?>">Accueil </a></li>
        <li><a href="#Connect" data-toggle="modal"><button class="btn btn-default"><i class="fa fa-key">&nbsp;</i>Se Connecter</button></a></li>
        <li><a href="#Inscription" data-toggle="modal"><button class="btn btn-default"><i class="fa fa-edit">&nbsp;</i>S'inscrire</button></a></li>
		<li><a href="#About" data-toggle="modal"><button class="btn btn-default"><i class="fa fa-question">&nbsp;</i>A propos</button></a></li> 
      </ul>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>



<br>
	<div class="container wowload fadeInDown">
	<div class="col-sm-1">
	</div>
	<div class="col-sm-10">
		<div class="panel panel-green" style="border:1px solid green;">
		<div class="panel-heading" style="background-color:rgb(20,128,20);">
		<div class="row">
		<div class="col-xs-3">
		<h1 style="color:white;font-size:50px"><i class="fa fa-plane"></i></h1>
		</div>
		<div class="col-xs-9 text-right">
		<div style="color:white;">Détails sur le Vol</div>
		<div class="huge">
		<h2 style="color:white; font-family:Century Gothic"><?php echo '  Vol N° '.$id;?> et Images du <?php echo ' '.$nom;?></h2>
		</div>
		</div>
		</div>
		</div>
				<table class="table ">
								
											<tr>
												<td class="danger"> </i> <i class="fa fa-plane"></i> Vol Numero</td>
												<td class="danger"> </i> <i class="fa fa-plane"></i><?php echo $id; ?></td><td></td><td><a href ="#Confirmer" title="Vous pouvez réserver et payer au guichet avant l'embarquement" data-toggle="modal" class="btn btn-success">Reserver sur ce vol</a></td>
											</tr>
											<tr>
												<td class="success">Compagnie</td>
												<td class="danger"><?php echo $name;?></td>
											</tr>
											<tr>
												<td class="success">Départ</td>
												<td class="danger"><?php echo$nomdep ; ?></td>
											</tr>
											<tr>
												<td class="success">Heure Départ : </td>
												<td class="danger"><?php echo $heuredep; ?></td>
											
												<td  class="success">Date Départ : </td>
												<td class="danger"><?php echo $datedep; ?></td>
											</tr>
											<tr>
												<td  class="success">Arrivée</td>
												<td class="danger"><?php echo $nomarr; ?></td>
											</tr>
											<tr>
												<td  class="success">Heure Arrivée : </td>
												<td class="danger"><?php echo $heurearr;?></td>
											
												<td  class="success">Date Arrivée : </td>
												<td class="danger"><?php echo $datearr;?></td>
											</tr>
											<tr>
												<td  class="success">Prix du Billet</td>
												<td class="danger"><?php echo '<i style="color:red;"> A partir de '.$prix.' $</i>';?></td>
											</tr>
											<tr>
												<td  class="success">Escales</td>
												<td class="danger"><?php echo $escale;?></td><td></td><td><a href="#portif" title="Afficher les Photos" class="btn btn-primary">Voir les Photos!!</a></td>
											</tr>
							</table>
		</div>
	</div>
		<div class="col-sm-1">
	</div>
	</div>
	
<div class="container" id="portif">

      <center><p> <h1 class="title" style="font-family:Century Gothic;color:blue;">Images du  <?php echo $nom;?></h1></p></center>
       <div class="row gallery">
				<?php foreach($Image as $found){ ?>
              <div class="col-sm-4 wowload fadeInUp"><a href="<?php echo base_url($found->Url);?>" title="<?php echo $found->NomImage;?>" class="gallery-image" data-gallery><img src="<?php echo base_url($found->Url);?>" style="width:350px;height:250px;" class="img-responsive"></a></div>
                <?php   }?>
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
                        <li><a href="http://www.echoflight.com">Echo Flight</a></li>        
                        <li><a href="http://www.airserv.co.ug">Air Serv</a></li>
                        <li><a href="http://www.caa.cd">CAA</a></li>
                        <li><a href="http://www.hewabora.cd"></a>Hewa Bora</li>
                        <li><a href="http://www.aircongo.cd">Air Congo</a></li>
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
                    <a href="http://www.facebook.com"><i class="fa fa-facebook-square" data-toggle="tooltip" data-placement="top" data-original-title="facebook"></i></a>
                    <a href="http://www.instagram.com"><i class="fa fa-instagram"  data-toggle="tooltip" data-placement="top" data-original-title="instragram"></i></a>
                    <a href="http://www.twitter.com"><i class="fa fa-twitter-square" data-toggle="tooltip" data-placement="top" data-original-title="twitter"></i></a>
                    <a href="http://www.pinterest.com"><i class="fa fa-pinterest-square" data-toggle="tooltip" data-placement="top" data-original-title="pinterest"></i></a>
                    <a href="http://www.tumblr.com"><i class="fa fa-tumblr-square" data-toggle="tooltip" data-placement="top" data-original-title="tumblr"></i></a>
                    <a href="http://www.youtube.com"><i class="fa fa-youtube-square" data-toggle="tooltip" data-placement="top" data-original-title="youtube"></i></a>
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