<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sollen</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

</head>

<body>
<nav class="navbar navbar-expand-lg">

    <h3>SOLLEN</h3>
     <button class="btn btn-lg btn-primary" style="margin-right: 20px" onclick="goBack()">Voltar</button>

</nav>


<div class="container-fluid">
       
    <div class="row mt-4 mb-3">
        <h4 style="background-color: rgb(221, 221, 221); padding: 5px">Sinais vitais</h4>
        <div class="table-responsive">
        <table class="table table-bordered ">
            <thead>
                <tr>
                <th></th>
                <th>PA</th>
                <th>FC</th>
                <th>FR</th>
                <th>SatO2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pré atendimento</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Durante exame</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>                
            </tbody>
        </table>
        </div>

        <h4>Evolução enfermagem</h4>
        <textarea name="" id="" cols="30" rows="10"></textarea>
        
    </div>    
</div>
<div class="fixed-bottom footer mt-4">
    <a href="menu.php"><button type="button" class="btn btn-light btn-lg">Menu</button></a>
    <button type="button" class="btn btn-success btn-lg">Salvar</button>
</div>


    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>