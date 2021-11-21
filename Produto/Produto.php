<?php
  
   
   class Produto {
	   
	        private $id ;
		private $idCategoria;
                private $idMarca;
		private $descricao;
		private $codigo;
		private $quantidade;
		private $visivel;
		private $preco ;
		private $imagem;
                private $imagem2;
		private $imagem3;
                private $imagem4;
		
		public function getId(){
			    return $this->id ;			
		}
		public function setIDCategoria($idCategoria){
			   $this->idCategoria=$idCategoria;
		}
		public function getIDCategoria(){
			   return $this->idCategoria;
		}
                public function setIDMarca($idMarca){
			   $this->idMarca=$idMarca;
		}
		public function getIDMarca(){
			   return $this->idMarca;
		}
		public function setDescricao($descricao){
			    $this->descricao=$descricao;
		}
		public function getDescricao(){
			   return $this->descricao;
		}
		public function setCodigo($codigoProduto){
			   $this->codigo=$codigoProduto;
		}
		public function getCodigo() {
			   return $this->codigo;
		}
	        public function setQuantidade($quantidade){
			    $this->quantidade =$quantidade;
		}
		public function getQuantidade(){
			     return $this->quantidade;
		}
		public function setVisivel($v){
			    $this->visivel=$v; 
			}
		public function getVisivel(){
			   return $this->visivel;
		}
		public function setPreco ($preco){
			   $this->preco =$preco;
		}
		public function getPreco(){
			   return $this->preco;
		}
		
		public function setImagen($imagem){
			  $this->imagem=$imagem;
		}
		public function getImagem(){
			   return $this->imagem;
		}
                public function setImagen2($imagem){
			  $this->imagem2=$imagem;
		}
		public function getImagem2(){
			   return $this->imagem2;
		}
                public function setImagen3($imagem){
			  $this->imagem3=$imagem;
		}
		public function getImagem3(){
			   return $this->imagem3;
		}
                public function setImagen4($imagem){
			  $this->imagem4=$imagem;
		}
		public function getImagem4(){
			   return $this->imagem4;
		}  
	
   }


?>
