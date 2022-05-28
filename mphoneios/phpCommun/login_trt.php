<?php
// session_start(); 
// require "db_connection.php";

// if (isset($_POST['uname']) && isset($_POST['password'])) {

// 	$uname =$_POST['uname'];
// 	$pass =$_POST['password'];

// 	if (empty($uname)) {
// 		header("Location: login.php?error=User Name is required");
// 	    exit();
// 	}
// 	else if(empty($pass)){
//         header("Location: login.php?error=Password is required");
// 	    exit();
// 	}
// 	else{
// 		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

// 		$result = mysqli_query($link, $sql);

// 		if (mysqli_num_rows($result) === 1) {
// 			$row = mysqli_fetch_assoc($result);
			
//             if ($row['user_name'] === $uname && $row['password'] === $pass) {
//             	$_SESSION['user_name'] = $row['user_name'];
//             	$_SESSION['name'] = $row['name'];
//             	$_SESSION['id'] = $row['id'];
//             	header("Location: ../phpAdmin/home.php");
// 		        exit();
//             }
// 			else{
// 				header("Location: login.php?error=Incorect User name or password");
// 		        exit();
// 			}
// 		}
// 		else{
// 			header("Location: login.php?error=Incorect Username or password");
// 	        exit();
// 		}
// 	}
	
// }
// else{
// 	header("Location: login.php");
// 	exit();
// 	}
?>

<?php
	header("Expires: Mon, 26 Jul 2000 05:00:00 GMT");
	require_once "../phpCommun/fonctionsSql.php";
	require_once "../classes/class.utilisateur.php";
	session_start();
	require_once "../phpCommun/db_connection.php";
	
	$uname=$_POST["uname"];
	$passwordSaisi=$_POST["password"];
	$utilisateur=utilisateur::charger($uname);
	$passwordRenseigne=($utilisateur->password!="");
	if ($utilisateur!=FALSE) {
		if ($passwordRenseigne) {
			$bPassword=$utilisateur->verifierunamePasswordBase($passwordSaisi);
		}
		if ($bPassword==1) {
			if (($utilisateur->Positiontype())==1) {
				$redirigeVers="../phpAdmin/homeAdmin.php";
				$_SESSION["estConnecte"]="OUI";
				$_SESSION["Positiontype"]="Admin";
				$_SESSION["idStock"]=$utilisateur->idStockDefaut;
				$_SESSION["utilisateur"]=$utilisateur;
			} else {
				if ($utilisateur->idStockDefaut!=null) {
					$redirigeVers="../phpUtilisateur/pagePrincipale.php";
					$_SESSION["estConnecte"]="OUI";
					$_SESSION["idStock"]=$utilisateur->idStockDefaut;
					$_SESSION["utilisateur"]=$utilisateur;
				} else {
					$redirigeVers="../phpCommun/login.php?erreur=aucunStockAutorise";
				}
			}
		} else {
			if ($passwordRenseigne) {
				$erreur="passwordIncorrectBase"; 
			}
			$redirigeVers="../phpCommun/login.php?erreur=".$erreur;
		}
	} else {
		$redirigeVers="../phpCommun/login.php?erreur=loginIncorrect";
	}
	header("Location: $redirigeVers");
?>