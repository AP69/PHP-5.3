<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pets</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<form action="add_task.php" method="post">
	<fieldset>
	<legend>Zoeken</legend>
	<p>
		<label>Login</label>
		<input name="login" type="text"><br>
		<label>Password</label>
		<input name="Password" type="text">
	</p>
	<input type="submit" name="zoeken"value="Zoeken">
	</fieldset>
</form>
<?php #Script 6 - PDO.php
// haal variable op
	$login= $_POST["login"];
	$Password= $_POST["Password"];
	echo "Hier kunt u inloggen" ." " .$login; 
	echo "Hier kunt uw password invullen" ." " .$Password;
try{
	$pdo = new PDO('mysql:dbname=cursus;host=localhost', 'cursus', 'geheim');

	$sql = "SELECT * FROM users WHERE login='$login' AND Password='$Password'";
	echo $sql;
	echo '<br>';
	$results= $pdo->query($sql);

	$results->setFetchMode(PDO::FETCH_NUM);
	while ($row = $results->fetch()) {
		foreach($row as $value){
			echo $value . ' ';
		}
		echo '<br>';
	}

	unset($pdo);

	
} catch (PDOException $e){
	echo '<p class="error">An error occured: ' . $e->getMessage() . '</p>';
}	
?>