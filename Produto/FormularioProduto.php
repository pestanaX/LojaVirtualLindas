<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Produtos</title>
</head>
       
<body>
             <h1>Cadastrar Produtos</h1>
             <?php 
	      include_once("../Categoria/CategoriaDao.php");
              include_once("../Marca/MarcaDao.php");
	      session_start(); 
	      $categoriaDao= new CategoriaDao();
	      $categoriaDao->listaCategoria();	    
              $vectorCategoria =$categoriaDao->listaCategoria();
              $marcaDao = new MarcaDao();
              $vectorMarca= $marcaDao->listaMarca();
              
	      ?>
             <div id="divProduto" >
              <legend>Produtos </legend>
               <form action="ProdutoController.php" method="post" enctype="multipart/form-data" name="FormularioProduto">
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
                    <br>
                    <label id ="labelMarca">Marca <label>
                    <select name="SelectMarca">
                     <option > Selecione a Marca 
                     <?php 
                        $count = count($vectorMarca);
                        for ($i = 0; $i < $count; $i++) {
                            echo "<option value=".$i.">".$vectorMarca[$i]; 
                           }
                       ?>
                    </option>
                    </select>
                   
                    </br>
                    <label id ="labelDescricao">Descricao Produto</label>
                    <input name="TextDescricao" type="text" />
                    </br>
                    <label id ="labelCodigo">Codigo Produto</label>
                    <input name="Textcodigo" type="text" />
                     </br>
                    <label id="labelQuantidade">Quantidade <label>
                    <input name="TextQuantidade" type="text" />
                    </br>
                    <label id="labelAlerta">Visivel <label>
                    <input name="visivel" type="text" />
                     </br>
                     <label id="labelPreco">Preço<label>
                     <input name="TextPreco" type="text" />
                     </br>
                      <label id="labelImagem">Imagem Principal <label>
                      <input name="Imagem" type="file" />
                      </br> 
                      <label id="labelImagem">Segunda Imagem  <label>
                      <input name="Imagem2" type="file"/>
                      </br>
                      <label id="labelImagem">Terceira Imagem <label>
                      <input name="Imagem3" type="file"/>
                      </br>
                      <label id="labelImagem">Quarta Imagem <label>
                      <input name="Imagem4" type="file" />                     
                     </br>
                     <input name="Gravar" type="submit" value="Gravar" />
                     <input name="Cancelar" type="reset" value="Cancelar" />
                     </br>
                    
               </form>
            
            </div>
</body>
</html>
