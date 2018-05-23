SELECT COUNT(`id_sub`) as `nb_susc`, FLOOR(AVG(`price`)) as `av_susc`, SUM(`duration_sub`) % 42 AS`ft`
FROM `subscription`;