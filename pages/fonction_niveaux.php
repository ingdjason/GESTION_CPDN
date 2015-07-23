<?php
	class niveau
	{
		private $id_niveau;
		private $libelle_niveau;
		
	
		public function __construct()
		{
			
		}
		
		//fonction id cours
		public function set_id_niveau($id_niveau)
		{
			$this->id_niveau=$id_niveau;
		}
		
		//fonction libelle_domaines prof 
		public function set_libelle_niveau($libelle_niveau)
		{
			$this->libelle_niveau=$libelle_niveau;
		}
		
		
				// ******** fonction avec get  *********
				
		//fonction id cours;
		public function get_id_niveau()
		{
			return $this->id_niveau;
		}
		
		//fonction libelle_domaines
		public function get_libelle_niveau()
		{
			return $this->libelle_niveau;
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
			$req='Insert Into niveau(id_niveau,libelle_niveau) values("'.$this->get_id_niveau().'","'.$this->get_libelle_niveau().'")';
			$isok=mysql_query($req);
			
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		public function Update()
		{
			$req='Update niveau set libelle_niveau="'.$this->get_libelle_niveau().'" Where id_niveau="'.$this->get_id_niveau().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		//Update libelle_domaines
		public function UpdateNom()
		{
			$req='Update niveau set libelle_niveau="'.$this->get_libelle_niveau().'" Where id_niveau="'.$this->get_id_niveau().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
	
		public function Select()
		{
			$req="Select * from niveau";
			
			$isok=mysql_query($req);
			
			echo" <table class='table table-striped table-bordered table-hover' id='dataTables-example'><thead><tr><th></th><th>ID</th><th>LIBELLE NIVEAUX</th></tr></thead>";
			
			while($data=mysql_fetch_assoc($isok))
			{
				echo"<tbody><tr class='odd gradeX'><td><a href='#'>SELECT</a></td><td>".$data['id_niveau']."</td>";
				echo"<td>".$data['libelle_niveau']."</td></tr></tbody>";
			}			
			echo"</table></center>";
			mysql_close();
		}
		//A modifier
		public function delete()
		{
			$req='delete from niveau where "id"="id_niveau"';
			//$req="DELETE (id)FROM `systeme`.`domaine` WHERE `domaine`.`id_niveau` = id_niveau";
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		
		
		}
	}
?>