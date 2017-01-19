 <?
 if($_COOKIE['login_permit']=='member'){ echo 'TO DO'; } else{
  if(is_numeric($_REQUEST['remov_id'])==false)
  {
    header('Location: index.php?sucuess_stat=3');
    exit();
  }
 	$sqlu_file2="../script/conf.json";
 	$sqlu_json2=json_decode(file_get_contents($sqlu_file2),true);
 	$usr_sql2=$sqlu_json2['mysql_setup']['mysql_json_user'];
 	$pas_sql2=$sqlu_json2['mysql_setup']['mysql_json_password'];
 	mysql_connect('localhost',$usr_sql2,$pas_sql2) or die("Could not connect to SQL");
	 mysql_select_db('vletpaoh_stem');
	 $req_id=$_REQUEST['remov_id'];
	 $res=mysql_query('DELETE FROM `item` WHERE `id`='.$req_id);
	 header('Location: index.php?admin_stat=2');
 }
 ?>
