SELECT COUNT(`id_film`) AS `movies`
FROM `member_history`
WHERE `date` >= "2006-10-30" && `date` <= "2007-07-27" || `date` REGEXP ('[1-9][0-9][0-9][0-9]-12-24');