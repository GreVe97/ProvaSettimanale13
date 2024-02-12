<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Autori</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<body>
    <?php require_once 'config.php';
    include_once('function.php');
    include_once('navbar.php');
    $authors = getAllAuthors($mysqli);
    ?>

    <div class="container my-3">
        <h1 class="display-5 text-warning text-center">Lista Autori</h1>
        <table class="table mt-4 table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">cognome</th>
                    <th scope="col">Anno di nascita</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($authors) {
                    foreach ($authors as $key => $author) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?= $key + 1 ?>
                            </th>
                            <td>
                                <?= $author['firstName'] ?>
                            </td>
                            <td>
                                <?= $author['lastName'] ?>
                            </td>
                            <td>
                                <?= $author['year'] ?>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="controller.php?action=deleteAuthor&id=<?= $author['id'] ?>"
                                    role="button"><i class="bi bi-trash3"></i></a>
                                <a class="btn btn-warning" href="update.php?id=<?= $author['id'] ?>" role="button">M</a>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>