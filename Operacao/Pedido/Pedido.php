<?php

      class Pedido {
            private $idPedido ;
            private $idCliente;
            private $numeroItems;
            private $estado;
            private $valorTotal;
            private $desconto;
            private $dataCriacao;
            private $dataPagamento;
             
            public function _construct ($idCliente , $estado){
                     $this->idCliente = $idCliente ;
                     $this->estado=$estado;
            }
            
            public function getIdPedido (){                 
                   return $this->idPedido ;            
            }
            public function setIdCliente($cliente){
                     $this->idCliente = $cliente;
            }
            public function getIdCliente (){
                   return  $this->idCliente;
            }
                         
            public function setNumeroItem($numero){
                     $this->numeroItems = $numero;
            }
            public function getNumeroItem (){
                   return  $this->numeroItems;
            }
            public function setEstado($estado){
                     $this -> estado = $estado;
            }
            public function getEstado(){
                   return  $this->estado;
            }
            public function setValorTotal($total){
                     $this->valorTotal = $total;
            }
            
            public function getValorTotal (){
                   return  $this->valorTotal;
            }
            public function setDesconto($desconto){
                     $this->desconto= $desconto;
            }
            public function getDesconto (){
                   return  $this->desconto;
            }
            public function setDataCriacao($data){
                     $this-> dataCriacao = $data;
            }
            public function getDataCriacao (){
                   return  $this->dataCriacao;
            }
            public function setDataPagamento($data){
                     $this->dataPagamento = $data;
            }
            public function getDataPagamento (){
                   return  $this->dataPagamento;
            }

      }



?>
