<? session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>

		 <!-- Modal -->
		<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="TituloModal"><?= $_SESSION['STATUS_EMAIL']['codigo_status'] ?></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <? if(isset($_SESSION['STATUS_EMAIL'])) {echo $_SESSION['STATUS_EMAIL']['descricao_status']; } ?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn" data-dismiss="modal">Fechar</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- fim modal -->


		<div class="container" style="max-width: 700px">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">


						<form action="processa_envio.php" method="post">
							<div class="form-group">
								<label for="para">Para</label>
								<input type="text" class="form-control" id="para" placeholder="joao@dominio.com.br" name="email">
							</div>

							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail"
								name="assunto">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea class="form-control" id="mensagem" name="mensagem"></textarea >
							</div>

							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>

      	<!-- jquery -->
      	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	    <!-- Popper.js -->    
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	    <!-- Bootstrap JS -->
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    	<script src="estilo.js"></script>
     	
     	<? session_destroy(); ?>

	</body>
</html>