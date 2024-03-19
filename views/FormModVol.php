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
	  
	  $this->session->keep_flashdata('tab');
	  $vol="SELECT*FROM Vol WHERE idVol='".$this->session->flashdata('tab')."';";
	  $volf=$connect->query($vol);
	  $volt=$volf->fetch_object();
	  $res="SELECT*FROM Reservation WHERE idVol='".$this->session->flashdata('tab')."';";
	  $reseek=$connect->query($res);

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
        <li><a href="<?php echo site_url ('gestion/MajVol');?>"><i class="fa fa-home">&nbsp;</i>Page Précédente </a></li>
		<li><a href="<?php echo site_url ('gestion/compagnie');?>"><i class="fa fa-folder-open">&nbsp;</i>Retour</a></li>
        <li><a href="<?php echo site_url ('utilisateur/deconnexion');?>"><button class="btn btn-default"><i class="fa fa-cogs">&nbsp;</i>Déconnexion</button></a></li>
        
      </ul>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->
<div class="container">
<div class="col-sm-3"></div>
<div class="col-sm-5"><?php echo $this ->session ->flashdata('msg'); ?></div>
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-3">
<h4 style="color:black;font-family:Century Gothic;"><?php echo '<i class="fa fa-thumbs-up">&nbsp;</i>Bonjour '.$this->session->userdata('Nom').' '.$this->session->userdata('Prenom').' !';?></h4>
    <div class="wowload fadeInLeft"><img style="width:260px;height:260px" class="img-circle" src="<?php echo base_url($this->session->userdata('AvatarAgent'));?>" alt="" /></div>
<h3 style="color:purple;font-family:Century Gothic"><?php echo "Agent à ".$good->NomComp;?></h3>
</div>
<div class="col-sm-8 wowload fadeInRight panel panel-green" style="overflow-y:auto;height:530px;">
         
<i class="fa fa-edit fa-fw"></i>Modifier le Vol&nbsp;<?php echo $this->session->flashdata('tab');?><span style="float:right;"><br>
                      
 <table class="table" style="color:black;">
 <?php 
			$aerodep="SELECT*FROM Aeroport WHERE idAeroport='".$volt->idAeroDep."'";
		   $aero1=$connect->query($aerodep);
		   $aero1f=$aero1->fetch_object();
		   
		   $aerodep1="SELECT*FROM Aeroport WHERE idAeroport='".$volt->idAeroDest."'";
		   $aero2=$connect->query($aerodep1);
		   $aero2f=$aero2->fetch_object();
		   
		   $aeroport="SELECT*FROM Aeroport ORDER BY Localisation;";
			$aeroseek=$connect->query($aeroport);
			$aeroseek1=$connect->query($aeroport);
 
 ?>	
		<tbody>
		<form method="POST" action="#">
		<input type="hidden" name="agent" value="<?php echo $this->session->userdata('idAgent');?>" />
		<input type="hidden" class="form-control" value="<?php echo $volt->idVol;?>" name="id" required/>
		<input type="hidden" class="form-control" value="<?php echo $volt->StatusVol;?>" name="status" required/>
		<tr>
		<td>Appareil</td><td><select name="Av" class="form-control">
					<?php while($avi1=$wefound3->fetch_object()){ ?>
					<option value="<?php echo $avi1->idAvion;?>"><?php echo $avi1->NomAv.' - '.$avi1->typeAv;?></option>
				<?php } ?>
					</select>
		</td></tr><tr><td>Aéroport de depart</td><td>
		<input type="text" name="Aero1" class="form-control" value="<?php echo "Quitte ".$aero1f->Localisation;?>" readonly/>
		</td></tr><tr>
		<td>Aéroport d'arrivée</td><td>
		<input type="text" name="Aero2"  value="<?php echo "Pour ".$aero2f->Localisation;?>" class="form-control" readonly/>
		</td><td></td><td><button type="submit" class="btn btn-default" name="send"><i class="fa fa-save">&nbsp;</i> Envoyer</button></form></td></tr>
		<?php
			if (isset($_POST['send'])){
			$id = $_POST['id'];
			$agent =  $_POST['agent'];
			$data= $_POST['Av'];
			$donnee=date('Y-m-d');
			
			$change="UPDATE Vol SET
					idAvion='$data' WHERE idVol='".$id."';";
			$success=$connect->query($change);
				if($success){
					echo"<Script type=\"text/javascript\"> alert('Modification reussi avec succès un Mail est envoyé à ceux qui ont reservé')</Script>";
					}else{echo"<Script type=\"text/javascript\"> alert('Echec de Modification')</Script>";}
			$this->session->set_flashdata('tab',$id);
			}
		?>
		<?php echo form_open('vols/modifier2');?>
		<tr>
		<input type="hidden" name="agent" value="<?php echo $this->session->userdata('idAgent');?>" />
		<input type="hidden" class="form-control" value="<?php echo $volt->idVol;?>" name="id" required/>
		<input type="hidden" name="comp" value="<?php echo $good->NomComp;?>"/>
		<input type="hidden" name="num" value="<?php echo $good->Telephone;?>"/>
		<input type="hidden" class="form-control" value="<?php echo $volt->StatusVol;?>" name="status" required/>
		<td>Date de départ</td><td><input type="text" class="form-control col-sm-2" name="jour1" value="<?php echo date('d');?>" />
