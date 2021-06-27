<?php include ROOT . '/views/layouts/header.php'; ?>

<section>

    <div class="container">
        <div class="content">
            <h1>Фильмы</h1>
            <table class="table">
                <tr>
                    <th>Название</th>
                    <th>Год выпуска</th>
                    <th>Формат</th>
                    <th>Актёры</th>
                </tr>
                <?php foreach ($filmList as $film) : ?>
                    <tr>
                        <td><a href="/site/film/<?= $film['id']?>"><?= $film['title']; ?></a></td>
                        <td><?= $film['release_year']; ?></td>
                        <td><?= $film['format']; ?></td>
                        <td><?= $film['stars']; ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>
        </div>
    </div>

</section>
</body>

</html>