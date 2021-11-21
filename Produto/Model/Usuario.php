<?php 
  class Usuario {
	  
	     private $idUsuario ;
		 private $idPermisao;
		 private $primeiroNome;
		 private $ultimoNome;
		 private $email;
		 private $username;
	     private $password;
		 private $dataCriacao;
         private $criadoPor;
		 private $dataAlteracao;
		 private $alteradoPor;
		 
		 public function getId (){
			  
			   return $this->idUsuario;
			 
		 }
		 public function setIdPermisao($permisao){
			   $this->idPermisao =$permisao;
		 }
		 public function getIdPermissao(){
			 
			    return $this->idPermisao;
		 }
         public function setPrimeiroNome($nome){
			   $this->primeiroNome=$nome;
		 }
		 public function getPrimeiroNome(){
			    return $this->primeiroNome;
		 }
		  public function setUltimoNome($nome){
			   $this->ultimoNome=$nome;
		 }
		 public function getUltimoNome(){
			    return $this->ultimoNome;
		 }
		  public function setEmail($email){
			   $this->email=$email;
		 }
		 public function getEmail(){
			    return $this->email;
		 }
		 public function setUser($nome){
			   $this->username=$nome;
		 }
		 public function getUser(){
			    return $this->username;
		 }
		 public function setPassword($password){
			   $this->password=$password;
		 }
		 public function getPassword(){
			    return $this->password;
		 }
		 public function setDataCriacao ($data){
			   $this->dataCriacao=$data;
		}
		public function getDataCriacao (){
			    return $this->dataCriacao;
		}
		public function setCriador($criador){
			     $this->criadoPor=$criador;
		}
		public function getCriador(){
			   return $this->criadoPor;
		}
		public function setDataAlteracao($data){
			   $this->dataAlteracao=$data;
		}
		public function getDataAlteracao(){
			   return $this->dataAlteracao;
		}
		public function setAlteracao($alterador){
	   	     $this->alteradoPor=$alterador;
		}
		public function getAlteracao(){
			   return $this->alteradoPor;
		}
		 
		 
		 
  }
?>