<?php
    require_once('../controller/conexao.php');
    require_once('../controller/verifica.php');
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
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <?php require_once('cabeca.php');?>   
                <div class="jumbotron" id="usuarioLogado">
                    <h1>
                        ConsultUs,
                    </h1>
                    <h2>O consultório ideal para você!</h2>
               </div>

                <div class="row" id="pages">
                    <div class="col-md-3" style="margin-left:2rem" >
                    <h2>Cadastrar medico</h2>
                        
                        <form action="../controller/cadMed.php" method="POST">
                            <div class="form-group">

                                <label for="nome">Nome </label>
                                <input type="text" class="form-control" id="nome" name="nome" value="Nome">
                            </div>                            
                            <div class="form-group">
                                <label for="medico">Login </label>
                                <input type="text" class="form-control" id="login" name="login" value="Login">
                            </div>
                            <div class="form-group">
                                <label for="espec">Senha </label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                            </div>                            
                            <div class="row">
                            <div class="form-group col-md-6">
                            </div>
                            </div>             
                    </div>
                    <div class="col-md-6" style="margin-left:15px; margin-top:10px;">
                        <table class="table">
                        <div class="form-group">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <label for="espec">E-mail </label>
                            <input type="text" style="width: 15rem"class="form-control" id="email" name="email" placeholder="Senha">
                            <br>
                            <label for="espec">CPF </label>
                            <input type="text" style="width: 15rem"class="form-control" id="cpf" name="cpf" placeholder="Senha">
                            <br>
                            <label for="espec">CRM </label>
                            <input type="text" style="width: 15rem"class="form-control" id="crm" name="crm" placeholder="Senha">
                        </div>  
                        <button type="submit" style="margin-top: -300px" class="btn btn-primary">Cadastrar</button>
                        </table>
                    </div>
                    </form>
                </div>
                <hr style="border-top: 5px double #2299aa;margin-top: 10rem;">
                <div class="row" id="pages" >
                <div class="col-md-11" style="margin-left: 5rem; margin-top: 10rem;">
                        <h2 style="text-align:center">Médicos Cadastrados</h2>
                        <table class="table">
                            <thead style="color: #417982; font-size:1.3rem">
                                <tr>
                                    <th>
                                        Id médico
                                    </th>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                    <th>
                                        CPF
                                    </th>
                                    <th>
                                        CRM
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $sql = "SELECT *  from usuario where CRM IS NOT NULL";
                                    $result = mysqli_query($conexao, $sql);
                        
                                    while($row = mysqli_fetch_array($result)){
                                        if($row["ativo"]==1){
                                ?>
                                    <tr>
                                    <td><?php echo $row["id_user"]; ?></td>
                                    <td><?php echo $row["nome"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["CPF"]; ?></td>
                                    <td><?php echo $row["CRM"]; ?></td>
                                    <td><?php echo '<a href="../controller/excluirMed.php?usuario='. $row['id_user'].'"><button style="heigth: 5px;margin-left: -30px; margin-top:5px" type="submit"> Excluir Médico</button></a>';?></td>
                                
                                    </tr>
                                    <?php
                                        }
                                    }
                                ?>
                                </tr>
                            </tbody>
                        </table>
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
            </div>
        </div>
    </div>




    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>