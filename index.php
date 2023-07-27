<?php
    include_once("templates/header.php");
?>

<div class="container">
    <?php if(isset($printMsg) && $printMsg != ''){ ?>
        <p id="msg"><?=$printMsg?></p>
    <?php } ?>
    <h1 id="main-title">Agenda de contatos</h1>
    <?php if(count($contatos) > 0){ ?>
        <table class="table" id="contacts-table">
            <thead>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col"></th>
            </thead>
            <tbody>
                <?php foreach($contatos as $contato){?>
                    <tr>
                        <td scope="row"><?=$contato["nome"]?></td>
                        <td scope="row"><?=$contato["telefone"]?></td>
                        <td class="actions">
                            <a href="contato.php?id=<?=$contato["id"]?>"><i class="fas fa-eye check-icon"></i></a>
                            <a href="editar.php?id=<?=$contato["id"]?>"><i class="fas fa-edit edit-icon"></i></a>
                            <form action="<?=$BASE_URL?>config/dbProcess.php" method="POST" class="delete-form">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?=$contato["id"]?>">
                                <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                            </form>
                            
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    <?php } else { ?>
        <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="<?=$BASE_URL?>adicionar.php">clique aqui para adicionar seus contatos!</a></p>
    <?php } ?>
</div>

<?php
    include_once("templates/footer.php");
?>