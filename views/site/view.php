<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <p>Название: <?= $film['title'];?></p>
        <p>Год Выпуска: <?= $film['release_year'];?></p>
        <p>Формат: <?= $film['format'];?></p>
        <p>Актёры: <?= $film['stars'];?></p>
    </div>

</section>
</body>

</html>