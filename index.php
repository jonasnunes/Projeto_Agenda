<?php
    include_once("templates/header.php");
?>

    <main class="container">
        <?php if(isset($printMsg) && $printMsg != ''): ?>
            <p class="msg"><?=$printMsg?></p>
        <?php endif; ?>

        <h1 class="main-title">Minha Agenda</h1>

        <?php if(count($contacts) > 0): ?>
            
            <table class="table contacts-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td scope="row" class="col-id"><?=$contact["ID"]?></td>
                            <td scope="row"><?=$contact["NAME"]?></td>
                            <td scope="row"><?=$contact["PHONE"]?></td>
                            <td class="actions">
                                <a href="<?=$BASE_URL?>show.php?id=<?=$contact["ID"]?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="<?=$BASE_URL?>edit.php?id=<?=$contact["ID"]?>"><i class="far fa-edit edit-icon"></i></a>
                                <form action="<?=$BASE_URL?>config/process.php" method="POST" class="delete-form">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?=$contact["ID"]?>">
                                    <button type="submit">
                                        <i class="fas fa-times delete-icon"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else: ?>
            <p class="empty-list-text">
                Ainda não há contatos na sua agenda!
                <a href="<?=$BASE_URL?>create.php">Clique aqui</a>
                 para adicionar
            </p>
        <?php endif; ?>
    </main>

<?php include_once("templates/footer.php"); ?>