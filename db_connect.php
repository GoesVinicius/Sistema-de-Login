<?php
//Conexão com Banco de Dados
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'sistemaLogin';

$connect = mysqli_connect($servername, $username, $password, $db_name);

//Verificando falhar na conexão

if (mysqli_connect_error()):
    echo "Falha na conexão: ".mysqli_connect_error();
endif;