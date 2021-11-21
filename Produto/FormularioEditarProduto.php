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
    include_once("visualizacao.php");    
    session_start () ;
    $idProduto =$_GET['var'];
    $produtoDao = new  ProdutoDao();
    $categoriaDao= new CategoriaDao();  
    $vectorProduto =$produtoDao->mostrarIdProduto($idProduto);    
    $categoriaDao->listaCategoria();
    $vectorCategoria =$categoriaDao->listaCategoria();
    $visual = new visualizacao();  
    
    $visual->imagensProduto($idProduto);
   
    echo $vectorCategoria[0];    
    $_SESSION['id'] = $idProduto;       
   ?>    
 
             
             <div id="divProduto" >
               <legend>Produtos </legend>
               <form action="EditarProdutoController.php" method="post" enctype="multipart/form-data" name="FormularioProduto">
                   <label id ="labelcategoria">Categoria <label>
                    <select name="SelectCategoria">
                     <option > Selecione a Categoria 
                     <?php 
                        $count = count($vectorCategoria);
                        for ($i = 0; $i < $count; $i++) {
                            echo "<option value=".$i.">".$vectorCategoria[$i]; 
                           }
                       ?>
                       </option>
                    </select>
                    </br>
                    <label id ="labelDescricao">Descricao Produto</label>
                    <input name="TextDescricao" type="text" value ="<?php  echo  $vectorProduto ['descricao']; ?>"  />
                    </br>
                    <label id ="labelCodigo">Codigo Produto</label>
                    <input name="Textcodigo" type="text" value= "<?php  echo  $vectorProduto ['codigo']; ?>" />
                     </br>
                    <label id="labelQuantidade">Quantidade <label>
                    <input name="TextQuantidade" type="text" value= "<?php  echo  $vectorProduto ['quantidade']; ?>" />
                    </br>
                    <label id="labelAlerta">Visivel <label>
                    <input name="visivel" type="text"  value= "<?php  echo  $vectorProduto ['visivel']; ?>" />
                     </br>
                     <label id="labelPreco">Preço<label>
                     <input name="TextPreco" type="text" value= "<?php  echo  $vectorProduto ['preco']; ?>"/>
                     </br>
                      <label id="labelImagem">Imagem Principal <label>
                       <input name="Imagem" type="file"  />
                      </br> 
                      <label id="labelImagem">Segunda Imagem  <label>
                      <input name="Imagem2" type="file" />
                      </br>
                      <label id="labelImagem">Terceira Imagem <label>
                      <input name="Imagem3" type="file" />
                      </br>
                      <label id="labelImagem">Quarta Imagem <label>
                      <input name="Imagem4" type="file"  />                     
                     </br>
                     <input name="Gravar" type="submit" value="Gravar" />
                     <input name="Cancelar" type="reset" value="Cancelar" />
                     </br>
                    
               </form>
            
            </div>
     
</body>
</html>
