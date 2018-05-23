SELECT `name`
FROM `distrib`
WHERE `id_distrib` REGEXP ('^([6][2-9]|42|71|88|89|90)$')  || `name` REGEXP ('.*[y].*[y].*|.*[Y].*[Y].*')
LIMIT 5 OFFSET 2;