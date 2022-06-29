<?php 
require_once("conexao.php");

// INSERIR UM USUARIO ADM CASO NÃO EXISTA
$senha = '123';
$senha_crip = md5($senha);

$query = $pdo->query("SELECT * from usuarios where nivel = 'Administrador'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0){
	echo 'tem mais registros' . $total_reg;
}else {
	$pdo->query("INSERT INTO usuarios SET nome = 'Melissa Ferrete', email = '$email_sistema', cpf = '000.000.000-00', senha = '$senha', senha_crip = 
'$senha_crip', nivel = 'Administrador', data = curDate(), ativo = 'Sim'");
}


?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title> <?php echo $nome_sistema ?> </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilo_login.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
   

    

</head>
<body>

<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Faça o seu login</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="autenticar.php" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail ou CPF" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
			    	</fieldset>

					<p class="rec"><a href="#" data-toggle="modal" data-target="#exampleModal" >Recuperar Senha</a></p>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="post" id="form-recuperar">
      <div class="modal-body">
			<input placeholder="Digite o seu Email" class="form-control" type="email" name="email" required>

			<div id="msg-recuperar"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Recuperar</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
	$("#form-recuperar").submit(function () {

		$("#form-recuperar").text('mensagem')

		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "cadastro.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem-cadastro').text('');
				$('#mensagem-cadastro').removeClass()
				if (mensagem.trim() == "Cadastrado com Sucesso") {
					//$('#btn-fechar-usu').click();
					$('#mensagem-cadastro').addClass('text-success')
					$('#mensagem-cadastro').text(mensagem)	
					$('#usuario').val($('#email_cadastro').val())
					$('#senha').val($('#senha_cadastro').val())				

				} else {

					$('#mensagem-cadastro').addClass('text-danger')
					$('#mensagem-cadastro').text(mensagem)
				}


			},

			cache: false,
			contentType: false,
			processData: false,

		});

	});
</script>


<script type="text-javascript">

</script>