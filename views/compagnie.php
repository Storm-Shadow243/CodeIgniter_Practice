<!DOCTYPE html>
<?php $connect=new mysqli('localhost','root','','flightmanagement');
	  $compget="SELECT*FROM compagnie WHERE id_Comp='".$this->session->userdata('id_Comp')."'";
	  $res=$connect->query($compget);
	  $good=$res->fetch_object();
	  $aero="SELECT*FROM Avion WHERE id_Comp='".$good->id_Comp."'";
	  $wefound=$connect->query($aero);
	  $col="SELECT*FROM AgentComp WHERE id_Comp='".$good->id_Comp."'";
	  $colf=$connect->query($col);
?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?php echo $good->NomComp;?></title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<!-- bootstrap -->
<link href="<?php echo base_url('assets/bootstrap/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
<!-- uniform -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/uniform/css/uniform.default.min.css'); ?>" rel="stylesheet" type="text/css"/>

<!-- animate.css -->
<link rel="stylesheet" href="<?php echo base_url('assets/wow/animate.css'); ?>" rel="stylesheet" type="text/css"/>


<!-- gallery -->
<link rel="stylesheet" href="<?php echo base_url('assets/gallery/blueimp-gallery.min.css'); ?>">


<!-- favicon -->
<link rel="shortcut icon" href="<?php echo base_url('images/favicon.png'); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo base_url('images/favicon.png'); ?>" type="image/x-icon">

<link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/js/modal.js'); ?>"  >

<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/prettyPhoto.css'); ?>" rel="stylesheet" type="text/css" />

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
      <a class="preview navbar-brand" href="#myPic" rel="prettyPhoto" data-toggle="modal">
         <img class="img-circle" style="width:50px; height:50px" src="<?php echo base_url($this->session->userdata('AvatarAgent'));?>" alt="" />
		</a>
	  </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">        
        <li><a href="<?php echo site_url ('Welcome/index');?>"><i class="fa fa-home">&nbsp;</i>Accueil </a></li>
        <li><a href="<?php echo site_url('gestion/OpsVol');?>"><i class="fa fa-plane">&nbsp;</i>Vols et Réservations</a></li>
		<li><a href="#MCompagnie" data-toggle="modal"><i class="fa fa-edit">&nbsp;</i><?php echo $good->NomComp;?></a></li>
		<li><a href="#Collegue" data-toggle="modal"><i class="fa fa-users">&nbsp;</i>Mes Collègues</a></li>
		<li><a href="#Mprofil" data-toggle="modal"><i class="fa fa-user">&nbsp;</i>Mon Profil</a></li>
        <li><a href="<?php echo site_url ('utilisateur/deconnexion');?>"><button class="btn btn-default"><i class="fa fa-cogs">&nbsp;</i>Déconnexion</button></a></li>
        
      </ul>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->
<div class="container">
<div class="col-sm-4"></div>
<div class="col-sm-5"><?php echo $this ->session ->flashdata('msg'); ?></div>
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-4">
<h4 style="color:black;font-family:Century Gothic;"><?php echo '<i class="fa fa-thumbs-up">&nbsp;</i>Bonjour '.$this->session->userdata('Nom').' '.$this->session->userdata('Prenom').' !';?></h4>
    <div class="wowload fadeInLeft"><img style="width:350px;height:350px" class="img-circle" src="<?php echo base_url($this->session->userdata('AvatarAgent'));?>" alt="" /></div>
