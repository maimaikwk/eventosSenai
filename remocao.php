<?php
require_once 'init.php';

$eventoSelecionado = false;
$eventoAtual = null;

function idExiste($id, $lista): bool{
    return array_key_exists($id, $lista);
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $_GET['id'] != "" && idExiste($_GET['id'], $_SESSION['eventos'])){
    $id = $_GET['id'];
    $eventoSelecionado = true;
    $eventoAtual = $_SESSION['eventos'][$id];

    if(!isset($_SESSION['eventos'][$id]) || $_SESSION['eventos'][$id] == ""){
        $eventoSelecionado = false;
    }
}
?>

    

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1><u>EventosSENAI - Remover</u></h1>

    <?php if($eventoSelecionado == false):?>
    <h1>Evento não existente.</h1>
    <?php endif;?>

    <?php require_once __DIR__ . "/nav.php" ?>

    <ul>
        <div>
        <?php
        foreach($_SESSION['eventos'] as $chave => $e){
            print"
            <li>
                <a href='remocao.php?id={$chave}'>
                {$e['titulo']} de {$e['responsavel']} - {$e['data']}</a>
            </li>
            ";
        }
        ?>
        </div>
    </ul>


        <?php if($eventoSelecionado): ?>
        <form action="processaRemocao.php" method="POST">
            <input type="text" name="id" id="id"
            value="<?= $_GET['id'] ?>"
            hidden
            >
            <p>Título: <?php echo $_SESSION['eventos'][$id]['titulo']?></p>
            <p>Descrição: <?php echo $_SESSION['eventos'][$id]['descricao']?></p>
            <p>Área: <?php echo $_SESSION['eventos'][$id]['area']?></p>
            <p>Data: <?php echo $_SESSION['eventos'][$id]['data']?></p>
            <p>Início: <?php echo $_SESSION['eventos'][$id]['inicio']?></p>
            <p>Fim: <?php echo $_SESSION['eventos'][$id]['fim']?></p>
            <p>Local: <?php echo $_SESSION['eventos'][$id]['local']?></p>
            <p>Responsável: <?php echo $_SESSION['eventos'][$id]['responsavel']?></p>

        <button type="submit" name="iniciar_cancelamento">Deletar</button>
        </form>
          
        <?php else: ?>
            <br>
            <h4>Selecione um dos eventos acima para remover.</h4>
            <?php endif; ?>
</body>
</html>