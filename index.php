<?php
require_once 'init.php';

$eventos = $_SESSION['eventos'] ?? [];

$eventoDetectado = false; // quando TRUE significa que o user selecionou um evento válido
$eventoAtual = null;

$idSelecionado = $_GET['id'] ?? null;

// verifica se o ID do evento foi informado e se existe dentro do array de eventos.
if ($idSelecionado !== null && isset($eventos[$idSelecionado])) {
    $eventoDetectado = true;
    $eventoAtual = $eventos[$idSelecionado];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once __DIR__ . '/nav.php' ?>
    <hr>
    <h1>Eventos:</h1>
    <?php 
        foreach($eventos as $chave => $evento){
            print "
            <li>
            <a href='index.php?id={$chave}'>
            {$evento['titulo']}
            </a>
            </li>
            ";
            }
            ?>
    <hr>
    <h2>Deseja ver detalhes, excluir ou editar algum evento?</h2>
    <?php if($eventoDetectado): ?>
        <h2>Você selecionou o evento: <?php echo $eventoAtual['titulo'] ?></h2>
        <form action="">
            <input type="text" name="id" id="id" 
            value="<?= $idSelecionado ?>"
            hidden>

            <a href="./detalhes.php?id=<?php echo $idSelecionado ?>">
                <button type="button">Detalhes</button>
            </a>
            <a href="./edicao.php?id=<?php echo $idSelecionado ?>">
                <button type="button">Alterar</button>
            </a>
            <a href="./remocao.php?id=<?php echo $idSelecionado ?>">
                <button type="button">Excluir</button>
            </a>
            
        </form>    
        <?php else: ?>
            <h2>Selecione um evento acima!</h2>
        <?php endif; ?>
</body>
</html>     