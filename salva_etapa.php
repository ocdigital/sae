<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require "db/configProgastro.php"; // Chamando a conexão 

$tabela = $_POST['tabela'];
$etapa  = $_POST['etapa'];

$into = '';
$values = '';



foreach ($_POST as $chave => $valor) {   
    if($chave == 'tabela' || $chave == 'etapa'){
        unset($_POST[$chave]);
    }else{
        $into .= "$chave, ";
        $values .= "'$valor', ";  
    }
          
}

//Retira o Último ', '
$into = trim($into, ", ");
$values = trim($values, ", ");


$sql = "INSERT INTO $tabela($into) VALUES ($values)";

$stmt = $dbo->exec($sql);

if (!$stmt) {
    echo "\nPDO::errorInfo():\n";
    print_r($dbo->errorInfo());
}


$sql2 = "UPDATE sae_etapas SET $etapa = 'concl'";
$stmt = $dbo->exec($sql2);

header('Location: menu.php');


?>