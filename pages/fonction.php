<?php
	class produit
	{
		private $Code_produit;
		private $Code_type;
		private $Libelle_produit;
		private $Prix_unit;
		private $Quantite_en_stock;
		
		
		public function __construct()
		{
			
		}
		
		//fonction Code_produit 
		public function set_Code_produit($Code_produit)
		{
			$this->Code_produit=$Code_produit;
		}
		
		//fonction Code_type 
		public function set_Code_type($Code_type)
		{
			$this->Code_type=$Code_type;
		}
		
		//fonction libelle_produit 
		public function set_Libelle_produit($Libelle_produit)
		{
			$this->Libelle_produit=$Libelle_produit;
		}
		
		//fonction prix_unit
		public function set_Prix_unit($Prix_unit)
		{
			$this->Prix_unit=$Prix_unit;
		}
		
		//fonction qte_en_stock 
		public function set_Quantite_en_stock($Quantite_en_stock)
		{
			$this->Quantite_en_stock=$Quantite_en_stock;
		}
		
				// ******** fonction avec get  *********
				
		//fonction Code_produit;
		public function get_Code_produit()
		{
			return $this->Code_produit;
		}
		
		//fonction Code_type
		public function get_Code_type()
		{
			return $this->Code_type;
		}
		
		//fonction libele_produit
		public function get_Libelle_produit()
		{
			return $this->Libelle_produit;
		}
		
		//fonction prix_unit;
		public function get_Prix_unit()
		{
			return $this->Prix_unit;
		}
		
		//fonction qte_en_stock;
		public function get_Quantite_en_stock()
		{
			return $this->Quantite_en_stock;
		}
		
			// *******   Gestion Base de Donnees  *********
		
		public function Connect()
		{
			$isconnect=mysql_connect('localhost','root','');
			if($isconnect)
			{
				$is_select_db=mysql_select_db('nadia_market',$isconnect);
				if(!$is_select_db)
				{
					echo 'Erreur SQL'.mysql_error();
				}
			}
		}
		
		
		
		public function Insert()
		{
			$req='Insert Into produit(Code_produit,Code_type,Libelle_produit,Prix_unit,Quantite_en_stock) values("'.$this->get_Code_produit().'","'.$this->get_Code_type().'","'.$this->get_Libelle_produit().'","'.$this->get_Prix_unit().'","'.$this->get_Quantite_en_stock().'")';
			//$req="INSERT INTO `nadia_market`.`produit` (`Code_produit`, `Code_type`, `Libelle_produit`, `Prix_unit`, `Quantite_en_stock`) VALUES ('', '$type', '$libelle', '$prix', '$qte')";
			$isok=mysql_query($req);
			//$lia='Insert Into type_produit(Code_type,type) SELECT Code_type,type FROM produit';
			//$liaison=mysql_query($lia);
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		public function Update()
		{
			$req='Update produit set Libelle_produit="'.$this->get_Libelle_produit().'" , Prix_unit="'.$this->get_Prix_unit().'" , Code_type="'.$this->get_Code_type().'" , Quantite_en_stock="'.$this->get_Quantite_en_stock().'" Where Code_produit="'.$this->get_Code_produit().'"';
			$isok=mysql_query($req);
	
			if(!$isok)
				echo 'Erreur SQL'.mysql_error();
			mysql_close();
		}
		
		public function Select()
		{
			$req="Select * from produit";
			
			$isok=mysql_query($req);
			
			echo"<center><table border=1><th></th><th>CODE PRODUIT</th><th>CODE TYPE</th><th>LIBELLE PRODUIT</th><th>PRIX UNIT</th><th>QTE EN STOCK</th>";
			
			while($data=mysql_fetch_assoc($isok))
			{
				echo"<tr><td><a href='#'>SELECT</a></td><td>".$data['Code_produit']."</td>";
				echo"<td>".$data['Code_type']."</td>";
				echo"<td>".$data['Libelle_produit']."</td>";
				echo"<td>".$data['Prix_unit']."</td>";
				echo"<td>".$data['Quantite_en_stock']."</td></tr>";
			}
			
			echo"</table></center>";
			mysql_close();
		}
	

		//rapport
		public function rapport()
		{
			//WHERE type IN(SELECT Code_produit FROM vente)
			$rapo="SELECT type FROM type_produit";
			$rapot=mysql_query($rapo);
			$rap="SELECT Total FROM vente WHERE Code_produit IN(SELECT Code_produit FROM produit)";
			$rapt=mysql_query($rap);
			
			echo"<center><table border=1><th></th><th>TYPE PRODUIT</th><th>TOTAL</th>";
			
			while($data=mysql_fetch_assoc($rapt) AND $dat=mysql_fetch_assoc($rapot))
			{
				echo"<tr><td><a href='#'>SELECT</a></td><td>".$dat['type']."</td>";
				echo"<td>".$data['Total']."</td></tr>";
			}
			echo"</table></center>";
			mysql_close();
		}
		
		public function rapport_p()
		{
			$rapo="SELECT Libelle_produit FROM produit";
			$rapot=mysql_query($rapo);
			$rap="SELECT Code_produit,Quantite FROM vente";
			$rapt=mysql_query($rap);
			
			echo"<center><table border=1><th></th><th>LIBELLE PRODUIT</th><th>QUANTITE</th>";
			
			while($data=mysql_fetch_assoc($rapt) AND $dat=mysql_fetch_assoc($rapot))
			{
				echo"<tr><td><a href='#'>SELECT</a></td><td>".$dat['Libelle_produit']."</td>";
				echo"<td>".$data['Quantite']."</td></tr>";
			}
			echo"</table></center>";
			mysql_close();
		}
		
		
	}
?>