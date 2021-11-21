<?php
 
  include ("../conexao/ConexaoBanco.php");  
  include_once ("Cliente.php");
  
  class ClienteDao {
	  
	  
	  public function __construct (){
		  
		  date_default_timezone_set('America/Sao_Paulo');		  
		  
	  }
	  public function gravarDadoCliente(Cliente $cliente){
		  
		  $nome=$cliente->getNome(); 
		  $sobrenome=$cliente->getSobrenome();
		  $email=$cliente->getEmail();
		  $senha=$cliente->getSenha();		  
		  $date = date('Y-m-d H:i:s');
		 
		  $conn =new conexaoBanco();  
		  $ligar =$conn->conexao();
		  $stmt=$ligar->prepare("insert into tb_clientes(nome,sobrenome,email,senha,data_criacao,criado_por) values (?,?,?,?,?,?)");		    
		  $stmt->bindParam(1, $nome);
		  $stmt->bindParam(2, $sobrenome);
		  $stmt->bindParam(3, $email);
		  $stmt->bindParam(4, $senha);		 
		  $stmt->bindParam(5, $date,PDO::PARAM_STR);
		  $stmt->bindParam(6, $nome);	
		  $stmt->execute();	
						 		  
	  
	  }
	  public function gravarDadoEndereco(Cliente $cliente,$idCliente){
		  
		  $rua=$cliente->getRua(); 
		  $numero=$cliente->getNumero();
		  $bairro=$cliente->getBairro();
		  $cidade=$cliente->getCidade();		  
		  $estado=$cliente->getEstado();
		  $telefone=$cliente->getTelefone();
		  $celular=$cliente->getCelular();
		  $cpf=$cliente->getCpf();
		  $cep=$cliente->getCep();
                  $date = date('Y-m-d H:i:s');		  
		  $conn =new conexaoBanco();  
		  $ligar =$conn->conexao();
		  $stmt=$ligar->prepare("insert into tb_endereco (id_cliente,rua,numero,bairro,cidade,estado,telefone_fixo,celular,cpf,cep,data_criacao) values (?,?,?,?,?,?,?,?,?,?,?)");		    
		  $stmt->bindParam(1, $idCliente);
		  $stmt->bindParam(2, $rua);
		  $stmt->bindParam(3, $numero);
		  $stmt->bindParam(4, $bairro);
		  $stmt->bindParam(5, $cidade);
		  $stmt->bindParam(6, $estado);
		  $stmt->bindParam(7, $telefone);
		  $stmt->bindParam(8, $celular);
		  $stmt->bindParam(9, $cpf);
                  $stmt->bindParam(10,$cep);		  
		  $stmt->bindParam(11, $date,PDO::PARAM_STR);
		  	
		  $stmt->execute();	
						 		    
	  
	  }
	   public function gravarDadoEntregas(Cliente $cliente,$idCliente){
		  
						 		    
	   }
	  public function alterarSenhaCliente (Cliente $cliente, $idCliente){
		         
			   
			   try { 
			        $senha=$cliente->getSenha(); 
		                $date = date('Y-m-d H:i:s');
				$conn =new conexaoBanco();  
				$ligar =$conn->conexao();
				$stmt=$ligar->prepare("update  tb_clientes set senha=:senha,data_alteracao=:data_alteracao  where id_cliente= $idCliente");
				$stmt->bindParam(":senha", $senha);
			        $stmt->bindParam(":data_alteracao",$date,PDO::PARAM_STR);
				$stmt->execute();					
			   
			   } catch (Exception $ex ){
		        	echo $ex;
     	    	} 				  
		  
	  }
	  public function alterarEnderecoCliente(Cliente $cliente,$idCliente){
		   
			   try { 
			        $rua=$cliente->getRua(); 
		            $numero=$cliente->getNumero();
		            $bairro=$cliente->getBairro();
		            $cidade=$cliente->getCidade();		  
		            $estado=$cliente->getEstado();
		            $telefone=$cliente->getTelefone();
		            $celular=$cliente->getCelular();
					$cpf=$cliente->getCpf();
					$cep=$cliente->getCep();
					$date = date('Y-m-d H:i:s');
					$conn =new conexaoBanco();  
				    $ligar =$conn->conexao();
				    $stmt=$ligar->prepare("update tb_endereco set rua=:rua,numero=:numero,cidade=:cidade,bairro=:bairro,estado=:estado,telefone_fixo=:telefone_fixo,celular=:celular,cpf=:cpf,cep=:cep,data_alteracao=:data_alteracao  where id_cliente= $idCliente");
				    $stmt->bindParam(":rua", $rua);
					$stmt->bindParam(":numero", $numero);
					$stmt->bindParam(":cidade", $cidade);
					$stmt->bindParam(":bairro", $bairro);					;
					$stmt->bindParam(":estado", $estado);
					$stmt->bindParam(":telefone_fixo", $telefone);
					$stmt->bindParam(":celular",$celular);
					$stmt->bindParam(":cpf", $cpf);
					$stmt->bindParam(":cep", $cep);
					$stmt->bindParam(":data_alteracao",$date,PDO::PARAM_STR);
					
				    $stmt->execute();					
			   
			   } catch (Exception $ex ){
		        	echo $ex;
     	    	} 				  
	  }
          public function mostrarTodosCliente(){
                                $conn =new conexaoBanco();  
				$ligar =$conn->conexao();
			        $stmt =$ligar->prepare("select id_cliente,nome,sobrenome,email  from tb_clientes");
				$stmt->execute();					 
				$linha=$stmt->fetchAll();				      				  					 	                          
				echo "Listagens do Cliente" ;
                                echo '<table border='."1px".'cellpadding='."5px". 'cellspacing='."0".'id='."alter".'>';	 
				     
                                     echo  '<tr bgcolor ='."#ffc".'>';
                                            echo '<th> Cliente de identificao</th>';  
                                            echo '<th> Nome</th>'; 
                                            echo '<th> Sobrenome</th>';
                                            echo '<th> Email</th>';                                              
                                            //echo '<td> numero de identificao</td>';        
                                     echo '</tr>'; 	
 				  				 
				for ($lin=0;$lin<count($linha);$lin++){
				     echo '<tr bgcolor ='."#eee".'>';
				     for ($col=0;$col<=4;$col++){                                         						 
				       //echo '<a href ='.($linha[$lin][$col]).'>'.($linha[$lin][$col]).'</a>';
                                         echo '<th> <a href =DadosClientes.php?var='.$linha[$lin][$col].'>'.$linha[$lin][$col].'</a></th>';
							  				 
							
					 }
					 echo '<tr>';
                                     					
				 
					 }
                                 echo '</table>';

          }   
	  public function procurarEndereco($idCliente){
		  
		   $conn =new conexaoBanco();  
    	           $ligar =$conn->conexao();
		   $stmt =$ligar->prepare("select id_cliente from tb_endereco where id_cliente= '".$idCliente."'");
		   $stmt->execute();					
    	           $linha=$stmt->fetch();
                   if($linha==null)	{
		      return false ;   
		   }else{
		      return true; 
		   }	   
    	    
	  }
	  public function procurarEnderecoArray($idCliente){
		  
		   $conn =new conexaoBanco();  
    	           $ligar =$conn->conexao();
		   $stmt =$ligar->prepare("select rua,numero,bairro ,cidade,estado,telefone_fixo,celular,cpf,cep from tb_endereco where id_cliente= '".$idCliente."'");
		   $stmt->execute();					
    	           $linha=$stmt->fetch();
                   return $linha;
    	    
	  }
	  public function dadoCliente($idCliente){
		     
		  $conn =new conexaoBanco();  
    	          $ligar =$conn->conexao();		   
                  $stmt =$ligar->prepare("select nome,sobrenome,email from tb_clientes where id_cliente= '".$idCliente."'");
		  $stmt->execute();					
    	          $linha=$stmt->fetch();
                  return $linha;
		  
	  }
	  public function mostrarDadoCliente($idCliente){
		     $propriedade= array ('Nome','Sobrenome','Email');
			 $dados=$this->dadoCliente($idCliente);
		     for ($cont=0;$cont<3;$cont++){	
   			      echo '<p>';
			      echo $propriedade[$cont].": ".$dados[$cont];
			      echo '</p>';
			 }
			 
	  }
	  public function enderecoFuncao($idCliente){
		     
		    $conn =new conexaoBanco();  
    	             $ligar =$conn->conexao();
		     $stmt =$ligar->prepare("select rua,numero,bairro,cidade,estado,telefone_fixo,celular,cpf,cep from tb_endereco where id_cliente= '".$idCliente."'");
		     $stmt->execute();					
    	     $linha=$stmt->fetch();
             return $linha;
		  
	  }
	  // mostrar endereco do cliente
	  public function mostrarEndereco($idCliente){
		     $propriedade= array ('rua','numero','bairro','cidade','estado','telefone','celular','cpf','cep');
			 $endereco=$this->enderecoFuncao($idCliente);
		     for ($cont=0;$cont<9;$cont++){	
   			     echo '<p>';
			     echo $propriedade[$cont].": ".$endereco[$cont];
			     echo '</p>';
			 }
			 
	  }
	  public function procurarCliente($email){
		  
		   $conn =new conexaoBanco();  
    	           $ligar =$conn->conexao();
		   $stmt =$ligar->prepare("select id_cliente,nome,sobrenome,email,senha from tb_clientes where email= '".$email."'");
		   $stmt->execute();					
    	           $linha=$stmt->fetch(); 
    	           return $linha;
	  }
	  public function procurarClienteId($idCliente){
		  
		   $conn =new conexaoBanco();  
    	           $ligar =$conn->conexao();
		   $stmt =$ligar->prepare("select id_cliente from tb_clientes where email= '".$idCliente."'");
		   $stmt->execute();					
    	           $linha=$stmt->fetch(); 
    	           return $linha['id_cliente'];
	  }
	  public function procurarSenhaCliente($senha){
		 
		   $conn =new conexaoBanco();  
    	           $ligar =$conn->conexao();
		   $stmt =$ligar->prepare("select senha from tb_clientes where senha= '".$senha."'");
		   $stmt->execute();					
    	   $linha=$stmt->fetch(); 
    	   return $linha['senha'];
	    
	  }
	  public function procurarIdCliente($senha){
		 
		   $conn =new conexaoBanco();  
    	   $ligar =$conn->conexao();
		   $stmt =$ligar->prepare("select senha from tb_clientes where senha= '".$email."'");
		   $stmt->execute();					
    	   $linha=$stmt->fetch(); 
    	   return $linha['id_cliente'];
	    
	  }
	  
	 public function autenticaCliente($email,$senha){
   
			$cliente=$this->procurarCliente($email);
			if (($cliente['email']==$email)&($cliente['senha']==$senha)){
				 return $cliente;			
			} else {
				return false ;
			}
		      
		 
	 } 
  
  }
    


?>
