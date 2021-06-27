<?php

/**
 * @var $filmList models/Film.php
 */

include ROOT . '/views/layouts/header.php'; 

?>

<section>

    <div class="container">
        <div class="content">
            <h1>Фильмы</h1>
            <?php if (!empty($filmList)):?>
            <table class="table">
                <tr>
                    <th>Название</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($filmList as $film) : ?>
                    <tr>
                        <td><a href="/site/film/<?= $film['id']?>"><?= $film['title']; ?></a></td>

                        <td><a href="/site/delete/<?= $film['id']?>">Удалить</a></td>
                    </tr>

                <?php endforeach; ?>
            </table>
            <?php else:?>
            <p>фильмов пока нет(</p>
            <?php endif;?>
        </div>
    </div>

</section>
</body>

</html>