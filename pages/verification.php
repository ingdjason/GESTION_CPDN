<!DOCTYPE html>
<html lang="en">

<head>
<!-- add a primary key : ALTER TABLE produit ADD FOREIGN KEY (Code_type) REFERENCES type_produit (Code_type); -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>verification</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Verification en cours...</h3>
                    </div>
                    <div class="panel-body">
					<?php session_start();
$user = $_POST['user'];
$mdp = $_POST['mdp'];
if(isset($_POST))
	{
	if($mdp=="projet")
		{
			$_SESSION['co']=1;
			echo 'connexion reussie:> '.$user.'<meta http-equiv="refresh" content="1; URL=index.php">'; 
		}
	elseif(($user=="prof") && ($mdp!=="projet"))
		{
			echo 'Passe incorect:> <meta http-equiv="refresh" content="1; URL=login.php"> ';
		}	
	else
		{
		$_SESSION['co']=0;
		echo 'connexion echoue<br /><a href="login.php">Essayer a nouveau</a> <br />';
		echo '<a href="aide.html">Aide</a>';
		}
	}
else
{
echo "pas de post";
}
?>
                        <form action="verification.php" method="POST" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Administrateur" name="user" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="mdp" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                             <!--   <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
								<input type="submit" class="btn btn-lg btn-success btn-block" value="CONNECTER" name="save" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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