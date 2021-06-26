<?php

class SiteController
{
    public function actionIndex()
    {
        $db = Db::getConnection();
        var_dump($db);
        require_once ROOT . '/views/site/index.php';
        return true;
    }

    public function actionUpload()
    {
        require_once ROOT . '/views/site/upload.php';
        return true;
    }
}
