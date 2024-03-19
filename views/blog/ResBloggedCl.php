<!DOCTYPE html>
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
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Realiser par Bernard Malango">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $id;?></title>
	
	<!-- core CSS -->
    <link href="<?php echo base_url('assets2/css/bootstrap.min.css" rel="stylesheet');?>">
    <link href="<?php echo base_url('assets2/css/font-awesome.min.css" rel="stylesheet');?>">
    <link href="<?php echo base_url('assets2/css/animate.min.css" rel="stylesheet');?>">
    <link href="<?php echo base_url('assets2/css/prettyPhoto.css" rel="stylesheet');?>">
    <link href="<?php echo base_url('assets2/css/main.css" rel="stylesheet');?>">
    <link href="<?php echo base_url('assets2/css/responsive.css" rel="stylesheet');?>">
	<link rel="<?php echo base_url('assets2/stylesheet" href="css/style-login.css');?>"> 
	<link href="<?php echo base_url('assets2/js/modal.js');?>">
	<link href="<?php echo base_url('assets2/js/jquery.js');?>">
    <link href="<?php echo base_url('assets2/js/carousel.js');?>">	
	<link rel="icon" href="<?php echo base_url('images/favicon.png'); ?>" type="image/x-icon">

	
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
	
 
 <!--Style de la page autre designe by Bernard Malango-->
            
</head>
<body style="background-color:rgb(220,255,220);font-family:Comic Sans Ms;">



