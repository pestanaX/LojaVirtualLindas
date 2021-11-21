  <?php 
			
     class ConexaoBanco {
		 
	  	function conexao () {
			
			$username="lojalindas";
			$password="gotoXY1980@";			
			try {
		            $con =new PDO ("mysql:host=lojalindas.mysql.dbaas.com.br;dbname=lojalindas", $username, $password);                               
			    return $con ;
			} catch (Exception $ex) {
         		    echo $ex ;		
			}
					 
		  }
					 
	 }
	 ?>
  
