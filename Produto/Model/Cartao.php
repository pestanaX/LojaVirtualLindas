<?php
   class Cartao
   {
	  private $tipoCartao;
      private $numeroCartao;
      private $dataEmissao;	  
	  private $dataExpiracao; 
	  private $dataCriacao;
	  private $dataAlteracao;

      public function setTipo($tipoCartao){
		     $this->tipoCartao=$tipoCartao;
	  }	 
      public function getTipo()	{
		     return $this->tipoCartao;
		  
	  }
      public function setNumeroCartao($numero){
		      $this->numeroCartao=$numero;
		  
	  }
      public function getNumeroCartao(){
		     return $this->numeroCartao;
	  }
      public function setDataEmissao($data){
		     $this->dataEmissao=$data;
			 
	  }
      public function getDataEmissao(){
		     return $this->dataEmissao;
	  }
      public function setDataExpiracao($data){
		       $this->dataExpiracao=$data;
	  }
      public function getDataExpiracao(){
		       return $this->dataExpiracao;
	  }	  
       public function setDataCriacao($data){
		       $this->dataCriacao=$data;
	  }
      public function getDataCriacao(){
		       return $this->dataCriacao;
	  }	
	  public function setDataAlteracao($data){
		       $this->dataAlteracao=$data;
	  }
      public function getDataAlteracao(){
		       return $this->dataAlteracao;
	  }	  
   
   }
?>