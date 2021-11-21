<html lang ="pt-br">
<head>
<meta charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<title>Detalhes do Produto </title>
</head> 
<body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
      
     include_once("/var/www/html/loja/Categoria/CategoriaDao.php"); 
     include_once("/var/www/html/loja/Produto/ProdutoDao.php");
     include_once("/var/www/html/loja/Produto/visualizacao.php");
     session_start();
     $categoriaDao = new CategoriaDao();
     $vectorCategoria =$categoriaDao->listaCategoria();
     $_SESSION['id_produto'] = $_GET['var'];     
     //print $_SESSION ['id_produto'];            	
                       
?>
<div id ="topo">
<div class="dv4">
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href ="#"><img src ="img/logo.jpg" height="75" width="100" alt ="logo"></a>
  <form class="form-inline" method="post" action = "<?php $_SERVER['PHP_SELF'] ?>">
    <input name = "pesquisa" class="form-control mr-sm-2" type="search" placeholder="Pesquise o produto" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquise</button>
  </form>
</nav>
  <nav class ="nav justify-content-end">
    <ul class ="nav-item">
       <a class="nav-link active" href="../index.php">Home</a>
                 
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
                       echo '<a class="dropdown-item" href=MenuCategoria.php?var='.$vectorCategoria[$i].'>'.$vectorCategoria[$i].'</a>';
                    } 
             ?>  
                
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#">Promoções</a>
        </div>
                 
         </ul><!-- submenu do submenu do submenu -->
      
      <ul class ="nav-item">
          <a  class="nav-link active"  href="../Cliente/Login.php">Area do Cliente</a>                 
        </ul><!-- submenu do submenu do submenu -->
     </li>
          
             
     </ul>
  </nav>
</div>
 
                
<div class ="container">
  
  <?php
       $visual = new visualizacao();       
            $visual->imagensProduto($_GET['var']);   
       
           
   ?>   
   <div class ="row">
    <?php
       $produtoPesquisaDao = new ProdutoDao();
        $produtoDao = new ProdutoDao(); 
        $visualPesquisa = new visualizacao();
        $visual = new visualizacao();
        $linha = $produtoPesquisaDao->procurarDescricaoProduto($_POST['pesquisa']);    
        $num =count($linha);
        if (isset($_POST['pesquisa'])) {
           for ($i=0;$i<count($linha);$i++){               
               $visual->imagemPrincipal2($linha[$i]['id_produto']);  
           }           
         } else {
           
         } 
     ?>
     </div>
</div>            
<div id="divProduto" >
                    
</div>
<div>
      <form  method="POST" action = "Carrinho.php" id ="Carrinho" name="Carrinho" >
             <input name="produtoCarrinho" type="hidden"   value = "<?php  echo $_GET['var']; ?>"/>
             <input name="quantidadeProduto" type="text"   value = "<?php  echo 1 ; ?>"/>
             <input name="Carrinho" type="submit" value="Carrinho" />
      </form>
      
     
                    
        
                    
</div>
<footer class="footer mt-auto py-3 bg-light">
 <div class="text-center">
    <span class="text-muted">Todos Direitos Reservados-Artcomsoft</span>
 </div>
</footer>   
</body>
</html>
