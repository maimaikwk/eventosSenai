<?php

require_once __DIR__ . "/init.php";
require_once __DIR__ . "/cadastro.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(!isset ($_POST['titulo']) || $_POST['titulo'] == "" || strlen(trim($_POST['titulo'])) < 5
    || !isset ($_POST['descricao']) || $_POST['descricao'] == "" || strlen(trim($_POST['descricao'])) < 25
    || !isset ($_POST['area']) || $_POST['area'] == "" 
    || !isset ($_POST['data']) || $_POST['data'] < date('Y-m-d')
    || !isset ($_POST['inicio']) || $_POST['inicio'] == ""
    || !isset ($_POST['fim']) || $_POST['fim'] == ""
    || !isset ($_POST['local']) || $_POST['local'] == "" || strlen(trim($_POST['local'])) < 10
    || !isset ($_POST['responsavel']) || $_POST['responsavel'] == "" || strlen(trim($_POST['responsavel'])) < 10){
        header("Location: formCadastro.php?erro=falta_de_dados");
        exit;
    }
};
$_SESSION['eventos'][] = $_POST;


header("Location: index.php");