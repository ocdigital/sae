<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(0);

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

$etapa = 'sala_exames';

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

$result = "SELECT * FROM sae_exames WHERE num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
    $posicionar_pacientes = $item->posicionar_pacientes;
    $instalar_oximetria = $item->instalar_oximetria;
    $instalar_o2 = $item->instalar_o2;
    $administrar_medicamentos = $item->administrar_medicamentos;
    $verificar_sinais = $item->verificar_sinais;
    $encaminhar_paciente = $item->encaminhar_paciente;
    $inicio_exame = $item->inicio_exame;
    $termino_exame = $item->termino_exame;
    $exame_pa1 = $item->exame_pa1;
    $exame_pa2 = $item->exame_pa2;
    $exame_fc = $item->exame_fc;
    $exame_fr = $item->exame_fr;
    $exame_sat02 = $item->exame_sat02;
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
            <input type="hidden" name="tabela" value="sae_exames">
            <input type="hidden" name="etapa" value="sala_exames">

            <section class="content_itens border-bottom">
                <div class="row mb-3">
                    <h2 class="titulo">Sala de exames</h4>

                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="posicionar_pacientes" value="1" id="flexCheckDefault" <?php if ($posicionar_pacientes == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Posicionar paciente para exames
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="instalar_oximetria" value="1" id="flexCheckDefault" <?php if ($instalar_oximetria == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Instalar oximetria contínua
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="instalar_o2" value="1" id="flexCheckDefault" <?php if ($instalar_o2 == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Instalar o2
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="administrar_medicamentos" value="1" id="flexCheckDefault" <?php if ($administrar_medicamentos == 1) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Administrar medicamentos sedativos
                                    conforme prescrição médica
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
                                <input class="form-check-input" type="checkbox" name="encaminhar_paciente" value="1" id="flexCheckDefault" <?php if ($encaminhar_paciente == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Após exame, encaminhar paciente
                                    para recuperação com grades elevadas
                                </label>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">INÍCIO DO EXAME</span>
                                <input type="time" class="form-control" id="hora_preparo_inicio" name="inicio_exame" value="<?php if ($inicio_exame) echo $inicio_exame ?>">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">TÉRMINO DO EXAME</span>
                                <input type="time" class="form-control" id="hora_preparo_final" name="termino_exame" value="<?php if ($termino_exame) echo $termino_exame ?>">
                                <button type="button" class="input-group-text" id="inputGroup-sizing-default" onclick="obter_hora()">AGORA</button>
                            </div>
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
                                    <td>Durante exame</td>
                                    <td><select name="exame_pa1" id="" style="width: 40%;" class="borda">
                                            <?php
                                            for ($i = 50; $i <= 220; $i += 10) {
                                                if (isset($exame_pa1) && $exame_pa1 == $i) {
                                                    echo "<option value='$exame_pa1' selected>$exame_pa1</option>";
                                                } else {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        X <select name="exame_pa2" id="" style="width: 40%;" class="borda">
                                            <?php
                                            for ($i = 50; $i <= 220; $i += 10) {
                                                if (isset($exame_pa2) && $exame_pa2 == $i) {
                                                    echo "<option value='$exame_pa2' selected>$exame_pa2</option>";
                                                } else {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                            }
                                            ?>
                                        </select></td>
                                    <td><select name="exame_fc" id="" style="width: 100%;" class="borda">
                                            <?php
                                            for ($i = 50; $i <= 220; $i++) {
                                                if (isset($exame_fc) && $exame_fc == $i) {
                                                    echo "<option value='$exame_fc' selected>$exame_fc</option>";
                                                } else {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                            }
                                            ?></td>
                                    <td><select name="exame_fr" id="" style="width: 100%;" class="borda">
                                            <?php
                                            for ($i = 12; $i <= 30; $i++) {
                                                if (isset($exame_fr) && $exame_fr == $i) {
                                                    echo "<option value='$exame_fr' selected>$exame_fr</option>";
                                                } else {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                            }
                                            ?></td>
                                    <td><select name="exame_sat02" id="" style="width: 100%;" class="borda">
                                            <?php
                                            for ($i = 100; $i >= 1; $i--) {
                                                if (isset($exame_sat02) && $exame_sat02 == $i) {
                                                    echo "<option value='$exame_sat02' selected>$exame_sat02%</option>";
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

    <div class="bottom footer-menu mt-4">
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
            $('#hora_preparo_inicio').val(time)
        })

        function obter_hora() {
            var dt = new Date();
            var time = dt.getHours() + ":" + (dt.getMinutes() < 10 ? '0' : '') + dt.getMinutes();           
            $('#hora_preparo_final').val(time)
        }
    </script>

</body>

</html>