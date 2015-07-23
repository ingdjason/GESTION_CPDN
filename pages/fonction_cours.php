<?php
	class cours
	{
		private $id_cours;
		private $libelle_cours;
		
	
		public function __construct()
		{
			
		}
		
		//fonction id cours
		public function set_id_cours($id_cours)
		{
			$this->id_cours=$id_cours;
		}
		
		//fonction libelle_cours prof 
		public function set_libelle_cours($libelle_cours)
		{
			$this->libelle_cours=$libelle_cours;
		}
		
		
				// ******** fonction avec get  *********
				
		//fonction id cours;
		public function get_id_cours()
		{
			return $this->id_cours;
		}
		
		//fonction libelle_cours
		public function get_libelle_cours()
		{
			return $this->libelle_cours;
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
			$req='Insert Into cours(id_cours,libelle_cours) values("'.$this->get_id_cours().'","'.$this->get_libelle_cours().'")';
			$isok=mysql_query($req);
			
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		public function Update()
		{
			$req='Update cours set libelle_cours="'.$this->get_libelle_cours().'" Where id_cours="'.$this->get_id_cours().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		//Update libelle_cours
		public function UpdateNom()
		{
			$req='Update cours set libelle_cours="'.$this->get_libelle_cours().'" Where id_cours="'.$this->get_id_cours().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
	
		public function Select()
		{
			$req="Select * from cours";
			
			$isok=mysql_query($req);
			
			echo" <table class='table table-striped table-bordered table-hover' id='dataTables-example'><thead><tr><th></th><th>ID</th><th>LIBELLE COURS</th></tr></thead>";
			
			while($data=mysql_fetch_assoc($isok))
			{
				echo"<tbody><tr class='odd gradeX'><td><a href='#'>SELECT</a></td><td>".$data['id_cours']."</td>";
				echo"<td>".$data['libelle_cours']."</td></tr></tbody>";
			}			
			echo"</table></center>";
			mysql_close();
		}
	}
?>