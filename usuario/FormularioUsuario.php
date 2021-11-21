<?php       
		
		
		 include_once ("Usuario.php");
		 include_once ("UsuarioDao.php"); 
                   
                 //session_start();

                 
		 	
		 $nomePrimeiro= $_POST['TextNome'];
                 $nomeUltimo= $_POST['TextSobrenome'];
		 $user= $_POST['TextUsername'];
		 $password= $_POST['TextPassword'];
		 $confirmar= $_POST['TextConfirmar'];
                 
                         
		 $usuario = new Usuario();
		 $usuarioDao= new UsuarioDao();
		 		 
		 $usuario->setNome($nomePrimeiro);
		 $usuario->setSobrenome($nomeUltimo);
		 $usuario->setUser($user);
   		 $usuario->setSenha($password);   
                 
                 
                        
		    if ($password==$confirmar){			    
			   $usuarioDao->gravarDadoUsuario($usuario);
			   
	            }
                
		 //$usuarioDao->mostrarTodosUsuario();
?>
