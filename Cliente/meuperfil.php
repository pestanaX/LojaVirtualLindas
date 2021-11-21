<html lang ="pt-br">
<head>
<meta charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<title>Loja </title>
</head> 

<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   <div id ="topo" >
   <h3>Meu Perfil</h3>

  </nav>
 <nav class ="nav justify-content-end">
  
     
      <ul class ="nav-item">
       <a class="nav-link active" href="EnderecoResidencia.php">Endereço</a>
                 
     </ul><!-- submenu do submenu do submenu -->
       
        <ul class ="nav-item">
               <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pedidos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="AdicionarCartao.php">Novos</a>
           <a class="dropdown-item" href="EditarCartao.php">Pagos</a>
           <a class="dropdown-item" href="EditarCartao.php">Historico</a>
         <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Devolução</a>
         
        </div>
                 
         </ul><!-- submenu do submenu do submenu -->    
           
          
      <ul class ="nav-item">
       <a class="nav-link active" href="meuperfil.php">Contatos</a>
                 
     </ul><!-- submenu do submenu do submenu -->

      <ul class ="nav-item">
       <a class="nav-link active" href="saircliente.php">Sair</a>
                 
     </ul><!-- submenu do submenu do submenu -->
                       
             
     </ul>
  </nav>


   </div>
 
   <div id ="principal" >
    <?php 
            
	 include_once("ClienteDao.php");
         session_start();
         $idCliente=$_SESSION['idCliente'];
         $clienteDao = new ClienteDao();
         
         if ($_SESSION['nome']==null){          
		  header ('Location:http://localhost:8080/index.php');
         }
         $clienteDao->mostrarDadoCliente($idCliente); 
    ?>
   

    <a href="ModificarSenhaCliente.php" id="modificar">Modificar Senha</a>
   </div>
   <div id ="baixo" >
<footer class="footer mt-auto py-3 bg-light">
 <div class="container">
    <span class="text-muted">Todos Direitos Reservados-Artcomsoft</span>
 </div>
</footer>
   </div>

</body>
</html>
