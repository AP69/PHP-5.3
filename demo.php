<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Constructors and Destructors</title>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<?php # Script 4.7 - demo.php
	class demo {
		function __construct() {
			echo '<p>In the constructor.</p>';
		}	
		
		function __destruct() {
			echo '<p>In the destructor.</p>';
		}
		
	}
		function test() {
			echo '<p>In the function. Creating a new object...</p>';
			$f = new demo();
			echo '<p>About to leave the function.</p>';
		}
		echo '<p>Creating a new object...</p>';
		$o = new demo();
		
		echo '<p>Calling the function...</p>';
		test();
		echo '<p>About to delete the object...</p>';
		unset($o);
		echo '<p>End of the script.</p>';
	?>
	</body>
	</html>
		