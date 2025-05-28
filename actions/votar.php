<?php
include_once ("../config/database/database.php");


$sql ="SELECT * FROM candidatos WHERE id = ".$_GET['id'];
$rows = $con->query($sql);
if($rows->num_rows > 0){
    $row = $rows->fetch_assoc();
    $votos = $row['votos'] + 1;
}
$sql = "UPDATE candidatos SET votos='$votos' WHERE id = ".$_GET['id'];

$con->query($sql);
header("Location: ../index.php");
exit();

?>