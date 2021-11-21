<?php
     
     include_once("../conexao/ConexaoBanco.php");
     include_once("Usuario.php");    
     
	
	class UsuarioDao {
		   
		  public function __construct (){
			 date_default_timezone_set('America/Sao_Paulo');
                     
			 	    
		  }	
		  
		  public function gravarDadoUsuario(Usuario $usuario) {           
				   
				    						          
				     try {
				        	     
		                      			  
				      $nome=$usuario->getNome();                                      
                                      $sobrenome=$usuario->getSobrenome();
                                      $user=$usuario->getUser();
                                      $senha=$usuario->getSenha();
                                      print $senha;
                                      $conn =new conexaoBanco();                               				         
                                      
                                      $ligar =$conn->conexao();                             

                                       
				      $stmt=$ligar->prepare("insert into tb_usuario (nome,sobrenome,username,senha ) values (?,?,?,?)");
                                     
				      $stmt->bindParam(1, $nome);
				      $stmt->bindParam(2, $sobrenome);
				      $stmt->bindParam(3, $user);					     
				      $stmt->bindParam(4, $senha);
                                      //print $usuario->getSenha();   
				      $stmt->execute();
                                     	
						 
				    } catch (Exception $ex ){
				     echo $ex->getMessage();
				   } 
                                    			  
			  
		  }
		 
		 public function atualizarDadoUsuario(Usuario $usuario,$username){                           
			   
			   try {
                                //$senha=$usuario->getSenha();    				
				$conn =new conexaoBanco();  
				$ligar =$conn->conexao();
				$stmt=$ligar->prepare("update tb_usuario set senha=:senha where username='".$username."'");
				$stmt->bindParam(":senha",$usuario->getSenha());
				$stmt->execute();
                                $stmt->close();					
			   
			   } catch (Exception $ex ){
		        	   echo $ex;
     	    	           } 				  
			  
		  } 
		  public function actualizarSenha (Usuario $usuario,$username){
			     $user =$username ;
			     $id=$this->mostrarIdUsuario($user);
				 
				 if ($id<>null) {
				     $this->imprimirUsuario($user);	 
				     $this->actualizarDadoUsuario($usuario,$user);	 
				 }else {
					 echo "usuario nao existem";
				 }			  
		  }		  
		  public function apagarId($idUsuario){
			        $conn =new conexaoBanco();  
			        $ligar =$conn->conexao();
			        $stmt =$ligar->prepare("delete  from tb_usuario where id_usuario= $idUsuario");
			        $stmt->execute();	
					 
					
		  }
		 
		  public function mostrarIdUsuario ($username){
			         
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			                 $stmt =$ligar->prepare("select * from tb_usuario where username= '".$username."'");
					 $stmt->execute();					
					 $linha=$stmt->fetch(); 
					 return $linha['id_usuario'];
			  
		  }
		  	  public function mostrarUserNameUsuario ($username){
			         
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			                 $stmt =$ligar->prepare("select * from tb_usuario where username= '".$username."'");
					 $stmt->execute();					
					 $linha=$stmt->fetch(); 
					 return $linha['username'];
			  
		  }
		  public function mostrarTodosUsuario(){
	                        		 
 			        $conn =new conexaoBanco();  
				$ligar =$conn->conexao();
			        $stmt =$ligar->prepare("select * from tb_usuario");
				$stmt->execute();					 
				$linha=$stmt->fetchAll();					      				  					 	                          
				echo "Listagens de Usuario" ;
                                echo 	'</br>';
				echo '<table border='."1px".'cellpadding='."5px". 'cellspacing='."0".'id='."alter".'>';
                                     echo  '<tr bgcolor ='."#ffc".'>';
                                            echo '<td> numero de identificao</td>';  
                                            echo '<td> nome do Usuario</td>'; 
                                            //echo '<td> numero de identificao</td>';        
                                     echo '</tr>'; 		 
				     
				     for ($lin=0;$lin<count($linha);$lin++){
                                         echo '<tr bgcolor ='."#eee".'>';
				         for ($col=0;$col<2;$col++){                                              	
                                            echo "<th>".$linha[$lin][$col]."</th>";	 
									  				 
					    
					}	  
                                      	echo '</tr>';					
				 
					 }
                                        
                                        echo '</table>';
		  }
	
		  public function userExistId($username){
			      $id=$this->mostrarIdUsuario($username);
                  if ($id<>null) {return true;} else {return false;};	  
	  
		  }
		       
		  public function autenticarUsuario($username,$password){
			   $vector =$this->mostrarUsuario($username); 
                           if (($vector['username']==$username) and ($vector['senha']==$password)){
			       return $vector['nome'];
			   }else {
			      return null;
		            }						
		  }
		  public function mostrarUsuario ($username){
			         $conn =new conexaoBanco();  
				 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select * from tb_usuario where username= '".$username."'");
				 $stmt->execute();					
				 $linha=$stmt->fetch(); 
				 return $linha;
			  
		  }
		   public function mostrarUsuarioSecundaria ($username){
			     $conn =new conexaoBanco();  
			     $ligar =$conn->conexao();
			     $stmt =$ligar->prepare("select username,primeiro_nome ,ultimo_nome from tb_usuario where username= '".$username."'");
			     $stmt->execute();					
			     $linha=$stmt->fetch(); 
			     return $linha;
			  
		  }
		  public function imprimirUsuario($username){
			        $vector =$this->mostrarUsuarioSecundaria($username);
					for ($cont=0;$cont<3;$cont++){
						  '</br>';
						  echo $vector [$cont];
					}
		  }
		  
		  public function apagarUsuario($username){
			         
                     $id=$this->mostrarIdUsuario($username);
                     if ($id<>null){
			$this->apagarId($id);
			}else {
			  echo "Usuario não existente";
		 }				 
		 
    	  }
		  
	}
?>
