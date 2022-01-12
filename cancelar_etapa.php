<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require "db/configProgastro.php"; // Chamando a conexão 

$num_atd = $_GET['num_atd'];
$etapa  = $_GET['etapa'];


$sql2 = "UPDATE sae_etapas SET $etapa = 'pend' WHERE num_atd = $num_atd AND $etapa != 'concl'";
$stmt = $dbo->exec($sql2);

header('Location: menu.php');


?>