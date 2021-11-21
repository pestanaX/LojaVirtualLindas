<?php
  class Cliente {
	    
        private $idCliente;
        private $nome;
      	private $sobrenome;
        private $email;
		private $senha; 
        private $telefone;
		private $celular;
		private $rua; 
		private $numero;
		private $cidade;
		private $bairro;
		private $estado;
		private $opcional;		
		private $cep;
        private $cpf;
		private $dataCriacao;
		private $criador;
		private $dataAlteracao;
		
        public function setNome($nome){
		    	 $this->nome=$nome;
		}
		public function getNome(){
			  return  $this->nome;
		}
	    public function setSobrenome($sobrenome){
			  $this->sobrenome=$sobrenome;
		}
		public function getSobrenome(){
			   return $this->sobrenome;
		}
		public function setEmail($email){
			   $this->email=$email;
		}
		public function getEmail(){
			   return $this->email;
		}
		public function setSenha($senha){
			   $this->senha=$senha;
		}
		public function getSenha(){
			   return $this->senha;
		}
		public function setTelefone($telefone){
			   $this->telefone=$telefone;
		}
		public function getTelefone(){
			   return $this->telefone;
		}
		public function setCelular($celular){
			   $this->celular=$celular;
		}
		public function getCelular(){
			   return $this->celular;
		}
		
		public function setRua($rua){
			   $this->rua=$rua;
		}
		public function getRua(){
			   return $this->rua;
		}
		public function setNumero($numero){
			   $this->numero=$numero;
		}
		public function getNumero(){
			   return $this->numero;
		}
		public function setCidade($cidade){
			   $this->cidade=$cidade;
		}
		public function getCidade(){
			   return $this->cidade;
		}
		public function setBairro($bairro){
			   $this->bairro=$bairro;
		}
		public function getBairro(){
			   return $this->bairro;
		}
		public function setEstado($estado){
			   $this->estado=$estado;
		}
		public function getEstado(){
			   return $this->estado;
		}
		public function setOpcional($opcional){
			   $this->opcional=$opcional;
		}
		public function getOpcional(){
			   return $this->opcional;
		}
		public function setCpf($cpf){
			   $this->cpf=$cpf;
		}
		public function getCpf(){
			   return $this->cpf;
		}
		public function setCep($cep){
			   $this->cep=$cep;
		}
		public function getCep(){
			   return $this->cep;
		}
		public function setDataCriacao($dataCriacao){
			   $this->dataCriacao=$dataCriacao;
		}
		public function getDataCriacao(){
			   return $this->dataCriacao;
		}
  }

?>