<?php
   
   include_once ("Categoria.php");
   //include_once ("../conexao/ConexaoBanco.php");
   //include_once ("/var/www/html/loja/conexao/ConexaoBanco.php");
   
   class CategoriaDao {
	   
	   public function gravarDados (Categoria $categoria){
		   
		   date_default_timezone_set('America/Sao_Paulo');

		   try {
						
			                  $descricao = $categoria->getDescricao();		  
					 
					  
					  $conn =new conexaoBanco();  
					  $ligar =$conn->conexao();
					  $stmt=$ligar->prepare("insert into tb_categoria (descricao) values (?)");
					  $stmt->bindParam(1, $descricao);
					  //$stmt->bindParam(4, $descricao);
					  $stmt->execute();	
					
					} catch (Exception $ex ){
						echo $ex.getMessage();
					} 				  
		   }
		   
	   
	   
           public function editarCategoria(Categoria $categoria, $id){	   
			  
			   $descricao=$categoria->getDescricao();                            			   
			   try {					
				  $conn =new conexaoBanco();  
				  $ligar =$conn->conexao();
				  $stmt=$ligar->prepare("update  tb_categoria set descricao=:descricao  where id_categoria='".$id."'");
				  $stmt->bindParam(":descricao", $categoria->getDescricao());
				  $stmt->execute();					
			   
			   } catch (Exception $ex ){
		        	echo $ex;
     	    	} 				  
	}
			
             public  function apagarDados($id){
			   
			        try {						
					
				       $conn =new conexaoBanco();  
				       $ligar =$conn->conexao();
				       $stmt=$ligar->prepare("delete from tb_categoria  where id_categoria='".$id."'");
				       $stmt->execute();
					
					} catch (Exception $ex ){
					  echo $ex;
					} 
			   
			  }
              public function mostrarTodosCategoria() {
			         
				$conn =new conexaoBanco();  
				$ligar =$conn->conexao();
			        $stmt =$ligar->prepare("select * from tb_categoria");
				$stmt->execute();					 
				$linha=$stmt->fetchAll();				      				  					 	                          
				echo "Listagens de Categoria" ;
                                echo '<table border='."1px".'cellpadding='."5px". 'cellspacing='."0".'id='."alter".'>';	 
				     
                                     echo  '<tr bgcolor ='."#ffc".'>';
                                            echo '<th> Numero da Categoria</th>';  
                                            echo '<th> Descricao</th>'; 
                                            //echo '<td> numero de identificao</td>';        
                                     echo '</tr>'; 	
 				  				 
				for ($lin=0;$lin<count($linha);$lin++){
				     echo '<tr bgcolor ='."#eee".'>';
				     for ($col=0;$col<=1;$col++){	
                                         						 
				       //echo '<a href ='.($linha[$lin][$col]).'>'.($linha[$lin][$col]).'</a>';
                                         echo '<th> <a href =EditarCategoriaFormulario.php?var='.$linha[$lin][$col].'>'.$linha[$lin][$col].'</a></th>';
							  				 
							
					 }
					 echo '<tr>';
                                     					
				 
					 }
                                 echo '</table>';
 
			  }

                           public function mostrarTodosCategoriaApagar() {
			         
				$conn =new conexaoBanco();  
				$ligar =$conn->conexao();
			        $stmt =$ligar->prepare("select * from tb_categoria");
				$stmt->execute();					 
				$linha=$stmt->fetchAll();				      				  					 	                          

				echo "Listagens de Categoria" ;
                                echo '<table border='."1px".'cellpadding='."5px". 'cellspacing='."0".'id='."alter".'>';	 
				     
                                     echo  '<tr bgcolor ='."#ffc".'>';
                                            echo '<th> Numero da Categoria</th>';  
                                            echo '<th> Descricao</th>'; 
                                            //echo '<td> numero de identificao</td>';        
                                     echo '</tr>'; 	
 				  				 
				for ($lin=0;$lin<count($linha);$lin++){
				     echo '<tr bgcolor ='."#eee".'>';
				     for ($col=0;$col<=1;$col++){	
                                         						 
				       //echo '<a href ='.($linha[$lin][$col]).'>'.($linha[$lin][$col]).'</a>';
                                         echo '<th> <a href =ApagarCategoriaFormulario.php?var='.$linha[$lin][$col].'>'.$linha[$lin][$col].'</a></th>';
							  				 
							
					 }
					 echo '<tr>';
                                     					
				 
					 }
                                 echo '</table>';
 
			  }
           
               function procurarID($id){	  
		    		 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select * from tb_categoria where id_categoria = $id");
					 $stmt->execute();					
					 $linha=$stmt->fetchAll();					      				  					 	                 if ($linha==NULL){
						      $id=NULL;
						 }else {
							   return $id;
							 }
	   
				  }
			  
			 function procurarDescricao($descricao){
			
            		            $conn =new conexaoBanco();  
				    $ligar =$conn->conexao();
			            $stmt =$ligar->prepare("select * from tb_categoria where descricao= '".$descricao."'");
				    $stmt->execute();					
				    $linha=$stmt->fetchAll();	
				    if ($linha==NULL){
					$id=NULL;
				    }else {
					return $linha;
				    }
	   				     
			  }
		     // retorna uma linha com id 
	  		  function linhaMostrarId($id){
				 $conn =new conexaoBanco();  
				 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select * from tb_categoria where id_categoria = $id");
				 $stmt->execute();					
				 $linha=$stmt->fetch(); 
				 return $linha;				
					      
				  }
             function mostrarLinhaTela ($id){
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select * from tb_categoria where id_categoria = $id");
					 $stmt->execute();					
					 $linha=$stmt->fetch(); 
					 for  ($cont =0;$cont<count($linha);$cont++){
					      echo '</br>';
						  print ( $linha [$cont]);				
					 }
				  }
				  
			 function mostrarLinhaTelaDescricao($descricao){
				     
					 
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			                 $stmt =$ligar->prepare("select id_categoria,descricao from tb_categoria where descricao = '".$descricao."'");
					 $stmt->execute();					
					 $linha=$stmt->fetch();
					 for  ($cont =0;$cont<2;$cont++){
					      echo '</br>';						  
						  print ( $linha [$cont]);				
					 }
				  }
			
			// retorna o a chave primaria de uma linha com descricao;  
                       function mostrarId($des){					 
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			                 $stmt =$ligar->prepare("select * from tb_categoria where descricao= '".$des."'");
					 $stmt->execute();					
					 $linha=$stmt->fetch(); 
					 return $linha[0];    				 
									  				 
										      
				  }
            function listaCategoria (){
				
		       		 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			                 $stmt =$ligar->prepare("select descricao from tb_categoria");
					 $stmt->execute();					
					 $linha=$stmt->fetchAll(PDO::FETCH_COLUMN, 0);
					 return  $linha;
		}
            function listaCompletaCategoria(){
                                $conn =new conexaoBanco();  
				$ligar =$conn->conexao();
			        $stmt =$ligar->prepare("select * from tb_categoria");
				$stmt->execute();					 
				$linha=$stmt->fetchAll();				      				  					 	                         return $linha;
            
            }	      				  
   
   }
?>
