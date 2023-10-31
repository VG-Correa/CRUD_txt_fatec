<?php
include_once("../Models/Model_Paciente.php");
include_once("../Models/Model_Terapeuta.php");

session_start();

if (isset($_SESSION["usuario_logado"])) {

    if ($_SESSION["usuario_logado"]->tipo == "terapeuta") {
        $interage = "Pacientes";
    } else {
        $interage = "Terapeuras";
    }

    echo "<head>    
    <link rel='stylesheet' href='style.css'>
    
    <nav>
    <ul>
    <li><a href='../Controllers/Controller.php?acao=sair'>Sair</a></li>
    </ul>
    </nav>
    </head>
    ";

} else {

    echo "<head>    
    <link rel='stylesheet' href='css/style.css'>
    
    <nav>
    <ul>
    <li><a href='Login.php'>Login</a></li>
    <li><a href='Cadastrar.php'>Cadastre-se</a></li>
    </ul>
    </nav>
    </head>";
    
}
    
    ?>