<? require_once "topo.php" ?>

    <?
      // chamdos
      $chamados = [];

      //Usuario
      $usuario = $_SESSION['usuario'];

      // abrindo arquivo
      $arquivo = fopen('../../app_help_desk/arquivo.hd', 'r');

      while (!feof($arquivo)) { //porcura pelo fim do arquivo
        
        $registro = fgets($arquivo);

        if($registro != '' ) { //verifica se não e vazio

          $chamdo_dados = explode("#", $registro); //quebarndo o texto e transforamndo em array

          if($usuario['adm']) {
            //formtando o texto em array
            $chamados[] = [ 
              'titulo' => $chamdo_dados[0],
              'categoria' => $chamdo_dados[1],
              'descricao' => $chamdo_dados[2]
            ];
          } else if($chamdo_dados[3] == $usuario['id']) {
            //formtando o texto em array
            $chamados[] = [ 
              'titulo' => $chamdo_dados[0],
              'categoria' => $chamdo_dados[1],
              'descricao' => $chamdo_dados[2]
            ];
          }
          
        }
      }
      // fechar arquivo
      fclose($arquivo);
    ?>

    <div class="container">    
      <div class="row">
        <div class="col">
          <div class="card-consultar-chamado">
            <div class="card">
              <div class="card-header">
                Consulta de chamado
              </div>
              
              <div class="card-body">

                <? 
                if(isset($chamados) && $chamados != '') {

                foreach ($chamados as $chamado) { ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado['titulo']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado['categoria']; ?></h6>
                    <p class="card-text"><?= $chamado['descricao']; ?></p>

                  </div>
                </div>

                <? } } ?>


                <div class="row mt-5">
                  <div class="col-6">
                    <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<? require_once "footer.php" ?>