SELECT `last_name`, `first_name`, DATE(`birthdate`) as `birthdate` FROM user_card WHERE YEAR(`birthdate`) LIKE '%1989%' ORDER BY `last_name` ASC;