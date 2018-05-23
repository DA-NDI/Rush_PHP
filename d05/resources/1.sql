INSERT INTO ft_table1 (login, groupe, date_de_creation)
SELECT last_name, 'other', birthdate
FROM user_card
WHERE last_name LIKE '%a%' AND LENGTH(last_name) < 9
ORDER BY last_name LIMIT 10;

INSERT INTO ft_table1 (login, groupe, date_de_creation) VALUES
('loki', 'staff', '2013-05-01'),
('scadoux', 'student', '2014-01-01'),
('chap', 'staff', '2011-04-27'),
('bambou', 'staff', '2014-03-01'),
('fantomet', 'staff', '2010-04-03');

CREATE TABLE ft_table (
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
login VARCHAR(8) NOT NULL DEFAULT 'toto',
groupe ENUM('staff', 'student', 'other') NOT NULL,
date_de_creation DATE NOT NULL);

DELETE FROM ft_table1 LIMIT 5;

SELECT film.id_genre AS `id_genre`, genre.name AS `name_genre`, distrib.id_distrib, distrib.name AS `name_distrib`, film.title AS `title_film`
FROM `film`
INNER JOIN `genre` ON film.id_genre = genre.id_genre
INNER JOIN `distrib` ON distrib.id_distrib = film.id_distrib
WHERE film.id_genre > 3 AND film.id_genre < 9;


SELECT MD5(REPLACE(CONCAT(phone_number, 42), 7, 9)) AS 'ft5'
FROM distrib
WHERE id_distrib = 84;