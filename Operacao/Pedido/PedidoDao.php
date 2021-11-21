<?php 
     	 
	//include_once(".../conexao/ConexaoBanco.php");
        include_once ("Pedido.php");
        include_once("ItemsProduto.php");
        include_once (".../Produto/ProdutoDao.php");
        include_once(".../Cliente/ClienteDao.php");
     
       class PedidoDao {
             
              public function __construct (){
	             date_default_timezone_set('America/Sao_Paulo');
			 	    
	      }
              public function gravarPedido(Pedido $pedido){
                  
                    print $pedido->getIdCliente();
                     
                     $date = date('Y-m-d H:i:s');
                     try{
                        $conn =new conexaoBanco();  
			$ligar =$conn->conexao();
			$stmt=$ligar->prepare("insert into tb_pedido(id_cliente,estado,data_criacao) values (?,?,?)");
		        $stmt->bindParam(1, $pedido->getIdCliente());
	                $stmt->bindParam(2, $pedido->getEstado());
		        $stmt->bindParam(3, $date,PDO::PARAM_STR);
		        $stmt->execute();
                     }catch (Exception $ex) {
                        echo $ex.getMessage();
                     }
                         
                       
              }
              public function actualizarPedido(Pedido $pedido ,$numeroPedido){
               	  
                       try {
				    
			   $conn =new conexaoBanco();  
			   $ligar =$conn->conexao();
                           $stmt=$ligar->prepare("update tb_pedido set id_cliente=:id_cliente,numero_item=:numero_item,estado=:estado ,valor_total=:valor_total  where id_pedido= '".$numeroPedido."'");                                  				   
                           $stmt->bindParam(":id_cliente",$pedido->getIdCliente);
			   $stmt->bindParam(":numero_item",$pedido->getNumeroItem());
			   $stmt->bindParam(":estado",$pedido->getEstadoProduto());
                           $stmt->bindParam(":valor_total",$pedido->getValorTotal());								
			   $stmt->execute();					
			   
		      } catch (Exception $ex ){
		          echo $ex;
     	    	      } 				  
			  
              }
              public function procurarPedido($numeroPedido){       
                     $conn =new conexaoBanco();  
		     $ligar =$conn->conexao();
	             $stmt =$ligar->prepare("select * from tb_pedido where id_pedido='".$numeroPedido."'");
		     $stmt->execute();					
		     $linha=$stmt->fetch(); 
		     return $linha;
              }
              public function numeroDePedidos(){
				
			         $conn =new conexaoBanco();  
				 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select * from tb_pedido");
				 $stmt->execute();					
				 $numeroElemento=$stmt->rowCount();
				return $numeroElemento;
			}
              public function boleto ($idPedido){

	             $sql = "select pr.id_produto, pr.descricao ,i.quantidade ,pr.preco ,i.preco_total ,id_tems_produto from tb_pedido p join tb_Items_produto i on                          p.id_pedido =i.id_pedido  join tb_produto pr on  pr.id_produto=i.id_produto where p.id_pedido ='".$idPedido."'";
 		      $conn =new conexaoBanco();  
		      $ligar =$conn->conexao();
		      $stmt =$ligar->prepare($sql);
		      $stmt->execute();				
                      $linha =$stmt->fetchAll();
		       return  $linha;				
		            
		  }
                  
        }

?>
