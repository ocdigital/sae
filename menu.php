<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

header("Refresh:5");

session_start();


if(isset($_GET['cod_pac'])){
    $_SESSION['cod_pac'] = $_GET['cod_pac'];
}

if(isset($_GET['num_atd'])){
    $_SESSION['num_atd'] = $_GET['num_atd'];
}

$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd']; 




require "db/configProgastro.php"; // Chamando a conexão 

$result = "SELECT * FROM sae_paciente WHERE num_atd = '$num_atd' and cod_pac = '$cod_pac'";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
    $cod_pac  =  $item->cod_pac;
    $nome_pac =  $item->nome;
    $num_atd  =  $item->num_atd;
    $idade    =  $item->idade;
    $convenio =  $item->convenio;
    $exame    =  $item->exames;
}

$_SESSION['nome_pac'] = $nome_pac;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sollen</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" style="color:#fff">
                <span>SOLLEN</span>               
            </a>
             <span><?php echo $_SESSION['nome']?></span>
        
        </div>
    </nav>
    <div class="content shadow-sm">

        <div class="row">
             
            <div class="col-6">
                <h6>Atendimento <?php echo $_SESSION['num_atd']?></h6>
                <h6>Código do Paciente: <?php echo $_SESSION['num_atd'] ?></h6>
                <h6>Nome: <?php echo $nome_pac ?></h6>               
            </div>
            <div class="col-6">
                <h6>Exame: <?php echo $exame?></h6>
                <h6>Idade: <?php echo $idade ?> Convenio: <?php echo $convenio ?></h6>
            </div>

        </div>
        <?php
        $result2 = "SELECT * FROM sae_etapas where num_atd =  $num_atd";
        $sth2 = $dbo->prepare($result2);
        $sth2->execute();
        $etapas2 = $sth2->fetchAll(PDO::FETCH_OBJ);
        if(!$etapas2){
            $sql = "INSERT INTO sae_etapas(cod_pac,num_atd) VALUES ($cod_pac, $num_atd)";
            $stmt = $dbo->exec($sql);
        }

        $result3 = "SELECT * FROM sae_etapas where num_atd =  $num_atd";
        $sth3 = $dbo->prepare($result2);
        $sth3->execute();
        $etapas = $sth3->fetchAll(PDO::FETCH_OBJ);
        foreach ($etapas as $etapa) {
        ?>

        <hr>


            <div class="row justify-content-center">
                  <h4 class="titulo">SISTEMATIZAÇÃO DA ASSISTÊNCIA DA ENFERMAGEM</h4>
                <div class="col-6">
                    <a href="historico_enfermagem.php" <?php if($etapa->historico == 'block') echo "class='disabled'"?>><button type="button" class="btn   shadow-sm button-item  <?php echo $etapa->historico ?>" >Histórico de Enfermagem</button></a>
                </div>
                <div class="col-6">
                    <a href="diagnostico_enfermagem.php" <?php if($etapa->diagnostico == 'block') echo "class='disabled'"?>><button type="button" class="btn  shadow-sm button-item <?php echo $etapa->diagnostico ?>">Diagnóstico de Enfermagem</button></a>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <h4 class="titulo">EXECUÇÃO DA PRESCRIÇÃO DE ENFERMAGEM</h4>
                <div class="col-4">
                    <a href="sala_preatendimento.php" <?php if($etapa->pre_atendimento == 'block') echo "class='disabled'"?>><button type="button" class="btn  shadow-sm button-item <?php echo $etapa->pre_atendimento ?>">Sala de pré atendimento</button></a>
                </div>
                <div class="col-4">
                    <a href="sala_exames.php" <?php if($etapa->sala_exames == 'block') echo "class='disabled'"?>><button type="button" class="btn  shadow-sm button-item <?php echo $etapa->sala_exames ?>">Sala de exames</button></a>
                </div>
                <div class="col-4">
                    <a href="recuperacao.php" <?php if($etapa->recuperacao == 'block') echo "class='disabled'"?>><button type="button" class="btn  shadow-sm button-item <?php echo $etapa->recuperacao ?>">Recuperação</button></a>
                </div>

            </div>
            <div class="row justify-content-center mt-4">
                <h4 class="titulo">PROCEDIMENTO REALIZADO</h4>
                <div class="col-4">
                    <a href="endoscopia.php" <?php if($etapa->endoscopia == 'block') echo "class='disabled'"?>><button type="button" class="btn shadow-sm button-item <?php echo $etapa->endoscopia ?>">Endoscopia</button></a>
                </div>
                <div class="col-4">
                    <a href="colonoscopia.php" <?php if($etapa->colonoscopia == 'block') echo "class='disabled'"?>><button type="button" class="btn shadow-sm button-item <?php echo $etapa->colonoscopia ?>">Colonoscopia ou Retosigmoidoscopia</button></a>
                </div>
                <div class="col-4">
                    <a href="prescricao.php" <?php if($etapa->prescricao == 'block') echo "class='disabled'"?>><button type="button" class="btn  shadow-sm button-item <?php echo $etapa->prescricao ?>">Prescrição Médica</button></a>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-6">
                    <a href="intercorrencias.php" <?php if($etapa->intercorrencias == 'block') echo "class='disabled'"?>><button type="button" class="btn  shadow-sm  button-item <?php echo $etapa->intercorrencias ?>">Intercorrências</button></a>
                </div>
                <div class="col-6">
                    <a href="liberacao.php" <?php if($etapa->liberacao == 'block') echo "class='disabled'"?>><button type="button" class="btn  shadow-sm button-item <?php echo $etapa->liberacao ?>">Liberação do paciente pela Enfermagem</button></a>
                </div>

            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-12">
                    <a href="finaliza.php"><button type="button" class="btn btn-success  shadow-sm  button-item ">Finalizar</button></a>
                </div>  
            </div>

            <div class="row justify-content-center mt-1">
                <div class="col-12">
                    <a href="pdfs/<?php echo $num_atd.'.pdf'?>"><button type="button" class="btn btn-light  shadow-sm  button-item ">Abrir PDF</button></a>
                </div>  
            </div>
    </div>
<?php } ?>

<div class="bottom footer-menu mt-4">
    <a href="pacientes.php"><button type="button" class="btn btn-light btn-lg">Pacientes</button></a>
    <a href="logout.php"><button type="button" class="btn btn-danger btn-lg">Sair</button></a>
</div>



<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>

</html>