<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">

        <form enctype="multipart/form-data" action="" method="POST">

            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />

            Импортировать фильмы из txt: <input name="films" type="file" />
            
            <input type="submit" value="Отправить" />
        </form>
    </div>
</section>