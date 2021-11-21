<?php 
      //include_once(".../conexao/ConexaoBanco.php");
      include_once("ItemsProduto.php");
      class itemDao {

             public function __construct (){
	             date_default_timezone_set('America/Sao_Paulo');
			 	    
	      }
              public function gravarItem(ItemsProduto $item){              
                     
                     
                     
                     try{
                        $sql="insert into tb_Items_produto(id_pedido,id_produto,quantidade) values (?,?,?)";
                        $conn =new conexaoBanco();  
			$ligar =$conn->conexao();
			$stmt=$ligar->prepare($sql);
		        $stmt->bindParam(1, $item->getIdPedido());
	                $stmt->bindParam(2, $item->getIdProduto());
		        $stmt->bindParam(3, $item->getQuantidade());
                        //$stmt->bindParam(4, $item->get);
		        $stmt->execute();
                     }catch (Exception $ex) {
                        echo $ex.getMessage();
                     }
                         
                       
              }
              public function removeItem($numeroItem){
                     try {						
			  $sql ="delete from tb_Items_produto  where id_tems_produto='".$numeroItem."'";		
		          $conn =new conexaoBanco();  
		          $ligar =$conn->conexao();
		          $stmt=$ligar->prepare($sql);
			  $stmt->execute();					
		     } catch (Exception $ex ){
			  echo $ex;
		     } 
              }
                         
      }



?>
