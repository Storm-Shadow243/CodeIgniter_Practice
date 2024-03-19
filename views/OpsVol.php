<!DOCTYPE html>
<?php $connect=new mysqli('localhost','root','','flightmanagement');
	  $compget="SELECT*FROM compagnie WHERE id_Comp='".$this->session->userdata('id_Comp')."'";
	  $res=$connect->query($compget);
	  $good=$res->fetch_object();
	  $aero="SELECT*FROM Avion WHERE id_Comp='".$good->id_Comp."' AND Etat='En Service';";
	  $wefound=$connect->query($aero);
	  $wefound2=$connect->query($aero);
	   $wefound3=$connect->query($aero);
	  $col="SELECT*FROM AgentComp WHERE id_Comp='".$good->id_Comp."'";
	  $colf=$connect->query($col);
	  $aeroport="SELECT*FROM Aeroport ORDER BY Localisation;";
	  $aeroseek=$connect->query($aeroport);
	  $aeroseek2=$connect->query($aeroport);
	  $aeroseek3=$connect->query($aeroport);
	  $aeroseek4=$connect->query($aeroport);
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
        <li><a href="<?php echo site_url ('gestion/compagnie');?>"><i class="fa fa-home">&nbsp;</i>Page Précédente </a></li>
		<li><a href="<?php echo site_url ('gestion/reservations');?>"><i class="fa fa-folder-open">&nbsp;</i>Nos Réservations </a></li>
		<li><a href="<?php echo site_url ('gestion/MajVol');?>"><i class="fa fa-edit">&nbsp;</i>Modifier Vols </a></li>
		<li><a href="<?php echo site_url ('gestion/CancelVol');?>"><i class="fa fa-edit">&nbsp;</i>Annuler Vols</a></li>
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
<div class="col-sm-3">
<h4 style="color:black;font-family:Century Gothic;"><?php echo '<i class="fa fa-thumbs-up">&nbsp;</i>Bonjour '.$this->session->userdata('Nom').' '.$this->session->userdata('Prenom').' !';?></h4>
    <div class="wowload fadeInLeft"><img style="width:260px;height:260px" class="img-circle" src="<?php echo base_url($this->session->userdata('AvatarAgent'));?>" alt="" /></div>
<h3 style="color:purple;font-family:Century Gothic"><?php echo "Agent à ".$good->NomComp;?></h3>
</div>
<div class="col-sm-8 wowload fadeInRight" style="overflow-y:auto;height:450px;">
<center>
<h3 style="font-family:Comic Sans Ms;color:black;">Nos Vols Programmés</h3>
</center>
	<br>
	<br>
	<table class="table table-striped table-hover table-bordered">
	<thead>
	<tr  class="success">
	<th>N° du Vol</th>
	<th>Appareil</th>
	<th>Décollage</th>
	<th>Attérissage</th>
	<th>Places</th>
	<th>Escales</th>
	</tr>
	</thead>
	<tbody>
	<?php
		while($avion=$wefound->fetch_object()){
			$volquery="SELECT*FROM Vol WHERE idAvion='".$avion->idAvion."' AND DateDep>='".date('Y-m-d')."'";
			$volseek=$connect->query($volquery);
		while($vol=$volseek->fetch_object()){
			if ($vol){
		   $aerodep="SELECT*FROM Aeroport WHERE idAeroport='".$vol->idAeroDep."'";
		   $aero1=$connect->query($aerodep);
		   $aero1f=$aero1->fetch_object();
		   
		   $aerodep1="SELECT*FROM Aeroport WHERE idAeroport='".$vol->idAeroDest."'";
		   $aero2=$connect->query($aerodep1);
		   $aero2f=$aero2->fetch_object();
		   
			?>
		
		<tr><td><a title="Voir les détails" style="color:red" data-toggle="modal" href="#ReserV<?php echo $vol->idVol;?>"><i class="fa fa-eye">&nbsp;</i><?php echo $vol->idVol;?></a></td><td><?php echo $avion->NomAv;?></td><td><?php echo $aero1f->NomAeroport." | ".$vol->DateDep." à ".$vol->HeureDep;?></td><td><?php echo $aero2f->NomAeroport." | ".$vol->DateArrivee." à ".$vol->HeureArr;?></td><td><?php echo $vol->NbrPlaces;?>&nbsp;Places</td><td><?php echo $vol->Escales;?></td></tr>
	
	<div class="modal fade " id="<?php echo "ReserV".$vol->idVol;?>" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
	<div class="modal-dialog " style="width:330px;">  
	<div class="modal-content panel-green ">				
	<div class="panel-heading">
	<div class="modal-body" style="height:350px;overflow-y: auto;">	
	<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-user"></i>&nbsp;Détails sur le vol&nbsp;<?php echo $vol->idVol;?></h4>
	
	<center><h2><i class="fa fa-plane"></i></h2></center>
	<?php $progr="SELECT*FROM Programmer WHERE idVol='".$vol->idVol."';";
			$seekP=$connect->query($progr);
			$found=$seekP->fetch_object();
		 
		 $agen="SELECT*FROM AgentComp WHERE idAgent='".$found->idAgent."' AND id_Comp='".$this->session->userdata('id_Comp')."';";
		 $agentseek=$connect->query($agen);
		 $agF=$agentseek->fetch_object();
			?>
	<i>Vol Numéro 	: </i><label><?php echo $vol->idVol;?></label><br>
	<i>Etat			: </i><label style="color:red;"><?php echo $vol->StatusVol;?></label><br>
	<i>Programmé le : </i><label><?php echo $found->DateProgr;?></label><br>
	<i>Par l'agent  : </i><label><?php echo $agF->Nom." ".$agF->Prenom;?></label>
	
	<div class="modal-footer">
	<div class="form-group">
	<center>
	<button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span>   Fermer</button>
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
	
	
			<?php	}}}
	?>
	</tbody>
	</table>
