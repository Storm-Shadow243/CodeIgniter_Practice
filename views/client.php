<!DOCTYPE html>
<?php $connect=new mysqli('localhost','root','','flightmanagement');
	  $aero="SELECT*FROM Aeroport ORDER BY Localisation";
	  $aeroresul=$connect->query($aero);
	  $aeroresul2=$connect->query($aero);
	  $aeroresul3=$connect->query($aero);
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
	<ul class="nav navbar-nav">
            <li> <a href="#Mprofil" title="Voir Votre Compte" style="color:black;font-family:Matura MT Script Capitals;" data-toggle="modal">Bonjour &nbsp;<?php echo $this->session->userdata('NomCl')." ".$this->session->userdata('Prenom');?>&nbsp; !&nbsp;&nbsp;&nbsp;&nbsp;</a><li>
        </ul>
	</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
       
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url ('Welcome/index');?>"><i class="fa fa-home">&nbsp;</i>Accueil </a></li>
		<li><a href="#Mprofil" title="Modifier Votre Compte" data-toggle="modal"><i class="fa fa-user">&nbsp;</i>Mon Compte</a></li>
		<li><a href="<?php echo site_url('gestion/ClientReservation');?>" title="Mes Réservations" ><i class="fa fa-folder-open">&nbsp;</i>Mes Réservations</a></li>
        <li><a title="Ecraser la session de Connexion" href="<?php echo site_url ('utilisateur/deconnexion');?>"><button class="btn btn-default"><i class="fa fa-cogs">&nbsp</i>Déconnexion</button></a></li>
      </ul>
    </div><!-- Wnavbar-collapse -->
 <!-- container-fluid -->
  </div>
</nav>

<div class="container">
<div class="col-sm-5">
<?php echo isset($error) ? $error: '';?>
</div>
<div class="col-sm-5">
<?php echo $this ->session ->flashdata('msg'); ?>
</div>
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-5">
<h3 style="color:black;font-family:Century Gothic;"><?php echo $this->session->userdata('NomCl')." ".$this->session->userdata('Prenom');?></h3>
    <div class="wowload fadeInLeft"><img style="width:400px;height:400px" class="img-circle" src="<?php echo base_url($this->session->userdata('Avatar'));?>" alt="" /></div>
</div>
<div class="col-sm-5" style="color:black; background-color:rgb(220,255,220); border-radius:10px; ">
<h4>Consulter les Programmes des Vols</h4>
<hr/>
	<?php echo form_open('vols/getVolCl1');?>
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
              <select class="form-control col-sm-2" name="jour" id="expiry-month">
                <option value="<?php echo date('d');?>"><?php echo date('d');?></option>
                <?php for ($j=01;$j<=31;$j++){
					echo'<option value="'.$j.'">Le '.$j.'</option>';
				}?>  
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="mois" id="expiry-month">
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
	<h4>Consulter Par date Seule</h4>
	<br>
	<?php echo form_open('vols/getVolCl2');?>
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
	<hr/>
	<br>
</div>
</div>
</div><br>
<center><p class="animated fadeInUp" style="color:rgb(255,255,255)"><a href="<?php echo site_url('gestion/ClientViewVol');?>" class="btn btn-primary"><i class="fa fa-plane">&nbsp;</i>Tous les programmes des Vols ?&nbsp;<i class="fa fa-search"></i></a></p></center>  
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
					<?php echo form_open('vols/getVolCl3');?>
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

		
<!-- Mon Profil Début -->

