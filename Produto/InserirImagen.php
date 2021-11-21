<?php 

    class InserirImagen {
		  
	     static function inserir($caminho,$idConponente){
			  
			  
	      $_UP['pasta'] = $caminho."/";

              $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

              $_UP['extensoes'] = array('jpg', 'png', 'gif');

              $_UP['renomeia'] = false;

              $_UP['erros'][0] = 'Não houve erro';
              $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
              $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado                 no HTML';
              $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
              $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

              if ($_FILES[$idConponente]['error'] != 0) {
                  die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES[$idConponente]['error']]);
                 exit; // Para a execução do script
               }
              // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
              // Faz a verificação da extensão do arquivo
              $extensao = strtolower(end(explode('.', $_FILES[$idConponente]['name'])));
              if (array_search($extensao, $_UP['extensoes']) ===false) {
                 echo "Por favor, envie arquivos com as seguintes extensões: jpg, png  ou gif";
                  exit;
                }
	      //echo $_FILES[$idConponente]['name'];
              // Faz a verificação do tamanho do arquivo
             if ($_UP['tamanho'] < $_FILES[$idConponente]['size']) {
                 echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
                  echo $_FILES[$idConponente]['size'];
			    exit;
              }
            // O arquivo passou em todas as verificações, hora de tentar movê-lo para a             pasta
            // Primeiro verifica se deve trocar o nome do arquivo
           // if ($_UP['renomeia'] == true) {
                // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
             //   $nome_final = md5(time()).'.jpg';
               //} else {
                // Mantém o nome original do arquivo
                  $nome_final = $_FILES[$idConponente]['name'];
               //}

               // Depois verifica se é possível mover o arquivo para a pasta escolhida
               if (move_uploaded_file($_FILES[$idConponente]['tmp_name'], $_UP['pasta'].$nome_final)) {
                  // Upload efetuado com sucesso, exibe uma mensagem e um link para o                     arquivo
                   echo "Upload efetuado com sucesso!";
                  // echo '<a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
				    
                } else {
                  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
                   echo "Não foi possível enviar o arquivo, tente novamente";
                  }                 
		      $resultado= end ($_UP['pasta']);                 
                         	    
                      return $resultado.$nome_final;	  
			   
		  }   
		
		
	} 
           

?>
