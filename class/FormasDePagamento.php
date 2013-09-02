<?php

	class FormasDePagamento {
		
		public function __construct() {
			//Ao iniciar a classe, conecta ao BD
			$this->BD = new BD;
		}
		
		public function listar($ID = NULL) {
			if($ID == NULL) {
				$sql = 'SELECT * FROM formas_de_pagamento';		//Consulta gerada
			}
			else 
			{
				$sql = 'SELECT * FROM formas_de_pagamento WHERE ID = '.$ID;		//Consulta gerada
			}
			return $this->BD->query($sql);		//Fazendo consulta
		}
		
		public function nova($Referencia, $Taxa) {
			$sql = 'INSERT INTO formas_de_pagamento (referencia, taxas) VALUES ("'.$Referencia.'", "'.$Taxa.'")';	//Consulta gerada
			return $this->BD->query($sql);		//Fazendo consulta
		}
		
		public function alterar($ID, $Referencia, $Taxa) {
			$sql = 'UPDATE formas_de_pagamento SET referencia="'.$Referencia.'", taxas="'.$Taxa.'" WHERE ID = '.$ID;	//Consulta gerada
			return $this->BD->query($sql);		//Fazendo consulta
		}
		
	}
	
?>