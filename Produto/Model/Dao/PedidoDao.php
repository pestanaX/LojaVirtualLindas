<?php
     include_once("ConexaoBanco.php");
     include_once("ClassConstante.php");
	 include_once(ClassConstante::$PATH_CLIENTEDAO);
	 class PedidoDao {
		 
		 public function __construct (){
			 
			 date_default_timezone_set('America/Sao_Paulo');
		 }
		 
		 public function gravarPedido(Pedido $pedido , $idCliente ,$precoTotal){
			    
			$clienteDao = new ClienteDao();
			$idCliente =$clienteDao->procurarClienteId($idCliente);
			       
			if ($idCliente<>null){            					  
			   $id=$idCliente;
			   $date = date('Y-m-d H:i:s');				   
			   $estado =$pedido->getEstadoPedido():                      
			   $pagamento=$pagamento->getPagamento();
			   $conn =new conexaoBanco();  
			   $ligar =$conn->conexao();
			   $stmt=$ligar->prepare("insert into tb_pedido(id_cliente,data_criacao ,estado_pedido ,pagamento,total) values (?,?,?,?,?)");
			   $stmt->bindParam(1, $idCliente);
			   $stmt->bindParam(2, $date,PDO::PARAM_STR);
			   $stmt->bindParam(3, $estado);
			   $stmt->bindParam(4, $pagamento);
			   $stmt->bindParam(5, $precoTotal);
			   $stmt->execute();					   
			   
			}else {
					   
			}
                   				   
				   
			 
		 }
		 public function atualizarPedido($idPedido ){  
     	           					  
					                    	  
		   $estado =$pedido->getEstadoPedido():                      
		   $pagamento=$pagamento->getPagamento();
		   $dataEnvio =null ;
		   $entregador= $pedido->getEntregador();					
		   $conn =new conexaoBanco();  
		   $ligar =$conn->conexao();
		   $conn =new conexaoBanco();  
		   $ligar =$conn->conexao();
		   $stmt=$ligar->prepare("update  tb_pedido set  data_envio=:data_envio, 
		   entregador=:entregador,estado_pedido=:estado_pedido,pagamento=:pagamento where id_pedido= $idPedido");
		   $stmt->bindParam(":data_envio", $dataEnvio);					  
		   $stmt->bindParam(":entregador", $entregador);
		   $stmt->bindParam(":estado_pedido", $estado);					   
		   $stmt->bindParam(":pagamento", $pagamento);
		   $stmt->execute();       				   
			    
			 
		 }
		public function procurarPedidoId($idPedido){
			 
		   $conn =new conexaoBanco();  
		   $ligar =$conn->conexao();
		   $stmt =$ligar->prepare("select * from tb_pedido where id_pedido= $idPedido");
		   $stmt->execute();					
		   $linha=$stmt->fetch(); 
		   return $linha; 
		}
	 }
       
?>