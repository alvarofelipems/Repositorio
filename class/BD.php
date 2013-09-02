<?php
	class BD {
		private $host = 'localhost';
		public $usuario = 'root';
		public $senha = '';
		public $banco = 'controle_de_vendas';
		
		public function __construct() {
			//Inicialização
		}
		
		private function ConnectBD() {
			$this->MySQLi = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
			$this->MySQLi->set_charset('utf8');
		}
		
		public function query($sql) {
			$this->ConnectBD();
			$query = $this->MySQLi->query($sql);
			return $this->retorno($sql, $query);
		}
		
		private function retorno($sql, $query) {
			//Retorna valores após consulta ao BD ()
			if(substr_count($sql, 'INSERT')) {
				//Ao inserir dados ao BD - Retorna valor do AutoIncremento
				$retorno['linhasAfetadas'] = $this->MySQLi->affected_rows;
				$retorno['autoIncremento'] = $this->MySQLi->insert_id;
			}
			
			if(substr_count($sql, 'UPDATE')) {
				//Ao alterar dados ao BD - Retorna quantidade de Linhas Afetadas
				$retorno['linhasAfetadas'] = $this->MySQLi->affected_rows;
			}
			
			if(substr_count($sql, 'SELECT')) {
				//Ao selecionar dados do BD - Retorna quantidade de linhas selecionadas e os resultados
				$retorno['linhasSelecionadas'] = $query->num_rows;
				while($row = $query->fetch_assoc()) {
					$retorno['data'][] = $row;
				}
			}
			$this->desconect();
			if(isset($retorno))
				return $retorno;
			else
				return FALSE;
		}
		private function desconect() {
			$this->MySQLi->close();
		}
		
		public function __destruct() {
			//Desconectando usuário do BD
		}
	}
?>