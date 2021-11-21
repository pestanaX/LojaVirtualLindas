<?php
     //include_once("C:/Users/Ariel pestana/Documents/LojaAlfa/php/Model/Produto.php");
     include("ConexaoBanco.php");
	 class Permisao{
		// procurar o chave primaria da tabela permissao 
		public static function procurarIdPermisao($permisao){
			
			$conn =new conexaoBanco();  
			$ligar =$conn->conexao();
            $stmt =$ligar->prepare("select * from tb_permissao where descricao= '".$permisao."'");
    		$stmt->execute();					
			$linha=$stmt->fetch(); 
            return $linha[0];
			
		}
		public static function listaPermisao(){
			
			$conn =new conexaoBanco();  
		    $ligar =$conn->conexao();
			$stmt =$ligar->prepare("select descricao from tb_permissao");
			$stmt->execute();					
			$linha=$stmt->fetchAll(PDO::FETCH_COLUMN, 0);
			return  $linha;
		
		}
	 }

?>