<h3 style="color:purple;font-family:Century Gothic"><?php echo "Agent à ".$good->NomComp;?></h3>
</div>
<div class="col-sm-7" style="overflow-y:auto;">
<center>
<h3 style="font-family:Comic Sans Ms;color:black;">Nos Avions</h3>
</center>
	<br>
	<br>
	<table class="table table-striped table-hover">
	<thead>
	<tr class="success">
	<th>Immatriculation</th>
	<th>Nom de L'appareil</th>
	<th>Type</th>
	<th>Nombre de Places</th>
	<th>Etat de Service</th>
	</tr>
	</thead>
	<tbody>
	<?php
		while($avion=$wefound->fetch_object()){
			?>
		<tr><td><?php echo $avion->Immat;?></td><td><?php echo $avion->NomAv;?></td><td><?php echo $avion->typeAv;?></td><td><?php echo $avion->NbrPlaces;?>&nbsp;Places</td>
			
		<td><a title="Modifier l'Etat de service de cet appareil" style="color:red" data-toggle="modal" href="#setEtat<?php echo $avion->idAvion;?>"> <?php if($avion->Etat=="En Service"){echo '<i class="fa fa-unlock">&nbsp</i>'.$avion->Etat;}else{echo '<i class="fa fa-lock">&nbsp</i>Hors Service';}?></a></td></tr>
	
	<div class="modal fade " id="<?php echo "setEtat".$avion->idAvion;?>" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
	<div class="modal-dialog " style="width:350px;">  
	<div class="modal-content panel-green ">				
	<div class="panel-heading">
	<div class="modal-body" style="height:250px;overflow-y: auto;">	
											
											
	<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-user"></i>&nbsp;Modifier Etat de Service de&nbsp;<?php echo $avion->NomAv;?></h4>
	<br>
	<center>
	<label>
	<?php echo form_open_multipart('avion/setEtat',array('method'=>'post'));?>
	Etat de Service de&nbsp;<?php echo$avion->NomAv;?>   
	</label>
	<br>
	<input type="hidden" value="<?php echo $avion->idAvion;?>" name="id" />
	<?php if ($avion->Etat=="En Service"){echo'<label>Voulez-vous mettre cet Appareil Hors Service?</label><input type="hidden" class="form-control" name="etat" value="HS" />';}elseif ($avion->Etat=="HS"){echo '<label>Voulez-vous Déclarer cet Appareil en Service?</label><input class="form-control" type="hidden" name="etat" value="En Service" />';}?>
										
	</center>
	<br>
	<center><h1><i class="fa fa-plane"></i></h1></center>
	</div>
	<div class="modal-footer">
	<div class="form-group">
	<center>
	<button type="submit" id="btnSave" name="modifP" class="btn btn-default"><span class="fa fa-save" value="" data-dismiss="modal"></span>   Continuer</button>
	<button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span>   Annuler</button>
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
	
	
	<?php	} ?>
	</tbody>
	</table>
<center>	<a href="#NouvelAvion" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plane">&nbsp;</i>A-t-on un nouvel Avion? Enregistrez-le!</a></center><hr/>
<center>	<a href="<?php echo site_url('gestion/Avions');?>" data-toggle="modal" class="btn btn-primary"><i class="fa fa-camera">&nbsp;</i>Ajoutez des Images descriptives à vos avions!</a></center>
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



<div class="modal fade " id="NouvelAvion" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
	<div class="modal-dialog " style="width:350px;">  
	<div class="modal-content panel-green ">				
	<div class="panel-heading">
	<div class="modal-body" style="height:400px;overflow-y: auto;">	
											
											
	<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-plane"></i>&nbsp;Ajouter Un Nouvel Appareil</h4>
	<br>
	<center>
	<?php echo form_open_multipart('avion/nouvelAvion',array('method'=>'post'));?>
	<input type="text" class="form-control" name="immat" Placeholder="Immatriculation" required/>
	<br>
	<input type="text" class="form-control" name="nom" Placeholder="Nom de l'Appareil"  required/>
	<label>Date Entrée en Service</label>
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
                <?php for($i=1940; $i<=date('Y'); $i++){
					echo'<option value="'.$i.'">'.$i.'</option>';
				}?>
              </select>
            </div>
          </div>
		  </div>
	<input type="text" class="form-control" Placeholder="Nombre des Places Assises" name="place" required/>
	<br>	
	<input type="text" class="form-control" placeholder="Poix Maximal Autorisé au décollage" name="pmad" required/>
	<br>
	<select class="form-control" name="etat"><option value="En Service" >En Service</option><option value="HS" >Hors Service</option></select>
	<br>
	<br>
	<input type="text" class="form-control" placeholder="Type ou Marque de L'appareil" name="type" required/>
	<br>
	<input type="hidden" name="affectation" value="<?php echo $good->id_Comp;?>"/>
	</div>
	<div class="modal-footer">
	<div class="form-group">
	<center>
	<button type="submit" id="btnSave" name="modifP" class="btn btn-default"><span class="fa fa-save" value="" data-dismiss="modal"></span>   Continuer</button>
	<button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span>   Annuler</button>
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




