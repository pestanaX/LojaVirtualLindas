<?php
     include_once("Usuario.php");
     include_once ("UsuarioDao.php");
     session_start();
     $senhaAntiga = $_POST['TextSenhaAntiga'];
     $senhaNova = $_POST['TextSenhaNova'];
     $confirmarSenha =$_POST['TextConfirmar'];
     $usuario = new Usuario();
     $usuarioDao = new UsuarioDao();
       
     $usuario->setSenha($confirmarSenha);
     echo $_SESSION['senha'];
     $username= $_SESSION['username'];      
     if ($senhaAntiga==$_SESSION['senha'])
         if ($senhaNova==$confirmarSenha){
                       
            $usuarioDao->atualizarDadoUsuario($usuario,$username); 
                 
     } else {
     } 
        
?>

