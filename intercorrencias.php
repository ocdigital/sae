<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(E_ALL);

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

$etapa = 'intercorrencias';

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

$result = "SELECT * FROM sae_intercorrencias WHERE num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
    $intercorrencia = $item->intercorrencia;
    $medico         = $item->medico;
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
            <input type="hidden" name="tabela" value="sae_intercorrencias">
            <input type="hidden" name="etapa" value="intercorrencias">

            <section class="content_itens">
                <div class="row mb-3">
                    <h3 class="titulo">Intercorrências</h4>

                        <textarea class="form-control" name="intercorrencia" id="" cols="30" rows="20"><?php if ($intercorrencia) echo $intercorrencia ?></textarea>

                        <h4 class="mt-3">Médico Responsável pela Alta:</h4>
                        <?php echo $medico ?>
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
            </section>
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