</td><td><input type="text" class="form-control col-sm-2" name="mois1" id="expiry-month"  value="<?php echo date('m');?>"/>
                
</td><td><input type="text" class="form-control" name="annee1" value="<?php echo date('Y');?>"  />
			  </td>
		</tr>
		<tr>
		<td>Date d'arrivée</td><td><input type="text" class="form-control col-sm-2" name="jour2" value="<?php echo date('d');?>" />
			  </td>
<td><input type="text" class="form-control col-sm-2" name="mois2" id="expiry-month"  value="<?php echo date('m');?>"/>
</td>
<td><input type="text" class="form-control" name="annee2" value="<?php echo date('Y');?>"  />
</td>
		</tr>
		<tr>
		<td>Heure de départ</td><td>
		<input type="text" name="heuredep" class="form-control" value="<?php echo $volt->HeureDep;?>" placeholder="Heure de départ"/>
		</td></tr><tr><td>Heure d'arrivée</td>
		<td>
		<input type="text" name="heurearr" class="form-control" value="<?php echo $volt->HeureArr;?>" placeholder="Heure de d'arrivée"/>
		</td><td></td><td><button type="submit" class="btn btn-default" name="send"><i class="fa fa-save">&nbsp;</i> Envoyer</button>
		</tr>
		<?php echo form_close();?>
		<tr>
		<?php echo form_open('vols/modifier3');?>
		<input type="hidden" name="agent" value="<?php echo $this->session->userdata('idAgent');?>" />
		<input type="hidden" class="form-control" value="<?php echo $volt->idVol;?>" name="id" required/>
		<input type="hidden" class="form-control" value="<?php echo $volt->StatusVol;?>" name="status" required/>
		<input type="hidden" name="comp" value="<?php echo $good->NomComp;?>"/>
		<input type="hidden" name="num" value="<?php echo $good->Telephone;?>"/>

		<td>Prix du Billet en $ U.S</td><td><input type="text" class="form-control" placeholder="Prix du Billet" value="<?php echo $volt->PrixBillet;?>" name="prix" required/></td>
		<td>Nombre des Places</td><td><input type="text" class="form-control" Placeholder="Nombre des Places" value="<?php echo $volt->NbrPlaces;?>" style="color:black" name="place" required/></td>
		</tr>
		<tr>
		<td>Escales</td><td><input type="text" class="form-control" placeholder="Escales Probables" value="<?php echo $volt->Escales;?>" style="color:black" name="escales" /></td>
		<td></td><td><button type="submit" name="envoyer" class="btn btn-default"><i class="fa fa-save">&nbsp;</i>Enregistrer</button>
<?php echo form_close();?></td>
		</tr>
										
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