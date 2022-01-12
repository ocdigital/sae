<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(0);

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

$etapa = 'recuperacao';

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

$result = "SELECT * FROM sae_recuperacao WHERE num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
    $manter_paciente = $item->manter_paciente;
    $manter_o2 = $item->manter_o2;
    $levantar_paciente = $item->levantar_paciente;
    $retirar_acesso = $item->retirar_acesso;
    $preencher_estatus = $item->preencher_estatus;
    $liberar_paciente = $item->liberar_paciente;
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
                <span>SOLLEN</span>
            </a>
            <span><?php echo $_SESSION['nome'] ?></span>

        </div>
    </nav>

    <div class="content shadow-sm">

        <form action="salva_etapa.php" method="post">

            <input type="hidden" name="cod_pac" value="<?php echo $cod_pac ?>">
            <input type="hidden" name="num_atd" value="<?php echo $num_atd ?>">
            <input type="hidden" name="tabela" value="sae_recuperacao">
            <input type="hidden" name="etapa" value="recuperacao">


            <section class="content_itens border-bottom">
                <div class="row mb-3">
                    <h3 class="titulo">Recuperação</h3>

                    <div class="form-group mt-3">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" name="manter_paciente" value="1" id="flexCheckDefault" <?php if ($manter_paciente == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Manter paciente em oximetria até
                                bem acordado
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" name="manter_o2" value="1" id="flexCheckDefault" <?php if ($manter_o2 == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Manter o2 se saturação &lt; 90%
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" name="levantar_paciente" value="1" id="flexCheckDefault" <?php if ($levantar_paciente == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Levantar paciente somente quando
                                bem acordado
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" name="retirar_acesso" value="1" id="flexCheckDefault" <?php if ($retirar_acesso == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Retirar acesso venoso
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" name="preencher_estatus" value="1" id="flexCheckDefault" <?php if ($preencher_estatus == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Preencher estatus de alta/ níveis de
                                sedação e escala de dor
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" name="liberar_paciente" value="1" id="flexCheckDefault" <?php if ($liberar_paciente == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Liberar paciente somente com
                                autorização do anestesista
                            </label>
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
                                        <td>Recuperação</td>
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
</body>

</html>