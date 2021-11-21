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

 <div id ="perfilClientes">
    <?php     
      
      session_start();
      echo "olá ".$_SESSION['nome'];
      $id=$_SESSION['idCliente'];
      //echo $_SESSION['']; 
      if ($_SESSION['nome']==null){
		header ('Location:http://localhost:8080/php/view/index.php');
      }
    
    ?>
 </div>
<div id = "top" >
<nav class="navbar navbar-light bg-light justify-content-between">
   <a class="navbar-brand" href ="#"><img src ="img/logo.jpg" height="75" width="100" alt ="logo"></a>
  <form class="form-inline">
    <input  name="TextProcurar" class="form-control mr-sm-2" type="search" placeholder="Pesquise o produto" aria-label="Search">
    <button name="Pesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Pesquisar">Pesquise</button>
  </form>
</nav>
 <nav class ="nav justify-content-end">
       
    <ul class ="nav-item">
       <a class="nav-link active" href="AreaCliente.php">Inicio</a>
                 
     </ul><!-- submenu do submenu do submenu -->
    
    <ul class ="nav-item">
       <a class="nav-link active" href="../index.php">Home</a>
                 
     </ul><!-- submenu do submenu do submenu -->
    <ul class ="nav-item">
       <a class="nav-link active" href="meuperfil.php">Perfil</a>
                 
     </ul><!-- submenu do submenu do submenu -->
       

      
      <ul class ="nav-item">
       <a class="nav-link active" href="EnderecoResidencia.php">Endereço</a>
                 
     </ul><!-- submenu do submenu do submenu -->
       <ul class ="nav-item">
               <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cartão
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="AdicionarCartao.php">Adicionar Cartao</a>
           <a class="dropdown-item" href="EditarCartao.php">Editar Cartao</a>
         <div class="dropdown-divider"></div>
         
        </div>
                 
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
               <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categoria
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
                    $contador= count($vectorCategoria);                    
                    for ($i=0; $i<=$contador;$i++){             
                       echo '<a class="dropdown-item" href=Operacao/MenuCategoria.php?var='.$vectorCategoria[$i].'>'.$vectorCategoria[$i].'</a>';
                    } 
             ?>  
                
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#">Promoções</a>
        </div>
                 
         </ul><!-- submenu do submenu do submenu -->
      <ul class ="nav-item">
       <a class="nav-link active" href="meuperfil.php">Contatos</a>
                 
     </ul><!-- submenu do submenu do submenu -->

      <ul class ="nav-item">
       <a class="nav-link active" href="saircliente.php">Sair</a>
                 
     </ul><!-- submenu do submenu do submenu -->
           <ul class ="nav-item">
          <a  class="nav-link active"  href="Operacao/Carrinho.php"><img src="img/carrinho.png" class="img-fluid img-thumbnail"  width="40" height="25"></a>                 
        </ul><!-- submenu do submenu do submenu -->
              
             
     </ul>
  </nav>
</div>
<div class ="container-fluid">
  <div id ="mainSlider" class ="carousel slide" data-ride ="carousel" >
    <ol class = "carousel-indicators">
       <li data-target = "mainSlider" data-slide-to="0" class ="active" > </li>
       <li data-target = "mainSlider" data-slide-to="1" > </li>
       <li data-target = "mainSlider" data-slide-to="2" > </li>
    </ol>
     <div class="carousel-inner">
        <div class ="carousel-item active">
             <img src="img/d2.jpg" class="d-block w-100 h-80" alt="lindas">
             <div class = "carousel-caption d-none d-md-block">
                <h2>Lindas e Bonitas</h2>
                <p> Um estilo de vida</p>
             </div>
        </div>
        <div class ="carousel-item">
             <img src="img/d1.jpg" class="d-block w-100 h-80" alt="bonitas">
             <div class = "carousel-caption d-none d-md-block">
                <h2>Novidades todos os dias</h2>
             </div>
        </div>
        <div class ="carousel-item">
             <img src="img/d3.jpg" class="d-block w-100 h-80" alt="lindasbonitas">
             <div class = "carousel-caption d-none d-md-block">
                <h2>Sapatos e Roupas</h2>
             </div>
        </div>
     </div>
        <a href ="#mainSlider" class="carousel-control-prev"  role ="button" data-slide ="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true" > </span>
         <span class ="sr-only">previous</span>
        </a>
        <a href ="#mainSlider" class="carousel-control-next"  role ="button" data-slide ="next">
         <span class="carousel-control-next-icon" aria-hidden="true" > </span>
         <span class ="sr-only">next</span>
        </a>
      <div>
      </div>
       
    
       
  </div >
</div>
<div class ="container">
 <!-- Container principal -->
 
</div>         
 

<footer class="footer mt-auto py-3 bg-light">
 <div class="container">
    <span class="text-muted">Todos Direitos Reservados-Artcomsoft</span>
 </div>
</footer>
</body>
</html>
