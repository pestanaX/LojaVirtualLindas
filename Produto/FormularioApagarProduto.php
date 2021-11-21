<html lang ="pt-br">
<head>
<meta charset=utf-8">
<link rel="stylesheet" href="css/formularioentrada.css">
<title>Alterar Produto</title>
</head> 
 <body>
<div id ="topo">

</div>
<div id ="Principal">
  <?php
    include_once ("ProdutoDao.php");
    include_once("../Categoria/CategoriaDao.php");   
    session_start () ;
    $idProduto =$_GET['var'];
    $produtoDao = new  ProdutoDao();
    $categoriaDao= new CategoriaDao();  
    $vectorProduto =$produtoDao->mostrarIdProduto($idProduto);    
    $categoriaDao->listaCategoria();
    $vectorCategoria =$categoriaDao->listaCategoria();
    echo "Categoria do Produto :", $vectorCategoria[0];    
    $_SESSION['id'] = $idProduto;       
    ?>    
 
             
             <div id="divProduto" >
               <legend>Produto </legend>
               <form action="ApagarProdutoController.php" method="post" enctype="multipart/form-data" name="FormularioProduto">
                    </br>
                    <label id ="labelDescricao">Descricao Produto</label>
                    <input name="TextDescricao" type="text" value ="<?php  echo  $vectorProduto ['descricao']; ?>" readonly />
                    </br>
                    <label id ="labelCodigo">Codigo Produto</label>
                    <input name="Textcodigo" type="text" value= "<?php  echo  $vectorProduto ['codigo']; ?>" readonly />
                     </br>
                    <label id="labelQuantidade">Quantidade <label>
                    <input name="TextQuantidade" type="text" value= "<?php  echo  $vectorProduto ['quantidade']; ?>" readonly />
                    </br>
                    <label id="labelAlerta">Visivel <label>
                    <input name="visivel" type="text"  value= "<?php  echo  $vectorProduto ['visivel']; ?>"  readonly/>
                     </br>
                     <label id="labelPreco">Preço<label>
                     <input name="TextPreco" type="text" value= "<?php  echo  $vectorProduto ['preco']; ?>" readonly />
                     
               </form>
            
            </div>
     
</body>
</html>
