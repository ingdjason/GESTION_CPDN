<?php
	class professeurs
	{
		private $id_professeur;
		private $nom;
		private $prenom;
		private $sexe;
		
		
		public function __construct()
		{
			
		}
		
		//fonction id prof
		public function set_id_professeur($id_professeur)
		{
			$this->id_professeur=$id_professeur;
		}
		
		//fonction nom prof 
		public function set_nom($nom)
		{
			$this->nom=$nom;
		}
		
		//fonction prenom prof
		public function set_prenom($prenom)
		{
			$this->prenom=$prenom;
		}
		
		//fonction sexe prof
		public function set_sexe($sexe)
		{
			$this->sexe=$sexe;
		}
		
		
				// ******** fonction avec get  *********
				
		//fonction id professuer;
		public function get_id_professeur()
		{
			return $this->id_professeur;
		}
		
		//fonction nom
		public function get_nom()
		{
			return $this->nom;
		}
		
		//fonction prenom
		public function get_prenom()
		{
			return $this->prenom;
		}
		
		//fonction sexe;
		public function get_sexe()
		{
			return $this->sexe;
		}
			// *******   Gestion Base de Donnees  *********
		
		public function Connect()
		{
			$isconnect=mysql_connect('localhost','root','');
			if($isconnect)
			{
				$is_select_db=mysql_select_db('systeme',$isconnect);
				if(!$is_select_db)
				{
					echo 'Erreur SQL'.mysql_error();
				}
			}
		}
		
		
		
		public function Insert()
		{
			$req='Insert Into professeurs(id_professeur,nom,prenom,sexe) values("'.$this->get_id_professeur().'","'.$this->get_nom().'","'.$this->get_prenom().'","'.$this->get_sexe().'")';
			$isok=mysql_query($req);
			
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		public function Update()
		{
			$req='Update professeurs set nom="'.$this->get_nom().'" , prenom="'.$this->get_prenom().'" , sexe="'.$this->get_sexe().'" Where id_professeur="'.$this->get_id_professeur().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		//Update Nom
		public function UpdateNom()
		{
			$req='Update professeurs set nom="'.$this->get_nom().'" Where id_professeur="'.$this->get_id_professeur().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		//Update prenom 
		public function UpdatePrenom()
		{
			$req='Update professeurs set prenom="'.$this->get_prenom().'" Where id_professeur="'.$this->get_id_professeur().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		//delete prof
		
		public function Delete()
		{
		$id= $_POST["id_professeur"];
		$sql="DELETE FROM professeurs WHERE id_professeur=".$id;
		echo $sql;
	
		$requete=mysql_query($sql);
		if($requete)
		{
			echo("Suppresion effectuee");
			
	
		}
		else
		{
		echo ("supression echouee");
		}
		mysql_close();
		}
	
	
		
		public function Select()
		{
			$req="Select * from professeurs";
			
			$isok=mysql_query($req);
			
			echo" <table class='table table-striped table-bordered table-hover' id='dataTables-example'><thead><tr><th></th><th>ID</th><th>Nom</th><th>Prenom</th><th>SEXE</th></tr></thead>";
			
			while($data=mysql_fetch_assoc($isok))
			{
				echo"<tbody><tr class='odd gradeX'><td><a href='#'>SELECT</a></td><td>".$data['id_professeur']."</td>";
				echo"<td>".$data['nom']."</td>";
				echo"<td>".$data['prenom']."</td>";
				echo"<td>".$data['sexe']."</td></tr></tbody>";
			}			
			echo"</table></center>";
			mysql_close();
		}
	}
?>



<!--DELETE FROM `systeme`.`professeurs` WHERE `professeurs`.`id_professeur` = 12; -->