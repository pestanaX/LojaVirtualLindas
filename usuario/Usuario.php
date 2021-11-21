<?php
  class Usuario {
	  
	         private $idUsuario ;		 
		 private $nome;
		 private $sobrenome;		
		 private $username;
	         private $senha;
		
		 public function getId (){
			  
			   return $this->idUsuario;
			 
		 }
		 public function setNome($nomePrimeiro){
			   $this->nome=$nomePrimeiro;
		 }
		 public function getNome(){
			    return $this->nome;
		 }
		  public function setSobrenome($sobnome){
			   $this->sobrenome=$sobnome;
		 }
		public function getSobrenome(){
			  return $this->sobrenome;
		 } 
		 
		 public function setUser($usnome){
			   $this->username=$usnome;
		 }
		 public function getUser(){
			    return $this->username;
		 }
		 public function setSenha($password){
			   $this->senha=$password;
		 }
		 public function getSenha(){
			    return $this->senha;
		 }
		 
  }
?>
