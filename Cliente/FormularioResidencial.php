<?php
       
    include_once ("ClienteDao.php");
    include_once("Cliente.php");
    
     session_start();
     $cliente = new Cliente();
     $clienteDao = new ClienteDao();    
     $idCliente=$_SESSION['idCliente'];

     $rua =$_POST['TextRua'];
     $numero=$_POST['TextNumero'];	
     $bairro =$_POST['TextBairro'];
     $cidade =$_POST['TextCidade'];
	//$estado =$_POST['Estado'];
      $estado="df";
      $telefone =$_POST['TextTelefone'];
      $celular =$_POST['TextCelular'];
      $cep =$_POST['TextCep'];
      $cpf=$_POST['TextCpf'] ;
	
	
	
	$cliente->setRua($rua);
	$cliente->setNumero($numero);
	$cliente->setBairro($bairro);
	$cliente->setCidade($cidade);
        $cliente->setEstado($estado); 
	$cliente->setCpf($cpf);
	$cliente->setCep($cep);
	$cliente->setTelefone($telefone);
	$cliente->setCelular($celular);	
	$clienteDao->gravarDadoEndereco($cliente,$idCliente);
	
	if (isset($_POST['endereco'])){		
	   $clienteDao->gravarDadoEntregas($cliente,$idCliente);	
	  
	}
    
?>
