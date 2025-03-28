<?php
	function executeSql($sql) {
		global $link;
		mysqli_query($link, $sql) or die('Erreur SQL ! '.$sql.'<br>'.mysqli_error($link));
	}

	function beginTransaction() {
		global $link;
		mysqli_autocommit($link, FALSE);
	}

	function commit() {
		global $link;
		mysqli_commit($link);
		mysqli_autocommit($link, TRUE);
	}

	function rollback() {
		global $link;
		mysqli_rollback($link);
	}

	function executeSqlSelect($sql) {
		global $link;
		return mysqli_query($link, $sql);
	}

	function nullSiVide($val) {
		if ($val=="") {
			$ret="null";
		} else {
			$ret=$val;
		}
		return $ret;
	}
	
	function nullSiVideStr($val) {
		if ($val=="") {
			$ret="null";
		} else {
			$ret="'$val'";
		}
		return $ret;
	}

	function dernierIdAttribue() {
		global $link;
		return mysqli_insert_id($link);
	}
	
	function mysqlEscape($value) {
		global $link;
		$value = mysqli_real_escape_string($link, $value);
		return $value;
	}

	function date_fr($date) {
		$datefr="";
		if (!is_null($date)) {
			$a = substr($date, 0, 4);
			$m = substr($date, 5, 2);
			$j = substr($date, 8, 2);
			$datefr=$j.'/'.$m.'/'.$a;
		}
		return $datefr;
	}

	function getMois($dateFr) {
		return substr($dateFr, 3, 2);
	}

	function dateMySql($date) {
		$dateSql="null";
		if (!is_null($date) && $date!="") {
			$date=str_replace("-","/",$date);
			$tDate = explode("/", $date);
			$j = $tDate[0];
			$m = $tDate[1];
			$a = $tDate[2];
			$dateSql="'$a-$m-$j'";
		}
		return $dateSql;
	}
?>