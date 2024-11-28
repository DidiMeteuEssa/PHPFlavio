<?php
    session_start();
    print_r($_SESSION);
    echo "<br>Credenciais: ".$_SESSION["cpf"]."<br>".$_SESSION["senha"]."<br>".$_SESSION["nome"];
?>