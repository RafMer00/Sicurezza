<?php
$conn = new mysqli("localhost","root","password");
if ($conn->connect_error) {
	die("Conn failed: ".$conn->conncet_error);
}
else
echo "Connection OK";
?>
