
<!DOCTYPE html>
<?php $connect=new mysqli('localhost','root','','flightmanagement');
	  $this->session->keep_flashdata('tab');
	  $this->session->keep_flashdata('tab1');
	  $this->session->keep_flashdata('tab2');
	  $this->session->keep_flashdata('tab3');
	  
	  $getVol="SELECT*FROM Vol WHERE DateDep ='".$this->session->flashdata('tab1')."' AND idAeroDep='".$this->session->flashdata('tab2')."' AND idAeroDest='".$this->session->flashdata('tab3')."' AND StatusVol='Autorise' ORDER BY HeureDep;";
	  $vol=$connect->query($getVol);
	  
		$aerodep="SELECT*FROM Aeroport WHERE idAeroport='".$this->session->flashdata('tab2')."'";
		$aero1=$connect->query($aerodep);
		$aero1f=$aero1->fetch_object();
		   
		$aerodep1="SELECT*FROM Aeroport WHERE idAeroport='".$this->session->flashdata('tab3')."'";
		$aero2=$connect->query($aerodep1);
		$aero2f=$aero2->fetch_object();
	  
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?php echo $this->session->userdata('NomCl')." ".$this->session->userdata('Prenom');?></title>

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

<style type="text/css">
#baniere
{
border-radius: 10px 10px 10px 10px;
width: 80%;
height: 70px;
background-color: rgb(24,24,24);
background-color: rgba(24,24,24,0.8);
}
</style>

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
      <a class="navbar-brand" href="#Mprofil" title="Voir Votre Compte" data-toggle="modal">
         <img class="img-circle" style="width:50px; height:50px" src="<?php echo base_url($this->session->userdata('Avatar'));?>" alt="" />
	</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
		<?php echo isset($error) ? $error: '';?>
      <ul class="nav navbar-nav">   
		<li><a href="<?php echo site_url ('Welcome/index');?>">Accueil </a></li>
		<li><a href="#" title="Mes Réservations" data-toggle="modal"><i class="fa fa-folder-open">&nbsp;</i>Mes Réservations</a></li>
        <li><a title="Ecraser la session de Connexion" href="<?php echo site_url ('utilisateur/deconnexion');?>"><button class="btn btn-default"><i class="fa fa-cogs">&nbsp</i>Déconnexion</button></a></li>
      </ul>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->


