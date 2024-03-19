<!DOCTYPE html>
<html lang="en">
<?php $connect=new mysqli('localhost','root','','flightmanagement');
	  $aero="SELECT*FROM Aeroport ORDER BY Localisation";
	  $aeroresul=$connect->query($aero);
	  $aeroresul2=$connect->query($aero);
	  $aeroresul3=$connect->query($aero);
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
<!-- header -->





<!-- banner -->
<div class="banner">    	   
    <img src="<?php echo base_url('images/photos/banner.jpg');?>"  class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information"><center>
			<div  style="background-color:rgb(51,153,255);width:60%;border-radius:10px 10px 10px 10px;">
                <h1  class="animated fadeInDown" style="color:white;">Régie des Voies Aériennes</h1></div></center>
                <p class="animated fadeInUp" style="color:rgb(255,255,255)"><a href="<?php echo site_url('gestion/viewVol');?>" class="btn btn-primary"><i class="fa fa-plane">&nbsp;</i>Rétrouvez tous les programmes des vols et réservez</a></p>                
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>
<!-- banner-->


<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-7 col-md-8">
    <div class="wowload fadeInLeft"><iframe src="<?php echo base_url('images/photos/oscar.gif');?>" width="100%" height="400" frameborder="0"></iframe></div>
</div>


