<?
if($_REQUEST['stat']=='cel')
{
  $id=$_REQUEST['id'];
  include('../script/sql.php');
  online_connect();
  mysql_select_db('vletpaoh_stem');
  $sql="UPDATE `booking` SET `booking_stat`=5 WHERE `booking_id`=$id";
  $res=mysql_query($sql);
  header('Location: index.php?sucuess_stat=1');
}
else
{
  echo 'TO DO';
}
?>