<footer class="spacer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4>Régie des Voies Aériennes RDC</h4>
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
                    <textarea type="text" class="form-control" placeholder="Votre E-mail Ici"></textarea>
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


<div class="modal fade" id="Mprofil" style="top:10; font_family:'vijaya';" tabindex="-1" role="dialog" aria-labelledby="#depart" aria-hidden="false">  
				<div class="modal-dialog " style="width: 530px; height: 500px;">  
				<div class="modal-content panel-green " style="background-color:rgb(185, 174, 45);"> 
					<div class="panel-heading">
							
						<button href="#" class="close" data-dismiss="modal"><span class="btn btn-danger">X</span></button> 
						<h3 class="modal-title" id="depart" style="color:black;text-align:center"><i class="fa fa-user fa-7x" style="font-size:40px;"></i> &nbsp;<?php echo $this->session->userdata('Nom')." ".$this->session->userdata('Prenom');?></h3> 
					</div>
					<div class="modal-body" style="width: 530px; height: 500px;">
					<div class="row" style="margin-top:1px; margin-left:1px; margin-right:1px; float: middle;">
									
						<div class="jumbotron" style="font_family:'vijaya'; height:330px;" >
							<div class="table-responsive">
							<h4 style="font_family:vijaya;">
								<table class="table ">
								
											<tr>
												<td class="danger"> </i> <i class="fa fa-wrench fa-14x"></i> Editez votre Profil:</td>
												<td class="danger"><a data-toggle="modal" type="text" title="Modifier votre compte ici" href="#MprofilEdit" onclick="ppopup()"><i class="fa fa-pencil"></i> Edit</a></td>
											</tr>
											<tr>
												<td class="success">Nom</td>
												<td class="danger"><?php echo $this->session->userdata('Nom'); ?></td>
											</tr>
											<tr>
												<td class="success">Prénom</td>
												<td class="danger"><?php echo $this->session->userdata('Prenom'); ?></td>
											</tr>
											<tr>
												<td class="success">Service</td>
												<td class="danger"><?php echo $this->session->userdata('Service'); ?></td>
											</tr>
											<tr>
												<td  class="success">Fonction</td>
												<td class="danger"><?php echo $this->session->userdata('Fonction'); ?></td>
											</tr>
											<tr>
												<td  class="success">Adresse</td>
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
												<td class="danger"><img class="img-circle" style="width:50px; height:50px" src="<?php echo base_url($this->session->userdata('AvatarAgent'));?>" alt="" /></td>
											</tr>
											<tr>
												<td  class="success">Compagnie</td>
												<td class="danger"><?php echo $good->NomComp; ?></td>
											</tr>
							</table>
							</h4>
					</div>
						
					</div>
					
					</div>
					</div>
					<div class="modal-footer">
					<p>
						<i><h3 style="font_family:NewTime Roman; color:black; font-size:15px; text-align:center;">&copy; RVA <?php echo date('Y');?>|tout droit réservé</h3></i>
					</p>
					</div>
				</div>
				</div> 
				
	</div><!--/.Fin de mon profil-->
	
	
	<!--/.Début de my Pic-->
	 <div class="modal fade" id="myPic" style="top:10; font_family:'vijaya';" tabindex="-1" role="dialog" aria-labelledby="#depart" aria-hidden="false">  
				<div class="modal-dialog " style="width: 530px; height: 500px;">  
				<div class="modal-content panel-green " style="background-color:rgb(191, 161, 69);"> 
					<div class="panel-heading">
							
						<button href="#" class="close" data-dismiss="modal"><span class="btn btn-danger">X</span></button> 
						<h3 class="modal-title" id="depart" style="color:black;text-align:center"><i class="fa fa-user fa-7x" style="font-size:40px;"></i> &nbsp;<?php echo $this->session->userdata('Nom')." ".$this->session->userdata('Prenom');?></h3> 
					</div>
					<div class="modal-body" style="width: 530px; height: 500px;">
					<center>
							<img style="width:400px; height:500px" src="<?php echo base_url($this->session->userdata('AvatarAgent'));?>" alt="" />		
					</center>
					</div>
					<div class="modal-footer">
					<p>
						<i><h3 style="font_family:NewTime Roman; color:black; font-size:15px; text-align:center;">&copy; RVA <?php echo date('Y');?>|tout droit réservé</h3></i>
					</p>
					</div>
				</div>
				</div> 
				
	</div><!--/.Fin de my pic-->
	

		<div class="modal fade " id="MprofilEdit" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
			<div class="modal-dialog " style="width:350px;">  
			<div class="modal-content panel-green ">	
					<div class="panel-heading">
					<button href="#" class="close" class="fa fa-times-circle fa-2x" data-dismiss="modal">x</button> 
					<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-cog fa-17x"></i>Profil de&nbsp;<?php echo $this->session->userdata('Nom')." ".$this->session->userdata('Prenom');?></h4> 
					</div>
														
					<div class="modal-body" style="height:400px;overflow-y: auto;">	
														
					<div class="form-horizontal">
					<div class="col-lg-12">
					<?php echo form_open_multipart('utilisateur/modifierCompteAgentComp', array('method'=>'post'));?>		
					<input type="hidden" class="form-control" name="id" value="<?php echo $this->session->userdata('idAgent'); ?>" required/>
					<input type="hidden" class="form-control" name="nom" value="<?php echo $this->session->userdata('Nom'); ?>" required/>
					<input type="hidden" class="form-control" name="comp" value="<?php echo $good->id_Comp; ?>" required/>
					<input type="hidden" class="form-control" name="pre" value="<?php echo $this->session->userdata('Prenom'); ?>" required/>
					<input type="text" class="form-control" placeholder="Nouvelle Fonction" name="fonct" value="<?php echo $this->session->userdata('Fonction'); ?>" required/>
						<br>
					<input type="text" class="form-control" Placeholder="Nouveau Service" style="color:black" name="serv"  value="<?php echo $this->session->userdata('Service'); ?>" required/>
						<br>											
					<input type="text" class="form-control" placeholder="Nouvel Email" style="color:black" name="email"  value="<?php echo $this->session->userdata('Email'); ?>" required/>
						<br>
					<input type="text" class="form-control" placeholder="Nouveau Numéro" style="color:black" name="num"  value="<?php echo $this->session->userdata('Telephone'); ?>" required/>
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
	
	
<div class="modal fade" id="Collegue" style="top:10; font_family:'vijaya';" tabindex="-1" role="dialog" aria-labelledby="#depart" aria-hidden="false">  
				<div class="modal-dialog " style="width: 900px; height: 450px;">  
				<div class="modal-content panel-green " style="background-color:rgb(191, 161, 69);"> 
					<div class="panel-heading">
							
						<button href="#" class="close" data-dismiss="modal"><span class="btn btn-danger">X</span></button> 
						<h3 class="modal-title" id="depart" style="color:black;text-align:center"><i class="fa fa-users fa-7x" style="font-size:40px;"></i> &nbsp; Agents de&nbsp;<?php echo $good->NomComp." utilisant le site"; ?></h3> 
					</div>
					<div class="modal-body" style="width: 880px; height: 500px;overflow-y: auto;">
					<div class="row" style="margin-top:1px; margin-left:1px; margin-right:1px; float: middle;">
									
						<div class="jumbotron">
							<div class="table-responsive">
							<h5 style="font_family:Comic Sans Ms;">

								<table class="table table-striped table-bordered table-hover">
								<thead>
										<tr class="success">
											<th>Nom</th>
											<th>Prénom</th>
											<th>Service</th>
											<th>Fonction</th>
											<th>Adresse</th>
											<th>Email</th>
											<th>Telephone</th>
											<th>Photo</th>
										</tr>
									</thead>
									<tbody>
											<?php while ($ressource=$colf->fetch_object()){?>
											<tr>
												<td><?php echo $ressource->Nom;?></td><td><?php echo $ressource->Prenom;?></td><td><?php echo $ressource->Service;?></td><td><?php echo $ressource->Fonction;?></td><td><?php echo $ressource->Adresse;?></td><td><?php echo $ressource->Email;?></td><td><?php echo $ressource->Telephone;?></td><td><a title="Voir Photo" data-toggle="modal" href="#Pic<?php echo $ressource->idAgent;?>" onclick="ppopup()"><img class="img-circle" style="width:50px; height:50px" src="<?php echo base_url($ressource->AvatarAgent);?>" alt="" /></a></td>	
												
											</tr>
											<div class="modal fade " id="<?php echo "Pic".$ressource->idAgent;?>" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
											<div class="modal-dialog " style="width:350px;">  
											<div class="modal-content panel-green ">				
											<div class="panel-heading">
											<div class="modal-body" style="height:500px;overflow-y: auto;">	
											
											
											<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-user"></i>&nbsp;<?php echo $ressource->Nom." ".$ressource->Prenom;?></h4>
															
															
											<center>
											<img style="width:300px; height:400px" src="<?php echo base_url($ressource->AvatarAgent);?>" alt=""/>		
											</center>
											
											</div>
											<div class="modal-footer">
											<p>
											<i><h3 style="font_family:NewTime Roman; color:black; font-size:15px; text-align:center;">&copy; RVA <?php echo date('Y');?>|tout droit réservé</h3></i>
											</div> 
											</div>
											</div>
											</div> 
				
											</div>
										<?php }?>
									</tbody>
							</table>
											
							</h5>
					</div>
						
					</div>
					
					</div>
					</div>
					<div class="modal-footer">
					<center>
					<a data-toggle="modal" class="btn btn-danger" title="Ajouter un agent pour votre Compagnie" href="#AgentNew" onclick="ppopup()">
					<span class="fa fa-save"></span>&nbsp;Nouvel Agent</a></center>
					<p>
						<i><h3 style="font_family:NewTime Roman; color:black; font-size:15px; text-align:center;">&copy; RVA <?php echo date('Y');?>|tout droit réservé</h3></i>
					</p>
					</div>
				</div>
				</div> 
				</div>

				
