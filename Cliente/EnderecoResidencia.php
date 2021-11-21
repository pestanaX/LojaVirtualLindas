<html lang ="pt-br">
<head>
<meta charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<title>Loja </title>
</head> 

<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div id ="topo">
</div>
<div id ="Principal">
<?php
    
   
      include_once("ClienteDao.php");
      session_start();
      $idCliente=$_SESSION['idCliente'];
      $clienteDao = new ClienteDao();	  
      if ($_SESSION['nome']==null){          
	 header ('Location:http://localhost:8080/index.php');
      }        
      $endereco=$clienteDao->procurarEndereco($idCliente);	
      if($endereco==true){
	     header ('Location:http://localhost:8080/loja/Cliente/mostrarendereco.php');
      }

?>
<div id = "top" >
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand"></a>
  <form class="form-inline">
    <input  name="TextProcurar" class="form-control mr-sm-2" type="search" placeholder="Pesquise o produto" aria-label="Search">
    <button name="Pesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Pesquisar">Pesquise</button>
  </form>
</nav>
 <nav class ="nav justify-content-end">
    <ul class ="nav-item">
       <a class="nav-link active" href="meuperfil.php">Meu Perfil</a>
                 
     </ul><!-- submenu do submenu do submenu -->
     
      
       <ul class ="nav-item">
               <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cartão
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="AdicionarCartao.php">Adicionar Cartao</a>
           <a class="dropdown-item" href="EditarCartao.php">Editar Cartao</a>
         <div class="dropdown-divider"></div>
         
        </div>
                 
         </ul><!-- submenu do submenu do submenu -->    
        <ul class ="nav-item">
               <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pedidos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="AdicionarCartao.php">Novos</a>
           <a class="dropdown-item" href="EditarCartao.php">Pagos</a>
           <a class="dropdown-item" href="EditarCartao.php">Historico</a>
         <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Devolução</a>
         
        </div>
                 
         </ul><!-- submenu do submenu do submenu -->    
           
          <ul class ="nav-item">
               <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categoria
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
                    $contador= count($vectorCategoria);                    
                    for ($i=0; $i<=$contador;$i++){             
                       echo '<a class="dropdown-item" href=Operacao/MenuCategoria.php?var='.$vectorCategoria[$i].'>'.$vectorCategoria[$i].'</a>';
                    } 
             ?>  
                
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#">Promoções</a>
        </div>
                 
         </ul><!-- submenu do submenu do submenu -->
      <ul class ="nav-item">
       <a class="nav-link active" href="meuperfil.php">Contatos</a>
                 
     </ul><!-- submenu do submenu do submenu -->

      <ul class ="nav-item">
       <a class="nav-link active" href="saircliente.php">Sair</a>
                 
     </ul><!-- submenu do submenu do submenu -->
                       
             
     </ul>
  </nav>
<div>
    
  
  
  
  <form action="FormularioResidencial.php" method="post" enctype="multipart/form-data">
 
  <div class="row mb-3">
     <label for ="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Rua </label>
     <div class="col-sm-10">
        <input name="TextRua" type="text"  class="form-control form-control-sm"/>
    </div>
   </div>
   <div class="row mb-3">
     <label for ="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Numero </label>
     <div class="col-sm-10">
      <input name="TextNumero" type="text"  class="form-control form-control-sm"/> 
     </div>
   </div>
   <div class="row mb-3">
     <label for ="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Cep </label>
     <div class="col-sm-10">
     <input name="TextCep" type="text" class="form-control form-control-sm"/> 
   </div>
   </div>
  <div class="row mb-3">
     <label for ="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Bairro</label>
     <div class="col-sm-10">
     <input name="TextBairro" type="text" class="form-control form-control-sm"/> 
   </div>
   </div>
   <div class="row mb-3">
     <label for ="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Cidade</label>
     <div class="col-sm-10">
     <input name="TextCidade" type="text" class="form-control form-control-sm"/> 
   </div>
   </div>
   
   <p id ="paragrafo">
     <label>Estado </label>
     <select name="Estado"  class="form-select form-select-sm" aria-label="Default select example" ></select> 
   </p>
    <div class="row mb-3">
     <label for ="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Telefone </label>
     <div class="col-sm-10">
     <input name="TextTelefone" type="text" class="form-control form-control-sm"/> 
   </div>
   </div>
   <div class="row mb-3">
     <label for ="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Celular</label>
     <div class="col-sm-10">
     <input name="TextCelular" type="text" class="form-control form-control-sm"/> 
   </div>
   </div>
  
   <div class="row mb-3">
     <label for ="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">CPF </label>
     <div class="col-sm-10">
     <input name="TextCpf" type="text" class="form-control form-control-sm"/> 
   </div>
   </div>
   
  <div class="row mb-3"> 
     <div class="col-sm-10">
     <input id ="BotaoGravar" value="Gravar" type="submit" class="btn btn-primary"/> 
     <input id ="BotaoGravar" value="Cancelar" type="reset" class="btn btn-primary" />
      </div> 
  </div>
   
  </form>

</div>
</div>                    
<footer class="footer mt-auto py-3 bg-light">
 <div class="container">
    <span class="text-muted">Todos Direitos Reservados-Artcomsoft</span>
 </div>
</footer>
</body>
</html>
