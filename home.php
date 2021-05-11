<?php
//conexão
require_once 'db_connect.php';

//sessão
session_start();

//Verificação
if (!isset($_SESSION['logado'])):
    header('location: index.php');
endif;

//Dados
$id = $_SESSION['id_usuario'];
$sql = "select * from usuarios where id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>home - pagina restrita</title>
</head>

<body>

    <div id="logado" class="container">
        <h1>Olá <?php echo $dados['nome']; ?></h1>
        <p>Voce está logado!</p>

        <a href="logout.php">sair</a>
    </div>

    <footer>
    <p>
        Desenvolvido por Vinicius Góes | Maio de 2021 <br>
        Todos os Direitos Reservados
    </p>
</footer>

</body>

</html>
