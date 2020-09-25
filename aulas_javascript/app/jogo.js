// largura e altura
var largura = 0
var altura = 0
var vidas = 1
var tempoDeJogo = 30;
var dificuldade = 1500;

var nivel = window.location.search
nivel = nivel.replace('?', '')


if (nivel === '1') {
	//1500
	dificuldade = 1500
	console.log(nivel)
} else if (nivel === '2') {
	//1000
	dificuldade = 1000
	console.log(nivel)
} else if (nivel === '3') {
	//750
	dificuldade = 750
	console.log(nivel)
}

function ajustarTamanho() {
	largura = window.innerWidth 
	altura = window.innerHeight

	// console.log(largura, altura)
}

// Cria o mosquito e sua posição na tela
function posicaoRandomica() {

 	
 	//Remove a imagem caso ela exista
 	if (document.getElementById('mosquito')) {

 		document.getElementById('mosquito').remove() //remove o mosquito

 		if (vidas > 3) {

 			window.location.href = 'fim_de_jogo.html' //Redireciona para pagina GameOver

 		} else {
 			document.getElementById("v" + vidas).src= 'imagens/coracao_vazio.png' //Muda a imagem do coração

 			vidas++ 
 		}
 		
 	}

 	// Definindo a posição da imagem automaticamente
	var posicaoX = Math.floor(Math.random() * largura) -90 // remove 90
	var posicaoY = Math.floor(Math.random() * altura) -150	// remove 150

	// Caso seja menor que 0 define o valor como 0
	posicaoX = posicaoX < 0 ? 0 : posicaoX 
	posicaoY = posicaoY < 0 ? 0 : posicaoY


	// Criando elemento HTML
	var mosquito = document.createElement('img'); //cria a iamgem
	mosquito.src = 'imagens/mosca.png' //adciona o caminho a imagem
	mosquito.className = tamanhoAleatorio() + ' ' + ladoAleatorio() //adciona a classe a imagem
	mosquito.style.left = posicaoX + 'px'	//adciona a posição left a imagem
	mosquito.style.top = posicaoY + 'px'	//adciona a posilçao top a imagem
	mosquito.style.position = 'absolute'	//adciona a posição absolura a imagem
	mosquito.id = 'mosquito'	//asciona um id a imagem

	//Função para remover a imagem ao clicar em cima
	mosquito.onclick = function() {
		this.remove()
	}

	document.body.appendChild(mosquito) //Cria a imagem na pagina

}

// Tamanho do mosquito
function tamanhoAleatorio() {

	var tamanho = Math.floor(Math.random() * 3)
	
	switch(tamanho) {
		case 0:
			return 'mosquito1'
		case 1:
			return 'mosquito2'
		case 2:
			return 'mosquito3'
	}
}	

// Lado que o mosquito vai olhar
function ladoAleatorio() {

	var lado = Math.floor(Math.random() * 3)
	
	switch(lado) {
		case 0:
			return 'ladoA'
		case 1:
			return 'ladoB'
		case 2:
			return 'ladoC'
	}
}	

//Cria o cronometro do jogo
var cronometro = setInterval(function() {

	tempoDeJogo -= 1 //Tira menos 1 do tempo

	if (tempoDeJogo < 0) { 			//Verifica se o tempo e igual a 0

		clearInterval(cronometro);		//Limpa a menoria do intervalo de tempo
		clearInterval(criarMosquito);	//Limpa a menoria do intervalo de tempo

		window.location.href = 'vencedor.html' //Redireciona para pagina venceu

	} else {
		document.getElementById('tempo').innerHTML = tempoDeJogo //Muda o tempo no jogo
	}
	
	
}, 1000)

// Cria o mosquito
var criarMosquito = setInterval(function(){
	ajustarTamanho()
	posicaoRandomica()

}, dificuldade)

// Iniacia o jogo
function iniciarJogo() {

	document.getElementById('tempo').innerHTML = tempoDeJogo //Inicia o tempo

	criarMosquito //Cria o mosquito
}

