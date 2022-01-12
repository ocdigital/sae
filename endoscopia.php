<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(0);

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

$etapa = 'endoscopia';

require "db/configProgastro.php"; // Chamando a conexão 


/*Verifica se está sendo utilizada*/
$result2 = "SELECT * FROM sae_etapas WHERE num_atd = $num_atd AND $etapa ='block'";
$sth2 = $dbo->prepare($result2);
$sth2->execute();
$count = $sth2->rowCount();

// if ($count) {
//     echo "
//     <script>
//     alert('Essa etapa já está sendo utiliza')
//     window.location = 'menu.php';
//     </script>";
// }

$result = "SELECT * FROM sae_endoscopia WHERE num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {

    $frasco1      = $item->frasco1;
    $frasco2      = $item->frasco2;
    $frasco3      = $item->frasco3;
    $frasco4      = $item->frasco4;
    $ligadura     = $item->ligadura;
    $dilatacao    = $item->dilatacao;
    $balao_gastro = $item->balao_gastro;
    $argonio      = $item->argonio;
    $observacoes  = $item->observacoes;
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

        label {
            font-size: 14px !important;
            margin-top: 10px
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
            <input type="hidden" name="tabela" value="sae_endoscopia">
            <input type="hidden" name="etapa" value="endoscopia">

            <section class="content_itens border-bottom">
                <div class="row mb-3">
                    <h3 class="titulo">Endoscopia</h3>
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <div class="accordion" id="accordionExample1" style="display: block;">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header text-center" id="title">
                                        </h2>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingZero">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseZero" aria-expanded="false" aria-controls="collapseOne">
                                                UREASE
                                            </button>
                                        </h2>
                                        <div id="collapseZero" class="accordion-collapse collapse" aria-labelledby="headingZero" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco0" id="inlineRadio01" value="1" <?php if ($frasco1 == 1) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio0">ESÔFAGO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco0" id="inlineRadio02" value="2" <?php if ($frasco1 == 2) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio0">FUNDO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco0" id="inlineRadio03" value="3" <?php if ($frasco1 == 3) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio0">MUCOSA ESTOMACA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco0" id="inlineRadio04" value="4" <?php if ($frasco1 == 4) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio0">CORPO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco0" id="inlineRadio05" value="5" <?php if ($frasco1 == 5) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">PILORO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco0" id="inlineRadio06" value="6" <?php if ($frasco1 == 6) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">ANTRO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco0" id="inlineRadio07" value="7" <?php if ($frasco1 == 7) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">DUODENO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco0" id="inlineRadio08" value="8" <?php if ($frasco1 == 8) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">MUCOSECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco0" id="inlineRadio09" value="9" <?php if ($frasco1 == 9) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">POLIPECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco0" id="inlineRadio10" value="10" <?php if ($frasco1 == 10) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">BIÓPISIA</label>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                FRASCO 1
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio1" value="1" <?php if ($frasco1 == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio1">ESÔFAGO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio2" value="2" <?php if ($frasco1 == 2) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">FUNDO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio3" value="3" <?php if ($frasco1 == 3) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">MUCOSA ESTOMACA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio4" value="4" <?php if ($frasco1 == 4) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">CORPO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio5" value="5" <?php if ($frasco1 == 5) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">PILORO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio6" value="6" <?php if ($frasco1 == 6) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">ANTRO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio7" value="7" <?php if ($frasco1 == 7) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">DUODENO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio8" value="8" <?php if ($frasco1 == 8) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">MUCOSECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio9" value="9" <?php if ($frasco1 == 9) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">POLIPECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio10" value="10" <?php if ($frasco1 == 10) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">BIÓPISIA</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                FRASCO 2
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio11" value="1" <?php if ($frasco2 == 1) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio11">ESÔFAGO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio12" value="2" <?php if ($frasco2 == 2) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio12">FUNDO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio13" value="3" <?php if ($frasco2 == 3) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio13">MUCOSA ESTOMACA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio14" value="4" <?php if ($frasco2 == 4) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio14">CORPO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio15" value="5" <?php if ($frasco2 == 5) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio15">PILORO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio16" value="6" <?php if ($frasco2 == 6) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio16">ANTRO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio17" value="7" <?php if ($frasco2 == 7) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio17">DUODENO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio18" value="8" <?php if ($frasco1 == 8) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio18">MUCOSECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio19" value="9" <?php if ($frasco1 == 9) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio19">POLIPECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio20" value="10" <?php if ($frasco1 == 10) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio20">BIÓPISIA</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTree" aria-expanded="false" aria-controls="collapseTree">
                                                FRASCO 3
                                            </button>
                                        </h2>
                                        <div id="collapseTree" class="accordion-collapse collapse" aria-labelledby="headingTree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio21" value="1" <?php if ($frasco3 == 1) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio21">ESÔFAGO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio22" value="2" <?php if ($frasco3 == 2) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio22">FUNDO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio23" value="3" <?php if ($frasco3 == 3) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio23">MUCOSA ESTOMACA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio24" value="4" <?php if ($frasco3 == 4) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio24">CORPO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio25" value="5" <?php if ($frasco3 == 5) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio25">PILORO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio26" value="6" <?php if ($frasco3 == 6) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio26">ANTRO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio27" value="7" <?php if ($frasco3 == 7) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio27">DUODENO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio28" value="8" <?php if ($frasco1 == 8) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio28">MUCOSECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio29" value="9" <?php if ($frasco1 == 9) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio29">POLIPECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio30" value="10" <?php if ($frasco1 == 10) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio30">BIÓPISIA</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                                                FRASCO 4
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio31" value="1" <?php if ($frasco4 == 1) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio31">ESÔFAGO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio32" value="2" <?php if ($frasco4 == 2) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio32">FUNDO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio33" value="3" <?php if ($frasco4 == 3) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio33">MUCOSA ESTOMACA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio34" value="4" <?php if ($frasco4 == 4) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio34">CORPO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio35" value="5" <?php if ($frasco4 == 5) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio35">PILORO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio36" value="6" <?php if ($frasco4 == 6) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio36">ANTRO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio37" value="7" <?php if ($frasco4 == 7) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio37">DUODENO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio38" value="8" <?php if ($frasco1 == 8) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio38">MUCOSECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio39" value="9" <?php if ($frasco1 == 9) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio39">POLIPECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio40" value="10" <?php if ($frasco1 == 10) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio40">BIÓPISIA</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                LIGADURA
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ligadura" id="inlineRadio42" value="1" <?php if ($ligadura == 1 || empty($ligadura)) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio42">NÃO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ligadura" id="inlineRadio42" value="2" <?php if ($ligadura == 2) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio42">SIM</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                DILATAÇÃO
                                            </button>
                                        </h2>
                                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dilatacao" id="inlineRadio52" value="1" <?php if ($dilatacao == 1 || empty($dilatacao)) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio52">NÃO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dilatacao" id="inlineRadio52" value="2" <?php if ($dilatacao == 2) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio52">SIM</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEight">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                BALÃO GÁSTRICO
                                            </button>
                                        </h2>
                                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="balao_gastro" id="inlineRadio62" value="1" <?php if ($balao_gastro == 1 || empty($balao_gastro)) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                                                    <label class="form-check-label" for="inlineRadio62">NÃO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="balao_gastro" id="inlineRadio62" value="2" <?php if ($balao_gastro == 2) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                                                    <label class="form-check-label" for="inlineRadio62">SIM</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingNine">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                ARGÔNIO
                                            </button>
                                        </h2>
                                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="argonio" id="inlineRadio72" value="1" <?php if ($argonio == 1 || empty($argonio)) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio72">NÃO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="argonio" id="inlineRadio72" value="2" <?php if ($argonio == 2) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio72">SIM</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTen">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                OBSERVAÇÕES
                                            </button>
                                        </h2>
                                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <textarea class="form-control" name="observacoes" id="" cols="30" rows="10"><?php if ($observacoes) echo $observacoes ?></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
            </section>
            <input type="hidden" name="assinatura" value="<?php echo "assinaturas/" . $_SESSION['assinatura'] ?>">
            <p><small><?php echo $_SESSION['nome'] . "-" . $_SESSION['tipo'] . ": " . $_SESSION['cod_user'] ?></small></p>
            <div style="max-width:150px"><img src=" <?php echo "assinaturas/" . $_SESSION['assinatura'] ?>" alt="" height="50px" /></div>
    </div>
    </div>
    </div>
    </div>

    <div class="bottom footer-menu mt-4">
        <a href="cancelar_etapa.php?num_atd=<?php echo $num_atd ?>&etapa=<?php echo $etapa ?>"><button type="button" class="btn btn-danger btn-lg">Cancelar</button></a>
        <button type="submit" class="btn btn-success btn-lg">Salvar</button>
    </div>

    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $('#nav-tab a').on('click', function(event) {
            event.preventDefault()
            $(this).tab('show')
        })

        function selectItem(item) {
            $('#title').html(item);
            $('#accordionExample1').show();
        }
    </script>
</body>

</html>