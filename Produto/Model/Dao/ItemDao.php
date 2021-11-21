<?php 
    include_once ("ClassConstante.php");
	include_once("ConexaoBanco.php");
	include_once (ClassConstante::$PATH_PRODUTODAO);
	include_once (ClassConstante::$PATH_PEDIDODAO);
    class ItemDao{
		 
		 static public function gravarItems($idProduto ,$idPedido,$quant){
			   
			   $produtoDao = new ProdutoDao();
			   $pedidoDao=new PedidoDao();
               $vectorProduto=$produtoDao->mostrarLinhaProdutoId($idProduto);			   
			   $vectorPedido=$pedido->procurarPedidoId($idPedido);
			   if($vectorProduto['id_produto']<>null)
				  if ($vectorPedido['id_pedido']<>null){
					  $conn =new conexaoBanco();  
			          $ligar =$conn->conexao();
					  $precoTotalItem =$quant*$vectorProduto['preco'];
			          $stmt=$ligar->prepare("insert into tb_items(id_pedido,id_produto,quantidade ,preco ,preco_total) values (?,?,?,?)");
			          $stmt->bindParam(1, $vectorPedido['id_pedido']);
			          $stmt->bindParam(2, $vectorProduto['id_produto']);
			          $stmt->bindParam(3, $quant);
			          $stmt->bindParam(4, $vectorProduto['preco']);
					  $stmt->bindParam(5, $precoTotalItem);
			          $stmt->execute();		
					  
				  }
			   
		 }
	}
   
?>