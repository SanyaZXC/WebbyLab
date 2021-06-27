<?php

class SiteController
{
    public function actionIndex()
    {
        $db = Db::getConnection();

        $filmList = [];

        $result = $db->query('SELECT * FROM film ORDER BY title;');

        $i = 0;
        while ($row = $result->fetch()) {
            $filmList[$i]['id'] = $row['id'];
            $filmList[$i]['title'] = $row['title'];
            $filmList[$i]['release_year'] = $row['release_year'];
            $filmList[$i]['format'] = $row['format'];
            $filmList[$i]['stars'] = $row['stars'];
            $i++;
        }
        require_once ROOT . '/views/site/index.php';
        return true;
    }

    public function actionUpload()
    {
        if (!empty($_FILES['films']['name'])) {
            $db = Db::getConnection();

            $films = explode(PHP_EOL . PHP_EOL, file_get_contents($_FILES['films']['tmp_name']));

            foreach ($films as $film) {

                $film = explode(PHP_EOL, trim($film));

                $data = [];
                foreach ($film as $line) {
                    $obj = explode(': ', $line);
                    $data[] = $obj[1];
                }

                $sql = "INSERT INTO film (title, release_year, format, stars) 
                        VALUES (:title, :release_year, :format, :stars);";
                $result = $db->prepare($sql);
                $result->bindParam(':title', $data[0], PDO::PARAM_STR);
                $result->bindParam(':release_year', $data[1], PDO::PARAM_INT);
                $result->bindParam(':format', $data[2], PDO::PARAM_STR);
                $result->bindParam(':stars', $data[3], PDO::PARAM_STR);
                $result->execute();
            }
            header("Location: /");
        }

        require_once ROOT . '/views/site/upload.php';
        return true;
    }

    public function actionView($filmId)
    {
        echo $filmId;die;
    }
}
