<?php
	class professeurs_cours_domaine_niveau
	{
		private $id_cours;
		private $id_domaine;
		private $niveau;
		private $id_professeur;
		
		
		public function __construct()
		{
			
		}
		
		//fonction id cours
		public function set_id_cours($id_cours)
		{
			$this->id_cours=$id_cours;
		}
		
		//fonction id domaine 
		public function set_id_domaine($id_domaine)
		{
			$this->id_domaine=$id_domaine;
		}
		
		//fonction id_niveau
		public function set_id_niveau($id_niveau)
		{
			$this->id_niveau=$id_niveau;
		}
		
		//fonction id_professeur
		public function set_id_professeur($id_professeur)
		{
			$this->id_professeur=$id_professeur;
		}
	
				// ******** fonction avec get  *********
				
		//fonction id cours;
		public function get_id_cours()
		{
			return $this->id_cours;
		}
		
		//fonction domaine
		public function get_id_domaine()
		{
			return $this->id_domaine;
		}
		
		//fonction id_niveau
		public function get_id_niveau()
		{
			return $this->id_niveau;
		}
		
		//fonction id_professeur
		public function get_id_professeur()
		{
			return $this->id_professeur;
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
			$req='Insert Into professeurs_cours_domaine_niveau(id_cours,id_domaine,id_niveau,id_professeur) values("'.$this->get_id_cours().'","'.$this->get_id_domaine().'","'.$this->get_id_niveau().'","'.$this->get_id_professeur().'")';
			$isok=mysql_query($req);
			
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		public function Update()
		{
			$req='Update professeurs_cours_domaine_niveau set id_cours="'.$this->get_id_cours().'",id_professeur="'.$this->get_id_professeur().'"  , id_niveau="'.$this->get_id_niveau().'" Where id_domaine="'.$this->get_id_domaine().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		
		
		public function Select()
		{
			//traitement 1
			$req="Select id_cours from professeurs_cours_domaine_niveau";
			$isok=mysql_query($req);
			//traitement 2
			$reqq="SELECT libelle_cours FROM cours WHERE id_cours IN (SELECT id_cours FROM professeurs_cours_domaine_niveau)";	
			$isokk=mysql_query($reqq);
			//traitement 3
			$reqqq="SELECT libelle_domaine FROM domaine WHERE id_domaine IN (SELECT id_domaine FROM professeurs_cours_domaine_niveau)";	
			$isokkk=mysql_query($reqqq);
			//traitement 4
			$re="SELECT libelle_niveau FROM niveau WHERE id_niveau IN (SELECT id_niveau FROM professeurs_cours_domaine_niveau)";	
			$iso=mysql_query($re);
			//traitement 5
			$ree="SELECT nom,prenom FROM professeurs WHERE id_professeur IN (SELECT id_professeur FROM professeurs_cours_domaine_niveau)";	
			$isoo=mysql_query($ree);
			
			echo" <table class='table table-striped table-bordered table-hover' id='dataTables-example'><thead><tr><th></th><th>ID COURS</th><th>LIBELLE COURS</th><th>LIBELLE DOMAINE</th><th>NOM</th><th>PRENOM</th><th>LIBELLE NIVEAU</th></tr></thead>";
			
			while($data=mysql_fetch_assoc($isok) AND $dat=mysql_fetch_assoc($isokk) AND $date=mysql_fetch_assoc($isokkk) AND $da=mysql_fetch_assoc($iso) AND $daa=mysql_fetch_assoc($isoo))
			{
				echo"<tbody><tr class='odd gradeX'><td><a href='#'>SELECT</a></td><td>".$data['id_cours']."</td>";
				echo"<td>".$dat['libelle_cours']."</td>";
				echo"<td>".$date['libelle_domaine']."</td>";
				echo"<td>".$daa['nom']."</td>";
				echo"<td>".$daa['prenom']."</td>";
				echo"<td>".$da['libelle_niveau']."</td></tr></tbody>";
			}			
			echo"</table></center>";
			mysql_close();
		}
		
	}
?>

