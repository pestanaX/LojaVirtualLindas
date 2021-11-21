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
      
     //include_once("/var/www/html/loja/Categoria/CategoriaDao.php"); 
     //include_once("/var/www/html/loja/Produto/ProdutoDao.php");
     //include_once("/var/www/html/loja/Produto/visualizacao.php");
     include_once("/home/storage/1/33/e2/lindasebonitas1/public_html/Categoria/CategoriaDao.php");
     // include_once("/home/storage/1/33/e2/lindasebonitas1/public_html/Marca/MarcaDao.php");
     include_once("/home/storage/1/33/e2/lindasebonitas1/public_html/Produto/ProdutoDao.php");
     include_once("/home/storage/1/33/e2/lindasebonitas1/public_html/Produto/visualizacao.php");
     session_start();
     $categoriaDao = new CategoriaDao();
     $vectorCategoria =$categoriaDao->listaCategoria();
     $_SESSION['id_produto'] = $_GET['var'];
     if ($_SESSION['nome']==null){
		$clienteLogin ="../Cliente/Login.php";
                
      } else {
               $clienteLogin ="../Cliente/AreaCliente.php";
      }            
     //print $_SESSION ['id_produto'];            	
                       
?>
<div id ="topo">
<div class="container">
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href ="#"><img src ="img/logo.jpg" height="75" width="100" alt ="logo"></a>
  <form class="form-inline"  method="post" action = "<?php $_SERVER['PHP_SELF'] ?>">
    <input name = "pesquisa" class="form-control mr-sm-2" type="search" placeholder="Pesquise o produto" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquise</button>
  </form>
</nav>
 <!-- <nav class ="nav justify-content-end"> -->


<nav class="navbar navbar-light bg-light justify-content-between ">
<a class ="navbar-brand"><a>
    <div  class="container">   
   
      <button  class = "navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent">          
         <span class="navbar-toggler-icon"> </span>
      </button>
  <div  class="collapse navbar-collapse" id="navbarSupportedContent">
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
               <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Marcas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
                    $contador= count($vectorMarca);                    
                    for ($i=0; $i<=$contador;$i++){             
                       echo '<a class="dropdown-item" href=MenuMarca.php?var='.$vectorMarca[$i].'>'.$vectorMarca[$i].'</a>';
                    } 
             ?>  
                
         
        </div>
                 
         </ul><!-- submenu do submenu do submenu -->
      
      <ul class ="nav-item">
          <?php
            echo '<a  class="nav-link active"  href='.$clienteLogin.'>'. "Area do Cliente".'</a>';
           ?>                           
        </ul><!-- submenu do submenu do submenu -->

     </li>
      <ul class ="nav-item">
          <a  class="nav-link active"  href="Operacao/Carrinho.php"><img src="img/carrinho.png" class=" img-thumbnail"  width="40" height="25"></a>                 
        </ul><!-- submenu do submenu do submenu -->

     </li>
        
             
     </ul>
    </div>
     </div>
  </nav>
  
</div>
<br>
                
<div class ="container">
  
  <?php
       $visual = new visualizacao();       
            $visual->imagensProduto($_GET['var']);   
       
           
   ?>   
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
         $produtoV =$produtoDao->mostrarIdProdutoCarrinho($_GET['var']); 
         //echo  "Descricao do Produto :" ,produtoV[0]['descricao'];
        
         //echo "Preço do Produto :",$produtoV[0]['preco'];
         echo '<div class="container">';               
               echo  '<figcaption  class="p-3 mb-2 bg-primary text-white text-center">'.'Descricao :'.$produtoV[0]['descricao'].'</figcaption>';                  
               echo  '<figcaption class="p-3 mb-2 bg-primary text-white text-center"">'.'Preço R$ :'.$produtoV[0]['preco'].'</figcaption>';
        echo '</div>';
    ?>
     
</div>            

<div class = "container">
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