<header id="header">
        <nav class="navbar navbar-inverse" role="banner">
		<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" data-toggle="modal" href="#comp"><img src="<?php echo base_url($logo); ?>"  style="width:150px;height:50px"  alt="Compagnie"></a>
		<ul class="nav navbar-nav">
            <li> <p title="Voir Votre Compte" style="color:white;font-family:Century Gothic; font-size:30px"><?php echo $name;?></p><li>
        </ul>
		</div>
            
                <div class="collapse navbar-collapse navbar-right">

                    
      <ul class="nav navbar-nav"> 
		<li><?php echo isset($error) ? $error: '';?></li>
		<li><a href="<?php echo site_url ('Welcome/index');?>">Accueil </a></li>
		<li><a href="<?php echo site_url('gestion/ClientRes');?>" title="Mes Réservations" ><i class="fa fa-folder-open">&nbsp;</i>Mes Réservations</a></li>
        <li><a title="Ecraser la session de Connexion" href="<?php echo site_url ('utilisateur/deconnexion');?>"><button class="btn btn-default"><i class="fa fa-cogs">&nbsp</i>Déconnexion</button></a></li>
      </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

	<div class="container">
	<br>
	<div id="information" class="spacer reserve-info ">
	<div class="container wow fadeInDown">
	<div class="col-sm-2">
	<img style="width:100px;height:100px" class="img-circle" src="<?php echo base_url($this->session->userdata('Avatar'));?>" alt="" />
	<h4 style="color:black;font-family:Century Gothic;"><?php echo $this->session->userdata('NomCl')." ".$this->session->userdata('Prenom');?></h4>
	</div>
	<div class="col-sm-8">
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
		<div class="col-sm-2">
	</div>
	</div>
	</div>
	</div>
    <section id="portfolio">
        <div class="container wow fadeInUp">
		<center><p>
		<h1 class="title" style="font-family:Century Gothic;color:blue;">Images du  <?php echo $nom;?></h1></p></center>
            <div id="portif" class="center portfolio-items">
			<?php foreach($Image as $found){ ?>
			<div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-preview" style="width:300px;height:250px;" src="<?php echo base_url($found->Url);?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#"><?php echo $found->NomImage;?></a></h3>
                                    <p><?php echo $found->Description;?></p>
                                    <a class="preview" href="<?php echo base_url($found->Url);?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Voir</a>
                                </div> 
                            </div>
                        </div>
                    </div>
			
			<?php   }?>
            </div>
			</div>
        

            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">Tous les Aéroports</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Internationaux</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".html">Nationaux</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".wordpress">Autres</a></li>
            </ul><!--/#portfolio-filter-->

            <div class="row">
                <div class="portfolio-items">
				 
                    <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-preview" src="<?php echo base_url('assets2/images/portfolio/recent/item1.png');?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">N'djili Kinshasa</a></h3>
                                    <p>L'espace aéroportuaire de qualité. N°1 En RDC. La fierté et l'honneur de la Nation. Les Standards Internationaux respectés</p>
                                    <a class="preview" href="<?php echo base_url('assets2/images/portfolio/full/item1.png');?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Voir</a>
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item joomla bootstrap col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-preview" src="<?php echo base_url('assets2/images/portfolio/recent/item2.png');?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Luano Lubumbashi</a></h3>
                                    <p>Le numero deux en RDC. Tour de Contrôle renovée, piste plus longue, hangar et hall d'attente confortable</p>
                                    <a class="preview" href="<?php echo base_url('assets2/images/portfolio/full/item2.png');?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Voir</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item bootstrap wordpress col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-preview" src="<?php echo base_url('assets2/images/portfolio/recent/item3.png');?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Gbadolite Tshopo</a></h3>
                                    <p>L'aéroport de choix pour les voyageurs à bord des vols internationaux.</p>
                                    <a class="preview" href="<?php echo base_url('assets2/images/portfolio/full/item3.png');?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Voir</a>
                                </div> 
                            </div>
                        </div>        
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item joomla wordpress apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-preview" src="<?php echo base_url('assets2/images/portfolio/recent/item4.png');?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Bangoka à Kisangani</a></h3>
                                    <p>L'aéroport de classe, vous ne serez pas deçu de nos services qui repondent au quadruple vos moindres attentes</p>
                                    <a class="preview" href="<?php echo base_url('assets2/images/portfolio/full/item4.png');?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Voir</a>
                                </div> 
                            </div>
                        </div>           
                    </div><!--/.portfolio-item-->
          
                    <div class="portfolio-item joomla html bootstrap col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-preview" src="<?php echo base_url('assets2/images/portfolio/recent/item5.png');?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Kasai Mbujimayi</a></h3>
                                    <p>L'qéroport au centre du Congo. L'excellence qualité, le respect des normes et des principes. Service d'hôtel très satisfaisant</p>
                                    <a class="preview" href="<?php echo base_url('assets2/images/portfolio/full/item5.png');?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Voir</a>
                                </div> 
                            </div>
                        </div>      
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-preview" src="<?php echo base_url('assets2/images/portfolio/recent/item6.png');?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Goma Nord-Kivu</a></h3>
                                    <p>La porte standarde d'entrée à l'Est de la RDC. La perle du Grand Kivu. L'aéroport où on se sent chez soi.</p>
                                    <a class="preview" href="<?php echo base_url('assets2/images/portfolio/full/item6.png');?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Voir</a>
                                </div> 
                            </div>
                        </div>         
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-preview" src="<?php echo base_url('assets2/images/portfolio/recent/item7.png');?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Kavumu Bukavu</a></h3>
                                    <p>L'aéroport national de qualité. Géré par la RVA/Bukavu. Situé dans le territoire de Kabare Gpmt Bugorhe sur le site de Kwinji</p>
                                    <a class="preview" href="<?php echo base_url('assets2/images/portfolio/full/item7.png');?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Voir</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-preview" src="<?php echo base_url('assets2/images/portfolio/recent/item8.png');?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Kananga Grand Kasai</a></h3>
                                    <p>L'aéroport deuxième classe du Grand Kasai. Situé à Kananga, ancienement Luluabourg</p>
                                    <a class="preview" href="<?php echo base_url('assets2/images/portfolio/full/item8.png');?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Voir</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
	<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php echo date('Y');?> <a target="_blank" href="http://www.rva-rdc.cd" title="Aeronautics Master">Régie des Voies Aériennes</a>. Tous Droits Reservés.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="<?php echo site_url('Welcome/index');?>">Accueil</a></li>
                        <li><a href="#About" data-toggle="modal">A propos</a></li>
                        <li><a href="#">Contactez-nous</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
	

		
		<div class="modal fade" id="Confirmer" style="font-family:'Century Gothic';">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: white;">
					<button class="close" data-dismiss="modal">x</button>
					<h4 class="modal-title" style="text-align:center; font-family:Comic Sans Ms; color:black"><i class="fa fa-plane"></i>&nbsp;Reserver chez&nbsp;<?php echo $name;?>&nbsp;Pour le Vol&nbsp;<?php echo $id;?></h4>
				</div>
				<div class="modal-body">
				<div class="row">
				<div class="col-md-offset-2 col-md-8">
                    <Center>     
					<h4 style="font-family:Century Gothic;">Vous choisissez de Réserver et de payer au guichet avant l'embarquement</h4>
					<hr/>
					<h4 style="font-family:vijaya;">Veuillez renseigner <?php echo ' '.$name.' ' ;?> du nombre des places que vous souhaitez avoir sur le vol <?php echo ' '.$id.' ' ;?> </h4>
					<br>
					</Center>
					<?php echo form_open('reservation/reserver');?>
					<input type="hidden" name="dateR" value="<?php echo date('Y-m-d');?>"/>
					<input type="hidden" name="client" value="<?php echo $this->session->userdata('idClient');?>"/>
					<input type="hidden" name="vol" value="<?php echo $id;?>"/>
					<input type="hidden" name="status" value="NC"/>
					<input type="hidden" name="places" value="<?php echo $places;?>"/>
					<input type="text" name="place" class="form-control" placeholder="Combien des Places?" required>         
                <hr/> 
		<center><button type="submit" class="btn btn-danger">Envoyer La Réservation</button></center>				
				</div>
				<?php echo form_close(); ?>
				</div>
				</div>
			</div>
		</div>
		</div>
		
		
		

    <script src="<?php echo base_url('assets2/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets2/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets2/js/jquery.prettyPhoto.js');?>"></script>
    <script src="<?php echo base_url('assets2/js/jquery.isotope.min.js');?>"></script>
    <script src="<?php echo base_url('assets2/js/main.js');?>"></script>
    <script src="<?php echo base_url('assets2/js/wow.min.js');?>"></script>
	
                <!--/.Ajoter Un Administrateur-->		
</body>
</html>