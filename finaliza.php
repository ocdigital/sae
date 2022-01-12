<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require "db/configProgastro.php"; // Chamando a conexão 

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];


$sql = "UPDATE sae_paciente SET situacao = 2 WHERE cod_pac = $cod_pac AND num_atd = $num_atd";
$stmt = $dbo->exec($sql);

require_once "gera_pdf.php";

//header('Location: pacientes.php');


?>