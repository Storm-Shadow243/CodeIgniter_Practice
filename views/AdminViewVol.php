<!DOCTYPE html>
<?php $connect=new mysqli('localhost','root','','flightmanagement');
	  $compget="SELECT*FROM aeroport WHERE idAeroport='".$this->session->userdata('idAeroport')."'";
	  $res=$connect->query($compget);
	  $good=$res->fetch_object();
	  $aero="SELECT*FROM aeroport ORDER By idAeroport";
	  $wefound=$connect->query($aero);
	  $col="SELECT*FROM AgentRva WHERE idAeroport='".$good->idAeroport."'";
	  $colf=$connect->query($col);
	  $comp="SELECT*FROM Compagnie ORDER BY NomComp";
	  $compask=$connect->query($comp);
	  $getVolAway="SELECT*FROM Vol WHERE IdAeroDep='".$good->idAeroport."' AND DateDep >'".date('Y-m-d')."' ORDER BY DateDep";
	  $getVolHome="SELECT*FROM Vol WHERE IdAeroDest='".$good->idAeroport."' AND DateArrivee >='".date('Y-m-d')."' ORDER BY DateDep";
	  
	  $volAway=$connect->query($getVolAway);
	  $volHome=$connect->query($getVolHome);
	  
?>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<title><?php echo $good->NomAeroport;?></title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<!-- font awesome -->
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
      <a class="preview navbar-brand" href="#myPic" rel="prettyPhoto" data-toggle="modal">
         <img class="img-circle" style="width:50px; height:50px" src="<?php echo base_url($this->session->userdata('AvatarAgent'));?>" alt="" />
		</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
	
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url ('gestion/aeroport');?>"><i class="fa fa-home">&nbsp;</i>Page précedente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
		<li><a href="#Atter" data-toggle="modal"><i class="fa fa-plane">&nbsp;</i>Vols à Attérir</a></li>
        <li><a href="<?php echo site_url ('utilisateur/deconnexion');?>"><button class="btn btn-default"><i class="fa fa-cogs">&nbsp;</i>Déconnexion</button></a></li>
        
      </ul>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->

<div class="container">

<h1 class="title"><?php echo $this->session->userdata('Nom')." ".$this->session->userdata('Prenom')." de l'".$good->NomAeroport;?></h1>

<div class="row">

<div class="col-sm-4">
<h4 style="color:black;font-family:Century Gothic;"><?php echo '<i class="fa fa-thumbs-up">&nbsp;</i>Bonjour '.$this->session->userdata('Nom').' '.$this->session->userdata('Prenom').' !';?></h4>
    <div class="wowload fadeInLeft"><img style="width:350px;height:350px" class="img-circle" src="<?php echo base_url($this->session->userdata('AvatarAgent'));?>" alt="" /></div>
<h3 style="color:purple;font-family:Century Gothic"><?php echo "Agent à l'".$good->NomAeroport;?></h3>
</div>
<?php echo $this ->session ->flashdata('msg'); ?>
<div class="col-md-8" style="overflow-y: auto;">

