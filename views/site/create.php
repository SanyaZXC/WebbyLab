<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <form action="" method="POST">
            <p>Введите название:</p>
            <input type="text" name="title">

            <p>Введите год выпуска:</p>
            <input type="text" name="release_year">

            <p>Введите формат:</p>
            <input type="text" name="format">

            <p>Введите Актёров(перечислите через запятую):</p>
            <input type="text" name="stars">

            <br>
            <br>
            <input type="submit" name="submit" value="Добавить фильм">

        </form>
    </div>

</section>
</body>

</html>