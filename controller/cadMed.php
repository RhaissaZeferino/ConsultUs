<?php
    session_start();
    include('conexao.php');

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $login = mysqli_real_escape_string($conexao, trim($_POST['login']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $crm = mysqli_real_escape_string($conexao, trim($_POST['crm']));

    $sql = "INSERT INTO usuario (id_user, nome, login, senha, tipo_user, email, CPF, CRM) VALUES (null, '$nome', '$login', '$senha', 2, '$email', $cpf, $crm)";
    if($conexao->query($sql) === TRUE){
        echo "<script>window.location.href='../view/admin.php';</script>";
    }else{
        echo "Error: ".$sql."<br>".$conexao->error;
    }
    $conexao->close();
    exit();
    echo "<script>windo.location.href='../view/gerenciaMedico.php';</script>";
    
?>