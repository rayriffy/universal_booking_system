 <?
 if($_COOKIE['login_permit']=='member'){ echo 'TO DO'; } else{
	 
	 include('../script/sql.php');
	 online_connect();
	 mysql_select_db('vletpaoh_stem');
	 $req_id=$_REQUEST['remov_id'];
	 $res=mysql_query('DELETE FROM `item` WHERE `id`='.$req_id);
	 header('Location: index.php?admin_stat=2');
 }
 ?>