<?php

class SiteController
{
    public function actionIndex()
    {
        $filmList = Film::getFilmList();
        require_once ROOT . '/views/site/index.php';
        return true;
    }

    public function actionAddFilm()
    {
        if (isset($_POST['submit'])) {
            $params = [$_POST['title'], $_POST['release_year'], $_POST['format'], $_POST['stars']];

            $errors = Film::validate($params);
            if (is_bool($errors)) {
                Film::addFilm($params);
                header('Location: /');
            }
        }
        require_once ROOT . '/views/site/create.php';
        return true;
    }

    public function actionUpload()
    {
        if (!empty($_FILES['films']['name'])) {
            Film::upload();
            header("Location: /");
        }

        require_once ROOT . '/views/site/upload.php';
        return true;
    }

    public function actionView($filmId)
    {
        $film = Film::getFilmById($filmId);
        require_once ROOT . '/views/site/view.php';
        return true;
    }

    public function actionDelete($filmId)
    {
        $result = Film::deleteFilmById($filmId);
        header('Location: /');
        return $result;
    }

    public function actionSearch()
    {
        $data = Film::getSearchedFilm();

        require_once ROOT . '/views/site/search.php';
        return true;
    }
}
