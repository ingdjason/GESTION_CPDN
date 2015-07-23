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

    <title>Enregistrer Prof</title>

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
								<form id="form1" name="form1" method="post" action="recherche_prof.php">
								<input type="text" name="critere" size="20" class="keywords" id="textfield"  maxlength="50"  placeholder="    search..."/>
                               
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

<form action="professeurs.php" method="POST" >
	<center>
		<fieldset>
		<legend><b>Enregistrer Professeur</b></legend>
			<table>
				<tr>
					<td><label>ID</label></td>
					<td><input type="number" name="id_professeur" size="50" placeholder="LAISSER VIDE"/><br/></td>
				</tr>
				<tr>
					<td><label>NOM</label></td>
					<td><input type="text" name="nom" size="50" placeholder="nom prof"/><br/></td>
				</tr>
				<tr>
					<td><label>PRENOM</label></td>
					<td><input type="text" name="prenom" size="50" placeholder="prenom prof"/><br/></td>
				</tr>
				<tr>
					<td><label>SEXE</label></td>
					<td>
					<select style="width:250px;" name="sexe">
						<option>F</option>
						<option>M</option>
					</select>
					</td>
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
							<button><input type="submit" value="MODIFIER" name="editer"/></button>
                            <button><input type="submit" value="MODIFIER PRENOM" name="editer_prenom"/></button>
							<button><input type="submit" value="MODIFIER NOM" name="editer_nom"/></button>
							<button><input type="submit" value="SUPPRIMER" name="delete"/></button>
							
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
		require("fonction_prof.php");
		
		if(isset($_POST['save']))	
		{
			if((empty($_POST['id']) && empty($_POST['nom']) && empty($_POST['prenom'])))
			{
			echo "Case vide";
			}
			else
			{ 
			$professeurs=new professeurs();
			$professeurs->set_id_professeur($_POST['id_professeur']);
			$professeurs->set_nom($_POST['nom']);
			$professeurs->set_prenom($_POST['prenom']);
			$professeurs->set_sexe($_POST['sexe']);
			$professeurs->Connect();
			$professeurs->Insert();
			} 
		}
		
		//update all sauf ID
		if(isset($_POST['editer']))
		{
			if((empty($_POST['id_professeur']) && empty($_POST['nom']) && empty($_POST['prenom'])))
			{
			echo "Case vide";
			}
			else
			{
			$professeurs=new professeurs();
			$professeurs->set_id_professeur($_POST['id_professeur']);
			$professeurs->set_nom($_POST['nom']);
			$professeurs->set_prenom($_POST['prenom']);
			$professeurs->set_sexe($_POST['sexe']);
			$professeurs->Connect();
			$professeurs->Update();
			}
		}
		//update nom
		if(isset($_POST['editer_nom']))
		{
			if(empty($_POST['nom']))
			{
			echo "Case vide";
			}
			else
			{
			$professeurs=new professeurs();
			$professeurs->set_id_professeur($_POST['id_professeur']);
			$professeurs->set_nom($_POST['nom']);
			$professeurs->Connect();
			$professeurs->UpdateNom();
			}
		}
		
		
		//update prenom
		if(isset($_POST['editer_prenom']))
		{
			if(empty($_POST['prenom']))
			{
			echo "Case vide";
			}
			else
			{
			$professeurs=new professeurs();
			$professeurs->set_id_professeur($_POST['id_professeur']);
			$professeurs->set_prenom($_POST['prenom']);
			$professeurs->Connect();
			$professeurs->UpdatePrenom();
			}
		}
		
		
		if(isset($_POST['lecture']))
		{
			
			$professeurs=new professeurs();
			$professeurs->Connect();
			$professeurs->Select();
		}
		if(isset($_POST['delete']))
		{
			
			$professeurs=new professeurs();
			$professeurs->set_id_professeur($_POST['id_professeur']);
			$professeurs->Connect();
			$professeurs->Delete();
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