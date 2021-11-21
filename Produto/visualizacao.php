<?php
       include_once ("ProdutoDao.php");
       class visualizacao {

          public function imagemPrincipal($id){
                 
                 $produtoDao = new ProdutoDao();
                 $vectorProduto =$produtoDao->mostrarIdProduto($id);               
                 $imag = "Produto/img/".$vectorProduto['imagem_principal'];
                
                 //echo '<a href =Operacao/DetalhesProduto.php?var='.($vectorProduto['id_produto']).'>'.'<img src ="'.$imag.'" class ='."viewcurso".'>'.'</a>';
                 echo '<div class='."col-md-3".'>';
                 echo '<a href =Operacao/DetalhesProduto.php?var='.($vectorProduto['id_produto']).'>'.'<img src ="'.$imag.'" class ='."img-fluid".'>'.'</a>';               
                 echo  '<figcaption  class="p-3 mb-2 bg-primary text-white text-center">'.$vectorProduto['descricao'].'</figcaption>';                  
                 echo  '<figcaption class="p-3 mb-2 bg-primary text-white text-center"">'.$vectorProduto['preco'].'</figcaption>';
                 echo '</div>';
                 
                
          }

          public function imagemPrincipal2($id){
                 
                 $produtoDao = new ProdutoDao();
                 $vectorProduto =$produtoDao->mostrarIdProduto($id);               
                 $imag = "Produto/img/".$vectorProduto['imagem_principal'];                
                 //echo '<a href =Operacao/DetalhesProduto.php?var='.($vectorProduto['id_produto']).'>'.'<img src ="'.$imag.'" class ='."viewcurso".'>'.'</a>';
                 echo '<div class='."col-md-3".'>';
                 echo '<a href =DetalhesProduto.php?var='.($vectorProduto['id_produto']).'>'.'<img src ="'.$imag.'" class ='."img-fluid".'>'.'</a>';               
                 echo  '<figcaption  class="p-3 mb-2 bg-primary text-white text-center">'.$vectorProduto['descricao'].'</figcaption>';                  
                 echo  '<figcaption class="p-3 mb-2 bg-primary text-white text-center"">'.$vectorProduto['preco'].'</figcaption>';
                 echo '</div>';
                 
                
          }
          
          public function nomeImagem($id){
                $produtoDao = new ProdutoDao();
                $vectorProduto=$produtoDao->mostrarIdProduto($id);            
                return $vectorProduto['imagem_principal'];                   
          }
          public function imagemPrincipal1($id){
                 
                $produtoDao = new ProdutoDao();
                $vectorProduto =$produtoDao->mostrarIdProduto($id);               
                $imag = "../Produto/img/".$vectorProduto['imagem_principal'];
                echo '<div class='."col-md-3".'>';
                echo '<a href =DetalhesProduto.php?var='.($vectorProduto['id_produto']).'>'.'<img src ="'.$imag.'" class ='."img-fluid".'>'.'</a>';
                echo  '<figcaption  class="p-3 mb-2 bg-primary text-white text-center">'.$vectorProduto['descricao'].'</figcaption>';                  
                echo  '<figcaption class="p-3 mb-2 bg-primary text-white text-center"">'.$vectorProduto['preco'].'</figcaption>';
                echo '</div>';
                 
                
          }

          public  function imagensProduto($id){
                 $produtoDao = new ProdutoDao();
                 $vectorProduto =$produtoDao->mostrarIdProduto($id);               
                 $imag = "../Produto/img/".$vectorProduto['imagem_principal'];
                 $imag1 ="../Produto/img/".$vectorProduto['imagem_2'];
                 $imag2 ="../Produto/img/".$vectorProduto['imagem_3'];
                 $imag3 ="../Produto/img/".$vectorProduto['imagem_4'];
                 echo '<div class ="container-fluid">'; 
                 echo '<div id ="mainSlider" class ="carousel slide" data-ride ="carousel" >';
                 echo '<ol class = "carousel-indicators">';
                 echo '<li data-target = "mainSlider" data-slide-to="0" class ="active" > </li>';
                 echo '<li data-target = "mainSlider" data-slide-to="1" > </li>';
                 echo' <li data-target = "mainSlider" data-slide-to="2" > </li>';
                 echo' <li data-target = "mainSlider" data-slide-to="3" > </li>';
                 echo ' <li data-target = "mainSlider" data-slide-to="4" > </li>';
                 echo  '</ol>';
                 echo '<div class="carousel-inner">';                 
                 echo '<div class ="carousel-item active">';
                 echo '<img src ="'.$imag.'" class ='."d-block w-100".'>';
                 echo '<div class = "carousel-caption d-none d-md-block">';
                 echo '<h2>Lindas e Bonitas</h2>';
                 echo '<p> Um estilo de vida</p>';
                 echo '</div>';
                 echo '</div>';
                                
                 echo '<div class ="carousel-item">';
                 echo '<img src ="'.$imag1.'" class ='."d-block w-100".'>';
                 echo '<div class = "carousel-caption d-none d-md-block">';
                 echo '<h2></h2>';
                 echo '<p> </p>';
                 echo '</div>';
                 echo '</div>';                                  
                 echo '<div class ="carousel-item">';
                 echo '<img src ="'.$imag2.'" class ='."d-block w-100".'>';
                 echo '<div class = "carousel-caption d-none d-md-block">';
                 echo '<h2> </h2>';
                 echo '<p> </p>';
                 echo '</div>';
                 echo '</div>';                                
                 echo '<div class ="carousel-item">';
                 echo '<img src ="'.$imag3.'" class ='."d-block w-100".'>';
                 echo '<div class = "carousel-caption d-none d-md-block">';
                 echo '<h2></h2>';
                 echo '<p> </p>';
                 echo '</div>';
                 echo '</div>';

                echo '</div>';
                echo '<a href ="#mainSlider" class="carousel-control-prev"  role ="button" data-slide ="prev">';
                echo '<span class="carousel-control-prev-icon" aria-hidden="true" > </span>';
                echo '<span class ="sr-only">previous</span>';
                echo ' </a>';
                echo ' <a href ="#mainSlider" class="carousel-control-next"  role ="button" data-slide ="next">';
                echo ' <span class="carousel-control-next-icon" aria-hidden="true" > </span>'; 
                echo '<span class ="sr-only">next</span>';
                echo' </a>';
                echo '<div>';
                echo ' </div>';  
    
       
               echo ' </div >';
               echo '</div>';
          
          }


        }
?>

