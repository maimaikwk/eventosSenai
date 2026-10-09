<?php
require_once 'init.php';


    $eventoDetectada = false; //quando true significa q o user selecionou uma noticia
    $eventoAtual = null;

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
        $id = $_GET['id'];
        $eventoDetectada = true;
        $eventoAtual = $_SESSION['eventos'][$id];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $eventoAlterada = $_POST;
    
    $_SESSION['eventos'][$id] = $_POST;

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    </title>
</head>
    <body>
        
            <div class="cabecalho">
        <h1><u>EventosSENAI - Edição</u></h1>

       <?php require_once 'nav.php';?>
</div>
        
    <ul>
        <?php  foreach($_SESSION['eventos'] as $chave => $evento){
            print"
                <br>
                <li>
                    <a href='edicao.php?id={$chave}'>
                    {$evento['titulo']}</a>
                </li>
                <br>
            

            ";
        }
        ?>
        </ul>



        <?php if($eventoDetectada): ?>
        <div class= "formbox">
          <br>
        
        <form action="edicao.php" method="POST">
                <input type="text" name="id" id="id"
                value="<?= $_GET['id']?>"
                hidden><!-- pra esconder essa info do usuario mas ela ainda esta junto das outras (processaAlteracao consegue ver)-->


                <label for="titulo"> Titulo: </label>
                <input type="text" name="titulo" id="titulo" 
                value="<?= $eventoAtual['titulo']?>"> <!--deixa o formulario ja preenchido e ai so edita-->
                <br>
                <br>

                <label for="descricao"> Descrição: </label>
                <input type="text" name="descricao" id="descricao"
                value="<?= $eventoAtual['descricao']?>">
                <br>
                <br>

                <label for="area"> Área: </label>
                <input type="text" name="area" id="area"
                value="<?= $eventoAtual['area']?>">
                <br>
                <br>

                <label for="data"> Data: </label>
                <input type="date" name="data" id="data"
                value="<?= $eventoAtual['data']?>">
                <br>
                <br>

                <label for="inicio"> Inicio: </label>
                <input type="text" name="inicio" id="inicio"
                value="<?= $eventoAtual['inicio']?>">
                <br>
                <br>

                <label for="fim"> Fim: </label>
                <input type="text" name="fim" id="fim"
                value="<?= $eventoAtual['fim']?>">
                <br>
                <br>

                <label for="local"> Local: </label>
                <input type="text" name="local" id="local"
                value="<?= $eventoAtual['local']?>">
                <br>
                <br>

                <label for="responsavel"> Responsável: </label>
                <input type="text" name="responsavel" id="responsavel"
                value="<?= $eventoAtual['responsavel']?>">
                <br>
                <br>

                <?php 
                if(isset($_GET['erro'])){
                    echo "<p>Erro detectado: {$_GET['erro']}</p>";}?>

                <button type="submit">Finalizar</button>
                <br>
                
        </form>
        </div>
        <?php else: ?>
            <p> Selecione um dos eventos acima!</p>
        <?php endif; ?>
        
    </body>


</html>