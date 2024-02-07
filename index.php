<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php require_once 'config.php';
    //var_dump($mysqli);
    
    include_once('function.php');
    include_once('navbar.php');

    $books = getAllBooks($mysqli);

    ?>

    <div class="container my-3">
        <h1 class="display-1 text-danger text-center">Libreria</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-3">
            <?php
            if ($books) {                
                foreach ($books as $key => $book) {

                    ?>
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img src=<?=$book['cover']?> class="img-fluid card-img-top" alt="" />
                            <div class="card-body d-flex flex-column align-items-start">
                                <h5 class="card-title"><?=$book['title'] ?></h5>
                                <p class="card-text badge rounded-pill bg-dark mb-2"><?=$book['genre'] ?></p>
                                <p class="fs-4"><?=$book['author'] ?></p>
                                <p class="fs-4"><?=$book['year']?></p>
                                <div class="mt-auto">
                                    <a class="btn btn-outline-primary" href="modificaLibro.php?id=<?= $book['id'] ?>" role="button">Modifica</a>
                                    <a class="btn btn-outline-danger" href="controller.php?action=delete&id=<?= $book['id'] ?>" role="button">
                                        Elimina</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }
            } ?>


        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>