1. Заходим в MySQL WorkBench и запускаем локальное подключение(если его нету, его нужно создать).

2. Запускаем следуйщие команды:

CREATE SCHEMA `webbylab` ;
CREATE TABLE `webbylab`.`film` (
`id` INT NOT NULL AUTO_INCREMENT,
`title` VARCHAR(255) NULL,
`release_year` INT NULL,
`format` VARCHAR(45) NULL,
`stars` TEXT(10000) NULL,
PRIMARY KEY (`id`));

3. Заходим в /config/db_params.php и в значения по ключам user и password введите Ваши данные подключения MySQL

4. В командной строке последовательно вводим следующие команды:

cd 'path/to/project'
php -S localhost:8000

* В path/to/project должен быть путь к корневой папке проекта

5. Заходим в бразуер и в адресной строке вбиваем:
http://localhost:8000/

Все шаги для запуска проекта выполнены.

ВАЖНО!
Когда будете импортировать фильмы, нужно чтобы текстовый файл соответствовал следующему формату:

Title: Blazing Saddles
Release Year: 1974
Format: VHS
Stars: Mel Brooks, Clevon Little, Harvey Korman, Gene Wilder, Slim Pickens, Madeline Kahn


Title: Casablanca
Release Year: 1942
Format: DVD
Stars: Humphrey Bogart, Ingrid Bergman, Claude Rains, Peter Lorre


Title: Charade
Release Year: 1953
Format: DVD
Stars: Audrey Hepburn, Cary Grant, Walter Matthau, James Coburn, George Kennedy


Title: Cool Hand Luke
Release Year: 1967
Format: VHS
Stars: Paul Newman, George Kennedy, Strother Martin


Title: Butch Cassidy and the Sundance Kid
Release Year: 1969
Format: VHS
Stars: Paul Newman, Robert Redford, Katherine Ross