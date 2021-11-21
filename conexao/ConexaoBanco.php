  <?php 
			
     class ConexaoBanco {
		 
	  	function conexao () {
			
			$username="root";
			$password="gotoXY1980@";			
			try {
		            $con =new PDO ("mysql:host=localhost;dbname=lojavirtual", $username, $password);                               
			    return $con ;
			} catch (Exception $ex) {
         		    echo $ex ;		
			}
					 
		  }
					 
	 }
	 ?>
  
