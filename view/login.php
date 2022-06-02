<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ConsultUs</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link rel="stylesheet" href="../tether/tether.min.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
     -->

</head>
<body id="home">
        <nav class="navbar fixed-top navbar-light bg-light">
                    <div id="menuStyle">
                        <ul class="nav">
                            <li class="nav-item">
                                <img src="../images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                                <a class="navbar-brand" href="../index.php">ConsultUs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./contato.php">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
									<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
								  </svg></a>
                            </li>
                        </ul>
                    </div>
        </nav>
    <div class="jumbotron" id="headerHome">
    <div class="form">
        <main class="log"> 

            <h2>Login</h2>
            <br>
            <div class="row" id="loginStyle">
                <div class="col-md-6">
                    <form action="../controller/loginController.php"  method="POST"  role="form">
                        <div class="form-group">
                            <label for="login">Digite seu Login:</label>
                            <input  class="form-control" type="text" id="login" name="login" placeholder="Login"  maxlength="11">
                        </div>                <br>
                        <br>
                        <div class="form-group">
                            <label for="senha">Digite sua Senha: </label>
                            <input class="form-control" type="password" id="senha" name="senha" placeholder="Senha">     
                        </div>
                        <br>        
                        <?php
                            if(isset($_SESSION['nao_autenticado'])){
                        ?>
                            <div class='erro_mensagem'>
                                <p>Usuário ou senha inválidos.</p>
                            </div>
                        <?php                   
                            }
                            unset($_SESSION['nao_autenticado']);
                        ?>
                        <?php
                            if(isset($_SESSION['incompleto'])){
                        ?>
                            <div class='erro_mensagem'>
                                <p>Preencha todos os campos!</p>
                            </div>
                        <?php                   
                            }
                            unset($_SESSION['incompleto']);
                        ?>
                        <br>
                        <button type="submit">Entrar</button>
                        <br>
                    </form>
                </div>
            </div>
            <br>
        </main>
    </div>
    </div>
    <div class="row">
                    <div class="col-md-12">
                        <footer class="py-3 my-4">
                            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                                <li class="nav-item"><a class="nav-link px-2 text-muted">Flávio Barbosa</a></li>
                                <li class="nav-item"><a class="nav-link px-2 text-muted">João Lucas</a></li>
                                <li class="nav-item"><a class="nav-link px-2 text-muted">Mariana Campagnoli</a></li>
                                <li class="nav-item"><a class="nav-link px-2 text-muted">Rafaela Luz</a></li>
                                <li class="nav-item"><a class="nav-link px-2 text-muted">Rhaissa Zeferino</a></li>
                                <li class="nav-item"><a class="nav-link px-2 text-muted">Vinícius Sartori</a></li>
                            </ul>
                            <p class="text-center text-muted">© Projeto ADS 3° Semestre, Grupo 2</p>
                        </footer>
                    </div>
    </div>
</body>
</html>