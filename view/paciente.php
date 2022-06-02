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
                    <h2>Agendar Consulta</h2>
                        
                        <form action="../controller/cadConsulta.php" method="POST">
                            <div class="form-group">

                                <label for="nome">Paciente </label>
                                <?php   
                                $nomePerfil = $_SESSION['nome'];
                                $login = $_SESSION['login'];
                                $nomePerfil = $_SESSION['nome'];
                                echo'<input type="text" class="form-control" id="nome" name="nome" value='.$nomePerfil.' disabled="">';
                                ?>
                            </div>                            
                            <div class="form-group">
                                <label for="medico">Médico </label>
                                <select class="form-control" id="medico" name="medico">
                                    <?php
                                    $sql = "SELECT nome as 'm_nome' from usuario where CRM IS NOT NULL AND ativo = 1";
                                    $result = mysqli_query($conexao, $sql);
                                    echo'<option>Selecione...</option>';
                                    while($row = mysqli_fetch_array($result)){
                                    echo'<option>'.$row["m_nome"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="espec">Especialidade </label>
                                <select class="form-control" id="espec" name="espec">
                                    <option>Selecione...</option>
                                    <option> Clinico Geral</option>
                                    <option> Pediatra</option>
                                    <option> Dermatologista </option>
                                </select>
                            </div>                            
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="data">Dia</label>
                                <input class="form-control" type="date" id="dataConsulta" name="dataConsulta" placeholder="Data Consulta"><br>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="horario">Horário</label>
                                <select class="form-control" id="horario" name="horario">
                                    <option>Selecione...</option>
                                    <option> 07:40</option>
                                    <option> 08:00</option>
                                    <option> 09:00</option>
                                    <option> 10:00</option>
                                    <option> 11:00</option>
                                    <option> 12:00</option>
                                    <option> 13:00</option>
                                    <option> 14:00</option>
                                    <option> 15:00</option>
                                    <option> 16:00</option>
                                </select>
                            </div>
                            </div>                            
                           <button type="submit" class="btn btn-primary">Agendar</button>
                        </form>
                        <?php
                        if(isset($_SESSION['ja_existe'])){
                        ?>
                            <div>
                                    <p>Horário indisponível para este médico!</p>
                            </div>
                        <?php
                            }
                            unset($_SESSION['ja_existe']);
                            ?>
                    </div>
                    <div class="col-md-6" style="margin-left:85px ;border-left: 5px double #2299aa;">
                        <h2>Histórico de Consultas</h2>
                        <table class="table">
                            <thead style="color: #417982; font-size:1.3rem">
                                <tr>
                                    <th>
                                        Medico
                                    </th>
                                    <th>
                                        Especialidade
                                    </th>
                                    <th>
                                        Data
                                    </th>
                                    <th>
                                        Horário
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($_SESSION['login'])){     
                                    $nomePerfil = $_SESSION['nome'];
                                    $id_logado = $_SESSION['id_user'];
                                    //consulta apenas as consultas do medico atual logado!!!!
                                    $sql = "SELECT c.id_consulta, c.especialidade, c.hora, c.data, m.nome as 'm_nome' from consulta as c
                                    JOIN usuario as m ON c.CRM_med =m.id_user WHERE c.CPF_paciente = '$id_logado'";
                                    $result = mysqli_query($conexao, $sql);
                                }
                                while($row = mysqli_fetch_array($result)){
                            ?>
                                <tr>
                                <td><?php echo $row["m_nome"]; ?></td>
                                <td><?php echo $row["especialidade"]; ?></td>
                                <td><?php echo (date('d/m/Y', strtotime($row["data"]))); ?></td>
                                <td><?php echo $row["hora"]; ?></td>
                                <td><?php echo '<a href="../controller/ExlcuirConsult.php?consulta='. $row['id_consulta'].'"><button type="submit">Cancelar Consulta</button></a>';?></td>
                                </tr>
                                <?php
                                }
                            ?>
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