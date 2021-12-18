<?php
    DEFINE("HOST", "localhost");
    DEFINE("USER", "root");
    DEFINE("PASSWORD", "");
    DEFINE("DATABASE", "daoralab");

    $dbc = mysqli_connect(HOST, USER, PASSAWORD, DATABASE) or die ("<br />Erro ao conectar no servidor.");
?>