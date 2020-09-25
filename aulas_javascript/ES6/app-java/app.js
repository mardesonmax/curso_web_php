// class despesa 
class Despesa {
	constructor(ano, mes, dia, tipo, descricao, valor) {
		this.ano = ano
		this.mes = mes
		this.dia = dia
		this.tipo = tipo
		this.descricao = descricao
		this.valor = valor
	}

	validarDados() {
		for(let i in this) {
			if(this[i] == undefined || this[i] == '' || this[i] == null) {
				return false
			}			
		}
		return true
	}
}
// class Bd 
class Bd {
	constructor() {
		let id = localStorage.getItem('id')

		if (id === null) {
			localStorage.setItem('id', 0)
		}
	}
	//Indice dinamico
	getProximoId() {
		let proximoId = localStorage.getItem('id')
		return parseInt(proximoId) + 1
	}
	// Função gravar
	gravar(des) {
		
		let id = this.getProximoId()

		localStorage.setItem(id, JSON.stringify(des))

		localStorage.setItem('id', id)
	}

	//Carregar os registros
	carregarTodosRegistro() {
		// array
		let data = Array()

		let id = localStorage.getItem('id')

		for(let i = 1; i <= id; i++) {

			let despesa = JSON.parse(localStorage.getItem(i)) 

			if(despesa === null) {
				continue
			}
			
			despesa.id = i
			data.push(despesa)
			
		}

		return data
	}

	//Pesquisar despesa
	pesquisar(despesa) {
		let todasDespesas = Array()
		todasDespesas = this.carregarTodosRegistro()

		// ano
		if (despesa.ano != '') {
			todasDespesas = todasDespesas.filter(d => d.ano == despesa.ano)
		}

		// mes
		if (despesa.mes != '') {
			todasDespesas = todasDespesas.filter(d => d.mes == despesa.mes)
		}

		// dia
		if (despesa.dia != '') {
			todasDespesas = todasDespesas.filter(d => d.dia == despesa.dia)
		}

		// tipo
		if (despesa.tipo != '') {
			todasDespesas = todasDespesas.filter(d => d.tipo == despesa.tipo)
		}

		// descricao
		if (despesa.descricao != '') {
			todasDespesas = todasDespesas.filter(d => d.descricao == despesa.descricao)
		}

		// valor
		if (despesa.valor != '') {
			todasDespesas = todasDespesas.filter(d => d.valor == despesa.valor)
		}

		return todasDespesas
		
	}

	// remover
	remover(id) {
		//remove o item
		localStorage.removeItem(id)

		//atualiza a pagina
		window.location.reload()
	}

}

let bd = new Bd() 


// Mensagem de sucesso/erro
function msgGravar(msgGravar) {

	let titulo = document.getElementById('TituloModalCentralizado')
	let infoGravacao = document.getElementById('infoGravacao')
	let btnMsgGravar = document.getElementById('btnMsgGravar')

	if(msgGravar) {
		
		// Retorna a mensagem de sucesso
		titulo.innerHTML = 'Gravação bem sucedida' //Tirulo
		titulo.className = 'modal-title text-success' //class titulo

		infoGravacao.innerHTML = 'Despesas gravadas com sucesso.' //Mensagem
		
		btnMsgGravar.className = 'btn btn-success' //class btn

		$('#msgGravar').modal('show') //Mosta a tela da mensagem

	} else {

		// Retorna a mensagem de erro
		titulo.innerHTML = 'Erro na gravação'  //Tirulo
		titulo.className = 'modal-title text-danger' //class titulo

		infoGravacao.innerHTML = 'Todos os campos do forulário são obrifatórios!' //Mensagem

		btnMsgGravar.className = 'btn btn-danger' //class btn

		$('#msgGravar').modal('show') //Mosta a tela da mensagem
	}

}

// Função cadastrarDespesa 
function cadastrarDespesa() {
	let ano = document.getElementById('ano')
	let mes = document.getElementById('mes')
	let dia = document.getElementById('dia')
	let tipo = document.getElementById('tipo')
	let descricao = document.getElementById('descricao')
	let valor = document.getElementById('valor')

	let despesa = new Despesa(
		ano.value, 
		mes.value, 
		dia.value,
		tipo.value, 
		descricao.value, 
		valor.value 
	)
	if(despesa.validarDados()) {
		//dialog de successo
		
		bd.gravar(despesa)
		
		msgGravar(true)

		ano.value = '' 
		mes.value = ''  
		dia.value = '' 
		tipo.value = '' 
		descricao.value = '' 
		valor.value = '' 
		
	} else {
		// dialog de erro
		msgGravar(false)
	}
	
}



function carregarTodasDespesas(despesas = Array(), filter = false) {

	if(despesas.length == 0 && filter == false) {
		despesas = bd.carregarTodosRegistro()
	}
	

	// selecionando elemento tbody
	let listaDespesas = document.getElementById('listaDespesas')
	listaDespesas.innerHTML = ''

	//percorrendo o array despesas
	despesas.forEach(function(d) {
		// criando a linha (tr)
		let linha = listaDespesas.insertRow()

		// ajustando tipo
		switch(d.tipo) {
			case '1': d.tipo = 'Alimentação'
			break

			case '2': d.tipo = 'Educação'
			break

			case '3': d.tipo = 'Lazer'
			break

			case '4': d.tipo = 'Saúde'
			break

			case '5': d.tipo = 'Transporte'
			break
		}

		// criando colunas (td)
		linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`
		linha.insertCell(1).innerHTML = d.tipo
		linha.insertCell(2).innerHTML = d.descricao
		linha.insertCell(3).innerHTML = `R$ ${d.valor}`

		// Botão para excluir
		let btn = document.createElement('button')
		btn.className = 'btn btn-danger'
		btn.innerHTML = '<i class="fas fa-times"></i>'
		btn.id = `id_espesa_${d.id}`
		btn.onclick = function() {
			// remover a despesa
			let id = this.id.replace('id_espesa_', '')

			bd.remover(id)
		}
		linha.insertCell(4).append(btn)

	})
}


// Pesquisa
function pesquisarDespesa() {
	let ano = document.getElementById('ano').value
	let mes = document.getElementById('mes').value 
	let dia = document.getElementById('dia').value 
	let tipo = document.getElementById('tipo').value 
	let descricao = document.getElementById('descricao').value 
	let valor = document.getElementById('valor').value

	let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor)

	let despesas = bd.pesquisar(despesa)

	carregarTodasDespesas(despesas, true)
}
