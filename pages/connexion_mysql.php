
<?php
 
	function conexion()
	 {
	  $conect=mysql_connect('localhost','root','');
	  if($conect)
	    {
		 
	     $is_select_db=mysql_select_db('systeme',$conect);
	        if(!$is_select_db)
		      {
		       echo "Erreur sql:".mysql_error();
		      }
	    }
	 }
	 

?>