<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Autore</title>
</head>
<body>
<?php require_once 'config.php';   
    include_once('function.php');
    include_once('navbar.php');
    if (isset($_REQUEST['id'])) {
        $book = getAuthorByID($mysqli);
    }
    ?>

<div class="container my-3">
        <h1 class="display-5 text-secondary-emphasis text-center">Modifica libro</h1>
        <form method="post" action="controller.php?action=updateAuthor&id=<?=$_REQUEST['id']?>&oldCover=<?=$book['cover']?>" enctype="multipart/form-data" class="my-3">
            <div class="mb-3">
                <label for="title" class="form-label">Nome</label>
                <input type="text" value="<?= $author['firstName'] ?>" class="form-control" id="title" placeholder="Nome..."
                    name="title">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Cognome</label>
                <input type="text" value="<?= $author['lastName'] ?>" class="form-control" id="genre" placeholder="Cognome..."
                    name="genre">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Anno di nascita</label>
                <input type="number" value="<?= $author['year'] ?>" class="form-control" id="year" placeholder="Anno..."
                    name="year">
            </div>
            <button type="submit" class="btn btn-dark">Conferma</button>
        </form>
    </div>
</body>
</html>