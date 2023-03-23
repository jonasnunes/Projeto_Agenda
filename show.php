<?php 
    include_once("templates/header.php");
?>

    <main class="view-contact-container">
        <?php include_once("templates/backbtn.php"); ?>
        <h1 class="main-title"><?=$contact["NAME"]?></h1>
        <p><strong>Telefone:</strong></p>
        <p><?=$contact["PHONE"]?></p>
        <p><strong>Observações:</strong></p>
        <p><?=$contact["OBSERVATIONS"]?></p>
    </main>

<?php include_once("templates/footer.php"); ?>