<h3>Vols Partant de Chez nous</h3>

    <div class="wowload fadeInLeft">
	<?php 
		$query2=$this->db->query("SELECT*FROM Vol WHERE IdAeroDep='".$good->idAeroport."' AND DateDep >='".date('Y-m-d')."' ORDER BY DateDep;");
			if($query2->num_rows()>0){
				if($query2->num_rows()==1){echo '<span class="badge">'.$query2->num_rows().' <span class="fa fa-plane"></span> Vol pourra décoller</span>' ;}
				else{
				echo '<span class="badge">'.$query2->num_rows().' <span class="fa fa-plane"></span> Vols pourront décoller</span>' ;}
		echo '<table class="table table-striped table-hover">';
		echo '<thead>
	<tr class="success">
	<th>Immatriculation</th>
	<th>Compagnie</th>
	<th>Décollage</th>
	<th>Heure</th>
	<th>Destination</th>
	<th>Autorisation</th>
	</tr>
	</thead>
	<tbody>';	
		while($Away=$volAway->fetch_object()){
			
			$plane="SELECT*FROM Avion WHERE idAvion='".$Away->idAvion."'";
			$plane1=$connect->query($plane);
			$plane2=$plane1->fetch_object();
			
			$port="SELECT*FROM Aeroport WHERE idAeroport='".$Away->idAeroDest."'";
			$port1=$connect->query($port);
			$port2=$port1->fetch_object();
			
			$comp="SELECT*FROM Compagnie WHERE id_Comp='".$plane2->id_Comp."'";
			$comp1=$connect->query($comp);
			$comp2=$comp1->fetch_object();
			
			$ag="SELECT*FROM AgentRva WHERE idAgent='".$Away->idAgent."'";
			$agen=$connect->query($ag);
			$agent=$agen->fetch_object();


		echo'<tr><td>'.$plane2->Immat.'</td><td>'.$comp2->NomComp.'</td><td>'.$Away->DateDep.'</td><td>'.$Away->HeureDep.'</td><td>'.$port2->NomAeroport.'</td>';
	if ($Away->StatusVol=="En Attente"){echo'<td><a data-toggle="modal" href="#Mod'.$Away->idVol.'" title="Autoriser le vol" onclick="">Non-Autorisé!</a></td>';}
		elseif($Away->StatusVol=="Autorise") {echo'<td><a data-toggle="modal" href="#Mod'.$Away->idVol.'" title="Annuler le vol" onclick="">Vol autorisé&nbsp;</a>par '.$agent->Nom.' '.$agent->Prenom.'</td>';
			}
		elseif($Away->StatusVol=="Annule") {echo'<td>Le vol a été annulé par '.$agent->Nom.' '.$agent->Prenom.'</td>';
			}else {echo'<td>Ce Vol n\'aura pas lieu. La compagnie l\'a annulé</td>';
			}
		
		echo'</tr>';?>
	<!-- Debut Modif Status Vol -->
	
	<div class="modal fade " id="<?php echo "Mod".$Away->idVol;?>" style="top:25px; " tabindex="-2" role="dialog" aria-hidden="false">  
	<div class="modal-dialog " style="width:350px;">  
	<div class="modal-content panel-green">				
	<div class="panel-heading">
	
	<div class="modal-body" style="height:200px;">	
											
											
	<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-plane"></i>&nbsp;Annuler le vol de&nbsp;<?php echo $plane2->Immat;?></h4>
															
	<br>
	<center>
	
	<?php echo form_open_multipart('vols/setStatusVol',array('method'=>'post'));?>
	<br>
	<input type="hidden" value="<?php echo $Away->idVol;?>" name="id"/>
	<?php if($Away->StatusVol=="En Attente"){
		echo '<label>Voulez-vous Autoriser le Vol '.$Away->idVol.' de&nbsp;'.$plane2->Immat.'</label><input type="hidden" class="form-control" name="etat" value="Autorise" />';
	}elseif($Away->StatusVol=="Autorise"){ echo '<label>Voulez-vous Annuler le Vol '.$Away->idVol.' de&nbsp;'.$plane2->Immat.'</label><input type="hidden" class="form-control" name="etat" value="Annule" />';}  ?>
	<input type="hidden" value="<?php echo $this->session->userdata('idAgent');?>" name="agent" />
										
	</center>
											
	</div>
	<div class="modal-footer">
	<div class="form-group">
	<center>
	<button type="submit" id="btnSave" name="modifV" class="btn btn-default"><span class="fa fa-save" value="" data-dismiss="modal"></span>   Continuer</button>
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

	<!-- Fin Modif Satus Vol -->
	
			<?php }
			echo'</tbody></table>';
			}else{echo '<center><h2><i class="fa fa-comments">&nbsp;</i>Aucun Vol ne décolle de chez nous</h2></center>';} ?>
	
	</div>
