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

                <div class="row" id="pages" >
                <div class="col-md-11" style="margin-left: 5rem;">
                        <h2 style="text-align:center">Históricos de Todas as Consultas</h2>
                        <table class="table">
                            <thead style="color: #417982; font-size:1.3rem">
                                <tr>
                                    <th>
                                        Medico
                                    </th>
                                    <th>
                                        Paciente
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
                                <tr>
                                    <?php
                                    $sql = "SELECT c.id_consulta, c.especialidade, c.hora, c.data, p.nome,m.nome as 'm_nome' from consulta as c
                                    JOIN usuario as p ON c.CPF_paciente = p.id_user
                                    JOIN usuario as m ON c.CRM_med =m.id_user";
                                    $result = mysqli_query($conexao, $sql);
                        
                                    while($row = mysqli_fetch_array($result)){
                                ?>
                                    <tr>
                                    <td><?php echo $row["m_nome"]; ?></td>
                                    <td><?php echo $row["nome"]; ?></td>
                                    <td><?php echo $row["especialidade"]; ?></td>
                                    <td><?php echo (date('d/m/Y', strtotime($row["data"]))); ?></td>
                                    <td><?php echo $row["hora"]; ?></td>
                                    <td><?php echo '<a href="../controller/ExlcuirConsult.php?consulta='. $row['id_consulta'].'"><button type="submit">Cancelar Consulta</button></a>';?></td>
                                
                                    </tr>
                                    <?php
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