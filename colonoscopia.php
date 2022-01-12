<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(0);

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

$etapa = 'colonoscopia';

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

$result = "SELECT * FROM sae_colonoscopia WHERE num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {

    $frasco1     = $item->frasco1;
    $frasco2     = $item->frasco2;
    $frasco3     = $item->frasco3;
    $frasco4     = $item->frasco4;
    $frasco5     = $item->frasco5;
    $frasco6     = $item->frasco6;
    $observacoes = $item->observacoes;
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

            <input type="hidden" name="cod_pac" valu e="<?php echo $cod_pac ?>">
            <input type="hidden" name="num_atd" value="<?php echo $num_atd ?>">
            <input type="hidden" name="tabela" value="sae_colonoscopia">
            <input type="hidden" name="etapa" value="colonoscopia">


            <section class="content_itens border-bottom">
                <div class="row  mb-3">
                    <h3 class="titulo">Colonoscopia</h3>
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <div class="accordion" id="accordionExample1" style="display: block;">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header text-center" id="title">
                                        </h2>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                FRASCO 1
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio1" value="1" <?php if ($frasco1 == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio1">ÂNGULO HEPÁTICO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio2" value="2" <?php if ($frasco1 == 2) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">ÂNGULO ESPLÊNICO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio3" value="3" <?php if ($frasco1 == 3) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio3">TRANSVERSO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio4" value="4" <?php if ($frasco1 == 4) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio4">ASCENDENTE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio5" value="5" <?php if ($frasco1 == 5) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio5">DESCENDENTE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio6" value="6" <?php if ($frasco1 == 6) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio6">ÍLEO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio7" value="7" <?php if ($frasco1 == 7) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio7">CECO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio8" value="8" <?php if ($frasco1 == 8) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio8">SIGMÓIDE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio9" value="9" <?php if ($frasco1 == 9) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                    <label class="form-check-label" for="inlineRadio9">RETO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio10" value="10" <?php if ($frasco1 == 10) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio10">MUCOSECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio101" value="11" <?php if ($frasco1 == 11) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio101">POLIPECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco1" id="inlineRadio102" value="12" <?php if ($frasco1 == 12) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio102">BIÓPISIA</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTree" aria-expanded="false" aria-controls="collapseTree">
                                                FRASCO 2
                                            </button>
                                        </h2>
                                        <div id="collapseTree" class="accordion-collapse collapse" aria-labelledby="headingTree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio11" value="1" <?php if ($frasco2 == 1) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio11">ÂNGULO HEPÁTICO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio12" value="2" <?php if ($frasco2 == 2) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio12">ÂNGULO ESPLÊNICO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio13" value="3" <?php if ($frasco2 == 3) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio13">TRANSVERSO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio14" value="4" <?php if ($frasco2 == 4) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio14">ASCENDENTE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio15" value="5" <?php if ($frasco2 == 5) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio15">DESCENDENTE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio16" value="6" <?php if ($frasco2 == 6) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio16">ÍLEO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio17" value="7" <?php if ($frasco2 == 7) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio17">CECO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio18" value="8" <?php if ($frasco2 == 8) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio18">SIGMÓIDE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio19" value="9" <?php if ($frasco2 == 9) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio19">RETO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio20" value="10" <?php if ($frasco2 == 10) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio20">MUCOSECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio201" value="11" <?php if ($frasco2 == 11) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio201">POLIPECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco2" id="inlineRadio202" value="12" <?php if ($frasco2 == 12) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio202">BIÓPISIA</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                                                FRASCO 3
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio21" value="1" <?php if ($frasco3 == 1) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio21">ÂNGULO HEPÁTICO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio22" value="2" <?php if ($frasco3 == 2) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio22">ÂNGULO ESPLÊNICO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio23" value="3" <?php if ($frasco3 == 3) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio23">TRANSVERSO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio24" value="4" <?php if ($frasco3 == 4) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio24">ASCENDENTE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio25" value="5" <?php if ($frasco3 == 5) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio25">DESCENDENTE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio26" value="6" <?php if ($frasco3 == 6) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio26">ÍLEO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio27" value="7" <?php if ($frasco3 == 7) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio27">CECO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio28" value="8" <?php if ($frasco3  == 8) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio28">SIGMÓIDE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio29" value="9" <?php if ($frasco3  == 9) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio29">RETO</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio30" value="10" <?php if ($frasco3 == 10) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio30">MUCOSECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio301" value="11" <?php if ($frasco3 == 11) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio301">POLIPECTOMIA</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frasco3" id="inlineRadio302" value="12" <?php if ($frasco3 == 12) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="inlineRadio302">BIÓPISIA</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            FRASCO 4
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio31" value="1" <?php if ($frasco4 == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio31">ÂNGULO HEPÁTICO</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio32" value="2" <?php if ($frasco4 == 2) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio32">ÂNGULO ESPLÊNICO</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio33" value="3" <?php if ($frasco4 == 3) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio33">TRANSVERSO</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio34" value="4" <?php if ($frasco4 == 4) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio34">ASCENDENTE</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio35" value="5" <?php if ($frasco4 == 5) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio35">DESCENDENTE</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio36" value="6" <?php if ($frasco4 == 6) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio36">ÍLEO</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio37" value="7" <?php if ($frasco4 == 7) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio37">CECO</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio38" value="8" <?php if ($frasco4 == 8) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio38">SIGMÓIDE</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio39" value="9" <?php if ($frasco4 == 9) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio39">RETO</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio40" value="10" <?php if ($frasco4 == 10) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio40">MUCOSECTOMIA</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio401" value="11" <?php if ($frasco4 == 11) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio401">POLIPECTOMIA</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="frasco4" id="inlineRadio402" value="12" <?php if ($frasco4 == 12) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio402">BIÓPISIA</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        FRASCO 5
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio41" value="1" <?php if ($frasco5 == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio41">ÂNGULO HEPÁTICO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio42" value="2" <?php if ($frasco5 == 2) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio42">ÂNGULO ESPLÊNICO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio43" value="3" <?php if ($frasco5 == 3) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio43">TRANSVERSO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio44" value="4" <?php if ($frasco5 == 4) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio44">ASCENDENTE</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio45" value="5" <?php if ($frasco5 == 5) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio45">DESCENDENTE</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio46" value="6" <?php if ($frasco5 == 6) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio46">ÍLEO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio47" value="7" <?php if ($frasco5 == 7) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio47">CECO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio48" value="8" <?php if ($frasco5 == 8) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio48">SIGMÓIDE</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio49" value="9" <?php if ($frasco5 == 9) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio49">RETO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio50" value="10" <?php if ($frasco5 == 10) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio40">MUCOSECTOMIA</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio501" value="11" <?php if ($frasco5 == 11) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio501">POLIPECTOMIA</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco5" id="inlineRadio502" value="12" <?php if ($frasco5 == 12) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio502">BIÓPISIA</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        FRASCO 6
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio41" value="1" <?php if ($frasco6 == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio51">ÂNGULO HEPÁTICO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio52" value="2" <?php if ($frasco6 == 2) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio52">ÂNGULO ESPLÊNICO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio53" value="3" <?php if ($frasco6 == 3) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio53">TRANSVERSO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio54" value="4" <?php if ($frasco6 == 4) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio54">ASCENDENTE</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio55" value="5" <?php if ($frasco6 == 5) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio55">DESCENDENTE</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio56" value="6" <?php if ($frasco6 == 6) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio56">ÍLEO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio57" value="7" <?php if ($frasco6 == 7) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio57">CECO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio58" value="8" <?php if ($frasco6 == 8) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio58">SIGMÓIDE</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio59" value="9" <?php if ($frasco6 == 9) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio59">RETO</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio60" value="10" <?php if ($frasco6 == 10) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio60">MUCOSECTOMIA</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio601" value="11" <?php if ($frasco6 == 11) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio601">POLIPECTOMIA</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frasco6" id="inlineRadio602" value="12" <?php if ($frasco6 == 12) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="inlineRadio602">BIÓPISIA</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEigth">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEigth" aria-expanded="false" aria-controls="collapseEigth">
                                        OBSERVAÇÕES
                                    </button>
                                </h2>
                                <div id="collapseEigth" class="accordion-collapse collapse" aria-labelledby="headingEigth" data-bs-parent="#accordionExample">
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

    <div class="bottom footer mt-4">
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