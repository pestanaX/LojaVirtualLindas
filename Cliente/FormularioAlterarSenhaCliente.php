<?php 
  include_once("ClassConstante.php");
  include_once(ClassConstante::$PATH_CLIENTE);
  include_once(ClassConstante::$PATH_CLIENTEDAO);
  
  session_start();
  
  $idCliente=$_SESSION['idCliente'];
  $senhaAntiga=$_POST['TextSenhaAntiga'];
  $senhaNova=$_POST['TextSenhaNova'];
  $senhaConfirmar=$_POST['TextConfirmar'];
  $cliente = new Cliente();
  $clienteDao=new ClienteDao();
  $cliente->setSenha($senhaNova);
  $senha=$clienteDao->procurarSenhaCliente($senhaAntiga);
  if ($senha<>$senhaAntiga){
	   echo "<script>";
	   echo "alert('Senha invalida')";  
       echo "</script>";
  }else {
	    if ($senhaNova==$senhaConfirmar){ 
	        $clienteDao->alterarSenhaCliente($cliente,$idCliente);
		    echo "<script>";
	        echo "alert('Senha alterada com sucesso')";  
            echo "</script>";
		}else {
		    echo "<script>";
	        echo "alert('Confirmação da Senha invalida')";  
            echo "</script>";
		}
  }
  
?>