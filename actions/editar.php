<?php
include_once("././config/database/database.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nome = $_POST['nome'];
    $partido = $_POST['partido'];
    move_uploaded_file($_FILES["foto"]["tmp_name"], "././Imagens/" . $nome . ".png");
    $foto = "./Imagens/" . $nome . ".png";

    $sql = "UPDATE candidatos SET nome='$nome', partido='$partido', foto='$foto' WHERE id = ".$_GET['id'];

    $con->query($sql);
    header("Location: ../index.php");
    exit();

}

$sql ="SELECT * FROM candidatos WHERE id = ".$_GET['id'];
$rows = $con->query($sql);
if($rows->num_rows > 0){
    $row = $rows->fetch_assoc();
    $nome = $row['nome'];
    $partido = $row['partido'];
    $foto = $row['foto'];
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<form method="POST" enctype="multipart/form-data">
    <div class="container" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Candidato</h1>
      </div>
      <div class="modal-body">
      <div class="mb-3 form">
        <label for="exampleFormControlInput1">Nome</label>
        <input name="nome" type="text" value="<?=$nome?>" class="form-control" id="exampleFormControlInput1" placeholder="" value="" required>
      </div>
      <div class="mb-3 form">
        <label for="exampleFormControlInput2">Partido</label>
        <input name="partido" type="partido" value="<?=$partido?>" class="form-control" id="exampleFormControlInput2" placeholder="" value="" required>
      </div>
      <div class="mb-3">
      <label for="foto" class="form-label">Foto do Candidato</label>
      <input class="form-control" type="file"" id="foto" name="foto">
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-person-badge"></i>
          Salvar Alterações
        </button>
      </div>
    </div>
  </div>
</div>
</form>