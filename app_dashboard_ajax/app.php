<?php 

// class dados
class Dados {
	public $data_inico;
	public $data_fim;
	public $numeroVendas;
	public $totalVendas;
	public $clientesAtivos;
	public $clientesInativos;
	public $totalReclamacoes;
	public $totalElogio;
	public $totalSugestoes;
	public $totalDespesas;

	public function __get($attr) {
		return $this->$attr;
	}

	public function __set($attr, $value) {
		$this->$attr = $value;
		return $this;
	}
}

// conexão com banco
class Conexao {
	private $host = 'localhost';
	private $dbname = 'dashboard';
	private $user = 'root';
	private $pass = '';

	public function conectar() {
		try {
			$conexao = new PDO(
				"mysql:host=$this->host; dbname=$this->dbname",
				"$this->user",
				"$this->pass"
			);

			$conexao->exec('set charset set utf8');

			return $conexao;

		} catch (PDOExeption $e) {
			echo '<p>' . $e->getMessege() . '</p>';
		}
	}
}


//class model 
class Bd {
	private $conexao;
	private $dados;

	public function __construct(Conexao $conexao, Dados $dados) {
		$this->conexao = $conexao->conectar();
		$this->dados = $dados;
	}

	public function query($query, $params = []) {

		$stmt = $this->conexao->prepare($query);

		foreach ($params as $param => $value) {

			$stmt->bindValue($param, $value);
		}

		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_OBJ);		
	}

	public function getNumeroVendas() {
		$stmt = $this->query('
			select 
				count(*) as numero_vendas
			from 
				tb_vendas 
			where data_venda between :data_inico and :data_fim', [
				':data_inico' => $this->dados->__get('data_inico'),
				':data_fim' => $this->dados->__get('data_fim')
			]);

		return $stmt[0]->numero_vendas;
	}

	public function getTotalVendas() {
		$stmt = $this->query('
			select 
				SUM(total) as total_vendas
			from 
				tb_vendas 
			where data_venda between :data_inico and :data_fim', [
				':data_inico' => $this->dados->__get('data_inico'),
				':data_fim' => $this->dados->__get('data_fim')
			]);

		return $stmt[0]->total_vendas;
	}

	public function getClientesAtivos() {
		$stmt = $this->query('
			SELECT COUNT(*)  AS clientesAtivos
			FROM tb_clientes 
			WHERE cliente_ativo = :cliente_ativo', 
			[':cliente_ativo' => 1]
		);

		return $stmt[0]->clientesAtivos;
	}

	public function getClientesInativos() {
		$stmt = $this->query('
			SELECT COUNT(*)  AS clientesInativos
			FROM tb_clientes 
			WHERE cliente_ativo = :cliente_ativo', 
			[':cliente_ativo' => 0]
		);

		return $stmt[0]->clientesInativos;
	}
	public function getTotalReclamacoes() {
		$stmt = $this->query('
			SELECT COUNT(*) AS totalReclamacoes
			FROM tb_contatos 
			WHERE tipo_contato = :tipo_contato', 
			[':tipo_contato' => 1]
		);

		return $stmt[0]->totalReclamacoes;
	}

	public function getTotalElogio() {
		$stmt = $this->query('
			SELECT COUNT(*) AS totalElogio
			FROM tb_contatos 
			WHERE tipo_contato = :tipo_contato', 
			[':tipo_contato' => 2]
		);

		return $stmt[0]->totalElogio;
	}

	public function getTotalSugestoes() {
		$stmt = $this->query('
			SELECT COUNT(*) AS totalSugestoes
			FROM tb_contatos 
			WHERE tipo_contato = :tipo_contato', 
			[':tipo_contato' => 3]
		);

		return $stmt[0]->totalSugestoes;
	}

	public function getTotalDespesas() {
		$stmt = $this->query('
			select 
				SUM(total) as total_despesas
			from 
				tb_despesas 
			where data_despesa between :data_inico and :data_fim', [
				':data_inico' => $this->dados->__get('data_inico'),
				':data_fim' => $this->dados->__get('data_fim')
			]);

		return $stmt[0]->total_despesas;
	}
	

}

function fomatNum($numero) {
	return number_format($numero, 2, ',', '.');
}

//logica 
$conexao = new Conexao();
$dados = new Dados();

/*===========================================
  motnado calendario de acordo com o ajax
===========================================*/
//separando mes do ano
$competencia = explode('-', $_GET['competencia']);
$ano = $competencia[0]; //salvando o ano
$mes = $competencia[1]; //salvando o dia

//função para contar quansto dias tem no mes/ano
$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

//formando data inicial e final
$data_inicio = $ano.'-'.$mes.'-01';
$data_fim = $ano.'-'.$mes.'-'.$dias_do_mes;

//===========================================
$dados->__set('data_inico', $data_inicio);
$dados->__set('data_fim', $data_fim );


$bd = new Bd($conexao, $dados);

$dados->__set('numeroVendas', $bd->getNumeroVendas());
$dados->__set('clientesAtivos', $bd->getClientesAtivos());
$dados->__set('clientesInativos', $bd->getClientesInativos());
$dados->__set('totalReclamacoes', $bd->getTotalReclamacoes());
$dados->__set('totalElogio', $bd->getTotalElogio());
$dados->__set('totalSugestoes', $bd->getTotalSugestoes());
$dados->__set('totalDespesas', fomatNum($bd->getTotalDespesas()));
$dados->__set('totalVendas', fomatNum($bd->getTotalVendas()));

echo json_encode($dados);

?>