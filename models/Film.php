<?php

class Film
{
    /**
     * get all films
     */
    public static function getFilmList()
    {
        $db = Db::getConnection();

        $filmList = [];

        $result = $db->query('SELECT id, title FROM film ORDER BY title;');

        $i = 0;
        while ($row = $result->fetch()) {
            $filmList[$i]['id'] = $row['id'];
            $filmList[$i]['title'] = $row['title'];
            $i++;
        }
        return $filmList;
    }

    /**
     * add film
     */
    public static function addFilm($params)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO film '
        . '(title, release_year, format, stars) '
        . 'VALUES '
        . '(:title, :release_year, :format, :stars);';

        $result = $db->prepare($sql);
        $result->bindParam(':title', $params[0], PDO::PARAM_STR);
        $result->bindParam(':release_year', $params[1], PDO::PARAM_INT);
        $result->bindParam(':format', $params[2], PDO::PARAM_STR);
        $result->bindParam(':stars', $params[3], PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * import films
     */
     public static function upload()
    {
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
        return true;
    }

    /**
     * get film
     */
    public static function getFilmById($filmId)
    {
        $filmId = intval($filmId);
        $db = Db::getConnection();

        $sql = 'SELECT * FROM film WHERE id = :filmId';

        $result = $db->prepare($sql);
        $result->bindParam(':filmId', $filmId, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    /**
     * delete film
     */
    public static function deleteFilmById($filmId)
    {
        $filmId = intval($filmId);
        $db = Db::getConnection();

        $sql = 'DELETE FROM film WHERE id = :filmId';

        $result = $db->prepare($sql);
        $result->bindParam(':filmId', $filmId, PDO::PARAM_INT);
        return $result->execute();
    }
}