</div>
</div>
<br>
<center>	<a href="#ProgrammerVol" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plane">&nbsp;</i>Programmer Un Vol</a></center>
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
	

	
	
	<div class="modal fade " id="ProgrammerVol" style="top:25px; " tabindex="-2" role="dialog" aria-hidden="false">  
			<div class="modal-dialog " style="width:500px;">  
			<div class="modal-content panel-green ">	
					<div class="panel-heading">
					<button href="#" class="close" class="fa fa-times-circle fa-2x" data-dismiss="modal">x</button> 
					<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-plane fa-17x"></i>&nbsp;Programmer Un Vol</h4> 
					</div>
														
					<div class="modal-body" style="height:400px;overflow-y: auto;">	
														
					
					<div class="col-sm-7">
					<?php echo form_open_multipart('vols/programmer', array('method'=>'post'));?>	
					<br>
					<input type="hidden" class="form-control" value="<?php echo $this->session->userdata('idAgent');?>" name="agent" required/>
					<input type="text" class="form-control" placeholder="Numéro de Vol" name="id" required/>
					<input type="hidden" class="form-control" value="En Attente" name="status" required/>
					<br>
					<select name="idAv" class="form-control">
					<option value="">Appareil</option>
					<?php while($avi=$wefound2->fetch_object()){ ?>
					<option value="<?php echo $avi->idAvion;?>"><?php echo $avi->NomAv.' - '.$avi->typeAv;?></option>
				<?php } ?>
					</select>
					<br>
					<br>
					<div class="form-group">
					<label>Date départ</label>
            <div class="row">
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="jour1" >
                <option value="<?php echo date('d');?>"><?php echo date('d');?></option>
                <?php for ($j=1;$j<=31;$j++){
					echo'<option value="'.$j.'">Le '.$j.'</option>';
				}?>  
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="mois1" id="expiry-month">
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
              <select class="form-control" name="annee1">
			  <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                <?php for($i=date('Y'); $i<=2035; $i++){
					echo'<option value="'.$i.'">'.$i.'</option>';
				}?>
              </select>
            </div>
          </div>
        </div>
		
		<div class="form-group">
		<label>Date d'arrivée</label>
            <div class="row">
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="jour2" id="expiry-month">
                <option value="<?php echo date('d');?>"><?php echo date('d');?></option>
                <?php for ($j=1;$j<=31;$j++){
					echo'<option value="'.$j.'">Le '.$j.'</option>';
				}?>  
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="mois2" id="expiry-month">
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
              <select class="form-control" name="annee2">
			  <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                <?php for($i=date('Y'); $i<=2035; $i++){
					echo'<option value="'.$i.'">'.$i.'</option>';
				}?>
              </select>
            </div>
          </div>
        </div>
		<br>
		<select name="idAero1" class="form-control">
		<option selected value="">Aéroport de départ</option>
					<?php while($dep=$aeroseek->fetch_object()){
						echo'<option value="'.$dep->idAeroport.'" >'.$dep->Localisation.' - '.$dep->NomAeroport.'</option>';
					}?>
		</select>
					<br>
					<br>
		<select name="idAero2" class="form-control">
					<option selected value="">Aéroport d'arrivée</option>
					<?php while($dest=$aeroseek2->fetch_object()){
						echo'<option value="'.$dest->idAeroport.'" >'.$dest->Localisation.' - '.$dest->NomAeroport.'</option>';
					}?>
		</select>
					<br>		
		</div>	
					<div class="col-sm-5">
					<br>					
					<input type="text" name="heuredep" class="form-control" placeholder="Heure de départ"/>
					<br>
					<input type="text" name="heurearr" class="form-control" placeholder="Heure de d'arrivée"/>
					<br>
					<input type="text" class="form-control" placeholder="Prix du Billet" name="prix" required/>
						<br>
					<input type="text" class="form-control" Placeholder="Nombre des Places" style="color:black" name="place" required/>
						<br>											
					<textarea class="form-control" placeholder="Escales Probables" style="color:black" name="escales" ></textarea>
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