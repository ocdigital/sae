<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(0);

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

$etapa = 'diagnostico';

require "db/configProgastro.php"; // Chamando a conexão 


/*Verifica se está sendo utilizada*/
$result2 = "SELECT * FROM sae_etapas WHERE num_atd = $num_atd AND $etapa ='block'";
$sth2 = $dbo->prepare($result2);
$sth2->execute();
$count = $sth2->rowCount();

if ($count) {
    echo "
    <script>
    alert('Essa etapa já está sendo utiliza')
    window.location = 'menu.php';
    </script>";
}

$result = "SELECT * FROM sae_diagnostico WHERE num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
    $risco_hipoglicemia     =  $item->risco_hipoglicemia;
    $risco_desequilibrio    = $item->risco_desequilibrio;
    $diarreia               = $item->diarreia;
    $risco_sangramento      = $item->risco_sangramento;
    $confusao               = $item->confusao;
    $comunicacao_verbal     = $item->comunicacao_verbal;
    $risco_infeccao         = $item->risco_infeccao;
    $risco_quedas           = $item->risco_quedas;
    $dor                    = $item->dor;
    $nutricao_alterada      = $item->nutricao_alterada;
    $padrao_respiratorio    = $item->padrao_respiratorio;
    $mobilidade_fisica      = $item->mobilidade_fisica;
}
/*Insere para travar o acesso do Item */
$sql2 = "UPDATE sae_etapas SET $etapa = 'block' WHERE num_atd = $num_atd  AND $etapa != 'concl'";
$stmt = $dbo->exec($sql2);

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
    <style>
        body {
            overscroll-behavior-y: contain;
        }

        .block {
            background-color: #e9847d !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" style="color:#fff">
                <span>SOLLEN</span>
            </a>
            <span><?php echo $_SESSION['nome'] ?></span>

        </div>
    </nav>


    <div class="content shadow-sm">

        <form action="salva_etapa.php" method="post">

            <input type="hidden" name="cod_pac" value="<?php echo $cod_pac ?>">
            <input type="hidden" name="num_atd" value="<?php echo $num_atd ?>">
            <input type="hidden" name="tabela" value="sae_diagnostico">
            <input type="hidden" name="etapa" value="diagnostico">


            <div class="row mb-3">
                <h2 class="titulo">Diagnóstico de Enfermagem</h4>
                    <section class="content_itens border-bottom">
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="risco_hipoglicemia" value="1" id="flexCheckDefault" <?php if ($risco_hipoglicemia == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Risco de hipoglicemia relacionada ao preparo
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="risco_desequilibrio" value="1" id="flexCheckDefault" <?php if ($risco_desequilibrio == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Risco de desequilíbrio hidroeletrolítico relacionada ao
                                    preparo
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="diarreia" value="1" id="flexCheckDefault" <?php if ($diarreia == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Diarréia
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="risco_sangramento" value="1" id="flexCheckDefault" <?php if ($risco_sangramento == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Risco de sangramento
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="confusao" value="1" id="flexCheckDefault" <?php if ($confusao == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Confusão crônica
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="comunicacao_verbal" value="1" id="flexCheckDefault" <?php if ($comunicacao_verbal == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Comunicação verbal prejudicada
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="risco_infeccao" value="1" id="flexCheckDefault" <?php if ($risco_infeccao == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Risco de infecção devido procedimento invasivo
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="risco_quedas" value="1" id="flexCheckDefault" <?php if ($risco_quedas == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Risco de quedas
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="dor" value="1" id="flexCheckDefault" <?php if ($dor == 1) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Dor aguda
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="nutricao_alterada" value="1" id="flexCheckDefault" <?php if ($nutricao_alterada == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Nutrição alterada mais que as necessidades corporais
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="padrao_respiratorio" value="1" id="flexCheckDefault" <?php if ($padrao_respiratorio == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Padrão respiratório ineficaz
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="mobilidade_fisica" value="1" id="flexCheckDefault" <?php if ($mobilidade_fisica == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Mobilidade física prejudicada
                                </label>
                            </div>
                        </div>

                    </section>


                    <input type="hidden" name="assinatura" value="<?php echo "assinaturas/" . $_SESSION['assinatura'] ?>">
                    <p><small><?php echo $_SESSION['nome'] . "-" . $_SESSION['tipo'] . ": " . $_SESSION['cod_user'] ?></small></p>
                    <div style="max-width:150px"><img src=" <?php echo "assinaturas/" . $_SESSION['assinatura'] ?>" alt="" height="50px" /></div>
            </div>

    </div>


    <div class="bottom footer mt-4">
        <a href="cancelar_etapa.php?num_atd=<?php echo $num_atd ?>&etapa=<?php echo $etapa ?>"><button type="button" class="btn btn-danger btn-lg">Cancelar</button></a>
        <button type="submit" class="btn btn-success btn-lg">Salvar</button>
    </div>

    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>


</body>

</html>