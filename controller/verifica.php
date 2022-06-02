<?php
session_start();
if(isset($_SESSION['login'])){
    if($_SESSION['login'] == ''){
        echo "<script>window.location.href='../view/login.php';</script>";
    }
}
else{
    echo "<script>window.location.href = '../view/login.php';</script>";  
}