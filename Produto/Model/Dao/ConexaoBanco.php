  <?php 
			
     class ConexaoBanco {
		 
	  	function conexao () {
			
			$username="root";
			$password="root";
			
			try {
		         $con =new PDO ("mysql:host=localhost;dbname=lojaalfa", $username, $password);
				 return $con ;
			} catch (Exception $ex) {
         		 echo $ex ;		
						}
					} 	 
				 } 
  ?>