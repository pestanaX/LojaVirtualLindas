<?php

      class ItemsProduto {
            private $itemsPedido;
            private $idPedido ;
            private $idProduto;
            private $quantidadeProduto;
            private $precoTotalProduto;
           
            public function setIdPedido($idPedido){
                  $this->idPedido=$idPedido;
            }            
            public function getIdPedido (){                 
                   return $this->idPedido ;            
            }
            public function setIdProduto($produto){
                     $this->idProduto = $produto;
            }
            public function getIdProduto (){
                   return  $this->idProduto;
            }
            public function setQuantidade($quantidade){
                     $this->quantidadeProduto = $quantidade;
            }
            public function getQuantidade (){
                   return  $this->quantidadeProduto;
            }
            public function setPrecoTotalProduto($preco){
                     $this->precoTotalProduto = $preco;
            }
            public function getPrecoTotal (){
                   return  $this->precoTotalProduto;
            }
            
                         
         }



?>
