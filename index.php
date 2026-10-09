<?php
require_once 'init.php';

$eventos = $_SESSION['eventos'];

$eventoDetectado = false; // quando TRUE significa que o user selecionou um evento
$eventoAtual = null;

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
        $id = $_GET['id'];
        $eventoDetectado = true;
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
            <a href='php?id={$chave}'>
            {$evento['titulo']}
            </a>
            </li>
            ";
            }
            ?>
    <hr>
    <h2>Deseja ver detalhes, excluir ou editar algum evento?</h2>
    <?php if($eventoDetectado): ?>
        <h2>Você selecionou o evento: <?php echo $_SESSION['eventos'][$_GET['id']]['titulo'] ?></h2>
        <form action="">
            <input type="text" name="id" id="id" 
            value="<?= $_GET['id'] ?>"
            hidden>

            <a href="./detalhes.php?id=<?php echo $id ?>">
                <button type="button">Detalhes</button>
            </a>
            <a href="./edicao.php?id=<?php echo $id ?>">
                <button type="button">Alterar</button>
            </a>
            <a href="./remocao.php?id=<?php echo $id ?>">
                <button type="button">Excluir</button>
            </a>
        </form>    
        <?php else: ?>
            <h2>Selecione um evento acima!</h2>
        <?php endif; ?>
</body>
</html>     