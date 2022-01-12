<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

session_start();

if($_SESSION['logado'] == 1){
    header('Location: pacientes.php');
}else{
    header('Location: login.php');
}

?>