$(document).ready(() => {

	$('.pagina').load('home.php')

	$('#menu a').on('click', e => {
		e.preventDefault()

		$('#menu a').removeClass('active')
		$(e.target).addClass('active')

		let pagina = $(e.target).attr('href')

		$('.pagina').load(pagina)
	})

	function atualizarIndices() {
		$.ajax({
			type: 'get',
			url: 'tarefa_controller.php?acao=tarefa_indice',
			dataType: 'json',
			success: dados => {
				$('#tarefa_pendentes').html(`${dados.tarefas_pendentes.total}`)
				$('#todas_tarefas').html(`${dados.todas_tarefas.total}`)
			},

			error: erro => {

			}

		})
	}
	atualizarIndices()

	//modal mensagem 
	function msgModal(tipo) {
		//mesagens 1 = sucesso, 2 = erro, 3=avisos
		let modal = $('#modalCentralizado')
			titulo = $('#modalCentralizado #modalTitulo')
			texto = $('#modalCentralizado .modal-body')
			botao = $('#modalCentralizado .btn')

			if(tipo == 1) {

				titulo.html('SUCESSO :)').addClass('text-success').removeClass('text-danger')
				texto.html('Tarefa cadastrada com sucesso.')
				botao.addClass('bg-success').removeClass('bg-danger')

			} else if(tipo == 2) {

				titulo.html('ERRO :(').addClass('text-danger').removeClass('text-success')
				texto.html('Não conseguimos preceguir com sua tarefa, tente novamente mais tarde.')
				botao.addClass('bg-danger').removeClass('bg-success')

			} else if (tipo == 3) {

				titulo.html('ERRO :(').addClass('text-danger').removeClass('text-success')
				texto.html('Insira uma tarefa valida para continuar!')
				botao.addClass('bg-danger').removeClass('bg-success')

			}


		modal.modal('show')
	}

	// Cadatrando nova tarefa
	function enviarForm(dados, acao, id = ''){

		$.ajax({
			type: 'POST',
			url: `tarefa_controller.php?acao=${acao}&id=${id}`,
			data: dados,
			dataType: 'json',
			success: dados => {

				
				let id = dados.id
					tarefa = dados.tarefa
					status = dados.status

				if(dados.id > 0) {
					$(`#tarefa_${id}`).html(`${tarefa} (${status})`)
				} else {
					$('#nova-tarefa input').val('')	
					msgModal(1) 
				}

				atualizarIndices()
			},
			error: erro => {
				msgModal(2) 
			}
		})
	}	


	// Cadatrando nova tarefa
	$('.pagina').on('submit', '#nova-tarefa', e => {
		e.preventDefault()

		let dados = $(e.target).serialize()

		let texto = $('input[name="tarefa"]').val()

		if(texto != '' && texto.length > 5) {
			enviarForm(dados, 'inserir')
		} else {
			msgModal(3) 
		}

				
	})

	//atualizar tarefa 
	$('.pagina').on('submit', '#atualizar-tarefa', e => {
		e.preventDefault()

		let dados = $(e.target).serialize()
			id = $(e.target).attr('data-id')
	 		texto = $('input[name="tarefa"]').val()

		if(texto != '' && texto.length > 5) {
			enviarForm(dados, 'atualizar', id)
		} else {
			msgModal(3) 
		}
				
	})


	//Editar-marcar-excluir tarefas
	$('.pagina').on('click', '#apagar', (e) => {
		e.preventDefault()

		let id = $(e.target).parent().attr('href')

		$.ajax({
			type: 'GET',
			url: `tarefa_controller.php?acao=remover&id=${id}`,
			dataType: 'json',
			success: dados => {
				dados ? $(`[data-item="${id}"]`).remove() : ''

				atualizarIndices()
			},
			error: erro => {}
		})
		
	})

	//marcar realizada 
	$('.pagina').on('click', '#marcarRealizada', (e) => {
		e.preventDefault()

		let id = $(e.target).parent().attr('href')

		$.ajax({
			type: 'GET',
			url: `tarefa_controller.php?acao=marcarRealizada&id=${id}`,
			dataType: 'json',
			success: dados => {

				if($(`[data-item="${id}"]`).hasClass('tarefa-home')) {
					$(`[data-item="${id}"]`).remove()
				} else {
					$(`[data-item="${id}"] #marcarRealizada, [data-item="${id}"] #editar`).remove()
				}

				atualizarIndices()
				
			},
			error: erro => {
				msgModal(2) 
			}
		})
		
	})

	//Editar
	$('.pagina').on('click', '#editar', (e) => {
		e.preventDefault()

		let id = $(e.target).parent().attr('href')

		let item = $(`#tarefa_${id}`)
		let texto = $(`#tarefa_${id}`).attr('data-tarefa')
		

		let formulario = $(
			'<form id="atualizar-tarefa" class="row mb-0">' +
				'<input type="text" class="col-9 form-control" name="tarefa" value="'+texto+'">'+
				'<input type="hidden" name="id" value="'+id+'">'+
				'<button type="submit" class="col-3 btn btn-info">Editar</button>'+
			'</form>')

		item.html(formulario)		
	})

})
