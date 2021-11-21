<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Perfil Cliente</title>
</head>

<body>
   <h1>Perfil do Cliente</h1>
   
   <div id ="topo" >
   </div>
 
   <div id ="principal" >
    <?php 
            
	 include_once("ClienteDao.php");
         session_start();
         $idCliente=$_GET['var'];
         $clienteDao = new ClienteDao();
         
         if ($_SESSION['nome']==null){          
		  header ('Location:http://localhost:8080/index.php');
         }
         echo '<h2> Dados Cliente </h2>';
         $vectorDados =$clienteDao->dadoCliente($idCliente);
         echo 'Nome :', $vectorDados['nome'];
         echo '</br>';
         echo 'Sobrenome :', $vectorDados['sobrenome'];
         echo '</br>';
         echo 'Email :', $vectorDados['email'];       
         echo '<h2> Endereco Cliente </h2>'; 
         $vectorEndereco= $clienteDao->procurarEnderecoArray($idCliente);
         echo 'Rua :',$vectorEndereco['rua'];
         echo '</br>';  
         echo 'Nmero :',$vectorEndereco['numero'];   
         echo '</br>';
         echo 'Bairro :',$vectorEndereco['bairro'];
         echo '</br>'; 
         echo 'Cidade :',$vectorEndereco['Cidade'];
         echo '</br>';
         echo 'Estado :',$vectorEndereco['estado'];
         echo '</br>';
         echo 'Tefone :',$vectorEndereco['telefone_fixo'];
         echo '</br>';
         echo 'Celular :',$vectorEndereco['celular'];
         echo '</br>';
         echo 'Cpf:',$vectorEndereco['cpf'];
         echo '</br>';
         echo 'CEP :',$vectorEndereco['cep'];     
    ?>
    
   </div>
   <div id ="baixo" >
   </div>

</body>
</html>
