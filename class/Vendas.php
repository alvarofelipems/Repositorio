<?php
	
	class Vendas {
		private $campos = array('dataPedido', 'dataCompra', 'pedidoCOD', 'cliente', 'email', 'produto', 'rastreioCOD', 'precoUSD', 'precoBRL');
		private $data;
		
		public function __construct() {
			//Ao iniciar a classe, conecta ao BD
			$this->BD = new BD;
		}
		
		public function listar($Parametros = NULL) {
			if($Parametros == NULL) {
				//$sql = 'SELECT * FROM vendas;';		//Consulta gerada
				$sql = 'SELECT * FROM vendas INNER JOIN formas_de_pagamento ON (vendas.formaPagamento = formas_de_pagamento.ID)';	//Consulta gerada
			}
			else if(is_array($Parametros)) {
				if(isset($Parametros['cliente'])) {
					$where[] = 'cliente = '.$Parametros['cliente'];
				}
				if(isset($Parametros['dataPedido'])) {
					$where[] = 'cliente = '.$Parametros['cliente'];
				}
				if(isset($Parametros['dataCompra'])) {
					
				}
				if(isset($Parametros['despachado'])) {
					if($Parametros['despachado'] === TRUE) {
						$where[] = 'rastreioCOD != '.NULL;
					}
					else if ($Parametros['despachado'] === FALSE) {
						$where[] = 'rastreioCOD = '.NULL;
					}
				}
				if(isset($Parametros['produto'])) {
					$where[] ='produtos = '.$Parametros['produto'];
				}
				$sqlWhere = implode(" AND ", $where);
				//$sql = 'SELECT * FROM vendas WHERE ('.$sqlWhere.');';
				$sql = 'SELECT * FROM vendas INNER JOIN formas_de_pagamento ON (vendas.formaPagamento = formas_de_pagamento.ID) WHERE ('.$sqlWhere.');';	//Consulta gerada
			}
			else {
				//$sql = 'SELECT * FROM vendas WHERE ID = '.$Parametros.';';
				$sql = 'SELECT * FROM vendas INNER JOIN formas_de_pagamento ON (vendas.formaPagamento = formas_de_pagamento.ID) WHERE ID = '.$Parametros.';';	//Consulta gerada
			}
			
			return $this->BD->query($sql);	//Fazendo consulta
		}
		
		public function nova() {
			//Gerando consulta para inserir nova entrada
			//(Para definir os valores, utilize '__set')
			foreach ($this->campos as $campo) {
				if(!isset($this->data[$campo])) {
				$this->data[$campo] = NULL;
				}
			}
			
			//Gerando consulta
			$sql =	'INSERT INTO vendas (';
					$i=0;
					foreach ($this->campos as $campo) {
						$sql .= $campo.', ';
						if($i<count($this->campos))
							$sql .='", ';
						$i++;	
					}
					$sql .= ') VALUES (';
					$i=0;
					foreach ($this->campos as $campo) {
						$sql .= '"'.$this->data[$campo].'", ';
						if($i<count($this->campos))
							$sql .='", ';
						else
							$sql .= '");';
						$i++;	
					}
					
			return $this->BD->query($sql);	//Fazendo consulta	
		}
		
		public function editar($ID) {
			//Gerando consulta para alterar conteudo
			//(Para definir os valores, utilize '__set')
			$sql =	'UPDATE vendas SET ';
					$i=0;
					foreach ($this->campos as $campo) {
						if(isset($this->data[$campo])) {
							if($i != 0)
								$sql .= ', ';
								
							$sql .= $campo.'="'.$this->data[$campo].'"';
							$i++;
						}
					}
					$sql .= ' WHERE ID = '.$ID.';';
					
			return $this->BD->query($sql);
		}
		
		public function setData(array $Value) {
			//Seta todos os valores de um array em uma váriavel interna (data)
			$ValueKeys = array_keys($Value);
			for($i=0; $i<count($ValueKeys); $i++) {
				$this->__set($ValueKeys[$i], $Value[$ValueKeys[$i]]);
			}
		}
		
		public function __set($Name, $Value) {
			//Setando valores individuais
			$this->data[$Name] = $Value;
		}
		
		public function __get($Name) {
			//Pegar valores individuais da variável interna (data)
			if (array_key_exists($Name, $this->data)) {
				return $this->data[$Name];
			}
			return NULL;
		}
	}
	
	
	
//include ('BD.php');
//$Vendas = new Vendas;
//include ('Email.php');
//$Email = new Email;
//$Email->novoModelo('Teste', 'Você está recebendo esse email de teste.', 'Testando');
//echo $Email->sendEmail(6, 1);

/*
$Vendas->__set('dataPedido', date('Y-m-d H:i:s'));
$Vendas->__set('$dataCompra', date('Y-m-d H:i:s'));
$Vendas->__set('pedidoCOD', NULL);
$Vendas->__set('cliente', 'Álvaro Felipe Mendes Soares');
$Vendas->__set('email', 'alvarofelipems@gmail.com');
$Vendas->__set('produto', 'Relógio');
$Vendas->__set('rastreioCOD', NULL);
$Vendas->__set('precoUSD', '2.00');
$Vendas->__set('precoBRL', '5.00');
$insertVendas = $Vendas->nova();
*/ 
//$retorno = $Vendas->listar();
//echo '<pre>';
//print_r($insertVendas);
//print_r($retorno);
//$Vendas->setData($retorno['data'][0]);
//$Vendas->__set('dataPedido', date('Y-m-d H:i:s'));
//$Vendas->__set('dataCompra', date('Y-m-d H:i:s'));
//print_r($Vendas->editar(1));
//print_r($Vendas->editar(2));
//echo '</pre>';


?>