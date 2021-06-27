<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <p>Поисковой запрос: <?= $_POST['search']; ?></p>
        <p>Результаты поиска:</p>
        <?php if (!empty($data)) : ?>
            <?php foreach ($data as $film) : ?>
                <p><a href="/site/film/<?= $film['id'] ?>"><?= $film['title']; ?></a></p>
            <?php endforeach; ?>
        <?php else : ?>
            <p>По вашему запросу ничего не найдено(</p>
        <?php endif; ?>
    </div>
</section>