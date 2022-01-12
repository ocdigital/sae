<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

session_start();



if(!isset($_SESSION['nome'])){
    header('Location: login.php');
}



$hoje = date("Y-m-d");

if(!isset($_SESSION['data'])){
    $_SESSION['data'] = $hoje;
}

if (isset($_POST['data'])) {
    $_SESSION['data_selecionada'] = $_POST['data'];
}

if (isset($_POST['situacao'])) {
    $_SESSION['situacao'] = $_POST['situacao'];
}


if(!empty($_SESSION['data_selecionada'])){
    $data = $_SESSION['data_selecionada'];
}else{
    $data = $hoje;
}



if(!isset($_SESSION['situacao'])){
    $_SESSION['situacao'] = 0;
}


if(!empty($_SESSION['situacao'])){
    $situacao = $_SESSION['situacao'];
    if($situacao == 1){
        $condicao_situacao = "AND situacao = 1";
    }else 
    if($situacao == 2){
        $condicao_situacao = "AND situacao = 2";
    }
}else{
    $situacao = 0;
    $condicao_situacao = '';
}

if (empty($data)){
    $data = $hoje;
}

$dataBr = date("d/m/Y", strtotime($data));



require "db/configProgastro.php"; // Chamando a conexão 

$result = "SELECT * FROM sae_paciente WHERE data = '$data' $condicao_situacao";

$sth = $dbo->prepare($result);
$sth->execute();
$dados = $sth->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sollen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/datatables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

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

    <div class="content shadow">

            <div class="mb-3 p-3">
            
            <form action="" action="#" method="post">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Selecione a data desejada.</label>
                                <input type="date" name="data" id="data" class="form-control" value="<?php echo $data?>">
                                <input type="submit" class="btn btn-primary mt-2" value="Buscar">
                            </div>
                        </div>   
                    </div>
                    <div class="col-6">
                         <div class="form-group">
                             <label for="exampleInputEmail1">Situação</label>
                  
                            <select name="situacao" class="form-control" id="">
                                <option value="1" <?php if($_SESSION['situacao'] == 1) echo "selected";?>>Pendentes</option>
                                <option value="2" <?php if($_SESSION['situacao'] == 2) echo "selected";?>>Finalizados</option>
                                <option value="0" <?php if($_SESSION['situacao'] == 0) echo "selected";?>>Todos</option>
                            </select>
                        </div>
                    </div>
                </div>                             
            </form>
    
        </div>

        <div class="table  align-middle">

            <h4 class="text-center">Atendimentos do dia <?php echo $dataBr ?></h4>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Exame</th>                       
                        <th>Hora</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dados as $item) { ?>
                        <tr <?php if($item->situacao == 2){?>style="background-color:rgb(136, 247, 136) !important"<?php }?>>
                            <td><?php echo $item->nome ?></td>
                            <td><?php echo $item->exames ?></td>                            
                            <td><?php echo $item->hora ?></td>
                            <td><a href="menu.php?cod_pac=<?php echo $item->cod_pac?>&num_atd=<?php echo $item->num_atd?>"><button class="btn btn-success">Acessar</button></a></td>
                        </tr>
                    <?php } ?>


                    </tfoot>
            </table>
        </div>


    </div>
    <div class="fixed-bottom footer-menu mt-4">
        <a href="logout.php"><button type="button" class="btn btn-danger btn-lg">Sair</button></a>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ of _PAGES_",
                    "infoEmpty": "Nenhum item",
                    "infoFiltered": "(filtrado de  _MAX_ resultados)",
                    "search": "Pesquisar",
                    "paginate": {
                        "next": "Próximo",
                        "previous": "Anterior",
                        "first": "Primeiro",
                        "last": "Último"
                    },
                }
            });

        });
    </script>
</body>

</html>