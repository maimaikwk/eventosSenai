<?php
require_once 'init.php';

$eventos = $_SESSION['eventos'] ?? [];

$idEvento = $_GET['id'] ?? null;

// valida se o ID existe na sessão antes de acessar.
if ($idEvento !== null && isset($eventos[$idEvento])) {
    $eventoSelec = $eventos[$idEvento];
} else {
    header('Location: index.php?erro=evento_nao_encontrado');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Evento</title>
</head>
<body>
    <?php require_once __DIR__ . '/nav.php' ?>
    <hr>
    <h1>Detalhes de <?php echo $eventoSelec['titulo'] ?>:</h1>
    <table border="2px" cellpadding="3px">
        <tr>
            <td>ID</td>
            <td>Título</td>
            <td>Descrição</td>
            <td>Área</td>
            <td>Data</td>
            <td>Início</td>
            <td>Fim</td>
            <td>Local</td>
            <td>Responsável</td>
        </tr>
        <tr>
            <th><?php echo $eventoSelec['id'] ?></th>
            <th><?php echo $eventoSelec['titulo'] ?></th>
            <th><?php echo $eventoSelec['descricao'] ?></th>
            <th><?php echo $eventoSelec['area'] ?></th>
            <th><?php echo $eventoSelec['data'] ?></th>
            <th><?php echo $eventoSelec['inicio'] ?></th>
            <th><?php echo $eventoSelec['fim'] ?></th>
            <th><?php echo $eventoSelec['local'] ?></th>
            <th><?php echo $eventoSelec['responsavel'] ?></th>
        </tr>
    </table>
    <hr>
    <h2>Outros eventos...</h2>
    <table border="2px" cellpadding="2px">
        <tr>
            <td>Título</td>
            <td>Selecionar</td>
        </tr>
        <?php foreach($eventos as $chave => $evento){ ?>
            <?php if($chave == $idEvento){ continue; } ?>
            <tr>
                <th><?php echo $evento['titulo'] ?></th>
                <th><a href="./detalhes.php?id=<?php echo $chave ?>">Selecionar evento</a></th>
            </tr>
        <?php } ?>
    </table>
</body>
</html>