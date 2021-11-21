<html lang ="pt-br">
<head>
<meta charset=utf-8">
<link rel="stylesheet" href="css/formularioentrada.css">
<title>Alterar Senha</title>
</head> 
 <body>
 <div id ="topo">

 </div>
<div id ="Principal">
       <?php 
         include_once ("UsuarioDao.php");

         session_start();
         $usuarioDao = new UsuarioDao(); 
         $idUsuario=$_SESSION['idUsuario'];
         $username =$_SESSION['username'];
         
         
         if ($_SESSION['nome']==null){          
		  header ('Location:http://localhost:8080/loja/LoginAdiministrador.html');
         }
        
         $linha =$usuarioDao->mostrarUsuario($username);         
         //echo '<label> olá:'.$linha['nome'].'</label>';
         $_SESSION['senha']=$linha['senha'];
 
       ?> 
  
 
  <form  method="post" action="AlterarSenhaAdmin.php"  id ="formulario" enctype="multipart/form-data" name ="formulario">
      <h2>Alterar a Senha </h2> 
     <div id="field"> 
     <label>Senha Antiga</label>
     <input name="TextSenhaAntiga" class ="input" type="password" /> 
     <div>
     <div id="field">
     <label>Senha Nova</label>   
     <input name="TextSenhaNova" class ="input" type="password" /> 
     <div>
     <div id ="field"> 
     <label> Confirmar Nova</label>
     <input name="TextConfirmar" class ="input" type="password" /> 
     </div> 
     
     <input id ="BotaoGravar" class ="button" value="Modificar" type="submit" /> 
     <input id ="BotaoGravar" class ="button "value="Cancelar" type="reset" /> 
     
   
  </form>

</div>
<div id="rodape">

</div>
     
</body>
</html>
