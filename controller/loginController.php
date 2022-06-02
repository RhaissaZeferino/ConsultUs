<?php
session_start();
    require_once('conexao.php');
    
    if(empty($_POST['login']) || empty($_POST['senha'])){
        $_SESSION['incompleto'] = true;
        echo "<script>window.location.href='../view/login.php';</script>";
        exit();
    }

    $login  = mysqli_real_escape_string($conexao, $_POST['login']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    //AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
    $sql = "SELECT* from usuario where login='{$login}' and senha= '{$senha}'";

    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_array($result);

    if($row){
        if($row["ativo"]==1){
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            $_SESSION['tipo_user'] = $row['tipo_user'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['CPF'] = $row['CPF'];
            $_SESSION['CRM'] = $row['CRM'];

            if($row['tipo_user'] == 1){
                echo "<script>window.location.href='../view/admin.php';</script>";
            }
            else if($row['tipo_user'] == 2){
                echo "<script>window.location.href='../view/medico.php';</script>";
            }
            else{
                echo "<script>window.location.href='../view/paciente.php';</script>";
            }
        }else{
            $_SESSION['nao_autenticado'] = true;
            echo "<script>window.location.href='../view/login.php';</script>";
        }
    } 
    else{
        $_SESSION['nao_autenticado'] = true;
        echo "<script>window.location.href='../view/login.php';</script>";
    }

    
    
?>