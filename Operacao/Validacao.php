<?php
     class Validacao {
        
      private static function  ordenacao($vetor){                        
             $vetor =array (); 
             return sort($vetor);
             
      }
      public  static function procurarElemento($vetor ,$valor){
          
                      
            foreach($vetor as $v){                  
                  if ($v==$valor){
                     $boolean = 1;                    
                   }             
            }
            return $boolean ;
          
     }
     public static function listaProduto($veto ){
         
     }
  }
?>
