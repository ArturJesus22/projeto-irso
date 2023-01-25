<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "projeto_irso");

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Ocurreu um erro na ligação à base de dados.");
?>