<?php 
     
	 
	//include_once("../conexao/ConexaoBanco.php");
        include_once ("Produto.php");
	//include_once("../Categoria/CategoriaDao.php");
        include_once("../Marca/MarcaDao.php");
	
    
	
	class ProdutoDao {
		   
		  public function __construct (){
			 date_default_timezone_set('America/Sao_Paulo');
			 	    
		  }
		
		  
		  public function gravarDadoProduto(Produto $produto,$categoria ,$marca) {
			         // comando para procurar categoria idCategoria
			          $categoriaDao =new CategoriaDao();
                                  $marcaDao = new MarcaDao();
		                  $procurarCategoria=$categoriaDao->mostrarId($categoria);
                                  $procurarMarca = $marcaDao->mostrarId($marca);
			           print "teste";          
				   try {
					   
				      $produto->setIDCategoria($procurarCategoria);
                                      $produto->setIDMarca($procurarMarca);

                                      $idCategoria=$produto->getIDCategoria();
                                      $idMarca = $produto->getIDMarca();					  
				      $descricao = $produto->getDescricao();
                                      $codigo= $produto->getCodigo();
	                              $quantidade =$produto->getQuantidade();
                                      $alerta=$produto->getVisivel();
                                      $preco=$produto->getPreco();
				      $imagem = $produto->getImagem();
                                      $imagem2 = $produto->getImagem2();
                                      $imagem3 = $produto->getImagem3();
                                      $imagem4 = $produto->getImagem4();					  
   				      
				      
					  
					  if ($idCategoria<>0){
						   
					     $conn =new conexaoBanco();  
					     $ligar =$conn->conexao();
					     $stmt=$ligar->prepare("insert into tb_produto(id_categoria,id_marca,descricao,codigo,quantidade,visivel,preco,imagem_principal,imagem_2,imagem_3,imagem_4) values (?,?,?,?,?,?,?,?,?,?,?)");
					     $stmt->bindParam(1, $idCategoria);
                                             $stmt->bindParam(2, $idMarca);
					     $stmt->bindParam(3, $descricao);
					     $stmt->bindParam(4, $codigo);
					     $stmt->bindParam(5, $quantidade);
					     $stmt->bindParam(6, $visivel);
					     $stmt->bindParam(7, $preco);
					     $stmt->bindParam(8, $imagem);
					     $stmt->bindParam(9, $imagem2);
					     $stmt->bindParam(10, $imagem3);
					     $stmt->bindParam(11, $imagem4);
					     $stmt->execute();	
						 
					  } else {
						  
						   echo "Categoria nao encontrado" ;
					  }
					} catch (Exception $ex ){
						echo $ex.getMessage();
					} 				  
			  
		  }
                      public function actualizarDadoProduto(Produto $produto ,$id, $categoria){
                            
                             $categoriaDao =new CategoriaDao();
			     $procurarCategoria=$categoriaDao->mostrarId($categoria);
			   try {
				    
				$produto->setIDCategoria($procurarCategoria);
                                $idCategoria=$produto->getIDCategoria();					  
				$descricao = $produto->getDescricao();
	                        $quantidade =$produto->getQuantidade();                                
                                $preco= $produto->getPreco();		   		
                                $codigo= $produto->getCodigo();
                                $imagem1= $produto->getImagem();
                                $imagem2= $produto->getImagem2();
                                $imagem3= $produto->getImagem3();
                                $imagem4= $produto->getImagem4();		
				$conn =new conexaoBanco();  
				$ligar =$conn->conexao();
                                $stmt=$ligar->prepare("update tb_produto set  id_categoria=:id_categoria,					descricao=:descricao,quantidade=:quantidade,visivel=:visivel,codigo=:codigo,preco=:preco,imagem_principal=:imagem_principal,imagem_2=:imagem_2,imagem_3=:imagem_3 ,imagem_4=:imagem_4  where id_produto= '".$id."'");   
                                			
				$stmt->bindParam(":id_categoria",$idCategoria);
				$stmt->bindParam(":descricao",$descricao);
				$stmt->bindParam(":quantidade",$quantidade);
                                $stmt->bindParam(":visivel",$visivel);
				$stmt->bindParam(":codigo",$codigo);
				$stmt->bindParam(":preco",$preco);
				$stmt->bindParam(":imagem_principal",$imagem1);
				$stmt->bindParam(":imagem_2",$imagem2);
				$stmt->bindParam(":imagem_3",$imagem3);
				$stmt->bindParam(":imagem_4", $imagem4);				
				$stmt->execute();					
			   
			   } catch (Exception $ex ){
		        	echo $ex;
     	    	           } 				  
			  
			   
			    
		   }
                   
                    
                        
		      public function procurarDescricaoProduto($produtoDescricao){
			   
 			        $conn =new conexaoBanco();  
				$ligar =$conn->conexao();
			        $stmt =$ligar->prepare("select id_produto,descricao,preco,imagem_principal from tb_produto where descricao like '%".$produtoDescricao."%'");
				$stmt->execute();					 
				//$stmt->fetchAll(PDO::FETCH_COLUMN, 0);
                                $linha =$stmt->fetchAll();
				return  $linha;				
		            
		  }
		  
		  
			public function mostrarLinhaProduto($produtoDescricao){
			         
				 $conn =new conexaoBanco();  
				 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select descricao,codigo,quantidade,preco from tb_produto where descricao= '".$produtoDescricao."'");
				 $stmt->execute();					
				 $linha=$stmt->fetchAll(); 
				 return $linha;
			  
		  }
		  public function mostrarLinhaProdutoCodigo2($produtoCodigo){
			         
				 $conn =new conexaoBanco();  
				 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select codigo,descricao ,quantidade,preco from tb_produtos where codigo= '".$produtoCodigo."'");
				 $stmt->execute();					
			         $linha=$stmt->fetch(); 
				 return $linha;
			  
		  }
		  public function mostrarIdProduto($idProduto){
			         
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			                 $stmt =$ligar->prepare("select id_produto,descricao,codigo,quantidade,visivel,preco,imagem_principal,imagem_2,imagem_3,imagem_4 from tb_produto where id_produto='".$idProduto."'");
					 $stmt->execute();					
					 $linha=$stmt->fetch(); 
					 return $linha;
			  
		  }
                  public function mostrarIdProdutoCarrinho($idProduto){
			         
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			                 $stmt =$ligar->prepare("select descricao,codigo,preco from tb_produto where id_produto='".$idProduto."'");
					 $stmt->execute();					
					 $linha=$stmt->fetchAll(); 
					 return $linha;
			  
		  }

		  public function mostrarLinhaProdutoCodigoTodos($produtoCodigo){
			         
				 $conn =new conexaoBanco();  
				 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select * from tb_produto where codigo= '".$produtoCodigo."'");
				 $stmt->execute();					
				 $linha=$stmt->fetch(); 
				 return $linha;
			  
		  }
		  public function verLinhaDescricao($produtoDescricao){
			     $vector =$this->mostrarLinhaProduto($produtoDescricao);
			     try { 
				  for ($cont = 0 ;$cont<count($vector);$cont++){
					    echo " ",$vector[$cont]," ";
					  '</br>';
				  }
				 } catch (Exception $ex){
					 
				 }
		  }
		  public function verLinhaCodigo($produtoCodigo){
			      $vector =$this->mostrarLinhaProdutoCodigo2($produtoCodigo);
				  try {
			        for ($cont= 0;$cont<count($vector);$cont++){
			             echo $vector[$cont];
					  '</br>';
				   }
				  }catch (Exception $ex){
					  
				  }
	          }
		  public function mostrarLinhaProdutoCodigo($codigo){
			         
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			                 $stmt =$ligar->prepare("select * from tb_produtos where codigo= '".$codigo."'");
					 $stmt->execute();					
					 $linha=$stmt->fetch(); 
					 echo $linha [0];
					 return $linha;
			  
		  }
		  public function mostrarDesProduto ($produtoDescricao){
			         
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			                 $stmt =$ligar->prepare("select * from tb_produtos where descricao= '".$produtoDescricao."'");
					 $stmt->execute();					
					 $linha=$stmt->fetch(); 
					 return $linha[0];
			  
		  }
		 public function mostrarCodigoProduto($codigo){
			 
			               $conn =new conexaoBanco();  
				       $ligar =$conn->conexao();
			               $stmt =$ligar->prepare("select * from tb_produtos where codigo= '".$codigo."'");
				       $stmt->execute();					
				       $linha=$stmt->fetch(); 
				       return $linha[12];
		 }
		 public function mostrarTodosProdutos(){
			 
 			        $conn =new conexaoBanco();  
				$ligar =$conn->conexao();
			        $stmt =$ligar->prepare("select id_produto,descricao,codigo,quantidade ,preco, imagem_principal,imagem_2,imagem_3, imagem_4  from tb_produto");
				$stmt->execute();					 
				$linha=$stmt->fetchAll();				      				  					 	                          
				echo "Listagens de Produto" ;
                                echo '<table border='."1px".'cellpadding='."5px". 'cellspacing='."0".'id='."alter".'>';	 
				     
                                     echo  '<tr bgcolor ='."#ffc".'>';
                                            echo '<th> Produto de identificao</th>';  
                                            echo '<th> Descricao</th>'; 
                                            echo '<th> Codigo</th>';
                                            echo '<th> Quantidade</th>';
                                            echo '<th> Preço "BRL"</th>';  
                                            echo '<th> Imagem Principal</th>';
                                            echo '<th> Segundo Imagem</th>';
                                            echo '<th> Terceiro Imagem</th>';
                                            echo '<th> Quarta Imagem</th>';  
                                            //echo '<td> numero de identificao</td>';        
                                     echo '</tr>'; 	
 				  				 
				for ($lin=0;$lin<count($linha);$lin++){
				     echo '<tr bgcolor ='."#eee".'>';
				     for ($col=0;$col<=8;$col++){	
                                         						 
				       //echo '<a href ='.($linha[$lin][$col]).'>'.($linha[$lin][$col]).'</a>';
                                         echo '<th> <a href =FormularioEditarProduto.php?var='.$linha[$lin][$col].'>'.$linha[$lin][$col].'</a></th>';
							  				 
							
					 }
					 echo '<tr>';
                                     					
				 
					 }
                                 echo '</table>';
		 }
                 public function mostrarTodosProdutos2(){
			 
 			         $conn =new conexaoBanco();  
				$ligar =$conn->conexao();
			        $stmt =$ligar->prepare("select id_produto,descricao,codigo,quantidade ,preco, imagem_principal,imagem_2,imagem_3, imagem_4  from tb_produto");
				$stmt->execute();					 
				$linha=$stmt->fetchAll();				      				  					 	                          
				echo "Listagens de Produto" ;
                                echo '<table border='."1px".'cellpadding='."5px". 'cellspacing='."0".'id='."alter".'>';	 
				     
                                     echo  '<tr bgcolor ='."#ffc".'>';
                                            echo '<th> Produto de identificao</th>';  
                                            echo '<th> Descricao</th>'; 
                                            echo '<th> Codigo</th>';
                                            echo '<th> Quantidade</th>';
                                            echo '<th> Preço "BRL"</th>';  
                                            echo '<th> Imagem Principal</th>';
                                            echo '<th> Segundo Imagem</th>';
                                            echo '<th> Terceiro Imagem</th>';
                                            echo '<th> Quarta Imagem</th>';  
                                            //echo '<td> numero de identificao</td>';        
                                     echo '</tr>'; 	
 				  				 
				for ($lin=0;$lin<count($linha);$lin++){
				     echo '<tr bgcolor ='."#eee".'>';
				     for ($col=0;$col<=8;$col++){	
                                         						 
				       //echo '<a href ='.($linha[$lin][$col]).'>'.($linha[$lin][$col]).'</a>';
                                         echo '<th> <a href =FormularioApagarProduto.php?var='.$linha[$lin][$col].'>'.$linha[$lin][$col].'</a></th>';
							  				 
							
					 }
					 echo '<tr>';
                                     					
				 
					 }
                                 echo '</table>';
		 }
		 
		 // este metodos para adicionar produtos
		 public function adicionarProdutoQuantidade ($quantidade,$codigo){
	       		     
					 $vector=$this->mostrarLinhaProdutoCodigo($codigo);
					 echo $vector['codigo'];
					 if ($vector['codigo']<>Null){
					     $quantidadeNova =$vector['quantidade']+$quantidade;
					     $date = date('Y-m-d H:i:s');
					     $conn =new conexaoBanco();  
				             $ligar =$conn->conexao();
				         $stmt=$ligar->prepare("update  tb_produtos set quantidade=:quantidade,data_alteracao=:data_alteracao ,alterado_por=:alterado_por where codigo= $codigo");
				         $stmt->bindParam(":quantidade", $quantidadeNova);
					     $stmt->bindParam(":data_alteracao",$date,PDO::PARAM_STR);
					     $stmt->bindParam(":alterado_por",$usuario);
				         $stmt->execute();						 
					 }else {
						 echo "Codigo nao existem";
					 }
		            
    		}
		 // este metodos para subtrai produtos
		 public function subtraiProdutoQuantidade ($quantidade,$codigo){
	     
            		 
					 $vector=$this->mostrarLinhaProdutoCodigo($codigo);					  
					 if ($vector['codigo']<>Null){
						 if(($vector['quantidade']==$quantidade)|$vector['quantidade']>$quantidade){ 
						    $quantidadeNova =$vector['quantidade']-$quantidade;
						    $date = date('Y-m-d H:i:s');
					        $conn =new conexaoBanco();  
				            $ligar =$conn->conexao();
				            $stmt=$ligar->prepare("update  tb_produtos set quantidade=:quantidade,data_alteracao=:data_alteracao ,alterado_por=:alterado_por where codigo= $codigo");
				            $stmt->bindParam(":quantidade", $quantidadeNova);
					        $stmt->bindParam(":data_alteracao",$date,PDO::PARAM_STR);
					        $stmt->bindParam(":alterado_por",$usuario);
				            $stmt->execute();						
                         }else {
							  echo "Quantidade invalida";
						 }					 
					 }else {
						 echo "Codigo nao existem";
					 }
		            
    		}
			public function numeroDeProdutos (){
				
			         $conn =new conexaoBanco();  
				 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select * from tb_produto");
				 $stmt->execute();					
				 $numeroElemento=$stmt->rowCount();
				return $numeroElemento;
			}
			public function numeroDeProdutosDescricao ($descricaoProduto){
				
			         $conn =new conexaoBanco();  
				 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select codigo,descricao ,preco imagem from tb_produtos where descricao like '%".$descricaoProduto."%'");
				 $stmt->execute();					
				 $numeroElemento=$stmt->rowCount();
			         return $numeroElemento;
			}
			
			public function verProduto($descricaoProduto){
				    
    				 $conn =new conexaoBanco(); 
				 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select codigo,descricao ,preco imagem from tb_produtos where descricao like '%".$descricaoProduto."%'");
			         $stmt->execute();	 
				  return $stmt->fetchAll();
			}
            
   
	    public function pegarProdutoIdCategoria($id){
                            $conn =new conexaoBanco(); 
			    $ligar =$conn->conexao();
			    $stmt =$ligar->prepare("select id_produto from tb_produto where id_categoria = '".$id."'");
			    $stmt->execute();	 
			    return $stmt->fetchAll(); 
            
              }
	   public function pegarProdutoIdMarca($id){
                            $conn =new conexaoBanco(); 
			    $ligar =$conn->conexao();
			    $stmt =$ligar->prepare("select id_produto from tb_produto where id_marca = '".$id."'");
			    $stmt->execute();	 
			    return $stmt->fetchAll(); 
            
              }
            public function grelhaProduto(){
                       $retorno = 0 ;
                       //$numero =null ;
                       $numero = numeroDeProdutos();
                      // if(numeroDeProdutos() > 10) {
                          //$retorno = intdiv(numeroDeProdutos(),10);
                        // }else {
                          //$retorno = 1;
                       // }
                       return $numero;
                       //return $retorno;
            }
            public function todosProduto(){
                            $conn =new conexaoBanco(); 
			    $ligar =$conn->conexao();
			    $stmt =$ligar->prepare("select id_produto from tb_produto");
			    $stmt->execute();	 
			    return $stmt->fetchAll(); 
            
              }
           public function mostraXXX($tamanho,$inicio){
                       
                            $conn =new conexaoBanco(); 
			    $ligar =$conn->conexao();
			    $stmt =$ligar->prepare("select id_produto from tb_produto order by id_produto limit ".$tamanho." offset ".$inicio."");
                            $stmt->execute();	 
			    return $stmt->fetchAll(); 
            	   	   
                    
              	}
                    
              	}
 


?>
