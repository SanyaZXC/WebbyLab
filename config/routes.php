<?php

return array(
    'site/search' => 'site/search',
    'site/add' => 'site/addFilm',
    'site/film/([0-9]+)' => 'site/view/$1',
    'site/delete/([0-9]+)' => 'site/delete/$1',
    'site/upload' => 'site/upload',
    'index.php' => 'site/index',
    '' => 'site/index', 
);