<div class="modal fade" id="Mprofil" style="top:10; font_family:'vijaya';" tabindex="-1" role="dialog" aria-labelledby="#depart" aria-hidden="false">  
				<div class="modal-dialog " style="width: 400px; height: 450px;">  
				<div class="modal-content panel-green " style="background-color:rgb(191,161,69);"> 
					<div class="panel-heading">
							
						<button href="#" class="close" data-dismiss="modal"><span class="btn btn-danger">X</span></button> 
						<h3 class="modal-title" id="depart" style="color:black;text-align:center"><i class="fa fa-user fa-7x" style="font-size:40px;"></i> &nbsp;<?php echo $this->session->userdata('NomCl')." ".$this->session->userdata('Prenom');?></h3> 
					</div>
					<div class="modal-body" style="width: 400px; height: 450px;">
					<div class="row" style="margin-top:1px; margin-left:1px; margin-right:1px; float: middle;">
									
						<div class="jumbotron" style="font-family:Vijaya; height:330px;" >
							<div class="table-responsive">
							<h4 style="font-family:vijaya;">
								<table class="table ">
								
											<tr>
												<td class="danger"> </i> <i class="fa fa-wrench fa-14x"></i> Editez votre Profil:</td>
												<td class="danger"><a data-toggle="modal" type="text" title="Modifier votre compte ici" href="#MprofilEdit" onclick="ppopup()"><i class="fa fa-pencil"></i> Edit</a></td>
											</tr>
											<tr>
												<td class="success">Nom</td>
												<td class="danger"><?php echo $this->session->userdata('NomCl'); ?></td>
											</tr>
											<tr>
												<td class="success">Prénom</td>
												<td class="danger"><?php echo $this->session->userdata('Prenom'); ?></td>
											</tr>
											<tr>
												<td class="success">Adresse</td>
												<td class="danger"><?php echo $this->session->userdata('Adresse'); ?></td>
											</tr>
											<tr>
												<td  class="success">Email</td>
												<td class="danger"><?php echo $this->session->userdata('Email'); ?></td>
											</tr>
											<tr>
												<td  class="success">Télélphone</td>
												<td class="danger"><?php echo $this->session->userdata('Telephone'); ?></td>
											</tr>
											<tr>
												<td  class="success">Photo</td>
												<td class="danger"><img class="img-circle" style="width:50px; height:50px" src="<?php echo base_url($this->session->userdata('Avatar'));?>" alt="" /></td>
											</tr>
							</table>
							</h4>
					</div>
						
					</div>
					
					</div>
					</div>
					<div class="modal-footer">
					<p>
						<i><h3 style="font_family:NewTime Roman; color:black; font-size:15px; text-align:center;">&copy; RVA <?php echo date('Y');?>|tous droits réservés</h3></i>
					</p>
					</div>
				</div>
				</div> 
				
	</div><!--/.Fin de mon profil-->

	<!--/.Debut Formulaire editer Compte-->
	
		<div class="modal fade " id="MprofilEdit" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
			<div class="modal-dialog " style="width:350px;">  
			<div class="modal-content panel-green ">	
					<div class="panel-heading">
					<button href="#" class="close" class="fa fa-times-circle fa-2x" data-dismiss="modal">x</button> 
					<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-cog fa-17x"></i>&nbsp;Profil de&nbsp;<?php echo $this->session->userdata('NomCl')." ".$this->session->userdata('Prenom');?></h4> 
					</div>
														
					<div class="modal-body" style="height:380px;overflow-y: auto;">	
														
					<div class="form-horizontal">
					<div class="col-lg-12">
					<?php echo form_open_multipart('utilisateur/modifierCompteClient', array('method'=>'post'));?>		
					<input type="hidden" class="form-control" name="id" value="<?php echo $this->session->userdata('idClient'); ?>" required/>
					<input type="hidden" class="form-control" name="nom" value="<?php echo $this->session->userdata('NomCl'); ?>" required/>
					<input type="hidden" class="form-control" name="pre" value="<?php echo $this->session->userdata('Prenom'); ?>" required/>
					<input type="hidden" class="form-control" name="num" value="<?php echo $this->session->userdata('NumP'); ?>" required/>
					<input type="hidden" class="form-control" name="nat" value="<?php echo $this->session->userdata('Nationalite'); ?>" required/>	
					<input type="hidden" class="form-control" name="sex" value="<?php echo $this->session->userdata('Sexe'); ?>" required/>						
					<input type="text" class="form-control" placeholder="Nouvel Email" style="color:black" name="email"  value="<?php echo $this->session->userdata('Email'); ?>" required/>
						<br>
					<input type="text" class="form-control" placeholder="Nouveau Numéro" style="color:black" name="numtel"  value="<?php echo $this->session->userdata('Telephone'); ?>" required/>
						<br>
					<input type="text" class="form-control" placeholder="Nouvel Adresse" style="color:black" name="adresse"  value="<?php echo $this->session->userdata('Adresse'); ?>" required/>
						<br>
					<input type="text" class="form-control" placeholder="Nouveau Mot de Passe" name="pass1" required/>
						<br>
					<input type="text" class="form-control" placeholder="Confirmer Mot de Passe" name="pass2" required/>
						<br>
					<label>Nouvelle Photo</label>
					<?php echo form_upload('picture');?>
					</div>
					</div>
																
					</div>	
														
					<div class="modal-footer">
					<div class="form-group">
					<center>										
					<button type="submit" id="btnSave" name="modifP" class="btn btn-default"><span class="fa fa-save" value="" data-dismiss="modal"></span>   Modifier</button>
					<button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span>   Annuler</button>
					</center>
					</div>
					</div>
														
					<?php echo form_close();?>
														
					</div>
					</div>
					</div>
		
	<!--/.Fin formulaire modifier compte-->	

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