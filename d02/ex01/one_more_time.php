#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
function print_error()
{
	echo "Wrong Format\n";
	exit;
}
function is_week_day($week_day){
	if ((preg_match('/(^[Ll]undi|^[Mm]ardi|^[Mm]ercredi|^[Jj]eudi|^[Vv]endredi|^[Ss]amedi|^[Dd]imanche)$/', $week_day) !== 1))
		print_error();
}
function is_month($month_date){
	if ((preg_match('/^(0[1-9]|1[0-9]|2[0-9]|3[01]|[1-9])$/', $month_date) !== 1))
		print_error();
	return;
}
function is_alph_month($alph_month){

if ((preg_match('/(^[Jj]anvier|^[Ff]évrier|^[Mm]ars|^[Aa]vril|^[Mm]ai|^[Jj]uin|^[Jj]uillet|^[Aa]out|^[Ss]eptembre|^[Oo]ctobre|^[Nn]ovembre|^[Dd]écembre)$/', $alph_month) !== 1))
		print_error();

	return;
}
function is_year($year){
	if ((preg_match('/^([0-9][0-9][0-9][0-9])$/', $year) !== 1))
		print_error();
	return;
}
function is_time($time){
	if ((preg_match('/^(0[0-9]|1[0-9]|2[0123]):([0-5][0-9]):([0-5][0-9])$/', $time) !== 1))
		print_error();
	return;
}
function get_month($alph_month)
{
if (preg_match('/(^[Jj]anvier)/', $alph_month))
	return 1;
else if (preg_match('/(^[Ff]évrier)/', $alph_month))
	return 2;
else if (preg_match('/(^[Mm]ars)/', $alph_month))
	return 3;
else if (preg_match('/(^[Aa]vril)/', $alph_month))
	return 4;
else if (preg_match('/(^[Mm]ai)/', $alph_month))
	return 5;
else if (preg_match('/(^[Jj]uin)/', $alph_month))
	return 6;
else if (preg_match('/(^[Jj]uillet)/', $alph_month))
	return 7;
else if (preg_match('/(^[Aa]out)/', $alph_month))
	return 8;
else if (preg_match('/(^[Ss]eptembre)/', $alph_month))
	return 9;
else if (preg_match('/(^[Oo]ctobre)/', $alph_month))
	return 10;
else if (preg_match('/(^[Nn]ovembre)/', $alph_month))
	return 11;
else if (preg_match('/(^[Dd]écembre)/', $alph_month))
	return 12;
return 0;
}
if ($argc == 2 && is_string($argv[1]))
{
	if ((substr_count($argv[1], " "))!== 4)
		print_error();
	$arr = explode(" ", $argv[1]);
	if (($cont = count($arr))!== 5)
		print_error();
	
	$week_day = $arr[0];
	$month_date = $arr[1];
	$alph_month = $arr[2];
	$year = $arr[3];
	$time = $arr[4];
	is_week_day($week_day);
	is_month($month_date);
	is_alph_month($alph_month);
	is_year($year);
	is_time($time);
	$month = get_month($alph_month);
	$time_exp = explode(":", $time);
	print(mktime($time_exp[0],$time_exp[1],$time_exp[2],$month, $month_date, $year));
	echo "\n";
}
?>