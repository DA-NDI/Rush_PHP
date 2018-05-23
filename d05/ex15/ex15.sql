SELECT REVERSE(SUBSTR(`phone_number`, 2 , CHAR_LENGTH(`phone_number`))) as `rebmunenohp`
FROM `distrib`
WHERE `phone_number` REGEXP '^(05).*';