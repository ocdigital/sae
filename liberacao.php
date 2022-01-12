<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(0);

session_start();
$cod_pac = $_SESSION['cod_pac'];
$num_atd = $_SESSION['num_atd'];

$etapa = 'liberacao';

require "db/configProgastro.php"; // Chamando a conexão 


/*Verifica se está sendo utilizada*/
/*
$result2 = "SELECT * FROM sae_etapas WHERE num_atd = $num_atd AND $etapa ='block'";
$sth2 = $dbo->prepare($result2);
$sth2->execute();
$count = $sth2->rowCount();

if($count){
    echo "
    <script>
    alert('Essa etapa já está sendo utiliza')
    window.location = 'menu.php';
    </script>";
  

}*/

$result = "SELECT * FROM sae_liberacao WHERE num_atd = $num_atd";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $item) {
    $dentaduras_devolvidas = $item->dentaduras_devolvidas;
    $retirado_acesso = $item->retirado_acesso;
    $condicoes_alta = $item->condicoes_alta;
    $alta_para = $item->alta_para;
    $qual_forma = $item->qual_forma;
    $acordado_alerta = $item->acordado_alerta;
    $quente_seco = $item->quente_seco;
    $move_membros = $item->move_membros;
    $pre_pa1 = $item->pre_pa1;
    $pre_pa2 = $item->pre_pa2;
    $pre_fc = $item->pre_fc;
    $pre_fr = $item->pre_fr;
    $pre_sat02 = $item->pre_sat02;
    $evolucao_enfermagem = $item->evolucao_enfermagem;
    
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
             <span><?php echo $_SESSION['nome']?></span>
        
        </div>
    </nav>


    <div class="content shadow-sm">

    <form action="salva_etapa.php" method="post">

        <input type="hidden" name="cod_pac" value="<?php echo $cod_pac ?>">
        <input type="hidden" name="num_atd" value="<?php echo $num_atd ?>">
        <input type="hidden" name="tabela" value="sae_liberacao">
        <input type="hidden" name="etapa" value="liberacao">

        <section class="content_itens">
        <div class="row  mb-3">
            <h3 class="titulo">Liberação do paciente pela Enfermagem</h3>
            

                <div class="form-group mt-1 pb-1 border-bottom">
                    <div>
                        <input class="form-check-input" type="checkbox" value="1" name="dentaduras_devolvidas" id="flexCheckDefault" <?php if ($dentaduras_devolvidas == 1) {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Dentaduras e óculos devolvidos
                        </label>
                    </div>

                    <div>
                        <input class="form-check-input" type="checkbox" value="1" name="retirado_acesso" id="flexCheckDefault" <?php if ($retirado_acesso == 1) {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Retirado o acesso venoso
                        </label>
                    </div>
                </div>


                <div class="form-group mt-1 pb-1 border-bottom">
                    <h5><b>Condições de Alta</b></h5>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condicoes_alta" id="inlineRadio11" value="1" <?php if ($condicoes_alta == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                        <label class="form-check-label" for="inlineRadio11">Boa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condicoes_alta" id="inlineRadio12" value="2" <?php if ($condicoes_alta == 2) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                        <label class="form-check-label" for="inlineRadio12">Razoável</label>
                    </div>
                </div>

                <div class="form-group mt-1 pb-1 border-bottom">
                    <h5 class="mt-1"><b>Alta para:</b></h5>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="qual_forma" id="inlineRadio11" value="1" <?php if ($qual_forma == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                        <label class="form-check-label" for="inlineRadio11">Casa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="alta_para" id="inlineRadio12" value="2" <?php if ($alta_para == 2) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                        <label class="form-check-label" for="inlineRadio12">Hospital</label>
                    </div>
                </div>

                <div class="form-group mt-1 pb-1 border-bottom">
                    <h5 class="mt-1"><b>Qual forma:</b></h5>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="qual_forma" id="inlineRadio11" value="1" <?php if ($qual_forma == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                        <label class="form-check-label" for="inlineRadio11">Caminhando</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="qual_forma" id="inlineRadio12" value="2" <?php if ($qual_forma == 2) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                        <label class="form-check-label" for="inlineRadio12">Cadeira de Rodas</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="qual_forma" id="inlineRadio12" value="3" <?php if ($qual_forma == 3) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                        <label class="form-check-label" for="inlineRadio12">Maca</label>
                    </div>
                </div>

                <div class="form-group mt-1 pb-1 border-bottom">
                    <h5 class="mt-3"><b>Nivel de Sedação:</b></h5>
                    <input class="form-check-input" type="checkbox" value="1" name="acordado_alerta" id="flexCheckDefault" <?php if ($acordado_alerta) {
                                                                                                        echo 'checked';
                                                                                                    } ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Acordado e Alerta
                    </label>
                </div>

                <div class="form-group mt-3 pb-3 border-bottom">

                    <h5 class="mt-1"><b>Status do Paciente:</b></h5>
                    <div>
                        <input class="form-check-input" type="checkbox" value="1" name="quente_seco" id="flexCheckDefault" <?php if ($quente_seco) {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Quente / Seco
                        </label>
                    </div>
                    <div>
                        <input class="form-check-input" type="checkbox" value="1" name="move_membros" id="flexCheckDefault" <?php if ($move_membros) {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Move os 4 membros
                        </label>
                    </div>
                </div>

                <div class="row mt-1 mb-1">
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
                                <td>Durante Liberação</td>
                                   <td><select name="pre_pa1" id="" style="width: 40%;" class="borda">
                                        <?php 
                                            for($i=50; $i<=220; $i+=10){
                                                if(isset($pre_pa1) && $pre_pa1 == $i){
                                                    echo "<option value='$pre_pa1' selected>$pre_pa1</option>";
                                                }else{
                                                     echo "<option value='$i'>$i</option>";
                                                }                                                
                                            }
                                        ?>
                                    </select> 
                                    X <select name="pre_pa2" id="" style="width: 40%;" class="borda" >
                                        <?php 
                                            for($i=50; $i<=220; $i+=10){
                                                if(isset($pre_pa2) && $pre_pa2 == $i){
                                                    echo "<option value='$pre_pa2' selected>$pre_pa2</option>";
                                                }else{
                                                     echo "<option value='$i'>$i</option>";
                                                }                                                
                                            }
                                        ?>
                                    </select></td>
                                    <td><select name="pre_fc" id="" style="width: 100%;" class="borda" >
                                        <?php 
                                            for($i=50; $i<=220; $i++){
                                                if(isset($pre_fc) && $pre_fc == $i){
                                                    echo "<option value='$pre_fc' selected>$pre_fc</option>";
                                                }else{
                                                     echo "<option value='$i'>$i</option>";
                                                }                                                
                                            }
                                        ?></td>
                                    <td><select name="pre_fr" id="" style="width: 100%;" class="borda" >
                                        <?php 
                                            for($i=12; $i<=30; $i++){
                                                if(isset($pre_fr) && $pre_fr == $i){
                                                    echo "<option value='$pre_fr' selected>$pre_fr</option>";
                                                }else{
                                                     echo "<option value='$i'>$i</option>";
                                                }                                                
                                            }
                                        ?></td>
                                    <td><select name="pre_sat02" id="" style="width: 100%;" class="borda" >
                                        <?php 
                                            for($i=100; $i>=1; $i--){
                                                if(isset($pre_sat02) && $pre_sat02 == $i){
                                                    echo "<option value='$pre_sat02' selected>$pre_sat02%</option>";
                                                }else{
                                                     echo "<option value='$i'>$i%</option>";
                                                }                                                
                                            }
                                        ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mb-1" style="margin-top: -20px;">
                    <h4>Evolução enfermagem</h4>
                    <textarea class="form-control" name="evolucao_enfermagem" id="" cols="30" rows="5"><?php if ($evolucao_enfermagem) echo $evolucao_enfermagem ?></textarea>
                </div>

            </section>
            <hr style="margin-top:10px !important">
        <h5 class="assinatura">Assinatura: <img src="<?php echo $_SESSION['assinatura']?>" alt="" width="200px" /></h5>
        </div>
    </div>

    <div class="footer mt-4">
        <a href="cancelar_etapa.php?num_atd=<?php echo $num_atd?>&etapa=<?php echo $etapa?>"><button type="button" class="btn btn-danger btn-lg">Cancelar</button></a>
        <button type="submit" class="btn btn-success btn-lg">Salvar</button>
    </div>
                                                                                                    
</form>
        

    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>