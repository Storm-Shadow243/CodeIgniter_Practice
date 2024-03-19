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
	  $getVolAway="SELECT*FROM Vol WHERE IdAeroDep='".$good->idAeroport."' AND DateDep ='".date('Y-m-d')."' AND StatusVol='Autorise' ORDER BY HeureDep;";
	   $volAway=$connect->query($getVolAway);
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

<body id="home" style="font-family:Comic Sans Ms;" >


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
		<li><?php // echo $this ->session ->flashdata('msg'); ?></li>
        <li><a href="<?php echo site_url ('Welcome/index');?>"><i class="fa fa-home">&nbsp;</i>Accueil </a></li>
        <li><a href="<?php echo site_url('gestion/adminViewVol');?>"><i class="fa fa-plane">&nbsp;</i>Vols</a></li>
		<li><a href="#Compagnies" data-toggle="modal"><i class="fa fa-edit">&nbsp;</i>Nos Compagnies</a></li>
		<li><a href="#Collegue" data-toggle="modal"><i class="fa fa-users">&nbsp;</i>Mes Collègues</a></li>
		<li><a href="#Mprofil" data-toggle="modal"><i class="fa fa-user">&nbsp;</i>Mon Profil</a></li>
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
<div class="col-md-8" style="overflow-y: auto;">
<?php echo $this ->session ->flashdata('msg'); ?>
<h3>Vols d'aujourd'hui le <?php echo date('d F');?> </h3>

    <div class="wowload fadeInLeft">
	<?php 
		$query2=$this->db->query("SELECT*FROM Vol WHERE IdAeroDep='".$good->idAeroport."' AND DateDep ='".date('Y-m-d')."' AND StatusVol='Autorise' ORDER BY HeureDep;");
			if($query2->num_rows()>0){
				if($query2->num_rows()==1){echo '<span class="badge"> Aujourd\'hui '.$query2->num_rows().' <span class="fa fa-plane"></span> Vol pourra décoller</span>' ;}
				else{
				echo '<span class="badge"> Aujourd\'hui '.$query2->num_rows().' <span class="fa fa-plane"></span> Vols pourront décoller</span>' ;}
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
		if($Away->StatusVol=="Autorise") {echo'<td style="color:green"><i class="fa fa-thumbs-up">&nbsp;</i>Vol autorisé</td>';}
		echo'</tr>';?>
	
			<?php }
			echo'</tbody></table>';
			}else{echo '<center><h2><i class="fa fa-comments">&nbsp;</i>Aucun Vol ne décolle de chez nous aujourd\'hui</h2></center>';} ?>
	
	</div>
