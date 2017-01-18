<?
  include('../script/sql.php');
  online_connect();
  mysql_select_db('vletpaoh_stem');
  mysql_query('TRUNCATE TABLE `booking`');
  mysql_query('UPDATE `system2` SET `booking_id`=1 WHERE 1');
  mysql_query('UPDATE `item` SET `qty`=0 WHERE 1');
?>
