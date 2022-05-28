<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	//error_reporting(E_ALL ^ E_DEPRECATED);
	session_start();
	unset($_SESSION["fichierConfiguration"]);
	require "header1.php";
	$login="";
	$password="";
	if (isset($_COOKIE['login'])) $login=$_COOKIE['login'];
	if (isset($_COOKIE['password'])) $password=$_COOKIE['password'];
	$messageLoginIncorrect="";
	if (isset($_GET['erreur'])) {
		$erreur=$_GET['erreur'];
		if ($erreur=="passwordIncorrectBase") $messageLoginIncorrect='<span class="erreur">Mot de passe local incorrect !</span>';
		if ($erreur=="passwordIncorrectLDAP") $messageLoginIncorrect='<span class="erreur">Mot de passe Windows incorrect !</span>';
		if ($erreur=="loginIncorrect")        $messageLoginIncorrect='<span class="erreur">Login incorrect !</span>';
		if ($erreur=="aucunStockAutorise")    $messageLoginIncorrect='<span class="erreur">Vous n\'avez à aucun stock !<br>Veuillez contacter l\'administrateur de l\'application.</span>';
	}
?>
<div class="tableLoginGSS">
	<div class="fortable1">
		<p>Systeme de gestion de stock</p>
		<img class="logo_image1" src="/img/LOGOACHOUR.png">
	</div>
	<div class="fortable2">
		<div class="table2_content">
				<?php echo $messageLoginIncorrect;?>
				<p class="p1">LOGIN:</p>
				<br>
				<form method="POST" action="login_trt.php">
				<p class="p2">Utilisateur &emsp;&ensp;: <input spellcheck="false" type="text" name="txtLogin" value="<?php echo $login;?>" <?php if ($login=="") echo "autofocus";?>><br><br></p>
				<p class="p2">Mot de passe : <input type="password" name="txtPassword" value="<?php echo $password;?>"></p>
				<br><br><br>
				<button type="submit" class="bouton1" <?php if ($login!="") echo "autofocus";?>>Connexion</button>
				</form>
				<br><br>
		</div>
	</div>
</div>
</body>
</html>