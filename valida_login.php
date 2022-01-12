<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

session_start();

require "db/configProgastro.php"; // Chamando a conexão 

$user = $_POST['usuario'];
$pass = $_POST['senha'];

$result = "SELECT * FROM usuarios WHERE cod_user = '$user' AND senha = '$pass'";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
    $acesso     = $item->acesso;
    $assinatura = $item->assinatura;
    $nome       = $item->nome;
    $cod_user   = $item->cod_user;
    $tipo       = $item->tipo_registro;
   
}
/*Salva assinatura para PDF*/
$url = $assinatura;
$img = "assinaturas/$cod_user.png";
file_put_contents($img, file_get_contents($url));

if($acesso == 1){
    header('Location: pacientes.php');
    $_SESSION['logado']     = 1;
    $_SESSION['assinatura'] = $assinatura;
    $_SESSION['nome']       = $nome;
    $_SESSION['cod_user']   = $cod_user;
    $_SESSION['tipo']       = $tipo;
}else{
    header('Location: login.php?return=error');
}

?>