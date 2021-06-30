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
            $pattern = ".+?: (.+)$";
            foreach ($film as $line) {
                preg_match_all("/$pattern/", $line, $matches);
                $data[] = $matches[1];
            }
            $sql = "INSERT INTO film (title, release_year, format, stars) 
                        VALUES (:title, :release_year, :format, :stars);";
            $result = $db->prepare($sql);
            $result->bindParam(':title', $data[0][0], PDO::PARAM_STR);
            $result->bindParam(':release_year', $data[1][0], PDO::PARAM_INT);
            $result->bindParam(':format', $data[2][0], PDO::PARAM_STR);
            $result->bindParam(':stars', $data[3][0], PDO::PARAM_STR);
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

    /**
     * find film by title
     */

    public static function getSearchedFilm()
    {
        $db = Db::getConnection();



        $filmList = [];

        $allowed = ['title', 'stars'];

        $search_by = $_POST['search_by'];
        $search = addslashes($_POST['search']);

        if (in_array($search_by, $allowed)) {
            $sql = "SELECT id, title FROM film WHERE `$search_by` LIKE :search;";

            $result = $db->prepare($sql);
            $result->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
            $result->execute();

            $i = 0;
            while ($row = $result->fetch()) {
                $filmList[$i]['id'] = $row['id'];
                $filmList[$i]['title'] = $row['title'];
                $i++;
            }
        }
        return $filmList;
    }

    public static function validate($params)
    {
        $errors = [];
        $protectedXss = [];
        foreach ($params as $param) {
            $protectedXss[] = htmlspecialchars(htmlentities(strip_tags($param), ENT_QUOTES, "UTF-8"), ENT_QUOTES);
        }
        if (!strlen($protectedXss[0])) {
            $errors[] = 'Навзание фильма должно содержать хотя бы один символ!';
        }

        $release_year = $protectedXss[1];
        if (!(is_int(intval($release_year)) && $release_year >= 1895 && $release_year <= 2021)) {
            $errors[] = 'Год выпуска должен быть целым числом и между 1895 и 2021';
        }

        if (!strlen($protectedXss[2])) {
            $errors[] = 'Формат должен содержать хотя бы один символ!';
        }

        if (!(strlen($protectedXss[3]) && !ctype_digit($protectedXss[3]))) {
            $errors[] = 'Поле для ввода акётров не должно быть пустое и не должно содержать цыфр!';
        }

        if ($errors) {
            return $errors;
        }

        return true;
    }
}
