<?php
	class domaine
	{
		private $id_domaine;
		private $libelle_domaine;
		
	
		public function __construct()
		{
			
		}
		
		//fonction id cours
		public function set_id_domaine($id_domaine)
		{
			$this->id_domaine=$id_domaine;
		}
		
		//fonction libelle_domaines prof 
		public function set_libelle_domaine($libelle_domaine)
		{
			$this->libelle_domaine=$libelle_domaine;
		}
		
		
				// ******** fonction avec get  *********
				
		//fonction id cours;
		public function get_id_domaine()
		{
			return $this->id_domaine;
		}
		
		//fonction libelle_domaines
		public function get_libelle_domaine()
		{
			return $this->libelle_domaine;
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
			$req='Insert Into domaine(id_domaine,libelle_domaine) values("'.$this->get_id_domaine().'","'.$this->get_libelle_domaine().'")';
			$isok=mysql_query($req);
			
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		public function Update()
		{
			$req='Update domaine set libelle_domaine="'.$this->get_libelle_domaine().'" Where id_domaine="'.$this->get_id_domaine().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		//Update libelle_domaines
		public function UpdateNom()
		{
			$req='Update domaine set libelle_domaine="'.$this->get_libelle_domaine().'" Where id_domaine="'.$this->get_id_domaine().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
	
		public function Select()
		{
			$req="Select * from domaine";
			
			$isok=mysql_query($req);
			
			echo" <table class='table table-striped table-bordered table-hover' id='dataTables-example'><thead><tr><th></th><th>ID</th><th>LIBELLE DOMAINES</th></tr></thead>";
			
			while($data=mysql_fetch_assoc($isok))
			{
				echo"<tbody><tr class='odd gradeX'><td><a href='#'>SELECT</a></td><td>".$data['id_domaine']."</td>";
				echo"<td>".$data['libelle_domaine']."</td></tr></tbody>";
			}			
			echo"</table></center>";
			mysql_close();
		}
		//A modifier
		public function delete()
		{
			$req='delete from domaine where "id"="id_domaines"';
			//$req="DELETE (id)FROM `systeme`.`domaine` WHERE `domaine`.`id_domaine` = id_domaine";
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		
		
		}
	}
?>