<?php
require_once 'classes/usuario.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/form.css">
    <link rel="shortcut icon" href="img/logo4.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="style/menu.css">
    

    <title>Zamprogna</title>
</head>
<body>
    <header>
        <div class="container">
            <div id="logo" >
                <img id="img1" src="img/logo4.png">
            </div>
            <div class="bar">
              <nav class="menu">
                <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="localizacao.html">Localização</a></li>
                  <li><a href="faleconosco.php">Fale conosco</a></li>
                  <li><a href="#">Trabalhe conosco</a></li>
                  <li><a href="#">SAC</a></li>
                </ul>
              </nav>
            </div>
            
    </header>

    
    <div class="principal">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
    
          <div class="item active">
            <img src="img/banner2.jpg" alt="Los Angeles" style="width:100%;">
            <div class="carousel-caption">
              
              
            </div>
          </div>
    
          <div class="item">
            <img src="img/banner3.jpg" alt="Chicago" style="width:100%;">
            <div class="carousel-caption">
              
              
            </div>
          </div>

          <div class="item">
            <img src="img/banner4.jpg" alt="Chicago" style="width:100%;">
            <div class="carousel-caption">
              
              
            </div>
          </div>
        
          
      
        </div>
    
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div id="produtos">
      
        
      
    </div>
  
    <div class="form-style-5">
      <form method="POST">
        <fieldset>
          <legend></span> Cadastro do Cliente</legend>
          <input type="text" name="nome" placeholder="Seu Nome *">
          <input type="email" name="email" placeholder="Seu Email *">
          <input type="text" name="telefone" placeholder="Seu Telefone *">
        </fieldset>
        <input type="submit" value="Cadastrar"/>
        <?php
//verifiar se clicou no botao
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);

	//cerificar se esta preenchido
	if(!empty($nome) && !empty($telefone) && !empty($email))
	{
		$u->conectar("zamprogna", "localhost","root","");
		if($u->msgErro == "")//se esta tudo ok
		{
			if($senha == $confirmarSenha)
			{
				if($u->cadastrar($nome,$telefone,$email,$senha))
				{
					?>
					
						<div >
							Cadastro com sucesso!<br>
              Fique de olho no seu email para receber novas promoções!
						</div>	
					
					
				<?php

				}
				else
				{
					?>
					<div >
						Email ja cadastrado!
					</div>
					<?php
				}
			}	

			else
			{
				?>
					<div >
					Senha e confirmar senha não correspondem!
					</div>
					<?php
				
			}
			
		}
		else
		{
			?>
			<form>
			<div>
				<?php echo "Erro".$u->msgErro;?>
			</div>
			<?php
		}
		
	}else
	{
		?>
		<div >
			Peencha todos os campos!
		</div>
		<?php
		
	}
}


?>
      </form>
    </div>
        
    

    <footer>
      
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>