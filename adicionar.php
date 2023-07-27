<?php
    include_once("templates/header.php");
?>

<div class="container" id="view-contact-container">
    <?php include_once("templates/back-btn.html") ?>
    <h1 id="main-title">Criar Contato</h1>
    <form action="<?=$BASE_URL?>config/dbProcess.php" method="POST" id="create-form">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name">Nome do contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Insira o telefone" data-mask="(00) 0 0000-0000" data-mask-clearifnotmatch="true" required>
        </div>
        <div class="form-group">
            <label for="obs">Observações:</label>
            <textarea type="text" class="form-control" id="obs" name="obs" placeholder="Digita alguma observação sobre o contato" rows="3"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Cadastrar</button>
    </form>
</div>

<?php
    include_once("templates/footer.php");
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $(document).ready(function() {
    $('#phone').mask('(00) 0 0000-0000', { clearIfNotMatch: true });
  });
</script>
