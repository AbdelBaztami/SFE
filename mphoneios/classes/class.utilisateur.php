<?php
class utilisateur {
	var $idUtilisateur;
	var $uname;
	var $password;
	var $nom;
	var $prenom;
	var $position;	// 'O' ou 'N'
	var $tStocks;	// Tableau des idStock auquel l'utilisateur est autoris� d'acc�der
	var $idStockDefaut;

    static function charger($uname) {
		$uname=$uname;
		$result = executeSqlSelect("SELECT * FROM users where user_name='$uname'");
		$row = mysqli_fetch_array($result);
		if ($row) {
			$utilisateur = self::instancefromSqlRow($row);
			$utilisateur->chargerStocksAutorise();
		} else {
			$utilisateur=false;
		}
		return $utilisateur;
	}

	static function chargerTout() {
		$tUtilisateurs=array();
		$result = executeSqlSelect("SELECT * FROM users");
		while($row = mysqli_fetch_array($result)) {
			$utilisateur=self::instancefromSqlRow($row);
			$utilisateur->chargerStocksAutorise();
			$tUtilisateurs[]=$utilisateur;
		}
		return $tUtilisateurs;
	}

	static function instancefromSqlRow($row) {
		$utilisateur = new utilisateur();
		$utilisateur->idUtilisateur=$row['ID'];
		$utilisateur->uname=$row['user_name'];
		$utilisateur->password=$row['password'];
		$utilisateur->nom=$row['nom'];
		$utilisateur->prenom=$row['prenom'];
		$utilisateur->position=$row['position'];
		return $utilisateur;
	}

	function verifierunamePasswordBase($passwordSaisi) {
		return password_verify($passwordSaisi,$this->password);
	}

	function chargerStocksAutorise() {
		$this->idStockDefaut=null;
		$result = executeSqlSelect("SELECT idStock, defaut FROM stock_autorise where ID=$this->idUtilisateur");
		$this->tStocks=array();
		while($row = mysqli_fetch_array($result)) {
			$idStock=$row['idStock'];
			$this->tStocks[]=$idStock;
			if ($row['defaut']=="O") {
				$this->idStockDefaut=$idStock;
			}
		}
		if ($this->idStockDefaut==null && sizeof($this->tStocks)>0) {
			// Si aucun stock par d�faut n'a �t� trouv�, le premier est consid�r� comme celui par d�faut
			$this->idStockDefaut=$this->tStocks[0];
		}
	}
	
	function autorisePourStock($aIdStock) {
		foreach ($this->tStocks as $idStock) {
			if ($aIdStock==$idStock) return true;
		}
		return false;
	}

	function Positiontype() {
		if ($this->position=="N") {
			return 0;
		}
		elseif ($this->position=="Admin") {
			return 1;
		}
	}

	function update() {
		$sql="update users set nom='".mysqlEscape($this->nom)."', prenom='".mysqlEscape($this->prenom)."', position='".mysqlEscape($this->position)."', password='".mysqlEscape($this->password)."' where ID=$this->idUtilisateur";
		executeSql($sql);
		// Update des stocks autoris�s
		$this->insertUpdateStockAutorise();
	}

	function insert() {
		$sql="insert into users (nom, prenom, user_name, password, position) value ('".mysqlEscape($this->nom)."', '".mysqlEscape($this->prenom)."', '".mysqlEscape($this->uname)."', '".mysqlEscape($this->password)."', '".mysqlEscape($this->position)."')";
		executeSql($sql);
		$this->idUtilisateur=dernierIdAttribue();
		// Insert des stocks autoris�s
		$this->insertUpdateStockAutorise();
	}
	
	static function delete($idUtilisateur) {
		$sql="delete from stock_autorise where ID=$idUtilisateur";
		executeSql($sql);
		$sql="delete from users where ID=$idUtilisateur";
		executeSql($sql);
	}

	function insertUpdateStockAutorise() {
		$sql="delete from stock_autorise where ID=$this->idUtilisateur";
		executeSql($sql);
		foreach ($this->tStocks as $idStock) {
			if ($idStock==$this->idStockDefaut) {
				$estStockDefaut="O";
			} else {
				$estStockDefaut="N";
			}
			$sql="insert into stock_autorise (idStock, ID, defaut) value ($idStock, $this->idUtilisateur, '$estStockDefaut')";
			executeSql($sql);
		}
	}
}
?>