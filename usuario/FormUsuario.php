<!DOCTYPE html>
<html lang ="pt-br">
<head>
<meta charset=utf-8">
<link rel="stylesheet" href="css/formularioentrada.css">
<title>Formulario Do Administrador</title>
</head>     
	    <body>
	     <div >
		    
             <form  method="POST" action="FormularioUsuario.php" id ="formulario" name="formUsuario" >
             <h2>Adicionar Usuario </h2>
             <div id = "field"> 
             <label id="labelNomePrimeiro"> Nome</label>
             <input name="TextNome" class ="input" type=text" id ="txtNome"/>
             </div>
             <div id ="field">
             <label id="labelNomeUltimo">Sobrenome</label>
             <input name="TextSobrenome" class ="input" type="text" id ="txtNome" />
             </div>
             <div id="field">
             <label id="labelUsername">UserName </label>
             <input name="TextUsername" class="input" type="text" id ="txtNome" />
             </div>
             <div id="field">
             <label id="labelPassword">Senha</label>
             <input name="TextPassword" class="input" type="password" id ="txtNome" />
             </div>
             <div id = "field">
             <label id="labelNomePrimeiro">Confirmar Senha</label>
             <input name="TextConfirmar" class ="input" type="password" id ="txtNome"/>
             </div>
             <input name="BotaoGravar" class ="button" type="submit" value="Gravar" />
             <input name="BotaoCancelar" class ="button" type="reset" id="BotaoCancelar" value="Cancelar" />
              
             </div>		   
	 
	 </body>
</html>
