<?php
require_once __DIR__ . "/init.php";

if (isset($_POST['iniciar_cancelamento'])) {
    ?>
    <html>
    <head></head>
    <body>
        <h2>Confirmação de Cancelamento</h2>
        <p>Tem certeza que deseja cancelar o evento?</p>
        <form method="POST">
            <input type="text" name="id" id="id"
            value="<?= $_POST['id'] ?>"
            hidden
            >
            <button type="submit" name="confirmar">Sim</button>
            <button type="submit" name="desistir">Não</button>
        </form>
    </body>
    </html>
    <?php
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $eventoSelecionado = $_POST;

    if(isset($_POST['confirmar'])){
        unset($_SESSION['eventos'][$id]);
        header("Location: index.php?confirmacao=Evento Removido com Sucesso!");
        exit;
        
    }elseif(isset($_POST['desistir'])){
        header("Location: remocao.php?confirmacao=Operação cancelada.");
        exit;
    }
}

?>