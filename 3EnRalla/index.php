<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar3EnRalla</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="post">
        <input type="submit" name="reset" value="Reset">
    </form>
</body>
</html>

<?php
require_once("./class/Partida.php");
require_once("./class/Manager.php");


$Partida = new Partida();
$Manager = new Manager("partida.json");

$Inicio = isset($_POST["borrar"]) ? True : False;
$Inicio = isset($_POST["reset"]) ? False : True;
if($Inicio == false){
$Manager->insert($Partida);}


$movimiento = isset($_POST["borrar"]) ? $_POST["borrar"] : "";
$Partida->turno($Manager);
$Partida->jugada($movimiento, $Manager);
$Manager->read();
$ganador =$Partida->ganador($Manager);

if ($ganador == false){}
elseif($ganador == true){
    echo "La partida ha terminado";
}




?>