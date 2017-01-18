<?
$sqlu_file2="../script/conf.json";
$sqlu_json2=json_decode(file_get_contents($sqlu_file2),true);
$usr_sql2=$sqlu_json2['mysql_setup']['mysql_json_user'];
$pas_sql2=$sqlu_json2['mysql_setup']['mysql_json_password'];
mysql_connect('localhost',$usr_sql2,$pas_sql2) or die("Could not connect to SQL");
  mysql_select_db('vletpaoh_stem');
  mysql_query('TRUNCATE TABLE `booking`');
  mysql_query('UPDATE `system2` SET `booking_id`=1 WHERE 1');
  mysql_query('UPDATE `item` SET `qty`=0 WHERE 1');
?>
