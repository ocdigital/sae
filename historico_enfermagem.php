<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(0);

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

$etapa = 'historico';

if (!isset($cod_pac) || !isset($num_atd)) {
    header('Location: logout.php');
}

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

$result = "SELECT * FROM sae_enfermagem WHERE cod_pac = $cod_pac AND num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
    $historico        =  $item->historico;
    $alergia          =  $item->alergia;
    $alergia_desc     =  $item->alergia_desc;
    $dor              =  $item->dor;
    $dor_desc         =  $item->dor_desc;
    $medicamento      =  $item->medicamento;
    $medicamento_desc =  $item->medicamento_desc;
    $fuma             =  $item->fuma;
    $bebidas          =  $item->bebidas;
    $cardiaco         =  $item->cardiaco;
    $pulmonares       =  $item->pulmonares;
    $andar            =  $item->andar;
}



/*Insere para travar o acesso do Item */
$sql2 = "UPDATE sae_etapas SET $etapa = 'block' WHERE num_atd = $num_atd AND $etapa != 'concl'";
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

        <section class="content_itens">

            <form action="salva_etapa.php" method="post">

                <input type="hidden" name="cod_pac" value="<?php echo $cod_pac ?>">
                <input type="hidden" name="num_atd" value="<?php echo $num_atd ?>">
                <input type="hidden" name="tabela" value="sae_enfermagem">
                <input type="hidden" name="etapa" value="historico">

                <div class="row mb-3">
                    <h5>Atendimento <?php echo $_SESSION['num_atd'] ?></h5>
                    <h3 class="titulo">Histórico de Enfermagem </h3>

                    <div class="form-group mt-2 pb-2 border-bottom">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="historico" id="inlineRadio1" value="1" <?php if ($historico == 1) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                            <label class="form-check-label" for="inlineRadio1">Internado</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="historico" id="inlineRadio2" value="2" <?php if ($historico == 2) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                            <label class="form-check-label" for="inlineRadio2">Ambulatorial</label>
                        </div>
                    </div>

                    <div class="form-group mt-1 mb-1 pb-2 border-bottom">
                        <h5 class="titulo">Alergia medicamentosa</h5>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="alergia" id="inlineRadio11" onchange="mostra_detalhe_alergia()" value="1" <?php if ($alergia == 1) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
                            <label class="form-check-label" for="inlineRadio11">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="alergia" id="inlineRadio12" onchange="esconde_detalhe_alergia()" value="2" <?php if ($alergia == 2) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
                            <label class="form-check-label" for="inlineRadio12">Não</label>
                        </div>
                        <div class="form-group mt-3 mb-3" id="alergia_desc" style="display: none;">
                            <label for="firstname">Qual?</label>
                            <input type="text" class="form-control" name="alergia_desc" value="<?php echo ($alergia_desc) ?>">
                        </div>
                    </div>

                    <div class="form-group mt-1 mb-1 pb-2 border-bottom">
                        <h5 class="titulo">Queixa de dor?</h5>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dor" id="inlineRadio21" onchange="mostra_detalhe_dor()" value="1" <?php if ($dor == 1) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                            <label class="form-check-label" for="inlineRadio21">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dor" id="inlineRadio22" onchange="esconde_detalhe_dor()" value="2" <?php if ($dor == 2) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                            <label class="form-check-label" for="inlineRadio22">Não</label>
                        </div>
                        <div class="form-group mt-3 mb-3" id="dor_desc" style="display: none;">
                            <label for="firstname">Onde?</label>
                            <input type="text" class="form-control" name="dor_desc" value="<?php echo ($dor_desc) ?>">
                        </div>
                    </div>

                    <div class="form-group mt-1 mb-1 pb-2 border-bottom">
                        <h5 class="titulo">Uso de medicamento?</h5>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="medicamento" id="inlineRadio31" onchange="mostra_detalhe_medicamento()" value="1" <?php if ($medicamento == 1) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?>>
                            <label class="form-check-label" for="inlineRadio31">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="medicamento" id="inlineRadio32" onchange="esconde_detalhe_medicamento()" value="2" <?php if ($medicamento == 2) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?>>
                            <label class="form-check-label" for="inlineRadio32">Não</label>
                        </div>
                        <div class="form-group mt-3 mb-3" id="medicamento_desc" style="display: none;">
                            <label for="medicamento_desc">Qual?</label>
                            <input type="text" class="form-control" name="medicamento_desc" value="<?php echo $medicamento_desc; ?>">
                        </div>
                    </div>
                    <div class="form-group mt-1 mb-1 pb-2 border-bottom">
                        <div>
                            <input class="form-check-input" type="checkbox" value="1" name="fuma" id="flexCheckDefault" <?php if ($fuma == 1) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Fuma
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" value="1" name="bebidas" id="flexCheckDefault" <?php if ($bebidas == 1) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Ingestão de bebidas alcoólicas
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" value="1" name="cardiaco" id="flexCheckDefault" <?php if ($cardiaco == 1) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Problemas cardíacos
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" value="1" name="pulmonares" id="flexCheckDefault" <?php if ($pulmonares == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Pulmonares
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" value="1" name="andar" id="flexCheckDefault" <?php if ($andar == 1) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Dificuldade para andar
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


    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        jQuery(document).ready(function(event) {
            if ($('#inlineRadio11').is(':checked')) {
                $('#alergia_desc').fadeIn()
            }
            if ($('#inlineRadio21').is(':checked')) {
                $('#dor_desc').fadeIn()
            }
            if ($('#inlineRadio31').is(':checked')) {
                $('#medicamento_desc').fadeIn()
            }


        });



        function mostra_detalhe_alergia() {
            $('#alergia_desc').fadeIn()
        }

        function esconde_detalhe_alergia() {
            $('#alergia_desc').fadeOut()
        }

        function mostra_detalhe_dor() {
            $('#dor_desc').fadeIn()
        }

        function esconde_detalhe_dor() {
            $('#dor_desc').fadeOut()
        }

        function mostra_detalhe_medicamento() {
            $('#medicamento_desc').fadeIn()
        }

        function esconde_detalhe_medicamento() {
            $('#medicamento_desc').fadeOut()
        }
    </script>


</body>

</html>