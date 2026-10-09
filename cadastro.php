<?php
require_once 'init.php';
?>

<head>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php require_once __DIR__ . "/nav.php"; ?>
    <h1>Eventos Senai - Cadastro</h1>
    

    <form action="processaCadastro.php" method="POST">
        <input type="text" name="id" id="id" value="<?= $_GET['id'] ?>" hidden>

        <label for="titulo">Título: </label>
        <input type="text" name="titulo" id="titulo" required>
        <br>

        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" min="25" id="descricao" required>
        <br>

        <label for="area">Área: </label>
        <input type="text" name="area" id="area" required>
        <br>

        <label for="data">Data: </label>
        <input type="date" name="data" id="data" required>
        <br>

        <label for="inicio">Horário de início: </label>
        <input type="time" name="inicio" id="inicio" required>
        <br>

        <label for="fim">Horário de fim: </label>
        <input type="time" name="fim" id="fim" required>
        <br>

        <label for="local">Local: </label>
        <input type="text" name="local" id="local">
        <br>

        <label for="responsavel">Professor(a):</label>
        <input type="text" name="responsavel" id="resposavel">
        <br>

        <?php
            if(isset($_GET['erro']) && $_GET['erro'] != ""){
                echo "<p> ERRO DETECTADO: {$_GET['erro']}</p>";
            }
        ?>
        
        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>