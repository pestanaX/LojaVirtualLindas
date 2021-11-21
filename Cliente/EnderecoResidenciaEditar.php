<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Endereço do Cliente</title>
</head>

<body>

<div id ="topo">
 <h1> Endereço Residencial</h1>
</div>
<div id ="Principal">
<?php
    include_once ("ClassConstante.php");   
	include_once(ClassConstante::$PATH_CLIENTEDAO);

      session_start();
      $idCliente=$_SESSION['idCliente'];
	  $clienteDao = new ClienteDao(); 
	  
	  if ($_SESSION['nome']==null){          
		  header ('Location:http://localhost:8080/index.php');
      } 
        
	  $endereco=$clienteDao->procurarEnderecoArray($idCliente);
	 
	  
     
?>
    
  
  <legend>Endereço Residencial</legend>
  <form action="../controller/FormularioResidencialEditar.php" method="post" enctype="multipart/form-data">
 
   <p id ="paragrafo">
     <label>rua </label>
     <input name="TextRua" type="text" value= "<?php echo $endereco['rua'] ?>" />
   </p>
   <p id ="paragrafo">
     <label>Numero </label>
     <input name="TextNumero" type="text" value= "<?php echo $endereco['numero'] ?>" /> 
   </p>
   <p id ="paragrafo">
     <label> Cep </label>
     <input name="TextCep" type="text" value= "<?php echo $endereco['cep'] ?>"  /> 
   </p>
   <p id ="paragrafo">
     <label> Bairro </label>
     <input name="TextBairro" type="text" value= "<?php echo $endereco['bairro'] ?>"/> 
   </p>
   <p id ="paragrafo">
     <label> Cidade </label>
     <input name="TextCidade" type="text"  value= "<?php echo $endereco['cidade'] ?>"/> 
   </p>
   <p id ="paragrafo">
     <label>Estado </label>
     <select name="Estado"></select> 
   </p>
   <p id ="paragrafo">
     <label>Telefone </label>
     <input name="TextTelefone" type="text" value= "<?php echo $endereco['telefone_fixo'] ?>" /> 
   </p>
   <p id ="paragrafo">
    <label> Celular </label>
     <input name="TextCelular" type="text" value= "<?php echo $endereco['celular'] ?>"/> 
   </p>
   
   <p id ="paragrafo">
   <label>Cpf  </label>
   <input name="TextCpf" type="text" value= "<?php echo $endereco['cpf'] ?>" /> 
   </p>
   <p id ="paragrafo">&nbsp;</p>
   <p id ="paragrafo">
    
   <input id ="BotaoGravar" value="Modificar" type="submit" /> 
   <input id ="BotaoGravar" value="Cancelar" type="reset" /> 
   </p>
   
  </form>

</div>
<div id="rodape">

</div>
</body>
</html>
