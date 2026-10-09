<?php
require_once __DIR__ . "/init.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $eventoAlterada = $_POST;
    
    $_SESSION['eventos'][$id] = $_POST;

    header("Location: index.php");
    exit;
    

}
?>