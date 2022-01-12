<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sollen</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/hello-icon-152.png">
    <meta name="theme-color" content="white" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Sollen">
    <meta name="msapplication-TileImage" content="images/hello-icon-144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <style>
        body{background-color: #ffe6bf !important;}
    </style>

</head>

<body class="text-center">



    <main class="form-signin">

        <form action="valida_login.php" method="POST">
            <img class="mb-4" src="http://www.sollen.med.br/assets/img/sollen2.png" alt="" width="100">
            <?php if (isset($_GET['return']) == 'error') {   ?>
                <div class="alert alert-warning">Houve um problema de autenticação, verifique e tente novamente.</div>
            <?php } ?>
            <h1 class="h3 mb-3 fw-normal">Faça seu login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="usuario" placeholder="name@example.com">
                <label for="floatingInput">usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Password">
                <label for="floatingPassword">senha</label>
            </div>
            <input type="submit" class="btn btn-success" value="Entrar">

        </form>
    </main>



    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>