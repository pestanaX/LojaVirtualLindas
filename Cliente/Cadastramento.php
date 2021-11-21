<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<title>Cadastramento</title>
</head>

<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div id ="Topo">
     
</div>
<div id ="topo">
<div class="dv4">
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href ="#"><img src ="img/logo.jpg" height="75" width="100" alt ="logo"></a>
  
</nav>
</div>
<div class ="container-fluid">
  <div id ="mainSlider" class ="carousel slide" data-ride ="carousel" >
    <ol class = "carousel-indicators">
       <li data-target = "mainSlider" data-slide-to="0" class ="active" > </li>
       <li data-target = "mainSlider" data-slide-to="1" > </li>
       <li data-target = "mainSlider" data-slide-to="2" > </li>
    </ol>
     <div class="carousel-inner">
        <div class ="carousel-item active">
             <img src="img/d2.jpg" class="d-block w-100 h-80" alt="lindas">
             <div class = "carousel-caption d-none d-md-block">
                <h2>Roupas e Sapatos</h2>
                <p> Um estilo de vida</p>
             </div>
        </div>
        <div class ="carousel-item">
             <img src="img/d1.jpg" class="d-block w-100 h-80" alt="bonitas">
             <div class = "carousel-caption d-none d-md-block">
                <h2>Novidades todos os dias</h2>
             </div>
        </div>
        <div class ="carousel-item">
             <img src="img/d3.jpg" class="d-block w-100 h-80" alt="lindasbonitas">
             <div class = "carousel-caption d-none d-md-block">
                <h2>Lindas e Bonitas</h2>
             </div>
        </div>
     </div>
        <a href ="#mainSlider" class="carousel-control-prev"  role ="button" data-slide ="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true" > </span>
         <span class ="sr-only">previous</span>
        </a>
        <a href ="#mainSlider" class="carousel-control-next"  role ="button" data-slide ="next">
         <span class="carousel-control-next-icon" aria-hidden="true" > </span>
         <span class ="sr-only">next</span>
        </a>
      <div>
      </div>
       
    
       
  </div >
</div>

<div class ="container">
   <form action="FormularioCadastramento.php" method="post" enctype="multipart/form-data"  class ="row g-3" >
    
    
      <div class="col-md-6"> 
         <label for="inputEmail4" class="form-label">Primeiro Nome</label>     
         <input name="TextNome" type="text" class="form-control" placeholder="Primeiro Nome" aria-label="Primeiro Nome"/>               
     </div>
     <div class="col-md-6"> 
         <label for="inputEmail4" class="form-label">Sobrenome</label>     
         <input name="TextSobrenome" type="text" class="form-control" placeholder="Sobrenome" aria-label="Sobrenome"/>               
     </div>
     
     
     
    <div class="col-md-6">
         <label for="inputEmail4" class="form-label">Email</label>
         <input type="email"  name ="TextEmail" class="form-control" id="inputEmail4" placeholder="xxxx@xxxx.com">               
     </div>
     <div class="col-md-6">
         <label for="senha" class="form-label">Senha</label>
         <input  name="TextSenha" type="password" class="form-control" placeholder="Senha" />               
     </div>
     <div class="col-md-6">
         <label id="labelPassword">Confirmar Senha </label>
         <input  name="TextConfirmar" type="password" class="form-control" placeholder="Senha"/>               
    </div>
      <div class="col-12">
         <input id ="BotaoEntrar" name="" type="submit"  value ="Criar Conta" class="btn btn-primary"/>         
         <input id ="BotaoCancelar" name="" type="reset"  value ="Cancelar" class="btn btn-primary" />     
     
     </div>
   
    
   </form>
</div>
</div>                    
<footer class="footer mt-auto py-3 bg-light">
 <div class="text-center">
    <span class="text-muted">Todos Direitos Reservados-Artcomsoft</span>
 </div>
</footer> 
</body>
</html>