<div class="modal fade " id="AgentNew" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
			<div class="modal-dialog " style="width:350px;">  
			<div class="modal-content panel-green ">	
					<div class="panel-heading">
					<button href="#" class="close" class="fa fa-times-circle fa-2x" data-dismiss="modal">x</button> 
					<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-cog fa-17x"></i>Ajout nouvel Agent</h4> 
					</div>
														
					<div class="modal-body" style="height:400px;overflow-y: auto;">	
														
					<div class="form-horizontal">
					<div class="col-lg-12">
					<?php echo form_open_multipart('utilisateur/inscrireAgentComp', array('method'=>'post'));?>		
					<input type="text" class="form-control" name="nom" Placeholder="Nom" required/>
					<br>
					<input type="text" class="form-control" name="prenom" Placeholder="Prénom"  required/>
					<br>
					<input type="text" class="form-control" Placeholder="Service" name="serv" required/>
					<br>
					<input type="text" class="form-control" Placeholder="Fonction" name="fonct" required/>
						<br>	
					<input type="text" class="form-control" placeholder="Adresse" name="adresse" required/>
						<br>
					<input type="text" class="form-control" placeholder="Numéro de téléphone" name="num" required/>
						<br>
					<input type="text" class="form-control" placeholder="Email" name="email" required/>
						<br>
					<input type="text" class="form-control" placeholder="Mot de Passe" name="pass1" required/>
						<br>
					<input type="text" class="form-control" placeholder="Confirmer Mot de Passe" name="pass2" required/>
						<br>
					<input type="hidden" name="affectation" value="<?php echo $good->id_Comp;?>"/>
					<label> Photo</label>
					<?php echo form_upload('picture');?>
					</div>
					</div>
																
					</div>	
														
					<div class="modal-footer">
					<div class="form-group">
					<center>										
					<button type="submit" id="btnSave" name="modifP" class="btn btn-default"><span class="fa fa-save" value="" data-dismiss="modal"></span>   Enregistrer</button>
					<button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span>   Annuler</button>
					</center>
					</div>
					</div>
														
					<?php echo form_close();?>
														
					</div>
					</div>
					</div>
					
					
					
