<?php
   include_once ("Categoria.php");
   
   class Produto {
	   
	    private $id ;
		private $idCategoria;
		private $descricao;
		private $codigoProduto;
		private $quantidade;
		private $quantidadeAlerta;
		private $preco ;
		private $palavraChave ;
		private $dataCriacao;
	    private $criador;
		private $dataAlteracaco;
		private $alterador;
		private $imagem;
		
		
		public function getId(){
			    return $this->id ;			
		}
		public function setIDCategoria($idCategoria){
			   $this->idCategoria=$idCategoria;
		}
		public function getIDCategoria(){
			   return $this->idCategoria;
		}
		public function setDescricao($descricao){
			    $this->descricao=$descricao;
		}
		public function getDescricao(){
			   return $this->descricao;
		}
		public function setCodigo($codigoProduto){
			   $this->codigoProduto=$codigoProduto;
		}
		public function getCodigo() {
			   return $this->codigoProduto;
		}
	    public function setQuantidade($quantidade){
			    $this->quantidade =$quantidade;
		}
		public function getQuantidade(){
			     return $this->quantidade;
		}
		public function setQuantidadeAlerta($quantidade){
			    $this->quantidadeAlerta=$quantidade; 
			}
		public function getQuantidadeAlerta(){
			   return $this->quantidadeAlerta;
		}
		public function setPreco ($preco){
			   $this->preco =$preco;
		}
		public function getPreco(){
			   return $this->preco;
		}
		public function setPalavraChave($palavraChave){
			   $this->palavraChave=$palavraChave;
		}
		public function getPalavraChave (){
			   return $this->palavraChave;
		}
		public function setDataCriacao ($data){
			   $this->dataCriacao=$data;
		}
		public function getDataCriacao (){
			    return $this->dataCriacao;
		}
		public function setCriador($criador){
			     $this->criador=$criador;
		}
		public function getCriador(){
			   return $this->criador;
		}
		public function setDataAlteracao($data){
			   $this->dataAlteracaco=$data;
		}
		public function getDataAlteracao(){
			   return $this->dataAlteracaco;
		}
		public function setAlteracao($alterador){
	   	     $this->alterador=$alterador;
		}
		public function getAlteracao(){
			   return $this->alterador;
		}
		public function setImagen($imagem){
			  $this->imagem=$imagem;
		}
		public function getImagem(){
			   return $this->imagem;
		}
	
   }



?>