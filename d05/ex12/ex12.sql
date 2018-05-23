SELECT `last_name`, `first_name`
FROM `user_card`
WHERE `first_name` LIKE "%-%" || `last_name` LIKE "%-%"
ORDER BY `last_name` ASC;