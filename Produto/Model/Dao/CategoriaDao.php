<?php
   
   include_once  ("C:/Users/Ariel pestana/Documents/LojaAlfa/php/Model/Categoria.php");
   include ("ConexaoBanco.php");
   
   class CategoriaDao {
	   
	   public function gravarDados (Categoria $categoria){
		   
		   date_default_timezone_set('America/Sao_Paulo');

		   try {
						
			          $descricao = $categoria->getDescricao();
					  $criador=$categoria->getCriador();
					 
					  $date = date('Y-m-d H:i:s');
					  $conn =new conexaoBanco();  
					  $ligar =$conn->conexao();
					  $stmt=$ligar->prepare("insert into tb_categoria (descricao,data_criacao,criado_por) values (?,?,?)");
					  $stmt->bindParam(1, $descricao);
					  $stmt->bindParam(2, $date,PDO::PARAM_STR);
					  $stmt->bindParam(3, $criador);
					  //$stmt->bindParam(4, $descricao);
					  $stmt->execute();	
					
					} catch (Exception $ex ){
						echo $ex.getMessage();
					} 				  
		   }
		   
	   
	   
           public function actualizarDados(Categoria $categoria, $id){
			   
			   date_default_timezone_set('America/Sao_Paulo');
			   $descricao=$categoria->getDescricao();
               $alterador =$categoria->getAlterador();			   
			   try {
					$date = date('Y-m-d H:i:s');
					$conn =new conexaoBanco();  
				    $ligar =$conn->conexao();
				    $stmt=$ligar->prepare("update  tb_categoria set descricao=:descricao ,data_alteracao=:data_alteracao ,alterado_por=:alterado_por where id_categoria= $id");
				    $stmt->bindParam(":descricao", $descricao);
					$stmt->bindParam(":data_alteracao",$date,PDO::PARAM_STR);
					$stmt->bindParam(":alterado_por",alterador);
				    $stmt->execute();					
			   
			   } catch (Exception $ex ){
		        	echo $ex;
     	    	} 				  
	}
			
             public  function apagarDados($id){
			   
			        try {						
					
					   $conn =new conexaoBanco();  
				       $ligar =$conn->conexao();
				       $stmt=$ligar->prepare("delete from tb_categoria  where id_categoria=$id");
				       $stmt->execute();
					
					} catch (Exception $ex ){
					  echo $ex;
					} 
			   
			  }
              public function mostrarDados() {
			         
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select id_categoria,descricao from tb_categoria");
					 $stmt->execute();					 
					 $linha=$stmt->fetchAll();					      				  					 	  
					 echo "Listagens de Categoria" ;
                     echo 	'</br>';				 
					 for ($lin=0;$lin<count($linha);$lin++){
						 echo '</br>';
				         echo '<table width="200" border="0">';		 
						 echo '<tr>';
						 for ($col=0;$col<2;$col++){	
                             echo "|   "	;					 
							 print($linha[$lin][$col]);							  				 
							// echo "|  " ;
							  }
					    echo '<tr>';
                        echo '</table>';						
						echo '</br>'; 
					 }
 
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
   
   }
?>