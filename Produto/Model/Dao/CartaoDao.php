<?php
   include ("ConexaoBanco.php");
   include_once("ClassConstante.php");
   include_once(ClassConstante::$PATH_CARTAO);
   
   class CartaoDao {
	   
	   public function __construct (){
		   date_default_timezone_set('America/Sao_Paulo');
	   }
	   
	   public function gravarCartao(Cartao $cartao, $idCliente){
		   
		  $numeroCartao=$cartao->getNumeroCartao(); 
		  $tipoCartao=$cartao->getTipo();
		  $dataExpiracao=$cartao->getDataExpiracao();				  
		  $date = date('Y-m-d H:i:s');
		 
		  $conn =new conexaoBanco();  
		  $ligar =$conn->conexao();
		  $stmt=$ligar->prepare("insert into tb_cartao(id_cliente,marca_cartao,numero_cartao,data_expiracao,data_criacao) values (?,?,?,?,?)");		    
		  $stmt->bindParam(1, $idCliente);
		  $stmt->bindParam(2, $tipoCartao);		  
		  $stmt->bindParam(3, $numeroCartao);
		  $stmt->bindParam(4, $dataExpiracao);
		  $stmt->bindParam(5, $date,PDO::PARAM_STR);		 
		  $stmt->execute();	
	   }
	   
	   
   }

?>