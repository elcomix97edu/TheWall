<?php

$inicio = "<html>
				<head>
					<meta charset=utf-8>
				</head>
				
				<body>
					<div class='wrapper'>";
$Final = "</div></body></html>";

require_once 'login.php';
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
mysqli_set_charset($conn, 'utf8');
print($inicio);
$result = mysqli_query($conn, "SELECT * FROM mensaje ORDER BY id DESC ;");
//LIMIT 2500 limitador consulta sql
while ($row = mysqli_fetch_assoc($result))
{
	echo("<div class='text'><p class='content'>" . $row["valor"] . " " . $row["fecha"] . "</p></div>");
}
print($Final);
?>