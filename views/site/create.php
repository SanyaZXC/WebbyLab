<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <?php if (isset($errors) && is_array($errors)) : ?>
            <?php foreach ($errors as $error) : ?>
                <p style="color: red"><?= $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <form action="" method="POST">
            <p>Введите название:</p>

            <input type="text" name="title" value="<?php if (isset($params)) echo $params[0] ?>">

            <p>Введите год выпуска:</p>
            <input type="text" name="release_year" value="<?php if (isset($params)) echo $params[1] ?>">

            <p>Введите формат:</p>
            <input type="text" name="format" value="<?php if (isset($params)) echo $params[2] ?>">

            <p>Введите Актёров(перечислите через запятую):</p>
            <input type="text" name="stars" value="<?php if (isset($params)) echo $params[3] ?>">

            <br>
            <br>
            <input type="submit" name="submit" value="Добавить фильм">

        </form>
    </div>

</section>
</body>

</html>