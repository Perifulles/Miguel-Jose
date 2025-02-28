<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar3EnRalla</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

</body>
</html>

<?php
require_once("./class/Partida.php");
require_once("./class/Manager.php");
$Partida = new Partida();
#$Partida->mostrartablero();
$Manager = new Manager("partida.json");
$Manager->insert($Partida);
$Manager->read();



?>