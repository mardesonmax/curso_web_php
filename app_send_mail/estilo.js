// Exibindo resultado do email
class StatusEmail {
	constructor() {
		this.modalStatus = $('#ExemploModalCentralizado')
		this.titulo = $('.modal-title')
		this.button = $('.modal-footer button')

		let id = this.titulo.html()

		if(id == 1) {

			this.emailSucesso()

		} else if(id == 2) {

			this.emailErro()

		}
		
	}		

	emailErro() {
		this.titulo.addClass('text-danger').html('SUCESSO :)')
		this.button.addClass('bg-danger text-white')

		this.modalStatus.modal('show')
	}

	emailSucesso() {
		this.titulo.addClass('text-success').html('SUCESSO :)')
		this.button.addClass('bg-success text-white')

		this.modalStatus.modal('show')
	}

	verificarDados() {
		$('.form-control').each(function(){
			if($(this).val() == '') {
				
				event.preventDefault()

				$(this).css('border-color', 'red')

				$('.modal-title').addClass('text-danger').html('ERRO :(')
				$('.modal-footer button').addClass('bg-danger text-white')

				$('.modal-body').html('Por favor, preencha todos os campos para continuar!')

				$('#ExemploModalCentralizado').modal('show')
				
			} else {
				$(this).css('border-color', '')
			}
		}) 

		
	}
}


$x = new StatusEmail()

$('form button').click(function(){
	
	$x.verificarDados()
})
	