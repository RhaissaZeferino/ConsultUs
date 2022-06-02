<?php
    session_start();
    require_once('conexao.php');
   
    $consulta = 0;
    if(isset($_REQUEST["consulta"])) {
        if($_REQUEST["consulta"] != "") {
        $consulta = $_REQUEST["consulta"];
        }
    }
    $query = "SELECT * from consulta where id_consulta =".$consulta;
    $result = mysqli_query($conexao, $query);

    if(mysqli_fetch_array($result)){
        $query = "DELETE from consulta where id_consulta =".$consulta;

        if($result = mysqli_query($conexao, $query)){
            $query = "DELETE from consulta where id_consulta =".$consulta;
            $result = mysqli_query($conexao, $query);
            if($_SESSION['tipo_user'] == 1){
                echo "<script>window.location.href='../view/admin.php';</script>";
            }
            else if($_SESSION['tipo_user'] == 2){
                echo "<script>window.location.href='../view/medico.php';</script>";
            }
            else{ 
                echo "<script>window.location.href='../view/paciente.php';</script>";
            }
        } 
     
    }