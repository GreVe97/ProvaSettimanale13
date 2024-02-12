<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi Autore</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<body>
    <?php require_once 'config.php';    
    include_once('function.php');
    include_once('navbar.php');
    ?>

<div class="container my-3">
<h1 class="display-5 text-info text-center">Aggiungi un nuovo autore</h1>
        <form method="post" action="controller.php?action=addAuthor" enctype="multipart/form-data" class="my-3">
            <div class="mb-3">
                <label for="firstName" class="form-label">Nome</label>
                <input type="text" class="form-control" id="firstName" placeholder="Nome..." name="firstName">
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Cognome</label>
                <input type="text" class="form-control" id="lastName" placeholder="Cognome..." name="lastName">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Anno di nascita</label>
                <input type="number" class="form-control" id="year" placeholder="Anno..." name="year">
            </div>
            <button type="submit" class="btn btn-dark">Conferma</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>