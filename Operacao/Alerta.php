<?php 
   class Alerta {
           
        public static function mensagensSimples($mensagens){
               echo '<div class="alert alert-warning d-flex align-items-center" role="alert">';
               echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-  triangle-fill"/></svg>' ; 
            echo ' <div>'.$mensagens. '</div>';
                
          echo '</div>' ;
        }
        public static function mensagensLink  ($mensagens , $link){
        }
       
   }   

?>
