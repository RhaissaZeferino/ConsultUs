<?php
    session_start();
    require_once('conexao.php');
   
    $usuario = 0;
    if(isset($_REQUEST["usuario"])) {
        if($_REQUEST["usuario"] != "") {
        $usuario = $_REQUEST["usuario"];
        echo $usuario;
        }
    }
    $query = "SELECT * from usuario where id_user =".$usuario;
    $result = mysqli_query($conexao, $query);

    if(mysqli_fetch_array($result)){
        $query = "UPDATE usuario SET ativo = 0 WHERE id_user =".$usuario;

        //        $query = "DELETE from usuario where id_user =".$usuario;

        if($result = mysqli_query($conexao, $query)){
            $query = "UPDATE usuario SET ativo = 0 WHERE id_user =".$usuario;
//            $query = "DELETE from usuario where id_user =".$usuario;
            $result = mysqli_query($conexao, $query);
            if($_SESSION['tipo_user'] == 1){
                echo "<script>window.location.href='../view/gerenciaMedico.php';</script>";
            }
            else if($_SESSION['tipo_user'] == 2){
                echo "<script>window.location.href='../view/medico.php';</script>";
            }
            else{ 
                echo "<script>window.location.href='../view/paciente.php';</script>";
            }
        } 
     
    }