<div class="modal fade" id="MCompagnie" style="top:10; font_family:'vijaya';" tabindex="-1" role="dialog" aria-labelledby="#depart" aria-hidden="false">  
				<div class="modal-dialog " style="width: 450px; height: 490px;">  
				<div class="modal-content panel-green " style="background-color:rgb(185, 174, 45);"> 
					<div class="panel-heading">
							
						<button href="#" class="close" data-dismiss="modal"><span class="btn btn-danger">X</span></button> 
						<h3 class="modal-title" id="depart" style="color:black;text-align:center"><i class="fa fa-plane fa-7x" style="font-size:40px;"></i> &nbsp;<?php echo $good->NomComp." ".$good->CodeIATA;?></h3> 
					</div>
					<div class="modal-body" style="width: 450px; height: 470px;">
					<div class="row" style="margin-top:1px; margin-left:1px; margin-right:1px; float: middle;">
									
						<div class="jumbotron" style="font_family:'vijaya'; height:330px;" >
							<div class="table-responsive">
							<h4 style="font_family:vijaya;">
								<table class="table ">
								
											<tr>
												<td class="danger"> </i> <i class="fa fa-wrench fa-14x"></i> Pour Modifier : </td>
												<td class="danger"><a data-toggle="modal" type="text" title="Modifier les Info de votre Compagnie" href="#MCompEdit" onclick="ppopup()"><i class="fa fa-pencil"></i> Cliquer Ici</a></td>
											</tr>
											<tr>
												<td class="success">Compagnie</td>
												<td class="danger"><?php echo $good->NomComp; ?></td>
											</tr>
											<tr>
												<td class="success">Code IATA</td>
												<td class="danger"><?php echo $good->CodeIATA; ?></td>
											</tr>
											<tr>
												<td class="success">Siège</td>
												<td class="danger"><?php echo $good->Siege; ?></td>
											</tr>
											<tr>
												<td  class="success">Télélphone</td>
												<td class="danger"><?php echo $good->Telephone; ?></td>
											</tr>
											<tr>
												<td  class="success">Email</td>
												<td class="danger"><?php echo $good->Email; ?></td>
											</tr>
											<tr>
												<td  class="success">Logo</td>
												<td class="danger"><img class="img-circle" style="width:50px; height:50px" src="<?php echo base_url($good->Logo);?>" alt="" /></td>
											</tr>
							</table>
							</h4>
					</div>
						
					</div>
					
					</div>
					</div>
					<div class="modal-footer">
					<p>
						<i><h3 style="font_family:NewTime Roman; color:black; font-size:15px; text-align:center;">&copy; RVA <?php echo date('Y');?>|tout droit réservé</h3></i>
					</p>
					</div>
				</div>
				</div> 
				
	</div><!--/.Fin de mon profil-->
	
	
	
	<div class="modal fade " id="MCompEdit" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
			<div class="modal-dialog " style="width:350px;">  
			<div class="modal-content panel-green ">	
					<div class="panel-heading">
					<button href="#" class="close" class="fa fa-times-circle fa-2x" data-dismiss="modal">x</button> 
					<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-cog fa-17x">&nbsp;</i>Compagnie&nbsp;<?php echo $good->NomComp." ".$good->CodeIATA;?></h4> 
					</div>
														
					<div class="modal-body" style="height:250px;overflow-y: auto;">	
														
					<div class="form-horizontal">
					<div class="col-lg-12">
					<?php echo form_open_multipart('compagnie/modComp', array('method'=>'post'));?>		
					<input type="hidden" class="form-control" name="id" value="<?php echo $good->id_Comp; ?>" required />
						<br>
					<input type="text" class="form-control" Placeholder="Nouveau Siège" style="color:black" name="siege"  value="<?php echo $good->Siege; ?>" required/>
						<br>											
					<input type="text" class="form-control" placeholder="Nouvel Email" style="color:black" name="email"  value="<?php echo $good->Email; ?>" required/>
						<br>
					<input type="text" class="form-control" placeholder="Nouveau Numéro" style="color:black" name="phone"  value="<?php echo $good->Telephone; ?>" required/>
						<br>
					<label>Nouveau Logo</label>
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