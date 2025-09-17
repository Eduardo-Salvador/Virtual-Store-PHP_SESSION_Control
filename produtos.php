<?php

    session_start();

    if (!isset($_SESSION['usuario_logado'])) {
        header(header: 'Location: index.html');
        exit(); 
    }

    echo "<h1>Página Restrita</h1>";
    echo "<h2>Bem-vindo, " . $_SESSION['usuario_logado'] . "!</h2>";
    echo '<a href="logout.php">Sair</a>';

?>