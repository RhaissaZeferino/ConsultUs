<?php
    session_start();
    include('conexao.php');
    $_SESSION['ja_existe'] = false;
    $login = $_SESSION['login'];
    $medico = mysqli_real_escape_string($conexao, trim($_POST['medico']));
    $especialidade = mysqli_real_escape_string($conexao, trim($_POST['espec']));
    $hora = mysqli_real_escape_string($conexao, trim($_POST['horario']));
    $dataConsulta = mysqli_real_escape_string($conexao, date('Y-m-d', strtotime($_POST['dataConsulta'])));
    $cpf_user = $_SESSION['id_user'];

    $sql = "SELECT id_user from usuario where nome='$medico'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_array($result);
    $CRM_medico = $row['id_user'];

    $sql = "SELECT * from consulta where (CRM_med='$CRM_medico' and hora = '$hora' and data = '$dataConsulta') ";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_array($result);
    if($row == 0){
        $sql = "INSERT INTO consulta (CPF_paciente, CRM_med, data, hora, id_consulta, especialidade) VALUES ($cpf_user, $CRM_medico, '$dataConsulta', '$hora', null, '$especialidade')";
        if($conexao->query($sql) === TRUE){
            echo "<script>window.location.href='../view/paciente.php';</script>";
        }else{
            echo "Error: ".$sql."<br>".$conexao->error;
        }
    }
    else if($medico !== NULL){
        $_SESSION['ja_existe'] = true;
        echo "<script>window.location.href='../view/paciente.php';</script>";
    }
    $conexao->close();
    exit();
    echo "<script>window.location.href='../view/paciente.php';</script>";
        
?>