</div> 
</div>
</div>
<br>
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
                        <li><a href="#">Rooms & Tariff</a></li>        
                        <li><a href="#">Introduction</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Tour Packages</a></li>
                        <li><a href="#">Contact</a></li>
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
												<td  class="success">Matricule</td>
												<td class="danger"><?php echo $this->session->userdata('Matricule'); ?></td>
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
												<td  class="success">Affectation</td>
												<td class="danger"><?php echo $good->NomAeroport; ?></td>
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
					<?php echo form_open_multipart('utilisateur/modifierCompteAgent', array('method'=>'post'));?>		
					<input type="hidden" class="form-control" name="id" value="<?php echo $this->session->userdata('idAgent'); ?>" required/>
					<input type="hidden" class="form-control" name="nom" value="<?php echo $this->session->userdata('Nom'); ?>" required/>
					<input type="hidden" class="form-control" name="pre" value="<?php echo $this->session->userdata('Prenom'); ?>" required/>
					<input type="hidden" class="form-control" name="mat" value="<?php echo $this->session->userdata('Matricule'); ?>" required/>
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
					<select class="form-control" title="Aéroport d'affectation" name="affectation"  value=""><option value="<?php echo $good->idAeroport ?>"><?php echo $good->NomAeroport; ?></option>
					<?php while ($aerof=$wefound->fetch_object()){echo '<option value='.$aerof->idAeroport.'>'.$aerof->NomAeroport.'<option>';} ?>
					</select>
						<br>
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
						<h3 class="modal-title" id="depart" style="color:black;text-align:center"><i class="fa fa-users fa-7x" style="font-size:40px;"></i> &nbsp; Agents de l'<?php echo $good->NomAeroport." à ".$good->Localisation; ?></h3> 
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
											<th>Matricule</th>
											<th>Adresse</th>
											<th>Email</th>
											<th>Telephone</th>
											<th>Photo</th>
										</tr>
									</thead>
									<tbody>
											<?php while ($ressource=$colf->fetch_object()){?>
											<tr>
												<td><?php echo $ressource->Nom;?></td><td><?php echo $ressource->Prenom;?></td><td><?php echo $ressource->Service;?></td><td><?php echo $ressource->Matricule;?></td><td><?php echo $ressource->Adresse;?></td><td><?php echo $ressource->Email;?></td><td><?php echo $ressource->Telephone;?></td><td><a title="Voir Photo" data-toggle="modal" href="#Pic<?php echo $ressource->Nom;?>" onclick="ppopup()"><img class="img-circle" style="width:50px; height:50px" src="<?php echo base_url($ressource->AvatarAgent);?>" alt="" /></a></td>	
												
											</tr>
											<div class="modal fade " id="<?php echo "Pic".$ressource->Nom;?>" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
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
					<a data-toggle="modal" class="btn btn-danger" title="Ajouter un agent pour votre aéroport" href="#AgentNew" onclick="ppopup()">
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
					<?php echo form_open_multipart('utilisateur/inscrireAgentRva', array('method'=>'post'));?>		
					<input type="text" class="form-control" name="nom" Placeholder="Nom" required/>
					<br>
					<input type="text" class="form-control" name="prenom" Placeholder="Prénom"  required/>
					<br>
					<input type="text" class="form-control" Placeholder="Service" name="serv" required/>
					<br>
					<input type="text" class="form-control" Placeholder="Matricule" name="mat" required/>
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
					<input type="hidden" name="affectation" value="<?php echo $good->idAeroport;?>"/>
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
					
					
					<div class="modal fade" id="Compagnies" style="top:10; font_family:'vijaya';" tabindex="-1" role="dialog" aria-labelledby="#depart" aria-hidden="false">  
				<div class="modal-dialog " style="width: 900px; height: 450px;">  
				<div class="modal-content panel-green " style="background-color:rgb(191, 161, 69);"> 
					<div class="panel-heading">
							
						<button href="#" class="close" data-dismiss="modal"><span class="btn btn-danger">X</span></button> 
						<h3 class="modal-title" id="depart" style="color:black;text-align:center"><i class="fa fa-users fa-7x" style="font-size:40px;"></i> &nbsp;Les Compagnies exploitant l'espace Aérien National</h3> 
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
											<th>Code IATA</th>
											<th>Siege</th>
											<th>Télélphone</th>
											<th>Email</th>
											<th>Etat</th>
											<th>Logo</th>
										</tr>
									</thead>
									<tbody>
											<?php while ($got=$compask->fetch_object()){?>
											<tr>
												<td><?php echo $got->NomComp;?></td><td><?php echo $got->CodeIATA;?></td><td><?php echo $got->Siege;?></td><td><?php echo $got->Telephone;?></td><td><?php echo $got->Email;?></td><td style="color:red;"><i class="<?php if ($got->Etat=="Actif"){echo'fa fa-unlock';}elseif ($got->Etat=="Inactif"){echo 'fa fa-lock';}?>">&nbsp;</i><a title="Editer L'Etat d'Accès" data-toggle="modal" href="#Pic<?php echo $got->id_Comp;?>" onclick="ppopup()"><?php echo $got->Etat;?></td></a><td><img class="img-circle" style="width:50px; height:50px" src="<?php echo base_url($got->Logo);?>" alt="" /></td>	
												
											</tr>
											<div class="modal fade " id="<?php echo "Pic".$got->id_Comp;?>" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
											<div class="modal-dialog " style="width:350px;">  
											<div class="modal-content panel-green ">				
											<div class="panel-heading">
											<div class="modal-body" style="height:250px;overflow-y: auto;">	
											
											
											<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-user"></i>&nbsp;Modifier Accès de&nbsp;<?php echo $got->NomComp." de ".$got->Siege;?></h4>
															
															
											<center>
											<img class="img-circle" style="width:80px; height:80px" src="<?php echo base_url($got->Logo);?>" alt=""/>		
											</center>
											<br>
											<center>
											<label>
											<?php echo form_open_multipart('utilisateur/setEtatComp',array('method'=>'post'));?>
											Etat Accès:   
											</label>
											<br>
											<input type="hidden" value="<?php echo $got->id_Comp;?>" name="id" />
											<?php if ($got->Etat=="Actif"){echo'<label>Voulez-vous désactiver?</label><input type="hidden" class="form-control" name="etat" value="Inactif" />';}elseif ($got->Etat=="Inactif"){echo '<label>Voulez-vous Activer?</label><input class="form-control" type="hidden" name="etat" value="Actif" />';}?>
										
											</center>
											
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
					<a data-toggle="modal" class="btn btn-danger" title="Inscrire Une nouvelle Compagnie" href="#NewComp" onclick="ppopup()">
					<span class="fa fa-save"></span>&nbsp;Nouvelle Compagnie</a></center>
					<p>
						<i><h3 style="font_family:NewTime Roman; color:black; font-size:15px; text-align:center;">&copy; RVA <?php echo date('Y');?>|tout droit réservé</h3></i>
					</p>
					</div>
				</div>
				</div> 
				</div>
	
	
	<div class="modal fade " id="NewComp" style="top:25px; " tabindex="-2" role="dialog" aria-labelledby="#Agent" aria-hidden="false">  
			<div class="modal-dialog " style="width:350px;">  
			<div class="modal-content panel-green ">	
					<div class="panel-heading">
					<button href="#" class="close" class="fa fa-times-circle fa-2x" data-dismiss="modal">x</button> 
					<h4 class="modal-title" id="depart" style="text-align:center"><i class="fa fa-cog fa-17x"></i>&nbsp;Inscrire Une Compagnie</h4> 
					</div>
														
					<div class="modal-body" style="height:360px;overflow-y: auto;">	
														
					<div class="form-horizontal">
					<div class="col-lg-12">
					<?php echo form_open_multipart('utilisateur/inscrireComp', array('method'=>'post'));?>		
					<input type="text" class="form-control" name="nom" Placeholder="Nom de la compagnie" required/>
					<br>
					<input type="text" class="form-control" name="siege" Placeholder="Siège de la compagnie"  required/>
					<br>
					<input type="text" class="form-control" Placeholder="Code IATA" name="code" required/>
					<br>
					<input type="text" class="form-control" placeholder="Numéro de Télélphone" name="phone" required/>
						<br>
					<input type="text" class="form-control" placeholder="Email" name="email" required/>
						<br>
					<input type="hidden" name="etat" value="Inactif" required/>
					<label> Logo</label>
					<?php echo form_upload('picture');?>
					</div>
					</div>
																
					</div>	
														
					<div class="modal-footer">
					<div class="form-group">
					<center>										
					<button type="submit" id="btnSave" name="modifP" class="btn btn-default"><span class="fa fa-save" value="" data-dismiss="modal"></span>   Inscrire</button>
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