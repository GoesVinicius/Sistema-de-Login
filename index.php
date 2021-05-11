<?php
    //conexão
    require_once 'db_connect.php';

    //sessão
    session_start();

    //botão de acesso para enviar informações
    if(isset($_POST['btn-entrar'])):
        $erros = array();
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);

        if (empty($login) or empty($senha)):
            $erros[] = "<li>O campo login/senha precisa ser preenchidos</li>";

            else:
                $sql = "select login from usuarios where login = '$login'";
                $resultado = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($resultado) > 0):
                            $sql = "select * from usuarios where login = '$login' and senha = '$senha'";
                            $resultado = mysqli_query($connect, $sql);

                                if (mysqli_num_rows($resultado) == 1):
                                    $dados = mysqli_fetch_array($resultado);
                                    $_SESSION ['logado'] = true;
                                    $_SESSION ['id_usuario'] = $dados['id'];
                                    header('location: home.php');

                                    else:
                                        $erros [] = "<li>Usuário ou senha nao conferem</li>";
                                endif;

                        else:
                            $erros [] = "<li>Usuário inexistente</li>";
                    endif;
            endif;

    endif;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>login</title>
</head>

<body>
  

<div id="principal" class="container">

    <div id="entrar">

        <h1>Acessar Sistema</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
           <p> Usuário <input type="text" name="login" size="20" placeholder="Digite seu usuário"> </p> <br>
           <p> Senha <input type="password" name="senha" size="22" placeholder="Digite sua senha"> </p> <br>
            <button type="submit" name="btn-entrar">Acessar</button>
        </form>

    </div>
    
    <div id="info">

    <?php
            if(!empty($erros)):
                foreach ($erros as $erro):
                    echo $erro;
                endforeach;
            endif;
        ?>

    </div>

</div>

<footer>
    <p>
        Desenvolvido por Vinicius Góes | Maio de 2021 <br>
        Todos os Direitos Reservados
    </p>
</footer>

</body>

</html>

