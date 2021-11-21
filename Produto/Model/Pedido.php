<?php 
     class Pedido{
          private $idCliente;
		  private $dataCriacao;
          private $dataEnvio;
          private $entregador;
          private $pagamento;
          private $estadoPedido;
          private $totalPedido; 
          
          public function setIdCliente($IdCliente){
			  
			    $this->idCliente=$idCliente;
		  }
		  public function getIdCliente(){
			    return $this->idCliente;
		  }
          public function getDataCriacao (){
			    return $this->dataCriacao;
		  }	
          public function setDataEnvio($dataEnvio){
			    $this->dataEnvio=$dataEnvio;
		  }		  
          public function getDataEnvio(){
			    return $this->dataEnvio;
		  } 
		  public function setEntregador($entregador){
			     $this->entregador=$entregador;
		  }
		  public function getEntregador(){
			     return $this->entregador;
		  }
		  public function setPagamento($pagamento){
			     $this->pagamento=$pagamento;
		  }
		  public function getPagamento(){
			     return $this->pagamento;
		  }
		  public function setEstadoPedido($estado){
			      $this->estadoPedido=$estado;
		  }
		  public function getEstadoPedido(){
			      return $this->estadoPedido;
		  }
		  public function setTotalPedido($total){
			     $this->totalPedido=$total;
		  }
		  public function getTotalPedido(){
			     return $this->totalPedido;
		  }
	 } 

?>