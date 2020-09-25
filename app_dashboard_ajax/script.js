$(document).ready(() => {
	/*================================
		rquisitando paginas
	================================*/
	function chamarPagina(pagina) {

		let url = $(pagina).attr('href') + '.html' //extrai o link e adiciona a extenção html

		$('#pagina').load(url) //chama a pagina
	}

	//enviar o clck para chamar a pagina
	$('.menu-link').on('click', e => {

		event.preventDefault()
		chamarPagina(e.target)			
	})

	//chama a primeira pagina automaticamente
	$('.menu-link').each((e, value) => {
		if(e == 0) {
			chamarPagina(value)			
		}
		
	})


	/*================================
		AJAX
	================================*/

	$('#pagina').on('change', '#competencia', (e) => {
		
		let competencia =  $(e.target).val()

		$.ajax({
			type: 'GET',
			url: 'app.php',
			data: `competencia=${competencia}`,
			dataType: 'json',
			success: dados => {
				$('#numero-vendas').html(dados.numeroVendas) 
				$('#total-vendas').html(`R$ ${dados.totalVendas}`)
				$('#clientes-ativos').html(dados.clientesAtivos)
				$('#clientes-inativos').html(dados.clientesInativos)
				$('#total-reclamacoes').html(dados.totalReclamacoes)
				$('#total-elogio').html(dados.totalElogio)
				$('#total-sugestoes').html(dados.totalSugestoes)
				$('#total-despesas').html(`R$ ${dados.totalDespesas}`)
				
			},
			error: erro => {console.log(erro)}
		})
	})

	
})