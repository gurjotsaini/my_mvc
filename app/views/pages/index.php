<?php require APP_ROOT . '/views/inc/header.php';  ?>
<?php require APP_ROOT . '/views/inc/nav.php';  ?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?= $data['title']; ?></h1>
            <p class="lead text-muted">
                For source code, Go to the following Github page:
            </p>
            <p>
                <a href="https://github.com/gurjotsaini/my_mvc" class="btn btn-primary my-2" target="_blank">MyMVC Github</a>
            </p>
        </div>
    </section>
<?php require APP_ROOT . '/views/inc/footer.php';  ?>