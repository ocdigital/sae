<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(0);

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

$etapa = 'prescricao';

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

$result = "SELECT * FROM sae_prescricao WHERE num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
    $fentanil = $item->fentanil;
    $dormonid = $item->dormonid;
    $propofol = $item->propofol;
    $hioscina = $item->hioscina;
    $narcan = $item->narcan;
    $flumazenil = $item->flumazenil;
    $ondasedrona = $item->ondasedrona;
    $dipirona = $item->dipirona;
    $solucao_fisiologica = $item->solucao_fisiologica;
    $glicose = $item->glicose;
    $lote_sedativos = $item->lote_sedativos;
    $medico_prescritor = $item->medico_prescritor;
}

$result1 = "SELECT * FROM sae_lotes";

$sth1 = $dbo->prepare($result1);
$sth1->execute();
$dados1 = $sth1->fetchAll(PDO::FETCH_OBJ);

foreach ($dados1 as $item1) {
    $data      = $item1->data;
    $descricao = $item1->descricao;
    $lote      = $item1->lote;
    
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
            <input type="hidden" name="tabela" value="sae_prescricao">
            <input type="hidden" name="etapa" value="prescricao">


            <div class="row mt-4 mb-1">
                <table class="table table-responsive table-striped">
                    <thead>
                        <th>PRESCRIÇÃO MÉDICA</th>
                        <th>DOSE</th>
                        <th>VIA</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fentanil 0,05 mg/ml</td>
                            <td>
                                <!-- <input type="text" class="form-control" name="fentanil" value="<?php if ($fentanil) echo $fentanil ?>"> -->
                                <select class="form-control" name="fentanil">
                                    <option value="0.2">0.1</option>
                                    <option value="0.4">0.4</option>
                                    <option value="0.6">0.6</option>
                                    <option value="0.8">0.8</option>
                                    <option value="1.0">1.0</option>
                                </select>
                            </td>
                            <td>EV</td>
                        </tr>
                        <tr>
                            <td>Dormonid 5mg/ml</td>
                            <td>
                                <!-- <input type="text" class="form-control" name="dormonid" value="<?php if ($dormonid) echo $dormonid ?>"> -->
                                <select class="form-control" name="dormonid">
                                    <option value="0.1">0.1</option>
                                    <option value="0.2">0.2</option>
                                    <option value="0.3">0.3</option>
                                    <option value="0.4">0.4</option>
                                    <option value="0.5">0.5</option>
                                </select>
                            </td>
                            <td>EV</td>
                        </tr>
                        <tr>
                            <td>Propofol 50mg/10 ml</td>
                            <td><input type="text" class="form-control" name="propofol" value="<?php if ($propofol) echo $propofol ?>"></td>
                            <td>EV</td>
                        </tr>
                        <tr>
                            <td>Hioscina 20mg/ml</td>
                            <td><input type="text" class="form-control" name="hioscina" value="<?php if ($hioscina) echo $hioscina ?>"></td>
                            <td>EV</td>
                        </tr>
                        <tr>
                            <td>Narcan</td>
                            <td><input type="text" class="form-control" name="narcan" value="<?php if ($narcan) echo $narcan ?>"></td>
                            <td>EV</td>
                        </tr>
                        <tr>
                            <td>Flumazenil 0,1 mg/ml</td>
                            <td><input type="text" class="form-control" name="flumazenil" value="<?php if ($flumazenil) echo $flumazenil ?>"></td>
                            <td>EV</td>
                        </tr>
                        <tr>
                            <td>Ondasedrona</td>
                            <td><input type="text" class="form-control" name="ondasedrona" value="<?php if ($ondasedrona) echo $ondasedrona ?>"></td>
                            <td>EV</td>
                        </tr>
                        <tr>
                            <td>Dipirona</td>
                            <td><input type="text" class="form-control" name="dipirona" value="<?php if ($dipirona) echo $dipirona ?>"></td>
                            <td>EV</td>
                        </tr>
                        <tr>
                            <td>Solução fisiológica 0,9%</td>
                            <td><input type="text" class="form-control" name="solucao_fisiologica" value="<?php if ($solucao_fisiologica) echo $solucao_fisiologica ?>"></td>
                            <td>EV</td>
                        </tr>
                        <tr>
                            <td>Glicose 25%</td>
                            <td><input type="text" class="form-control" name="glicose" value="<?php if ($glicose) echo $glicose ?>"></td>
                            <td>EV</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <label for="">Lote dos sedativos:</label>
                <textarea class="form-control" name="lote_sedativos" id="" cols="30" rows="5"><?php if ($lote_sedativos) echo $lote_sedativos ?></textarea>
            </div>



            <div class="row mt-1">
                <label for="">Médico Prescritor:</label>
                <select class="form-control" name="medico_prescritor" id="medico_prescritor">
                    <option value="">SELECIONE</option>

                    <?php
                    $result = "SELECT cod_user,nome,assinatura FROM usuarios WHERE tipo_registro = 'CRM'";

                    $sth = $dbo->prepare($result);
                    $sth->execute();
                    $dados = $sth->fetchAll(PDO::FETCH_OBJ);

                    foreach ($dados as $item) {
                        $cod_user          = $item->cod_user;
                        $assinatura_medico = $item->assinatura;
                        $nome_medico       = $item->nome;
                        echo "<option value='$assinatura_medico '>$nome_medico</option>";
                    }
                    ?>
                </select>
            </div>
            <hr style="margin-top:10px !important">
            <h5 class="assinatura">Assinatura: <img id="assinaturaMedico" src="<?php  ?>" alt="" width="200px" /></h5>

    </div>
    </div>

    <div class="bottom footer-menu mt-4">
        <a href="cancelar_etapa.php?num_atd=<?php echo $num_atd ?>&etapa=<?php echo $etapa ?>"><button type="button" class="btn btn-danger btn-lg">Cancelar</button></a>
        <button type="submit" class="btn btn-success btn-lg">Salvar</button>
    </div>
    </form>


    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $('#medico_prescritor').on('change', function() {
           $('#assinaturaMedico').attr('src', this.value)
        });
    </script>
</body>

</html>