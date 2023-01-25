<?php
include_once("./php/verifSession.php");
session_destroy();
header("Location: ./index.html");
?>