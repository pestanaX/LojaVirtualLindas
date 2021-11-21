<?php
     
     include_once("ClassConstante.php");
     include_once(ClassConstante::$PATH_USUARIO1);
     include_once ("permisao.php");    
     include_once("ConexaoBanco.php");
	
	class UsuarioDao {
		   
		  public function __construct (){
			 date_default_timezone_set('America/Sao_Paulo');
			 	    
		  }
		
		  
		  public function gravarDadoUsuario(Usuario $usuario,$permisao) {
			               
				   $idPermisao=Permisao::procurarIdPermisao($permisao);
											          
				   try {
					     
		                 $primeiroNome=$usuario->getPrimeiroNome();
		                 $ultimoNome=$usuario->getUltimoNome();
		                 //$email=$usuario->getEmail() ;
		                 $username=$usuario->getUSer();
	                     $password=$usuario->getPassword();
		                 $dataCriacao=date('Y-m-d H:i:s');
					     $criador=$usuario->getCriador();                	     
					     $date = date('Y-m-d H:i:s');
					     
					  if ($idPermisao<>0){
						  
					     $conn =new conexaoBanco();  
					     $ligar =$conn->conexao();
					     $stmt=$ligar->prepare("insert into tb_usuario(id_permisao,primeiro_nome,ultimo_nome,username,password,data_criacao,criado_por) values (?,?,?,?,?,?,?)");
					     $stmt->bindParam(1, $idPermisao);
					     $stmt->bindParam(2, $primeiroNome);
					     $stmt->bindParam(3, $ultimoNome);
					     //$stmt->bindParam(4, $email);
					     $stmt->bindParam(4, $username);
					     $stmt->bindParam(5, $password);
					     $stmt->bindParam(6, $date,PDO::PARAM_STR);
					     $stmt->bindParam(7, $criador);
					     $stmt->execute();	
						 
					  } else {
					    echo "Permisao nao encontrado" ;
					  }
					} catch (Exception $ex ){
						  echo $ex.getMessage();
					} 				  
			  
		  }
		 public function actualizarDadoUsuario(Usuario $usuario,$username){
			   
			    try {				
				
    				$password =$usuario->getPassword();
					$alterador =$usuario->getAlteracao();
					$date = date('Y-m-d H:i:s');
					$conn =new conexaoBanco();  
				    $ligar =$conn->conexao();
				    $stmt=$ligar->prepare("update tb_usuario set Password=:Password,data_alteracao=:data_alteracao,alterado_por=:alterado_por where username= '".$username."'");
					$stmt->bindParam(":Password", $password);
					$stmt->bindParam(":data_alteracao",$date,PDO::PARAM_STR);
	                $stmt->bindParam(":alterado_por",$alterador);			
    				$stmt->execute();					
			   
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
			         $stmt =$ligar->prepare("select primeiro_nome,ultimo_nome,username,descricao from tb_usuario,tb_permissao");
				 $stmt->execute();					 
				 $linha=$stmt->fetchAll();					      				  					 	  
					 echo "Listagens de Usuario" ;
                     echo 	'</br>';				 
					 for ($lin=0;$lin<count($linha);$lin++){
						 echo '</br>';
				         echo '<table width="200" border="0">';		 
						 echo '<tr>';
						 for ($col=0;$col<4;$col++){	
                             echo "|   "	;					 
							 print($linha[$lin][$col]);							  				 
							// echo "|  " ;
							  }
					    echo '<tr>';
                        echo '</table>';						
						echo '</br>'; 
					 }
		  }
	
		  public function userExistId($username){
			      $id=$this->mostrarIdUsuario($username);
                  if ($id<>null) {return true;} else {return false;};	  
	  
		  }
		       
		  public function autenticarUsuario($username,$password){
			 $vector =$this->mostrarUsuario($username); 
                        if (($vector['username']==$username) and ($vector['Password']==$password)){
			   return $vector['id_permisao'];
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
