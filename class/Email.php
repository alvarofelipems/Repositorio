<?php
	class Email {
		
		public function __construct() {
			//Ao iniciar a classe, conecta ao BD
			$this->BD = new BD;
		}
		
		public function listarModelos($ID = NULL) {
			if($ID == NULL) {
				$sql = 'SELECT * FROM modelos_de_email;';
			}
			else {
				$sql = 'SELECT * FROM modelos_de_email WHERE ID = '.$ID.';';	
			}
			return $this->BD->query($sql);
		}
		
		public function novoModelo($NomeDoModelo, $Assunto, $Mensagem) {
			$sql = 'INSERT INTO modelos_de_email (referencia, assunto, mensagem) VALUES ("'.$NomeDoModelo.'", "'.$Assunto.'", "'.$Mensagem.'");';
			return $this->BD->query($sql);
		}
		
		public function editarModelo($ID, $Referencia, $Assunto, $Mensagem) {
			$sql = 'UPDATE modelos_de_email SET referencia="'.$Referencia.'", assunto="'.$Assunto.'", mensagem="'.$Mensagem.'", WHERE ID = '.$ID.';';
			return $this->BD->query($sql);
		}
		
		private function replaces($Mensagem,  $Valores) {
			//Substitui tags por valores
			$campos = array('dataPedido', 'pedidoCOD', 'cliente', 'email', 'produto', 'rastreioCOD', 'precoBRL');
			foreach($campos as $campo) {
				$Mensagem = str_replace('['.$campo.']', $Valores[$campo], $Mensagem);
			}
			return $Mensagem;
		}
		
		protected function enviar($Email, $Assunto, $Mensagem, $EmailFrom = 'contato@canaldaoferta.com', $ReplyTo = 'contato@canaldaoferta.com', $Cc = NULL, $Bcc = NULL) {
			if(is_array($Email)) {
				
			}
			
			$headers  = 'MIME-Version: 1.0' . "\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
			$headers .= 'From: '.$EmailFrom . "\n";
			$headers .= 'Reply-To: '.$ReplyTo . "\r\n";
			if($Cc != NULL) $headers .= 'Cc: '.$Cc . "\n"; 
			if($Bcc != NULL) $headers .= 'Bcc: '.$Bcc . "\r\n"; 
			
			$envio = mail($Email, $Assunto, $Mensagem, $headers, "-r".$EmailFrom);
			 
			if($envio)
				return TRUE;
			else
				return FALSE;
		}
		
		public function sendEmail($VendaID, $ModeloID) {
			$Vendas = new Vendas;
			$venda = $Vendas->listar($VendaID);
			$modeloEmail = $this->listarModelos($ModeloID);
			
			$Mensagem = $this->replaces($modeloEmail['data'][0]['mensagem'], $venda['data'][0]);
			if($this->enviar($venda['data'][0]['email'], $modeloEmail['data'][0]['assunto'], $Mensagem))
				$this->emailsEnviados($VendaID, $ModeloID);
				
		}
		
		protected function emailsEnviados($VendaID, $ModeloID) {
			$sql = 'INSERT INTO emails_enviados (modeloID, vendaID) VALUES ("'.$VendaID.'", "'.$ModeloID.'");';
			return $this->BD->query($sql);
		}
		
		public function getEmailsEnviados($VendaID) {
			$sql = 'SELECT * FROM emails_enviados WHERE vendaID = '.$VendaID.';';
			return $this->BD->query($sql);
		}
		
	}
?>