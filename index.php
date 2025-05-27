<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Candidatos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?php
        require_once "./config/database/database.php";
    ?>
</head>
<body class="bg-gray-100">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Lista de Candidatos</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Adicionar Candidato
        </button>

        <!-- Modal -->
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Dados do Candidato</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="./actions/adicionar.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto do Candidato</label>
                    <input class="form-control" type="file" id="foto" name="foto">
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Candidato</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="mb-3">
                    <label for="partido" class="form-label">Partido do Candidato</label>
                    <input type="text" class="form-control" id="partido" name="partido">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </div>
            </form>
            </div>
        </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Candidato 1 -->
        <?php
        if(!file_exists("./Imagens")){
            mkdir("./Imagens");
        }


        $sql = "SELECT * FROM candidatos ORDER BY id"; 
        $rows = $con->query($sql);
        if($rows->num_rows > 0){
            while($row = $rows->fetch_assoc()){
            echo '
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="'.$row['foto'].'" alt="'.$row['nome'].'" class="w-full h-48 object-cover">
                <div class="p-4 pb-1">
                    <h2 class="text-xl font-bold mb-2">'.$row['nome'].'</h2>
                    <p class="text-gray-700 mb-1">Partido: '.$row['partido'].'</p>
                    <p class="text-gray-700 mb-1">Votos: '.$row['votos'].'</p>
                    <p class="text-gray-700">Data da Eleição: 01/01/2024</p>
                </div>
                <a class="btn btn-danger ml-5 mb-3" href="actions/deletar.php?id='.$row['ID'].'">
                  <i class="bi bi-trash"></i>
                  Deletar
                </a>

                <a class="btn btn-primary mb-3" href="actions/editar.php?id='.$row['ID'].'">
                  <i class="bi bi-eye"></i>
                  Editar
                </a>
            </div>
            ';
            }
        }
        ?>
        </div>
    </div>
</body>
</html>