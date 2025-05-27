<?php
include_once ("../config/database/database.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nome = $_POST['nome'];
    $partido = $_POST['partido'];
    move_uploaded_file($_FILES["foto"]["tmp_name"], "../Imagens/" . $nome . ".png");
    $foto = "../Imagens/" . $nome . ".png";

    $sql = "INSERT INTO candidatos (foto, nome, partido) VALUES ('$foto', '$nome', '$partido')";

    $con->query($sql);
    header("Location: ../index.php");
    exit();

}

?>