<?php include("connexion_mysql.php");
conexion();
session_start();
$_SESSION['user'] = '';
$_SESSION['pswd'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>recherche prof</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                         <li class="sidebar-search">
                            <div class="input-group custom-search-form">
								<form id="form1" name="form1" method="post" action="recherche.php">
								<input type="text" name="critere" size="20" class="keywords" id="textfield"  maxlength="50"  placeholder="(Entrer nom)search..."/>
                               
								</form>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i>LISTER TOUS</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Aller a<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="cours_domaine_niveau.php">CDN</a>
                                </li>
								<li>
                                    <a href="professeurs_cours_domaine_niveau.php">PCDN</a>
                                </li>
                                <li>
                                    <a href="cours.php">Cours</a>
                                </li>
                                <li>
                                    <a href="domaines.php">Domaines</a>
                                </li>
								<li>
                                    <a href="niveaux.php">Niveaux</a>
                                </li>
								<li>
                                    <a href="fonction.php">Fonction</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

<?php 		
	//gestion recherche
		if(isset($_POST)){
			if(!empty($_POST['critere']))
			{
				extract($_POST);
				$critere='%'.$critere.'%';
				//SELECT * FROM `produit` WHERE `Code_type` = 15
				//SELECT * FROM `produit` WHERE `Libelle_produit` LIKE '%al%'
				$chercher="SELECT * FROM `professeurs` WHERE `nom` OR `prenom` LIKE '$critere'";
				$requete=mysql_query($chercher) or die('Erreur de requete:'.mysql_error());
				if(mysql_num_rows($requete)>0)
				{
					echo "<div id='re'style='background:#C0C0C0;color:#fff'><h3>Resultat de recherche:</h3></div>";
					echo" <table class='table table-striped table-bordered table-hover' id='dataTables-example'><thead><tr><th></th><th>ID</th><th>Nom</th><th>Prenom</th><th>SEXE</th></tr></thead>";
					
					while($resultat=mysql_fetch_assoc($requete))
					{
						echo"<tbody><tr class='odd gradeX'><td><a href='#'>SELECT</a></td><td>".$resultat['id_professeur']."</td>";
						echo"<td>".$resultat['nom']."</td>";
						echo"<td>".$resultat['prenom']."</td>";
						echo"<td>".$resultat['sexe']."</td></tr></tbody>";
					}			
						echo"</table></center>";
						mysql_close();
					{
					/*	echo"<tr><td><a href='#'>SELECT</a></td><td>".$resultat['id_professeur']."</td>";
						echo"<td>".$resultat['nom']."</td>";
						echo"<td>".$resultat['prenom']."</td>";
						echo"<td>".$resultat['sexe']."</td>";
						*/
					}
					//echo"</table></center>";
					
				}else echo "Pas de resultat";
			}
		}
	?> 
 
 
 
 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
<!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>	