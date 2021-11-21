<?php
 class Items {
 
      private $idProduto;
	  private $idPedido;
	  private $quantidadeProduto;
	  private $preco;
	  
	  public function setProduto($idProduto){
		     $this->idProduto=$idProduto; 
	  }
	  public function getIdProduto(){
		     return $this->idProduto;  
	  }
	  public function setPedido(){
		     $this->idPedido=$idPedido;
	  }
	  public function getPedido(){
		     return $this->idPedido;
	  }
	  public function setPreco($preco){
		     $this->preco =$preco;
	  }
     public function getPreco(){
	        return $this->preco;          
     }
     public function setQuantidade($quantidadeProduto){
		    $this->quantidadeProduto=$quantidadeProduto;
	 }
     public function getQuantidade(){
		     return $this->quantidadeProduto;
	 }	 
	 }
?>