<div class="col-sm-5 col-md-4">
<h4>Consulter les Programmes des Vols</h4>
	<?php echo form_open('vols/getVol1');?>
    <form role="form" class="wowload fadeInRight">        
        <div class="form-group">
            <div class="row">
            <div class="col-xs-6">
            <select class="form-control" name="aerodep" required>
              <option value="">Aéroport de départ</option>
              <?php while($aerogot=$aeroresul->fetch_object()){
				  echo'<option value="'.$aerogot->idAeroport.'">'.$aerogot->Localisation.' - '.$aerogot->NomAeroport.'</option>';
			  }?>
            </select>
            </div>        
            <div class="col-xs-6">
            <select class="form-control" name="aerodest" required>
              <option>Aéroport de destination</option>
             <?php while($aerogo=$aeroresul2->fetch_object()){
				  echo'<option value="'.$aerogo->idAeroport.'">'.$aerogo->Localisation.' - '.$aerogo->NomAeroport.'</option>';
			  }?>
              </select>
            </div></div>
        </div>
        <div class="form-group">
            <div class="row">
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="jour" id="expiry-month" required>
                <option value="<?php echo date('d');?>"><?php echo date('d');?></option>
                <?php for ($j=01;$j<=31;$j++){
					echo'<option value="'.$j.'">Le '.$j.'</option>';
				}?>  
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="mois" id="expiry-month" required>
                <option value="<?php echo date('m');?>"><?php echo date('m');?></option>
                <option value="01">Jan (01)</option>
                <option value="02">Fevr (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Avr (04)</option>
                <option value="05">Mai (05)</option>
                <option value="06">Juin (06)</option>
                <option value="07">Jul (07)</option>
                <option value="08">Août (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control" name="annee" required>
			  <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                <?php for($i=date('Y'); $i<=2035; $i++){
					echo'<option value="'.$i.'">'.$i.'</option>';
				}?>
              </select>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-default">Rechercher</button>
		
    </form>    
	<?php echo form_close();?>
	<br>
	<br>
	<h4>Consulter Par date Seule</h4>
	<br>
	<?php echo form_open('vols/getVol2');?>
	<div class="form-group">
            <div class="row">
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="jour" id="expiry-month">
                <option value="<?php echo date('d');?>">Le&nbsp;<?php echo date('d');?></option>
                <?php for ($j=1;$j<=31;$j++){
					echo'<option value="'.$j.'">Le '.$j.'</option>';
				}?>  
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="mois" id="expiry-month">
                <option value="<?php echo date('m');?>"><?php echo date('m');?></option>
                <option value="1">Jan (01)</option>
                <option value="2">Fevr (02)</option>
                <option value="3">Mar (03)</option>
                <option value="4">Avr (04)</option>
                <option value="5">Mai (05)</option>
                <option value="6">Juin (06)</option>
                <option value="7">Jul (07)</option>
                <option value="8">Août (08)</option>
                <option value="9">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control" name="annee">
			  <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                <?php for($i=date('Y'); $i<=2035; $i++){
					echo'<option value="'.$i.'">'.$i.'</option>';
				}?>
              </select>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-default">Rechercher</button>
    </form>    
	<?php echo form_close();?>
	<br>
	<br>
	<a href="#DestCons" data-toggle="modal" class="btn btn-primary"><i class="fa fa-search">&nbsp;</i>Consulter par Destination??</a>

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
            <div class="caption">Le confort<a href="http://www.rva-rdc.com" class="pull-right"><i class="fa fa-edit"></i></a></div>
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
            <div class="caption">L'écoute<a href="http://www.rva-rdc.com" class="pull-right"><i class="fa fa-edit"></i></a></div>
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
            <div class="caption">La rapidité<a href="http://www.rva-rdc.com" class="pull-right"><i class="fa fa-edit"></i></a></div>
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
                        <li><a href="http://www.echoflight.com">Echo Flight</a></li>        
                        <li><a href="http://www.airserv.co.ug">Air Serv</a></li>
                        <li><a href="http://www.caa.cd">CAA</a></li>
                        <li><a href="http://www.hewabora.cd"></a>Hewa Bora</li>
                        <li><a href="http://www.aircongo.cd">Air Congo</a></li>
                    </ul>
                </div>
                 <div class="col-sm-4 subscribe">
                    <h4>Suggestions</h4>
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter email id here">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Rejoignez-nous</button>
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

<div class="text-center copyright">&copy Tous droits Réservés - <a href="http://rva-rdc.com">Régie des voies aériennes&nbsp;<?php echo date('Y');?></a></div>

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
						<select class="form-control" name="privilege">
						<option value="">Qui êtes-vous?</option>
						<option value="Client">Client</option>
						<option value="AgentComp">Agent d'une Compagnie</option>
						<option value="AgentRVA">Agent à la RVA</option>
						</select>
						<br>
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
		
		
	<div class="modal fade" id="About" style="font-family:'Century Gothic';">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(191,161,69);">
					<button class="close" data-dismiss="modal">x</button>
					<h3 class="modal-title" style="text-align:center; font-family:Century Gothic; color:black">A propos de Nous</h3>
				</div>
				<div class="modal-body" style="background-color: rgb(191,101,10);">
				<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<img class="img-circle" style="width:120px; height:120px; float:left;" src="<?php echo base_url('images/Johannes.jpg');?>" />
				    <p style="color:black;font-family:Century Gothic;">Ce site est un projet qui s'inscrit dans le cadre du mémoire de fin de cycle de Licence de l'étudiant de l'ISP Bukavu, KAHASHA BAHATI Jean Rostand, dirigé par le Chef de Travaux TASHO KASONGO Issa. C'est un travail de fin d'études universitaires en Pédagogie Appliquée, Option Informatique de Gestion.</p>           
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

		
		<div class="modal fade" id="DestCons" style="font_family:'NewTime Romani';">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(51,122,183);">
					<button class="close" data-dismiss="modal">x</button>
					<h4 class="modal-title" style="text-align:center; font-family:Comic Sans Ms; color:black"><i class="fa fa-plane"></i>&nbsp;Consulter Vol Par destination</h4>
				</div>
				<div class="modal-body">
				<div class="row">
				<div class="col-md-offset-2 col-md-8">
                    <Center>     
					<h4>Consulter par Destination</h4>
					<br>
					<?php echo form_open('vols/getVol3');?>
					<div class="row">
					<div class="col-xs-12">
					<select class="form-control" name="aerodest" required>
					<option value="">Sélectionner la destination</option>
					<?php while($aerogot1=$aeroresul3->fetch_object()){
					echo'<option value="'.$aerogot1->idAeroport.'">'.$aerogot1->Localisation.'</option>';
					}?>
					</select>
					<br>
					<br>
					</div>        
					</div>	
					<button type="submit" name="twende" class="btn btn-primary"><i class="fa fa-search">&nbsp;</i>Rechercher</button>
					<?php echo form_close();?>

                    </Center>              
                                    
				</div>
				</div>
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


</body>
</html>