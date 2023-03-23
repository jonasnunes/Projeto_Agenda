<?php
    include_once("templates/header.php");
?>

    <main class="container">
        <?php include_once("templates/backbtn.php"); ?>
        <h1 class="main-title">Adicionar contato</h1>
        <form action="<?=$BASE_URL?>config/process.php" method="POST" class="create-form">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="name">Nome do contato</label>              
                <input type="text" class="form-control" id="name" name="name" placeholder="Ex.: João da Silva" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone do contato</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder=" Ex.: (xx) 9xxxx-xxxx" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações</label>
                <textarea name="observations" id="observations" name="observations" cols="100" rows="3" placeholder="Insira as observações do contato"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </main>

<?php include_once("templates/footer.php"); ?>