<div class="container">
	  <?php echo $this ->session ->flashdata('msg');?>
	  <hr/>
	 <center><div id="baniere" ><center><h2 style="color: lime; font-family:Century Gothic;">Ligne&nbsp;<?php echo $aero1f->Localisation." > ".$aero2f->Localisation;?>&nbsp;|Vols du &nbsp;<i style="color: cyan;"><?php echo $this ->session ->flashdata('tab');?></i></h2></center></div></center>
	  <hr/>
	  <div class="row">
      <?php while($volt=$vol->fetch_object()){
		   $av="SELECT*FROM Avion WHERE idAvion='".$volt->idAvion."'";
		   $avion=$connect->query($av);
		   $avionyetu=$avion->fetch_object();
		   
		   $comp1="SELECT*FROM Compagnie WHERE id_Comp='".$avionyetu->id_Comp."'";
		   $com=$connect->query($comp1);
		   $compa=$com->fetch_object();
			echo'<a href="#reserv'.$volt->idVol.'" title="Cliquez pour Reserver" data-toggle="modal"><div class="col-sm-3"><div class="panel panel-default"><div class="panel-heading">
				<h4 class="panel-title">'.$compa->NomComp.'</h4>
				</div><div class="panel-body"><p><ul class="list list-unstyled" style="color:purple;"><li>Escales : '.$volt->Escales.'</li><li>Date d\'arrivée : '.$volt->DateArrivee.'</li><li>Heure du Vol : '.$volt->HeureDep.'</li><li>Heure d\'arrivée : '.$volt->HeureArr.'</li><li style="color:green;">Prix : '.$volt->PrixBillet.' $</li><li>Type Appareil : '.$avionyetu->typeAv.'</li><li style="color:red;">Places disponibles : '.$volt->NbrPlaces.'</li></ul></p></div><div class="panel-footer">Nom Avion : '.$avionyetu->NomAv.'</div></div></div></a>';
	  
	   ?>
	   <div class="modal fade" id="reserv<?php echo $volt->idVol;?>" style="font_family:'NewTime Romani';">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(51,122,183);">
					<button class="close" data-dismiss="modal">x</button>
					<h4 class="modal-title" style="text-align:center; font-family:Comic Sans Ms; color:black"><i class="fa fa-plane"></i>&nbsp;Reserver chez&nbsp;<?php echo $compa->NomComp;?>&nbsp;Pour le Vol&nbsp;<?php echo $volt->idVol;?></h4>
				</div>
				<div class="modal-body" style="background-color: white;">
				<div class="row">
				<div class="col-md-offset-2 col-md-8">
                    <Center>     
					<h4>Cliquez pour réserver dans ce vol ou annulez</h4>
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
					<li>Avec Escales à&nbsp;<?php echo $volt->Escales;?></li>
					</ul>              
                <hr/>                
				</div>
				<?php echo form_open('gestion/ResBloggedCl');?>
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
	   
	   
	   <div class="modal fade" id="ConfirmerRes<?php echo $volt->idVol;?>" style="font_family:'NewTime Romani';">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: white;">
					<button class="close" data-dismiss="modal">x</button>
					<h4 class="modal-title" style="text-align:center; font-family:Comic Sans Ms; color:black"><i class="fa fa-plane"></i>&nbsp;Reserver chez&nbsp;<?php echo $compa->NomComp;?>&nbsp;Pour le Vol&nbsp;<?php echo $volt->idVol;?></h4>
				</div>
				<div class="modal-body">
				<div class="row">
				<div class="col-md-offset-2 col-md-8">
                    <Center>     
					<h4 style="font-family:Century Gothic;">Soyez sûr avant de Continuer</h4>
					<hr/>
					</Center>
					<?php echo form_open('reservation/reserver');?>
					Vous serez facturé de&nbsp;<i style="color:green;">&nbsp;<?php echo $volt->PrixBillet." $ US";?></i> Par place!!!<hr/>
					<input type="hidden" name="dateR" value="<?php echo date('Y-m-d');?>"/>
					<input type="hidden" name="client" value="<?php echo $this->session->userdata('idClient');?>"/>
					<input type="hidden" name="vol" value="<?php echo $volt->idVol;?>"/>
					<input type="hidden" name="status" value="NC"/>
					<input type="hidden" name="places" value="<?php echo $volt->NbrPlaces;?>"/>
					<input type="text" name="place" class="form-control" placeholder="Combien des Places?" required><br>
					<input type="text" name="carte" placeholder="Entrer Votre Numero de Carte Bancaire" class="form-control" required/>
					           
                <hr/>                
				</div>	
				<center><button type="submit" class="btn btn-primary">Réserver</button><?php echo form_close(); ?>&nbsp;Ou Continuer sur &nbsp;<img style="width:100px; height:30px" src="<?php echo base_url('images/PaypalButton.png');?>" alt="Annuler" /></center>
				
				</div>
				</div>
			</div>
		</div>
		</div>
	   
	 <?php  }?>
       
 </div><center>
<p class="animated fadeInUp" style="color:rgb(255,255,255)"><a href="<?php echo site_url('gestion/ClientViewVol');?>" class="btn btn-primary"><i class="fa fa-plane">&nbsp;</i>Tous les programmes des Vols ?&nbsp;<i class="fa fa-search"></i></a></p>
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
                    <h4>Régie des Voies Aériennes</h4>
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
                    <input type="text" class="form-control" placeholder="Votre E-mail">
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