<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/template/css/style.css">
    <title>WebbyLab</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="header__menu">
                <div class="header__menu-main">
                    <a href="/">Главная</a>
                </div>
                <div class="header__menu-add">
                    <a href="/site/add">Добавить фильм</a>
                </div>
                <div class="header__menu-import">
                    <a href="/site/upload">Импортировать фильмы</a>
                </div>
                <div class="header__menu-find">
                    <form action="/site/search" method="POST">
                        <select name="search_by">
                            <option value="title">По названию</option>
                            <option value="stars">По актёру</option>
                        </select>
                        <input type="search" name="search" placeholder="Поиск...">
                        <input type="submit" name="submit" value="Найти">
                    </form>
                </div>
            </div>
        </div>
    </header>