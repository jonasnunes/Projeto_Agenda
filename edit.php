<?php
    include_once("templates/header.php");
?>

    <main class="container">
        <?php include_once("templates/backbtn.php"); ?>
        <h1 class="main-title">Editar contato</h1>
        <form action="<?=$BASE_URL?>config/process.php" method="POST" class="edit-form">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?=$contact["ID"]?>">
            <div class="form-group">
                <label for="name">Nome do contato</label>              
                <input type="text" class="form-control" id="name" name="name" placeholder="Ex.: João da Silva" value="<?=$contact["NAME"]?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone do contato</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder=" Ex.: (xx) 9xxxx-xxxx" value="<?=$contact["PHONE"]?>" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações</label>
                <textarea name="observations" id="observations" name="observations" cols="100" rows="3" placeholder="Insira as observações do contato"><?=$contact["OBSERVATIONS"]?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </main>

<?php
    include_once("templates/footer.php");
?>