</div> 
</div>
</div>
<br>


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
				
	</div><!--/.Fin de mon profil-->


	
				<div class="modal fade" id="Atter" style="top:10; font_family:'vijaya';" tabindex="-1" role="dialog" aria-labelledby="#depart" aria-hidden="false">  
				<div class="modal-dialog " style="width: 700px; height: 450px;">  
				<div class="modal-content panel-green " style="background-color:rgb(191, 161, 69);"> 
					<div class="panel-heading">
							
						<button href="#" class="close" data-dismiss="modal"><span class="btn btn-danger">X</span></button> 
						<h3 class="modal-title" id="depart" style="color:black;text-align:center"><i class="fa fa-users fa-7x" style="font-size:40px;"></i> &nbsp;Les Vols En route vers nous</h3> 
					</div>
					<div class="modal-body" style="width: 700px; height: 400px;overflow-y: auto;">
					<div class="row" style="margin-top:1px; margin-left:1px; margin-right:1px; float: middle;">
									
						<div class="jumbotron">
							<div class="table-responsive">
							<h5 style="font_family:Comic Sans Ms;">

	<?php $query3=$this->db->query("SELECT*FROM Vol WHERE IdAeroDest='".$good->idAeroport."' AND DateDep >='".date('Y-m-d')."' ORDER BY DateDep;");
			if($query3->num_rows()>0){
	echo '<table class="table table-striped table-hover">';
	echo '<span class="badge">'.$query3->num_rows().' <span class="fa fa-plane"></span> Vols pourront Attérir</span>	
	<thead>
	<tr class="success">
	<th>Immatriculation</th>
	<th>Compagnie</th>
	<th>Attérrissage</th>
	<th>Heure</th>
	<th>Provenance</th>
	</tr>
	</thead>
	<tbody>';
	
	while($Home=$volHome->fetch_object()){
			$plan="SELECT*FROM Avion WHERE idAvion='".$Home->idAvion."'";
			$plan1=$connect->query($plan);
			$plan2=$plan1->fetch_object();
			
			
			$porte="SELECT*FROM Aeroport WHERE idAeroport='".$Home->idAeroDep."'";
			$porte1=$connect->query($porte);
			$porte2=$porte1->fetch_object();
			
			$com="SELECT*FROM Compagnie WHERE id_Comp='".$plan2->id_Comp."'";
			$com1=$connect->query($com);
			$com2=$com1->fetch_object();
	
	echo '<tr><td>'.$plan2->Immat.'</td><td>'.$com2->NomComp.'</td><td>'.$Home->DateArrivee.'</td><td>'.$Home->HeureArr.'</td><td>'.$porte2->NomAeroport.'</td></tr>';
	}
	echo '<tbody></table>';
	}
else{
	echo '<center><h2><i class="fa fa-comments">&nbsp;</i>Aucun Vol ne vient chez nous</h2></center>';
		}
	
?>

											
							</h5>
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
				</div>
				
			
	
	
<script src="<?php echo base_url('assets/jquery.js'); ?>"></script>

<!-- wow script -->
<script src="<?php echo base_url('assets/wow/wow.min.js'); ?>"></script>

<!-- uniform -->
<script src="<?php echo base_url('assets/uniform/js/jquery.uniform.js'); ?>"></script>

<!-- boostrap -->
<script src="<?php echo base_url('assets/bootstrap/js/jquery.isotope.min.js'); ?>" type="text/javascript" ></script>

<script src="<?php echo base_url('assets/bootstrap/js/main.js'); ?>" type="text/javascript" ></script>

<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js'); ?>" type="text/javascript" ></script>

<script src="<?php echo base_url('assets/bootstrap/js/jquery.prettyPhoto.js'); ?>" type="text/javascript" ></script>

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