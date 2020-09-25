<div class="row">
	<div class="col">
		<h4>Tarefas pendentes</h4>
		<hr />

		<?
			$acao = 'recuperar';
			require 'tarefa_controller.php';
			foreach ($tarefas as $indece => $tarefa) {	
		?>

		<? if($tarefa->id_status == 1) {?>

		<div class="row mb-3 d-flex align-items-center tarefa tarefa-home" data-item="<?= $tarefa->id ?>">
			<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>" data-tarefa="<?= $tarefa->tarefa ?>">
				<?= $tarefa->tarefa ?> (<?= $tarefa->status ?>)
			</div>
			<div class="col-sm-3 mt-2 d-flex justify-content-between">

				<a id="apagar" href="<?= $tarefa->id ?>">
					<i class="fas fa-trash-alt fa-lg text-danger"></i>
				</a>
				
				<a id="editar" href="<?= $tarefa->id ?>">
					<i class="fas fa-edit fa-lg text-info"></i>
				</a>
				
				<a id="marcarRealizada" href="<?= $tarefa->id ?>">
					<i class="fas fa-check-square fa-lg text-success"></i>
				</a>
				
			</div>
		</div>



		<? } } ?>
	</div>
</div>