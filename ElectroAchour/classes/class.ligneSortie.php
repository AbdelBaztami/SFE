<?php
class ligneSortie {
	var $sortie;
	var $article;
	var $prixTTCSortie;
	var $Avance;
	var $quantite;
	var $beneficiaire;
	
	static function instanceDepuisSqlRow($row, $sortie, $stock) {
		$article=article::instanceDepuisSqlRow($row, $stock);
		$ligneSortie = new ligneSortie();
		$ligneSortie->sortie=$sortie;
		$ligneSortie->article=$article;
		$ligneSortie->prixTTCSortie=$row['prixTTCSortie'];
		$ligneSortie->Avance=$row['Avance'];
		$ligneSortie->quantite=$row['quantite'];
		$ligneSortie->beneficiaire=$row['beneficiaire'];
		return $ligneSortie;
	}

	function update() {
		$idArticle=$this->article->idArticle;
		$idSortie=$this->sortie->idSortie;
		$prixTTCSortie=nullSiVide($this->prixTTCSortie);
		$Avance=$this->sortie->Avance;
		$quantite=$this->quantite;
		$beneficiaire=nullSiVideStr(mysqlEscape($this->beneficiaire));
		$sql="update ligne_sortie set prixTTCSortie=$prixTTCSortie, Avance=$Avance, quantite=$quantite, beneficiaire=$beneficiaire where idArticle=$idArticle and idSortie=$idSortie";
		executeSql($sql);
	}
	
	function delete() {
		$idArticle=$this->article->idArticle;
		$idSortie=$this->sortie->idSortie;
		$sql="delete from ligne_sortie where idArticle=$idArticle and idSortie=$idSortie";
		executeSql($sql);
		// Suppression de l'article correspondant, s'il n'est pas utilisé dans une sortie
		article::purge();
	}

	function insert() {
		$idArticle=$this->article->idArticle;
		$idSortie=$this->sortie->idSortie;
		$prixTTCSortie=nullSiVide($this->prixTTCSortie);
		$Avance=$this->sortie->Avance;
		$quantite=$this->quantite;
		$beneficiaire=nullSiVideStr(mysqlEscape($this->beneficiaire));
		$sql="insert into ligne_sortie (idArticle, idSortie, prixTTCSortie,Avance, quantite, beneficiaire) values ($idArticle, $idSortie, $prixTTCSortie, $Avance, $quantite, $beneficiaire)";
		executeSql($sql);
	}
}
?>