<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../../../favicon.ico">
<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
<link href="signin.css" rel="stylesheet">

<title>Login</title>
</head>

<body>
<div>
</div>
<div id ="topo">
<div class="dv4">
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href ="#"><img src ="img/logo.jpg" height="75" width="100" alt ="logo"></a>
  
</nav>
</div>

<div  class="text-center">

   <div class="container">
   <form  class ="form-signin" action="FormularioAutenticarCliente.php" method="post" enctype="multipart/form-data" >
    <img class="mb-4" src="images.png" alt="" width="72" height="72">
     <h1 class="h3 mb-3 font-weight-normal">Login</h1>
     
         <label for="labelEmail" class="sr-only" >Email </label>
         <input id ="inputEmail" name="TextEmail" type="email" class ="form-control" placeholder ="Seu email" required autofocus />           
     
     
         <label for="labelPassword" class="sr-only">Senha </label>
         <input id ="TextSenha" name="TextSenha" type="password" class ="form-control" placeholder ="Senha" required   />               
     
      
         <input id ="BotaoEntrar" name="" type="submit"  value ="Login" class="btn btn-outline-success my-2 my-sm-0" />         
        
     
     
   </form>
    <a href="Cadastramento.php">Registre-se</a>
   </div >
 <footer class="footer mt-auto py-3 bg-light">
 <div class="container">
    <span class="text-muted">Todos Direitos Reservados-Artcomsoft</span>
 </div>
</footer>
</div>  
</body>
</html>
