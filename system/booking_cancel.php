<?
if($_REQUEST['stat']=='cel')
{
  $id=$_REQUEST['id'];
	$sqlu_file2="../script/conf.json";
	$sqlu_json2=json_decode(file_get_contents($sqlu_file2),true);
	$usr_sql2=$sqlu_json2['mysql_setup']['mysql_json_user'];
	$pas_sql2=$sqlu_json2['mysql_setup']['mysql_json_password'];
	mysql_connect('localhost',$usr_sql2,$pas_sql2) or die("Could not connect to SQL");
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
