<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm= "Alleen voor intern gebruik"');
	header('HTTP/1.0 401 Unauthorized');
	echo 'U drukte op cancel';
	exit;
} elseif ($_SERVER['PHP_AUTH_USER'] == "arjan" && $_SERVER['PHP_AUTH_PW']
	== "pass118") {
	 echo "<p>Je hebt toegang!";
} else {
	header('WWW-Authenticate: Basic realm="Alleen voor intern gebruik"');
	header('HTTP/1.0 401 Unauthorized');
	echo "U hebt geen toegang!!";
}
?>

 