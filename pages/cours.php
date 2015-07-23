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

    <title>Enregistrer cours</title>

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
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
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
                                    <a href="professeurs.php">Professeurs</a>
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

<form action="cours.php" method="POST" >
	<center>
		<fieldset>
		<legend><b>Enregistrer Cours</b></legend>
			<table>
				<tr>
					<td><label>ID</label></td>
					<td><input type="number" name="id_cours" size="50" placeholder="LAISSER VIDE"/><br/></td>
				</tr>
				<tr>
					<td><label>Libelle Cours</label></td>
					<td><input type="text" name="libelle" size="50" placeholder="libelle cours"/><br/></td>
				</tr>
			</table>
			<fieldset>
				
				<table align="center">		
				<tr>
					<td>
						<div class="chat-panel panel panel-default">
						<div class="panel-heading">
                           <i class="fa fa-refresh fa-fw"></i>
							<button><input type="submit" value="ENREGISTRER" name="save"/></button>
							<button><input type="submit" value="AFFICHER" name="lecture" /></button>
							<button><input type="submit" value="MODIFIER LIBELLE" name="editer_nom"/></button>
							
                        </div>
						</div>
					</td>
				</tr>
				</table>
			</fieldset>
		</fieldset>
	</center>
	</form>
	
		<!--	</fieldset> -->
	<?php 
		require("fonction_cours.php");
		
		if(isset($_POST['save']))	
		{
			if(empty($_POST['libelle']))
			{
			echo "Case vide";
			}
			else
			{ 
			$cours=new cours();
			$cours->set_id_cours($_POST['id_cours']);
			$cours->set_libelle_cours($_POST['libelle']);
			$cours->Connect();
			$cours->Insert();
			} 
		}
		
		//update all sauf ID
		if(isset($_POST['editer']))
		{
			if((empty($_POST['libelle_cours'])))
			{
			echo "Case vide";
			}
			else
			{
			$cours=new cours();
			$cours->set_id_cours($_POST['id_cours']);
			$cours->set_libelle_cours($_POST['libelle']);
			$cours->Connect();
			
			$cours->Update();
			}
		}
		//update libelle
		if(isset($_POST['editer_nom']))
		{
			if(empty($_POST['libelle']))
			{
			echo "Case vide";
			}
			else
			{
			$cours=new cours();
			$cours->set_id_cours($_POST['id_cours']);
			$cours->set_libelle_cours($_POST['libelle']);
			$cours->Connect();
			$cours->UpdateNom();
			}
		}
		
		
		
		
		if(isset($_POST['lecture']))
		{
			
			$cours=new cours();
			$cours->Connect();
			$cours->Select();
		}
		
		
	?>
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