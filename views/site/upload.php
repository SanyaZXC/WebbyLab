<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="upload">
    <div class="container">

        <form enctype="multipart/form-data" action="__URL__" method="POST">

            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />

            Отправить этот файл: <input name="userfile" type="file" />
            
            <input type="submit" value="Отправить файл" />
        </form>
    </div>
</div>