<?php 
     
	 
	 include_once("ClassConstante.php");
     include_once (ClassConstante::$PATH_PRODUTO);
	 include_once("CategoriaDao.php");
	 include_once("ConexaoBanco.php");
    // include("CategoriaDao.php");
	
	class ProdutoDao {
		   
		  public function __construct (){
			 date_default_timezone_set('America/Sao_Paulo');
			 	    
		  }
		
		  
		  public function gravarDadoProduto(Produto $produto,$categoria) {
			         // comando para procurar categoria idCategoria
			         $categoriaDao =new CategoriaDao();
					 $procurarCategoria=$categoriaDao->mostrarId($categoria);
			          
				   try {
					   
					  $produto->setIDCategoria($procurarCategoria);
                      $idCategoria=$produto->getIDCategoria();					  
					  $descricao = $produto->getDescricao();
	                  $quantidade =$produto->getQuantidade();
                      $alerta=$produto->getQuantidadeAlerta();
                      $preco=$produto->getPreco();
					  $palavra=$produto->getPalavraChave();
					  $criador =$produto->getCriador();
					  $imagem = $produto->getImagem();					  
   					  $codigo =$produto->getCodigo();
					  $date = date('Y-m-d H:i:s');
					  
					  if ($idCategoria<>0){
						   
					     $conn =new conexaoBanco();  
					     $ligar =$conn->conexao();
					     $stmt=$ligar->prepare("insert into tb_produtos(id_categoria,descricao,quantidade,quantidade_alerta,preco,palavra_chave,data_criacao,criado_por,imagem,codigo) values (?,?,?,?,?,?,?,?,?,?)");
					     $stmt->bindParam(1, $idCategoria);
					     $stmt->bindParam(2, $descricao);
					     $stmt->bindParam(3, $quantidade);
					     $stmt->bindParam(4, $alerta);
					     $stmt->bindParam(5, $preco);
					     $stmt->bindParam(6, $palavra);
					     $stmt->bindParam(7, $date,PDO::PARAM_STR);
					     $stmt->bindParam(8, $criador);
					     $stmt->bindParam(9, $imagem);
						 $stmt->bindParam(10, $codigo);
					     $stmt->execute();	
						 
					  } else {
						  
						   echo "Categorio nao encontrado" ;
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
	                //$quantidade =$produto->getQuantidade();
                    $alerta=$produto->getQuantidadeAlerta();
                    $preco=$produto->getPreco();
		   		    $palavra=$produto->getPalavraChave();
					$alterador =$produto->getAlteracao();
				    $imagem = $produto->getImagem();
                    $codigo=$produto->getCodigo();					
					$date = date('Y-m-d H:i:s');
					$conn =new conexaoBanco();  
				    $ligar =$conn->conexao();
				    $stmt=$ligar->prepare("update  tb_produtos set  id_categoria=:id_categoria , 
					descricao=:descricao,quantidade_alerta=:quantidade_alerta,preco=:preco,palavra_chave=:palavra_chave,data_alteracao=:data_alteracao ,alterado_por=:alterado_por,imagem=:imagem,codigo=:codigo where id_produto= $id");
				    $stmt->bindParam(":id_categoria", $idCategoria);
					$stmt->bindParam(":descricao", $descricao);
					//$stmt->bindParam(":quantidade", $quantidade);
					$stmt->bindParam(":quantidade_alerta", $alerta);
					$stmt->bindParam(":preco", $preco);
					$stmt->bindParam(":palavra_chave", $palavra);
					$stmt->bindParam(":data_alteracao",$date,PDO::PARAM_STR);
					$stmt->bindParam(":alterado_por",$usuario);
					$stmt->bindParam(":imagem", $imagem);
					$stmt->bindParam(":codigo", $codigo);
				    $stmt->execute();					
			   
			   } catch (Exception $ex ){
		        	echo $ex;
     	    	} 				  
			  
		  }
		  
		  public function procurarDescricaoProduto($produtoDescricao){
			   
 			        $conn =new conexaoBanco();  
					$ligar =$conn->conexao();
			        $stmt =$ligar->prepare("select id_produto,descricao,preco,imagem from tb_produtos where descricao like '%".$produtoDescricao."%'");
					$stmt->execute();					 
					$linha=$stmt->fetchAll(PDO::FETCH_COLUMN, 0);
					return  $linha;				
		            
		  }
		  
		  
			public function mostrarLinhaProduto($produtoDescricao){
			         
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select codigo,descricao,quantidade,preco from tb_produtos where descricao= '".$produtoDescricao."'");
					 $stmt->execute();					
					 $linha=$stmt->fetch(); 
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
		  public function mostrarLinhaProdutoId($iDProduto){
			         
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select id_produto,descricao ,preco ,imagem from tb_produtos where id_produto= $iDProduto");
					 $stmt->execute();					
					 $linha=$stmt->fetch(); 
					 return $linha;
			  
		  }
		  public function mostrarLinhaProdutoCodigoTodos($produtoCodigo){
			         
					 $conn =new conexaoBanco();  
					 $ligar =$conn->conexao();
			         $stmt =$ligar->prepare("select * from tb_produtos where codigo= '".$produtoCodigo."'");
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
		  public function mostrarIdProduto ($produtoDescricao){
			         
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
			         $stmt =$ligar->prepare("select codigo,descricao,quantidade,preco from tb_produtos");
					 $stmt->execute();					 
					 $linha=$stmt->fetchAll();					      				  					 	  
					 echo "Listagens de Produtos" ;
                     echo 	'</br>';				 
					 for ($lin=0;$lin<count($linha);$lin++){
						 echo '</br>';
				         echo '<table width="200" border="0">';		 
						 echo '<tr>';
						 for ($col=0;$col<4;$col++){	
                             echo "|   "	;					 
							 print($linha[$lin][$col]);							  				 
							// echo "|  " ;
							  }
					    echo '<tr>';
                        echo '</table>';						
						echo '</br>'; 
					 }
			 
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
			         $stmt =$ligar->prepare("select * from tb_produtos");
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
            public function verProdutoGrelha($descricaoProduto,$numeroGrelha){
				  
			         $vector=$this->verProduto($descricaoProduto);
					 $tamanhoVector=count($vector);
					  
			
			}	
	}
 


?>