<?php

  class Marca {

 
   private $id;
   private $descricao;
   
   
   public function __construct($descricao){	
        	$this->descricao =$descricao;
			
   }    
   public function getId(){	     
	       return $this->id;
   }
    
    public function setDescricao ($descricao){		   
            $this->descricao =$descricao;		   
		 
	}
	public function getDescricao(){
		
		   return $this->descricao;
	}
	
	
  }
 ?>
