<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/estilo.css">
<title>Painel Principal</title>
</head>

<body>

<h1>Painel Principal</h1>
<?php 
      session_start();
      
      echo "olá  ".$_SESSION['nome'];
      $username=$_SESSION['username'];
      if ($username==null){
          header ('Location:http://localhost:8080/loja/usuario/LoginAdiministrador.html');
      }
?>
<div class="dv4" id="dv4">
  <nav id ="MenuPrincipal">
    <ul>
    <li><a href=#>Meu Perfil</a>
      <ul class="sub-menu">
              
              <li><a href="AlterarSenha.php">Alterar Senha</a></li>                                 
                 
         </ul><!-- submenu do submenu do submenu -->
      </li>
    
    <li><a href=#>Usuario</a>
          <ul class="sub-menu">
               <li><a href="FormUsuario.php">Adicionar Usuario</a></li>
                   <li><a href="EditarCategoria.php">Apagar Usuario</a></li>
                   <li><a href="MostrarUsuario.php">Mostrar Usuario</a></li>
                   
                 
         </ul><!-- submenu do submenu do submenu -->
      </li>
      
      <li><a href=#>Categoria Produto</a>
          <ul class="sub-menu">
                   <li><a href="../Categoria/FormularioCategoria.php">Registra Categoria</a></li>
                   <li><a href="../Categoria/CategoriaEditarController.php">Alterar Categoria</a></li>
                   <li><a href="../Categoria/ApagarCategoriaController.php">Apagar Categoria</a></li>                   
                 
         </ul><!-- submenu do submenu do submenu -->
      </li>
      <li><a href=#>Marca Produto</a>
          <ul class="sub-menu">
                   <li><a href="../Marca/FormularioMarca.php">Registra Marca</a></li>
                   <li><a href="../Marca/MarcaEditarController.php">Alterar Marca</a></li>
                   <li><a href="../Marca/ApagarMarcaController.php">Apagar Marca</a></li>                   
                 
         </ul><!-- submenu do submenu do submenu -->
      </li>
      
      <li><a href=#>Produtos</a>
       <ul class="sub-menu">
                   <li><a href="../Produto/FormularioProduto.php">Registra Produto</a></li>
                   <li><a href="../Produto/ListaProduto.php">Alterar Produto </a></li>
                   <li><a href="../Produto/ListaProduto2.php">Apagar Produto</a></li>
                   
                 
         </ul><!-- submenu do submenu do submenu -->
      </li>
      <li><a href=#>Lista Clientes</a>
       <ul class="sub-menu">
                   <li><a href="../Cliente/ListaClientes.php">Lista Clientes</a></li>
                   
                 
         </ul><!-- submenu do submenu do submenu -->
      </li>       
     </ul>
  </nav>
</div>
</body>
</html>
