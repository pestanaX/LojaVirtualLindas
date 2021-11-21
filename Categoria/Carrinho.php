<?php     
    
     include_once ("/home/storage/1/33/e2/lindasebonitas1/public_html/Categoria/CategoriaDao.php");
    // include_once("/home/storage/1/33/e2/lindasebonitas1/public_html/Marca/MarcaDao.php");
     include_once("/home/storage/1/33/e2/lindasebonitas1/public_html/Produto/ProdutoDao.php");
     include_once("/home/storage/1/33/e2/lindasebonitas1/public_html/Operacao/Pedido/Pedido.php");
     include_once("/home/storage/1/33/e2/lindasebonitas1/public_html/Operacao/Pedido/PedidoDao.php");
     include_once ("/home/storage/1/33/e2/lindasebonitas1/public_html/Operacao/Pedido/ItemsProduto.php");
     include_once("/home/storage/1/33/e2/lindasebonitas1/public_html/Operacao/Pedido/itemDao.php");
     
      //include_once ("/home/storage/1/33/e2/lindasebonitas1/public_html/Operacao/Pedido/classes.php");

     session_start();      
     $idCliente= $_SESSION['id_cliente'];
     //$produtoDao = new ProdutoDao();
     $categoriaDao = new CategoriaDao();
     $pedido = new Pedido();
     $pedidoDao =new PedidoDao(); 
     $items= new ItemsProduto();
     $itemDao = new itemDao();
     $vectorCategoria =$categoriaDao->listaCategoria();     
     $pedido->setIdCliente($idCliente); 
     $pedido->setEstado("novo");
      
     $idProduto =  $_SESSION['id_produto'];        
     $produtoDao = new ProdutoDao ();           
     $preco = $vectorProduto['preco'];
     $descricao =$vectorProduto['descricao']; 	
    
     //$_SESSION['carrinho']=array();
     do {         
           $_SESSION['carrinho']=array();
           $pedidoDao->gravarPedido($pedido);    
         
            
      } while (!empty($_SESSION['carrinho'])) ;
     if (!empty($_POST['produtoCarrinho']))        
        {
         $items->setQuantidade($_POST['quantidadeProduto']);
         $items->setIdPedido($pedidoDao->numeroDePedidos());
         $items->setIdProduto($idProduto);
         
         $itemDao->gravarItem($items);
         array_push($_SESSION ['carrinho'],$_POST['produtoCarrinho']); 
     }
     if (!empty ($_SESSION['carrinho'])){
        $items->setIdPedido($pedidoDao->numeroDePedidos());
        $items->setIdProduto($idProduto);
     }
     $vectorBoleto =$pedidoDao->boleto($items->getIdPedido());
     //$javaScript = "<script> write.document ()</script>" 
                    
?>  
<link rel="stylesheet" href="css/index.css">
<meta charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<title>Loja </title>
</head> 
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
     function clicar() {
        document.write(document.getElementById("remove").value) ;
     }
</script>
<div id ="topo">
<div class="dv4">
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand"></a>
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

              

<div class ="container">
 <table class="table table-striped">     
    <tr class= "table-light">
      <th>Ref</th>
      <th>Descrição</th>
      <th>Quantidade</th>
      <th>Preco</th>
      <th>Preço Total</th>
    </tr>

    
     <?php 
      // for($i = 0 ; $i < count($_SESSION['carrinho']) ; $i++) {
         /* echo '<tr>';
         echo '<td>'.$_SESSION['carrinho'][$i].'</td>';
         $vectorProduto=$produtoDao->mostrarIdProduto($_SESSION['carrinho'][$i]);
         
         echo  '<th>'.$vectorProduto ['descricao'].'</th>';
         echo  '<th>'.$vectorProduto ['preco'].'</th>';
         echo  '<th>'.$_POST['quantidadeProduto'].'</th>';
         echo  '<th>'.$_POST['quantidadeProduto']*$vectorProduto ['preco'].'</th>';
         echo '</tr>';
         }
        */ 
                  
        for($i = 0 ; $i < count($vectorBoleto) ; $i++) {

            echo '<tr>';         
            echo  '<th>'.$vectorBoleto[$i]['id_produto'].'</th>';
            echo  '<th>'.$vectorBoleto [$i]['descricao'].'</th>';
            echo  '<th>'.$vectorBoleto [$i]['quantidade'].'</th>';
            echo  '<th>'.$vectorBoleto[$i]['preco'].'</th>';
            echo  '<th>'.$vectorBoleto[$i]['preco_total'].'</th>';
            //echo  '<th> <button  id ="remove"  onclick="clicar()" value ='.$vectorBoleto[$i]['id_tems_produto'].'>'.remover.'</button> </th>';                
            
           
               
       
     }
       echo '<script>' ;       
       // echo  'var r = document.getElementById("remove").value';       
       //echo 'document.write(r)';
       echo '</script>';      
     
      //print Validacao::procurarElemento($_SESSION['carrinho'],4);
    ?>
    
</table>    
 
</div>            
<div class="container" >
  <div>     
      
     <form class="form-inline" method="post" action = "Finalizar.php">
    
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Finalizar Compra</button>
  </form>
                    
        
                    
</div>                  
</div>
<div>
</div><footer class="footer mt-auto py-3 bg-light">
 <div class="text-center">
    <span class="text-muted">Todos Direitos Reservados-Artcomsoft</span>
 </div>
</footer>  
          
                    
</div>
     
</body>
</html>
