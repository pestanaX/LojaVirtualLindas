<?php
   include_once ("Produto.php");
   include_once ("ProdutoDao.php");
   include_once  ("InserirImagen.php");
   include_once ("../Categoria/CategoriaDao.php");
   include_once ("../Marca/MarcaDao.php");
	
   session_start();
   
   
   $categoriaDao= new CategoriaDao();
   $categoriaDao->listaCategoria();
   $vectorCategoria =$categoriaDao->listaCategoria();
   $marcaDao = new MarcaDao();
   $vectorMarca =$marcaDao->listaMarca();
   
   $produto = new Produto();
   $produtoDao = new ProdutoDao();
   //$idCategoria =$_POST["SelectCategoria"];
   $descricao=$_POST["TextDescricao"];
   $codigo=$_POST['Textcodigo'];
   $quantidade=$_POST["TextQuantidade"];
   $visivel=$_POST["visivel"];
   $preco =$_POST["TextPreco"];
   
   
   if(isset($_POST['SelectCategoria'])){   
      $idCategoria = $_POST['SelectCategoria'];     
   }
    if(isset($_POST['SelectMarca'])){   
       $idMarca= $_POST['SelectMarca'];     
   }	
   
    // função para inserir imagen
     $caminho="/var/www/html/loja/Produto/img";
     $comp="Imagem";
     $comp2="Imagem2";
     $comp3="Imagem3";
     $comp4="Imagem4";  
     $imagenCaminho=InserirImagen :: inserir($caminho,$comp);
     $imagenCaminho2=InserirImagen :: inserir($caminho,$comp2);
     $imagenCaminho3=InserirImagen :: inserir($caminho,$comp3);
     $imagenCaminho4=InserirImagen :: inserir($caminho,$comp4);
     $imagem1=(string) $imagenCaminho;
     $imagem2=(string) $imagenCaminho2;
     $imagem3=(string) $imagenCaminho3;
     $imagem4=(string) $imagenCaminho4; 
     $produto->setDescricao($descricao);
     $produto->setCodigo($codigo);
     $produto->setQuantidade($quantidade);
     $produto->setVisivel($visivel);
     $produto->setPreco($preco);     
     $produto->setImagen($imagem1);
     $produto->setImagen2($imagem2);
     $produto->setImagen3($imagem3); 
     $produto->setImagen4($imagem4);
     
     $produtoDao->gravarDadoProduto($produto,$vectorCategoria[$idCategoria],$vectorMarca[$idMarca]);
?>
