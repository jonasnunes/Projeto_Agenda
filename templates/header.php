<?php 
    include_once("config/url.php");
    include_once("config/process.php");

    // limpar mensagem de sessão
    if(isset($_SESSION['msg'])){
        $printMsg = $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ESTILOS -->
    <link rel='stylesheet' href='<?=$BASE_URL?>css/bootstrap.css'>
    <link rel='stylesheet' href='<?=$BASE_URL?>/css/styles.css'>

    <!-- FONTAWESOME -->
    <?php foreach($FONT_AWESOME as $link){echo $link;} ?>

    <title>Agenda de Contatos</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?=$BASE_URL?>index.php">
                <img src="<?=$BASE_URL?>img/logo.svg" alt="Agenda" width="50">
            </a>
            <div>
                <div class="navbar-nav">
                    <a href="<?=$BASE_URL?>index.php" class="nav-link home-link active">Agenda</a>
                    <a href="<?=$BASE_URL?>create.php" class="nav-link active">Adicionar contato</a>
                </div>
            </div>
        </nav>
    </header>