<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php require_once 'config.php';
    include_once('function.php');
    include_once('navbar.php');

    if (isset($_REQUEST['id'])) {
        $book = getBookByID($mysqli);
    }
    ?>
    <div class="container my-3">
        <h1 class="display-5 text-secondary-emphasis text-center">Modifica libro</h1>
        <form method="post" action="controller.php?action=update&id=<?=$_REQUEST['id']?>" enctype="multipart/form-data" class="my-3">
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" value="<?= $book['title'] ?>" class="form-control" id="title" placeholder="Titolo..."
                    name="title">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genere</label>
                <input type="text" value="<?= $book['genre'] ?>" class="form-control" id="genre" placeholder="Genere..."
                    name="genre">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Autore</label>
                <input type="text" value="<?= $book['author'] ?>" class="form-control" id="author"
                    placeholder="Autore..." name="author">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Anno di pubblicazione</label>
                <input type="number" value="<?= $book['year'] ?>" class="form-control" id="year" placeholder="Anno..."
                    name="year">
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Copertina</label>
                <input type="file" value="<?= $book['cover'] ?>" class="form-control" id="cover"
                    placeholder="Copertina..." name="cover">
            </div>
            <button type="submit" class="btn btn-dark">Conferma</button>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>