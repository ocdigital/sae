<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(0);

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

$etapa = 'pre_atendimento';

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

$result = "SELECT * FROM sae_pre_atendimento WHERE num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
    $acomodar_paciente = $item->acomodar_paciente;
    $manter_cabeceira = $item->manter_cabeceira;
    $puncionar_acesso = $item->puncionar_acesso;
    $retirar_proteses = $item->retirar_proteses;
    $verificar_sinais = $item->verificar_sinais;
    $elevar_grades = $item->elevar_grades;
    $transportar_paciente = $item->transportar_paciente;
    $hora_preparo = $item->hora_preparo;
    $pre_pa1 = $item->pre_pa1;
    $pre_pa2 = $item->pre_pa2;
    $pre_fc = $item->pre_fc;
    $pre_fr = $item->pre_fr;
    $pre_sat02 = $item->pre_sat02;
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
                <h3>SOLLEN</h3>
            </a>

        </div>
    </nav>


    <div class="content shadow-sm">

        <form action="salva_etapa.php" method="post">

            <input type="hidden" name="cod_pac" value="<?php echo $cod_pac ?>">
            <input type="hidden" name="num_atd" value="<?php echo $num_atd ?>">
            <input type="hidden" name="tabela" value="sae_pre_atendimento">
            <input type="hidden" name="etapa" value="pre_atendimento">

            <section class="content_itens border-bottom">
                <div class="row mb-3">
                    <h2 class="titulo">Sala de pré atendimento</h4>

                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="acomodar_paciente" value="1" id="flexCheckDefault" <?php if ($acomodar_paciente == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Acomodar paciente na maca
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="manter_cabeceira" value="1" id="flexCheckDefault" <?php if ($manter_cabeceira == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Manter cabeceira elevada
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="puncionar_acesso" value="1" id="flexCheckDefault" <?php if ($puncionar_acesso == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Puncionar acesso venoso em MMSS
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="retirar_proteses" value="1" id="flexCheckDefault" <?php if ($retirar_proteses == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Retirar próteses e aparelhos dentários
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="verificar_sinais" value="1" id="flexCheckDefault" <?php if ($verificar_sinais == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Verificar sinais vitais
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="elevar_grades" value="1" id="flexCheckDefault" <?php if ($elevar_grades == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Elevar grades da maca
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="transportar_paciente" value="1" id="flexCheckDefault" <?php if ($transportar_paciente == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Transportar paciente para sala de exames
                                </label>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Hora do preparo</span>
                                <input type="time" class="form-control" name="hora_preparo" id="hora_preparo" value="<?php if ($hora_preparo) echo $hora_preparo ?>">
                            </div>



                        </div>
                        <div class="row mt-4 mb-3">
                            <h4 class="titulo">Sinais vitais</h4>
                            <div class="table">
                                <table class="table table-bordered" style="width: 100%">
                                    <thead>
                                        <tr style="width: 100%">
                                            <th style="width: 20%"></th>
                                            <th style="width: 35%">PA</th>
                                            <th style="width: 15%">FC</th>
                                            <th style="width: 15%">FR</th>
                                            <th style="width: 15%">SatO2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pré atendimento</td>




                                            <td><select name="pre_pa1" id="" style="width: 40%;" class="borda">
                                                    <?php
                                                    for ($i = 50; $i <= 220; $i += 10) {
                                                        if (isset($pre_pa1) && $pre_pa1 == $i) {
                                                            echo "<option value='$pre_pa1' selected>$pre_pa1</option>";
                                                        } else {
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                X <select name="pre_pa2" id="" style="width: 40%;" class="borda">
                                                    <?php
                                                    for ($i = 50; $i <= 220; $i += 10) {
                                                        if (isset($pre_pa2) && $pre_pa2 == $i) {
                                                            echo "<option value='$pre_pa2' selected>$pre_pa2</option>";
                                                        } else {
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select></td>
                                            <td><select name="pre_fc" id="" style="width: 100%;" class="borda">
                                                    <?php
                                                    for ($i = 50; $i <= 220; $i++) {
                                                        if (isset($pre_fc) && $pre_fc == $i) {
                                                            echo "<option value='$pre_fc' selected>$pre_fc</option>";
                                                        } else {
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                    }
                                                    ?></td>
                                            <td><select name="pre_fr" id="" style="width: 100%;" class="borda">
                                                    <?php
                                                    for ($i = 12; $i <= 30; $i++) {
                                                        if (isset($pre_fr) && $pre_fr == $i) {
                                                            echo "<option value='$pre_fr' selected>$pre_fr</option>";
                                                        } else {
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                    }
                                                    ?></td>
                                            <td><select name="pre_sat02" id="" style="width: 100%;" class="borda">
                                                    <?php
                                                    for ($i = 100; $i >= 1; $i--) {
                                                        if (isset($pre_sat02) && $pre_sat02 == $i) {
                                                            echo "<option value='$pre_sat02' selected>$pre_sat02%</option>";
                                                        } else {
                                                            echo "<option value='$i'>$i%</option>";
                                                        }
                                                    }
                                                    ?>"></td>
                                        </tr>

                                    </tbody>
                                </table>
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



    <!--Pega o horário e insere no input de hora-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        jQuery(document).ready(function(event) {
            var dt = new Date();
            var time = dt.getHours() + ":" + (dt.getMinutes() < 10 ? '0' : '') + dt.getMinutes();
            $('#hora_preparo').val(time)
        })
    </script>


</body>

</html>