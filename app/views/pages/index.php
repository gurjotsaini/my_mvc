<?php require APP_ROOT . '/views/inc/header.php';  ?>
<?php //require APP_ROOT . '/views/inc/nav.php';  ?>
    <h1><?= $data['title']; ?></h1>
    <ul>
        <?php foreach ($data['posts'] as $post) : ?>
        <li><?= $post->title; ?></li>
        <?php endforeach; ?>
    </ul>
<?php require APP_ROOT . '/views/inc/footer.php';  ?>